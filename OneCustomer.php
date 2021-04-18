<?php
session_start();
$server="localhost";
$username="root";
$password="";
$con=mysqli_connect($server,$username,$password,"spx_bank");
if(!$con){
    die("Connection failed");

}
$_SESSION['user']=$_POST['user'];
$_SESSION['sender']=$_SESSION['user'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">    
<title>SPX NetBanking-Customer Details</title>
<style>
header{
  padding:10px 10px;
  color:#980230;
  font-family:'Trebuchet MS',sans-serif;
  font-size:25px;
  text-decoration: none;
}
header a{
  text-decoration: none;
}  
.topnav {
  overflow: hidden;
  
}

.topnav a {
  float: right;
  display: block;
  color: #980230;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
  font-size: 20px;
  font-weight:bold;
}

a.active {
  color:  #761CD4 ;
  
}

.topnav .icon {
  display: none;
}

.topnav a:hover{
  color:  #2E8EB1;
}

@media screen and (max-width: 600px) {
  .topnav a:not(:first-child) {
    display: none;
  }
  .topnav a.icon {
    float: right;
    display: block;
  }
}

@media screen and (max-width: 400px) {
  .topnav.responsive {position: relative;}
  .topnav.responsive .icon {
    position: absolute;
    right: 0;
    top: 0;
  }
  .topnav.responsive a {
    float: none;
    display: block;
    text-align: left;
  }
  .topnav.responsive .dropdown {float: none;}
  .topnav.responsive .dropdown-content {position: relative;}
  .topnav.responsive .dropdown .dropbtn {
    display: block;
    width: 100%;
    text-align: left;
  }
}
body{
  background-image:url('https://i.pinimg.com/originals/6b/1b/22/6b1b22573f9f3d4bba11a9fa5cb45652.png');
  background-position:right;
  background-size:contain;
  background-repeat: no-repeat;
  height:600px;
  width:auto;
  font-family:'Trebuchet MS';
  background-color: rgba(242, 203, 193,0.8);
  background-blend-mode: overlay;

}
button {
  border: 2px solid #230b5a;
  background-color: white;
  color:#230b5a;
  padding:0.35em 1.2em;
  border:0.1em solid #230b5a;
  margin:0 0.3em 0.3em 0;
  font-size: 20px;
  font-weight:300;
  cursor: pointer;
  display:inline-block;
  text-align:center;
  min-width:250px;
  border-radius: 5px;
  font-family:'Trebuchet MS',sans-serif;
}
button:hover{
color:peachpuff;
background-color:#230b5a;
}
.hidden {
   display: none;
   background:linear-gradient(
      rgba(255, 255, 255, 0.6),
      rgba(255, 255, 255, 0.5));
      padding:10px;
}
table{
  background:linear-gradient(
      rgba(255, 255, 255, 0.6),
      rgba(255, 255, 255, 0.5));
      padding:10px;
}
th{
  padding: 8px 8px;
  text-align: center;
  font-weight: 500;
  font-size: 18px;
  color: #BD0152;
  text-transform: uppercase;
}
td{
  padding: 5px;
  text-align: center;
  vertical-align:middle;
  font-size: 18px;
  color: #562151;
  border-bottom: solid #562151;
}
h3{
  font-family:'Trebuchet MS',sans-serif;
  font-size:23px;
  color:#BD0152;
}
.user_details{
  font-size:20px;
  color:#230b5a;
  font-weight:bold;

}
.history{
  font-size:20px;
  color:black;

}
.container{
  display:inline-flex;
  width:100%;
}
.flex-direction{
  flex-direction:row;
}
.user_details{
width:50%;  
height:auto;
float:left;
}
.history{
width:50%;  
height:auto;
float:left;
margin-top:50px;
justify-content:center;
}
.textbox{
  height: 20px;
  background-color: rgba(79, 12, 135, 0.1);
  color:rgb(79, 12, 135);
  font-size: 15px;
  font-family:'Trebuchet MS',sans-serif;
  font-weight:bold;
}

@media screen and (max-width: 800px){
.flex-direction{
  flex-direction:column;
}    
    
.user_details{ 
  float:none; 
  top:0px;
  width:100%;
  }
.history{
  float:center; 
  width:100%; 
  height:100%; 
  border-collapse: collapse;
  margin-left:1%;
  margin-right:1%;
  
}
button{
  display:block;
  margin:0.4em auto;
  display:flex;
  justify-content: center;
}  
th{
  padding: 2px 2px;
  font-size: 15px;
  
}
td{
  padding: 2px;
  font-size: 15px;

}
table{
    display:center;
}
	}
 
</style>

<script type='text/JavaScript'>
function toggleTable() {

  document.getElementById("myTable").classList.toggle("hidden");

}

</script>
</head>
<body>
<header> 
<a href="index.html" ><b>SPX NetBanking</b></a> </header>
<div class="topnav" id="myTopnav">
<a href="ViewTransactions.php">View Transactions</a>
<a href="ViewCustomers.php">View Customers</a>
<a href="index.html" >Home</a>
<a href="javascript:void(0);" style="font-size:15px;" class="icon" onclick="myFunction()">&#9776;</a>
</div>    
<script>
function myFunction() {
  var x = document.getElementById("myTopnav");
  if (x.className === "topnav") {
    x.className += " responsive";
  } else {
    x.className = "topnav";
  }
}
</script>
<div class="container flex-direction">
  <div class="user_details">
        <?php
        if (isset($_SESSION['user']))
        {
          $user=$_SESSION['user'];
          $result=mysqli_query($con,"SELECT * FROM customer WHERE Name='$user'");
          while($row=mysqli_fetch_array($result))
          {
            echo "<p><b>User ID &nbsp&nbsp&nbsp:</b> ".$row['id']."</p>";
            echo "<p name='sender'><b>Name &nbsp&nbsp&nbsp&nbsp</b>  :  ".$row['name']."</p>";
            echo "<p><b>Email ID</b>&nbsp&nbsp: ".$row['email']."</p>";
            echo "<p><b>A/C No.</b>&nbsp&nbsp&nbsp: ".$row['account_no']."</p>";
            echo "<p><b>IFSC</b>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp: ".$row['ifsc']."</p>";
            echo "<p><b class='font-weight-bold'>Balance</b>&nbsp&nbsp:<b>&nbsp&#8377;</b> ".$row['balance']."</p>";
          }         
        }
      ?>
      <br>
      <form action="transfer.php" method="POST">
                    <h3>Make a Transaction</h3>
                    To&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp:&nbsp&nbsp
                <select name="reciever" id="dropdown" class="textbox" required>
                    <option>Select Recipient</option>
                <?php
                $db = mysqli_connect("localhost", "root", "", "spx_bank");
                $res = mysqli_query($db, "SELECT * FROM customer WHERE name!='$user'");
                while($row = mysqli_fetch_array($res)) {
                    echo("<option> "."  ".$row['name']."</option>");
                }
                ?>
                </select>
                <br><br>
                    From&nbsp&nbsp&nbsp&nbsp :&nbsp&nbsp <span style="font-size:1.2em;"><input id="myinput" name="sender" class="textbox" disabled type="text" value='<?php echo "$user";?>'></input></span>
                    <br><br>
                    
                
                        <b >Amount :&#8377;</b>
                        <input name="amount" type="number" min="100" class="textbox" required >
                        <br><br>
                        <a><button id="transfer"  name="transfer" ; >Transfer</button></a>
                        </form>
      <button onClick="toggleTable()" >My transaction history</button>
      </div>
      <div class="history">   
        

<table id="myTable" class="hidden">
  <tr><th colspan=4><b>Transaction History</b> </th><tr>
  <tr>
    <th>Name</th>
    <th>Withdrawal</th> 
    <th>Deposit</th>
    <th>Date & Time</th>
  </tr>
  <?php
  $sql = "SELECT * FROM transfer WHERE sender_name='$user'" ;
  $result = $con->query($sql);
if ($result->num_rows > 0) {
// output data of each row where sender is the selected user 
while($row = $result->fetch_assoc()) {
    echo "<tr>";
    echo "<td>" . $row["receiver_name"]. "</td><td>" . $row["amount"] . "</td><td></td><td>" . $row["date_time"] . "</td>";
    echo "</tr>";
}
} 
$sql = "SELECT * FROM transfer WHERE receiver_name='$user'" ;
  $result = $con->query($sql);
if ($result->num_rows > 0) {
// output data of each row where receiver is the selected user
while($row = $result->fetch_assoc()) {
    echo "<tr>";
    echo "<td>" . $row["sender_name"]. "</td><td></td><td>" . $row["amount"] . "</td><td>" . $row["date_time"] . "</td>";
    echo "</tr>";
}echo "</table>";
} 
?>
</table>
</div>
<br>
</div>
</body>
</html>