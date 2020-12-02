<br />
<?php<br />
	$conn=new SQLite3('db/db_user') or die("Unable to open database!");<br />
	$query="CREATE TABLE IF NOT EXISTS `user`(user_id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, username TEXT, password TEXT, name TEXT)";<br />
	$conn->exec($query);</p>
<p>	$query=$conn->query("SELECT COUNT(*) as count FROM `user`");<br />
	$row=$query->fetchArray();<br />
	$countRow=$row['count'];</p>
<p>	if($countRow == 0){<br />
		$conn->exec("INSERT INTO `user` (username, password, name) VALUES('admin', 'admin', 'Administrator')");<br />
	}<br />
?><br />