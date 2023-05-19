<!DOCTYPE html>
<html>
<head>
  <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">


<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/css/bootstrap.min.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/gh/t4t5/sweetalert@v0.2.0/lib/sweet-alert.css" />



  <!-- Include Bootstrap JS -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/js/bootstrap.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
 
  
  <style>
    .tab {
      display: none;
    }
  </style>
  <script>
    // for handling tab switching
    function openTab(tabName) {
      var i, tabContent;
      tabContent = document.getElementsByClassName("tab");
      for (i = 0; i < tabContent.length; i++) {
        tabContent[i].style.display = "none";
      }
      document.getElementById(tabName).style.display = "block";
    }
  </script>
  <style>
    .navbar {
      position: fixed;
      left: 0;
      top: 0;
      height: 100%;
      width: 120px;
      background-color: #333;
      overflow: hidden;
      padding: 0px;
      display: block;
    }

    .navbar a {
      display: block;
      color: #fff;
      text-align: center;
      padding: 10px 5px;
      text-decoration: none;
      font-size: 17px;
      text-align: left;
    }

    .navbar a:hover {
      background-color:palevioletred;
      color: black;
    }

    .content {
      margin-left: 150px;
    }

    
  </style>
</head>
<body>
  <!-- Navigation bar -->
  <div class="navbar">
    <a href="home.php">Dashboard</a>
    <a href="post.php">Post</a>

    <a href="dashboard.php">User Data</a>
    <a href="logout.php" onclick="openTab('logout')">Logout</a>
  </div>

  <!-- Content area -->
  <div class="content">
  <div>