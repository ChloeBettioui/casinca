<?php

namespace App\Http\Controllers;

use App\Models\Annonce;
use App\Models\Category;
use App\Models\Commande;
use App\Models\Message;
use App\Models\User;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller {
    protected $panierController;
    public function __construct(PanierController $panierController) {
       $this->panierController = $panierController;
    }

    public function index() {
        $user = User::where('usertype','user')->get()->count();
        $products = Product::all()->count();
        $commande = Commande::all()->count();
        $delivered = Commande::where('statut','Récupérée')->get()->count();
        $deliveredPourCent = $delivered/$commande*100;
        $message = Message::all()->count();
        $annonce = Annonce::all()->count();
        return view('admin.index',compact('user','products','commande','delivered', 'deliveredPourCent','message', 'annonce'));
    }
   
    public function home() {
        $annonces = Annonce::where('actif', 'LIKE', '1')->get();;
        $count = $this->panierController->count_panier();
        return view('home.index',compact('annonces','count'));
    }

    public function login_home() {
        $products = Product::all();
        $count = $this->panierController->count_panier();
        return view('home.index',compact('products','count'));
    }

    public function contact() {
        $count = $this->panierController->count_panier();
        return view('home.contact',compact('count'));
    }

    public function getCategory() {
        return Category::all();
    }

    public function product() {
        $products = Product::all();
        $count = $this->panierController->count_panier();
        $category= $this->getCategory();
        return view('home.product', compact('products','category', 'count'));
    }

    public function product_filter($id) {
        $products = Product::where('category', 'LIKE', '%'.$id.'%')->get();
        $count = $this->panierController->count_panier();
        $category= $this->getCategory();
        return view('home.product', compact('products','category', 'count'));
    }

    public function product_details($id) {
        $product = Product::find($id);
        $count = $this->panierController->count_panier();
        return view('home.product_details',compact('product','count'));
    }

    public function send_message(Request $Request) {
        $message = new Message();
        $message->nom = $Request->nom;
        $message->prenom = $Request->prenom;
        $message->email = $Request->email;
        $message->sujet = $Request->sujet;
        $message->message = $Request->message;
        $message->save();
        toastr()->timeout(10000)->closeButton()->addSuccess('Message envoyé');
        return redirect()->back();
    }
}