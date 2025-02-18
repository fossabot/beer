
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Beer!!!</title>

    <!-- Bootstrap core CSS -->
    <link href="/css/bootstrap.min.css" rel="stylesheet">
  </head>

  <body>

    <div class="container">

      <div class="starter-template">
        @yield ('content')
      </div>

    </div><!-- /.container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    <script src="/js/tether.min.js"></script>
    <script src="/js/bootstrap.min.js"></script>
    <script src="/js/sweetalert.min.js"></script>
    <script>
      jQuery.ajaxSetup({
        "error":function() { swal("Det skete en fejl.","","error",{timer: 3000});  }
      });

      function buy(room,type,quantity) {
        jQuery.getJSON('{{env('APP_URL')}}api/buy/'+room+'/'+type+'/'+quantity,
            function(data){
              swal('Køb: '+quantity+' '+data.product, data.name+' \n Ny saldo: '+data.sum+' kr.', 'success',{timer: 3000});
            })
      }

      function sum(room,type,quantity) {
        jQuery.getJSON('{{env('APP_URL')}}api/sum/'+room,
            function(data){
              swal('Saldo: '+data.data.sum + ' kr.', data.data.name,{timer: 3000});
            })
      }

      function refund(id) {
        jQuery.getJSON('{{env('APP_URL')}}api/refund/'+id,
            function(data){
              swal('Refunderet', 'Beløb: '+data.data.amount,'success',{timer: 3000}).then((value) => location.reload());
            })
      }
    </script>
  </body>
</html>
