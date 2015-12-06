<?php
if($bookadd)
{
				
				$query =null;
				$query = "select * from accounts  where username = '{$session_usr}' ";
				$r = mysqli_query($link, $query);
				if (!$r) { die("Database query failed"); }
				$buk=mysqli_fetch_assoc($r);
				$bukid=$buk["user_id"];

				$que = "insert into book (user_id) values ('{$bukid}')";
				$red=mysqli_query($link, $que);
				if (!$red) { die("Database query failed"); }
				
}


?>