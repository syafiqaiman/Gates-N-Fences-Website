<?php
require('top.inc.php');
isAdmin();
$name='';
$code='';
$image='';
$price='';

$msg='';
if(isset($_GET['id']) && $_GET['id']!=''){
	$image_required='';
	$id=get_safe_value($con,$_GET['id']);
	$res=mysqli_query($con,"select * from tblproduct where id='$id'");
	$check=mysqli_num_rows($res);
	if($check>0){
		$row=mysqli_fetch_assoc($res);
		$name=$row['name'];
		$code=$row['code'];
		$image=$row['image'];
		$price=$row['price'];
	}else{
		header('location:customer_order.php');
		die();
	}
}

if(isset($_POST['submit'])){
	$name=get_safe_value($con,$_POST['name']);
	$code=get_safe_value($con,$_POST['code']);
	$image=get_safe_value($con,$_POST['image']);
	$price=get_safe_value($con,$_POST['price']);
	
	$res=mysqli_query($con,"select * from tblproduct where id='$id'");
	$check=mysqli_num_rows($res);
	if($check>0){
		if(isset($_GET['id']) && $_GET['id']!=''){
			$getData=mysqli_fetch_assoc($res);
			if($id==$getData['id']){
			
			}else{
				$msg="no product";
			}
		}else{
			$msg="no more product";
		}
	}
	
	
	if($msg==''){
		if(isset($_GET['id']) && $_GET['id']!=''){
			$update_sql="update tblproduct set name='$name',code='$code',image='$image',price='$price' where id='$id'";
			mysqli_query($con,$update_sql);
		}else{
			mysqli_query($con,"insert into tblproduct(name,code,image,price,status) values('$name','$code','$image','$price',1)");
		}
		header('location:customer_order.php');
		die();
	}
}
?>
<div class="content pb-0">
            <div class="animated fadeIn">
               <div class="row">
                  <div class="col-lg-12">
                     <div class="card">
                        <div class="card-header"><strong>CUSTOMER ORDER</strong><small> </small></div>
                        <form method="post" enctype="multipart/form-data">
							<div class="card-body card-block">
							   
								
								<div class="form-group">
									<label for="categories" class=" form-control-label">Name</label>
									<input type="text" name="name" placeholder="Enter coupon code" class="form-control" required value="<?php echo $name?>">
								</div>
								<div class="form-group">
									<label for="categories" class=" form-control-label">Code</label>
									<input type="text" name="code" placeholder="Enter coupon value" class="form-control" required value="<?php echo $code?>">
								</div>
								<div class="form-group">
									<label for="categories" class=" form-control-label">Image</label>
									<select class="form-control" name="image" required>
										<option value=''>Select</option>
									
									</select>
								</div>
								
								<div class="form-group">
									<label for="categories" class=" form-control-label">Price</label>
									<input type="text" name="price" placeholder="Enter price" class="form-control" required value="<?php echo $price?>">
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