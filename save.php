<?php
$name = $_POST['name'];
$sem = $_POST['sem'];
$mail=$_POST['mail'];
$gender=$_POST['Gender'];
$tel=$_POST['tel'];
$agree = isset($_POST['agree']) ? "Yes" : "No";



$docContent = "Name: $name\nGender: $gender\n Sem:$sem \n Mail:$mail \n Tel:$tel \n \n ";
file_put_contents("user_data.doc", $docContent, FILE_APPEND);

echo "Data saved successfully!";
?>
