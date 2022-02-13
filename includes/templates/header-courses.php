<?php session_start(); ?>

<!DOCTYPE html>
<head lang="en">

<!-- Basic -->
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">

<!-- Mobile Metas -->
<meta name="viewport" content="width=device-width, initial-scale=1">

<!-- Site Metas -->
<title><?php echo $title ?></title>

<meta name="keywords" content="">
<meta name="description" content="">
<meta name="author" content="">

<!-- Site Icons -->
<link rel="shortcut icon" href="../../../layout/images/favicon.ico" type="image/x-icon"/>
<link rel="apple-touch-icon" href="../../../layout/images/apple-touch-icon.png">

<!-- Bootstrap CSS -->
<link rel="stylesheet" href="../../../layout/css/bootstrap.min.css">
<!-- Site CSS -->
<link rel="stylesheet" href="<?php echo $style_global ?>">
<!-- ALL VERSION CSS -->
<link rel="stylesheet" href="../../../layout/css/versions.css">
<!-- Responsive CSS -->
<link rel="stylesheet" href="../../../layout/css/responsive.css">
<!-- Custom CSS -->
<link rel="stylesheet" href="../../../layout/css/style.css">

<!-- Modernizer for Portfolio -->
<script src="../../../layout/js/modernizer.js"></script>

<!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->

</head>

<body class="host_version">

<div class="upper-bar">
    <div class=" container">

        <?php if (isset($_SESSION['username'])) {?>

            <div class="dropdown pull-right">
                <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <?php echo $_SESSION['username']   ?>
                </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
                    <a href="../../../includes/templates/login/logout.php"><i class="fa fa-close"></i> loguot</a>
                </div>
            </div>

        <?php }else{ ?>

            <a href="../../../includes/templates/login">
                <span class="pull-right">login/Signup</span>
            </a>
        <?php }   ?>
    </div>
</div>

<!-- Start header -->
<header class="top-navbar">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.html">
                <img src="../../../layout/images/logo.png" alt=""/>
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbars-host"
                    aria-controls="navbars-rs-food" aria-expanded="false" aria-label="Toggle navigation">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbars-host">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item"><a class="nav-link" href="../../../index.php">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">About Us</a></li>
                    <li class="nav-item"><a class="nav-link" href="../courses/">Course</a></li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="dropdown-a" data-toggle="dropdown">Blog </a>
                        <div class="dropdown-menu" aria-labelledby="dropdown-a">
                            <a class="dropdown-item" href="#">Blog </a>
                            <a class="dropdown-item" href="#">Blog single </a>
                        </div>
                    </li>
                    <li class="nav-item active"><a class="nav-link" href="../teachers/">Teachers</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Pricing</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Contact</a></li>
                </ul>

            </div>
        </div>
    </nav>
</header>
<!-- End header -->