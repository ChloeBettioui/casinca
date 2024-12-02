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
        <div class="d-flex">
            <div class="col-6">
                <h3>Objet : {{$message->sujet}}</h3>
                <p>Expéditeur : {{$message->nom}} {{$message->prenom}}</p>
                <p>Email : <a href="mailto:{{$message->email}}">{{$message->email}}</a> </p>
                <p>Reçu le : {{$message->created_at}}</p>
                <p class="border border-dark rounded p-2 bg-white text-dark"><span>{{$message->message}}</span></p>
            </div>
            
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