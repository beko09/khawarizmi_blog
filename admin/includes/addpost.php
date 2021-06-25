
<?php 

// add post function
// function add($title, $content, $tags, $image, $author, $slug, $category, $status)
// {
//     // global $post_obj;
//     if ($target = upload($image, "post_images/", true)) {
//         $title = ucwords($title);
//         $data = [$title, $content, $category, $tags, $target, $author, $status, $slug];
//         if ($post_obj->addPost($data)) {
//             return true;
//         }
//         return false;
//     }
//     return false;
// }

// save 

// if (isset($_POST['save'])) {
//     $title = $_POST['title'];
//     $content = $_POST['content'];
//     $tags = $_POST['tags'];
//     $category = $_POST['categories'];
//     $image = $_FILES['image'];
//     $author = $user;
//     $slug = create_slug($title);
//     $status = (isset($_POST['status']) ? true : false);

//     if (add($title, $content, $tags, $image, $author, $slug, $category, $status)) {
//         $msg = "<div class='alert alert-success'>Post added successfully</div>";
//     } else {
//         $msg = "<div class='alert alert-danger'>Something went wrong!</div>";
//     }
// }




?>

<?php

if (isset($_POST['publish'])) {
        $title = $_POST['title'];
        $userId = $_POST['userId'];;
        $content = $_POST['content'];
        $tags = $_POST['tags'];
        $post_status = $_POST['status'];
        $category_id = $_POST['cat_id'];
        $date = date("l d F Y");
        if(isset($_FILES['post_img'])){
            $dir = "../images/";
            $target_file = $dir.basename($_FILES['post_img']['name']);
            if (move_uploaded_file($_FILES['post_img']['tmp_name'],$target_file)) {
            
                echo "image uploaded";
            }else {
                echo "not uploaded";
            }
        }
        add_post($category_id,$userId,$content,$date,$target_file,$title,$post_status,$tags);
    }

?>

<div class="col-lg-8">
    <h2>اضافة مقال</h2>
    <?php
    if (isset($msg)) {
        echo $msg;
    }
    //php echo $_SERVER['PHP_SELF']; 
    ?>
    <form action="<?php echo $_SERVER['PHP_SELF'].'?to=add_new'; ?>" method="post" enctype="multipart/form-data" >
        <div class="form-group">
            <label >العنوان</label>
            <input type="text" name="title" class="form-control" placeholder="عنوان المقال">
        </div>
        <div class="form-group">
            <input type="hidden" name="userId"  class="form-control" value="<?php echo $_SESSION['user_id']; ?>">
        </div>

        <div class="form-group">
            <label for="">الصورة</label>
            <input type="file" name="post_img">
        </div>

        <div class="form-group">
            <label for="">الوسوم</label>
            <input type="text" name="tags" id="" class="form-control" placeholder="افصل بين التاقات بي علامة (,)">
        </div>

        <div class="form-group">
            <label for="">محتوي المقال</label>
            <textarea name="content" id="" cols="5" rows="5" class="form-control"></textarea>
        </div>

        <div class="form-group">
            <label for="">الاقسام</label>
            <select name="cat_id" class="form-control">
               <?php

                if (load_category()) {
                    foreach (load_category() as $category) {
                        $cat_id = $category['ID'];
                        $cat_title = $category['cat_title'];
                        echo "<option value='$cat_id'> $cat_title</option>";
                    }
                }

                ?> 

            </select>

        </div>
     
        <?php 
        if ($_SESSION['role']==0) {
            echo '<div class="form-group">

            <label for="">
                <input type="checkbox" name="status" id="">
                نشر الان? 
            </label>

        </div>';
        }else {
            echo "";
        }
        ?>
        

        <div class="col-lg-12">
            <div class="col-lg-6">
                <div class="form-group">
                    <input type="submit" name="publish" value="حفظ" class="btn btn-info btn-block">
                </div>
            </div>
        </div>
    </form>
</div>