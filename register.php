<?php include "include/header.php"; ?>

<div class="bg-login">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-6 col-sm-12 mx-auto">
                <div class="py-4 mt-5">
                    <h3 class="text-center">تسجيل</h3>
                      <?php 
                    if (isset($_GET['error_reg'])) {
                        $error = $_GET['error_reg'];
                      echo " <p class='alert alert-danger mx-3' id='msg'>  $error</p>";
                    }else {
                        echo "";                    }
                ?>
                    <div class="card login">
                        <div class=" card-body">
                            <form action="include/form/register.php" method="post">
                                <div class="form-group">
                                    <input type="text" name="username" id="username" placeholder="اسم المستخدم"
                                        class="form-control">
                                </div>
                                <div class="form-group">
                                    <input type="email" name="email" id="email" placeholder="الايميل"
                                        class="form-control">
                                </div>
                                <div class="form-group">
                                    <input type="password" name="password" id="password" placeholder="كلمة السر"
                                        class="form-control">
                                </div>
                                <div class="form-group">
                                    <input type="submit" value="تسجيل" name="register" class="btn btn-color btn-block">
                                </div>
                                 <div class="form-group">
                                    <p>
                                     لديك حساب؟<a class="link_color" href="login.php">دخول</a>
                                    </p>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    // remove message after 5 second
    try {
        let msg = document.getElementById('msg');
        setTimeout(() => {
            msg.style.display = "none";
        }, 5000);
    } catch (error) {
        console.log(error);
    }
</script>
</body>

</html>