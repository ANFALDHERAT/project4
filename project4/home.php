<?php
session_start();

if(isset($_POST['add-product'])) {
    $productname = $_POST['product-name'];
    $productprice = $_POST['product-price'];
    $productdesc = $_POST['product-desc'];
    $date = $_POST['Date'];
    if(empty($productname) || empty($productprice) || empty($productdesc)|| empty( $date )) {
        $message = 'Please fill out all fields';
    } else {
        if(isset($_FILES['product-image']) && $_FILES['product-image']['error'] === UPLOAD_ERR_OK) {
            // Handle image upload
            $productimage = $_FILES['product-image'];
            $imagePath = 'upload/' . $productimage['name'];
            move_uploaded_file($productimage['tmp_name'], $imagePath);
        } else {
            // No image uploaded or an error occurred
            $imagePath = '';
        }
        $_SESSION['products'][] = array(
            'product_name' => $productname,
            'product_price' => $productprice,
            'product_desc' => $productdesc,
            'product_image' => $imagePath,
            'product_Date' =>  $date 
        );
        $message = 'Product added successfully';
    }
}


if(isset($_GET['clear']) && $_GET['clear'] === 'true') {
    unset($_SESSION['products']);
}
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
       <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

       <title>Bootstrap 4 Example</title>
   </head>
   
   <body>
   
   <div class = "container-fluid" style="width:100%; hight:100vh">
<nav class="navbar navbar-expand-sm fixed-top ">
<a class = "navbar-brand " href = "#">
               <img src = "t.png" style = "width:140px;" alt = "">
            </a>
<ul class="navbar-nav">
  
 
    <li class="nav-item">
      <a class="nav-link mx-4" href="#">HOME</a></a>
    </li>
    <li class="nav-item">
      <a class="nav-link mx-4" href="#">About</a>
    </li>
    
    <li class="nav-item dropdown"  >
		<a class="nav-link " data-toggle="dropdown" href="#">Services</a>
                <ul class="dropdown-menu">
                    
                <li><a href="#"></a>Service1</li>
                <li><a href="#"></a>Service2</li>
                <li><a href="#"></a>Service3</li>
              
              </ul>
							
  </ul>
</nav>
   
<div class="image-container" id="i" >
    <img src="1.jpg" class="img-fluid" alt="Image Description" style="margin-top:100px">  
    <p style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%); text-align: center; color: white;font-size:25px">
    Welcome to The Grill House, where sizzling flavors and savory aromas await you.
    </p>
</div>

</div>



<div class="container">
<div class="message-block">
    <p class="message">Your message here</p>
</div>
<div class="message-block <?php if(isset($message)) echo 'active'; ?>">
<?php
        if(isset($message))
        {
            echo '<span class="message">'.$message.'</span>';
        }
        ?>
</div>







  
    <div class="adminform">
        <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
       <h3>add a new product</h3>

       <input type="text" placeholder="enter product name" name="product-name" class="box">
       <input type="number" placeholder="enter product price" name="product-price" class="box">
       <!-- <label for="product-date">Select Date:</label>-->
       <label for="Date">Select Date:</label>
    <input type="date" id="Date" name="Date"  class="box">
       <input type="text"  placeholder="enter discription of product"  name="product-desc" class="box"> 
       
       <input type="submit" class="btn" name="add-product" value="add product">
        </form>
    </div>
</div>

<div class="clear-session">
        <a href="?clear=true" class="btn btn-danger">Clear</a>
    </div>




<div class="productdisplay">
<table class="productdisplay">
<thead>
    <tr>
        <th>Product Image</th>       
        <td>product name</td>
        <td>product price</td>
        <td>product discription</td>
        <td>Product date</td>    
        
    </tr>
</thead>
<tbody>
            <?php
            if(isset($_SESSION['products']) && !empty($_SESSION['products'])) {
                foreach ($_SESSION['products'] as $product) {
                    echo '<tr>';
                    echo '<td><img src="6.jpg"'. $product['product_image'] . '" alt="Product Image" class="product-image"></td>';
                    echo '<td>' . $product['product_name'] . '</td>';
                    echo '<td>' . $product['product_price'] . '</td>';
                    echo '<td>' . $product['product_desc'] . '</td>';
                    echo '<td>' . $product['product_Date'] . '</td>';
                    echo '</tr>';
                    // unset($_SESSION['products']);
                }
            } else {
                echo '<tr><td colspan="3">No products available</td></tr>';
            }

            
            ?>
            
        </tbody>
</table>
</div>


<div class="detail">
        <a href="card.php" class="btn btn-danger">see more detail</a>
    </div>




    <div class="gallery">
    <h2>Image Gallery</h2>
    <div class="image-grid">
        <div class="gallery-image"><img src="4.jpg" alt="Gallery Image 1"></div>
        <div class="gallery-image"><img src="e.jpg" alt="Gallery Image 2"></div>
        <div class="gallery-image"><img src="pez.jpg" alt="Gallery Image 3"></div>
        <div class="gallery-image"><img src="service1.jpg" alt="Gallery Image 1"></div>
        <div class="gallery-image"><img src="service2.jpg" alt="Gallery Image 2"></div>
        <div class="gallery-image"><img src="service3.jpg" alt="Gallery Image 3"></div>
        <div class="gallery-image"><img src="b.PNG" alt="Gallery Image 3"></div>
        <div class="gallery-image"><img src="b2.PNG" alt="Gallery Image 3"></div>
        <div class="gallery-image"><img src="b3.PNG" alt="Gallery Image 3"></div>
        <div class="gallery-image"><img src="b4.PNG" alt="Gallery Image 3"></div>
        <div class="gallery-image"><img src="b7.PNG" alt="Gallery Image 3"></div>
        <div class="gallery-image"><img src="b6.PNG" alt="Gallery Image 3"></div>

       
    </div>
</div>



<footer class="page-footer font-small pt-4" style="background-color:#F8513E">
  <div class="container-fluid text-center text-md-left">
    <div class="row">
      <div class="col-md-4 mt-md-0 mt-3">
        <h5 class="text-uppercase"><img src="t.png" style="width: 140px;"></h5>
      </div>
      <div class="col-md-2 mb-md-0 mb-3" style="margin-left: 20px;">
        <h5 class="text-uppercase" style="color:white;">Location</h5>
        <ul class="list-unstyled">
          <li><span style="color:white;">Irbid</span></li>
          <li><span style="color:white;">Behind Abdel Rahman Ibn Auf Mosque</span></li>
        </ul>
      </div>
      <div class="col-md-2 mb-md-0 mb-3" style="margin-left: 20px;">
        <h5 class="text-uppercase" style="color:white;">Hours</h5>
        <ul class="list-unstyled" style="color:white;">
          <li><span>Mon - Fri: 9:00 AM - 6:00 PM</span></li>
          <li><span>Sat: 10:00 AM - 4:00 PM</span></li>
          <li><span>Sun: Closed</span></li>
        </ul>
      </div>
      <div class="col-md-2 mb-md-0 mb-3" style="margin-left: 20px;">
        <h5 class="text-uppercase" style="color:white;">Contact Us</h5>
        <ul class="list-unstyled">
          <li><a style="color:white; text-decoration:none;" href="mailto:anfaldherat@gmail.com">anfaldherat@gmail.com</a></li>
          <li><a style="color:white; text-decoration:none;" href="tel:07777777">07777777</a></li>
        </ul>
      </div>
      
    </div>
  </div>
</footer>




<div class="d-flex justify-content-center py-4" style="background-color:#FF795B">
         <div class="footer-icons">
          
            <a class="fb-ic mx-2" href="#"><i class="fab fa-facebook-f white-text" style="font-size:50px ; margin:20px ;color:white"></i></a>
            <a class="tw-ic mx-2" href="#"><i class="fab fa-twitter white-text" style="font-size:50px ; margin:20px ;color:white"></i></a>
            <a class="gplus-ic mx-2" href="#"><i class="fab fa-google-plus-g white-text" style="font-size:50px ; margin:20px;color:white"></i></a>
            <a class="li-ic mx-2" href="#"><i class="fab fa-linkedin-in white-text" style="font-size:50px ; margin:20px;color:white"></i></a>
            <a class="ins-ic mx-2" href="#"><i class="fab fa-instagram white-text" style="font-size:50px ; margin:20px;color:white"></i></a>
         </div>
      </div>
 
  <div class="footer-copyright text-center py-3" style="background-color:#FF795B;color:white">grill©2023 Copyright
  </div>

      <script src = "https://code.jquery.com/jquery-3.2.1.slim.min.js" 
         integrity = "sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" 
         crossorigin = "anonymous">
      </script>
      
  
      <script src = "https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" 
         integrity = "sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" 
         crossorigin = "anonymous">
      </script>
      
      
      <script src = "https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" 
         integrity = "sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" 
         crossorigin = "anonymous">
      </script>
      
   </body>
</html>