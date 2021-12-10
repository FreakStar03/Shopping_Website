<?php 
session_start();
if (!isset($_SESSION["userName"]))
{
   header("location: ./login.php");
}
$Username = $_SESSION['userName'];
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
<h2><b>Hello, <?php echo $Username ?>!</b></h2>

</div>
<nav>
	<ul id="MenuItems">
		<li><a href="index.html">Home</a></li>
		<li><a href="products.html">Product</a></li>
		<li><a href="">About & Contact</a></li>
		<li><a href="login.html">Account</a></li>
	</ul>
</nav>
<img src="images/ShoppingCart.jpeg" width="30px" height="30px">
<img src="images/Menu-icon.jpeg" class="menu-icon" onclick="menutoggle()">
</div>
 
 </div>
</div>

<div class="small-container">
	<div class="row row-2">
	 <h2>All Product,
  </h2>
	   <select> 
	   	<option> Default Shorting </option>
	   	<option> Short by price </option>
	   	<option> Short by popularity </option>
	   	<option> Short by rating </option>
	   	<option> Short by sale </option>
	    </select>
	  </div>  
<?php
$connection = mysqli_connect( 'localhost', 'root', '' );
if ( !$connection ) {
    die( 'Database Connection Failed' . mysqli_error( $connection ) );
}
$select_db = mysqli_select_db( $connection, 'Shopping_Website' );
if ( !$select_db ) {
    die( 'Database Selection Failed' . mysqli_error( $connection ) );
}
$query = 'SELECT * FROM ProductList';

$result = mysqli_query( $connection, $query );
$num_rows = mysqli_num_rows($result);
$array = array_fill(0, $num_rows, array());
$index = 0;
while( $row = mysqli_fetch_array( $result , MYSQLI_ASSOC) ) {

   array_push( $array[$index], $row );
   $index++;
};
?>
	
<?php for ($i = 0; $i < count($array);): ?>
<div class="row">
    <?php for($j = 0; $j < 4 && $i + $j < count($array); ++$j):?>
    		<a href="./product-details.php?id=<?php echo $array[$j + $i][0]['ID']?> ">
		<div class="col-4">
			<img src=<?php echo $array[$j + $i][0]['Image']?> href="product-details.php">
			<h4><?php echo $array[$j + $i][0]['Name']  ?></h4>
			<p>$<?php echo $array[$j + $i][0]['Price']  ?></p>
		</div>
		</a>
    <?php endfor; $i += $j;?> 
<div>
 <?php endfor; ?>

     <div class="page-btn">
      	<span>1</span>
      	<span>2</span>
      	<span>3</span>
      	<span>4</span>
      	<span>&#8594;</span>
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
</body>
</html>
