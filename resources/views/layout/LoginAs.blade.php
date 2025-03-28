<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
        <link rel="icon" type="image/png" href="../assets/img/favicon.ico">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
        <title>LOGIN E-COMPLAIN PUSKESMAS  DADOK TUNGGUL HITAM</title>
        <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
        <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" />
        <link href="/../assets/css/bootstrap.min.css" rel="stylesheet" />
        <link href="/../assets/css/login.css" rel="stylesheet" />
    </head>
    <body>
    <section style="background-color:rgb(101, 139, 223);" class="py-5">
  <div class="container py-5 h-300">
    <div class="row d-flex justify-content-center align-items-center h-100 py-5">
      <div class="col-12 col-md-8 col-lg-6 col-xl-5">
        <div class="card shadow-2-strong" style="border-radius: 1rem;">
          <div class="card-body p-5 text-center">

            <h3 class="mb-5">Welcome To Website E-Complain Puskesmas Dadok Tunggul Hitam</h3>
            <div class="form-check d-flex justify-content-start mb-4">
              <label class="form-check-label" for="form1Example3"> Silahkan pilih role untuk mengakses web </label>
            </div>

            <hr class="my-4">

                <a class="btn btn-primary btn-lg btn-block" style="color:white;" href="{{ in_array('Admin', $level) ? url('login') : '#' }}" name="admin">Admin</a>
                <a class="btn btn-lg btn-block btn-primary" style="background-color: #dd4b39;color:white;" href="{{ in_array('Pasien', $level) ? url('home') : '#' }}" name="pasien">Pasien</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
    </body>
    <!--   Core JS Files   -->
<script src="/../assets/js/core/jquery.3.2.1.min.js" type="text/javascript"></script>
<script src="/../assets/js/core/popper.min.js" type="text/javascript"></script>
<script src="/../assets/js/core/bootstrap.min.js" type="text/javascript"></script>
<!--  Plugin for Switches, full documentation here: http://www.jque.re/plugins/version3/bootstrap.switch/ -->
<script src="/../assets/js/plugins/bootstrap-switch.js"></script>
<!-- Control Center for Light Bootstrap Dashboard: scripts for the example pages etc -->
<script src="/../assets/js/light-bootstrap-dashboard.js?v=2.0.0 " type="text/javascript"></script>
<script>
$(document).ready(function() {
    $('.dropdown-toggle').dropdown();

    $('.dropdown-item').click(function() {
        $('.dropdown-toggle').dropdown('hide');
    });
});
</script>
</html>
