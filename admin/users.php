<?php

include 'includes/header.php';

if (isset($_GET['delete_user']) && $_GET['delete_user'] !== '') {
    $id = $_GET['delete_user'];
    if (delete('users','user_ID',$id)) {
       header("Location: users.php");
    }
}
if (isset($_GET['approve']) && $_GET['approve'] !== '') {
    $id = $_GET['approve'];
    if (modify_status('is_active','users','user_ID',$id)) {
       header("Location: users.php");
    }
}
if (isset($_GET['unapprove']) && $_GET['unapprove'] !== '') {
    $id = $_GET['unapprove'];
    if (modify_status('is_active','users','user_ID',$id)) {
       header("Location: users.php");
    }
}

if (loadUsers()) :

?>
<div id="wrapper">
	<?php include 'includes/navigation.php'; ?>
	<div id="page-wrapper">

		<div class="container-fluid">

			<div class="table-responsive">
				<table class="table table-striped table-hover">
					<thead>
						<tr>
							<th>الاسم</th>
							<th>الايميل</th>
							<th>الحالة</th>
							<th colspan="3" class="text-center">اجراء</th>
						</tr>
					</thead>
					<tbody>

						<?php
                foreach (loadUsers() as $users) {
                    $user_id = $users['user_ID'];
                    $email = $users['email'];
                    $name = $users['name'];
                    $status = $users['is_active'];
                    $status = ($status?$status:"unapproved");
                    
                ?>
						<tr>
							<td><?php echo $name; ?></td>
							<td><?php echo $email; ?></td>
							<td><?php echo $status; ?></td>
							 <?php
                            if ($status === "unapproved") {?> 
							 <td><a class="btn btn-success btn-block"
									href="users.php?approve=<?php echo $user_id; ?>"> موافقة
								</a></td>
							<?php
                            }else {
                                ?>
							<td><a class="btn btn-warning btn-block" href="users.php?unapprove=<?php echo $user_id; ?>">
									عدم
									الموافقة
								</a>
							</td>
							<?php
                            }
                       
                            ?>


							<td><a href='users.php?delete_user=<?php echo $user_id; ?>'
									class='btn btn-danger btn-block'> مسح
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

		</div>
	</div>
</div>