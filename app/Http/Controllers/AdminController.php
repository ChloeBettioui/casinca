<?php

namespace App\Http\Controllers;

use App\Models\Annonce;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Commande;
use App\Models\Composer;
use App\Models\Message;
use App\Models\Product;
use App\Models\User;
use phpDocumentor\Reflection\PseudoTypes\True_;

class AdminController extends Controller {

    
    public function delete_image($image, $url) {
        if($image) {
            $image_path = public_path('/'.$url.'/'.$image);
            if(file_exists($image_path)) {
                unlink($image_path);
            }
        }
    }

    public function view_categorie() {
        $data = Category::all();
        return view('admin.view_categorie', compact('data'));
    }

    public function add_categorie() {
        return view('admin.add_categorie');
    }

    public function upload_categorie(Request $request) {
        $category = new Category;
        $category->category_name = $request->category;
        $image = $request->image;
        if($image)
        {
            $imagename = time().'.'.$image->getClientOriginalExtension();
            $request->image->move('category',$imagename);
            $category->image = $imagename;
        }
        $category->save();
        toastr()->timeout(10000)->closeButton()->addSuccess('Catégorie ajoutée avec succès');
        return redirect()->back();
    }

    public function delete_categorie($id) {
        $data = Category::find($id);
        $this->delete_image($data->image, 'category');
        $data->delete();
        toastr()->timeout(10000)->closeButton()->addSuccess('Catégorie supprimée avec succès');
        return redirect()->back();
    
    }

    public function edit_categorie($id) {
        $data = Category::find($id);
        return view('admin.edit_categorie',compact('data'));
    
    }

    public function update_categorie(Request $request,$id) {
        $data = Category::find($id); 
        $data->category_name = $request->category;
        $image = $request->image;
        if($image)
        {
            $this->delete_image($data->image, 'category');
            $imagename = time().'.'.$image->getClientOriginalExtension();
            $request->image->move('category',$imagename);
            $data->image = $imagename;
        }
        $data->save();
        toastr()->timeout(10000)->closeButton()->addSuccess('Catégorie modifiée avec succès');
        return redirect('/view_categorie');
    }

    public function add_product() {
        $category = Category::all();
        return view('admin.add_product',compact('category'));
    }

    public function upload_product(Request $request) {
        $data = new Product;
        $data->title = $request->title;
        $data->description = $request->description;
        $data->price = $request->price;
        $data->category = $request->category;
        $data->actif = $request->actif == "oui" ? True : False;
        $image = $request->image;
        if($image)
        {
            $imagename = time().'.'.$image->getClientOriginalExtension();
            $request->image->move('products',$imagename);
            $data->image = $imagename;
        }
        $data->save();
        toastr()->timeout(10000)->closeButton()->addSuccess('Produit ajouté avec succès');
        return redirect()->back();
    }

    public function view_product() {
        $product = Product::paginate(10);
        $search = '';
        return view('admin.view_product',compact('product', 'search'));
    }
    
    public function desactiver_product($id) {
        $data = Product::find($id);
        if($data->actif) {
            $data->actif = False;
            $data->save();
            toastr()->timeout(10000)->closeButton()->addSuccess('Produit désactivé avec succès');
        } else {
            $data->actif = True;
            $data->save();
            toastr()->timeout(10000)->closeButton()->addSuccess('Produit activé avec succès');
        }
        return redirect()->back();
    }

    public function edit_product($id) {
        $product = Product::find($id);
        $category = Category::all();
        return view('admin.edit_product',compact('product', 'category'));
    }

    public function update_product(Request $request, $id) {
        $data = Product::find($id);
        $data->title = $request->title;
        $data->description = $request->description;
        $data->price = $request->price;
        $data->category = $request->category;
        $data->actif = $request->actif == "oui" ? True : False;
        $image = $request->image;
        if($image)
        {
            $this->delete_image($data->image, 'products');
            $imagename = time().'.'.$image->getClientOriginalExtension();
            $request->image->move('products',$imagename);
            $data->image = $imagename;
        }
        $data->save();
        toastr()->timeout(10000)->closeButton()->addSuccess('Produit modifié avec succès');
        return redirect('/view_product');
    }

    public function search_product(Request $request) {
        $search = $request->search;
        $product = Product::where('title', 'LIKE', '%'.$search.'%')
                ->orWhere('description', 'LIKE', '%'.$search.'%')
                ->orWhere('category', 'LIKE', '%'.$search.'%')
                ->paginate(10);
        return view('admin.view_product', compact('product', 'search'));
    }
    // select * from `products` where `title` LIKE '%cr%' or `description` LIKE '%cr%' limit 5

    public function view_commandes() {
        $commandes_encours = Commande::where('statut', 'LIKE', "Commande en cours")
                    ->orderBy('date_recuperation', 'asc')
                    ->get();
        $commandes_pretes = Commande::where('statut', 'LIKE', "Prête")
                    ->orderBy('date_recuperation', 'asc')
                    ->get();
        $commandes_recuperees = Commande::where('statut', 'LIKE', "Récupérée")
                    ->orderBy('date_recuperation', 'asc')
                    ->get();
        return view('admin.commandes',compact('commandes_encours', 'commandes_pretes', 'commandes_recuperees'));
    }

    public function commande_details($id) {
        $commande = Commande::find($id);
        $articles = Composer::where('commande_id',$id)->get();
        return view('admin.commande_details', compact('commande', 'articles'));
    }

    public function encours($id) {
        $data = Commande::find($id);
        $data->statut = 'Commande en cours';
        $data->save();
        return redirect('/view_commandes');
    }

    public function pret($id) {
        $data = Commande::find($id);
        $data->statut = 'Prête';
        $data->save();
        return redirect('/view_commandes');
    }

    public function recupere($id) {
        $data = Commande::find($id);
        $data->statut = 'Récupérée';
        $data->save();
        return redirect('/view_commandes');
    }

    public function view_messages() {
        $messages = Message::orderBy('id', 'desc')->get();
        return view('admin.messages',compact('messages'));
    }

    public function message_details($id) {
        $message = Message::find($id);
        
        return view('admin.message_details',compact('message'));
    }

    public function view_users() {
        $users = User::orderBy('id')->get();
        return view('admin.users',compact('users'));
    }

    public function delete_user($id) {
        $data = User::find($id);
        $data->delete();
        toastr()->timeout(10000)->closeButton()->addSuccess('Utilisateur supprimé avec succès');
        return redirect()->back();
    }

    public function add_annonce() {
        $produits = Product::all();
        return view('admin.add_annonce',compact('produits'));
    }

    public function upload_annonce(Request $request) {
        $data = new Annonce;
        $data->actif = $request->actif == "oui" ? True : False;
        $data->product_id = $request->produit;
        $data->description = $request->description;
        $image = $request->image;
        if($image)
        {
            $imagename = time().'.'.$image->getClientOriginalExtension();
            $request->image->move('annonces',$imagename);
            $data->image = $imagename;
        }
        $data->save();
        toastr()->timeout(10000)->closeButton()->addSuccess('Annonce ajoutée avec succès');
        return redirect()->back();
    }

    public function view_annonces() {
        $annonces = Annonce::paginate(5);
        return view('admin.view_annonces',compact('annonces'));
    }

    public function delete_annonce($id) {
        $data = Annonce::find($id);
        $this->delete_image($data->image, 'annonces');
        $data->delete();
        toastr()->timeout(10000)->closeButton()->addSuccess('Annonce supprimée avec succès');
        return redirect()->back();
    }

    public function edit_annonce($id) {
        $annonce = Annonce::find($id);
        $produits = Product::all();
        return view('admin.edit_annonce',compact('annonce', 'produits'));
    }

    public function update_annonce(Request $request, $id) {
        $data = Annonce::find($id);
        $data->description = $request->description;
        $data->product_id = $request->produit;
        $data->actif = $request->actif == "oui" ? True : False;
        $image = $request->image;
        if($image)
        {
            $this->delete_image($data->image, 'annonces');
            $imagename = time().'.'.$image->getClientOriginalExtension();
            $request->image->move('annonces',$imagename);
            $data->image = $imagename;
        }
        $data->save();
        toastr()->timeout(10000)->closeButton()->addSuccess('Produit modifié avec succès');
        return redirect('/view_annonces');
    }
}
