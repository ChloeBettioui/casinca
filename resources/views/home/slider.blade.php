<section class="slider_section">
    <div class="container px-0 pb-2">
      <div class="heading_container">
        <div class="img-box">
          <img class="img-header" src="images/boulangerie.jpg" alt="" />
        </div>
        <h3 class="row justify-content-center">
          Offres du moment
        </h3>
        <div class="row justify-content-center">
          <div class="col-10 text-center">
            Venez vite en boutique pour savourer nos délicieuses créations et bénéficier de ces offres irrésistible.
          </div>
          <div class="col-10 text-center">
            N'attendez plus, c'est le moment de vous faire plaisir !
          </div>
        </div>
      </div>
      <div class="row justify-content-center">
        @foreach ($annonces as $annonce)
        <div class="col-sm-6 col-md-4 col-lg-3">
          <div class="box">
            <div class="img-box">
              <img src="/annonces/{{$annonce->image}}"alt=""/>
            </div>
            <div class="detail-box">
              <p>
                {{$annonce->description}}
              </p>
            </div>
            <div class="btn-box">
              <a href="{{url('produit_details',$annonce->product->id)}}">
                Acheter maintenant
              </a>
            </div>
          </div>
        </div>
        @endforeach
      </div>
    </div>
  </section>