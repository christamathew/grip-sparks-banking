<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
.topnav {
  overflow: hidden;
  
}

.topnav a {
  float: right;
  display: block;
  color: #3B498B;
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

@media screen and (max-width: 600px) {
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
  background-image:url('https://bccs.tech/wp-content/uploads/2020/02/online-banking1.jpg');
  width:auto;
  height:100%;
  background-size:cover;
}
header{
  padding:10px 10px;
  color:purple;
  font-family:'Trebuchet MS',sans-serif;
  font-size:25px;
  text-decoration: none;
}
header a{
  text-decoration: none;
}
button {
  display: inline-block;
  border-radius: 4px;
  background-color:purple;
  border: none;
  color: white;
  text-align: center;
  font-size: 15px;
  font-family:'Trebuchet MS';
  padding: 10px;
  width: 90%;
  transition: all 0.5s;
  cursor: pointer;
  margin: 5px;
}

button span {
  cursor: pointer;
  display: inline-block;
  position: relative;
  transition: 0.5s;
}

button span:after {
  content: '\00bb';
  position: absolute;
  opacity: 0;
  top: 0;
  right: -20px;
  transition: 0.5s;
}

button:hover span {
  padding-right: 10px;
}

button:hover span:after {
  opacity: 1;
  right: 0;
}
.tablediv{
  float: center;
  padding: 8px;
  margin:5px;
  width:70%; 
 margin-left:15%; 
margin-right:15%;
}
table{
  
  font-family:'Trebuchet MS',sans-serif;
  font-weight:bold;
  padding:5px;
  margin:1px;
  background:linear-gradient(
      rgba(255, 255, 255, 0.6),
      rgba(255, 255, 255, 0.5));
  width: 100%;  
  border:1px solid white;
}
th{
  padding: 10px 10px;
  text-align: center;
  font-weight: 500;
  font-size: 20px;
  color: purple;
  text-transform: uppercase;
}
td{
  padding: 8px;
  text-align: center;
  vertical-align:middle;
  font-weight: bold;
  font-size: 18px;
  color: black;
  border-bottom: solid black;
}
@media screen and (max-width: 800px){
    div.tablediv{
        width:100%; 
        margin-left:0%; 
        margin-right:0%;
        padding:0px;
        margin:0px;
        }
     table{
         padding:0px;
         margin:0px;
     } 
}
</style>  
<title>SPX NetBanking-View All Customers</title>
</head>
<body>
<header> 
<a href="index.html" ><b>SPX NetBanking</b></a> </header>
<div class="topnav" id="myTopnav">
<a href="ViewTransactions.php">View Transactions</a>
<a href="ViewCustomers.php" class="active">View Customers</a>
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
<div class="tablediv"> 
<table>
<tr>
<th>Name</th>
<th>Account Number</th>
<th></th>
</tr>
<?php
$conn = mysqli_connect("localhost", "root", "", "spx_bank");
// Check connection
if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
}
$sql = "SELECT name, account_no FROM customer";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
// output data of each row
while($row = $result->fetch_assoc()) {
    echo "<tr>";
    echo "<form method ='post' action = 'OneCustomer.php'>";
    echo "<td>" . $row["name"]. "</td><td>" . $row["account_no"] . "</td>";
    echo "<td ><a href='OneCustomer.php'><button type='submit'  name='user' id='user1' name='user'  id='users1' value= '{$row['name']}' ><span>View Customer</span></button></a></td>";
    echo "</tr>";
}
echo "</table>";
} else { echo "0 results"; }
$conn->close();
?>
</table>
</div>
</body>
</html>

