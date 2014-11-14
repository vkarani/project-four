<!DOCTYPE html>
<html>
  <head>
    <title>@yield('title', 'Project 4 V. Karani')</title>
    <meta charset='utf-8'>
    <!-- maxcdn gives the Bootstrap stylesheet-->
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
  </head>
  <body>
    <!-- Navigate easily to everything -->
    <nav class="navbar navbar-default">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span> 
          </button>
         <a class="navbar-brand" href="#">New York Sites and Hotels</a>
        </div>
        <div class="collapse navbar-collapse" id="myNavbar">
          <ul class="nav navbar-nav">
            <li><a href="#">Home</a></li>
            <li><a href="#">Sites</a></li>
            <li><a href="#">Hotels</a></li>  
          </ul>
          <ul class="nav navbar-nav navbar-right">
            <li><a href="#"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
            <li><a href="#"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
          </ul>
        </div>
      </div>
    </nav>
  
    <!-- Use Jumbotron to announce your intentions... -->
    <div class = container-fluid>
      <div class="jumbotron">
        <h2>Victor Karani P4: New York Sites and Hotels</h1>            
      </div>
    </div>
    
    <!-- Put stuff inside bootstrap columns-->
    <div class = container-fluid>  
      <div class="row">
        <div class="col-sm-3">
          <!-- TODO ADD AN IMAGE
          <img class="displayed" src='Victor.png' alt='Victor Karani'> -->
          <img src=' {{ URL::asset('images/Freedom-Tower.jpg') }} ' alt='Freedom Tower'>
        </div>
        <div class="col-sm-9">
          @yield('content')
        </div>  
      </div>
    </div>
    
    {{-- @yield('footer') --}}

    <!--The following are needed for active bootstrap items to work...-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
  </body>
</html>
