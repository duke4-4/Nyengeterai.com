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
	
 echo "
<center>
  <div style='display: flex; flex-direction: column; align-items: center; background-color: #FFF8CA; width: 500px; border-radius: 10px; font-family: Montserrat; box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.2);'>
    <!-- Image at the top -->
    <img src='your-image.jpg' alt='Thank You' style='width: 100%; border-top-left-radius: 10px; border-top-right-radius: 10px;'>
    
    <!-- Thank you message -->
    <div style='padding: 20px; text-align: center; color: black; font-size: 24px;'>
      <p>THANK YOU FOR JOINING THE MOMENTS FAMILY!</p>
    </div>
    
    <!-- Buttons at the bottom -->
    <div style='display: flex; justify-content: space-around; width: 100%; padding: 10px 0;'>
      <button style='padding: 10px 20px; background-color: black; border: none; border-radius: 5px;'>
        <a href='index.html' style='text-decoration: none; color: #FFF8CA;'>Return Home</a>
      </button>
      <button style='padding: 10px 20px; background-color: black; border: none; border-radius: 5px;'>
        <a href='store.html' style='text-decoration: none; color: #FFF8CA;'>Check Out My Store</a>
      </button>
    </div>
  </div>
</center>
";
 
	
	
}else {
	

echo " <center><div style='background-color:rgb(246,248,250);width:250px;height:150px;color:black;'> <p>  PLEASE TRY AGAIN LATER </p></div> <a href='index.html'> Return Home</a></center>
 ";	 
	
	
}

?>