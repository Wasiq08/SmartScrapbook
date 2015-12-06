<?php

define('INCLUDE_CHECK',true);

require 'connect.php';
require 'functions.php';
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
?>
<!doctype html>
<html>
<head>
<title>Scrapbook 1</title>
<meta name="viewport" content="width = 1000" />
<meta name="apple-mobile-web-app-capable" content="yes" />

<link rel="stylesheet" type="text/css" href="css/turn.css">
<link rel="stylesheet" type="text/css" href="css/slide.css">
<link rel="stylesheet" type="text/css" href="css/popcss.css">
<!-- <link rel="stylesheet" type="text/css" href="http://www.turnjs.com/css/styles.css"> -->

<script type="text/javascript" src="js/jquery-1.10.2.min.js"></script>
<script type="text/javascript" src="js/turn.min.js"></script>
<script src="login_panel/js/slide.js" type="text/javascript"></script>
<script type="text/javascript" src="js/popjs.js"></script>
<script>
function myFunction()
{
document.getElementById("myDIV").style.overflow = "scroll";
}
</script>



<link href="css/component.css" rel="stylesheet" type="text/css" />
<link href="css/default.css" rel="stylesheet" type="text/css" />


</head>
<body style="background-color:#A8A8A8 ">

<!-- Panel -->
<div id="toppanel">
	<div id="panel">
		<div class="content clearfix">
			<div class="left">
				<h1>Smart Scrapbook</h1>
				<h2>Where You Meet Yourself</h2>		
				
			</div>
            
            
            <!-- log in form
			<div class="left">
				
				
				<form class="clearfix" action="" method="post">
					<h1>Member Login</h1>
                    
                    <?php
						/*
						if(isset($_SESSION['msg']['login-err']))
						{
							echo '<div class="err">'.$_SESSION['msg']['login-err'].'</div>';
							unset($_SESSION['msg']['login-err']);
						}
						*/
					?>
					
					<label class="grey" for="username">Username:</label>
					<input class="field" type="text" name="username" id="username" value="" size="23" />
					<label class="grey" for="password">Password:</label>
					<input class="field" type="password" name="password" id="password" size="23" />
	            	<label><input name="rememberMe" id="rememberMe" type="checkbox" checked="checked" value="1" /> &nbsp;Remember me</label>
        			<div class="clear"></div>
					<input type="submit" name="submit" value="Login" class="bt_login" />
				</form>

			</div>

			<div class="left right">			
				
				<form action="" method="post">
					<h1>Not a member yet? Sign Up!</h1>		
                    
                    <?php
						/*
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
						*/
					?>
                    		
					<label class="grey" for="username">Username:</label>
					<input class="field" type="text" name="username" id="username" value="" size="23" />
					
					<label class="grey" for="password">Password:</label>
					<input class="field" type="text" name="password" id="password" size="23" />

					<label class="grey" for="email">Email:</label>
					<input class="field" type="text" name="email" id="email" size="23" />

					<label class="grey" for="location">Location:</label>
					<input class="field" type="text" name="location" id="location" size="23" />

					<label class="grey" for="mobile">Mobile:</label>
					<input class="field" type="text" name="mobile" id="mobile" size="23" />

					<br>
					<input type="radio" name="gender" value="male">Male
                    <input type="radio" name="gender" value="female">Female
                    <br>

					<label>Your password will be e-mailed to you.</label>
					<input type="submit" name="submit" value="Register" class="bt_register" />
				</form>
			</div>
             -->         
            <div class="left">
            
            <h1>Members panel</h1>
            
            <p>You can put member-only data here</p>
            <a href="">Settings</a>
            <p>- or -</p>
            <a href="demojak.php">Log off</a>
            <?php
            	session_destroy();



            ?>
            </div>
            
            <div class="left right">
            </div>
            
		</div>
	</div> <!-- /login -->	

    <!-- The tab on top -->	
	<div class="tab">
		<ul class="login">
	    	<li class="left">&nbsp;</li>
	        <li>Welcome <?php echo (isset($_SESSION['usr'])) ? "Junaid" : "Guest"?>!</li>
			<li class="sep">|</li>
			<li id="toggle">
				<a id="open" class="open" href="#">Profile</a>
				<a id="close" style="display: none;" class="close" href="#">Close Panel</a>			
			</li>
	    	<li class="right">&nbsp;</li>
		</ul> 
	</div> <!-- / top -->
	
</div> <!--panel -->

<ul class="cbp-vimenu">
				<li><a href="#" class="icon-logo">Logo</a></li>
				<li><a href="#photos1" class="icon-archive">Archive</a></li>
				<li><a href="#videos1" class="icon-search">Search</a></li>
				<li><a href="#voice1" class="icon-pencil">Pencil</a></li>
				
				<li><a href="#events1" class="icon-location">Location</a></li>
				<li><a href="#ideas1" class="icon-images">Images</a></li>
				<li><a href="" class="icon-download" >Download</a></li>
				<div id="Popup"> 
    	
			        <div class="close"></div>
			       	<span class="popup_tooltip">Press Esc to close <span class="arrow"></span></span>
					<div id="popup_content">
				     	<label>Book Title    : </label>
				        <input type="text" name="book" id="set"/><br><br>
				        <label> Cover Page :</label>
				        <input type="file" name="cover_page"/><br><br>
				        <input type="submit" style="float:right"; name="Go" value="Create" onClick="transfer();"/><br>

		     		 </div>
    	
			    </div>	
		      	 	<div id="backgroundPopup"></div>
</ul>

<div id="viewport"

<header>
	<nav>
		<a href="#" class="on"></a>
	
	</nav>
</header>

>

<div id="controllers"> <!-- Used for malkig center-->
	<div class="pages shadows" id="magazine"> <!-- Design of book-->
		
		<!-- Home -->
		<div  style="background-color:#FF9999">
			<p>My Scrapbook 1</p>
			<p><a href="" >www.ssb.com</a></p>
 
    
		<!-- Codes by HTML.am -->
			<div style="width:150px;height:150px;line-height:3em;overflow:auto;padding:5px; z-index:2">
			This 'div' element contains more content than the previous one. Because there's too much text to fit into the box, the box grows scrollbars. 
			</div>

		</div>
		

		<!-- Usage -->
		<div> 
			<div class="page-content">
				<h1>Upload Photos</h1>
				<!---PICTURES UPLOAD KA CODE IDER DALNA -->

					<form action="Book.php" method="post" enctype="multipart/form-data">
					<input type="file" name="file" id="file">
					<input type="submit" name="submit1" value="Upload Photo">
					</form>
					</h1>


					<?php
					
$allowedExts = array("gif", "jpeg", "jpg", "png");
$temp = explode(".", $_FILES["file"]["name"]);
$extension = end($temp);
if ((($_FILES["file"]["type"] == "image/gif")
|| ($_FILES["file"]["type"] == "image/jpeg")
|| ($_FILES["file"]["type"] == "image/jpg")
|| ($_FILES["file"]["type"] == "image/pjpeg")
|| ($_FILES["file"]["type"] == "image/x-png")
|| ($_FILES["file"]["type"] == "image/png"))
|| ($_FILES["file"]["type"] == "image/GIF")
|| ($_FILES["file"]["type"] == "image/JPEG")
|| ($_FILES["file"]["type"] == "image/JPG")
|| ($_FILES["file"]["type"] == "image/PJPEG")
|| ($_FILES["file"]["type"] == "image/X-PNG")
|| ($_FILES["file"]["type"] == "image/PNG")
&& ($_FILES["file"]["size"] < 2000000000000)
&& in_array($extension, $allowedExts))
  {
  if ($_FILES["file"]["error"] > 0)
    {
    echo "Return Code: " . $_FILES["file"]["error"] . "<br>";
    }
  else
    {
    if (file_exists("upload/" . $_FILES["file"]["name"]))
      {
      echo $_FILES["file"]["name"] . " already exists. ";
      }
    else
      {
        
        $qu = "select * from media";
        $r = mysqli_query($link,$qu);
        $photo_id = mysqli_num_rows($r) + 1;

        $idname = "upload/" ."img" . $photo_id . "." . $extension;
      	move_uploaded_file($_FILES["file"]["tmp_name"],"upload/" . $_FILES["file"]["name"]);
      	rename("upload/" . $_FILES["file"]["name"], "{$idname}");
      //echo "Stored in: " . "upload/" . $_FILES["file"]["name"];
      	echo "<img src='" . $idname. "' width='300' height='300'>";


        $query = "insert into media where user_id = {$session_id} and book_id = {$book_id} ( ";
		$query .= "photo";
		$query .= ") values ( ";
		$query .= "'{$idname}')";

					$result = mysqli_query($link, $query);

					if(mysqli_affected_rows($link))
					{
						echo "1 photo inserted";
						$_SESSION["book_id"] = $_SESSION["book_id"] + 1;
					}
        
      }
    }
  }
else
  {
  echo "Invalid file";
  }
?>

				<!-- <div style="clear:both"></div> -->
				<p>My Memorable Clicks</p>
			</div>
		</div>

		<!-- Quick Reference -->

		<div> 
			<div class="page-content">

			<h2>Getting Started</h2>

			<p>Here's an example:</p>

							
				<pre>
					this is style
				</pre>
							

				<pre>
					This is sample
				</pre>


				<pre>
					this is script
				</pre>

			<p>That's it!</p>
			</div>

		</div>

		<!-- Get turn.js 1 -->

		<div> 
			<h1>Upload Videos</h1>

		</div>
		
		<!-- Get turn.js 2 -->

		<div> 
			<div class="page-content">

				<pre>
					Moments of life
				</pre>


			</div>
		 </div>
		

		<!-- Reference 1 -->

		<div>
			<h1>My Voice</h1>
		</div>
		

		<!-- Reference 2 -->
		<div id="ref">
			<div>
			<div class="page-content">
				<h3>Voice</h3>

				<div>
					<p> Creates an instance of voice.</p>
			    </div>
				
				<div>
					<p>Scheme used for calling methods or getting properties</p>
				</div>
				
					<h3>Properties</h3>

				</div>
			</div>
		</div>	

		<div>
			<h1>My Ideas</h1>
		</div>
		
		<div>
			<div class="page-content">

				<pre>
Moments of life
				</pre>


			</div>
		</div>



		<!-- events  -->
		<div>
			<h1>My Events</h1>
		</div>
		
		<div>
			<div class="page-content">

				<pre>
					<button  onclick="myFunction()">My name</button>
						
				</pre>


			</div>
		</div>
		<div> 
			<div class="page-content">

				<pre>











			Memories are sweet














				</pre>


			</div>

		</div>
	</div>

	<div id="next"> <i></i> </div>
	<div id="previous"> <i></i> </div>

	<div id="shadow-page"></div>
</div>



<footer>
 <a href="http://www.twitter.com/blasten" target="_blank">@Scrapbook</a>
<!--<<a href="#" class="popup">Add a Book</a>
<div id="controllers1"> </div>
 <div id="Popup"> 
    	
		        <div class="close"></div>
		       	<span class="popup_tooltip">Press Esc to close <span class="arrow"></span></span>
				<div id="popup_content">
		     	<label>Book Title    : </label>
		        <input type="text" name="book" id="set"/><br><br>
		        <label> Cover Page :</label>
		        <input type="file" name="cover_page"/><br><br>
		        <input type="submit" style="float:right"; name="Go" value="Create" onClick="transfer();"/><br>

		      </div>
    
    </div>
    
	<div class="loader"></div>
   	<div id="backgroundPopup"></div>	
-->
</footer>

</div>



<script type="text/javascript">

	window.pages = ['home', 'photos1', 'photos2', 'videos1', 'videos2', 'voice1', 'voice2', 'events1','events2','ideas1','ideas2',  'last'];


	function getURL() {
		
		return window.location.href.split('#').shift();

	}

	function getHash() {
		
		return window.location.hash.slice(1);

	}

	function setControllPos() {

		var view = $('#magazine').turn('view');

		if (view[0]) $('#previous').addClass('visible');
		else $('#previous').removeClass('visible');

		if (view[1]) $('#next').addClass('visible');
		else $('#next').removeClass('visible');

	}

	function checkHash(hash) {

		var hash = getHash(), k;

		if ((k=jQuery.inArray(hash, pages))!=-1) {
			$('nav').children().each(function(index, value) { 
				$(value).attr('class', ($(value).attr('href').indexOf(hash)!=-1) ? 'on' : '');
			});
			return k+1;
		}
		
		return 1;
	}


	function rotated() {
		
		return Math.abs(window.orientation)==90;
	
	}

	function isPhone() {
		
		return navigator.userAgent.match(/iPhone/i);

	}

	function resizeViewport() {

		$('#viewport').css({width: $(window).width(), height: (isPhone() && !rotated()) ? 1670 :  $(document).height()});

	}

	function setScroll() {

		if (isPhone())
			window.scrollTo(0, (rotated()) ? $('#magazine').offset().top-6 : 1);

	}

	function moveMagazine(page) {

	var that = $('#magazine'),
			rendered = that.data().done,
			width = that.width(),
			pageWidth = width/2,
/*
			options = {duration: (!rendered) ? 0 : 600, easing: 'easeInOutCubic', complete: function(){ $('#magazine').turn('resize'); }};
*/
			options = {duration: (!rendered) ? 0 : 600, complete: function(){ $('#magazine').turn('resize'); }};


			$('#controllers').stop();

			if ((page==1 || page == that.data().totalPages) && !rotated()) {

				var leftc = ($(window).width()-width)/2,
					leftr = ($(window).width()-pageWidth)/2, 
					leftd = (page==1)? leftr - leftc - pageWidth : leftr - leftc;

				$('#controllers').animate({left: leftd}, options);

			} else
				$('#controllers').animate({left: 0}, options);
	}


	$(document).ready(function() {
	
		/* Turn events */
		$('#magazine').
			bind('turning', function(e, page){

				//Let's do something amazing here

				moveMagazine(page);
			

			}).
			bind('turned', function(e, page, pageObj) {


				var rendered = $(this).data().done;

				if (!rendered) {
					moveMagazine(page);
					$('#controllers').fadeIn();
				} else {
					jQuery.each(pages, function(index, value) {
						if (page==index+1) {
							var newUrl = getURL() + '#' + value;
							window.location.href = newUrl;
							return false;
						}
					});
				}

				setControllPos();
			
				if (page==1) $('#shadow-page').fadeIn('slow');
				else  $('#shadow-page').fadeOut((rendered) ? 'slow' : 0);



		 }).bind('start', function(e, page) {

			if (page==2)
				$('#previous').hide();
			else if (page==$(this).data().totalPages-1)
				$('#next').hide();

		}).bind('end', function(e, page) {

			if (page==2) 
				$('#previous').show();
			else if (page==$(this).data().totalPages-1)
				$('#next').show();

		});


		/* Window events */
		$(window).bind('keydown', function(e){
			
			if (e.keyCode==37) 
				$('#magazine').turn('previous');
			else if (e.keyCode==39)
				$('#magazine').turn('next');

		}).bind('hashchange', function() {

			var page = checkHash();
			$('#magazine').turn('page', page);

		}).bind('touchstart', function(e) {

			var t = e.originalEvent.touches;
			if (t[0]) touchStart = {x: t[0].pageX, y: t[0].pageY};

			touchEnd = null;

		}).bind('touchmove', function(e) {

			var t = e.originalEvent.touches, pos = $('#magazine').offset();

			if (t[0].pageX>pos.left && t[0].pageY>pos.top && t[0].pageX<pos.left+$('#magazine').width() && t[0].pageY<pos.top+$('#magazine').height()) {
				
				if (t.length==1)
				e.preventDefault();
			
				if (t[0]) touchEnd = {x: t[0].pageX, y: t[0].pageY};

			}

		}).bind('touchend', function(e) {

			if (window.touchStart && window.touchEnd) {
				var that = $('#magazine'),
					w = that.width()/2,
					d = {x: touchEnd.x-touchStart.x, y: touchEnd.y-touchStart.y},
					pos = {x: touchStart.x-that.offset().left, y: touchStart.y-that.offset().top};
			
				if (Math.abs(d.y)<100)
				 if (d.x>100 && pos.x<w)
				 	$('#magazine').turn('previous');
				 else if (d.x<100 && pos.x>w)
				 	$('#magazine').turn('next');

			}
		}).resize(function() {
 			
 			$('#magazine').turn('resize');

 			resizeViewport();

		});


		$('#next').click(function(e) {

			$('#magazine').turn('next');
			return false;

		});

		$('#previous').click(function(e) {
			
			$('#magazine').turn('previous');
			return false;

		});

		$('#magazine').children(':first').bind('flip', function() {
			
			 $('#shadow-page').fadeOut('slow');

		}).find('p').fadeOut(0).fadeIn(2000);


		$('body').bind('orientationchange', function() {
			
			resizeViewport();

			setScroll();

			moveMagazine($('#magazine').turn('page'));

		});

		/* Create internal instance */
		
		if ($(window).width()<=1200)
			$('body').addClass('x1024');
	
		$('#magazine').turn({page: checkHash(), shadows: true, acceleration: true});

	

		resizeViewport();

		setScroll();

		
	
	});


</script>


</body>
</html>
