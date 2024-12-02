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
          <div class="table-responsive">
            <table class="table">
                <tr>
                    <th>Type d'utilisateur</th>
                    <th>Civilité</th>
                    <th>Nom</th>
                    <th>Email</th>
                    <th>Téléphone</th>
                    <th>Supprimer</th>
                </tr>

                @foreach ($users as $user)
                <tr>
                    <td>{{$user->usertype}}</td>
                    <td>{{$user->civilite}}</td>
                    <td>{{$user->nom}} {{$user->prenom}}</td>
                    <td>{{$user->email}}</td>
                    <td>{{$user->telephone}}</td>
                    <td>
                        <a class="btn btn-danger" onclick="confirmation(event)" href="{{url('delete_user', $user->id)}}">
                        <i class="fa fa-trash"></i>
                        </a>
                    </td>
                </tr>
                @endforeach
            </table>
          </div>
        </div>
      </div>
    </div>
    <!-- JavaScript files-->
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