<?php

include 'includes/header.php';

?>

<div id="wrapper">

	<!-- Navigation -->
	<?php include 'includes/navigation.php'; ?>


	<div id="page-wrapper">

		<div class="container-fluid">

			<!-- Page Heading -->
			<div class="row">
<?php if (load_posts_user($_SESSION['user_id'])) :

?>
    <div class="table-responsive">

        <table class="table table-striped table-hover">
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

                foreach (load_posts_user($_SESSION['user_id']) as $posts) :
                    $user_id = $posts['user_id'];
                    $user_info = get_user($user_id);
                    foreach($user_info as $info){
                        $author = $info['name'];
                    }
                    $post_id = $posts['ID'];
                    $title = $posts['post_title'];
                    $content = substr($posts['post_content'], 0, 100);
                    
                    $category=load_one_category($posts['cat_id']);
                    $status = $posts['post_status'];
                    $image = $posts['post_image'];
                    $status = ($status ? $status : "draft");
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
                                echo "<img src='images/$image' width='50px' />";
                            }else {
                                echo "لا توجد صورة";
                            }
                         ?>
                         </td>

                        
                         <td><?php echo "<a href='posts.php?edit=$post_id' class='btn btn-info btn-block'> Edit
                        </a>" ?></td>
                         <td><?php echo "<a href='posts.php?delete=$post_id' class='btn btn-danger btn-block'> Delete
                        </a>" ?></td>



                    </tr>
                <?php
                endforeach;

                ?>

            </tbody>
        </table>

    </div>

<?php
else :
    echo "<div class='alert alert-warning mt-3'>لا توجد بيانات</div>";
endif;


?>
</div>

	<!-- row -->

</div>
<!-- container-fluid -->

</div>
<!-- page-wrapper -->

</div>
<!-- wrapper -->

<?php include "includes/footer.php"; ?>