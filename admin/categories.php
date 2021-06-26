<?php
include 'includes/header.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $category = $_POST['cat_add'];
    $msg = "";
    if ($category != "") {
       add_cat($category);
        $msg = "<div class='alert alert-success' id='msg'>تم اضافة القسم</div>";
       
    } else {
        $msg = "<div class='alert alert-danger' id='msg'>هذا الحقل مطلوب</div>";
    }
}



// delete category

if (isset($_GET['delete_cat'])) {
    $id = $_GET['delete_cat'];
    if (delete_cat($id)) {
        header("Location: categories.php");
        $message = "<div class='alert alert-success' id='msg'> تم مسح القسم والمنشورات التي تتعلق به</div>";
    } else {
        $message = "<div class='alert alert-danger' id='msg'>  هذا القسم غير موجود</div>";
    }
}

?>

<div id="wrapper">

    <!-- Navigation -->
    <?php include 'includes/navigation.php'; ?>


    <div id="page-wrapper">

        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="row">
                <div class="col-lg-12">

                    <h1 class="page-header">
                        مرحبًا بك في لوحة الإدارة
                    </h1>
                    <div class="col-sm-6">
                        <?php

                        if (isset($msg)) {
                            echo $msg;
                        }

                        ?>
                        <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
                            <div class="form-group">
                                <input type="text" name="category" placeholder="اسم القسم" class="form-control">
                            </div>
                            <div class="form-group">
                                <input type="submit" name="cat_add" value="اضافة قسم" class="btn btn-primary">
                            </div>
                        </form>

                    </div>
                    <div class="col-sm-6">
                        <?php

                        if (isset($message)) {
                            echo $message;
                        }

                        ?>
                        <?php
                        if (load_category()) {
                        ?>
                            <table class="table table-hover table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>اسم القسم</th>
                                        <th colspan="2">اجراء</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    foreach (load_category() as  $category) {
                                        $id = $category['cat_ID'];
                                        $cat = $category['cat_title'];
                                        echo "<tr>
                                            <!-- <td>$id</td> -->
                                            <td>$cat</td>
                                            <td><a href='?delete_cat=$id' class='btn btn-danger text-center'>مسح</a></td>
                                        </tr>"
                                    ?>

                                <?php
                                    };
                                    // end foreach
                                    echo "</tbody>
                                </table>";
                        }
                                else {
                                    echo "<h2 class='text-center'>لا توجد اقسام</h2>";
                                };

                                ?>
                    </div>
                    <!-- end row -->
                </div>
            </div>

        </div>
        <!-- end container-fluid -->

    </div>
    <!-- end wrapper -->

</div>

<script>
    // remove message after 5 second
    try {
        let msg = document.getElementById('msg');
        setTimeout(() => {
            msg.style.display = "none";
        }, 5000);
    } catch (error) {
        console.log(error);
    }
</script>
<?php include "includes/footer.php"; ?>