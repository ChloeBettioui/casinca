<!DOCTYPE html>
<html>
    <head> 
        @include('admin.css')
    </head>
    <body>
        @include('admin.header')

        @include('admin.sidebar')
        <!-- Sidebar Navigation end-->
        <div class="page-content">
            <div class="page-header">
                <div class="container-fluid">
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
                        <div class="detail-box">{{$commande->user->civilite}} {{$commande->user->nom}} {{$commande->user->prenom}}</div>
                        <div class="detail-box">Acompte :
                            @if($commande->acompte == 'Non concerné')
                            <span>{{$commande->acompte}}</span>
                            @elseif($commande->acompte == 'Acompte à payer')
                            <span class="text-warning">{{$commande->acompte}}</span>
                            @else
                            <span class="text-success">{{$commande->acompte}}</span>
                            @endif
                        </div>
                    </div>
                    <div class="row justify-content-between mx-1">
                        <div class="detail-box">{{$commande->user->telephone}}</div>
                        <div class="detail-box">Prix : {{number_format($commande->montant,2)}}€</div>
                    </div>
                    <div class="row justify-content-between mx-1">
                        <div class="detail-box">{{$commande->user->email}}</div>
                        <div class="detail-box">Date de commande : {{$commande->date_commande}}</div>
                    </div>
                    <div class="row justify-content-right mx-1">
                        <b class="detail-box text-primary">Date de récupération : {{$commande->date_recuperation}}</b>
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
                            <td>{{number_format($article->prix,2)}}€</td>
                            <td>
                                <img width="150" src="/products/{{$article->product->image}}">
                            </td>
                            <td>{{$article->quantite}}</td>
                            <td>{{number_format($article->prix * $article->quantite,2)}}€</td>
                            </tr>
                            @endforeach
                        </table>
                    </div>
                    <div class="row justify-content-between mx-1">
                        <div class="detail-box">Commentaire : {{$commande->commentaire}}</div>
                        @if($commande->acompte == 'Acompte à payer')
                        <a class="btn btn-warning" onclick="confirmation(event)" href="{{url('acompte',$commande->id)}}">Acompte payé</a>
                        @elseif($commande->statut == 'Commande en cours')
                        <a class="btn btn-primary" href="{{url('pret',$commande->id)}}">Prête</a>
                        @elseif($commande->statut == 'Prête')
                        <a class="btn btn-success" href="{{url('recupere',$commande->id)}}">Récupérée</a>
                        @endif
                    </div>
                </div>
            </div>
        </div>

        <!-- JavaScript files-->
        <script type="text/javascript">
            function confirmation(ev) {
                ev.preventDefault();
                var urlToRedirect = ev.currentTarget.getAttribute('href');
                console.log(urlToRedirect);
                swal({
                title:"L'acompte a bien été versé pour cette commande ?",
                icon:"warning",
                buttons:true,
                dangerMode:true,
                }).then((willCancel)=>{
                if(willCancel) {
                    window.location.href=urlToRedirect;
                }
                })
            }
        </script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script src="{{asset('admincss/vendor/jquery/jquery.min.js')}}"></script>
        <script src="{{asset('admincss/vendor/popper.js/umd/popper.min.js')}}"> </script>
        <script src="{{asset('admincss/vendor/bootstrap/js/bootstrap.min.js')}}"></script>
        <script src="{{asset('admincss/vendor/jquery.cookie/jquery.cookie.js')}}"> </script>
        <script src="{{asset('admincss/vendor/chart.js/Chart.min.js')}}"></script>
        <script src="{{asset('admincss/vendor/jquery-validation/jquery.validate.min.js')}}"></script>
        <script src="{{asset('admincss/js/charts-home.js')}}"></script>
        <script src="{{asset('admincss/js/front.js')}}"></script>
    </body>
</html>