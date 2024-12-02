<div class="categorie_section">
    <nav class="navbar navbar-expand-lg custom_nav-container p-0">
        <button class=" col-12 navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCategory" aria-controls="navbarCategory" aria-expanded="false" aria-label="Toggle navigation">
            <span class=""></span>
            <p>Catégories</p>
        </button>
        <div class="collapse navbar-collapse" id="navbarCategory">
            <ul class="nav nav-tabs mr-2">
                <li class="nav-item">
                    <a class="nav-link" href="{{url('produit')}}">
                        <div class="img-box">
                            <img src="/category/tous.png" alt="Tous">
                        </div>
                        Tous
                    </a>
                </li>
                @foreach ($category as $categorie)
                <li class="nav-item {{ request()->is('produit/'.$categorie->category_name) ? 'actuel' : '' }}">
                    <a class="nav-link" href="{{url('produit',$categorie->category_name)}}">
                        <div class="img-box">
                            <img src="/category/{{$categorie->image}}" alt="{{$categorie->category_name}}">
                        </div>
                        {{$categorie->category_name}}
                    </a>
                </li>
                @endforeach
            </ul>
        </div>
    </nav>
</div>