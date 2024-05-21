<!DOCTYPE html>

<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <title>Admin Panel</title>

    <!-- theme meta -->
    <meta name="theme-name" content="mono" />

    <!-- GOOGLE FONTS -->
    <link href="https://fonts.googleapis.com/css?family=Karla:400,700|Roboto" rel="stylesheet">
    <link href="plugins/material/css/materialdesignicons.min.css" rel="stylesheet" />
    <link href="plugins/simplebar/simplebar.css" rel="stylesheet" />

    <!-- PLUGINS CSS STYLE -->
    <link href="plugins/nprogress/nprogress.css" rel="stylesheet" />


    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">

    <link href="plugins/DataTables/DataTables-1.10.18/css/jquery.dataTables.min.css" rel="stylesheet" />



    <link href="plugins/jvectormap/jquery-jvectormap-2.0.3.css" rel="stylesheet" />



    <link href="plugins/daterangepicker/daterangepicker.css" rel="stylesheet" />



    <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">



    <link href="plugins/toaster/toastr.min.css" rel="stylesheet" />

    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <!-- MONO CSS -->
    <link id="main-css-href" rel="stylesheet" href="css1/style.css" />

    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous"> -->


    <!-- FAVICON -->
    <link href="images/favicon.png" rel="shortcut icon" />

    <script src="plugins/nprogress/nprogress.js"></script>
</head>

<body class="navbar-fixed sidebar-fixed" id="body">
    <script>
        NProgress.configure({
            showSpinner: false
        });
        NProgress.start();
    </script>


    <div id="toaster"></div>


    <!-- ====================================
    ——— WRAPPER
    ===================================== -->
    <div class="wrapper">


        <!-- ====================================
          ——— LEFT SIDEBAR WITH OUT FOOTER
        ===================================== -->
        <aside class="left-sidebar sidebar-dark" id="left-sidebar">
            <div id="sidebar" class="sidebar sidebar-with-footer">
                <!-- Aplication Brand -->
                <div class="app-brand d-flex align-items-center flex-column">

                    <img src="../images/Mahayogi Guru Gorakhnath Govt/logo2.jpg" width="50%"><br>
                    <span class="brand-name fw-bold">ADMIN PANEL</span>

                </div>
                <!-- begin sidebar scrollbar -->
                <div class="sidebar-left" data-simplebar style="height: 100%;">
                    <!-- sidebar menu -->
                    <ul class="nav sidebar-inner mb-5 pb-5" id="sidebar-menu">
                        <li class="active">
                            <a href="index.php"><i class="fa fa-home"></i>&nbsp;HOME</a>
                        </li>
                        <li class="has-sub">
                            <a class="sidenav-item-link" href="javascript:void(0)" data-toggle="collapse" data-target="#email1" aria-expanded="false" aria-controls="email">
                                <i class="fa fa-tasks" style="font-size:18px"></i>
                                <span class="nav-text">Teacher</span> <b class="caret"></b>
                            </a>
                            <ul class="collapse" id="email1" data-parent="#sidebar-menu">
                                <div class="sub-menu">
                                    <li>
                                        <a class="sidenav-item-link" href="addteacher.php">
                                            <span class="nav-text"><i class="fa-solid fa-pen-clip"></i>&nbsp;&nbsp;&nbsp;&nbsp;Add Teacher</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="sidenav-item-link" href="viewteacher.php">
                                            <span class="nav-text"><i class="fa-solid fa-eye"></i>&nbsp;&nbsp;&nbsp;&nbsp;View Teacher</span>
                                        </a>
                                    </li>

                                </div>
                            </ul>
                        </li>
                        <li class="has-sub">
                                <a class="sidenav-item-link" href="declare_result.php">
                                <i class="fa fa-tasks" style="font-size:18px"></i>  <span class="nav-text"><i class=""></i>&nbsp;&nbsp;&nbsp;&nbsp;Issue Result</span>
                                </a>
                            </li>
                     
                        <li class="has-sub">
                                <a class="sidenav-item-link" href="viewjobc_regstudent.php">
                                <i class="fa fa-tasks" style="font-size:18px"></i>  <span class="nav-text"><i class=""></i>&nbsp;&nbsp;&nbsp;&nbsp;Reg.Student</span>
                                </a>
                            </li>
                        <li class="has-sub">
                                <a class="sidenav-item-link" href="declared_results.php">
                                <i class="fa fa-tasks" style="font-size:18px"></i>  <span class="nav-text"><i class=""></i>&nbsp;&nbsp;&nbsp;&nbsp;results</span>
                                </a>
                            </li>

                        <li class="has-sub">
                            <a class="sidenav-item-link" href="javascript:void(0)" data-toggle="collapse" data-target="#email11" aria-expanded="false" aria-controls="email">
                                <i class="fa fa-tasks" style="font-size:18px"></i>
                                <span class="nav-text">News</span> <b class="caret"></b>
                            </a>
                            <ul class="collapse" id="email11" data-parent="#sidebar-menu">
                                <div class="sub-menu">
                                    <li>
                                        <a class="sidenav-item-link" href="add_news.php">

                                            <span class="nav-text"><i class="fa-solid fa-pen-clip"></i>&nbsp;&nbsp;&nbsp;&nbsp;Add
                                                News</span>

                                        </a>
                                    </li>

                                    <li>
                                        <a class="sidenav-item-link" href="view_news.php">
                                            <span class="nav-text"><i class="fa-solid fa-eye"></i>&nbsp;&nbsp;&nbsp;&nbsp;View News</span>

                                        </a>
                                    </li>

                                </div>
                            </ul>
                        </li>
                       
                        <div class="sub-menu">
                            <li>
                                <a class="sidenav-item-link" href="change_password.php">
                                    <span class="nav-text"><i class=""></i>&nbsp;&nbsp;&nbsp;&nbsp;Change
                                        Password</span>
                                </a>
                            </li>

                        </div>
                        <div class="sub-menu">
                            <li>
                                <a class="sidenav-item-link" href="logout.php">
                                    <span class="nav-text"><i class=""></i>&nbsp;&nbsp;&nbsp;&nbsp;logout</span>
                                </a>
                            </li>

                        </div>
                    </ul>
                </div>
            </div>
        </aside>
