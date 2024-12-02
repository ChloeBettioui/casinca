<h2 class="h5 no-margin-bottom">Tableau de bord</h2>

<section class="no-padding-top no-padding-bottom">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-3 col-sm-6">
        <div class="statistic-block block">
          <div class="progress-details d-flex align-items-end justify-content-between">
            <div class="title">
              <div class="icon"><i class="fa fa-user-o"></i></div><strong>Total Clients</strong>
            </div>
            <a href="{{url('view_users')}}" class="number dashtext-2">{{$user}}</a>
          </div>
          <div class="progress progress-template">
            <div role="progressbar" style="width: 100%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" class="progress-bar progress-bar-template dashbg-2"></div>
          </div>
        </div>
      </div>
      <div class="col-md-3 col-sm-6">
        <div class="statistic-block block">
          <div class="progress-details d-flex align-items-end justify-content-between">
            <div class="title">
              <div class="icon"><i class="fa fa-shopping-basket"></i></div><strong>Total Produits</strong>
            </div>
            <a href="{{url('view_product')}}" class="number dashtext-1">{{$products}}</a>
          </div>
          <div class="progress progress-template">
            <div role="progressbar" style="width: 100%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" class="progress-bar progress-bar-template dashbg-1"></div>
          </div>
        </div>
      </div>
      <div class="col-md-3 col-sm-6">
        <div class="statistic-block block">
          <div class="progress-details d-flex align-items-end justify-content-between">
            <div class="title">
              <div class="icon"><i class="fa fa-list-alt"></i></div><strong>Total Commandes</strong>
            </div>
            <a href="{{url('view_commandes')}}" class="number dashtext-4">{{$commande}}</a>
          </div>
          <div class="progress progress-template">
            <div role="progressbar" style="width: 100%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" class="progress-bar progress-bar-template dashbg-4"></div>
          </div>
        </div>
      </div>
      <div class="col-md-3 col-sm-6">
        <div class="statistic-block block">
          <div class="progress-details d-flex align-items-end justify-content-between">
            <div class="title">
              <div class="icon"><i class="fa fa-check-circle-o"></i></div><strong>Total Délivrées</strong>
            </div>
            <div class="number dashtext-2">{{$delivered}}</div>
          </div>
          <div class="progress progress-template">
            <div role="progressbar" style="width:{{$deliveredPourCent}}%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" class="progress-bar progress-bar-template dashbg-2"></div>
          </div>
        </div>
      </div>
      <div class="col-md-3 col-sm-6">
        <div class="statistic-block block">
          <div class="progress-details d-flex align-items-end justify-content-between">
            <div class="title">
              <div class="icon"><i class="fa fa-envelope-o"></i></div><strong>Total Messages</strong>
            </div>
            <a href="{{url('view_messages')}}" class="number dashtext-1">{{$message}}</a>
          </div>
          <div class="progress progress-template">
            <div role="progressbar" style="width: 100%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" class="progress-bar progress-bar-template dashbg-1"></div>
          </div>
        </div>
      </div>
      <div class="col-md-3 col-sm-6">
        <div class="statistic-block block">
          <div class="progress-details d-flex align-items-end justify-content-between">
            <div class="title">
              <div class="icon"><i class="fa fa-list-alt"></i></div><strong>Total Annonces</strong>
            </div>
            <a href="{{url('view_annonces')}}" class="number dashtext-4">{{$annonce}}</a>
          </div>
          <div class="progress progress-template">
            <div role="progressbar" style="width: 100%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" class="progress-bar progress-bar-template dashbg-4"></div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<footer class="footer">
  <div class="footer__block block no-margin-bottom">
    <div class="container-fluid text-center">
      <!-- Please do not remove the backlink to us unless you support us at https://bootstrapious.com/donate. It is part of the license conditions. Thank you for understanding :)-->
      <p class="no-margin-bottom">2024 &copy; Casinca. Download From <a target="_blank" href="https://templateshub.net">Templates Hub</a>.</p>
    </div>
  </div>
</footer>