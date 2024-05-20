<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Mahayogi Guru Gorakhnath Govt. degree college bithyani Yamkeshwar, pauri garhwal Uttarakhnd</title>
    <link rel="stylesheet" href="css/main.css">
</head>

<body>
    <?php include('include/header.php')?>
    <section class="wow fadeIn pre-header222 animated" style="visibility: visible; animation-name: fadeIn;">
        <div class="container">
            <div class="row">
                <div class="page-title-wrap2 text-center w-100">
                    <h1 class="page-title-captions2"><b>Contact US</b> </h1>
                    <div class="breadcrumbs2">
                        <ul>
                            <li><a href="index.php">Home</a></li>
                            <li><a href="index.php">/</a></li>
                            <li><a href="contact.php">Contact us</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="container mt-5">
        <div class="row">
            <div class="col-xl-6 col-lg-6">
                <div class="single-sidebar-widget fix mb-25 asideMenuBox vcContact_box">
                    <div class="sidebar-widget-title mb-25">
                        <h5>Office of the Principal</h5>
                    </div>
                    <ul class="categories mt-3">
                        <li>
                            <i class="fa fa-user"></i> Prof. Yogesh kumar Sharma - Principal
                        </li>
                        <li>
                            <i class="fa fa-map-marker map-icon"></i> Mahayogi Guru Gorakhnath Govt. degree college
                            bithyani PO chai damrada, via bhigu khal, Yamkeshwar, pauri gaurhwal Uttarakhnd - 246121
                        </li>
                        <li>
                            <i class="fa fa-phone"></i> +91 9837849194
                        </li>
                        <li>
                            <i class="fa fa-fax"></i> +91 7500654686
                        </li>
                        <li>
                            <i class="fa fa-envelope"></i> mggbithyani05@gmail.com
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-6 mt-sx-5">
                <form data-toggle="validator" role="form" method="post" action="contact_form_code.php"
                    id="contact_form">
                    <div class="form-group">
                        <label for="inputName" class="control-label">Your full name: <span
                                class="red-text">*</span></label>
                        <input type="text" class="form-control" name="person_name" id="person_name" placeholder="Name">
                        <span id="name_err" style="color: red" class="err_msg"></span>
                    </div>
                    <div class="form-group">
                        <label for="inputName" class="control-label">Phone:</label>
                        <input type="text" class="form-control" name="contact" id="contact"
                            placeholder="Enter phone no.">
                    </div>

                    <div class="form-group">
                        <label for="inputEmail" class="control-label">Email: <span class="red-text">*</span></label>
                        <input type="email" class="form-control" name="email" id="email" placeholder="Email"
                            data-error="Bruh, that email address is invalid">
                        <span id="email_err" style="color: red" class="err_msg"></span>
                    </div>
                    <div class="form-group">
                        <label for="inputEmail" class="control-label">Message:</label>
                        <textarea name="msg" id="msg" class="form-control" style="width:100%;"></textarea>
                        <div class="help-block with-errors"></div>
                    </div>
                    <div class="form-group">
                        <button type="submit" name="submit" id="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
    <?php include('include/footer.php')?>
</body>

</html>