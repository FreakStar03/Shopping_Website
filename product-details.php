
<?php 
session_start();
if (!isset($_SESSION["userID"]))
{
   header("location: ./login.php");
}
$UserId = $_SESSION['userID'];
?>
<?php
$connection = mysqli_connect( 'localhost', 'root', '' );
if ( !$connection ) {
    die( 'Database Connection Failed' . mysqli_error( $connection ) );
}
$select_db = mysqli_select_db( $connection, 'Shopping_Website' );
if ( !$select_db ) {
    die( 'Database Selection Failed' . mysqli_error( $connection ) );
}
$id = intval($_GET['id']); 
$query = "SELECT * FROM ProductList Where ID=$id";
$result = mysqli_query( $connection, $query );

$array = array();

while ($row = mysqli_fetch_array( $result , MYSQLI_ASSOC))     
{
    array_push( $array, $row );   
}
//print_r( $array[0]['Detail'] );
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title> All Products -Shopfit </title>
<link rel="stylesheet" href="style.css">
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@600&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
<div class="header">
 <div class="container">
 	<div class="navbar">
<div class="logo">
<img src="images/shopFit (2).jpeg" width="125px">    
</div>
<nav>
	<ul id="MenuItems">
		<li><a href="index.html">Home</a></li>
		<li><a href="products.html">Product</a></li>
		<li><a href="">About & Contact</a></li>
		<li><a href="./Logout.php">Logout</a></li>
	</ul>
</nav>
<img src="images/ShoppingCart.jpeg" width="30px" height="30px">
<img src="images/Menu-icon.jpeg" class="menu-icon" onclick="menutoggle()">
</div>
 
 </div>
</div>
<!------single-products-details------>
 <div class="small-container single-product">
 	  <div class="row">
 	  	 <div class="col-2">
 	  	 	 <img src= <?php echo $array[0]['Image'] ?> width="100%" id="ProductImg">



 	  	 </div>
 	  	 <div class="col-2">
 	  	 	 <p></p>
 	  	 	 <h1><?php echo $array[0]['Name'] ?></h1>
 	  	 	 <h4>MRP:$ <?php echo $array[0]['Price'] ?></h4>
 	  	 	 <select>
 	  	 	   <option>Select Size</option>
 	  	 	    <option>XXL</option>
 	  	 	    <option>XL</option>
 	  	 	    <option>L</option>
 	  	 	 </select>
 	  	 	 <input id="quantitySelector" type="number" value="1">
 	  	 	 <a  onClick="Add2Cart( <?php echo $array[0]['ID'] ?> ,<?php echo $UserId?> )" id="AddToCart" class="btn">Add To Cart</a>
 	  	 	  <h3>Product details <i class="fa fa-indent"></i> </h3>
 	  	 	  <br>
 	  	 	  <p><?php echo $array[0]['Detail'] ?> </p>
 	  	 </div>
 	  </div>
 </div>

    
	</div>
     
    <!------footer------>
    <div class="footer">
        <div class="container">
          <div class="row">
            <div class="footer-col-1">
              <h3>Our App Will be Out soon</h3>
              <p>Our App Will be Out soon.</p>
               <div class="app-logo">
                <img src="images/play-store.jpeg">
                <img src="images/app-store.jpeg">
               </div>
            </div>
             <div class="footer-col-2">
              <img src="images/shopFit (2).jpeg">
              <p>Our Purpose Is To Sustainably Make the Pleasure and Benefits of Sports Accessible to the Many.</p>
             </div>
             <div class="footer-col-3">
              <h3>Useful Links</h3>
              <ul>
                <li>Coupons</li>
                <li>Blog Post</li>
                <li>Return Policy</li>
                <li>Join Affiliate</li>
              </ul>
             </div>
             <div class="footer-col-4">
               <h3>Follow us</h3>
                <ul>
                <li>Facebook</li>
                <li>Twitter</li>
                <li>Instagram</li>
                <li>Youtube</li> 
               </ul>
            </div>
          </div>
           <hr>
           <p class="copyright"> Copyright 2020 - Shivam Pravin Upadhyay / Apurv Moore/ Asmita Ware</p>
        </div>
    </div>
<!-- ------------ js for toggle menu ----------- -->
<script>
	var MenuItems= document.getElementById("MenuItems");
	MenuItems.style.maxHeight="0px";
	function menutoggle(){
		if (MenuItems.style.maxHeight== "0px") 
		{
			MenuItems.style.maxHeight= "200px";
		}
		else
		{
			MenuItems.style.maxHeight="0px";
		}	
	}
</script>
<!-- ------------ js for product gallery----------- -->
<script >
	var ProductImg =document.getElementById("ProductImg");
	var small-img =document.getElementByClassName("small-img");
	 small-img[0].onclick =function()
	 {
	 	  ProductImg.src=small-img[0].src;
	 }
	small-img[1].onclick =function()
	 {
	 	  ProductImg.src=small-img[1].src;
	 }
	 small-img[2].onclick =function()
	 {
	 	  ProductImg.src=small-img[2].src;
	 }
</script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
	function Add2Cart(Pid, UserID) {
		console.log(UserID);
			$.post("AddToCart.php",
			{
				UserId: UserID ,
				ProductId: Pid,
				Quantity: $('#quantitySelector').val()
			},
			function(response){
				alert("Product Added To Cart!");
			});
};
</script>
</body>
</html>
