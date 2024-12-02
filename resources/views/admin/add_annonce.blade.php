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
          <h1 style="color:white;">Ajouter une annonce</h1>
          <div class="div_deg">
            <form action="{{url('upload_annonce')}}" method="post" enctype="multipart/form-data">
              @csrf
              <div class="input_deg">
                  <label>Description de l'annonce</label>
                  <textarea name="description" required></textarea>
              </div>
              <div class="input_deg">
                  <label>Produit</label>
                  <select name="produit" required>
                      <option value="">Choisir une option</option>
                      @foreach ($produits as $produit)
                      <option value="{{$produit->id}}">{{$produit->title}}</option>
                      @endforeach
                  </select>
              </div>
              <div class="input_deg">
                <label>Actif</label>
                <div class="form-check">
                  <input type="radio" class="form-check-input" id="oui" name="actif" value="oui" checked>Oui
                  <label class="form-check-label" for="oui"></label>
                </div>
                <div class="form-check">
                  <input type="radio" class="form-check-input" id="non" name="actif" value="non">Non
                  <label class="form-check-label" for="non"></label>
                </div>
              </div>
              <div class="input_deg">
                  <label>Image de l'annonce</label>
                  <input type="file" name="image" required>
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