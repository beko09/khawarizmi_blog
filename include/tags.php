
<div class="sidebar-box">
            <h3 class="heading">الوسوم</h3>
            <ul class="tags">
 <?php 
 if(show_tags() === false) {
     echo "<div class='alert alert-warning col-12'> لاتوجد وسوم </div>";
  ?>
<?php

}else {

  foreach (show_tags() as $posts) {
      $post_id = $posts['ID'];
      $tags = $posts['post_tags'];
      $all_tag = explode(",",$tags);
        foreach($all_tag as $tag){
          echo "<li><a href=''>$tag</a></li>";
        }
            
  }        
  }
  ?>
            </ul>
          </div>
