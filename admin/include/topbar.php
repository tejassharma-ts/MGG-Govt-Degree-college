<?php
ob_start();
if(!$_SESSION['u']){
	header('location:login.php');
	}
include('config/connection.php');
?>
<style>
@media (max-width:500px){
  .btn1 {
	  margin-left: 0px;
	}
}

</style>
<nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
	<div class="col-lg-3 col-md-3 col-sm-6 col-xs-6">
	<button class="btn btn-primary" id="menu-toggle">Toggle Menu</button>
	</div>
	<div class="col-lg-9 col-md-9 col-sm-6 col-xs-6">
	
	</div>
</nav>
  <!-- Menu Toggle Script -->
  <script>
    $("#menu-toggle").click(function(e) {
      e.preventDefault();
      $("#wrapper").toggleClass("toggled");
    });
  </script>
 <?php
 ob_flush();
 ?>
 <head>
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
 </head>