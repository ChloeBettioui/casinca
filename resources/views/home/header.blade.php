<header class="header_section">
    <nav class="navbar navbar-expand-lg custom_nav-container p-0">
      <button class=" col-12 navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarHeader" aria-controls="navbarHeader" aria-expanded="false" aria-label="Toggle navigation">
        <span class=""></span>
        <p>Menu</p>
      </button>

      <div class="collapse navbar-collapse" id="navbarHeader">
        <ul class="navbar-nav mr-2">
          <li class="nav-item {{ request()->is('/') ? 'active' : '' }}">
            <a class="nav-link" href="{{url('/')}}">Accueil</a>
          </li>
          <li class="nav-item {{ request()->is('produit') || request()->is('produit/*') ? 'active' : '' }}">
            <a class="nav-link" href="{{url('/produit')}}">Produits</a>
          </li>
          <li class="nav-item {{ request()->is('contact') ? 'active' : '' }}">
            <a class="nav-link" href="{{url('/contact')}}">Nous Contacter</a>
          </li>
          @if (Route::has('login'))
          @auth
          <li class="nav-item {{ request()->is('commandes') ? 'active' : '' }}">
            <a class="nav-link" href="{{url('/commandes')}}">Mes Commandes</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{url('panier')}}">
              <i class="fa fa-shopping-bag" aria-hidden="true"></i>
              {{$count}}
            </a>
          </li>
          @endauth
          @endif
        </ul>
        @if (Route::has('login'))
          @auth
          <div class="user_option">
            <!-- Log out -->
            <div class="list-inline-item logout">                   
              <form method="POST" action="{{ route('logout') }}">
                @csrf
                <x-responsive-nav-link :href="route('logout')"
                        onclick="event.preventDefault();
                                    this.closest('form').submit();">
                  <i class="fa fa-user" aria-hidden="true"></i>
                  Déconnexion
                </x-responsive-nav-link>
              </form>
            </div>
          </div>
          @else
          <div class="user_option">
            <a href="{{url('/login')}}">
              <i class="fa fa-user" aria-hidden="true"></i>
              <span>
                Connexion
              </span>
            </a>
            <a href="{{url('/register')}}">
              <i class="fa fa-vcard" aria-hidden="true"></i>
              <span>
                S'enregistrer
              </span>
            </a>
          </div>
          @endauth
        @endif
      </div>
    </nav>
  </header>