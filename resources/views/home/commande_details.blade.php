<!DOCTYPE html>
<html>

<head>
    @include('home.css')
</head>

<body>
    <!-- header section strats -->
    @include('home.header')

    <!-- product details -->
    <section class="shop_section">
        <div class="container px-0 pb-2">
            <div class="box">
                <div class="row justify-content-between mx-1">
                    <h3 class="detail-box">Commande {{$commande->id}}</h3>
                    <div class="detail-box">
                        @if($commande->statut == 'Commande en cours')
                        <h4 class="text-danger">{{$commande->statut}}</h4>
                        @elseif($commande->statut == 'Prête')
                        <h4 class="text-warning">{{$commande->statut}}</h4>
                        @else
                        <h4 class="text-success">{{$commande->statut}}</h4>
                        @endif
                    </div>
                </div>
                <div class="row justify-content-between mx-1">
                    <div class="detail-box">Prix : {{number_format($commande->montant,2)}} €</div>
                    <div class="detail-box">Acompte : 
                        @if($commande->acompte == 'Non concerné')
                        <span>{{$commande->acompte}}</span>
                        @elseif($commande->acompte == 'Acompte à payer')
                        <span class="text-danger">{{$commande->acompte}}</span>
                        @else
                        <span class="text-success">{{$commande->acompte}}</span>
                        @endif
                    </div>
                </div>
                <div class="row justify-content-between mx-1">
                    <div class="detail-box">Date de commande : {{$commande->date_commande}}</div>
                    <h5 class="detail-box">Date de récupération : {{$commande->date_recuperation}}</h5>
                </div>
                <div class="shop_section table-responsive mt-1">
                    <table class="table">
                        <tr>
                        <th>Produit</th>
                        <th>Prix unitaire</th>
                        <th>Image</th>
                        <th>Quantité</th>
                        <th>Total</th>
                        </tr>
                        @foreach ($articles as $article)
                        <tr>
                        <td>{{$article->product->title}}</td>
                        <td>{{number_format($article->prix,2)}} €</td>
                        <td>
                            <img width="150" src="/products/{{$article->product->image}}">
                        </td>
                        <td>{{$article->quantite}}</td>
                        <td>{{number_format($article->prix * $article->quantite,2)}} €</td>
                        </tr>
                        @endforeach
                    </table>
                </div>
                <div class="detail-box mt-2">Commentaire : {{$commande->commentaire}}</div>
            </div>
        </div>
    </section>

  <!-- info section -->
  @include('home.footer')

</body>

</html>