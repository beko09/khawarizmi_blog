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

				<h1 class="page-header">
					مرحبًا بك في لوحة الإدارة
				</h1>
				<?php

				
				if (isset($_GET['to'])) {
					$to = $_GET['to'];

					if ($to == "add_post") {
						include "includes/addpost.php";
						
					} elseif ($to == "edit_post"){
						include "includes/edit_post.php";
					}else {
						if($_SESSION['role']== 0){
							include "includes/post.php";
						}elseif($_SESSION['role']== 1) {
							include "posts_user.php";
						}else{
							  include "../index.php";
						}
					}
				} 
				else {
					if($_SESSION['role']== 0){
							include "includes/post.php";
					}elseif($_SESSION['role']== 1) {
							include "posts_user.php";
					}else{
							  include "../index.php";
					}
				}
				?>
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
