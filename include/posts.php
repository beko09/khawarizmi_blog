 <?php 
 if(show_posts() === false) {
     echo "<div class='alert alert-warning col-12'> لاتوجد منشورات </div>";
  ?>
<?php

}else {

  foreach (show_posts() as $posts) {
    
      $post_id = $posts['post_ID'];
      $title = $posts['post_title'];
      $content = substr($posts['post_content'], 0, 100);
      $user_id = $posts['user_id'];
    $user_info = get_user($user_id);
    foreach($user_info as $info){
        $author = $info['name'];
        $author_pic = $info['pic'];
    }
    $category=load_one_category($posts['cat_id']);
      $status = $posts['post_status'];
      $date = $posts['post_date'];
      $image = $posts['post_image'];
  ?>
      <div class="col-md-6">
              <a href="single-post.php?post=<?php echo $post_id; ?>" class="blog-entry element-animate" data-animate-effect="fadeIn">
             <?php if($image){
              echo "<img src='$image'  alt='$title'>";
            }else{
             echo'';
             };
             ?>
               
                 
                <div class="blog-content-body">
                  <div class="post-meta">
                    <span class="author mr-2">
                    <?php 
                    if($author_pic){
                      echo "<img width='30px' height='30px' src='$author_pic'
                     alt='$author'>";
                    }else{
                      echo "<img width='30px' height='30px' src='../images/profile/default.png'
                     alt='$author'>";
                    }
                    ?>
                      <?php echo $author ?> </span>&bullet;
                    <span class="mr-2"><?php echo $date ?> </span> &bullet;
                    
                  </div>
                  <h2><?php echo $title ?></h2>
                </div>
              </a>
            </div>
<?php
  }}
?>

