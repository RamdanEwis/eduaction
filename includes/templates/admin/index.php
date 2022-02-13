
<?php 


session_start();

require_once '../../../vendor/autoload.php';

include "src/header.html";

/*

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


*/


?>



    <form  class='login_admin' action=" <?php echo$_SERVER['PHP_SELF'] ?> " method="POST">
		<h4 class=" text-center ">Admin Login</h4>
		<input class="form-control" type="text" name="user" placeholder="UserName" autocomplete="off"/>
		<input class="form-control" type="password" name="pass" placeholder="Password" autocomplete="new-password"/>
		<input class="btn btn-primary btn-block" type="submit" value="login"> 

	</form>




    <?php include "src/footer.html";?>
    
