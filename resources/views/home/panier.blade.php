<!DOCTYPE html>
<html>

<head>
    @include('home.css')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body>
  <!-- header section strats -->
  @include('home.header')

  <section class="container_section mt-3">
    <div class="row">
      <div class="col-lg-8 col-md-8 col-sm-12 table-responsive">
        <table class="table">
            <tr>
              <th>Produit</th>
              <th>Prix</th>
              <th>Image</th>
              <th>Quantité</th>
              <th>Supprimer</th>
            </tr>
            <?php
            $value=0;
            $quantite=0;
            ?>
            @foreach ($articles as $article)
            <tr>
              <td>{{$article->product->title}}</td>
              <td>{{number_format($article->prix,2)}} €</td>
              <td>
                <img width="150" src="/products/{{$article->product->image}}">
              </td>
              <td  class="btn-box">
                <a href="{{url('substract_composer', $article->id)}}">-</a>
                {{$article->quantite}}
                <a href="{{url('add_composer', $article->id)}}">+</a>
              </td>
              <td class="d-flex justify-content-center">
                <a class="btn btn-danger" href="{{url('delete_composer', $article->id)}}">
                  <i class="fa fa-trash"></i>
                </a>
              </td>
            </tr>
            <?php 
            $value=$value + ($article->prix * $article->quantite);
            $quantite= ($quantite<=$article->quantite) ? $article->quantite : $quantite;
            ?>
            @endforeach
        </table>
      </div>
      <div class="col-lg-3 col-md-3 col-sm-12 container container-bg">
        <form id="panier" action="{{url('valider_panier')}}" method="Post">
          @csrf
          <div>
            <label>Commentaire</label>
            <textarea name="commentaire"> {{$quantite}}</textarea>
          </div>
          <div>
            <label>Date de récupération</label>
            <input type="date" name="date_recuperation" required>
          </div>
          <div>
            <label>Total</label>
            <input type="text" name="prix" value="{{number_format($value,2)}} €" disabled>
          </div>
          <div class="btn-box">
            <input type="submit" value="Commander">
          </div>
        </form>
      </div>
    </div>
  </section>
  <!-- info section -->
  @include('home.footer')

  <script type="text/javascript">
    document.getElementById('panier').addEventListener('submit', function (e) {
      e.preventDefault();
      const value = <?php echo json_encode($value); ?>;
      const quantite = <?php echo json_encode($quantite); ?>;
      if(value>=40 || quantite>=20){
        Swal.fire({
          title: 'Êtes vous sur de valider cette commande ?',
          text: 'Votre commande dépasse les 40 € ou 20 articles identiques. Un acompte vous est demandé dans les 24h.',
          showCancelButton: true,
          confirmButtonColor: 'green',
          cancelButtonColor: 'red',
          confirmButtonText: 'Valider',
          cancelButtonText: 'Annuler'
        }).then((result) => {
          if (result.isConfirmed) {
            this.submit();
          }
        });
      } else {
        this.submit();
      }
    });
  </script>
</body>
</html>