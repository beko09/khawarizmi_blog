<?php include "include/header.php"; ?>
<!--  start wrap -->
<div class="wrap">
<!-- nav hear -->
<?php include "include/nav.php"; ?>
    <section class="site-section pt-5">
      <div class="container">
  
        <div class="row blog-entries">
          <div class="col-md-12 col-lg-8 main-content">
            <div class="row mb-5 mt-5">
              <div class="col-md-12">
                
                <?php include"include/cat_posts.php"; ?>
              </div>
            </div>
           
          </div>

           <div class="col-md-12 col-lg-4 sidebar">
          <div class="sidebar-box search-form-wrap">
            <form action="search.php" class="search-form" method="post">
              <div class="form-group">
                <span class="icon fa fa-search"></span>
                <input type="text" name="search" class="form-control" placeholder="ابحث عن ...">
              </div>
            </form>
          </div>

         <!--  sidebar here -->
         <?php include "include/sidebar.php"; ?>

          <!-- categories here -->
          <?php include "include/categories.php"; ?>

          <!--  tags here -->
          <?php include "include/tags.php"; ?>
        </div>

        </div>
      </div>
    </section>
<?php include "include/footer.php"; ?>