<!DOCTYPE html>

<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
  <title>DELUXE Apartments</title>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- bootstrap and icons links-->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" 
  integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

  <style> 
  .navbar {
  width: 100%;
  background-color: #555;
  overflow: auto;
}

.navbar a {
  float: left;
  padding: 12px;
  color: white;
  text-decoration: none;
  font-size: 17px;
}

.navbar a:hover {
  background-color: #000;
}

.active {
  background-color: #4CAF50;
}

@media screen and (max-width: 500px) {
  .navbar a {
    float: none;
    display: block;
  }
}
  .myfont {
  font-family: "Comic Sans MS", cursive, sans-serif;
    }
 .volor{
     background-color: #F5F5F5;
    }
   #myid {
  background-color: #F5F5F5;
    }
    .carousel-inner img {
    width: 1600px;;
    height: 500px;
  }
  #deluxe:visited {
  color: black;
}
#deluxe:hover {
  color: grey;
}
.button {
  background-color: #4CAF50;
  color:white;
  padding: 8px 10px;
  text-decoration: none;
  font-size: 16px;
}
  </style>
</head>

<!-- color of the body-->
<body class="volor">

<!--logo and title-->
<div class="jumbotron text-black " id="myid" style="margin-bottom:0">
  <div class="row">
    <div class="col-sm-4">
  <h1 class="myfont"><span id="deluxe"><b>Deluxe Apartments<b></span></h1>
</div>
  
  <h5><div class="myfont" style="padding-left:950px">Differents types of apartments
</div></h5>

  <div>
  </div>
</div>

<!--navbar-->
<div class="navbar">
  <a class="active" href="#"><i class="fa fa-fw fa-home"></i> Home</a> 
  <a href="www.google.com"><i class="fa fa-fw fa-search"></i> Search</a> 
  <a href="contactus.php"><i class="fa fa-fw fa-envelope"></i> Contact</a> 
  <a href="test.php"><i class="fa fa-fw fa-user"></i> Login</a>
</div>

<!--bootstrap carousel-->
<div class="container mt-4">
  <div id="myCarousel" class="carousel slide" data-ride="carousel">
    <ul class="carousel-indicators">
       <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
       <li data-target="#myCarousel" data-slide-to="1"></li>
     <li data-target="#myCarousel" data-slide-to="2"></li>
    </ul>
  <div class="carousel-inner">
    <div class="carousel-item active">
    <a target="_blank" href="#">
      <img src="https://cdn.home-designing.com/wp-content/uploads/2018/01/luxury-living-room-1024x576.jpg"
      alt="inside of the apartment" width="100%" height="100%">
     </a>
      <div class="carousel-caption">
        <h3>Living Room</h3>
        <p>Comfortable and spacious rooms</p>   
      </div>  
    </div>
    <div class="carousel-item">
    <a target="_blank" href="...">
      <img src="https://i.pinimg.com/originals/38/68/ab/3868abe81444ef47fbfa622ef55a5ca3.jpg" 
      alt="inside of the apartment" width="100%" height="100%">
      </a>
      <div class="carousel-caption">
        <h3>Hall</h3>
        <p>Large and luxury aisles</p>
      </div>  
    </div>
    <div class="carousel-item">
    <a target="_blank" href="...">
      <img src="https://www.homeandecoration.com/wp-content/uploads/2019/01/Be-Inspired-By-This-Modern-Luxury-House-Design-capa.jpg"
      alt="inside of the apartment" width="100%" height="100%">
      </a>
      <div class="carousel-caption">
        <h3>Rooms</h3>
        <p>You can have such a great time.</p>
           </div>  
        </div>
      </div>
      <a class="carousel-control-prev" href="#myCarousel" data-slide="prev">
    <span class="carousel-control-prev-icon"></span>
   </a>
  <a class="carousel-control-next" href="#myCarousel" data-slide="next">
    <span class="carousel-control-next-icon"></span>
  </a>
</div><br>

<!-- bootstrap cards-->
<div class="row">
   <div class="col-sm-4">
       <div class="card" style="width: 360px;">
        <img class="card-img-top" src="https://cf.bstatic.com/images/hotel/max1024x768/234/234978712.jpg" 
        alt="1 romm apt" style="width:100%">
      <div class="card-body">
      <h5 class="card-title">One Bedroom Apartments</h5>
     <p class="card-text">1 <i class="fas fa-bed"></i> · 2 <i class="fas fa-user"></i></p>
      <a href="contactus.php" class="btn btn-primary">See details</a>
       </div>
     </div>
   </div>
<div class="col-sm-4">
        <div class="card" style="width: 360px;">
          <img class="card-img-top" src="https://media-cdn.tripadvisor.com/media/vr-splice-j/05/a2/64/a8.jpg" 
       alt="2 room apt" style="width:100%">
         <div class="card-body">
           <h5 class="card-title">Two Bedroom Apartments</h5>
             <p class="card-text"> 2 <i class="fas fa-bed"></i> · 4 <i class="fas fa-user"></i></p>
         <a href="contactus.php" class="btn btn-primary">See details</a>
          </div>
      </div>
     </div>
<div class="col-sm-4">
     <div class="card" style="width: 360px;">
     <img class="card-img-top" src="https://aro.nyc/wp-content/uploads/2017/11/Midtown-West-Luxury-Rentals-Living-1.jpg" 
      alt="3 room apt" style="width:100%">
       <div class="card-body">
       <h5 class="card-title">3 Bedroom Apartments</h5>
        <p class="card-text">3 <i class="fas fa-bed"></i> · 6 <i class="fas fa-user"></i></p>
      <a href="contactus.php" class="btn btn-primary">See details</a>
      </div>
     </div>
    </div>
   </div><br>

   <!-- image of the apartment with the link-->
     <a target="_blank" href="...">
    <img border="0" alt="img" src="https://www.fmg.az/uploads/posts/2019/02/rent/intourist-apartments-cover.jpg"
   width="1120" height="400"><br><br><br>
    </a>

    <!-- article-->
    <article>
    <center>
    <h1> About Deluxe Apartments </h1>
    <p> If you’re looking for rentals, click the “Search” button and inquire about your favorite listings. 
    Browse vacation deals, family-friendly amenities, and more. If you can’t find what you’re looking for,
    remember that vacation rentals are added and updated every week, 
    so please bookmark us and come back for a visit!</p>
    </center>
    </article>

    <!--footer-->
    <footer>
<div class="jumbotron text-center"  style="background-color:#F5F5F5"
    style="margin-bottom:0">
      <a href="www.fb.com"><i class="fab fa-facebook-f"></i></a> 
      <a href="www.linkedin.com"><i class="fab fa-linkedin-in"></i></a>
      <a href="www.youtube.com"><i class="fab fa-youtube"></i></a> 
      <a href="www.instagram.com"><i class="fab fa-instagram"></i></a>
   <h6>Copyright © 2020 Apartment Managers. All rights reserved.<a target="_blank" href="..."> Terms of Use</a> -
   <a target="_blank" href="...">Privacy Policy </a>- Powered by Ravan.</h6>
   </div>
</footer>

</body>
</html>

