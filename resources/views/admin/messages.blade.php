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
          <!-- <form action="{{url('search_orders')}}" method="get">
            <input type="search" name="search">
            <input type="submit" class="btn btn-secondary" value="Search">
          </form> -->
          <div class="table-responsive">
            <table class="table">
                <tr>
                    <th>Nom</th>
                    <th>Prénom</th>
                    <th>Email</th>
                    <th>Sujet</th>
                    <th>Afficher les détails</th>
                </tr>

                @foreach ($messages as $message)
                <tr>
                    <td>{{$message->nom}}</td>
                    <td>{{$message->prenom}}</td>
                    <td>
                      <a href="mailto:{{$message->email}}">{{$message->email}}</a>
                    </td>
                    <td>{{$message->sujet}}</td>
                    <td>
                      <a class="btn btn-primary" href="{{url('message_details',$message->id)}}">Détails</a>
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