<html>

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


if (isset($_SESSION['id']))
{
	$user_id = $_SESSION['id'];
}
else
{
	$user_id = null;
}

if (isset($_SESSION['usr']))
{
	$session_usr = $_SESSION['usr'];
}
else
{
	$session_usr = null;
}

if (isset($_SESSION['book_id']))
{
	$book_id = $_SESSION['book_id'];
}

else
{
	$book_id = 1;
}

if ($user_id)
{

	$qu = "select * from voice";
	$r = mysqli_query($link,$qu);
	$id = mysqli_num_rows($r);
	$id = $id + 1;

	if(isset($_FILES['file']) and !$_FILES['file']['error']){
    $fname = "upload/" . "voice" . $book_id . $id . ".wav";

    move_uploaded_file($_FILES['file']['tmp_name'], $fname);
	}
$qu2 = "insert into voice (user_id, book_id, voice) values('{$user_id}','{$book_id}','{$fname}')";
$r = mysqli_query($link,$qu2);
}
?>


<?php


$cok = $_SESSION["value1"];
echo $cok;

?>





<!--

	<script src="js/lib/recorder.js"></script>
    <script src="js/recordLive.js"></script>
    <script type="text/javascript">
//document.writeCookie("voice",57,10);
//recorder.clear();

//var abc = readCookie("voice");

//document.write("abc");

-->
    </html>