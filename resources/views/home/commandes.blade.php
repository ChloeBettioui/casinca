<!DOCTYPE html>
<html>
<head>
    @include('home.css')
</head>
<body>
    <!-- header section strats -->
    @include('home.header')

    <section class="shop_section mt-3">
        <div class="table-responsive">
            <table class="table">
                <tr>
                    <th>Commande</th>
                    <th>Prix</th>
                    <th>Date de commande</th>
                    <th>Date de récupération</th>
                    <th>Statut</th>
                    <th>Détails</th>
                </tr>

                @foreach ($commandes as $commande)
                <tr>
                    <td>{{$commande->id}}</td>
                    <td>{{$commande->montant}} €</td>
                    <td>{{$commande->date_commande}}</td>
                    <td>{{$commande->date_recuperation}}</td>
                    <td>
                    @if($commande->statut == 'Commande en cours')
                    <span class="text-danger">{{$commande->statut}}</span>
                    @elseif($commande->statut == 'Prête')
                    <span class="text-warning">{{$commande->statut}}</span>
                    @else
                    <span class="text-success">{{$commande->statut}}</span>
                    @endif
                    </td>
                    <td>
                        <div class="btn-box">
                            <a href="{{url('commande_details',$commande->id)}}">Détails</a>
                        </div>
                    </td>
                </tr>
                @endforeach
            </table>
        </div>
    </section>

    <!-- info section -->
    @include('home.footer')
</body>
</html>