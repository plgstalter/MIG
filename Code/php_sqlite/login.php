<br />
<?php<br />
	require_once 'conn.php';</p>
<p>	if(ISSET($_POST['login'])){<br />
		$username = $_POST['username'];<br />
		$password = $_POST['password'];</p>
<p>		$query=$conn->query("SELECT COUNT(*) as count FROM `user` WHERE `username`='$username' AND `password`='$password'");<br />
		$row=$query->fetchArray();<br />
		$count=$row['count'];</p>
<p>		if($count > 0){<br />
			echo "<div class='alert alert-success'>Login successful</div>";<br />
		}else{<br />
			echo "<div class='alert alert-danger'>Invalid username or password</div>";<br />
		}<br />
	}<br />
?><br />