<?php
/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
$link = mysqli_connect("localhost", "id6578205_fyp", "abcd1234", "id6578205_fyp'");
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
 
// Escape user inputs for security
$profile_pic = mysqli_real_escape_string($link, $_REQUEST['profile_pic']);
$first_name = mysqli_real_escape_string($link, $_REQUEST['first_name']);
$last_name = mysqli_real_escape_string($link, $_REQUEST['last_name']);
$gender = mysqli_real_escape_string($link, $_REQUEST['gender']);
$dob = mysqli_real_escape_string($link, $_REQUEST['dob']);
$account_type = mysqli_real_escape_string($link, $_REQUEST['account_type']);
$email = mysqli_real_escape_string($link, $_REQUEST['email']);
$postal_address = mysqli_real_escape_string($link, $_REQUEST['post_address']);
$about_me = mysqli_real_escape_string($link, $_REQUEST['about_me']);

 
// Attempt insert query execution
$sql = "INSERT INTO users (profile_pic, first_name, last_name, gender, dob, account_type, email, post_address, about_me) VALUES ('$profile_pic','$first_name', '$last_name', '$gender', '$dob,' '$accont_type' '$email' '$post_address', '$about_me')";
if(mysqli_query($link, $sql)){
    echo "Records added successfully.";
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
 
// Close connection
mysqli_close($link);
?>
