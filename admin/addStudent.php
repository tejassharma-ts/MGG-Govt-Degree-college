
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
                            <h2 class="font-weight-bold text-center">
                                <font color="#146C94">&nbsp; Add Teacher</font>
                            </h2>
                            <h6 class="fw-bold">InternshipTime</h6>
                        </div>
                    </div>
                </div>

                <div class="border border-top-3 border-danger">
                    <div class="panel grey lighten-5 border ">
                        <h6 class="font-weight-normal pt-1 pl-1">Info : Fill Up Details</h6>
                        <hr>
                        <div class="panel-body p-4">

                            <form action="" method="post" autocomplete="off" enctype="multipart/form-data">
                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="form-group ">
                                            <label>Teacher Name</label>
                                            <input class="form-control" type="text" name="name" placeholder="Enter Teacher Name" required="required" style="" />
                                        </div>
                                        <!--form-group-->
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group ">
                                            <label>Position</label>
                                            <input class="form-control" type="text" name="position" placeholder="Enter Teacher position" required="required" style="" />
                                        </div>
                                        <!--form-group-->
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group ">
                                            <label>Email</label>
                                            <input class="form-control tt" type="email" name="email" placeholder="Enter teacher email" required="required" />
                                        </div><!--form-group-->
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group ">
                                            <label>Profile Image<span class="color">*</span></label>
                                            <input class="tt" type="file" name="img" required="required" accept=".jpg,.jpeg, .png, .jfif" />
                                        </div><!--form-group-->
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group ">
                                              <label for="cv">CV (PDF only):</label>
                                              <input type="file" id="cv" name="cv" accept="application/pdf" required/>
                                        </div><!--form-group-->
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <button type="submit" name="post" class="btn btn-danger">ADD</button>
                                </div>
                        </div>
                        </form>
                        <!--form1-->

                    </div>
                </div>
            </div>
            <!--6-->
        </div>
        <!--row2-->
        <!--/body-->
    </div>
</div>
</div>


<?php include_once("include1/footer.php"); ?>

<?php
if (isset($_GET['a'])) {
    if ($_GET['a'] == 1) {
        ?>
        <script>
            alert("Teacher Profile is successfully added..");
        </script>
<?php
    }
}
?>
<?php
ob_flush();
?>
