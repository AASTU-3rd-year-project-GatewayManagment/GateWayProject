<?php
include '../../model/database.php';

$firstrow;
if($_SESSION['ID']){
    $query = "SELECT * FROM user where ID = '{$_SESSION['ID']}'";
    $result = mysqli_query($connection,$query);
    while(($firstrow = mysqli_fetch_assoc($result)) != false){
        break;
    }
    
}
$active;

if($_SESSION['page']){
$active = $_SESSION['page'];
}

?>
<div class="sidebar">


        <div class="nav-logo">
            <img src="../images/aastu.png" alt="aastu logo">
            <span id="system-name">AASTU GMS</span>
        </div>
        <div class="user-profile">
            <img src="../images/upload/<?php echo $firstrow['imgUrl']?>" alt="aastu logo" width="50px" height="50px">
            <span><?php echo   ucfirst($firstrow['firstName'])." ".$firstrow['lastName']   ?></span>
           
        </div>

        <ul class="sidebar-nav">
            <li class="side-links <?php if($active == "search"){echo "active";} ?>"> 
            
            <a  href="admin-search.php"> <img src="../images/search-white.png" alt="search icon">
            </a>
            <a href="admin-search.php" class="sidenav-link">Search</a>
            </li>
     <?php if($_SESSION['admin']){?>
            <li class="side-links <?php if($active == "student"){echo "active";} ?>">
            <a href="admin-student.php"> <img src="../images/student-white.png" alt="search icon">
            </a>    
            <a href="admin-student.php" class="sidenav-link">Student</a>
            </li>

            <li class="side-links <?php if($active == "staff"){echo "active";} ?>">
            <a href="admin-staff.php"> <img src="../images/teacher-white.png" alt="search icon">
            </a>
                <a href="admin-staff.php" class="sidenav-link">Staff</a>
            </li>
            <li class="side-links <?php if($active == "security"){echo "active";} ?>">
            <a href="admin-security.php"> <img src="../images/securityWhite.png" alt="search icon">
            </a>    
            <a href="admin-security.php" class="sidenav-link">Security</a>
            </li>
            <li class="side-links <?php if($active == "employee"){echo "active";} ?>">
            <a href="admin-other-employee.php"> <img src="../images/company.png" alt="search icon">
            </a>    
            <a href="admin-other-employee.php" class="sidenav-link">Other Employee</a>
            </li>

            <li class="side-links <?php if($active == "account"){echo "active";} ?>">
            <a href="admin-account-manage-account.php"> <img src="../images/account.png" alt="search icon" width="50px" height="50px">
            </a>    
            <a href="admin-account-manage-account.php" class="sidenav-link" 
                
                >Manage Account</a>
            </li>
<?php
}
?>
            <li class="side-links <?php if($active == "report"){echo "active";}?>">
                <a href="admin-daily-report.php"> <img src="../images/report-white.png" alt="search icon">
                </a>
                <a href="admin-daily-report.php" class="sidenav-link">Daily Report</a>
            </li>

            <li>
                <a id="logout-btn"> <img src="../images/logout-white.png" alt="search icon" width="50px" height="50px">
                </a>
                <form action="../../controller/logout.php" method="post" class="sidenav-link">
                    <input type="submit" name="submit" id="logout" value="Log out">

                </form>
            </li>

        </ul>
    </div>
        <main class="header_body">
            <div class="header">
                <img src="../images/upload/<?php echo $firstrow['imgUrl']?>" alt="avatar">
                <div class="status">
                    <span><?php echo ucfirst($firstrow['firstName'])." ".$firstrow['lastName']   ?></span>
                    <small><?php if($_SESSION['admin']){
                        echo 'Admin';
                        }           
                        ?>
                    </small>
                </div>
            </div>
