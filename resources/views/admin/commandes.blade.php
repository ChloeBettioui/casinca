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
          <ul class="nav nav-tabs" id="tab" role="tablist">
            <li class="nav-item" role="presentation">
              <button class="nav-link active" id="encours-tab" data-bs-toggle="tab" data-bs-target="#enCours" type="button" role="tab" aria-controls="enCours" aria-selected="true">
                Commandes à préparer
              </button>
            </li>
            <li class="nav-item" role="presentation">
              <button class="nav-link" id="prete-tab" data-bs-toggle="tab" data-bs-target="#prete" type="button" role="tab" aria-controls="prete" aria-selected="false">
                Commandes prêtes
              </button>
            </li>
            <li class="nav-item" role="presentation">
              <button class="nav-link" id="recupere-tab" data-bs-toggle="tab" data-bs-target="#recupere" type="button" role="tab" aria-controls="recupere" aria-selected="false">
                Commandes récupérées
              </button>
            </li>
          </ul>
          <div class="table-responsive tab-content" id="myTabContent">
            <table class="table tab-pane fade show active" id="enCours" role="tabpanel" aria-labelledby="encours-tab">
              <tr>
                <th>Id</th>
                <th>Client</th>
                <th>Téléphone</th>
                <th>Commande</th>
                <th>Prix</th>
                <th>Date récupération</th>
                <th>Statut</th>
                <th>Modifier le statut</th>
              </tr>
              <tbody>
                @foreach ($commandes_encours as $commande)
                <tr>
                  <td>{{$commande->id}}</td>
                  <td>{{$commande->user->civilite}} {{$commande->user->nom}} {{$commande->user->prenom}}</td>
                  <td>{{$commande->user->telephone}}</td>
                  <td>
                    <a class="btn btn-warning" href="{{url('view_commande_details',$commande->id)}}">Détails</a>
                  </td>
                  <td>{{number_format($commande->montant,2)}} €</td>
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
                    @if($commande->acompte == 'Acompte à payer')
                    <a class="btn btn-warning" onclick="confirmation(event)" href="{{url('acompte',$commande->id)}}">Acompte payé</a>
                    @else
                    <a class="btn btn-primary" href="{{url('pret',$commande->id)}}">Prête</a>
                    @endif
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
            <table class="table tab-pane fade" id="prete" role="tabpanel" aria-labelledby="prete-tab">
              <tr>
                <th>Id</th>
                <th>Client</th>
                <th>Téléphone</th>
                <th>Commande</th>
                <th>Prix</th>
                <th>Date récupération</th>
                <th>Statut</th>
                <th>Modifier le statut</th>
              </tr>
              <tbody>
                @foreach ($commandes_pretes as $commande)
                <tr>
                  <td>{{$commande->id}}</td>
                  <td>{{$commande->user->civilite}} {{$commande->user->nom}} {{$commande->user->prenom}}</td>
                  <td>{{$commande->user->telephone}}</td>
                  <td>
                    <a class="btn btn-warning" href="{{url('view_commande_details',$commande->id)}}">Détails</a>
                  </td>
                  <td>{{number_format($commande->montant,2)}} €</td>
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
                      <a class="btn btn-secondary" href="{{url('encours',$commande->id)}}">Retour en cours</a>
                      <a class="btn btn-success" href="{{url('recupere',$commande->id)}}">Récupérée</a>
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
            <table class="table tab-pane fade" id="recupere" role="tabpanel" aria-labelledby="recupere-tab">
              <tr>
                <th>Id</th>
                <th>Client</th>
                <th>Téléphone</th>
                <th>Commande</th>
                <th>Prix</th>
                <th>Date récupération</th>
                <th>Statut</th>
                <th>Modifier le statut</th>
              </tr>
              <tbody>
                @foreach ($commandes_recuperees as $commande)
                <tr>
                  <td>{{$commande->id}}</td>
                  <td>{{$commande->user->civilite}} {{$commande->user->nom}} {{$commande->user->prenom}}</td>
                  <td>{{$commande->user->telephone}}</td>
                  <td>
                    <a class="btn btn-warning" href="{{url('view_commande_details',$commande->id)}}">Détails</a>
                  </td>
                  <td>{{number_format($commande->montant,2)}} €</td>
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
                    <a class="btn btn-primary" href="{{url('pret',$commande->id)}}">Prête</a>
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  </body>
</html>