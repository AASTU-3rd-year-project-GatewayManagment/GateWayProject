<?php
include '../../controller/session.php';
if(($_SESSION['ID']) && $_SESSION['admin']){
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/admin-student.css">
    <link rel="stylesheet" href="../css/view-profile.css">
    <!-- <link rel="stylesheet" href="../css/student-search.css"> -->
    <script defer src="../js/admin-script.js"></script>
    <script defer src="../js/script.js"></script>

    <title><?php echo $_SESSION['page']?></title>
</head>

<body>

    <?php
       
        include_once('../include/sidebar.php');
        
        ?>

        <div class="content-body ">
            <div class="burger-menu-container">

                <img src="../images/burger-menu-white.png" alt="burger menu" id="burgerMenu">
            </div>
            <div class="view-profile-header">
                <h2>User Information</h2>
                <div class="small-nav">
                   <a href="#"><?php echo $_SESSION['page'] ?></a> >
                    <a href="#">
                          New User
                        </a>
                </div>
            </div>
            <div class="edit-profile-btn-container">
                <button id="open-btn">Import Csv</button>
            </div>
            <!-- import box pop up -->
            <div class="box-container import-box-container" id="import-box-container">
                <form class="import-box" action="../../controller/import-export.php" method="post" enctype="multipart/form-data">
                    <span class="import-box-heading">Import file</span>
                    <span class="import-box-allowed">Allowed types: csv</span>
                    <input type="file" name="import-file" id="import-file">
                    <div class="btn-box">

                        <input type="submit" id='import-btn-sumbit' name="submit" class="btn btn_save">
                        <button class="btn btn_cancel" id="close-import-box">Cancel</button>
                    </div>
                </form>
            </div>
            <form enctype="multipart/form-data" class="add-std-form" id='add-std-form'>
                <div class="add-profile-user-profile">

                    <div class="label-input">
                        <label for="user-id">Id <span>*</span></label>
                        <input type="text" name="user-id" placeholder="ID" required>
                    </div>

                    <div class="label-input">
                        <label for="user-firstName">First Name <span>*</span></label>
                        <input type="text" name="user-firstName" placeholder="First Name" required>
                    </div>
                    <div class="label-input">
                        <label for="user-lastName">Last Name <span>*</span></label>
                        <input type="text" name="user-lastName" placeholder="Last Name" required>
                    </div>

                    

                    <div class="<?php echo "hidden";?>" class="label-input" >
                        <label for="user-type" >User type</label>
                        <select name="user-type" id="user-type" required>
                                <option value="">None</option>
						   <option value="student" <?php if($_SESSION['page'] == "student"){echo "selected";}?>>Student</option>
						   <option value="staff" <?php if($_SESSION['page'] == "staff"){echo "selected";}?>>Staff</option>
						   <option value="security" <?php if($_SESSION['page'] == "security"){echo "selected";}?>>Security</option>
						   <option value="other" <?php if($_SESSION['page']=="employee"){echo "selected";}?>>other</option>
					   </select>
                    </div>
                    <div class="<?php if($_SESSION['page']=="employee" || $_SESSION['page'] == "security"){echo "hidden";}else{
                        echo "label-input";}?>" class="label-input">
                        <label for="user-level">Education Level</label>
                        <select 
                           name="user-level" id="user-level" required>

                           <option value="">None</option>
						   <option value="degree">Degree</option>
						   <option value="masters">Masters</option>
						   <option value="phd">Phd</option>
						   <option value="other" <?php if($_SESSION['page']=="employee" || $_SESSION['page'] == "security"){echo "selected";}?> >other</option>
					   </select>
                    </div>
                    <div class="label-input">
                        <label for="user-gender">Gender <span>*</span></label>
                        <select name="user-gender" id="user-gender" required>
                                <option value="">None</option>
							<option value="male">Male</option>
							<option value="female">Female</option>
						</select>
                    </div>


                    <div class="label-input">
                        <label for="user-img">Image Url</label>
                        <input type="file" id='user-img' name="user-img">
                    </div>



                </div>
                <div class="label-input submitContainer">
                    <input type="submit" name="submit" value="Submit" class="btn btn_save">
                    <input type="button" name="cancel" value="Cancel" class="btn btn_cancel">
                </div>

            </form>

        </div>
        <div id="submitstatus">

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