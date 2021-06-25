 <?php
if (isset($_GET['cat_id'])){
    $cat_id = $_GET['cat_id'];

 if(show_posts_cat($cat_id) === false) {
     echo "<div class='alert alert-danger col-lg-12'> لاتوجد منشورات </div>";
} else {
  foreach (show_posts_cat($cat_id) as $posts) {
     
      $post_id = $posts['ID'];
      $title = $posts['post_title'];
      $content = substr($posts['post_content'], 0, 100);
      $user_id = $posts['user_id'];
      $user_info = get_user($user_id);
      foreach($user_info as $info){
          $author = $info['name'];
      }
      $category=load_one_category($posts['cat_id']);
      $status = $posts['post_status'];
      $date = $posts['post_date'];
      $image = $posts['post_image'];
  ?>
  
      <div class="post-entry-horzontal">
                  <a href="single.php?post=<?php echo $post_id; ?>">
                    <div class="image element-animate" data-animate-effect="fadeIn"
                      style="background-image:url(admin/images/<?php echo $image; ?>)"></div>
                    <span class="text">
                      <div class="post-meta">
                        <span class="author mr-2">
                        <img src="admin/images/<?php echo $image; ?>" alt="<?php echo $title; ?>"> <?php echo $author; ?>
                        </span>&bullet;
                        <span class="mr-2"><?php echo $date; ?> </span> &bullet;
                        <span class="mr-2">Food</span> 
                      </div>
                      <h2>
                          <?php echo $title; ?>
                      </h2>
                    </span>
                  </a>
                </div>

<?php
  }
}
  } else {
      header("Location:index.php");
  }
?>

