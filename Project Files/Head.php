<!DOCTYPE html>
<html>
<head>
  <title>Books World</title>
  <meta charset="utf-8">
  <meta http-equiv="X_UA_Compatible" content="IE=edge"> <!--use latest rendering engine-->
  <meta name="viewport" content="width = device-width, initial-scale = 1"> <!--set the page width to the size of the device, and set the zoom level to one-->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
  <style type="text/css">
    header
    {
      background-color: #006666;
    }
    
    .alert
    {
      margin-bottom: 0px;
    }
    h4
    {
      color: #ff80ff;
      display: inline;
    }
    .foot
    {
      background-color: lightblue;
    }
    .title_h2
    {
      color: #002b80;
    }
  </style>
</head>
<body>
      <nav class="navbar navbar-expand-lg navbar-light alert" style="background-color: #e3f2fd;" >
      <h2 class="title_h2">Books World</h2>
       <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
         <span class="navbar-toggler-icon"></span>
       </button>
       
       <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
         <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
           <li class="nav-item">
             <a class="nav-link" href="HomePage.php">Home</a>
           </li>
           <li class="nav-item">
             <a class="nav-link" href="Shop.php">Shop </a>
           </li>
           <li class="nav-item">
             <a class="nav-link" href="ExchangeBook.php">Exchange Book</a>
           </li>
           <li class="nav-item">
             <a class="nav-link" href="My_Cart.php">My Cart </a>
           </li>
           <li class="nav-item">
             <a class="nav-link" href="Reading_Community.php">Reading Community </a>
           </li>
        <?php
          if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true)
          {
            if (isset($_SESSION['admin']) && $_SESSION['admin'] == true)
              { /*If the logged in user is the Admin*/
              echo"<li class='nav-item'>
                  <a class='nav-link' href='HomePage.php'>Home </a>
                  </li>";
            }
          }
        ?>

         </ul>
         <form class="form-inline my-2 my-lg-0" action="Display_Book.php" method="POST">
           <input class="form-control mr-sm-2" placeholder="Search" aria-label="Search"  name="search">
           <button class="btn btn-outline-success my-2 my-sm-0" type="submit" name="search_book">Search</button>
         </form>
       </div>
     </nav>

    
    
      
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
</body>
</html>