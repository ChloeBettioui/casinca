<!DOCTYPE html>
<html>
  <head> 
    @include('admin.css')
  </head>
  <body>
    @include('admin.header')

    @include('admin.sidebar')
    <!-- Sidebar Navigation end-->
    <div class="page-content">
      <div class="page-header">
        <div class="container-fluid">
          <div class="table-responsive"> 
            <table class="table">
              <tr> 
                <th>Catégorie</th>
                <th>Image</th>
                <th>Modifier</th>
                <th>Supprimer</th>
              </tr>
              @foreach ($data as $data)
              <tr>
                <td>{{$data->category_name}}</td>
                <td>
                  <img height="80" src="category/{{$data->image}}">
                </td>
                <td>
                  <a class="btn btn-warning" href="{{url('edit_categorie',$data->id)}}">
                    <i class="fa fa-edit"></i>
                  </a>
                </td>
                <td>
                  <a class="btn btn-danger" onclick="confirmation(event)" href="{{url('delete_categorie', $data->id)}}">
                    <i class="fa fa-trash"></i>
                  </a>
                </td>
              </tr>
              @endforeach
            </table>
          </div>
        </div>
      </div>
    </div>
    <!-- JavaScript files-->
    <script type="text/javascript">
      function confirmation(ev) {
        ev.preventDefault();
        var urlToRedirect = ev.currentTarget.getAttribute('href');
        console.log(urlToRedirect);
        swal({
          title:"Etes vous sur de vouloir supprimer",
          text:"Cette suppression est permanente",
          icon:"warning",
          buttons:true,
          dangerMode:true,
        }).then((willCancel)=>{
          if(willCancel) {
            window.location.href=urlToRedirect;
          }
        })
      }
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="{{asset('admincss/vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('admincss/vendor/popper.js/umd/popper.min.js')}}"> </script>
    <script src="{{asset('admincss/vendor/bootstrap/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('admincss/vendor/jquery.cookie/jquery.cookie.js')}}"> </script>
    <script src="{{asset('admincss/vendor/chart.js/Chart.min.js')}}"></script>
    <script src="{{asset('admincss/vendor/jquery-validation/jquery.validate.min.js')}}"></script>
    <script src="{{asset('admincss/js/charts-home.js')}}"></script>
    <script src="{{asset('admincss/js/front.js')}}"></script>
  </body>
</html>