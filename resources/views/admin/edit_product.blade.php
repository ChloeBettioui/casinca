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
              <h1 style="color:white;">Modifier un produit</h1>
              <h2>{{$product->title}}</h2>
              <div class="div_deg">
                <form action="{{url('update_product',$product->id)}}" method="post" enctype="multipart/form-data">
                  @csrf
                  <div class="input_deg"">
                    <label>Nom du produit</label>
                    <input type="text" name="title" value="{{$product->title}}" required>
                  </div>
                  <div class="input_deg">
                    <label>Description</label>
                    <textarea name="description">
                    {{$product->description}}
                    </textarea>
                  </div>
                  <div class="input_deg">
                    <label>Prix</label>
                    <input type="text" name="price" value="{{$product->price}}">
                  </div>
                  <div class="input_deg">
                    <label>Actif</label>
                    <div class="form-check">
                      <input type="radio" class="form-check-input" id="oui" name="actif" value="oui" {{$product->actif==1 ? 'checked' : ''}}>Oui
                      <label class="form-check-label" for="oui"></label>
                      <input type="radio" class="form-check-input" id="non" name="actif" value="non" {{$product->actif==1 ? '' : 'checked'}}>Non
                      <label class="form-check-label" for="non"></label>
                    </div>
                  </div>
                  <div class="input_deg">
                    <label>Catégorie</label>
                    <select name="category" required>
                      <option value="{{$product->category}}">{{$product->category}}</option>
                      @foreach ($category as $category)
                        <option value="{{$category->category_name}}">{{$category->category_name}}</option>
                      @endforeach
                    </select>
                  </div>
                  <div class="input_deg">
                    <label>Image du produit</label>
                    <img width="100" src ="/products/{{$product->image}}">
                  </div>
                  <div class="input_deg">
                    <label>Nouvelle Image</label>
                    <input type="file" name="image">
                  </div>
                  <div class="input_deg">
                    <input class="btn btn-primary" type="submit" value="Modifier">
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