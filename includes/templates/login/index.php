<?php
session_start();
include '../../autoloader.inc.php';
require_once '../../../vendor/autoload.php';
$title = 'Login';
$style_global = '../../../layout/style.css';


$db = new \App\Database\Database();

$Student = new \App\User\Student($db);

//if (isset($_SESSION['username'])):echo $_SESSION['username']; endif;

if (isset($_POST['login'])) :
    $error_login = array();

    $username = filter_var($_POST['username'],FILTER_SANITIZE_STRING);


    $password  = $_POST['password'];

    //check user exist in database

    $query = " SELECT  `id`,`username`, `password`
                                    FROM users
                                    WHERE username = ?";

   // $stmt = $Student->db->prepare($query);

    $stmt = $Student->db->connect()->prepare($query);

    $stmt->execute(array($username));

    $get = $stmt->fetch();

    $count = $stmt->rowcount();

    if (($count > 0) && password_verify($password, $get['password'])) :
        $_SESSION['username'] = $username;
        $_SESSION['id-user'] =  $get['id'];
       header('location: ../../../');
        echo
        exit();
     else:
        $error_login[] = "<p style='color: red'>User name or password do not match</p>";
    endif;


endif;


if (isset($_POST['signup'])):

    $username = filter_var($_POST['username'],FILTER_SANITIZE_STRING);
    $email  = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $number = filter_var($_POST['number'], FILTER_SANITIZE_STRING);
    $password  = $_POST['password'];
    $passwordhash = password_hash($password, PASSWORD_DEFAULT);

    $Student->db->create('users',[
        'username' => $username,
        'email' => $email  ,
        'Password'  => $passwordhash,
        'number' => $number ]) ;?>

        <script>alert("Congratulations, the account has been added!");</script>

        <?php header("refresh:0; url= ../../../");

        die;

endif;

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../../layout/css/style-form.css">
    <link rel="shortcut icon" href="../../../layout/images/favicon.ico" type="image/x-icon"/>
    <link rel="apple-touch-icon" href="../../../layout/images/apple-touch-icon.png">
    <link rel="stylesheet" href="<?php echo $style_global ?>">
    <!-- ALL VERSION CSS -->
    <link rel="stylesheet" href="../../../layout/css/versions.css">
    <!-- Responsive CSS -->
    <link rel="stylesheet" href="../../../layout/css/responsive.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="../../../layout/css/style.css">

    <!-- Modernizer for Portfolio -->
    <script src="../../../layout/js/modernizer.js"></script>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../../../layout/css/bootstrap.min.css">
    <title>login / signup</title>
</head>


<body>
<!--Start section Form -->

<!-- Start header -->
<header class="top-navbar">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="../../../">
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
                    <li class="nav-item"><a class="nav-link" href="../../../">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">About Us</a></li>
                    <li class="nav-item"><a class="nav-link" href="../courses/">Course</a></li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="dropdown-a" data-toggle="dropdown">Blog </a>
                        <div class="dropdown-menu" aria-labelledby="dropdown-a">
                            <a class="dropdown-item" href="#">Blog </a>
                            <a class="dropdown-item" href="#">Blog single </a>
                        </div>
                    </li>
                    <li class="nav-item"><a class="nav-link" href="../teachers">Teachers</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Pricing</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Contact</a></li>
                </ul>

            </div>
        </div>
    </nav>
</header>


<section>
    <div class="container">
        <!--Start login -->
        <div class="user signinBx">
            <div class="imgBx"><img src="../../../layout/images/slider-01.jpg" alt=""/></div>
            <div class="formBx">
                <form method="POST" action="<?php echo $_SERVER['PHP_SELF'] ?>">
                    <h2>Sign In</h2>
                    <label>
                        <input type="text" name="username" placeholder="Username" required="required"/>
                    </label>
                    <label>
                        <input type="password" name="password" placeholder="Password" required="required"/>
                    </label>

                    <?php if (!empty($error_login)) : echo implode('', $error_login); endif;   ?>
                    <input type="submit" name="login" value="Login"/>

                    <p class="signup">
                        Don't have an account ?
                        <a href="#" onclick="toggleForm();">  Sign Up .</a>
                    </p>

                </form>
            </div>
        </div>
        <!--End login -->

        <!--Start signup -->
        <div class="user signupBx">
            <div class="formBx">

                <form method="POST" action="<?php echo $_SERVER['PHP_SELF'] ?>">
                    <h2>Create an account</h2>
                    <label>
                        <input type="text" name="username" placeholder="Username" required="required"/>
                    </label>
                    <label>
                        <input type="email" name="email" placeholder="Email Address" required="required"/>
                    </label>
                    <label>
                        <input type="text" name="number" placeholder="Number" required="required"/>
                    </label>
                    <label>
                        <input type="password" name="password" placeholder="Create Password" required="required"/>
                    </label>
                    <div class="row">
                        <label for="" class=" col-lg-4 col-xs-5 " control-label"="">teacher</label>
                        <div class="col-sm-10 col-md-6">
                            <div class="col-sm-6 col-md-6">
                                <input type="radio" name="user-teacher" placeholder="teacher" value="1" data-text-input="teacher">
                                <label for="">yes</label>
                            </div>
                            <div class="col-sm-6 col-md-6">
                                <input type="radio" name="" placeholder="teacher" value="0" data-text-input="teacher">
                                <label for="">No</label>
                            </div>
                        </div>
                    </div>
                    <input type="submit" name="signup" />
                    <p class="signup">
                        Already have an account ?
                        <a href="#" onclick="toggleForm();">Sign in.</a>
                    </p>
                </form>
            </div>
            <div class="imgBx"><img src="../../../layout/images/slider-01.jpg" alt=""/></div>
        </div>
    </div>
    <!--End signup -->
    <!--Start signup -->

    </div>
</section>
<!--Start section Form -->
<footer class="footer">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-4 col-xs-12">
                <div class="widget clearfix">
                    <div class="widget-title">
                        <h3>About US</h3>
                    </div>
                    <p> Integer rutrum ligula eu dignissim laoreet. Pellentesque venenatis nibh sed tellus faucibus
                        bibendum. Sed fermentum est vitae rhoncus molestie. Cum sociis natoque penatibus et magnis dis
                        montes.</p>
                    <div class="footer-right">
                        <ul class="footer-links-soi">
                            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="#"><i class="fa fa-github"></i></a></li>
                            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="#"><i class="fa fa-dribbble"></i></a></li>
                            <li><a href="#"><i class="fa fa-pinterest"></i></a></li>
                        </ul><!-- end links -->
                    </div>
                </div><!-- end clearfix -->
            </div><!-- end col -->

            <div class="col-lg-4 col-md-4 col-xs-12">
                <div class="widget clearfix">
                    <div class="widget-title">
                        <h3>Information Link</h3>
                    </div>
                    <ul class="footer-links">
                        <li><a href="#">Home</a></li>
                        <li><a href="#">Blog</a></li>
                        <li><a href="#">Pricing</a></li>
                        <li><a href="#">About</a></li>
                        <li><a href="#">Contact</a></li>
                    </ul><!-- end links -->
                </div><!-- end clearfix -->
            </div><!-- end col -->

            <div class="col-lg-4 col-md-4 col-xs-12">
                <div class="widget clearfix">
                    <div class="widget-title">
                        <h3>Contact Details</h3>
                    </div>

                    <ul class="footer-links">
                        <li><a href="mailto:#">info@yoursite.com</a></li>
                        <li><a href="#">www.yoursite.com</a></li>
                        <li>PO Box 16122 Collins Street West Victoria 8007 Australia</li>
                        <li>+61 3 8376 6284</li>
                    </ul><!-- end links -->
                </div><!-- end clearfix -->
            </div><!-- end col -->

        </div><!-- end row -->
    </div><!-- end container -->
</footer><!-- end footer -->

<div class="copyrights">
    <div class="container">
        <div class="footer-distributed">
            <div class="footer-center">
                <p class="footer-company-name">All Rights Reserved. &copy; 2018 <a href="#">SmartEDU</a> Design By : <a
                            href="https://html.design/">html design</a></p>
            </div>
        </div>
    </div><!-- end container -->
</div><!-- end copyrights -->

<a href="#" id="scroll-to-top" class="dmtop global-radius"><i class="fa fa-angle-up"></i></a>

</body>
<!-- ALL JS FILES -->
<script src="../../../layout/js/all.js"></script>
<!-- ALL PLUGINS -->

<script src="../../../layout/js/timeline.min.js"></script>
<script>
    timeline(document.querySelectorAll('.timeline'), {
        forceVerticalMode: 700,
        mode: 'horizontal',
        verticalStartPosition: 'left',
        visibleItems: 4
    });
</script>
<script src="../../../layout/js/form-style.js"></script>

</html>


<?php var_dump(\App\Database\MySQLGrammar::buildSelectQuery(['username','password'],"users"));  ?>
