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
          <h1 style="color:white;">Ajouter une catégorie</h1>
          <div class="div_deg">
            <form action="{{url('upload_categorie')}}" method="post" enctype="multipart/form-data">
              @csrf
              <div class="input_deg">
                  <label>Nom de la catégorie</label>
                  <input type="text" name="category" required>
              </div>
              <div class="input_deg">
                  <label>Image de la catégorie</label>
                  <input type="file" name="image">
              </div>
              <div class="input_deg">
                  <input class="btn btn-success" type="submit" value="Ajouter">
              </div>
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