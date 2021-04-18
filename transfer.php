<?php
session_start();
$server="localhost";
$username="root";
$password="";
$con=mysqli_connect($server,$username,$password,"spx_bank");
if(!$con){
    die("Connection failed");
} 


$flag=false;

if (isset($_POST['transfer']))
{
$sender=$_SESSION['sender'];
$receiver=$_POST["reciever"];
$amount=$_POST["amount"];}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">    
<link rel="stylesheet" href="bootstrap.min.css">
<style>
body{
  background-color:#CFF5CD;
}
</style>
</head>
<body>
	<script src="jquery.min.js" type="text/javascript"></script>
	<script src="popper.min.js" type="text/javascript"></script>
	<script src="sweetalert.min.js" type="text/javascript"></script>
</body>
</html>
<?php

$sql = "SELECT balance FROM customer WHERE name='$sender'";
$result = $con->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
 if($amount>$row["balance"] or $row["balance"]-$amount<100){
    echo "<script>swal( 'Transaction Denied','Insufficient Balance!','error' ).then(function() { window. location = 'ViewCustomers.php'; });;</script>";
   
 }
else{
    $sql = "UPDATE `customer` SET balance=(balance-$amount) WHERE Name='$sender'";
    

if ($con->query($sql) === TRUE) {
  $flag=true;
} else {
  echo "Error in updating record: " . $conn->error;
}
 }
 
  }
} else {
  echo "0 results";
} 

if($flag==true){
$sql = "UPDATE `customer` SET balance=(balance+$amount) WHERE name='$receiver'";

if ($con->query($sql) === TRUE) {
  $flag=true;  
  
} else {
  echo "Error in updating record: " . $con->error;
}
}
if($flag==true){
    $sql = "SELECT * from customer where name='$sender'";
    $result = $con-> query($sql);
    while($row = $result->fetch_assoc())
     {
         $sender_ac=$row['account_no'];
 }
  $sql = "SELECT * from customer where name='$receiver'";
    $result = $con-> query($sql);
  while($row = $result->fetch_assoc())
     {
         $receiver_ac=$row['account_no'];
 }    
$sql = "INSERT INTO `transfer`(sender_name,sender_ac_no,receiver_name,receiver_ac_no, amount) VALUES ('$sender','$sender_ac','$receiver','$receiver_ac','$amount')";
if ($con->query($sql) === TRUE) {
} else 
{
  echo "Error updating record: " . $con->error;
}
}

if($flag==true){
echo "<script>swal('Money sent', 'Your transaction was successful','success').then(function() { window. location = 'ViewTransactions.php'; });;</script>";
}
elseif($flag==false)
{
    echo "<script>
        $('#text2').show()
     </script>";
}
?>