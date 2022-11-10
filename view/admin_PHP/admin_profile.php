<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="apple-touch-icon" sizes="76x76" href="../assets_Admin/img/apple-icon.png">
        <link rel="icon" type="image/png" href="../assets_Admin/img/favicon.png">
        <title>
            Material Dashboard 2 by Creative Tim
        </title>
        <!--     Fonts and icons     -->
        <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900|Roboto+Slab:400,700">
        <!-- Nucleo Icons -->
        <link href="../assets_Admin/css/nucleo-icons.css" rel="stylesheet">
        <link href="../assets_Admin/css/nucleo-svg.css" rel="stylesheet">
        <!-- Font Awesome Icons -->
        <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
        <!-- Material Icons -->
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">
        <!-- CSS Files -->
        <link id="pagestyle" href="../assets_Admin/css/material-dashboard.css?v=3.0.0" rel="stylesheet">
        <!-- CSS Files -->
        <link href="../assets_Admin/css/style.css" rel="stylesheet">
        <link
            rel="stylesheet"
            href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css"
            integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A=="
            crossorigin="anonymous"
            referrerpolicy="no-referrer"
        >
    </head>
    <body class="g-sidenav-show bg-gray-200">
    <?php
            require "../../model/users_DB.inc.php";
            require "../../controller/users_DBC.inc.php";
            session_start();
            $user = $_SESSION['user'];
            if(isset($_POST['Save'])){
                $updatedUser=new Users($user->getId(),$_POST['firstName'],$_POST['lastName'],$_POST['email'],$_POST['dob'],$user->getPassword(),$_POST['phNumber'],$_POST['address'],$user->getPhoto());
                $sqlC=new Users_DBC;
                $sqlC->updateUser($updatedUser);
                $user=$updatedUser;
                $_SESSION['user']=$updatedUser;
            }
            if(isset($_POST['Cancel'])){
                $user = $_SESSION['user'];
            }
            if(isset($_POST['updatePassword'])&&$user->getPassword()==$_POST["password"]&&$_POST["newPassword"]==$_POST["renewPassword"]){
                $updatedUser=new Users($user->getId(),$user->getFirstName(),$user->getLastName(),$user->getEmail(),$user->getDob(),$_POST["newPassword"],$user->getPhNumber(),$user->getAddress(),$user->getPhoto());
                $sqlC=new Users_DBC;
                $sqlC->updateUser($updatedUser);
                $user=$updatedUser;
                $_SESSION['user']=$updatedUser;
            }
            if(isset($_POST['delteAccount'])){
                $sqlC=new Users_DBC;
                $sqlC->deletUser($user->getId());
                header( 'Location: ../html/site/account.html' );
            }
        ?>
        <aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3   bg-gradient-dark" id="sidenav-main">
            <div class="sidenav-header">
                <i class="fas fa-times p-3 cursor-pointer text-white opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
                <a class="navbar-brand m-0" href="#">
                    <img src="../assets_Admin/img/logo-ct.png" class="navbar-brand-img h-100" alt="main_logo">
                    <span class="ms-1 font-weight-bold text-white">Material Dashboard 2</span>
                </a>
            </div>
            <hr class="horizontal light mt-0 mb-2">
            <div class="collapse navbar-collapse  w-auto  max-height-vh-100" id="sidenav-collapse-main">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link text-white  " href="dashboard.html">
                            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                                <i class="material-icons opacity-10">dashboard</i>
                            </div>
                            <span class="nav-link-text ms-1">Dashboard</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white " href="tables.html">
                            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                                <i class="material-icons opacity-10">table_view</i>
                            </div>
                            <span class="nav-link-text ms-1">Tables</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white " href="billing.html">
                            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                                <i class="material-icons opacity-10">receipt_long</i>
                            </div>
                            <span class="nav-link-text ms-1">Billing</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white " href="notifications.html">
                            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                                <i class="material-icons opacity-10">notifications</i>
                            </div>
                            <span class="nav-link-text ms-1">Notifications</span>
                        </a>
                    </li>
                    <li class="nav-item mt-3">
                        <h6 class="ps-4 ms-2 text-uppercase text-xs text-white font-weight-bolder opacity-8">Account pages</h6>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white active bg-gradient-primary" href="profile.html">
                            <div class="text-white text-center  me-2 d-flex align-items-center justify-content-center">
                                <i class="material-icons opacity-10">person</i>
                            </div>
                            <span class="nav-link-text ms-1">Profile</span>
                        </a>
                    </li>
                </ul>
            </div>
        </aside>
        <div class="main-content position-relative bg-gray-100 max-height-vh-100 h-100">
            <!-- Navbar -->
            <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur" navbar-scroll="true">
                <div class="container-fluid py-1 px-3">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
                            <li class="breadcrumb-item text-sm">
                                <a class="opacity-5 text-dark" href="javascript:;">Pages</a>
                            </li>
                            <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Profile</li>
                        </ol>
                        <h6 class="font-weight-bolder mb-0">Profile</h6>
                    </nav>
                    <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
                        <div class="ms-md-auto pe-md-3 d-flex align-items-center">
                            <div class="input-group input-group-outline">
                                <label class="form-label">Type here...</label>
                                <input type="text" class="form-control">
                            </div>
                        </div>
                        <ul class="navbar-nav  justify-content-end">
                            <li class="nav-item d-flex align-items-center">
                                <a href="javascript:;" class="nav-link text-body font-weight-bold px-0">
                                    <i class="fa fa-user me-sm-1"></i>
                                    <span class="d-sm-inline d-none">Sign In</span>
                                </a>
                            </li>
                            <li class="nav-item d-xl-none ps-3 d-flex align-items-center">
                                <a href="javascript:;" class="nav-link text-body p-0" id="iconNavbarSidenav">
                                    <div class="sidenav-toggler-inner">
                                        <i class="sidenav-toggler-line"></i>
                                        <i class="sidenav-toggler-line"></i>
                                        <i class="sidenav-toggler-line"></i>
                                    </div>
                                </a>
                            </li>
                            <li class="nav-item px-3 d-flex align-items-center">
                                <a href="javascript:;" class="nav-link text-body p-0">
                                    <i class="fa fa-cog fixed-plugin-button-nav cursor-pointer"></i>
                                </a>
                            </li>
                            <li class="nav-item dropdown pe-2 d-flex align-items-center">
                                <a
                                    href="javascript:;"
                                    class="nav-link text-body p-0"
                                    id="dropdownMenuButton"
                                    data-bs-toggle="dropdown"
                                    aria-expanded="false"
                                >
                                    <i class="fa fa-bell cursor-pointer"></i>
                                </a>
                                <ul class="dropdown-menu  dropdown-menu-end  px-2 py-3 me-sm-n4" aria-labelledby="dropdownMenuButton">
                                    <li class="mb-2">
                                        <a class="dropdown-item border-radius-md" href="javascript:;">
                                            <div class="d-flex py-1">
                                                <div class="my-auto">
                                                    <img src="../assets_Admin/img/illustrations/danger-chat-ill.png" class="avatar avatar-sm  me-3 ">
                                                </div>
                                                <div class="d-flex flex-column justify-content-center">
                                                    <h6 class="text-sm font-weight-normal mb-1">
                                                        <span class="font-weight-bold">New message</span>
                                                        from Laur
                                                    </h6>
                                                    <p class="text-xs text-secondary mb-0">
                                                        <i class="fa fa-clock me-1"></i>
                                                        13 minutes ago
                                                    </p>
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                    <li class="mb-2">
                                        <a class="dropdown-item border-radius-md" href="javascript:;">
                                            <div class="d-flex py-1">
                                                <div class="my-auto">
                                                    <img src="../assets_Admin/img/small-logos/logo-spotify.svg" class="avatar avatar-sm bg-gradient-dark  me-3 ">
                                                </div>
                                                <div class="d-flex flex-column justify-content-center">
                                                    <h6 class="text-sm font-weight-normal mb-1">
                                                        <span class="font-weight-bold">New album</span>
                                                        by Travis Scott
                                                    </h6>
                                                    <p class="text-xs text-secondary mb-0">
                                                        <i class="fa fa-clock me-1"></i>
                                                        1 day
                                                    </p>
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item border-radius-md" href="javascript:;">
                                            <div class="d-flex py-1">
                                                <div class="avatar avatar-sm bg-gradient-secondary  me-3  my-auto">
                                                    <svg
                                                        width="12px"
                                                        height="12px"
                                                        viewbox="0 0 43 36"
                                                        version="1.1"
                                                        xmlns="http://www.w3.org/2000/svg"
                                                        xmlns:xlink="http://www.w3.org/1999/xlink"
                                                    >
                                                        <title>credit-card</title>
                                                        <g
                                                            stroke="none"
                                                            stroke-width="1"
                                                            fill="none"
                                                            fill-rule="evenodd"
                                                        >
                                                            <g transform="translate(-2169.000000, -745.000000)" fill="#FFFFFF" fill-rule="nonzero">
                                                                <g transform="translate(1716.000000, 291.000000)">
                                                                    <g transform="translate(453.000000, 454.000000)">
                                                                        <path class="color-background" d="M43,10.7482083 L43,3.58333333 C43,1.60354167 41.3964583,0 39.4166667,0 L3.58333333,0 C1.60354167,0 0,1.60354167 0,3.58333333 L0,10.7482083 L43,10.7482083 Z" opacity="0.593633743"></path>
                                                                        <path class="color-background" d="M0,16.125 L0,32.25 C0,34.2297917 1.60354167,35.8333333 3.58333333,35.8333333 L39.4166667,35.8333333 C41.3964583,35.8333333 43,34.2297917 43,32.25 L43,16.125 L0,16.125 Z M19.7083333,26.875 L7.16666667,26.875 L7.16666667,23.2916667 L19.7083333,23.2916667 L19.7083333,26.875 Z M35.8333333,26.875 L28.6666667,26.875 L28.6666667,23.2916667 L35.8333333,23.2916667 L35.8333333,26.875 Z"></path>
                                                                    </g>
                                                                </g>
                                                            </g>
                                                        </g>
                                                    </svg>
                                                </div>
                                                <div class="d-flex flex-column justify-content-center">
                                                    <h6 class="text-sm font-weight-normal mb-1">
                                                        Payment successfully completed
                                                    </h6>
                                                    <p class="text-xs text-secondary mb-0">
                                                        <i class="fa fa-clock me-1"></i>
                                                        2 days
                                                    </p>
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
            <!-- End Navbar -->
        </div>
        <main id="main" class="main">
            <section class="section profile">
                <div class="row">
                    <div class="col-xl-4">
                        <div class="card">
                            <div class="card-body profile-card pt-0 d-flex flex-column align-items-center">
                            <img src="../img/" alt="Profile" class="rounded-circle">
                                <h2><?php echo strtoupper($user->getFirstName());echo ' ';echo strtoupper($user->getLastName());?> </h2>
                                <h3>ADMIN</h3>
                                <div class="social-links mt-2">
                                    <a href="#" class="twitter">
                                        <i class="fa-brands fa-twitter"></i>
                                    </a>
                                    <a href="#" class="facebook">
                                        <i class="fa-brands fa-facebook-f"></i>
                                    </a>
                                    <a href="#" class="instagram">
                                        <i class="fa-brands fa-instagram"></i>
                                    </a>
                                    <a href="#" class="linkedin">
                                        <i class="fa-brands fa-linkedin-in"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-8">
                        <div class="card">
                            <div class="card-body pt-3">
                                <!-- Bordered Tabs -->
                                <ul class="nav nav-tabs nav-tabs-bordered">
                                    <li class="nav-item">
                                        <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#profile-overview">Overview</button>
                                    </li>
                                    <li class="nav-item">
                                        <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-edit">Edit Profile</button>
                                    </li>
                                    <li class="nav-item">
                                        <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-settings">Settings</button>
                                    </li>
                                    <li class="nav-item">
                                        <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-change-password">Change Password</button>
                                    </li>
                                </ul>
                                <div class="tab-content pt-2">

                                    <div class="tab-pane fade show active profile-overview" id="profile-overview">
                                        <h5 class="card-title">About</h5>
                                        <p class="small fst-italic">Sunt est soluta temporibus accusantium neque nam maiores cumque temporibus. Tempora libero non est unde veniam est qui dolor. Ut sunt iure rerum quae quisquam autem eveniet perspiciatis odit. Fuga sequi sed ea saepe at unde.</p>
                                        <h5 class="card-title">Profile Details</h5>
                                        <div class="row">
                                            <div class="col-lg-3 col-md-4 label ">First Name</div>
                                            <div class="col-lg-9 col-md-8"><?php echo $user->getFirstName()?> </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-3 col-md-4 label">Last Name</div>
                                            <div class="col-lg-9 col-md-8"><?php echo $user->getLastName();?> </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-3 col-md-4 label">Date of Birth</div>
                                            <div class="col-lg-9 col-md-8"><?php echo $user->getDob();?></div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-3 col-md-4 label">Address</div>
                                            <div class="col-lg-9 col-md-8"><?php echo $user->getAddress();?></div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-3 col-md-4 label">Phone</div>
                                            <div class="col-lg-9 col-md-8"><?php echo $user->getPhNumber();?></div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-3 col-md-4 label">Email</div>
                                            <div class="col-lg-9 col-md-8"><?php echo $user->getEmail();?></div>
                                        </div>
                                        <form action="admin_profile.php" method="POST">
                                            <div class="text-center">
                                                    <button type="submit" class="btn btn-primary" name="delteAccount">Delete Account</button>
                                            </div>
                                        </form>
                                    </div>

                                    <div class="tab-pane fade profile-edit pt-3" id="profile-edit">
                                        <!-- Profile Edit Form -->
                                        <form action="../../controller/verify.inc.php" method="POST" enctype='multipart/form-data'>
                                            <div class="row mb-3">
                                                <label for="profileImage" class="col-md-4 col-lg-3 col-form-label">Profile Image</label>
                                                <div class="col-md-8 col-lg-4">

                                                    <img src="data:image/jpg;base64,<?php echo base64_encode( $user->getPhoto()); ?>" />
                                                    <div class="pt-2">
                                                    <input  type="file" accepts='.png,.jpg,.gif' name='upload'>
                                                    <input type='submit' name='Upload' class='btn btn-primary btn-sm'>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Fisrt Name</label>
                                                <div class="col-md-8 col-lg-8">
                                                    <input
                                                        name="firstName"
                                                        type="text"
                                                        class="form-control-color"
                                                        id="fullName"
                                                        value="<?php echo $user->getFirstName();?> "
                                                    >
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <label for="lastName" class="col-md-4 col-lg-3 col-form-label">Last Name</label>
                                                <div class="col-md-8 col-lg-8">
                                                    <input
                                                        name="lastName"
                                                        type="text"
                                                        class="form-control-color"
                                                        id="fullName"
                                                        value="<?php echo $user->getLastName();?> "
                                                    >
                                                </div>
                                            </div>

                                            <div class="row mb-3">
                                                <label for="company" class="col-md-4 col-lg-3 col-form-label">Date fo Birth</label>
                                                <div class="col-md-8 col-lg-8">
                                                    <input
                                                        name="dob"
                                                        type="date"
                                                        class="form-control-color"
                                                        id="company"
                                                        value="<?php echo $user->getDob()?>"
                                                    >
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <label for="Address" class="col-md-4 col-lg-3 col-form-label">Address</label>
                                                <div class="col-md-8 col-lg-8">
                                                    <input
                                                        name="address"
                                                        type="text"
                                                        class="form-control-color"
                                                        id="Address"
                                                        value="<?php echo $user->getAddress()?>"
                                                    >
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <label for="Phone" class="col-md-4 col-lg-3 col-form-label">Phone</label>
                                                <div class="col-md-8 col-lg-8">
                                                    <input
                                                        name="phNumber"
                                                        type="text"
                                                        class="form-control-color"
                                                        id="Phone"
                                                        value="<?php echo $user->getPhNumber()?>"
                                                    >
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <label for="Email" class="col-md-4 col-lg-3 col-form-label">Email</label>
                                                <div class="col-md-8 col-lg-8">
                                                    <input
                                                        name="email"
                                                        type="email"
                                                        class="form-control-color"
                                                        id="Email"
                                                        value="<?php echo $user->getEmail()?>"
                                                    >
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <label for="Twitter" class="col-md-4 col-lg-3 col-form-label">Twitter Profile</label>
                                                <div class="col-md-8 col-lg-8">
                                                    <input
                                                        name="twitter"
                                                        type="text"
                                                        class="form-control-color"
                                                        id="Twitter"
                                                        value="https://twitter.com/#"
                                                    >
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <label for="Facebook" class="col-md-4 col-lg-3 col-form-label">Facebook Profile</label>
                                                <div class="col-md-8 col-lg-8">
                                                    <input
                                                        name="facebook"
                                                        type="text"
                                                        class="form-control-color"
                                                        id="Facebook"
                                                        value="https://facebook.com/#"
                                                    >
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <label for="Instagram" class="col-md-4 col-lg-3 col-form-label">Instagram Profile</label>
                                                <div class="col-md-8 col-lg-8">
                                                    <input
                                                        name="instagram"
                                                        type="text"
                                                        class="form-control-color"
                                                        id="Instagram"
                                                        value="https://instagram.com/#"
                                                    >
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <label for="Linkedin" class="col-md-4 col-lg-3 col-form-label">Linkedin Profile</label>
                                                <div class="col-md-8 col-lg-8">
                                                    <input
                                                        name="linkedin"
                                                        type="text"
                                                        class="form-control-color"
                                                        id="Linkedin"
                                                        value="https://linkedin.com/#"
                                                    >
                                                </div>
                                            </div>
                                            <div class="text-center">
                                                <button type="submit" class="btn btn-primary" name="Save">Save Changes</button>
                                                <button type="submit" class="btn btn-primary" name="Cansel">Cansel</button>
                                            </div>
                                        </form>
                                        <!-- End Profile Edit Form -->
                                    </div>
                                    <div class="tab-pane fade pt-3" id="profile-settings">
                                        <!-- Settings Form -->
                                        <form action="admin_profile.php" method="POST">
                                            <div class="row mb-3">
                                                <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Email Notifications</label>
                                                <div class="col-md-8 col-lg-9">
                                                    <div class="form-check">
                                                        <input
                                                            class="form-check-input"
                                                            type="checkbox"
                                                            id="changesMade"
                                                            checked
                                                        >
                                                        <label class="form-check-label" for="changesMade">
                                                            Changes made to your account
                                                        </label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input
                                                            class="form-check-input"
                                                            type="checkbox"
                                                            id="newProducts"
                                                            checked

                                                        >
                                                        <label class="form-check-label" for="newProducts">
                                                            Information on new products and services
                                                        </label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" id="proOffers">
                                                        <label class="form-check-label" for="proOffers">
                                                            Marketing and promo offers
                                                        </label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input
                                                            class="form-check-input"
                                                            type="checkbox"
                                                            id="securityNotify"
                                                            checked
                                                            disabled
                                                        >
                                                        <label class="form-check-label" for="securityNotify">
                                                            Security alerts
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="text-center">
                                                <button type="submit" class="btn btn-primary" >Save Changes</button>
                                            </div>
                                        </form>
                                        <!-- End settings Form -->
                                    </div>
                                    <div class="tab-pane fade pt-3" id="profile-change-password">
                                        <!-- Change Password Form -->
                                        <form action="admin_profile.php" method="POST">
                                            <div class="row mb-3">
                                                <label for="currentPass" class="col-md-4 col-lg-3 col-form-label">Current Password</label>
                                                <div class="col-md-8 col-lg-8">
                                                    <input
                                                        name="password"
                                                        type="password"
                                                        class="form-control-color"
                                                        id="currentPass"
                                                    >
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <label for="newPass" class="col-md-4 col-lg-3 col-form-label">New Password</label>
                                                <div class="col-md-8 col-lg-8">
                                                    <input
                                                        name="newPassword"
                                                        type="password"
                                                        class="form-control-color"
                                                        id="newPass"
                                                    >
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <label for="renewPass" class="col-md-4 col-lg-3 col-form-label">Re-enter New Password</label>
                                                <div class="col-md-8 col-lg-8">
                                                    <input
                                                        name="renewPassword"
                                                        type="password"
                                                        class="form-control-color"
                                                        id="renewPass"
                                                    >
                                                </div>
                                            </div>
                                            <div class="text-center">
                                                <button type="submit" class="btn btn-primary" name="updatePassword">Change Password</button>
                                            </div>
                                        </form>
                                        <!-- End Change Password Form -->
                                    </div>
                                </div>
                                <!-- End Bordered Tabs -->
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </main>
        <div class="fixed-plugin">
            <a class="fixed-plugin-button text-dark position-fixed px-3 py-2">
                <i class="material-icons py-2">settings</i>
            </a>
            <div class="card shadow-lg">
                <div class="card-header pb-0 pt-3">
                    <div class="float-start">
                        <h5 class="mt-3 mb-0">Material UI Configurator</h5>
                        <p>See our dashboard options.</p>
                    </div>
                    <div class="float-end mt-4">
                        <button class="btn btn-link text-dark p-0 fixed-plugin-close-button">
                            <i class="material-icons">clear</i>
                        </button>
                    </div>
                    <!-- End Toggle Button -->
                </div>
                <hr class="horizontal dark my-1">
                <div class="card-body pt-sm-3 pt-0">
                    <!-- Sidebar Backgrounds -->
                    <div>
                        <h6 class="mb-0">Sidebar Colors</h6>
                    </div>
                    <a href="javascript:void(0)" class="switch-trigger background-color">
                        <div class="badge-colors my-2 text-start">
                            <span class="badge filter bg-gradient-primary active" data-color="primary" onclick="sidebarColor(this)"></span>
                            <span class="badge filter bg-gradient-dark" data-color="dark" onclick="sidebarColor(this)"></span>
                            <span class="badge filter bg-gradient-info" data-color="info" onclick="sidebarColor(this)"></span>
                            <span class="badge filter bg-gradient-success" data-color="success" onclick="sidebarColor(this)"></span>
                            <span class="badge filter bg-gradient-warning" data-color="warning" onclick="sidebarColor(this)"></span>
                            <span class="badge filter bg-gradient-danger" data-color="danger" onclick="sidebarColor(this)"></span>
                        </div>
                    </a>
                    <!-- Sidenav Type -->
                    <div class="mt-3">
                        <h6 class="mb-0">Sidenav Type</h6>
                        <p class="text-sm">Choose between 2 different sidenav types.</p>
                    </div>
                    <div class="d-flex">
                        <button class="btn bg-gradient-dark px-3 mb-2 active" data-class="bg-gradient-dark" onclick="sidebarType(this)">Dark</button>
                        <button class="btn bg-gradient-dark px-3 mb-2 ms-2" data-class="bg-transparent" onclick="sidebarType(this)">Transparent</button>
                        <button class="btn bg-gradient-dark px-3 mb-2 ms-2" data-class="bg-white" onclick="sidebarType(this)">White</button>
                    </div>
                    <p class="text-sm d-xl-none d-block mt-2">You can change the sidenav type just on desktop view.</p>
                    <!-- Navbar Fixed -->
                    <hr class="horizontal dark my-3">
                    <div class="mt-2 d-flex">
                        <h6 class="mb-0">Light / Dark</h6>
                        <div class="form-check form-switch ps-0 ms-auto my-auto">
                            <input
                                class="form-check-input mt-1 ms-auto"
                                type="checkbox"
                                id="dark-version"
                                onclick="darkMode(this)"
                            >
                        </div>
                    </div>
                    <hr class="horizontal dark my-sm-4">
                    <a class="btn btn-outline-dark w-100" href="">View documentation</a>
                    <div class="w-100 text-center">
                        <a
                            class="github-button"
                            href="https://github.com/creativetimofficial/material-dashboard"
                            data-icon="octicon-star"
                            data-size="large"
                            data-show-count="true"
                            aria-label="Star creativetimofficial/material-dashboard on GitHub"
                        >Star</a>
                        <h6 class="mt-3">Thank you for sharing!</h6>
                        <a href="https://twitter.com/intent/tweet?text=Check%20Material%20UI%20Dashboard%20made%20by%20%40CreativeTim%20%23webdesign%20%23dashboard%20%23bootstrap5&amp;url=https%3A%2F%2Fwww.creative-tim.com%2Fproduct%2Fsoft-ui-dashboard" class="btn btn-dark mb-0 me-2" target="_blank">
                            <i class="fab fa-twitter me-1" aria-hidden="true"></i>
                            Tweet
                        </a>
                        <a href="https://www.facebook.com/sharer/sharer.php?u=https://www.creative-tim.com/product/material-dashboard" class="btn btn-dark mb-0 me-2" target="_blank">
                            <i class="fab fa-facebook-square me-1" aria-hidden="true"></i>
                            Share
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <!--   Core JS Files   -->
        <script src="../assets_Admin/js/core/popper.min.js"></script>
        <script src="../assets_Admin/js/core/bootstrap.min.js"></script>
        <script src="../assets_Admin/js/plugins/perfect-scrollbar.min.js"></script>
        <script src="../assets_Admin/js/plugins/smooth-scrollbar.min.js"></script>
        <script src="../node_modules/bootstrap/dist/js/bootstrap.bundle.js"></script>
        <script>
    var win = navigator.platform.indexOf('Win') > -1;
    if (win && document.querySelector('#sidenav-scrollbar')) {
      var options = {
        damping: '0.5'
      }
      Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
    }
        </script>
        <!-- Github buttons -->
        <script async defer src="https://buttons.github.io/buttons.js"></script>
        <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
        <script src="../assets_Admin/js/material-dashboard.min.js?v=3.0.0"></script>
    </body>
</html>
