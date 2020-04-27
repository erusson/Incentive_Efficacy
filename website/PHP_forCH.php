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
  die('Could not connect: ' . mysqli_error());
}

# selecting the database 
$db_selected = mysqli_select_db($link, DB_NAME);

# throw an error if cant find database
if (!$db_selected) {
  die('Cant use ' . DB_NAME . ': ' . mysqli_error());
}

# show everything above ran 
echo 'On behalf of Emma, JJ, and Isaac, thanks for submitting! :) Your confirmation email will arrive within the next couple weeks. Please close this tab.';

// # retrieving the total_clicks from html by name attribute
$value = intval($_POST['total_clicks']);

// # retrieve email from html by name attribute
$email = $_POST['email'];

$name = $_POST['person_name'];

// # retrieve charity_name info from html by name attribute
$char = $_POST['charity_name'];

// # retrieve charity_name info from html by name attribute
$char_url = $_POST['charity_website'];

$time = $_POST['formattedTime'];

$timestmp = $_POST['timestmp'];

$sql = "INSERT INTO altruism (clicks, email, person_name, charity_name, charity_url, runtime, timestmp) VALUES ('$value','$email', '$name', '$char','$char_url', '$time', '$timestmp')";

# throw error for bad query, otherwise fills datatable 
if (!mysqli_query($link, $sql)) {
  die('Error storing data: ' . mysqli_error($link));
}

# closing connection to server
mysqli_close($link);

?>



