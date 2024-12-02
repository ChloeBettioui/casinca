<!DOCTYPE html>
<html>

<head>
    @include('home.css')
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
            ?>
            @foreach ($articles as $article)
            <tr>
              <td>{{$article->product->title}}</td>
              <td>{{$article->product->price}} €</td>
              <td>
                <img width="150" src="/products/{{$article->product->image}}">
              </td>
              <td  class="btn-box">
                <a href="{{url('substract_composer', $article->id)}}">-</a>
                {{$article->quantite}}
                <a href="{{url('update_panier', $article->product->id)}}">+</a>
              </td>
              <td>
                <a class="btn btn-danger" href="{{url('delete_composer', $article->id)}}">
                  <i class="fa fa-trash"></i>
                </a>
              </td>
            </tr>
            <?php 
            $value=$value + ($article->product->price * $article->quantite);
            ?>
            @endforeach
        </table>
      </div>
      <div class="col-lg-3 col-md-3 col-sm-12 container container-bg">
        <form action="{{url('valider_panier')}}" method="Post">
          @csrf
          <div>
            <label>Commentaire</label>
            <textarea name="commentaire"></textarea>
          </div>
          <div>
            <label>Date de récupération</label>
            <input type="date" name="date_recuperation" required>
          </div>
          <div>
            <label>Total</label>
            <input type="text" name="prix" value="{{$value}} €" disabled>
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

</body>

</html>