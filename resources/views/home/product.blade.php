<!DOCTYPE html>
<html>
  <head>
    @include('home.css')
  </head>
  <body>
    @include('home.header')

    <section class="shop_section">
      <div class="container px-0 py-2">
        @include('home.categorie')
        <div class="row">
          @foreach ($products as $product)
          <div class="col-sm-6 col-md-4 col-lg-3">
            <div class="box">
                <div class="img-box">
                  <img src="/products/{{$product->image}}" alt="{{$product->title}}">
                </div>
                <div class="detail-box">
                  <h6>{{$product->title}}</h6>
                  <h6>
                    Prix :
                    <span>{{$product->price}} €</span>
                  </h6>
                </div>
                <div class="btn-box">
                  <a href="{{url('produit_details',$product->id)}}">Détails</a>
                  <br>
                  <a href="{{url('update_panier', $product->id)}}">
                    <i class="fa fa-shopping-bag" aria-hidden="true"></i>
                  </a>
                </div>
            </div>
          </div>
          @endforeach
        </div>
      </div>
    </section>
    
    @include('home.footer')
  </body>
</html>
