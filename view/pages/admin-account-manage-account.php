<?php 
session_start();
include '../../model/database.php';
unset($_SESSION['page']);   
$_SESSION['page'] = "account";
if(($_SESSION['ID']) && ($_SESSION['admin'])){
    $query ="SELECT 
        a.userName,
        a.ID,a.email,
        u.firstName,
        u.lastName,u.imgUrl
    from admin a
    inner join user u
    on u.id = a.id
    where a.id = 'ets0512/12';
    ";
    $result = mysqli_query($connection,$query);
    $row;
    if($result){
        while($row1 = mysqli_fetch_assoc($result)){
            $row = $row1;
            break;
        }
    }else{
        $row='';
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link rel="stylesheet" href="../css/student-search.css"> -->
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/admin-account.css">
    <link rel="stylesheet" href="../css/admin-account-manage-account.css">
    <script defer src="../js/script.js"></script>
    <script defer src="../js/admin-script.js"></script>
    <script defer src="../js/admin-account.js"></script>
    <title>Accounts</title>
</head>

<body>

<?php
include_once('../include/sidebar.php');

?>

        <div class="content-body ">
            <div class="burger-menu-container">

                <img src="../images/burger-menu-white.png" alt="burger menu" id="burgerMenu">
            </div>

            <div class="accounts_section">
                <div class="accounts_list_header">

                    <div class="accounts-nav">
                        <a href="../pages/admin-account-myaccount.php">My Account</a>
                        <a href="#">Manage Accounts</a>
                    </div>



                    <div class="accounts-list " id="accounts-list">
                        <div class="createAccountBtnContainer">
                            <button id="createAccountBtn" onclick="openBox('personal-change-account','accounts-list')">Create Account</button>
                        </div>
                        <div class="personal_setting_box" id="personal_setting_box">
                            <h4 class='personal_setting_header' id='personal_setting_header'>
                                Accounts List

                            </h4>
                            <div class="searchbar ">
                                <select name="searchby " id='searchby'>
								   <option value='ID'>Id</option>
								   <option value='firstName' selected>Name</option>
							   </select>
                                <input type="search " name="search_std " id="search_std " placeholder="search " onkeyup="getStd(this.value,'security','','',true) ">
                            </div>
                            <ul class="list-header ">
                                <li></li>
                                <li>Name <span><img src="../images/dec.png " alt="sort " id="name-sort-dec " onclick="Asc('firstName','security') " ><img src="../images/asc.png " alt="sort " id="name-sort-asc " onclick="Desc('firstName','security') "></span>
                                </li>
                                <li>ID<span><img src="../images/dec.png " alt="sort " id="id-sort-dec "
											onclick="Asc('ID','security',true)"
											><img src="../images/asc.png " alt="sort " id="id-sort-asc " 
											onclick="Desc('ID','security',true)"
											></span></li>
                                <li>Username</li>
                                <li>Last Login</li>
                                <li></li>
                            </ul>
                            <div class="list-content-container ">
                                <?php 
		$query = "SELECT 
			u.firstName,u.lastName,u.ID,u.imgUrl,
			e.userName,e.lastLogin
		 FROM employee e
				  INNER JOIN user u
				  on u.ID = e.ID
			 ";
		$result = mysqli_query($connection,$query);
		if($result){
			while($row1 = mysqli_fetch_array($result,MYSQLI_ASSOC)){
				
				?>
                                <ul class="list-content">
                                    <li><img src="<?php echo '../images/upload/'.$row1['imgUrl'];   ?>" alt="profile "></li>
                                    <li class="user-name ">
                                        <?php  echo $row1['firstName']." ".$row1['lastName']  ?>
                                    </li>
                                    <li class="user-id ">
                                        <?php  echo $row1['ID'];  ?>
                                    </li>
                                    <li class="user-user-name ">
                                        <?php  echo $row1['userName'];  ?>
                                    </li>
                                    <li class="user-last-login ">
                                        <?php  echo $row1['lastLogin'];  ?>
                                    </li>
                                    <li class="actions ">
                                        <img src="../images/sidemore.png " alt="menu " id="three-dots-<?php echo $row1[ 'ID'] ?> " onmouseover="openmenu(this.id) ">
                                        <div class="menu-choice " id="form-<?php echo $row1[ 'ID'] ?>" onmouseleave="closemenu(this.id) ">
                                            <form class="choice1 " action="../../controller/profile-option.php" method="post">
                                                <input class="dot-menu-hidden" type="text" name="stdid" value=<?php echo $row1[ 'ID'] ?> >
                                                <input type="submit" name="view" value="View profile">
                                            </form>
                                            <form action="../../controller/profile-option.php" method="post" class="choice1 ">
                                                <input class="dot-menu-hidden" type="text" name="stdid" value=<?php echo $row1[ 'ID'] ?> >
                                                <input type="submit" name="edit" value="Edit profile">
                                            </form>
                                            <form class="choice1 ">
                                                <input class="dot-menu-hidden" type="text" name="stdid" value=<?php echo $row1[ 'ID'] ?> >
                                                <input type="button" name="delete"
                                                id='delete-<?php echo $row1[ 'ID'] ?>' 
                                                onclick="sendUserID(this.id,'to-be-delete-id','delete-account-container')"
                                                value="Delete Account" >
                                            </form>
                                            <form class="choice1 ">
                                                <input class="dot-menu-hidden" type="text" name="stdid" value=<?php echo $row1[ 'ID'] ?> >
                                                <input type="button" name="changeUserName" id='userName-<?php echo $row1[ 'ID'] ?>' onclick="sendUserID(this.id,'userName-userID','personal-change-userName')" value="Change User Name">
                                            </form>
                                         
                                            <form class="choice1 ">
                                                <input class="dot-menu-hidden" type="text" name="stdid" value=<?php echo $row1[ 'ID'] ?> >
                                                <input type="button" name="changePassword" id='pass-<?php echo $row1[ 'ID'] ?>' onclick="sendUserID(this.id,'pass-userID','personal-change-password')" value="Change Password">
                                            </form>



                                        </div>

                                    </li>
                                </ul>

                                <?php 
				}
			}
			
			
			?>
                            </div>

                        </div>
                    </div>
                    <form id="personal-change-password" class="personal-change-password" method="POST" action="../../controller/changePass.php">
                        <h4 class='personal_setting_header'>
                            Change Password
                        </h4>
                        <div class="change-password-box">
                        <div class="input-label">
                                <label for="pass-userID">
                                    ID
                                </label>
                                <input  type="text" name="userID" id="UserID" value=""  required readonly>
                            </div>
                            <div class="input-label">
                                <label for="newPass">
                                    New Password
                                </label>
                                <input type="password" name="newPass" id="UserNewPass" required>
                            </div>
                            <div class="input-label">
                                <label for="confirmNewPass">
                                    Confirm New Password
                                </label>
                                <input type="password" name="confirmNewPass" id="UserConfirmNewPass" required>
                            </div>
                            <div class="input-label">
                                <label for="adminPass">
                                    Admin Password
                                </label>
                                <input type="password" name="adminPass" id="UserAdminPass" required>
                            </div>
                            <div class="error-section" id="UserPassErrorSection">

                            </div>
                            <div class="change-btn-box">
                            <button  onclick="openBox('accounts-list','personal-change-password')" class="btn btn_cancel" id="cancelChangePassword">Cancel</button>
                                <input type="submit" name="btnSubmit" class="btn btn_save" id="UserchangePass" value="Save" form="form3" required>
                            </div>
                        </div>

                    </form>

                    <form id="personal-change-userName" class="personal-change-userName" method="POST" action="../../controller/admin.php">
                        <h4 class='personal_setting_header'>
                            Change User name
                        </h4>
                        <div class="change-password-box">
                        <div class="input-label">
                                <label for="userName-userID">
                                    ID
                                </label>
                                <input  type="text" name="userID" id="userName-userID" value=""  required readonly>
                            </div>
                            <div class="input-label">
                                <label for="newUserName">
                                    New user name
                                </label>
                                <input type="text" name="newUserName" id="newUserName" required>
                            </div>
                            <div class="input-label">
                                <label for="admin-password">
                                     Password
                                </label>
                                <input type="password" name="admin-password" id="admin-password" required>
                            </div>

                            <div class="error-section" id="userNameErrorSection">

                            </div>
                            <div class="change-btn-box">
                            <button  onclick="openBox('accounts-list','personal-change-userName')" class="btn btn_cancel" id="cancelChangeUserName">Cancel</button>
                                <input type="submit" name="btnSubmit2" id="changeUserName" class="btn btn_save" value="Save">
                            </div>



                        </div>



                    </form>

                    <form id="personal-change-account" class="personal-change-account" method="POST" action="../../controller/admin.php">
                        <h4 class='personal_setting_header'>
                            Create Account
                        </h4>
                        <div class="change-password-box">

                            <div class="input-label">
                                <label for="id">
                                    ID
                                </label>
                                <input type="text" name="id" id="create_id" required>
                            </div>
                            <div class="input-label">
                                <label for="new-user-name">
                                     User Name
                                </label>
                                <input type="text" name="new-user-name" id="new-user-name" required>
                            </div>
                            <div class="input-label">
                                <label for="new-password">
                                     Password
                                </label>
                                <input type="password" name="new-password" id="new-password" required>
                            </div>
                            <div class="input-label">
                                <label for="re-new-password">
                                    Retype Password
                                </label>
                                <input type="password" name="re-new-password" id="re-new-password" required>
                            </div>
                            <div class="error-section" id="create-acc-err">

                            </div>
                            <div class="change-btn-box">
                                <button onclick="openBox('accounts-list','personal-change-account')" class="btn btn_cancel" id="createAccountCancel">Cancel</button>
                                <input type="submit" name="createAccount" id="createAccount" value="Create Account"
                                class="btn btn_save"
                                >
                            </div>



                        </div>



                    </form>
                <div class="delete-account-container" id="delete-account-container">
                    <form id="personal-delete-account" class="personal-delete-account" method="POST" action="../../controller/admin.php">
                        <h4 class='personal_setting_header delete'>
                            Delete Account
                        </h4>
                        <div class="change-password-box">

                            <div class="delete-warning-box">
                                <p>Once you delete this account,there's no getting it back. Make sure you want to do this.</p>
                            </div>
                            <input type="text" value="" id="to-be-delete-id" name="to-be-delete-id" required readonly class="hidden">
                            <div class="input-label">
                                <label for="delete-admin-password">
                                     Admin Password
                                </label>
                                <input type="password" name="delete-admin-password" id="delete-admin-password" >
                            </div>
                            
                            <div class="error-section" id="delete-acc-err">

                            </div>
                            <div class="change-btn-box">
                                <button  onclick="openBox('accounts-list','delete-account-container')" class="btn btn_delete-cancel" id="deleteAccountCancel">Cancel</button>
                                <input type="submit" name="createAccount" id="deleteAccount" value="Delete Account"
                                class="btn btn_cancel"
                                >
                            </div>



                        </div>



                    </form>


                    </div>


                </div>



            </div>
            <div id="submitstatus" class="submitStatus">

            </div>
    </main>



</body>

</html>
<?php 
    }
    else{
        header("Location: ../../index.php ");
    }
?>