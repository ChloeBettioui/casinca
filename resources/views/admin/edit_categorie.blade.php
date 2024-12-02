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
                <h1 style="color:white;">Modifier une catégorie</h1>
                <div class="div_deg">
                    <form action="{{url('update_categorie',$data->id)}}" method="post" enctype="multipart/form-data">
                      @csrf
                      <input type="text" name="category" value="{{$data->category_name}}">
                      <div class="input_deg">
                        <label>Image de la catégorie</label>
                        <img width="100" src ="/category/{{$data->image}}">
                      </div>
                      <div class="input_deg">
                        <label>Nouvelle Image</label>
                        <input type="file" name="image">
                      </div>
                      <input class="btn btn-primary" type="submit" value="Modifier">
                    </form>
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