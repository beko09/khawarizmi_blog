<?php
if (isset($_GET['edit_post']) && $_GET['edit_post'] !== '') {
           $edit_id = $_GET['edit_post'];

           
         }

if (isset($_POST['save_edit_post'])) {
        $title = $_POST['title'];
        $postID = $_POST['postID'];
        $userId = $_POST['userId'];;
        $content = $_POST['content'];
        $tags = $_POST['tags'];
        $post_status = $_POST['status'];
        $category_id = $_POST['cat_id'];
        $date = date("l d F Y");
        $post_img = $_FILES['post_img']['name'];
        $img =  $_POST['img'];
        if(isset($_FILES['post_img'])&& $post_image != ''){
            $dir = "/images/";
            $target_file = $dir.basename($_FILES['post_img']['name']);
            if (move_uploaded_file($_FILES['post_img']['tmp_name'],$target_file)) {
            
                echo "image uploaded";
            }else {
                echo "not uploaded";
            }
        }else {
            $target_file = $img;
        }
        if (update_post($category_id,$userId,$content,$date,$target_file,$title,$post_status,$tags,$postID)) {
            die("ok");
        }
    }

?>

<div class="col-lg-8">
    <h2>تعديل مقال</h2>
    <?php 
    // start foreach to load post data
    foreach (single_post($edit_id) as $post) {
      $post_id = $post['post_ID'];
      $post_title = $post['post_title'];
      $post_content = $post['post_content'];
        $post_tags = $post['post_tags'];
        $post_image = $post['post_image'];
        $post_status = $post['post_status'];
        $post_user_id = $post['user_id'];
    ?>



    <form action="<?php echo $_SERVER['PHP_SELF'].'?to=add_new'; ?>" method="post" enctype="multipart/form-data">
        <div class="form-group">
            <label>العنوان</label>
            <input type="text" name="title" class="form-control" value='<?php echo $post_title; ?>'>
        </div>
        <div class="form-group">
            <input type="hidden" name="userId" class="form-control" value="<?php echo $post_user_id; ?>">
            <input type="hidden" name="postID" class="form-control" value="<?php echo $post_id; ?>">
        </div>

        <div class="form-group">
            <label for="">الصورة</label>
            <input type="file" name="post_img">
            <br>
            <input type="hidden"  name="img" value="<?php echo $post_image; ?>">
            <img src="<?php echo $post_image; ?>" class="img-responsive img-rounded" height="100px" width="100%" />
        </div>

        <div class="form-group">
            <label for="">الوسوم</label>
            <input type="text" name="tags" id="" class="form-control" placeholder="افصل بين التاقات بي علامة (,)" value="
            <?php echo $post_tags; ?>">
        </div>

        <div class="form-group">
            <label for="">محتوي المقال</label>
            <textarea name="content" id="editor" cols="5" rows="5" class="form-control" value="">
                <?php echo $post_content; ?>
            </textarea>
        </div>

        <div class="form-group">
            <label for="">الاقسام</label>
            <select name="cat_id" class="form-control">
                <?php

                if (load_category()) {
                    foreach (load_category() as $category) {
                        $cat_id = $category['cat_ID'];
                        $cat_title = $category['cat_title'];
                        $select;
                        if($post['cat_id']== $cat_id){
                            $select = 'selected';
                        }else {
                            $select = '';
                        }
                        ?>

                <option <?php echo $select; ?> value='<?php echo $cat_id; ?>'> <?php echo $cat_title; ?></option>"
                <?php
                    }
                }

                ?>

            </select>

        </div>

        <?php 
        if ($_SESSION['role']==0) {
             $check;
            if($post['post_status']== 'approve'){
                $check = 'checked';
            }else {
                $check = '';
            }
            ?>
        <div class="form-group">

            <label>
                <input <?php echo $check; ?> type="checkbox" name="status" id="">
                نشر الان?
            </label>

        </div>
        <?php
        }else {
            echo "";
        }
        ?>


        <div class="col-lg-12">
            <div class="col-lg-6">
                <div class="form-group">
                    <input type="submit" name="save_edit_post" value="تعديل" class="btn btn-info btn-block">
                </div>
            </div>
        </div>
    </form>
    <?php 
    }
    //end foreach
    ?>
</div>
<script>
    //  CKEDITOR.replace('editor');
    ClassicEditor
        .create(document.querySelector('#editor'))
        .catch(error => {
            console.error(error);
        });
</script>