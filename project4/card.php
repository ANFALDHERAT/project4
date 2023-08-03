
<?php
session_start();
?>
<html lang = "en">
   <head>
      <!-- Meta tags -->
      <meta charset = "utf-8">
      <meta name = "viewport" content = "width = device-width, initial-scale = 1, shrink-to-fit = no">
      
      <!-- Bootstrap CSS -->
      <link rel = "stylesheet" 
         href = "https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" 
         integrity = "sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" 
         crossorigin = "anonymous">
         <script src="https://kit.fontawesome.com/98ec1cd8ac.js" crossorigin="anonymous"></script>
       <link rel = "stylesheet" href="home.css">
         <title>Bootstrap 4 Example</title>
   </head>
   <style>
       
        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
        }
        .container {
            padding: 20px;
            margin-top:100px
        }
        .card-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-around;
        }
        .card {
            border-radius: 5px;
            padding: 10px;
            margin: 10px;
            width: 250px;
            background-color: white;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s, box-shadow 0.3s;
        }
        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.15);
        }
        .card-image {
            max-width: 100%;
            height: auto;
        }
        .card-content {
            margin-top: 10px;
        }
    </style>
   <body>
      <div class = "container-fluid" style="background-color:#F8513E">
       
         <nav class = "navbar navbar-expand-sm fixed-top" style="background-color:#F8513E">
            <a class = "navbar-brand" href = "#">
               <img src = "t.png" style = "width:120px;" alt = "">
            </a>
            <ul class = "navbar-nav ml-auto" >
               <li class = "nav-item active mx-4">
                  <a class = "nav-link" href = "#i" style="color:white;font-size:30px">Home 
                     <span class = "sr-only">(current)</span>
                  </a>
               </li>
               <li class = "nav-item mx-4">
                  <a class = "nav-link" href = "#" style="color:white ;font-size:30px">About Us</a>
               </li>
               <li class = "nav-item mx-4">
                  <a class = "nav-link" href = "#" style="color:white ;font-size:30px">Contact</a>
               </li>
            </ul>
            
         </nav>
        
      </div>
 


<div class="container">
   
    <div class="card-container">
        <?php
        if (isset($_SESSION['products']) && !empty($_SESSION['products'])) {
            foreach ($_SESSION['products'] as $product) {
                echo '<div class="card">';
                echo '<img src="6.jpg"' . $product['product_image'] . '" alt="Product Image" class="card-image">';
                echo '<div class="card-content">';
                echo '<h3>' . $product['product_name'] . '</h3>';
                echo '<p>Price: ' . $product['product_price'] . '</p>';
                echo '<p>' . $product['product_desc'] . '</p>';
                echo '</div>';
                echo '</div>';
            }
        } else {
            echo '<p>No products available</p>';
        }
        ?>
    </div>
</div>









      


<footer class="page-footer font-small  pt-4" style="background-color:#F8513E">


<div class="container-fluid text-center text-md-left">


  <div class="row">


    <div class="col-md-6 mt-md-0 mt-3">


    <h5 class="text-uppercase"><img src="t.png" style="margin-left:60px ;width:140px;"></h5>
    
    </div>
 

    <hr class="clearfix w-100 d-md-none pb-3">

 
    <div class="col-md-3 mb-md-0 mb-3">

  
      <h5 class="text-uppercase"  style="color:white">Quick Links</h5>

      <ul class="list-unstyled" style="color:white">
        
        <li>
          <a href="#!" style="color:white">about as</a>
        </li>
        <li>
          <a href="#!" style="color:white">contact</a>
        </li>
        
      </ul>

    </div>

    <div class="col-md-3 mb-md-0 mb-3">

      <h5 class="text-uppercase"  style="color:white">Contact Us</h5>

      <ul class="list-unstyled">
        
        <li>
          <a href="#!"  style="color:white">anfaldherat@gmail.com</a>
        </li>
        <li>
          <a href="#!"  style="color:white">07777777</a>
        </li>
       
      </ul>

    </div>

  </div>

</div>

  </div>

</div>


</footer>



<div class="d-flex justify-content-center py-4" style="background-color:#FF795B">
       <div class="footer-icons">
          <!-- Font Awesome Icons -->
          <a class="fb-ic mx-2" href="#"><i class="fab fa-facebook-f white-text" style="font-size:50px ; margin:20px ;color:white"></i></a>
          <a class="tw-ic mx-2" href="#"><i class="fab fa-twitter white-text" style="font-size:50px ; margin:20px ;color:white"></i></a>
          <a class="gplus-ic mx-2" href="#"><i class="fab fa-google-plus-g white-text" style="font-size:50px ; margin:20px;color:white"></i></a>
          <a class="li-ic mx-2" href="#"><i class="fab fa-linkedin-in white-text" style="font-size:50px ; margin:20px;color:white"></i></a>
          <a class="ins-ic mx-2" href="#"><i class="fab fa-instagram white-text" style="font-size:50px ; margin:20px;color:white"></i></a>
       </div>
    </div>
<!-- Footer Elements -->

<!-- Copyright -->

<!-- Copyright -->
<div class="footer-copyright text-center py-3" style="background-color:#FF795B;color:white">grill©2023 Copyright
</div>

<!-- Footer -->







    <!-- jQuery library -->
    <script src = "https://code.jquery.com/jquery-3.2.1.slim.min.js" 
       integrity = "sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" 
       crossorigin = "anonymous">
    </script>
    
    <!-- Popper -->
    <script src = "https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" 
       integrity = "sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" 
       crossorigin = "anonymous">
    </script>
    
    <!-- Latest compiled and minified Bootstrap JavaScript -->
    <script src = "https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" 
       integrity = "sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" 
       crossorigin = "anonymous">
    </script>
    
 </body>
</html>