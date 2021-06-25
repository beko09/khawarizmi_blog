<?php include "include/header.php"; ?>

   <div class="bg-login">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-6 col-sm-12 mx-auto">
               <div class="py-4 mt-5">
                <h3 class="text-center">تسجيل</h3>
                <div class="card login">
                    <div class=" card-body">
                        <form action="include/form/register.php" method="post" autocomplete="off">
                            <div class="form-group">
                                <input type="text" name="username" id="username" placeholder="اسم المستخدم" class="form-control">
                            </div>
                            <div class="form-group">
                                <input type="email" name="email" id="email" placeholder="الايميل" class="form-control">
                            </div>
                            <div class="form-group">
                                <input type="password" name="password" id="password" placeholder="كلمة السر" class="form-control">
                            </div>
                            <div class="form-group">
                                <input type="submit" value="تسجيل" name="register" class="btn btn-color btn-block">
                            </div>
                        </form>
                    </div>
                </div>
               </div>
            </div>
        </div>
    </div>
   </div>
</body>
</html>