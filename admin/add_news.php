<?php
ob_start();
session_start();
error_reporting(0);
if(!$_SESSION['u']){
	header('location:login.php');
	}
include("config/connection.php");
?>
<?php
if (isset($_POST['post'])) {
    $jtitle = mysqli_real_escape_string($con, $_POST['jtitle']);
    $jdesc = mysqli_real_escape_string($con, $_POST['jdesc']);
    $date = date('Y-m-d');
    // File upload handling
    $img_name = $_FILES['img']['name'];
    $img_tmp = $_FILES['img']['tmp_name'];
    $img_size = $_FILES['img']['size'];

    // Check file type
    $allowed_extensions = array('jpg', 'jpeg', 'png', 'jfif');
    $file_extension = strtolower(pathinfo($img_name, PATHINFO_EXTENSION));

    if (!in_array($file_extension, $allowed_extensions)) {
        echo "<script>alert('Error: Only JPG, JPEG, PNG, and JFIF file types are allowed.');</script>";
        exit();
    }

    // Check file size (1 MB limit)
    $max_file_size = 1 * 1024 * 1024; // 1 MB in bytes

    if ($img_size > $max_file_size) {
        echo "<script>alert('Error: File size must be less than 1 MB.');</script>";
        exit();
    }

    // Generate a unique filename
    $unique_filename = time() . '_' . mt_rand(1000, 9999) . '_' . $img_name;

    // Move uploaded image to a folder with the unique filename
    move_uploaded_file($img_tmp, "upload/$unique_filename");

    // Insert data into the news table
    $sql = "INSERT INTO `news_tb` (`title`, `description`, `img`, `date`) VALUES ('$jtitle', '$jdesc', '$unique_filename' ,'$date')";

    $run = mysqli_query($con, $sql);
    if ($run) {
        echo "<script>alert('News added successfully.');</script>";
        header("location:add_news.php?a=1");
    } else {
        echo "<script>alert('Error: Please fill in correct data.');</script>";
   
    }
}
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
    <div class="container">

        <!-- Top Statistics -->
        <div class="row justify-content-center">

            <div class="col-lg-11 mb-5">
                <div class="row mt-4">
                    <div class="col-lg-12 col-lg-offset-2">
                        <div class="left-news">
                        <div class="left-news">
                            <h2 class="font-weight-bold text-center">
                                <font color="#146C94">&nbsp; Add News</font>
                            </h2>
                            <h6 class="fw-bold">InternshipTime</h6>
                        </div>
                        </div>
                    </div>
                </div>
                <!--./head-->

                <div class="left-news border border-top-3 border-danger p-2">
                    <div class="panel grey lighten-5">
                       
                        <h6 class="text-1">Info : Fill Up</h6>
                                <hr>
                                <div class="box-3">
                                    <form action="" method="post" enctype="multipart/form-data" autocomplete="off" class="row">
                                        <div class="col-lg-6">
                                            <div class="form-group ">
                                                <label>News Title<span class="color">*</span></label>
                                                <input class="form-control tt" type="text" name="jtitle"
                                                    placeholder="Enter Job Title" required="required" />
                                            </div>
                                            <!--form-group-->
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label>Add Image<span class="color">* (accept: .jpeg,.jpg,.png,.jfif
                                                        only) less than 1 MB</span></label>
                                                <input class=" tt" type="file" name="img"
                                                    accept=".jpg, .jpeg, .jfif, .png" required="required" />
                                            </div>
                                            <!--form-group-->
                                        </div>


                                        <div class="col-md-12">
                                            <div class="form-group ">
                                                <label>News Description<span class="color">*</span></label>

                                                <textarea class="form-control tt" type="text"  name="jdesc"
                                                    placeholder="Enter Decription"></textarea>
                                            </div>

                                        </div>
                                        <!--form-group-->
                                </div>
                                <div class="clearfix"></div>
                                <div class="col-lg-12 reg-btn mb-4">
                                    <button type="submit" name="post" class="btn btn-danger">ADD</button>
                                </div>
                                <div class="clearfix"></div>
                                </form>
                                <!--form1-->
                                <div class="clearfix"></div>
                                <div class="col-lg-12 col-xl-12">

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--6-->
        </div>
        <!--row2-->
        <!--/body-->
    </div>
</div>
<?php include_once("include1/footer.php"); ?>


<<script>
    // Replace the <textarea id="editor1"> with a CKEditor 4
    // instance, using default configuration.
    CKEDITOR.replace('editor');
    </script>

    <script>
    function noalpha1() {
        var w = document.getElementById("mob1").value;
        var phoneno1 = /^[1-9]{1}[0-9]{9}$/;
        if (phoneno1.test(w)) {
            document.getElementById("alert1").innerHTML = "";
            return;
        } else {
            document.getElementById("alert1").innerHTML = "Please enter valid mobile number.";
            document.getElementById("alert1").style.color = "red";
            return;
        }
    }
    </script>
    <script>
    function emailchk() {
        var email = document.getElementById("email").value;
        if (((/^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/.test(email)) == 1) || email == "") {
            document.getElementById("alert").innerHTML = "";
            return (true);
        } else if ((/^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/.test(email)) == 0) {
            document.getElementById("alert").innerHTML = "You have entered an invalid email address!";
            document.getElementById("alert").style.color = "red";
            return (false);
        }
    }
    </script>
    <script>
    CKEDITOR.replace('editor');
    $("form").submit(function(e) {
        var totalcontentlength = CKEDITOR.instances['editor'].getData().replace(/<[^>]*>/gi, '').length;
        if (!totalcontentlength) {
            document.getElementById("box1").innerHTML = "This box can't be left empty";
            document.getElementById("box1").style.color = "red";
            e.preventDefault();
        } else {
            document.getElementById("box1").innerHTML = "";
        }
    });
    </script>
    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>


<?php
 if(isset($_GET['a'])){
 if($_GET['a']==1)
 {
 ?>
<script>
alert("News is successfully added..");
</script>
<?php
 }
 }
 ?>
<?php
 ob_flush();
 ?>