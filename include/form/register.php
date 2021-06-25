<?php
include "../../admin/includes/db.php";
$error = [];
if (isset($_POST['register'])) {
    $user = clean($_POST['username']);
    $email = clean($_POST['email']);
    $pass = $_POST['password'];
    if (empty($user)) {
        array_push($error,"<p class='alert alert-danger'>اسم المستخدم ضروري</p>");
       header("Location:../../blog-admin.php?error=اسم المستخدم ضروري");
    }elseif(!filter_var($email,FILTER_VALIDATE_EMAIL)){
          array_push($error,"<p class='alert alert-danger'>الايميل غير صحيح</p>");
        header("Location:../../blog-admin.php?error=الايميل غير صحيح");
    }elseif (empty($email)){
         array_push($error,"<p class='alert alert-danger'> الايميل ضروري</p>");
       header("Location:../../blog-admin.php?error=الايميل  ضروري");
    
    }elseif (strlen($pass) <= 5){
         array_push($error,"<p class='alert alert-danger'> كلمة السر  قصيرة </p>");
       header("Location:../../blog-admin.php?error=كلمة السر  قصيرة");
    } else {
        if (empty($error)) {
            // global $conn;
            $pic_default = "images/profile/default.png";
            $hash_pass = md5($pass);
            $sql = "INSERT INTO users(name, email, password,pic) VALUES('$user','$email','$hash_pass','$pic_default')";
            if($conn->query($sql)=== TRUE) {
                header("Location:../../blog_admin.php?create_admin");
            }else {
                die("some error". $conn->error);
            }
        }
    }
}

//  function validate input failed coming
function clean($data){
 global $conn;
 $data = htmlspecialchars($data);
 $data = mysqli_real_escape_string($conn,$data);
 $data = stripslashes($data);
 $data = strip_tags($data);
 return $data;
}