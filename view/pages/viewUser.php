<!-- <?php
include '../../controller/session.php';
include '../../model/database.php';
// fetch the users profile
if(($_SESSION['ID'])){

    if($_GET['id']){

        $id = $_GET['id'];
        $query = "SELECT * FROM user WHERE id='$id'";
        echo $query;
        $result = mysqli_query($connection,$query);
        $row = mysqli_fetch_assoc($result);

        // for fetching date
        $query = "SELECT
        u.ID,
        DATE_FORMAT(ul.lastEntry,'%Y-%m-%d %h:%i:%S %p') as lastEntry,
        DATE_FORMAT(ul.lastExit,'%Y-%m-%d %h:%i:%S %p') as lastExit
        FROM user u
        INNER JOIN user_log ul
        ON u.ID = ul.ID
        WHERE u.ID = '$id'
        ORDER BY ul.EID desc
        ";
        $firstRow;
        $result = mysqli_query($connection,$query);
            while($val = mysqli_fetch_assoc($result)){
                    $firstRow = $val;
                break;
                
            };

        // for fetching devices
        $query="SELECT 
        udl.ID,
        d.deviceName,
        udl.serialNumber,
        DATE_FORMAT(MAX(udl.entryDate),'%Y-%m-%d %h:%i %p') as lastEntry,
        DATE_FORMAT(MAX(udl.exitDate),'%Y-%m-%d %h:%i %p') as lastExit
        FROM user_device_log udl
        INNER JOIN device d
        ON udl.serialNumber = d.serialNumber
        WHERE udl.ID = '$id'
        GROUP BY serialNumber

        ";
        $device_result = mysqli_query($connection,$query);
        $result2 = mysqli_query($connection,$query);



?> -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/admin-student.css">
    <link rel="stylesheet" href="../css/view-profile.css">
    <link rel="stylesheet" href="../css/student-search.css">
    <script defer src="../js/view-profile.js"></script>
    <script defer src="../js/admin-script.js"></script>
    <script defer src="../js/script.js"></script>
    <script defer src="../js/entrance.js"></script>
    <script defer src="../js/device.js"></script>


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
            <div class="view-profile-header">
                <h2>Viewing
                    <?php echo ucfirst($row['firstName']).' '.ucfirst($row['lastName']).'\'s ' ?>Profile</h2>
                <div class="small-nav">
                    <a href="../../view/pages/admin-<?php echo $row['user_type']?>.php">
                        <?php echo $row['user_type']?> </a> >
                    <a href="#">
                        <?php echo ucfirst($row['firstName']).' '.ucfirst($row['lastName']).'' ?>
                    </a>
                </div>
            </div>

            <?php if($_SESSION['admin']){?>


            <form class="edit-profile-btn-container" action="../../controller/edit-profile.php" method="post">
                <input type="text" name="stdid" class="hidden" value="<?php echo $row['ID']?>">

                <button type="submit" name="edit">Edit Profile</button>

            </form>


            <?php } ?>

            <div class="view-profile-user-profile">
                <div class="user-img">
                    <img src="<?php echo '../images/upload/'.$row['imgUrl'];   ?>" alt="User">
                </div>

                <ul class="other-info">
                    <li class="user-name"><span>Full Name</span>
                        <?php echo ucfirst($row['firstName']).' '.ucfirst($row['lastName'])?>
                    </li>
                    <li class="user-id"><span>Id</span>
                        <?php echo  strtoupper($row['ID'])  ?>
                    </li>
                    <li class="user-gender"><span>Gender</span>
                        <?php echo ucfirst($row['gender'])?>
                    </li>
                    <li class="user-edu-level"><span>Educational Level</span>
                        <?php echo ucfirst($row['user_level'])?>
                    </li>
                    <li class="user-type"><span>User Type</span>
                        <?php echo ucfirst($row['user_type'])?>
                    </li>
                    <li class="user-last-entry"><span>Last Entry</span>
                        <?php if($firstRow['lastEntry']){ echo $firstRow['lastEntry'];}
                        else{
                        echo "Date not Correct";} ?>
                    </li>
                    <li class="user-last-exit"><span>Last Exit</span>
                        <?php echo $firstRow['lastExit'] ?>

                    </li>


                </ul>

            </div>

            <div class="device_container">
                <!-- title of the info section -->
                <h2>Registered Devices <button class='btn-add-device' id='open-btn'>Add</button> </h2>

                <ul class="device_header">
                    <li class="device_id"><span> ID</span></li>
                    <li class="device_name"><span>Device Name</span></li>
                    <li class="device_serial"><span>Serial Number</span></li>
                    <li class="device_entry"><span>Last Entry </span></li>
                    <li class="device_exit"><span>Last Exit </span></li>
                </ul>

                <!-- Devices registered for the user -->
                <div class="device_list_container">
                    <?php    
                            $count = 1;
                            
                             while($device = mysqli_fetch_assoc($device_result)){

                                
                    ?>



                    <div>
                        <ul class="device_list">
                            <li class="device_id"><span><?php echo $count ?></span></li>
                            <li class="device_name"><span><?php echo $device['deviceName'] ?></span></li>
                            <li class="device_serial"><span><?php echo $device['serialNumber'] ?></span></li>
                            <li class="device_entry"><span><?php echo $device['lastEntry'] ?></span></li>
                            <li class="device_exit"><span><?php echo $device['lastExit'] ?></span></li>
                            

                        </ul>
                    </div>

                    <?php
                        $count = $count + 1;
                        }
                        ?>

                </div>

            </div>
            <div class=" box-container add-device-container" id="add_device_container">
                <form class="add-device-box" id="add-device-box">
                    <span class='add-device-heading'>Add Device</span>
                    <input type="text" class="hidden" name="id" value="<?php echo $row['ID']?>">
                    <div class="input-label">
                        <label for="deviceName">Device Name</label>
                        <input type="text" name="deviceName" placeholder="Device Name">
                    </div>

                    <div class="input-label">
                        <label for="deviceSerial">Serial Number</label>
                        <input type="text" name="deviceSerial" placeholder="Serial Number">
                    </div>
                    <div class="btn-box">
                        <input type="submit" name="submit" id="add_device_btn" class="btn btn_save">
                        <button class="btn btn_cancel" id="close-import-box">Cancel</button>
                    </div>
                    <div class="error_box" id="add_device_error">

                    </div>
                </form>
            </div>

            <!-- edit Device Container -->
            <div class=" box-container add-device-container" id="edit_device_container">
                <form class="add-device-box" id="edit-device-box">
                    <span class='add-device-heading'>Edit Device</span>
                    <input type="text" class="hidden" name="id" value="<?php echo $row['ID']?>">
                    <input type="text" class="hidden" name="orginalSerial" id="orginalSerial">
                    <div class="input-label">
                        <label for="deviceName">Device Name</label>
                        <input type="text" name="deviceName" placeholder="Device Name" id="toedit_device_name">
                    </div>

                    <div class="input-label">
                        <label for="deviceSerial">Serial Number</label>
                        <input type="text" name="deviceSerial" placeholder="Serial Number" id="toedit_serial">
                    </div>
                    <div class="btn-box">
                        <input type="submit" name="update" id="edit_device_btn" class="btn btn_save" value="Update">
                        <button class="btn btn_cancel" id="cancel_edit_btn">Cancel</button>
                    </div>
                    <div class="error_box" id="edit_device_error">

                    </div>
                </form>
            </div>

            <div class="delete-account-container" id="delete-account-container">
                <form id="personal-delete-device" class="personal-delete-account">
                    <h4 class='personal_setting_header delete'>
                        Delete Device
                    </h4>
                    <div class="change-password-box">

                        <div class="delete-warning-box">
                            <p>Make sure you want to do this.</p>
                        </div>
                        <input type="text" id="to-be-delete-id" name="stdID" required class="hidden">
                        <input type="text" value="" id='to-be-delete-serial' name="serialNumber" required class="hidden">
                        <div class="input-label">
                            <label for="delete-admin-password">
                                    
                                </label>
                            <input type="password" name="delete-admin-password" id="delete-admin-password" placeholder="Adminstrator Password">
                        </div>

                        <div class="error-section" id="delete-device-error">

                        </div>
                        <div class="change-btn-box">
                            <button class="btn btn_white" id="deleteDeviceCancel">Cancel</button>
                            <input type="submit" name="deleteDevice" id="deleteDevice" value="Delete Device" class="btn btn_cancel">
                        </div>



                    </div>



                </form>


            </div>


        </div>

        <?php 
if(!$_SESSION['admin']){
?>
        <div class="in_or_out_container" id="in_or_out_container">

            <form class="in_or_out " method="post" id="entrance_form">
                <div class="inout_label_input ">
                    <input type="text" name="user_id" class="hidden" value=<?php echo $row['ID'] ?>>
                    <input type="radio" name="size" id="small " value="in" required <?php if(strtotime($firstRow[ 'lastEntry'])> strtotime($firstRow['lastExit'])){ echo "disabled"; }else{ echo "checked"; } ?> >
                    <label for="small " class="radioLabel ">IN</label>

                </div>

                <div class="inout_label_input">

                    <input type="radio" name="size" id="large" value="out" required <?php if(strtotime($firstRow[ 'lastEntry'])> strtotime($firstRow['lastExit'])){ echo "checked"; }else{ echo "disabled"; } ?> >

                    <label for="large " class="radioLabel ">OUT</label>
                </div>
                <!-- <div class="force_in_out">
                        <a id="force_link">Force in</a>
                        <input type="password" id="force_link_pass" placeholder="Administrator Password ">
                    </div> -->
                <div class="device_check ">
                    <div class="label_input devices">
                        <label for="withDevice">Device</label>
                        <select name="withDevice" id="withDevice " value="serialNum">
                                <option value="">None</option>
                                <?php
                                    while(($dev = mysqli_fetch_assoc($result2))!= false){
                                        echo "<option value={$dev['serialNumber']}> {$dev['serialNumber']} </option>";
                                    }
                                
                                ?>    
                        </select>
                    </div>
                    <!-- <input type="submit" name="force_submit" type="force_in_out_pass_submit" class="hidden"> -->
                    <input type="submit" value="Proceed " id="proceed" name="proceed" for='entrance_form'>
                    <div class="error_box" id="entrance_error_box">

                    </div>
            </form>



            </div>


        </div>
        <?php
}
?>
            <div id="submitstatus">

            </div>
            </main>


</body>

</html>
<?php 
    }else{
        header("Location: admin-search.php");
    }
    }
    else{
        header("Location: ../../index.php ");
    }
?>