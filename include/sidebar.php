 <div class="sidebar-box">
            <h3 class="heading">احدث المقالات</h3>
            <div class="post-entry-sidebar">
              <ul>
 <?php 
 if(show_posts_sidebar() === false) {
     echo "<div class='alert alert-warning col-12'> لاتوجد مقالات </div>";
  ?>
<?php

}else {

  foreach (show_posts_sidebar() as $posts) {
      $post_id = $posts['post_ID'];
      $title = $posts['post_title'];
       $user_id = $posts['user_id'];
    $user_info = get_user($user_id);
    foreach($user_info as $info){
        $author = $info['name'];
        $author_pic = $info['pic'];
    }
    $category=load_one_category($posts['cat_id']);
      $date = $posts['post_date'];
      $image = $posts['post_image'];
    ?>
      <li>
              <a href="single-post.php?post=<?php echo $post_id; ?>">
               <?php if($image){
                  echo "<img src='../admin/$image'  alt='$title'>";
                    }else{
                    echo'';
                    };
                    ?>
                <div class="text">
                  <h4><?php echo $title; ?></h4>
                  <div class="post-meta">
                    <span class="mr-2"><?php echo $date; ?></span>
                  </div>
                </div>
              </a>
            </li>
          <?php
  }
}
?>
   </ul>
  </div>
</div>