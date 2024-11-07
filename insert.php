<?php

$email =$_POST['email'];
$phone =$_POST['phone'];
$first =$_POST['first'];
$second =$_POST['second'];
$firsta=$first.$second;
$conn = mysqli_connect('localhost','provide7_tino','Provstats@2023','provide7_stats');

$sql="INSERT INTO `newsletter` (firstname,email,phone)
VALUES ('$firsta','$email','$phone')";

$run= mysqli_query($conn,$sql);

if($run){
	
     
echo " <center><div style='display:flex; justify-content: center;align-items:center;font-size:30px; text-align: center; background-color:#FFF8CA;width:500px;height:150px;color:black; border-radius: 10px; font-family: Montserrat'> <p>  THANK YOU FOR JOINING THE MOMENTS FAMILY! </p></div> <button style='padding:10px;'> <a style='text-decoration:none; color: #FFF8CA' href='index.html'> Return Home</a> </button></center>
 ";	 
	
	
}else {
	

echo " <center><div style='background-color:rgb(246,248,250);width:250px;height:150px;color:black;'> <p>  PLEASE TRY AGAIN LATER </p></div> <a href='index.html'> Return Home</a></center>
 ";	 
	
	
}

?>