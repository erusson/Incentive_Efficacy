<?php

# define database connection parameters
define('DB_NAME', 'egWlLAZC6J');
define('DB_USER', 'egWlLAZC6J');
define('DB_PASSWORD', ''); # fill in locally 
define('DB_HOST', 'remotemysql.com');

# connecting to the server hosted on remotemysql
$link = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD);

# throw error if cant connect
if (!$link) {
  die('Could not connect: ' . mysql_error());
}

# selecting the database 
$db_selected = mysqli_select_db($link, DB_NAME);

# throw an error if cant find database
if (!$db_selected) {
  die('Cant use ' . DB_NAME . ': ' . mysql_error());
}

# show everything above ran 
echo 'Connected successfully';

$value = $_POST['clicks'];

$time = $_POST['formattedTime'];

$timestmp = $_POST['timestmp'];

$sql = "INSERT INTO altruism (clicks, runtime, timestmp) VALUES ('$value', '$time', '$timestmp')";

# throw error for bad query, otherwise fills datatable 
if (!mysqli_query($link, $sql)) {
  die('Error storing data: ' . mysql_error());
}

# closing connection to server
mysqli_close($link);

?>



