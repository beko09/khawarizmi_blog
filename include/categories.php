

<div class="sidebar-box">
            <h3 class="heading">الاقسام</h3>
            <ul class="categories">
             <?php 
 if(show_cat_sidebar() === false) {
     echo "<div class='alert alert-warning col-12'> لاتوجد اقسام </div>";
  ?>
<?php

}else { 
                foreach(show_cat_sidebar() as $cat) {
                $cat_id = $cat["cat_ID"];
                $cat_title = $cat["cat_title"];
                echo "<li><a href='category.php?cat_id=$cat_id'>{$cat_title}<span>(12)</span></a></li>";
                
                  }}
              ?>
             
  </ul>
</div>