<?php
session_start();

if(isset($_SESSION['userdata'])){
    if ($_SESSION['userdata']['is_admin'] == '0') {
        header('location: ../user/userdashboard.php');
    }
    
} else{
    header('location: ../index.php');
}


?>








<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body {
            overflow-x: hidden;
        }



        #wrapper {
            padding-left: 0;
            -webkit-transition: all 0.5s ease;
            -moz-transition: all 0.5s ease;
            -o-transition: all 0.5s ease;
            transition: all 0.5s ease;
        }

        #wrapper.toggled {
            padding-left: 250px;
        }

        #sidebar-wrapper {
            z-index: 1000;
            position: fixed;
            left: 250px;
            width: 0;
            height: 100%;
            margin-left: -250px;
            overflow-y: auto;
            background: #000;
            -webkit-transition: all 0.5s ease;
            -moz-transition: all 0.5s ease;
            -o-transition: all 0.5s ease;
            transition: all 0.5s ease;
        }

        #wrapper.toggled #sidebar-wrapper {
            width: 250px;
        }

        #page-content-wrapper {
            width: 100%;
            position: absolute;
            padding: 15px;
        }

        #wrapper.toggled #page-content-wrapper {
            position: absolute;
            margin-right: -250px;
        }

        /* Sidebar Styles */

        .sidebar-nav {
            position: absolute;
            top: 0;
            width: 250px;
            margin: 0;
            padding: 0;
            list-style: none;
        }

        .sidebar-nav li {
            text-indent: 20px;
            line-height: 40px;
        }

        .sidebar-nav li a {
            display: block;
            text-decoration: none;
            color: #999999;
        }

        .sidebar-nav li a:hover {
            text-decoration: none;
            color: #fff;
            background: rgba(255, 255, 255, 0.2);
        }

        .sidebar-nav li a:active,
        .sidebar-nav li a:focus {
            text-decoration: none;
        }

        .sidebar-nav>.sidebar-brand {
            height: 65px;
            font-size: 18px;
            line-height: 60px;
        }

        .sidebar-nav>.sidebar-brand a {
            color: #999999;
        }

        .sidebar-nav>.sidebar-brand a:hover {
            color: #fff;
            background: none;
        }

        @media(min-width:768px) {
            #wrapper {
                padding-left: 250px;
            }

            #wrapper.toggled {
                padding-left: 0;
            }

            #sidebar-wrapper {
                width: 250px;
            }

            #wrapper.toggled #sidebar-wrapper {
                width: 0;
            }

            #page-content-wrapper {
                padding: 20px;
                position: relative;
            }

            #wrapper.toggled #page-content-wrapper {
                position: relative;
                margin-right: 0;
            }
        }
    </style>
</head>

<body>
    <div id="wrapper">

        <!-- Sidebar -->
        <div id="sidebar-wrapper">
            <ul class="sidebar-nav">
                <li class="sidebar-brand">
                    <a href="#" style="font-size:25px;color:white;">
                        <b>Admin Panel</b>
                    </a>
                </li>
                <h5 id="p" style="color:white;">Rides</h5>
                <li>

                    <a href="pendingrides.php">Pending Rides</a>
                </li>
                <li>
                    <a href="completedrides.php">Completed Rides</a>
                </li>
                <li>
                    <a href="cancelledrides.php">Cancelled Rides</a>
                </li>
                <li>
                    <a href="allrides.php">All Rides</a>
                </li>
                <h5 id="p" style="color:white;">Location</h5>
                <li>
                    <a href="location.php">All Locations</a>
                </li>
                <li>
                    <a href="addlocation.php">Add new Location</a>
                </li>
                <h5 id="p" style="color:white;">User</h5>
                <li>
                    <a href="pendinguser.php">Pending User</a>
                </li>
                <li>
                    <a href="approveuser.php">Approved User</a>
                </li>
                <li>
                    <a href="alluser.php">All User</a>
                </li>
                
                <li>
                    <a href="logout.php">LOGOUT</a>
                </li>
            </ul>
        </div>

        <div id="page-conten<th>
                        <a href="completedrides.php?ride_d=ASC" style="color:white;">Asc</a>
                        <a href="completedrides.php?ride_d=DESC" style="color:white;">DESC</a>
                    </th>t-wrapper">
            <div class="container-fluid">
                <div class=row style="margin-top:60px;margin-left:20px;">
                    <div class="card text-white bg-primary mb-3 col-md-3" style="max-width: 18rem;">
                        <div class="card-header">
                            <a href="pendingrides.php" style="color:white;">Pending Rides</a></div>
                        <div class="card-body">
                            <h5 class="card-title">CedCab Taxi Booking Services </h5>
                            <p class="card-text">Book a City Taxi to your destination in town</p>

                        </div>
                    </div>

                    <div class="col-md-1">

                    </div>



                    <div class="card text-white bg-secondary mb-3 col-md-4" style="max-width: 18rem;">
                        <div class="card-header">
                            <a href="completedrides.php" style="color:white;">Completed Rides</a></div>
                        <div class="card-body">
                            <h5 class="card-title">CedCab Taxi Booking Services </h5>
                            <p class="card-text">Book a City Taxi to your destination in town</p>
                        </div>
                    </div>

                    <div class="col-md-1">

                    </div>



                    <div class="card text-white bg-success mb-3 col-md-3" style="max-width: 18rem;">
                        <div class="card-header">
                            <a href="cancelledrides.php" style="color:white;">Cancelled Rides</a></div>
                        <div class="card-body">
                            <h5 class="card-title">CedCab Taxi Booking Services </h5>
                            <p class="card-text">Book a City Taxi to your destination in town</p>
                        </div>
                    </div>
                </div>
                <div class="row" style="margin-top:30px;margin-left:20px;">


                    <div class="card text-white bg-danger mb-3 col-md-3" style="max-width: 18rem;">
                        <div class="card-header">
                            <a href="approveuser.php" style="color:white;">Approved Users</a></div>
                        <div class="card-body">
                            <h5 class="card-title">CedCab Taxi Booking Services </h5>
                            <p class="card-text">Book a City Taxi to your destination in town</p>
                        </div>
                    </div>

                    <div class=col-md-1>

                    </div>
                    <div class="card text-white bg-warning mb-3 col-md-4" style="max-width: 18rem;">
                        <div class="card-header">
                            <a href="pendinguser.php" style="color:white;">Pending Users</a></div>
                        <div class="card-body">
                            <h5 class="card-title">CedCab Taxi Booking Services </h5>
                            <p class="card-text">Book a City Taxi to your destination in town</p>
                        </div>
                    </div>


                    <div class=col-md-1>
                    </div>

                    <div class="card text-white bg-info mb-3 col-md-3" style="max-width: 18rem;">
                        <div class="card-header">
                            <a href="alluser.php" style="color:white;">All Users</a></div>
                        <div class="card-body">
                            <h5 class="card-title">CedCab Taxi Booking Services </h5>
                            <p class="card-text">Book a City Taxi to your destination in town</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /#page-content-wrapper -->

    </div>
    <!-- /#wrapper -->


</body>
<script>

    $("#menu-toggle").click(function (e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
    });

</script>

</html>