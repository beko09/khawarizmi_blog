  <header role="banner">
    <div class="container logo-wrap">
      <div class="row">
        <div class="col-12">
          <div class="user_navbar">
             <ul class="navbar-nav mr-auto d-flex flex-row align-items-center">
            <li class="nav-item">
            
                 <?php
                  if ($_SESSION) {
                  
                  ?>
                    <div class="mt-2 mb-2">
                    <div class="d-flex justify-content-center text-center flex-row">
                     
                        <img width="30px" height="30px" class="img-responsive img_user" src="<?php echo $_SESSION['user_pic']; ?>" alt="<?php echo $_SESSION['userLogin']; ?>">
                    
                      <div><span><?php echo $_SESSION['userLogin']; ?></span></div>
                    </div>
                </div>
                <?php
                  }else {
                    echo "";
                  }
    ?>
              </a>
            </li>
           <?php 
           if($_SESSION){
              if($_SESSION['userLogin']){
                echo ' <li class="nav-item">
              <a class="nav-link" href="logout.php"> تسجيل خروج</a>
            </li>';
           }else {
              echo ' <li class="nav-item">
              <a class="nav-link" href="login.php"> دخول</a>
            </li>';
           }
           }
           ?>
           
          </ul>
          </div>
         
        </div>
      </div>
      <div class="row pt-5">
        <div class="col-12 text-center">
          <a class="absolute-toggle d-block d-md-none" data-toggle="collapse" href="#navbarMenu" role="button"
            aria-expanded="false" aria-controls="navbarMenu"><span class="burger-lines"></span></a>
          <h1 class="site-logo my-4"><a href="index.php">خوارزمي</a></h1>
        </div>
      </div>
    </div>
   
    <nav class="navbar navbar-expand-md  navbar-light bg-light">
      <div class="container">
        <div class="collapse navbar-collapse" id="navbarMenu">
          <ul class="navbar-nav mx-auto">
            <li class="nav-item">
              <a class="nav-link active" href="index.php">الريئسية</a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="category.html" id="dropdown05" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false">الاقسام</a>
              <div class="dropdown-menu" aria-labelledby="dropdown05">
              <?php 
                  foreach(show_cat() as $cat) {
                $cat_id = $cat["cat_ID"];
                $cat_title = $cat["cat_title"];
                echo "<a class='dropdown-item' href='category.php?cat_id=$cat_id'>{$cat_title}</a>";
                
                  }
              ?>
              </div>
            </li>
           
          
           <?php 
           if(!$_SESSION){
             echo '<li class="nav-item">
              <a class="nav-link" href="register.php"> تسجيل</a>
            </li>';
            echo ' <li class="nav-item">
              <a class="nav-link" href="login.php"> دخول</a>
            </li>';
           }
           ?>
            
          </ul>
        </div>
      </div>
    </nav>
  </header>