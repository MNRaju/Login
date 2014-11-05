<?php 
//To Connect the database.
mysql_connect("localhost","root","");
mysql_select_db("mydatabase");

//To Select no of rows.
$query="SELECT * FROM users";
$send=mysql_query($query);
while($row = mysql_fetch_array($result))
{
echo $row['usrname'] . " " . $row['email'] . " " . $row['date'];   
}



//To insert the query.
$query="INSERT INTO users(username,email,date) VALUES('".$_POST['username']."','".$_POST['email']."',now())";
$send=mysql_query($query);
//It is used to get the last insert id
$id=mysql_insert_id();

//TO update the values.
$query="UPDATE users SET username='".$username."' , email='".$email."' , date=now() WHERE id='".$id."'";
$send=mysql_query($query);

//To select the rows useing join.
$query="SELECT u.*,c.* FROM users u INNER JOIN categories c ON u.catid=c.id";
$send=mysql_query($query);




?>