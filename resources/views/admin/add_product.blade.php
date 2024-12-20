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
          <h1 style="color:white;">Ajouter un produit</h1>
          <div class="div_deg">
            <form action="{{url('upload_product')}}" method="post" enctype="multipart/form-data">
              @csrf
              <div class="input_deg">
                  <label>Nom du produit</label>
                  <input type="text" name="title" required>
              </div>
              <div class="input_deg">
                  <label>Description</label>
                  <textarea name="description" required></textarea>
              </div>
              <div class="input_deg">
                  <label>Prix</label>
                  <input type="float" step="0.01" name="price">
              </div>
              <div class="input_deg">
                <label>Actif</label>
                <div class="form-check">
                  <input type="radio" class="form-check-input" id="oui" name="actif" value="oui" checked>Oui
                  <label class="form-check-label" for="oui"></label>
                  <input type="radio" class="form-check-input" id="non" name="actif" value="non">Non
                  <label class="form-check-label" for="non"></label>
                </div>
              </div>
              <div class="input_deg">
                  <label>Catégorie</label>
                  <select name="category" required>
                      <option value="">Choisir une option</option>
                      @foreach ($category as $category)
                      <option value="{{$category->category_name}}">{{$category->category_name}}</option>
                      @endforeach
                  </select>
              </div>
              <div class="input_deg">
                  <label>Image du produit</label>
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