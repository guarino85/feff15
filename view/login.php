<?php
if($_SESSION['username']) redirect('admin');
else {
	if(isset($_POST['password'])){
		if(sha1($_POST['password'])==LOGIN_PASSWORD){
			$_SESSION['username'] = LOGIN_USERNAME;
			redirect('admin');
		}
		else{
	?>
	
	Login error
	
	<?php
		}
	}
	else{
	?>
	
	Login form
	
	<?php
	}
}
?>