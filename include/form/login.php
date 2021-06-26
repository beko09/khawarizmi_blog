
<?php

    if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 

include "../../admin/includes/db.php";
$error = [];
if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $pass = $_POST['password'];
     if (empty($email)) {
        array_push($error,"<p class='alert alert-danger'> الايميل ضروري</p>");
       header("Location:../../blog-admin.php?error= الايميل ضروري");
    } elseif(empty($pass)){
          array_push($error,"<p class='alert alert-danger'>كلمة السر  ضروري</p>");
       header("Location:../../blog-admin.php?error= كلمة السر ضروري");
    }else {
        $sql = "SELECT * FROM users WHERE email='$email'";
        $result = $conn->query($sql);
        if($result->num_rows > 0){
        while($row = $result->fetch_assoc()){
            $db_user = $row['name'];
            $db_user_id = $row['user_ID'];
            $db_email = $row['email'];
            $db_pass = $row['password'];
            $db_pic = $row['pic'];
            $role = $row['role'];
            $rehashpass = md5($pass);
            if ($email === $db_email && $db_pass === $rehashpass) {
                $_SESSION['userLogin']= $db_user;
                $_SESSION['user_id']= $db_user_id;
                $_SESSION['email']= $email;
                $_SESSION['role']= $role;
                $_SESSION['user_pic']= $db_pic;
                // echo $_SESSION['userLogin'];
                if($role==0){
                    header("Location: ../../admin/index.php");

                }elseif($role==1) {
                header("Location: ../../admin/posts_user.php");
                }
            }else{
                // $_SESSION['login_email']= $email;
                array_push($error,"<p class='alert alert-danger'>كلمة السر  او الايميل غير صحيحين</p>");
                header("Location: ../../blog_admin.php?error=wrong_login");
            }
        }
    }else{
         header("Location:../../blog_admin.php?wrong_login");
    }
      
    }
}