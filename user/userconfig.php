



<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Cab Booking</title>
  <link rel="stylesheet" href="mystyle.css">
  <!-- Latest compiled and minified CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

  <!-- jQuery library -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

  <!-- Popper JS -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

  <!-- Latest compiled JavaScript -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<body>


  <div class="bgimg">

    <nav class="navbar navbar-expand-md bg-dark navbar-dark">
      <div class="container">
        <img src="logo2.png" height="55px" width="75px">
        <a href="" class="navbar-barnd text-white font-weight-bold">CED TAXI SERVICE</a>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="collapsenavbar">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse text-center " id="collapsenavbar">
          <ul class="navbar-nav ml-auto text-white ">
            
          </ul>

        </div>

      </div>

    </nav>
    <div class="container text-center text-white headerset">
      <h1>Book a City Taxi to your destination in town</h1>
      <h3> Choose from a range of categories and prices</h3>


    </div>
    <div class="col-sm-4 col-md-4 col-lg-4 box bg-dark"
      style="margin-top:70px ;padding: 3%; margin-left: 450px;margin-bottom:40px; width: 450px;">
      <p class="para">Cedcoss taxi booking website</p>
      <div><img src="logo2.png" height="55px" width="75px" style="margin-left:140px"></div>


      <?php
        error_reporting(0);
        $ccity = $_GET["ccity"];
        $dcity = $_GET["dcity"];
        $weight = $_GET['lweight'];
        if($weight == "No luggage is allowed!"){
          $weight = 0;
        }
        $cabtype = $_GET['cabtype'];

        $distance = array("charbagh"=>"0", "indiraNagar"=>"10", "bbd"=>"30",
        "barabanki"=>"60", "faizabad"=>"100", "basti"=>"150", "gkp"=>"210");

        $fareKm = array(13.50, 12.00, 10.20, 8.50);
        $micro = 50;
        $mini = 150;
        $royal = 200;
        $suv = 250;

        $total_dist = abs($distance[$ccity] - $distance[$dcity]);
        $fare = 0;
        if($cabtype == "micro"){
          $fare += $micro;
          if($total_dist<=10){
            $fare += $total_dist*($fareKm[0]);
          }
          if($total_dist<=60 && $total_dist>10){
            $fare += (($total_dist-10)*($fareKm[1]) + 10*$fareKm[0]);
          }
          if($total_dist<=160 && $total_dist>60){
            $fare += (($total_dist-60)*($fareKm[2]) + 50*$fareKm[1] + 10*$fareKm[0]);
          }
          if($total_dist>160){
            $fare += (($total_dist-160)*($fareKm[3]) + 100*$fareKm[2] + 50*$fareKm[1] + 10*$fareKm[0]);
          }
        }
        if($cabtype == "mini"){
          $fare += $mini;
          if($total_dist<=10){
            $fare += $total_dist*($fareKm[0]+1);
          }
          if($total_dist<=60 && $total_dist>10){
            $fare += (($total_dist-10)*($fareKm[1]+1) + 10*($fareKm[0]+1));
          }
          if($total_dist<=160 && $total_dist>60){
            $fare += (($total_dist-60)*($fareKm[2]+1) + 50*($fareKm[1]+1) + 10*($fareKm[0]+1));
          }
          if($total_dist>160){
            $fare += (($total_dist-160)*($fareKm[3]+1) + 100*($fareKm[2]+1) + 50*($fareKm[1] + 1)+ 10*($fareKm[0]+1));
          }
        }
        if($cabtype == "royal"){
          $fare += $royal;
          if($total_dist<=10){
            $fare += $total_dist*($fareKm[0]+2);
          }
          if($total_dist<=60 && $total_dist>10){
            $fare += (($total_dist-10)*($fareKm[1]+2) + 10*($fareKm[0]+2));
          }
          if($total_dist<=160 && $total_dist>60){
            $fare += (($total_dist-60)*($fareKm[2]+2) + 50*($fareKm[1]+2) + 10*($fareKm[0]+2));
          }
          if($total_dist>160){
            $fare += (($total_dist-160)*($fareKm[3]+2) + 100*($fareKm[2]+2) + 50*($fareKm[1] + 2)+ 10*($fareKm[0]+2));
          }
        }
        if($cabtype == "suv"){
          $fare += $micro;
          if($total_dist<=10){
            $fare += $total_dist*($fareKm[0]+3);
          }
          if($total_dist<=60 && $total_dist>10){
            $fare += (($total_dist-10)*($fareKm[1]+3) + 10*($fareKm[0]+3));
          }
          if($total_dist<=160 && $total_dist>60){
            $fare += (($total_dist-60)*($fareKm[2]+3) + 50*($fareKm[1]+3) + 10*($fareKm[0]+3));
          }
          if($total_dist>160){
            $fare += (($total_dist-160)*($fareKm[3]+3) + 100*($fareKm[2]+3) + 50*($fareKm[1] + 3)+ 10*($fareKm[0]+3));
          }
        }

        if($weight<10){
          $fare += 50;
        }

        if($weight>=10 && $weight<20){
          $fare += 100;
        }

        if($weight>=20){
          $fare += 200;
        }

echo '<span class="para">Your Total Fare is Rs. '.$fare.'</span>';

?>
<p>
  <a  class="btn btn-success btn-block" href="usertable.php?ccity=<?php echo $ccity ?>&dcity=<?php echo $dcity ?>&cabtype=<?php echo $cabtype ?>&lweight=<?php echo $weight ?>&fare=<?php echo $fare ?>&total_dist=<?php echo $total_dist ?>">Book Now</a>
  
</p>



    </div>
    </form>
  </div>
  <footer class="page-footer font-small blue bg-dark">


    <div class="footer-copyright text-center py-3 text-white">© 2020 Copyright:
      <a href="https://mdbootstrap.com/"> CEDCOSS TECHNOLOGIES</a>
    </div>


  </footer>

</body>

</html>