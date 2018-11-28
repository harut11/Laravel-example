<!DOCTYPE html>
<html lang="en">
<head>
  <title>@yield('title')</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <style>
    /* Remove the navbar's default margin-bottom and rounded borders */ 
    .navbar {
      margin-bottom: 0;
      border-radius: 0;
    }
    
    /* Set height of the grid so .sidenav can be 100% (adjust as needed) */
    .row.content {height: auto;}
    
    /* Set gray background color and 100% height */
    .sidenav {
      padding-top: 20px;
      background-color: #f1f1f1;
      height: 100%;
    }

    /* posts section */
    #posts {
      margin: 60px auto;
      width: 90%;
    }

    #posts .card {
      margin-bottom: 20px;
    }

    #posts .card a {
      text-decoration: none;
      color: #333;
    }

    #posts .card a:hover img{
      opacity: 0.8;
    }

    #posts .card a .card-body h4:hover {
      animation: move 0.5s ease;
    }

    #posts .card:nth-child(3n+2) {
      margin: 0 20px;
    }

    /*single post section */
    #post_box {
      margin: 40px auto;
    }

     #post_box img {
      width: 70%;
      height: auto;
      margin: 0 auto;
     }

     /*Sidebar Section */
     .banner {
      max-width: 100%;
      margin: 20px 10px;
     }

     .banner img {
      width: 100%;
     }

    
    /* Set black background color, white text and some padding */
    footer {
      background-color: #555;
      color: white;
      padding: 15px;
    }
    
    /* On small screens, set height to 'auto' for sidenav and grid */
    @media screen and (max-width: 767px) {
      .sidenav {
        height: auto;
        padding: 15px;
      }
      .row.content {height:auto;} 
    }

    /*animations */
    @keyframes move {
      from {margin-left: 0;}
      to {margin-left: 10px;}
    }
  </style>
</head>
<body>

@include('layouts.navbar')
  
<div class="container-fluid text-center">    
  <div class="row content">
    <div class="col-sm-2 sidenav">
      @include('layouts.sidebar1')
    </div>
    <div class="col-sm-8 text-left"> 
      @yield('content')
    </div>
    <div class="col-sm-2 sidenav">
      @include('layouts.sidebar2')
    </div>
    </div>
  </div>
</div>

<footer class="container-fluid text-center">
  <p>&#169; Copyright 2018</p>
</footer>

</body>
</html>
