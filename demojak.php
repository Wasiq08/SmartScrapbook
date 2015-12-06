<?php		

define('INCLUDE_CHECK',true);

require 'connect.php';				//connect to database	
require 'functions.php';			//contains validating functions
// Those two files can be included only if INCLUDE_CHECK is defined


session_name('tzLogin');
// Starting the session

session_set_cookie_params(2*7*24*60*60);
// Making the cookie live for 2 weeks

session_start();

if (isset($_SESSION["id"]))
{
	$session_id = $_SESSION["id"];
}
else
{
	$session_id = null;
}

if (isset($_SESSION["usr"]))
{
	$session_usr = $_SESSION["usr"];

}
else
{
	$session_usr = null;
}

if (isset($_SESSION["msg"]))
{
	$session_msg = $_SESSION["msg"];
}
else
{
	$session_msg = null;
}

if (isset($_POST["submit"]))
{
	$submit = $_POST["submit"];
}
else
{
	$submit = null;
}



if($session_id && !isset($_COOKIE['tzRemember']) && !$_SESSION['rememberMe'])
{
	// If you are logged in, but you don't have the tzRemember cookie (browser restart)
	// and you have not checked the rememberMe checkbox:

	$_SESSION = array();
 
	
	// Destroy the session
}



if($submit=='Login')
{
	// Checking whether the Login form has been submitted
	
	$err = array();
	// Will hold our errors
	
	
	if(!$_POST['username'] || !$_POST['password'])
		$err[] = 'All the fields must be filled !';
	
	if(!count($err))
	{
		$username = mysql_real_escape_string($_POST['username']);
		$pass = mysql_real_escape_string($_POST['password']);
		$remember = (int)$_POST['rememberMe'];
		
		// Escaping all input data

		$pick="SELECT * FROM accounts where username = '{$username}'";
		$res = mysqli_query($link,$pick);	
		
		// if(!$res)
		//{
		//	$err[] = "No User exists with this Username!";
		//}
		
			$row = mysqli_fetch_assoc($res);
			if (!($row["password"] == $pass))
			{
				$err[] = "Wrong Username/Password Entered";
			}
			else
			{
				$_SESSION["usr"] = $row["username"];
				$_SESSION["id"] = $row["user_id"];
				if ($_POST["rememberMe"] == 1)
				{
					$_SESSION['rememberMe'] = 1;
				}
			}
		

	}
	
	if(count($err))
	{
		$_SESSION['msg']['login-err'] = implode('<br />',$err);
	// Save the error messages in the session
		header("Location: demojak.php");
		exit;
	}
	else
	{
		header("Location: new2.php");
		exit;
	}
	

}
else if($submit=='Register')
{
	// If the Register form has been submitted
	
	$err = array();
	
	if(!$_POST['username'] || !$_POST['password'] || !$_POST['mobile']  ||  !$_POST['email'])
	{
		$err[] = 'All the *fields must be filled !';
	}
	else 
	if(strlen($_POST['username'])<4 || strlen($_POST['username'])>32)
	{
		$err[]='Username must be between 3 and 32 characters!';
	}
	else
	if(preg_match('/[^a-z0-9\-\_\.]+/i',$_POST['username']))
	{
		$err[]='Username contains invalid characters!';
	}
	else
	if(!checkEmail($_POST['email']))
	{
		$err[]='Invalid email id!';
	}
	
	if(!count($err))
	{
		// If there are no errors
		
		$email = mysql_real_escape_string($_POST['email']);
		$user = mysql_real_escape_string($_POST['username']);
		$pass = mysql_real_escape_string($_POST['password']);
		$mobile = mysql_real_escape_string($_POST['mobile']);
		$location = mysql_real_escape_string($_POST['location']);
		$gender = mysql_real_escape_string($_POST['gender']);
		// Escape the input data

		//Chk for Existing Username
		$query = "select * from accounts";
		$r = mysqli_query($link, $query);
		if (!$r) { die("Database query failed"); }
		$counted = mysqli_num_rows($r);
		$free = "free"; // free to enter value in db
		$query = null;
		$r = null;

		if(!$_POST['username'] || !$_POST['password'] || !$_POST['mobile']  ||  !$_POST['email'])
		$err[] = 'All the fields must be filled !';


		if(!count($err))
		{
			for ($count = 1; $count<=$counted; $count++)
			{
				$query = "select * from accounts where user_id = '{$count}'";
				$r = mysqli_query($link, $query);
				if (!$r) { die("Database query failed"); }
				$usercheck = mysqli_fetch_assoc($r);

				if ($usercheck["username"] == $user)
				{
					$free = null;
					$err[]='Username already taken!';
					break 1;
				}

				if ($usercheck["email"] == $email)
				{
					$free = null;
					$err[]='This email address already has a username!';
					break 1;
				}

				if ($usercheck["mobile"] == $mobile)
				{
					$free = nullx	;
					$err[]='This mobile number already has a username!';
					break 1;
				}
			}
		}	

		

		$query = null;
		// Escape the input data
		if ($free === "free")	// free to enter values in database
		{	
			$query = "insert into accounts ( ";
			$query .= "username, email, password,  gender, mobile";
			$query .= ") values ( ";
			$query .= "'{$user}', '{$email}', '{$pass}', '{$gender}', '{$mobile}')";

			$result = mysqli_query($link, $query);

			if(mysqli_affected_rows($link))
			{
				$_SESSION['msg']['reg-success']="You are registered !" ;
				$err[]=null;
				$query =null;
				$query = "select * from accounts  where username = '{$user}' ";
				$r = mysqli_query($link, $query);
				if (!$r) { die("Database query failed"); }
				$buk=mysqli_fetch_assoc($r);
				$bukid=$buk["user_id"];

				
				$desc=mysql_real_escape_string($_POST['desc']);
				$que = "insert into book (user_id,cover) values ('{$bukid}','{$desc}')";
				$red=mysqli_query($link, $que);
				if (!$red) { die("Database query failed"); }
				
			}		

		}

			
	}

	if(count($err))
	{
		$_SESSION['msg']['reg-err'] = implode('<br />',$err);
	}	
	
		header("Location: demojak.php");
		exit;
	
}

$script = '';

if($session_msg)
{
	// The script below shows the sliding panel on page load
	
	$script = '
	<script type="text/javascript">
	
		$(function(){
		
			$("div#panel").show();
			$("#toggle a").toggle();
		});
	
	</script>';
	
}
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Smart ScrapBook</title>

	 
    <link rel="stylesheet" type="text/css" href="css/slide.css" media="screen" />
    <link rel="stylesheet" type="text/css" href="css/superslides.css" media="screen"/>
    
    <script type="text/javascript" src="js/jquery.min.js"></script>
    
    <script src="js/slide.js" type="text/javascript"></script>
    <script src="js/jquery.superslides.min.js" type="text/javascript"></script>
    <script src="js/jquery.animate-enhanced.min.js" type="text/javascript"></script>
    <?php echo $script; ?>
</head>

<body>

	<div style="background-color:#CCC ; position:relative; height:100px; width:auto; opacity:0.1"></div>

<div id="slides">
    <div class="slides-container">
   
      <img src="images/slide_02.jpg" alt="Cinelli" height="200">
      <img src="images/slide_04.jpg" width="1024" height="200" alt="Surly">
      <img src="images/cinelli-front.jpeg" width="1024" height="683" alt="Cinelli">
      <img src="images/affinity.jpeg" width="1024" height="685" alt="Affinity">
  
    </div>


    <nav class="slides-navigation">
      <a href="#" class="next">Next</a>
      <a href="#" class="prev">Previous</a>
    </nav>
 </div>

<!-- Panel -->
<div id="toppanel">
	<div id="panel">
		<div class="content clearfix">
			<div class="left">
				<h1>Smart Scrapbook</h1>
				<h2>Where You Meet Yourself</h2>		
				
			</div>
            
            
            <?php
			
			if(!$session_id):
			
			?>
            
			<div class="left">
				<!-- Login Form -->
				<form class="clearfix" action="" method="post">
					<h1>Member Login</h1>
                    
                    <?php
						
						if(isset($_SESSION['msg']['login-err']))
						{
							echo '<div class="err">'.$_SESSION['msg']['login-err'].'</div>';
							unset($_SESSION['msg']['login-err']);
						}
					?>
					
					<label class="grey" for="username">Username: </label>
					<input class="field" type="text" name="username" id="username" value="" size="23" />
					<label class="grey" for="password">Password:</label>
					<input class="field" type="password" name="password" id="password" size="23" />
	            	<label><input name="rememberMe" id="rememberMe" type="checkbox" checked="checked" value="1" /> &nbsp;Remember me</label>
        			<div class="clear">
        			</div>
					<input type="submit" name="submit" value="Login" class="bt_login" />
				</form>
			</div>
			<div class="left right">			
				<!-- Register Form -->
				<form action="" method="post">
					<h1>Not a member yet? Sign Up!</h1>		
                    
                    <?php
						
						if(isset($_SESSION['msg']['reg-err']))
						{
							echo '<div class="err">'.$_SESSION['msg']['reg-err'].'</div>';
							unset($_SESSION['msg']['reg-err']);
						}
						
						if(isset($_SESSION['msg']['reg-success']))
						{
							echo '<div class="success">'.$_SESSION['msg']['reg-success'].'</div>';
							unset($_SESSION['msg']['reg-success']);
						}
					?>
                    		
					<label class="grey" for="username">*Username:</label>
					<input class="field" type="text" name="username" id="username" value="" size="23" />
					
					<label class="grey" for="password">*Password:</label>
					<input class="field" type="password" name="password" id="password" size="23" />

					<label class="grey" for="email">*Email:</label>
					<input class="field" type="text" name="email" id="email" size="23" />
					

					<label class="grey" for="mobile">*Mobile:</label>
					<input class="field" type="text" name="mobile" id="mobile" size="23" />

					<label class="grey" for="mobile">*Book Cover:</label>
					<input class="field" type="text" name="desc" id="desc" size="23" />

					<br>
					<label class="grey" for="mobile">*Gender:</label>
					<input type="radio" name="gender" value="male">Male
                    <input type="radio" name="gender" value="female">Female
                    <br>

					<div class="clear">
        			</div>
					<input type="submit" name="submit" value="Register" class="bt_register" />
				</form>
			</div>
            
            <?php
			
			else:
			
			?>
            <!--
            <div class="left">
            
            <h1>Members panel</h1>
            
            <p>You can put member-only data here</p>
            <a href="registered.php">View a special member page</a>
            <p>- or -</p>
            <a href="?logoff">Log off</a>
            
            </div>
            
            <div class="left right">
            </div>
				
			-->
            
            <?php
            endif;
			?>
			
			
		</div>

	</div> <!-- /login -->	

    <!-- The tab on top -->	
	<div class="tab">
		<ul class="login">
	    	<li class="left">&nbsp;</li>
	        <li>Hello Guest!</li>
			<li class="sep">|</li>
			<li id="toggle">
				<a id="open" class="open" href="#"><?php echo $session_id ? 'Open Panel' : 'Log In | Register'; ?></a>
				<a id="close" style="display: none;" class="close" href="#">Close Panel</a>			
			</li>
	    	<li class="right">&nbsp;</li>
		</ul> 
	</div> <!-- / top -->
	
</div> <!--panel -->
<script>
    $(function() {
      $('#slides').superslides({
        hashchange: true,
        play: 2000
      });

      $('#slides').on('mouseenter', function() {
        $(this).superslides('stop');
        console.log('Stopped')
      });
      $('#slides').on('mouseleave', function() {
        $(this).superslides('start');
        console.log('Started')
      });
    });
  </script>

</body>
</html>
