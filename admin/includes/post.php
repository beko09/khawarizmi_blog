<?php

if (isset($_GET['delete_post']) && $_GET['delete_post'] !== '') {
    $id = $_GET['delete_post'];
    if (delete_post('posts','post_ID',$id)) {
       header("Location: posts.php");
    }
}
if (isset($_GET['approve']) && $_GET['approve'] !== '') {
    $id = $_GET['approve'];
    if (modify_status('post_status','posts','post_ID',$id)) {
       header("Location: posts.php");
    }
}
if (isset($_GET['unapprove']) && $_GET['unapprove'] !== '') {
    $id = $_GET['unapprove'];
    if (modify_status('post_status','posts','post_ID',$id)) {
       header("Location: posts.php");
    }
}

if (loadPosts()) :

?>
    <div class="table-responsive">

        <table class="table table-striped table-hover ">
            <thead>
                <tr>
                    <th>العنوان</th>
                    <th>المحتوي</th>
                    <th>الناشر</th>
                    <th>القسم</th>
                    <th>الحالة</th>
                    <th>الصورة</th>
                    <th colspan="3" class="text-center">اجراء</th>
                </tr>
            </thead>
            <tbody>

                <?php

                foreach (loadPosts() as $posts) {
                    $user_id = $posts['user_id'];
                    $user_info = get_user($user_id);
                    foreach($user_info as $info){
                        $author = $info['name'];
                    }
                    $post_id = $posts['post_ID'];
                    $title = $posts['post_title'];
                    $content = substr($posts['post_content'], 0, 100);
                    
                    $category=load_one_category($posts['cat_id']);
                    $status = $posts['post_status'];
                    $status = ($status?$status:"unapproved");
                    $image = $posts['post_image'];
                    
                ?>
                    <tr>
                        <td><?php echo $title; ?></td>
                        <td><?php echo $content; ?></td>
                        <td><?php echo $author; ?></td>
                        <td><?php echo $category; ?></td>
                        <td><?php echo $status; ?></td>
                        <td>
                        <?php 
                            if($image){
                                echo "<img src='$image' width='50px' height='40px'/>";
                            }else {
                                echo "لا توجد صورة";
                            }
                         ?>
                         </td>
                            <?php
                            if ($status === "unapproved") {?>
                                <td> <a class="btn btn-success btn-block" href="posts.php?approve=<?php echo $post_id; ?>"> موافقة
                        </a></td>
                        <?php
                            }else {
                                ?>
                                <td><a class="btn btn-warning btn-block" href="posts.php?unapprove=<?php echo $post_id; ?>"> عدم الموافقة
                        </a></td>'
                        <?php
                            }
                       
                            ?>
                        
                         <td><?php echo "<a href='posts.php?edit=$post_id' class='btn btn-info btn-block'> تعديل
                        </a>"; ?></td>
                         <td><a href='posts.php?delete_post=<?php echo $post_id; ?>' class='btn btn-danger btn-block'> مسح
                        </a></td>
                    </tr>
                <?php
                };

                ?>

            </tbody>
        </table>

    </div>

<?php
else :
    echo "<h4 class='text-center'>لا توجد بيانات</h4>";
endif;


?>
