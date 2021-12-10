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
		<li><a href="login.html">Account</a></li>
	</ul>
</nav>
<img src="images/ShoppingCart.jpeg" width="30px" height="30px">
<img src="images/Menu-icon.jpeg" class="menu-icon" onclick="menutoggle()">
</div>
 
 </div>
</div>
 <!------login-page------->
 <div class="login-page">
 	   <div class="container">
 	   	   <div class="row">
 	   	   	  <div class="col-2">
 	   	   	  	<img src="images/Shopfit.jpeg" width="100%">
 	   	   	  </div>
 	   	   	   <div class="col-2">
 	   	   	  	   <div class="form-container">
 	   	   	  	   	 <div class="form-btn">
 	   	   	  	   	 	   <span onclick="login()">Login</span>
 	   	   	  	   	 	   <span onclick="register()">Register</span>
 	   	   	  	   	 	   <hr id="Indicator">
 	   	   	  	   	 </div>
			 <!-- //passing data to the php using post method 'fname and fpass' -->
 	   	   	  	   	    <form id="loginForm" class="formHand" action="LoginSub.php" method="POST" enctype="multipart/form-data">
							<input type="text" name="name" placeholder="Username">
							<input type="password" name="pass" placeholder="Password">
							<button type="submit" class="btn">Login</button>
							<a href="">Forgot Password</a>
 	   	   	  	   	    </form> 
 	   	   	  	   	    <form id="RegisterForm" class="formHand" action="Registration.php" method="POST" enctype="multipart/form-data">
							<input type="text" placeholder="Username" name = "Username">
							<input type="email" placeholder="Email" name = "Email">
							<input type="password" placeholder="Password" name = "Password">
							<button type="submit" class="btn">Register</button>
 	   	   	  	   	   	</form> 	   	   	  	   	 
 	   	   	  	   </div>
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

<!-- ------------ js for toggle form ----------- -->
  <script >
  	var loginForm= document.getElementById("loginForm");
  	var RegisterForm= document.getElementById("RegisterForm");
  	var Indicator= document.getElementById("Indicator");
         function register(){
         	RegisterForm.style.transform= "translateX(0px)";
         	loginForm.style.transform= "translateX(0px)";
          Indicator.style.transform= "translateX(100px)";
         }
          function login(){
         	RegisterForm.style.transform= "translateX(300px)";
         	loginForm.style.transform= "translateX(300px)";
         	Indicator.style.transform= "translateX(0px)";
         }

  </script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
	$(".formHand").submit(function(e) {
		e.preventDefault(); // avoid to execute the actual submit of the form.
		var form = $(this);
		var url = form.attr('action');
		$.ajax({
			type: "POST",
			url: url,
			data: form.serialize(), // serializes the form's elements.
			success: function(data)
			{

				if(data == "worked"){
					window.location = './products.php';
				}else{
					alert("Wrong credentials");
				}
			}
			});
	});

</script>
</body>
</html>