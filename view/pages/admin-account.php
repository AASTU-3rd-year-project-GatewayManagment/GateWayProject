<?php 
session_start();
echo $_SESSION['username'];
    // if(($_SESSION['username'])){
    //     echo "am in am logged ins";
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
    <script defer src="../js/admin-script.js"></script>
    <script defer src="../js/script.js"></script>
    <title>Accounts</title>
</head>

<body>

    <div class="sidebar">
        <div class="nav-logo">
            <img src="../images/aastu.png" alt="aastu logo">
            <span id="system-name">AASTU GMS</span>
        </div>
        <div class="user-profile">
            <img src="../images/profile.png" alt="aastu logo" width="50px" height="50px">
            <span>John Doe</span>
        </div>

        <ul class="sidebar-nav">
            <li class="side-links"><img src="../images/search-white.png" alt="search icon">
                <a href="admin-search.php" class="sidenav-link">Search</a>
            </li>

            <li class="side-links"><img src="../images/student-white.png" alt="search icon">
                <a href="admin-student.php" class="sidenav-link">Student</a>
            </li>

            <li class="side-links"><img src="../images/teacher-white.png" alt="search icon">
                <a href="admin-staff.php" class="sidenav-link">Staff</a>
            </li>
            <li class="side-links"><img src="../images/securityWhite.png" alt="search icon">
                <a href="admin-security.php" class="sidenav-link">Security</a>
            </li>
            <li class="side-links"><img src="../images/company.png" alt="search icon">
                <a href="admin-other-employee.php" class="sidenav-link">Other Employee</a>
            </li>

            <li><img src="../images/account.png" alt="search icon" width="50px" height="50px">
                <a href="admin-account.php" class="sidenav-link">Manage Account</a>
            </li>

            <li class="side-links"><img src="../images/report-white.png" alt="search icon">
                <a href="admin-daily-report.php" class="sidenav-link">Daily Report</a>
            </li>

            <li><img src="../images/logout-white.png" alt="search icon" width="50px" height="50px">
                <form action="../../controller/logout.php" method="post" class="sidenav-link">
                    <input type="submit" name="submit" value="Log out">

                </form>
            </li>

        </ul>
    </div>
    <main class="header_body">

        <div class="header">
            <img src="../images/profile.png" alt="avatar">
            <span>Admin</span>
        </div>

        <div class="content-body ">
            <div class="burger-menu-container">

                <img src="../images/burger-menu-white.png" alt="burger menu" id="burgerMenu">
            </div>

            <div class="accounts_section">
                <div class="accounts_list_header">
                    <div class="accounts-info">
                        <h3>Accounts List</h3>
                        <p>View and manage your site accounts here.</p>
                    </div>
                    <div class="account-actions">
                        <button class="add-account" id='create-account-btn'>Create Account</button>
                    </div>
                    <div class="create-account-container ">
                        <form method="post" action="../../controller/admin.php" class="create-account ">

                            <h2>Create Account
                                <img src="../images/cancel.png " id='close-btn' "></img>
                            </h2>

                           

                            <div class="label-input ">

                                <label for="id ">Id</label>
                                <input type="text " name='id'>

                            </div>

                            <div class="label-input ">

                                <label for="username ">User name</label>
                                <input type="text " name='username'>

                            </div>
                            <div class="label-input ">

                                <label for="password ">Password</label>
                                <input type="password " name='password'>

                            </div>

                            <input type='submit' value="Create " name='submit' class="btn createbtn ">
                        </form>
                    </div>
                </div>
                <div class="accounts-list ">
                    <div class="searchbar ">
                        <input type="search " placeholder="search ">
                    </div>
                    <ul class="list-header ">
                        <li></li>
                        <li>Name</li>
                        <li>ID</li>
                        <li>Gate</li>
                        <li>Last Login</li>
                        <li></li>
                    </ul>

                    <ul class="list-content ">
                        <li><img src="../images/profile.png " alt="profile "></li>
                        <li class="user-name ">Martha Mekow</li>
                        <li class="user-id ">ETS 0923/33</li>
                        <li class="user-gate ">Tulu Dimtu</li>
                        <li class="user-last-login ">Sep 5,2010</li>
                        <li class="actions ">
							<img src="../images/sidemore.png " alt="menu " id="three-dots-menu1 " onmouseover="openmenu(this.id) " >
							<div class="menu-choice " id="menu-choice1 "  onmouseleave="closemenu(this.id) ">
                                <div class="choice1 ">View profile</div>
                                <div class="choice2 ">Edit profile</div>
                       		</div>

                        </li>
                    </ul>

                    <ul class="list-content ">
                        <li><img src="../images/profile.png " alt="profile "></li>
                        <li class="user-name ">Martha Mekow</li>
                        <li class="user-id ">ETS 0923/33</li>
                        <li class="user-gate ">Tulu Dimtu</li>
                        <li class="user-last-login ">Sep 5,2010</li>
                        <li class="actions ">
							<img src="../images/sidemore.png " alt="menu " id="three-dots-menu2 " onmouseover="openmenu(this.id) " >
							<div class="menu-choice " id="menu-choice2 "  onmouseleave="closemenu(this.id) ">
                                <div class="choice1 ">View profile</div>
                                <div class="choice2 ">Edit profile</div>
                       		</div>

                        </li>
                    </ul>

                </div>

            </div>

    </main>



</body>

</html>
<?php 
    // }
    // else{
    //     header("Location: ../../index.html ");
    // }
?>