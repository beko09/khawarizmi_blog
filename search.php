<?php include "include/header.php"; ?>
<!--  start wrap -->
<div class="wrap">
<!-- nav hear -->
<?php include "include/nav.php"; ?>
  <section class="site-section py-sm">
    <div class="container">
      <div class="row">
        <div class="col-md-6">
          <h2 class="mb-4 p-2 mt-3">نتائج البحث </h2>
        </div>
      </div>
      <div class="row blog-entries">
        <div class="col-md-12 col-lg-8 main-content">
          <div class="row">
           <!-- posts here -->
           <?php include "include/search_post.php"; ?>
          </div>
        
        </div>

        <div class="col-md-12 col-lg-4 sidebar">
          <div class="sidebar-box search-form-wrap">
            <form action="search.php" class="search-form" method="post">
              <div class="form-group">
                <span class="icon fa fa-search"></span>
                <input type="text" name="search" class="form-control" id="s" placeholder="ابحث عن ...">
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