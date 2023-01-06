<?php
require('top.inc.php');
isAdmin();
$username='';
$password='';
$email='';
$mobile='';

$msg='';
if(isset($_GET['id']) && $_GET['id']!=''){
	$image_required='';
	$id=get_safe_value($con,$_GET['id']);
	$res=mysqli_query($con,"select * from member_users where id='$id'");
	$check=mysqli_num_rows($res);
	if($check>0){
		$row=mysqli_fetch_assoc($res);
		$fullname=$row['fullname'];
		$username=$row['username'];
		$email=$row['email'];
		$mobile=$row['mobile'];
		$password=$row['password'];
	}else{
		header('location:member_user.php');
		die();
	}
}

if(isset($_POST['submit'])){
	$fullname=get_safe_value($con,$_POST['fullname']);
	$username=get_safe_value($con,$_POST['username']);
	$email=get_safe_value($con,$_POST['email']);
	$mobile=get_safe_value($con,$_POST['mobile']);
	$password=get_safe_value($con,$_POST['password']);
	
	$res=mysqli_query($con,"select * from member_users where username='$username'");
	$check=mysqli_num_rows($res);
	if($check>0){
		if(isset($_GET['id']) && $_GET['id']!=''){
			$getData=mysqli_fetch_assoc($res);
			if($id==$getData['id']){
			
			}else{
				$msg="Username already exist";
			}
		}else{
			$msg="Username already exist";
		}
	}
	
	
	if($msg==''){
		if(isset($_GET['id']) && $_GET['id']!=''){
			$update_sql="update member_users set username= '$fullname','$username',password='$password',email='$email',mobile='$mobile' where id='$id'";
			mysqli_query($con,$update_sql);
		}else{
			mysqli_query($con,"insert into member_users(fullname,username,password,email,mobile,role,status) values('$fullname','$username','$password','$email','$mobile',1,1)");
		}
		header('location:member_users.php');
		die();
	}
}
?>
<div class="content pb-0">
            <div class="animated fadeIn">
               <div class="row">
                  <div class="col-lg-12">
                     <div class="card">
                        <div class="card-header"><strong>REGISTERED MEMBER</strong><small> </small></div>
                        <form method="post" enctype="multipart/form-data">
							<div class="card-body card-block">
							   
								<div class="form-group">
									<label for="fullname" class=" form-control-label">Fullname</label>
									<input type="text" name="fullname" placeholder="Enter fullname" class="form-control" required value="<?php echo $username?>">
								</div>
								<div class="form-group">
									<label for="username" class=" form-control-label">Username</label>
									<input type="text" name="username" placeholder="Enter username" class="form-control" required value="<?php echo $username?>">
								</div>
								<div class="form-group">
									<label for="password" class=" form-control-label">Password</label>
									<input type="text" name="password" placeholder="Enter password" class="form-control" required value="<?php echo $password?>">
								</div>
								
								<div class="form-group">
									<label for="password" class=" form-control-label">Email</label>
									<input type="email" name="email" placeholder="Enter email" class="form-control" required value="<?php echo $email?>">
								</div>
								<div class="form-group">
									<label for="categories" class=" form-control-label">Mobile</label>
									<input type="text" name="mobile" placeholder="Enter mobile" class="form-control" required value="<?php echo $mobile?>">
								</div>
								
								
							   <button id="payment-button" name="submit" type="submit" class="btn btn-lg btn-info btn-block">
							   <span id="payment-button-amount">SUBMIT</span>
							   </button>
							   <div class="field_error"><?php echo $msg?></div>
							</div>
						</form>
                     </div>
                  </div>
               </div>
            </div>
         </div>
		 
		 
         
<?php
require('footer.inc.php');
?>