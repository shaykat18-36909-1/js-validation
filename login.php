<?php

require_once('connection.php');
$username = $password = $pwd = '';

$email = $_POST['username'];
$pwd = $_POST['password'];
$password = ($pwd);
$sql = "SELECT * FROM user WHERE username='$username' AND Password='$password'";
$result = mysqli_query($conn, $sql);
if(mysqli_num_rows($result) > 0)
{
	while($row = mysqli_fetch_assoc($result))
	{
		$id = $row["ID"];
		$email = $row["username"];
		session_start();
		$_SESSION['id'] = $id;
		$_SESSION['email'] = $username;
	}
	header("Location: welcome.php");
}
function validation(){
	var input_username = document.connection.php("#input_text");
	var input_password = document.connection.php("#input_password");
	var error_msg = document.connection.php(".error_msg");

	if(input_username.value.length <= 3 || input_password.value.length <= 3 ){
		error_msg.style.display = "inline-block";
		input_text.style.border = "1px solid #f74040";
		input_password.style.border = "1px solid #f74040";
		return false;
	}
	else{
    alert("form submitted successfully")
		return true;
	}
	
}

var input_fields = document.querySelectorAll(".input");
var login_btn = document.querySelector("#login_btn");

input_fields.forEach(function(input_item){
	input_item.addEventListener("input", function(){
		if(input_item.value.length > 3){
			login_btn.disabled = false;
			login_btn.className = "btn enabled"
		}
	})
})
?>