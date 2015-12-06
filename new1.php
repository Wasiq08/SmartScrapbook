
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
	$user_id = $_SESSION["id"];
}
else
{
	$user_id = null;
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

if (isset($_POST["submitbook"]))
{
	$bookadd = $_POST["submitbook"];
}
else
{
	$bookadd = null;
}


if (isset($_POST["submit"]))
{
	$submit = $_POST["submit"];
}
else
{
	$submit = null;
}


if (isset($_POST["submit1"]))
{
	$photoadd = $_POST["submit1"];
}
else
{
	$photoadd = null;
}

if (isset($_REQUEST['upload']))
{
	$videoadd = $_REQUEST['upload'];
}
else
{
	$videoadd = null;
}

if (isset($_SESSION["book_id"]))
{
	$book_id = $_SESSION["book_id"];
}

else
{
	$book_id = 1;
}

if (isset($_POST["cover"]))
{
	$cover = $_POST["cover"];
}
else
{
	$cover = null;
}

if (isset($_POST["desc"]))
{
	$desc = $_POST["desc"];
}
else
{
	$desc= null;
}
if (isset($_POST["newbook"]))
{
	$newbook= $_POST["newbook"];
}
else
{
	$newbook = null;
}


if (isset($_POST["valbook"]))
{
	$valbook = $_POST["valbook"];
}
else
{
	$valbook=null;
}
/*
if ($user_id)
{
$qu = "select * from media where user_id='{$user_id}' and book_id='{$book_id}'";

$r = mysqli_query($link,$qu);
if (!$r) { echo $user_id; }//die("Database query failed"); }
$num_photos = mysqli_num_rows($r);
$num_videos = mysqli_num_rows($r);
}
*/
if($user_id && !isset($_COOKIE['tzRemember']) && !$_SESSION['rememberMe'])
{
	// If you are logged in, but you don't have the tzRemember cookie (browser restart)
	// and you have not checked the rememberMe checkbox:

	$_SESSION = array();
	session_destroy();
	
	// Destroy the session
}

if(isset($_GET['logoff']))
{
	$_SESSION= array();
	session_destroy();
header("Location:demojak.php");
exit;

}


				$query =null;
				$query = "select * from accounts  where username = '{$session_usr}' ";
				$r = mysqli_query($link, $query);
				if (!$r) { die("Database query failed"); }
				$buk=mysqli_fetch_assoc($r);
				$bukid=$buk["user_id"];

				$que = "select * from book where user_id = '{$bukid}'  ";
				$re = mysqli_query($link, $que);
				if (!$re) { die("Database query failed"); }
				$num_books= mysqli_num_rows($re);
				$b=mysqli_fetch_assoc($re);
				$bid=$b["id"];
				$coverper=$b["cover"];

					if($newbook)
					{
					$val=mysql_real_escape_string($_POST['valbook']);
					 $que = "select * from book where id = '$valbook'";
					$re = mysqli_query($link, $que);	
				
				$b=mysqli_fetch_assoc($re);
				$bid=$b["id"];
				$coverper=$b["cover"];
			}
			
				$qu = "select * from media where user_id = '{$bukid}'  ";
				$r = mysqli_query($link, $qu);
				if (!$r) { die("Database query failed"); }
				$num_photos= mysqli_num_rows($r);

$sess=$num_books;
$drop=$num_books;
$list=1;
/*

			if($bookadd)
			{	
				$que = "insert into book (user_id) values ('{$bukid}')";
				$red=mysqli_query($link, $que);
				if (!$red) { die("Database query failed"); }
			}	
*/
?>

<!doctype html>
<html>
<head>
<title>turn.js - The page flip effect for HTML5</title>
<meta name="viewport" content="width = 1000" />
<meta name="apple-mobile-web-app-capable" content="yes" />

<link rel="stylesheet" type="text/css" href="css/slide.css">
<link rel="stylesheet" type="text/css" href="css/turn.css">
<link rel="stylesheet" type="text/css" href="css/popcss.css">
<!-- <link rel="stylesheet" type="text/css" href="http://www.turnjs.com/css/styles.css"> -->

<script type="text/javascript" src="js/jquery-1.10.2.min.js"></script>
<script type="text/javascript" src="js/turn.min.js"></script>
<script src="login_panel/js/slide.js" type="text/javascript"></script>



<script ></script>

<script >

function appendText()
{

<?php

if($bookadd)
{
	if($num_books<5)
	{
		$desc=mysql_real_escape_string($_POST['desc']);
				$que = "insert into book (user_id,cover) values ('{$bukid}','{$desc}')";
				$red=mysqli_query($link, $que);
				if (!$red) { die("Database query failed"); }
				$sess+=1;

			

	}
	

}
				
				


 // $('#thediv').append('<img  id="thebuk" src="css/slide_02.png" width="74" height="78"  hspace="50"> ');    
  /*
$query =null;
				$query = "select * from accounts  where username = '{$session_usr}' ";
				$r = mysqli_query($link, $query);
				if (!$r) { die("Database query failed"); }
				$buk=mysqli_fetch_assoc($r);
				$bukid=$buk["user_id"];
*/
		/*	for ($i=1; $i<=$num_books; $i++)
						{ 
							
							$photocheck = null;
							$query = "select * from book where id = '{$i}'";
							$r = mysqli_query($link, $query);
							$photocheck = mysqli_fetch_assoc($r);

							if ($photocheck['cover'] != '' || $photocheck['cover'] != null)
							{
								$count1++;
							//echo "<img src='css/slide_02.png' width='74' height='78'  hspace='50'>";
						//	}
						}
*/

?>
</script>

<script e="text/javascript" >

function openbook(){

//var x=document.getElementsById("2");
 //if(x.Id==2)

//var element = document.getElementsByClassName("2")[2].id;

//if (element === "2") {
  

//$('#thediv').append('<img  id="thebuk" src="css/slide_02.png" width="74" height="78"  hspace="50"> ');    
//
<?php 
 /*
 		    $que = "select * from book where id = a";
				$re = mysqli_query($link, $que);
				if (!$re) { die("Database query failed"); }
				$num_books= mysqli_num_rows($re);
				
				$b=mysqli_fetch_assoc($re);
				$bid=$b["id"];
				$coverper=$b["cover"];
*/
		?>
}
</script>



<link href="css/component.css" rel="stylesheet" type="text/css" />
<link href="css/default.css" rel="stylesheet" type="text/css" />

<script type="text/javascript" src="js/popjs.js"></script>


</head>
<body>
   
 <div id="toppanel">
	<div id="panel">
		<div class="content clearfix">
			<div class="left">
				<h1>Smart Scrapbook</h1>
				<h2>Where You Meet Yourself</h2>		
				
			</div>
            <div class="left">
            
            <h1>Members panel</h1>
            
            <p>You can put member-only data here</p>
            <a href="">Settings</a>
            <p>- or -</p>
            <a href="new1.php?logoff">Log off</a>
            
            </div>
            
            <div class="left right">
            </div>
            
		</div>
	</div> <!-- /login -->	

    <!-- The tab on top -->	
	<div class="tab">
		<ul class="login">
	    	<li class="left">&nbsp;</li>
	        <li>Welcome <?php echo (isset($_SESSION['usr'])) ?$session_usr: "Guest"?>!</li>
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
    	
			       <!-- <div class="close"> </div> -->
			       	<span class="popup_tooltip">Press Esc to close <span class="arrow"></span></span>
					<div id="popup_content">
				   	<form action="" method="POST" name="myForm" id="myForm">
							<h2>Add a new Scrapbook!</h2>
	                
					     	<label>Book Cover    : </label>
					        <input type="text" name="desc" id="desc"/><br><br>
					   <!--     <label> Cover Page :</label>
					        <input type="file" name="cover" id="cover"/><br><br>
					  -->      <input type="submit" style="float:right"; id= "create" name="submitbook" value="Create" onclick="appendText();"/><br>
					      <input type ="radio" 
					      <?php
					     for ($i=1; $i<$sess; $i++)
						{ 
							
							
							echo "< input type ='radio' >$i ";
							
						//	}
						}	
						?>
						/>
					       <!-- <img   src="css/slide_02.png"style="float:right"; width="44" height="48" onclick="appendText();" >
					   -->
					    </form>
					
						
				      		  <!-- <?php
				      		
				      	//	$query = "select * from accounts  where username = '{$session_usr}' ";
						//	$r = mysqli_query($link, $query);
						//	if (!$r) { die("Database query failed"); }
						//	$buk=mysqli_fetch_assoc($r);
						///	$bukid=$buk["user_id"];

						//	$query = "insert into book (user_id) values ('{$bukid}')";
						//	$red= mysqli_query($link, $query);
						//	if (!$r) { die("Database query failed"); }
							
							
				      		?>
				     		--> 
		     		 </div>
    	
			    </div>	
			   <!--  <div class="loader"></div> -->
		      	 	<div id="backgroundPopup"></div>
</ul>
<div id="viewport"
<header>
	<nav>
		<a href="" class="on"></a>
		
	</nav>v
</header>

>




<div id="controllers"> <!-- Used for malkig center-->
	<div class="pages shadows" id="magazine"> <!-- Design of book-->
		
		<!-- Home -->
		<div  style="background-color:#3366CC" style="font-family:Arial">
			<p style="font-family:Calibri Light" >My Scapbook</p>
			<p  style="font-family:OptimusPrinceps" style="font-size:large"><b><?php echo $coverper?></b></p>
<!--<p ><a href=""  style="font-family:Calibri Light">SSB YOUDEV</a></p>
-->

		</div>
		<div> 
			<div class="page-content">
				<h1>Upload Photos</h1>
				<!---PICTURES UPLOAD KA CODE IDER DALNA -->
<?php

					if ($num_photos > 0)		// Check if there are some photos in database
					{
						$count1 = 0;
						
							?>
							<div style="width:400px;height:400px;line-height:3em;overflow:auto;padding:25px; z-index:1">

						<?php
						for ($i=1; $i<=$num_photos; $i++)
						{
							$photocheck = null;
							$query = "select * from media where id = '{$i}'";
							$r = mysqli_query($link, $query);
							$photocheck = mysqli_fetch_assoc($r);

							if ($photocheck['photo'] != '' || $photocheck['photo'] != null)
							{
								$count1++;
							echo "<img src='" . $photocheck["photo"]. "' width='400' height='400'><br/><br/>";
							}
						}
						echo "</div>";
					}
					else
					{
						$num_photos = 1;
					}
if ($photoadd)
{
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

      	
		$photo_id = $num_photos + 1;

        $idname = "upload/" ."img" . $user_id . $book_id . $photo_id . "." . $extension;
      	move_uploaded_file($_FILES["file"]["tmp_name"],"upload/" . $_FILES["file"]["name"]);
      	rename("upload/" . $_FILES["file"]["name"], "{$idname}");
      //echo "Stored in: " . "upload/" . $_FILES["file"]["name"];
      	


        $query = "insert into media ( ";
		$query .= "user_id, book_id ,photo";
		$query .= ") values ( ";
		$query .= "'{$user_id}','{$book_id}','{$idname}')";

					$result = mysqli_query($link, $query);

					if(mysqli_affected_rows($link) && $result)
					{
						//$_SESSION["book_id"] = $_SESSION["book_id"] + 1;
						echo "<img src='" . $idname. "' width='200' height='200'>";
						echo "1 photo inserted at '{$photo_id}'";
						header("Location: new1.php");
					}
        
      }
    }
  }
else
  {
  echo "Invalid file";
  }
}
?>
			</div>
		</div>

		<!-- Quick Reference -->

		<div> 
			<div class="page-content">

			<h2>Upload Photo</h2>
			



			<form action="Book.php#usage" method="post" enctype="multipart/form-data">
				<input type="file" name="file" id="file" class="uploadphoto"/><br/><br/>
				<input type="submit" name="submit1" value="Upload Photo" />				
			</form>
						
			</div>
		</div>

		<!-- Usage -->
		
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
	<div id="thediv">
		
			<label>1</label> <img  class="iml" id='1' src="css/slide_02.png" width='98' height='98' hspace="50" >
			
			<?php
			$a=2;
			$query =null;
				$query = "select * from accounts  where username = '{$session_usr}' ";
				$r = mysqli_query($link, $query);
				if (!$r) { die("Database query failed"); }
				$buk=mysqli_fetch_assoc($r);
				$bukid=$buk["user_id"];

			for ($i=1; $i<$sess; $i++)
						{ $a=$a+1;
							/*
							$photocheck = null;
							$query = "select * from book where id = '{$i}'";
							$r = mysqli_query($link, $query);
							$photocheck = mysqli_fetch_assoc($r);

							if ($photocheck['cover'] != '' || $photocheck['cover'] != null)
							{
								$count1++;*/
							
							echo $i+1;
							echo "<img src='css/slide_02.png' class='$a' id='$a' width='98' height='98' hspace='50' onclick='openbook();'>";
							
						//	}
						}
						?>

    </div>
<label>Open Book   : </label><input type= "text" name="valbook" id="valbook">     <input type="submit"id= "newbook" name="newbook" value="Open" /><br>
					     
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


<script src="js/lib/recorder.js"></script>
    <script src="js/recordLive.js"></script>
    <script type="text/javascript">

</body>
</html>
