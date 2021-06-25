<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="index.php">المدير</a>
    </div>
    <!-- Top Menu Items -->
    <ul class="nav navbar-right top-nav">
        <li><a href="../index.php">رؤية الموقع</a></li>

        <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> 
            <?php echo $user; ?>
            <b class="caret"></b></a>
            <ul class="dropdown-menu">
                <li>
                    <a href="#"><i class="fa fa-fw fa-user"></i> البروفايل</a>
                </li>
                <li class="divider"></li>
                <li>
                    <a href="../../logout.php"><i class="fa fa-fw fa-power-off"></i> تسجيل خروج</a>
                </li>
            </ul>
        </li>
    </ul>
    <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
    <div class="collapse navbar-collapse navbar-ex1-collapse">
        <ul class="nav navbar-nav side-nav">
           <?php 
            if($_SESSION['role']==0){
                echo '<li>
                <a href="index.php"><i class="fa fa-fw fa-dashboard"></i> لوحة الادارة</a>
            </li>';
            }else {
                echo "";
            }
           ?>
            <li>
                <a href="javascript:;" data-toggle="collapse" data-target="#demo"><i class="fa fa-fw fa-send"></i> المقالات <i class="fa fa-fw fa-caret-down"></i></a>
                <ul id="demo" class="collapse">
                    <li>
                        
                        <?php 
                        if($_SESSION['role']== 0){
                            echo '<a href="posts.php">عرض المقالات</a>';
                        }elseif($_SESSION['role']== 1) {
                             echo '<a href="posts_user.php">عرض المقالات</a>';
                        }else{
                             echo '<a href="../../login.php">عرض المقالات</a>';
                        }
                        ?>
                    </li>
                    <li>
                        <a href="posts.php?to=add_new">اضافة مقال</a>
                    </li>

                </ul>
            </li>
            
             <?php 
            if($_SESSION['role']==0){
                echo '<li>
                <a href="categories.php"><i class="fa fa-fw fa-suitcase"></i> الاقسام</a>
            </li>';
            }else {
                echo "";
            }
           ?>

           <?php  
           if ($_SESSION['role']==0) {
               echo '<li>
                <a href="javascript:;" data-toggle="collapse" data-target="#users"><i class="fa fa-fw fa-users"></i> المستخدمين <i class="fa fa-fw fa-caret-down"></i></a>
                <ul id="users" class="collapse">
                    <li>

                        <a href="users.php">عرض كل المستخدمين</a>
                    </li>
                    <li>
                        <a href="users.php?to=add_user">اضافة مستخدمين</a>
                    </li>

                </ul>
            </li>';
           }else{
               echo "";

           }
           ?>
            
            <li>
                <a href="profile.php"><i class="fa fa-fw fa-user"></i> البروفايل</a>
            </li>
        </ul>
    </div>
    <!-- /.navbar-collapse -->
</nav>
<script src="bootstrap/js/jquery.js"></script>