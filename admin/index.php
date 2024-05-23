<?php
ob_start();
session_start();

if(!isset($_SESSION['u'])) {
    header('location:login.php');
}
include('config/connection.php');
?>

<?php include_once("include1/sidenav.php"); ?>
<!-- ====================================
      ——— PAGE WRAPPER
      ===================================== -->
<div class="page-wrapper">


    <?php include_once("include1/header.php"); ?>
    <!-- ====================================
        ——— CONTENT WRAPPER
        ===================================== -->
    <div class="content-wrapper container">
        <div class="content">
            <!-- Top Statistics -->
            <div class="row">

                <div class="col-lg-9" style="margin-top:6rem;">

                    <img src="img/w1.png" width="140%">
                </div>
            </div>
        </div>
    </div>
</div>

<?php include_once("include1/footer.php"); ?>
<?php
if(isset($_GET['sucess'])) {
    if($_GET['sucess'] == 1) {
        ?>
<script>
alert("You are successfully login! Thankyou..");
</script>
<?php
    }
}
?>


<?php
ob_flush();
?>
<script>
        var toaster = $("#toaster");
        function callToaster(positionClass) {
            toastr.options = {
                closeButton: true,
                debug: false,
                newestOnTop: false,
                progressBar: true,
                positionClass: positionClass,
                preventDuplicates: false,
                onclick: null,
                showDuration: "300",
                hideDuration: "1000",
                timeOut: "5000",
                extendedTimeOut: "1000",
                showEasing: "swing",
                hideEasing: "linear",
                showMethod: "fadeIn",
                hideMethod: "fadeOut",
            };
            toastr.success("Welcome to Admin Dashboard", "Hello!");
        }

        if (toaster.length != 0) {
            if (document.dir != "rtl") {
                callToaster("toast-top-right");
            } else {
                callToaster("toast-top-left");
            }
        }
    </script>
