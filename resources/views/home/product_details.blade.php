<!DOCTYPE html>
<html>

<head>
    @include('home.css')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
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
                        <h6>
                            <p>Description :</p>
                            <textearea>{{$product->description}}</textarea>
                        </h6>
                    </div>
                    <div class="detail-box">
                        <h6>Prix :
                            <span>{{$product->price}}€</span>
                        </h6>
                        <div class="btn-box">
                            <a id="ajoutpanier" href="#" data-id="{{$product->id}}">
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

  <!-- JavaScript files-->
  <script>
    const addToCartLink = document.getElementById('ajoutpanier');
    addToCartLink.addEventListener('click', async (event) => {
        event.preventDefault();
        const productId = addToCartLink.getAttribute('data-id');

        try {
            const response = await fetch(`/update_panier/${productId}`);

            // Réponse à afficher
            const data = await response.json();

            // Afficher un message en fonction de la réponse
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
    </script>
</body>

</html>