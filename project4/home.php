<?php
session_start();

if(isset($_POST['add-product'])) {
    $productname = $_POST['product-name'];
    $productprice = $_POST['product-price'];
    $productdesc = $_POST['product-desc'];

    if(empty($productname) || empty($productprice) || empty($productdesc)) {
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
            'product_image' => $imagePath
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
         <title>Bootstrap 4 Example</title>
   </head>
   
   <body>
      <div class = "container-fluid" style="background-color:#F8513E">
       
         <nav class = "navbar navbar-expand-sm fixed-top " style="background-color:#F8513E">
            <a class = "navbar-brand " href = "#">
               <img src = "t.png" style = "width:140px;" alt = "">
            </a>
            <ul class = "navbar-nav ml-auto" >
               <li class = "nav-item active mx-4">
                  <a class = "nav-link" href = "#i" style="color:white ;font-size:30px">Home 
                     <span class = "sr-only">(current)</span>
                  </a>
               </li>
               <li class = "nav-item  mx-4">
                  <a class = "nav-link" href = "#" style="color:white;font-size:30px">About Us</a>
               </li>
               <li class = "nav-item mx-4">
                  <a class = "nav-link" href = "#" style="color:white;font-size:30px">Contact</a>
               </li>
            </ul>
            
         </nav>
        
      </div>
     
    
   
 <div class="image-container" id="i" style="position: relative;">
    <img src="1.jpg" class="img-fluid" alt="Image Description"> 
    <p style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%); text-align: center; color: white;font-size:25px">
    Welcome to The Grill House, where sizzling flavors and savory aromas await you.
    </p>
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
        <!-- Add more gallery images as needed -->
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