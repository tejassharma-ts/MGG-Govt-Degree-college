<?php
ob_start();
session_start();
if(!$_SESSION['u']) {
    header('location:login.php');
}
include "./config/connection.php";
ini_set('display_errors', 1);

if (isset($_POST['post'])) {
    $title = mysqli_real_escape_string($con, $_POST['title']);

    $targetNewsDir = "upload/news/";
    $fileName = uniqid() . '_' . basename($_FILES['pdf_file']['name']); // Generate a unique filename
    $targetFilePathNews = $targetNewsDir. $fileName; // Final file path


    // Check file size (in bytes)
    $maxFileSizeNews = 1 * 1024 * 1024;
    if ($_FILES["pdf_file"]["size"] > $maxFileSizeNews) {
        echo "<script>alert('Error: CV size exceeds 1 MB limit.');</script>";
        // You can add additional JavaScript code or remove the exit() statement
        // exit();
    }

    // Check if the CV was uploaded
    $newsUploaded = !empty($_FILES["pdf_file"]["tmp_name"]);
    if ($newsUploaded) {
        $newsUploaded = move_uploaded_file($_FILES["pdf_file"]["tmp_name"], $targetFilePathNews);
    }

    $newsPath = $newsUploaded ? $targetFilePathNews : null;

    // Construct the SQL query with optional fields
    $sql = "INSERT INTO `news`(`title`, `pdf_path`) VALUES ('$title', NULLIF('$newsPath', ''))";

    // Perform the database operation within a try-catch block
    try {
        $run = mysqli_query($con, $sql);

        if ($run) {
            echo "<script>alert('News is successfully added.'); window.location.href='add_news.php?a=1';</script>";
        } else {
            echo "<script>alert('Error: Please fill in correct data.');</script>";
        }
    } catch (mysqli_sql_exception $e) {
        echo "Exception has occured";
        exit();
        // Check if the error code indicates a duplicate entry
        if ($e->getCode() == 1062) { // MySQL error code for duplicate entry
            echo "<script>alert('Error: Duplicate email. Please enter a unique email.');</script>";
            exit();
        } else {
            echo "<script>alert('Error: " . $e->getMessage() . "');</script>";
            exit();
        }
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
                                                <label for="title">News Title<span class="color">*</span></label>
                                                <input class="form-control tt" type="text" name="title"
                                                    placeholder="Enter Job Title" required="required" />
                                            </div>
                                            <!--form-group-->
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                              <label for="pdf_file">News pdf:</label>
                                              <input type="file" id="pdf_file" name="pdf_file" accept="application/pdf"/>
                                            </div>
                                            <!--form-group-->
                                        </div>
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

<?php
 if(isset($_GET['a'])) {
     if($_GET['a'] == 1) {
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
