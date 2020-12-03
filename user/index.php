<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Cab Booking</title>
  <link rel="stylesheet" href="mystyle.css">

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<body>


  <div class="bgimg">
    <nav class="navbar navbar-expand-md bg-dark navbar-dark">
      <img src="logo2.png" height="55px" width="75px" style="margin-left:70px;">
      <a class="navbar-brand text-white font-weight-bold" href="#">TAXI SERVICE</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="collapsibleNavbar">
        <ul class="navbar-nav ml-auto text-white">
          <li class="nav-item">
            <a class="nav-link text-white" href="login.php">Login</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-white" href="#">About Us</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-white" href="#">Team</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-white" href="#">Contact Us</a>
          </li>
        </ul>
      </div>
    </nav>


    <div class="container text-center text-white headerset pb-5">
      <h1>Book a City Taxi to your destination in town</h1>
      <h3> Choose from a range of categories and prices</h3>


    </div>
    <div class="container">
      <div class="row">
        <div class=""></div>
        <div class="col-sm-12 col-md-5 col-lg-4 box bg-dark">
          <p class="para">Cedcoss taxi booking website</p>
          <div><img src="logo2.png" height="55px" width="75px" style="margin-left:140px"></div>
          <form action="config.php" method="get">
            <div class="form-group">
              <select class="form-control" id="ccity" name="ccity">
                <option disabled selected>Current Location</option>
                <option value="charbagh">Charbagh</option>
                <option value="indiraNagar">Indira Nagar</option>
                <option value="bbd">BBD</option>
                <option value="barabanki">Barabanki</option>
                <option value="faizabad">Faizabad</option>
                <option value="basti">Basti</option>
                <option value="gkp">Gorakhpur</option>
              </select>
            </div>

            <div class="form-group">
              <select class="form-control" id="dcity" name="dcity">
                <option disabled selected>Destination Location</option>
                <option value="charbagh">Charbagh</option>
                <option value="indiraNagar">Indira Nagar</option>
                <option value="bbd">BBD</option>
                <option value="barabanki">Barabanki</option>
                <option value="faizabad">Faizabad</option>
                <option value="basti">Basti</option>
                <option value="gkp">Gorakhpur</option>
              </select>
            </div>

            <div class="form-group">
              <select class="form-control" id="cabtype" oninput="myFunc()" name="cabtype">
                <option value="" disabled selected>Drop down to select the cab type</option>
                <option value="micro">CedMicro</option>
                <option value="mini">CedMini</option>
                <option value="royal">CedRoyal</option>
                <option value="suv">CedSUV</option>
              </select>
            </div>

            <div class="form-group">
              <input type="text" class="form-control" id="lweight" name="lweight" placeholder="Enter the weight in kg">
            </div>
            <input type="submit" class="btn btn-success btn-block" value="Calculate the fare">
            
        </div>

        </form>
      </div>
    </div>
  </div>


  <footer class="page-footer font-small blue bg-dark">


    <div class="footer-copyright text-center py-3 text-white">© 2020 Copyright:
      <a href="https://mdbootstrap.com/"> CEDCOSS TECHNOLOGIES</a>
    </div>


  </footer>

  <script src="cab.js"></script>


</body>

</html>