<?php

namespace App\Http\Controllers;

use App\Models\Commande;
use App\Models\Composer;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PanierController extends Controller {
// récupère le panier de l'utilisateur
    public function get_panier($userid) {
        return Commande::where('user_id',$userid)
                        ->where('statut',"Panier en cours")
                        ->first();
    }
// récupère les commandes hors panier en cours de l'utilisateur
    public function get_commandes($userid) {
        return Commande::where('user_id',$userid)
                        ->where('statut', '!=', "Panier en cours")
                        ->orderBy('date_recuperation', 'desc')
                        ->get();
    }
// récupère les éléments composer d'une commande 
    public function get_composer($panierid) {
        return Composer::where('commande_id',$panierid)->get();
    }
// récupère un composer via l'id du produit et de la commande
    public function get_composer_id($produitid, $panierid) {
        return Composer::where('commande_id',$panierid)
                        ->where('product_id', $produitid)
                        ->first();
    }
// récupère un produit via son id
    public function get_produit_id($id) {
        return Product::find($id);
    }
// compte le nombre d'article du panier
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
// calcul le montant du panier
    public function sommePanier($panierid) {
        $composers = $this->get_composer($panierid);
        $value = 0;
        foreach ($composers as $composer) {
            $prix = $composer->quantite*$composer->prix;
            $value += $prix;
        }
        return $value;
    }
// récupère la quantité maximum d'article identique
    public function maxQuantite($panierid) {
        $composers = $this->get_composer($panierid);
        $value = 0;
        foreach ($composers as $composer) {
            $value = $value >= $composer->quantite ? $value : $composer->quantite;
        }
        return $value;
    }
// Création de la commande au statut Panier en cours
    public function create_panier($userid) {
        $commande = new commande;
        $commande->user_id = $userid;
        $commande->save();
    }
// Changement du statut vers commande en cours et mise à jour de la commande
    public function valider_panier(Request $request) {
        $user = Auth::user();
        $commande = $this->get_panier($user->id);
        $commande->montant = $this->sommePanier($commande->id);
        $commande->commentaire = $request->commentaire;
        $commande->date_commande = now();
        $commande->date_recuperation = $request->date_recuperation;
        $commande->statut = "Commande en cours";
        $quantite = $this->maxQuantite($commande->id);
        if($commande->montant>=40 || $quantite >=20) {
            $commande->acompte = "Acompte à payer";
        }
        $commande->save();
        return redirect()->back();
    }
// récupère l'ensemble des commandes
    public function view_commandes() {
        $user = Auth::user();
        $commandes = $this->get_commandes($user->id);
        $count=$this->count_panier();
        return view('home.commandes', compact('count','commandes'));
    }
// récupère une commande via son id
    public function commande_details($id) {
        $commande = Commande::find($id);
        $articles = $this->get_composer($commande->id);
        $count=$this->count_panier();
        return view('home.commande_details', compact('count', 'commande', 'articles'));
    }
// ouverture de la vue Panier
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
// création de l'objet de la table de jointure commande produit
    public function create_composer($produitid, $panierid, $prix) {
        $composer = new Composer();
        $composer->commande_id = $panierid;
        $composer->product_id = $produitid;
        $composer->quantite = 1;
        $composer->prix = $prix;
        $composer->save();
    }
// augmentation de la quantité dans le composer
    public function add_composer($composerid) {
        $data = Composer::find($composerid); 
        $data->quantite++;
        $data->save();
        return redirect()->back();
    }
// suppression de l'objet composer
    public function delete_composer($composerid) {
        $data = Composer::find($composerid); 
        $data->delete();
        return redirect()->back();
    }
// diminution de la quantité dans le composer
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
// Fonction principal du panier, appel à la création ou modification de la commande et des composer
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