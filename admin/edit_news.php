<?php
ob_start();
session_start();
if (!$_SESSION['u']) {
    header('location:login.php');
}
include("config/connection.php");

$id = $_GET['id'];

// Fetch existing data from the database
$q = "SELECT * FROM news_tb WHERE id='$id'";
$run = mysqli_query($con, $q);

while ($_row = mysqli_fetch_array($run)) {
    $id = $_row['id'];
    $title = $_row['title'];
    $description = $_row['description'];
    $path = $_row['img'];
}

if (isset($_POST['post1'])) {
    // Update the data only if fields are not empty
    $newTitle = mysqli_real_escape_string($con, $_POST['title']);
    $newDescription = mysqli_real_escape_string($con, $_POST['desc']);

    if (!empty($newTitle) && !empty($newDescription)) {
        // File upload handling
        if (!empty($_FILES['image']['name'])) {
            $img_name = uniqid() . '_' . $_FILES['image']['name'];
            $img_tmp = $_FILES['image']['tmp_name'];
            $img_size = $_FILES['image']['size'];

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

            // Move uploaded image to a folder
            move_uploaded_file($img_tmp, "upload/$img_name");

            // Remove old image if a new one is uploaded
            if (!empty($path) && file_exists("upload/$path")) {
                unlink("upload/$path");
            }

            // Update data with the new image name
            $updateQuery = "UPDATE news_tb SET title='$newTitle', description='$newDescription', img='$img_name' WHERE id='$id'";
        } else {
            // Update data without changing the image
            $updateQuery = "UPDATE news_tb SET title='$newTitle', description='$newDescription' WHERE id='$id'";
        }

        $updateRun = mysqli_query($con, $updateQuery);

        if ($updateRun) {
            echo "<script>alert('News updated successfully.');</script>";
            header("location:view_news.php?u=1");
            exit();
        } else {
            echo "<script>alert('Error: Please fill in correct data.');</script>";
        }
    } else {
        echo "<script>alert('Error: Title and Description cannot be empty.');</script>";
    }
}
?>
<?php include_once("include1/sidenav.php"); ?>
<div class="page-wrapper">
    <?php include_once("include1/header.php"); ?>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-11 mb-5">
                <div class="left-news">
                    <h1 class="font-weight-bold mt-5" style="font-size:20px;">
                        <font class="font-1">View</font>
                        <font class="font-2">&nbsp;Internship Registered Student</font>
                    </h1>
                    <p>Internship Time</p>
                    
                    <form action="" method="post" enctype="multipart/form-data" autocomplete="off" class="border border-danger p-4">
                        <div class="row">
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label>News Title</label>
                                <input class="form-control tt" type="text" autofocus name="title" value="<?php echo $title; ?>" required="required" />
                            </div><!--form-group-->
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label>News Description</label>
                                <!-- Correct usage of <textarea> -->
                                <textarea class="form-control tt" autofocus name="desc" required="required"><?php echo $description; ?></textarea>
                            </div><!--form-group-->
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label>Image:</label>
                                <input class="tt" type="file" autofocus name="image" accept=".jpeg, .jpg, .png, .jfif" />
                                <img src="upload/<?php echo $path; ?>" height="200px" width="200px">
                            </div><!--form-group-->
                        </div>
                        <div class="clearfix"></div>
                        <div class="col-lg-12 reg-btn mb-4">
                           <center> <button type="submit" name="post1" class="btn btn-danger">UPDATE</button></center>
                        </div>
                        </div>
                        
                        <div class="clearfix"></div>
                    </form><!--form1-->
                </div>
            </div>
        </div>
    </div>
</div>
<?php
ob_flush();
?>
<?php include_once("include1/footer.php"); ?>
