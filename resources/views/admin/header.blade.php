<header class="header">   
    <nav class="navbar navbar-expand-lg">
      <div class="search-panel">
        <div class="search-inner d-flex align-items-center justify-content-center">
          <div class="close-btn">Fermer <i class="fa fa-close"></i></div>
          <form id="searchForm" action="#">
            <div class="form-group">
              <input type="search" name="search" placeholder="What are you searching for...">
              <button type="submit" class="submit">Rechercher</button>
            </div>
          </form>
        </div>
      </div>
      <div class="container-fluid d-flex align-items-center justify-content-between">
        <div class="navbar-header">
          <!-- Navbar Header--><a href="{{url('admin/dashboard')}}" class="navbar-brand">
            <div class="brand-text brand-big visible text-uppercase"><strong class="text-primary">Admin</strong></div>
            <div class="brand-text brand-sm"><strong class="text-primary">Chloé</strong></div></a>
          <!-- Sidebar Toggle Btn-->
          <button class="sidebar-toggle"><i class="fa fa-long-arrow-left"></i></button>
        </div>
        
        <!-- Log out -->
        <div class="list-inline-item logout">                   
          <form method="POST" action="{{ route('logout') }}">
            @csrf
            <x-responsive-nav-link :href="route('logout')"
                    onclick="event.preventDefault();
                                this.closest('form').submit();">
              Déconnexion
            </x-responsive-nav-link>
          </form>
        </div>
      </div>
    </nav>
  </header>