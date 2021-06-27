<?php include "include/header.php"; ?>
<!--  start wrap -->
<div class="wrap">
  <!-- nav hear -->
  <?php include "include/nav.php"; ?>
  <section class="site-section py-lg">
    <div class="container">
      <div class="row blog-entries element-animate">

        <?php 
         if (isset($_GET['post'])) {
           $post_id = $_GET['post'];
           
         }else {
           header("Location:index.php");
         }
        ?>
        <?php 
 if(get_single_post($post_id) === false) {
     echo "<div class='alert alert-danger col-12'> لاتوجد منشورات </div>";
  ?>
        <?php

}else {
         
foreach (get_single_post($post_id) as $posts) {
      $post_id = $posts['post_ID'];
      $title = $posts['post_title'];
      $content = $posts['post_content'];
      $user_id = $posts['user_id'];
      $user_info = get_user($user_id);
      foreach($user_info as $info){
          $author = $info['name'];
          $author_pic = $info['pic'];
      }
      $category=load_one_category($posts['cat_id']);
        $date = $posts['post_date'];
        $tags = $posts['post_tags'];
        $image = $posts['post_image'];
    ?>
        <div class="col-md-12 col-lg-8 main-content">
          <img src="../admin/<?php echo $image; ?>" alt="<?php echo $title; ?>" class="img-fluid mb-5">
          <div class="post-meta">
            <span class="author mr-2">
              <?php 
                    if($author_pic){
                      echo "<img width='30px' height='30px' src='../admin/$author_pic'
                     alt='$author' class='mr-2'>";
                    }else{
                      echo "<img class='mr-2' width='30px' height='30px' src='../images/profile/default.png'
                     alt='$author'>";
                    }
                    ?>
              <?php echo $author; ?></span>&bullet;
            <span class="mr-2"><?php echo $date; ?> </span> &bullet;

          </div>
          <h1 class="mb-4"><?php echo $title; ?></h1>
          <?php
              $all_tag = explode(",",$tags);
               foreach($all_tag as $tag){
                 echo "<a class='category mb-5' href=''>$tag</a>";
               }
             ?>

          <div class="post-content-body">

            <?php echo $content; ?>
          </div>



          <div class="pt-5">
            <p>Categories: <a href="#"><?php echo '#'.$category; ?></a>
            </p>
          </div>

        </div>
        <?php
}
}
?>
        <div class="col-md-12 col-lg-4 sidebar">
          <div class="sidebar-box search-form-wrap">
            <form action="search.php" class="search-form" method="post">
              <div class="form-group">
                <span class="icon fa fa-search"></span>
                <input type="text" name="search" class="form-control" placeholder="ابحث عن ...">
              </div>
            </form>
          </div>
          <!-- peson info -->


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