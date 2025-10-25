<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href=
"https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Login</title>
</head>
<body>	
<form action="dashboard.php" method="post">
	<?session_start();
	?>
		<div class="login-box">
			<h1>WELCOME TO <br>STUDENT RECORD SYSTEM</h1>

			<div class="textbox">
				<i class="fa fa-user" aria-hidden="true"></i>
				<input type="text" id="user"name="user" placeholder="Email"required>
			</div>

			<div class="textbox">
				<i class="fa fa-lock" aria-hidden="true"></i>
				<input type="password" placeholder="Password"
						name="password" value="">
			</div>

			<?php
if(isset($_SESSION['msg'])){?>
<p style="color:red;"> Invalid email or password! </p>
<?php

}

?>

<input class="button" type="submit" name="login" value="LOG IN"> 
<a href="signup.php" class="ca">Create an Account</a>
<!-- 
			 <button> LOG IN </button> -->
			
								

	
		</div>
	</form>
</body>
</html>

<style type="text/css">
					
					.button {
	 font-size: 20px;
	 padding: 0.5em 2em;
	 border: transparent;
	 box-shadow: 2px 2px 4px rgba(0,0,0,0.4);
	 background: darkblue;
	 color: white;
	 border-radius: 4px;
	}
	
	.button:hover {
	 background: rgb(2,0,36);
	 background: linear-gradient(90deg, rgba(30,144,255,1) 0%, rgba(0,212,255,1) 100%);
	}
	
	.button:active {
	 transform: translate(0em, 0.2em);
	}
	body {
	margin: 0;
	padding: 0;
	font-family: sans-serif;
	background: url(improve-records-management-scaled.jpeg) no-repeat;
	background-size: cover;

}
									

	
