<?php
ob_start();
session_start();
error_reporting(0);
if (!$_SESSION['u']) {
    header('location:login.php');
}

include("config/connection.php");

$page_name = "payment.php"; // Change this if you use a different page name

$limit = isset($_GET['limit']) ? $_GET['limit'] : 10;
$start = isset($_GET['start']) ? $_GET['start'] : 0;

// Validate limit and start values
if (!is_numeric($limit) || !is_numeric($start) || $limit <= 0 || $start < 0) {
    echo "Invalid data";
    exit;
}

// Fetch data with pagination
$query = "SELECT * FROM payment_tb ORDER BY id Desc LIMIT $start, $limit";
$rs_result = mysqli_query($con, $query);
?>
<?php include_once("include1/sidenav.php"); ?>
<div class="page-wrapper">
    <?php include_once("include1/header.php"); ?>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-11 mb-5">
            <div class="left-news">
					<h2 class="font-weight-bold text-center">
						<font color="#146C94">&nbsp; View Payment</font>
					</h2>
					<h6 class="fw-bold">InternshipTime</h6>
				</div>
                <div class="left-news border border-top-3 border-primary">
                    <div class="panel grey lighten-5 border border-dark p-3">
                        <h6 class="text-1">Payment History</h6>
                        <hr>
                        <div class="box-3">
                            <div class="table table-responsive">
                                <table class="table table-bordered table-hover" width="100%">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Service Name</th>
                                            <th>Ordered By</th>
                                            <!-- <th>Order Id</th> -->
                                            <th>Transaction Id</th>
                                            <th>Payment Status</th>
                                            <th>Work Status</th>
                                            <th>Transaction Date/Time</th>
                                            <th>File</th>
                                            <th>View</th>

                                        </tr>
                                    </thead>

                                    <tbody>
                                        <?php
                                        $j = 1;
                                        while ($row = mysqli_fetch_array($rs_result)) {
                                        ?>
                                            <tr>
                                                <td><?php echo $j; ?></td>
                                                <td><?php echo $row['service_name']; ?></td>
                                                <td><?php echo $row['name']; ?></td>
                                                <!-- <td><?php echo $row['order_id']; ?></td> -->
                                                <td><?php echo $row['trans_id']; ?></td>
                                                <td><?php echo $row['pay_status']; ?></td>
                                                <td><?php echo $row['work_status']; ?></td>
                                                <td><?php echo date('d-m-Y H:i:s', strtotime($row['date_time'])); ?></td>
                                                <td>
                                                    <?php
                                                    if ($row['service_name'] == 'Text Resume service' || $row['service_name'] == 'Visual Resume service') {
                                                        if (empty($row['file'])) {
                                                            echo "None";
                                                        } else {
                                                            echo '<a href="upload/' . $row['file'] . '" download>Download Now</a>';
                                                        }
                                                    ?>
                                                    <?php
                                                    } elseif ($row['service_name'] == 'Interview Pro' || $row['service_name'] == 'Motivation class') {
                                                    ?>
                                                        Link: <br>
                                                        <a href="<?php echo $row['file']; ?>"><?php echo $row['file']; ?></a>
                                                    <?php
                                                    } else {
                                                    ?>
                                                        Assigned Company: <span class="text-danger"><?php echo $row['file']; ?></span>
                                                    <?php } ?>
                                                </td>
                                                <td><a href="view_payment.php?id=<?php echo $row['id']; ?>"><button class="btn fs-6 btn-info">View</button></a></td>
                                            </tr>
                                        <?php
                                            $j++;
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                            <div class="clearfix"></div>
                            <div class="col-lg-12 col-xl-12">
                                <div class="pp" style="margin-left:0px;">
                                    <center>
                                        <?php
                                        // Pagination links
                                        $query = "SELECT COUNT(id) FROM payment_tb";
                                        $nume1 = mysqli_query($con, $query);
                                        $row = mysqli_fetch_array($nume1);
                                        $nume = $row[0];

                                        $total_pages = ceil($nume / $limit);

                                        if ($total_pages > 1) {
                                            echo '<ul class="pagination">';
                                            $i = 1;
                                            for ($i = 0; $i < $total_pages; $i++) {
                                                $page_num = $i * $limit;
                                                if ($page_num != $start) {
                                                    echo '<li class="page-item"><a class="page-link" href="' . $page_name . '?start=' . $page_num . '&limit=' . $limit . '">' . ($i + 1) . '</a></li>';
                                                } else {
                                                    echo '<li class="page-item active"><span class="page-link">' . ($i + 1) . '</span></li>';
                                                }
                                            }
                                            echo '</ul>';
                                        }
                                        ?>
                                    </center>
                                </div><!--pp-->
                            </div>
                        </div>
                    </div>
                </div>
            </div><!--6-->
        </div><!--row2-->
        <!-- End of Body -->
    </div><!-- /.container-fluid -->
</div><!-- /#page-content-wrapper -->
<!-- Bootstrap core JavaScript -->
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>


</body>

</html>
<?php
if (isset($_GET['del'])) {
    $id = $_GET["del"];

    $d = "delete from job_tb where id = '$id' ";

    $del = mysqli_query($con, $d);
    if ($del) {
        header("location:payment.php?d=1");
        exit();
    }
}
?>
<?php
if (isset($_GET['d'])) {
    if ($_GET['d'] == 1) {
?>
        <script>
            alert("Job is Deleted Successfully!!!");
        </script>
<?php
    }
}
?>
<?php
if (isset($_GET['u'])) {
    if ($_GET['u'] == 1) {
?>
        <script>
            alert("Job is Updated Successfully!!!");
        </script>
<?php
    }
}
?>
<?php
ob_flush();
?>
<?php include_once("include1/footer.php"); ?>