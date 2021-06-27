<?php include 'includes/header.php'; ?>

<div id="wrapper">

    <!-- Navigation -->
    <?php include 'includes/navigation.php';
    if (isset($_POST['update_profile'])) {
        $name = $_POST['username'];
        $user_id = $_SESSION['user_id'];
        $pio = $_POST['pio'];
        $email = $_POST['email'];
        if(isset($_FILES['user_img'])){
            $dir = "images/profile/";
            $target_file = $dir.basename($_FILES['user_img']['name']);
            if (move_uploaded_file($_FILES['user_img']['tmp_name'],$target_file)) {
                echo "image uploaded";
            }else {
                echo "not uploaded";
            }
        }
        if (update_user($name,$email,$target_file,$pio,$user_id)) {
            header("Location: profile.php");
        }
    }

    $user_info = get_user($_SESSION['user_id']);
    foreach($user_info as $info){
        $author = $info['name'];
        $email = $info['email'];
        $pio = $info['pio'];
        $author_pic = $info['pic'];
    }

    ?>


    <div id="page-wrapper">

        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-12">
                     <h4 class="page-header">
                            مرحب بك في البروفايل
                        </h4>
                    <div class="sidebar-box card profile">
                        <div class="bio text-center mt-5">
                            <?php 
                            if($author_pic){ ?>
                            <img src="<?php echo $author_pic ;?>" alt="Image Placeholder" class="img-fluid">
                            <?php
                            }else {
                                 echo '<img src="images/default.png" alt="Image Placeholder"
                                class="img-fluid">';
                            }
                            ?>
                            <div class="bio-body">
                                <h2><?php echo $author; ?></h2>
                                <p><?php echo $pio; ?></p>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12">
                    <div class="edit_profile">
                        <h4 class="page-header">
                            تعديل البروفايل
                        </h4>
                        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data">
                            <div class="form-group">
                                * مطلوب<input type="text" name="username" id="username" class="form-control"
                                    placeholder="اسم المستخدم" value="<?php echo $author; ?>">
                            </div>
                            <div class="form-group">
                                <label for="">الصورة</label>
                                <input type="file" name="user_img">
                            </div>
                            <div class="form-group">
                                * مطلوب<input type="email" name="email" id="email" class="form-control"
                                    placeholder="الايميل" value="<?php echo $email; ?>">
                            </div>
                            <div class="form-group">
                                * مطلوب<textarea name="pio" placeholder="Description" cols="5" rows="5"
                                    class="form-control"><?php echo $pio; ?></textarea>
                            </div>
                            
                            <div class="form-group">
                                <input type="submit" name="update_profile" class="btn btn-success" value="تحديث البروفايل">
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
        <!-- row -->

    </div>
    <!-- container-fluid -->

</div>
<!-- page-wrapper -->

</div>
<!-- wrapper -->