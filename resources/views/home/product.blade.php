<!DOCTYPE html>
<html>
  <head>
    @include('home.css')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
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
                <div class="row detail-box">
                  <h6 class="col-sm-12 col-md-6 col-lg-6">{{$product->title}}</h6>
                  <h6 class="col-sm-12 col-md-5 col-lg-6 pr-0">Prix : <span>{{number_format($product->price,2)}}€</span></h6>
                </div>
                <div class="btn-box">
                  <a href="{{url('produit_details',$product->id)}}">Détails</a>
                  <br>
                  <a class="ajoutpanier" href="#" data-id="{{$product->id}}">
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
  
    <!-- JavaScript files-->
    <script>
      const addToCartLinks = document.querySelectorAll('.ajoutpanier');

      // Ajouter un écouteur d'événement à chaque lien
      addToCartLinks.forEach(link => {
        link.addEventListener('click', async (event) => {
          event.preventDefault(); // Empêche le comportement par défaut
          // Récupérer l'ID du produit depuis l'attribut data-id
          const productId = event.target.getAttribute('data-id');

          try {
            const response = await fetch(`/update_panier/${productId}`);

            // Réponse à afficher
            const data = await response.json();
            if (data.error) {
              Swal.fire({
                icon: 'error',
                title: 'Erreur',
                text: data.error
              }).then(() => {
                // Actualiser la page après fermeture de la popup
                window.location.reload();
              });
            } else {
              Swal.fire({
                icon: 'success',
                title: 'Succès',
                text: data.success
              }).then(() => {
                window.location.reload();
              });
            }
          } catch (error) {
            Swal.fire({
              icon: 'error',
              title: 'Erreur',
              text: 'Une erreur est survenue. Veuillez réessayer.'
            }).then(() => {
              window.location.reload();
            });
            console.error('Erreur:', error);
          }
        });
      });
    </script>
  </body>
</html>
