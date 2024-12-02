<!DOCTYPE html>
<html>

<head>
    @include('home.css')
</head>

<body>
    <!-- header section strats -->
    @include('home.header')

    <!-- product details -->
    <section class="shop_section row justify-content-center">
        <div class="col-10 my-5">
                <div class="box row">
                    <div class="col-sm-10 col-md-6 col-lg-6 d-flex justify-content-center">
                        <img width="80%" src="/products/{{$product->image}}" alt="{{$product->title}}">
                    </div>
                    <div class="col-sm-12 col-md-6 col-lg-6">
                        <div class="d-flex justify-content-center">
                            <h4>{{$product->title}}</h4>
                        </div>
                        <div class="detail-box">
                            <h6>Catégorie :
                                <span>{{$product->category}}</span>
                            </h6>
                        </div>
                        <div class="detail-box">
                            <h6>Poids :
                                <span>{{$product->poids}} gr</span>
                            </h6>
                        </div>
                        <div class="detail-box">
                            <h6>Description :
                                <p>{{$product->description}}</p>
                            </h6>
                        </div>
                        <div class="detail-box">
                            <h6>Prix :
                                <span>{{$product->price}}€</span>
                            </h6>
                        <div class="btn-box">
                            <a href="{{url('update_panier', $product->id)}}">
                                <i class="fa fa-shopping-bag" aria-hidden="true"></i>
                            </a>
                        </div>
                        </div>
                    </div>
                </div>
        </div>
    </section>

  <!-- info section -->
  @include('home.footer')

</body>

</html>