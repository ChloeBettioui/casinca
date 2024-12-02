<!DOCTYPE html>
<html>

<head>
    @include('home.css')
</head>
<body>
  @include('home.header')

  <section class="container_section">
    <div class="container px-1">
      <div class="heading_container">
        <h1>Contacter nous !</h1> 
        <h4>Pour des questions à propos d'une commande ou des informations sur nos produits.</h4>
        <p>
          La casinca
          <br/>29 avenue du lac
          <br/>21000 Dijon
          <br/>03.80.10.12.31
        </p>
      </div>
    </div>
    <div class="container container-bg">
      <div class="row">
        <div class="col-lg-7 col-md-6 px-0">
          <div class="map_container">
            <iframe class="map-responsive" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2704.67452311649!2d5.000685776213295!3d47.32069667116497!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47f29d734dcea093%3A0xa0485401269ca96d!2sCasinca!5e0!3m2!1sfr!2sma!4v1722020297561!5m2!1sfr!2sma" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>  </mat-grid-tile>
          </div>
        </div>
        <div class="col-lg-5 col-md-6 px-0">
          <form action="{{url('send_message')}}" method="Post">
            @csrf
            <div>
              <label>Nom</label>
              <input type="text" name="nom" required/>
            </div>
            <div>
              <label>Prénom</label>
              <input type="text" name="prenom" required/>
            </div>
            <div>
              <label>Email</label>  
              <input type="email" name="email" required/>
            </div>
            <div>
              <label>Sujet</label>
              <input type="text" name="sujet" required/>
            </div>
            <div>
              <label>Message</label>
              <textarea name="message" required></textarea>
            </div>
            <div class="btn-box">
              <input type="submit" value="Envoyer">
            </div>
          </form>
        </div>
        
      </div>
    </div>
  </section>

  @include('home.footer')
</body>

</html>