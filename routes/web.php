<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\PanierController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

// home
Route::get('/',[HomeController::class,'home'])->name('home');
Route::get('/dashboard', [HomeController::class,'home'])->middleware(['auth', 'verified'])->name('dashboard');
// categorie pour filtrage produits
Route::get('/categorie',[HomeController::class,'category']);
Route::get('/produit/{id}',[HomeController::class,'product_filter']);
// contact
Route::get('/contact',[HomeController::class,'contact'])->name('contact');
Route::post('send_message',[HomeController::class,'send_message']);
// product & details
Route::get('/produit',[HomeController::class,'product'])->name('product');
Route::get('produit_details/{id}',[HomeController::class,'product_details']);
// cart
Route::get('add_cart/{id}',[HomeController::class,'add_cart'])->middleware(['auth','verified']);
Route::get('mycart',[HomeController::class,'mycart'])->middleware(['auth','verified']);
Route::get('delete_cart/{id}',[HomeController::class,'delete_cart'])->middleware(['auth','verified']);
// orders
Route::post('confirm_order',[HomeController::class,'confirm_order'])->middleware(['auth','verified']);
Route::get('/myorders',[HomeController::class,'myorders'])->middleware(['auth','verified']);
// panier
Route::get('update_panier/{id}',[PanierController::class,'update_panier'])->middleware(['auth','verified']);
Route::get('panier',[PanierController::class,'index'])->middleware(['auth','verified']);
Route::get('delete_composer/{id}',[PanierController::class,'delete_composer'])->middleware(['auth','verified']);
Route::get('substract_composer/{id}',[PanierController::class,'substract_composer'])->middleware(['auth','verified']);
// commandes
Route::post('valider_panier',[PanierController::class,'valider_panier'])->middleware(['auth','verified']);
Route::get('/commandes',[PanierController::class,'view_commandes'])->middleware(['auth','verified']);
Route::get('commande_details/{id}',[PanierController::class,'commande_details'])->middleware(['auth','verified']);

// création compte
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

// Admin
route::get('admin/dashboard',[HomeController::class,'index'])->middleware(['auth', 'admin'])->name('home');
// Categorie routes
route::get('view_categorie',[AdminController::class,'view_categorie'])->middleware(['auth', 'admin']);
route::get('add_categorie',[AdminController::class,'add_categorie'])->middleware(['auth', 'admin']);
route::post('upload_categorie',[AdminController::class,'upload_categorie'])->middleware(['auth', 'admin']);
route::get('delete_categorie/{id}',[AdminController::class,'delete_categorie'])->middleware(['auth', 'admin']);
route::get('edit_categorie/{id}',[AdminController::class,'edit_categorie'])->middleware(['auth', 'admin']);
route::post('update_categorie/{id}',[AdminController::class,'update_categorie'])->middleware(['auth', 'admin']);
// Produits routes
route::get('add_product',[AdminController::class,'add_product'])->middleware(['auth', 'admin']);
route::post('upload_product',[AdminController::class,'upload_product'])->middleware(['auth', 'admin']);
route::get('view_product',[AdminController::class,'view_product'])->middleware(['auth', 'admin']);
route::get('desactiver_product/{id}',[AdminController::class,'desactiver_product'])->middleware(['auth', 'admin']);
route::get('edit_product/{id}',[AdminController::class,'edit_product'])->middleware(['auth', 'admin']);
route::post('update_product/{id}',[AdminController::class,'update_product'])->middleware(['auth', 'admin']);
route::get('search_product',[AdminController::class,'search_product'])->middleware(['auth', 'admin']);
// Commandes routes
Route::get('view_commandes',[AdminController::class,'view_commandes'])->middleware(['auth', 'admin']);
Route::get('view_commande_details/{id}',[AdminController::class,'commande_details'])->middleware(['auth','admin']);
Route::get('encours/{id}',[AdminController::class,'encours'])->middleware(['auth', 'admin']);
Route::get('pret/{id}',[AdminController::class,'pret'])->middleware(['auth', 'admin']);
Route::get('recupere/{id}',[AdminController::class,'recupere'])->middleware(['auth', 'admin']);
// Messages routes
Route::get('view_messages',[AdminController::class,'view_messages'])->middleware(['auth', 'admin']);
Route::get('message_details/{id}',[AdminController::class,'message_details'])->middleware(['auth', 'admin']);
// Users routes
Route::get('view_users',[AdminController::class,'view_users'])->middleware(['auth', 'admin']);
route::get('delete_user/{id}',[AdminController::class,'delete_user'])->middleware(['auth', 'admin']);
// Annonces routes
route::get('add_annonce',[AdminController::class,'add_annonce'])->middleware(['auth', 'admin']);
route::post('upload_annonce',[AdminController::class,'upload_annonce'])->middleware(['auth', 'admin']);
route::get('view_annonces',[AdminController::class,'view_annonces'])->middleware(['auth', 'admin']);
route::get('delete_annonce/{id}',[AdminController::class,'delete_annonce'])->middleware(['auth', 'admin']);
route::get('edit_annonce/{id}',[AdminController::class,'edit_annonce'])->middleware(['auth', 'admin']);
route::post('update_annonce/{id}',[AdminController::class,'update_annonce'])->middleware(['auth', 'admin']);
