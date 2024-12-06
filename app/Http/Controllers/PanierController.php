<?php

namespace App\Http\Controllers;

use App\Models\Commande;
use App\Models\Composer;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PanierController extends Controller {

    public function get_panier($userid) {
        return Commande::where('user_id',$userid)
                        ->where('statut',"Panier en cours")
                        ->first();
    }

    public function get_commandes($userid) {
        return Commande::where('user_id',$userid)
                        ->where('statut', '!=', "Panier en cours")
                        ->orderBy('date_recuperation', 'asc')
                        ->get();
    }

    public function get_composer($panierid) {
        return Composer::where('commande_id',$panierid)->get();
    }

    public function get_composer_id($produitid, $panierid) {
        return Composer::where('commande_id',$panierid)
                        ->where('product_id', $produitid)
                        ->first();
    }

    public function get_produit_id($id) {
        return Product::find($id);
    }

    public function count_panier() {
        if(Auth::id()) {
            $user = Auth::user();
            $panier = $this->get_panier($user->id);
            if($panier) {
                $articles = $this->get_composer($panier->id);
                $count = $articles->count();
            }else {
                $count = 0;
            }
        }else {
            $count = '';
        }
        return $count;
    }

    public function sommePanier($panierid) {
        $composers = $this->get_composer($panierid);
        $value = 0;
        foreach ($composers as $composer) {
            $prix = $composer->quantite*$composer->prix;
            $value += $prix;
        }
        return $value;
    }

    public function create_panier($userid) {
        $commande = new commande;
        $commande->user_id = $userid;
        $commande->save();
    }

    public function valider_panier(Request $request) {
        $user = Auth::user();
        $commande = $this->get_panier($user->id);
        $commande->montant = $this->sommePanier($commande->id);
        $commande->commentaire = $request->commentaire;
        $commande->date_commande = now();
        $commande->date_recuperation = $request->date_recuperation;
        $commande->statut = "Commande en cours";
        $commande->save();
        return redirect()->back();
    }

    public function view_commandes() {
        $user = Auth::user();
        $commandes = $this->get_commandes($user->id);
        $count=$this->count_panier();
        return view('home.commandes', compact('count','commandes'));
    }

    public function commande_details($id) {
        $commande = Commande::find($id);
        $articles = $this->get_composer($commande->id);
        $count=$this->count_panier();
        return view('home.commande_details', compact('count', 'commande', 'articles'));
    }

    public function index() {
        if(Auth::id()) {
            $user = Auth::user();
            $panier = $this->get_panier($user->id);
            if($panier) {
                $articles = $this->get_composer($panier->id);
                $count = $articles->count();
            }else{
                $articles = [];
                $count = '';
            }
            
        }
        return view('home.panier', compact('count', 'panier', 'articles'));
    }

    public function create_composer($produitid, $panierid, $prix) {
        $composer = new Composer();
        $composer->commande_id = $panierid;
        $composer->product_id = $produitid;
        $composer->quantite = 1;
        $composer->prix = $prix;
        $composer->save();
    }

    public function add_composer($composerid) {
        $data = Composer::find($composerid); 
        $data->quantite++;
        $data->save();
    }

    public function delete_composer($composerid) {
        $data = Composer::find($composerid); 
        $data->delete();
        return redirect()->back();
    }

    public function substract_composer($composerid) {
        $data = Composer::find($composerid);
        if($data->quantite == 1) {
            $data->delete();
        }else {
            $data->quantite--;
            $data->save();
        }
        return redirect()->back();
    }

    public function update_panier($produitid) {
        $user = Auth::user();
        $panier = $this->get_panier($user->id);
        $produit = $this->get_produit_id($produitid);
        if (!$produit->actif) {
            return response()->json([
                'error' => 'Le produit n\'est plus disponible.'
            ], 400);
        }
        if (!$panier){
            $this->create_panier($user->id);
            $newpanier = $this->get_panier($user->id);
            $this->create_composer($produitid, $newpanier->id, $produit->price);
        } else {
            $composer = $this->get_composer_id($produitid, $panier->id);
            if($composer) {
                $this->add_composer($composer->id);
            } else {
                $this->create_composer($produitid, $panier->id, $produit->price);
            }
        }
        return response()->json([
            'success' => 'Le produit a été ajouté au panier avec succès.',
        ]);
    }
}