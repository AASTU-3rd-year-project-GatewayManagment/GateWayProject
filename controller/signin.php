
<?php
include '../controller/session.php';
include '../model/database.php';

if(isset($_POST['login-type'])){
	$loginType = $_POST['login-type'];
	$username = $_POST['username'];
	$password = $_POST['password'];
	
	if((strlen($username) != strlen(filter_var($username,FILTER_SANITIZE_STRING)))
	|| (strlen($password) != strlen(filter_var($password,FILTER_SANITIZE_STRING))))
	{
		echo "<div class='alert alert-danger' role='alert'>Invalid Characters</div>_bad";
	}else{
	
		$password =  md5($password);
	
	$query  = "SELECT * From $loginType  where username = '$username' and password = '$password'";
	$result = mysqli_query($connection,$query);
	$firstrow;
	while(($firstrow = mysqli_fetch_assoc($result))!=false){
		break;
	}
	if(mysqli_num_rows($result) > 0){
		$_SESSION['ID'] = $firstrow['ID'];
		
		
		// echo $_SESSION['ID'];
		// echo "session variables are set {$_SESSION['ID']}";
			if($loginType == 'admin'){
				echo "_goodadmin";
				$_SESSION['admin'] = true;
			}else{
				echo "_goodemp";
				$_SESSION['admin'] = false;
				$query = "UPDATE employee SET lastLogin = now() WHERE userName='$username'";
				try{
					mysqli_query($connection,$query);
				}catch(Exception $e){
					echo $e;
				}
			}
		}else{
				echo "<div class='alert alert-danger' role='alert'>Username or password incorrect</div>_bad";
	}
	
}
}

?>