
<?php

define('INCLUDE_CHECK',true);

require 'connect.php';
require 'functions.php';


				$query =null;
				$query = "select * from accounts  where username = '{$session_usr}' ";
				$r = mysqli_query($link, $query);
				if (!$r) { die("Database query failed"); }
				$buk=mysqli_fetch_assoc($r);
				$bukid=$buk["user_id"];

				$que = "select * from book where user_id = '{$bukid}' ";
				$re = mysqli_query($link, $que);
				if (!$re) { die("Database query failed"); }
				$num_books= mysqli_num_rows($re);

				$que = "insert into book (user_id) values ('{$bukid}')";
				$red=mysqli_query($link, $que);
				if (!$red) { die("Database query failed"); }
				$sess+=1;

				?>