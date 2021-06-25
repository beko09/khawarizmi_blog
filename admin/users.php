<?php include 'includes/header.php'; ?>

<div id="wrapper">

	<!-- Navigation -->
	<?php include 'includes/navigation.php'; ?>


	<div id="page-wrapper">

		<div class="container-fluid">

			<!-- Page Heading -->
			<div class="row">

					<h1 class="page-header">
						Welcome to the Administration Panel
					</h1>
					 <div class="col-lg-6 col-md-6 col-sm-12">
                    <h1 class="page-header">
                        مرحب بك في البروفايل
                    </h1>
                    <div class="col-lg-8">
                        <form action="process.php" method="post">
                            <div class="form-group">
                                * مطلوب<input type="text" name="username" id="username" class="form-control" placeholder="اسم المستخدم" value="<?php echo $author; ?>">
                            </div>
                             <div class="form-group">
                                <label for="">الصورة</label>
                                <input type="file" name="post_img">
                            </div>
                            <div class="form-group">
                                * مطلوب<input type="email" name="email" id="email" class="form-control" placeholder="الايميل" value="<?php echo $email; ?>">
                            </div>
                            <div class="form-group">
                                * مطلوب<textarea name="الوصف" placeholder="Description" cols="5" rows="5" class="form-control"><?php echo $pio; ?></textarea>
                            </div>
                            <!-- <div class="form-group">
                                <input type="text" name="facebook" class="form-control" placeholder="Facebook Username" value="<?php //echo $details->fb; ?>">
                            </div> -->
                            <!-- <div class="form-group">
                                <input type="text" name="github" class="form-control" placeholder="Github Username" value="<?php //echo $details->github; ?>">
                            </div> -->
                            <!-- <div class="form-group">
                                <input type="text" name="youtube" class="form-control" placeholder="Youtube Channel ID" value="<?php //echo $details->ytb; ?>">
                            </div> -->
                            <div class="form-group">
                                <input type="submit" name="user_detail" class="btn btn-success" value="تحديث البروفايل">
                            </div>
                        </form>
                    </div>
                </div>

				</div>


			</div>

			<!-- /.row -->

		</div>
		<!-- /.container-fluid -->

	</div>
	<!-- /#page-wrapper -->

</div>
<!-- wrapper -->

<?php include "includes/footer.php"; ?>
