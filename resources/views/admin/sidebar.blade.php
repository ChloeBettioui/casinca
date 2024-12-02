<div class="d-flex align-items-stretch">
    <!-- Sidebar Navigation-->
    <nav id="sidebar">
      <!-- Sidebar Header-->
      <div class="sidebar-header d-flex align-items-center">
        <div class="avatar"><img src="{{asset('admincss/img/chloe bettioui.jpg')}}" alt="Admin" class="img-fluid rounded-circle"></div>
        <div class="title">
          <h1 class="h5">Bettioui Chloé</h1>
          <p>Casinca</p>
        </div>
      </div>
      <!-- Sidebar Navidation Menus-->
      <ul class="list-unstyled">
        <li>
          <a href="{{url('admin/dashboard')}}"> <i class="fa fa-home"></i>Tableau de bord</a>
        </li>
        <li>
          <a href="{{url('view_commandes')}}"> <i class="fa fa-list-alt"></i>Commandes</a>
        </li>
        <li>
          <a href="{{url('view_users')}}"> <i class="fa fa-user-o"></i>Utilisateurs</a>
        </li>
        <li>
          <a href="{{url('view_messages')}}"> <i class="fa fa-envelope-o"></i>Messages</a>
        </li>
        <li>
          <a href="#product" aria-expanded="false" data-toggle="collapse"> <i class="fa fa-shopping-basket"></i>Produits</a>
          <ul id="product" class="collapse list-unstyled">
            <li><a href="{{url('add_product')}}">Ajouter</a></li>
            <li><a href="{{url('view_product')}}">Produits</a></li>
          </ul>
        </li>
        <li>
          <a href="#annonce" aria-expanded="false" data-toggle="collapse"> <i class="fa fa-bullhorn"></i>Annonces</a>
          <ul id="annonce" class="collapse list-unstyled">
            <li><a href="{{url('add_annonce')}}">Ajouter</a></li>
            <li><a href="{{url('view_annonces')}}">Annonces</a></li>
          </ul>
        </li>
        <li>
          <a href="#categorie" aria-expanded="false" data-toggle="collapse"> <i class="fa fa-file-o"></i>Catégories</a>
          <ul id="categorie" class="collapse list-unstyled">
            <li><a href="{{url('add_categorie')}}">Ajouter</a></li>
            <li><a href="{{url('view_categorie')}}">Catégories</a></li>
          </ul>
        </li>
      </ul>
    </nav>