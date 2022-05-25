<?php



$host = "localhost"; //IP of your database
$userName = "root"; //Username for database login
$userPass = ""; //Password associated with the username
$database = "dorina"; //Your database name

$conn = mysqli_connect($host,$userName,$userPass,$database);

session_start();
$id=$_SESSION['varName'];
echo"<script>console.log('".$id."');</script>";

echo $d=$_SESSION['fine'];



if (!$conn) {
      die("Connection failed: " . mysqli_connect_error());
}
 
echo "Connected successfully";
 
$sql = "INSERT INTO payment VALUES ('', '".$d."','');";




if (mysqli_query($conn, $sql)) {
   
      echo "New record created successfully";
     
} else {
      echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

$sql2 = "SELECT id from payment where payment.fine='".$d."';";



$result = mysqli_query($conn,$sql2);
    if(mysqli_num_rows($result) > 0){
    }else{
        $msg = "No Record found";
    }

    while($row = mysqli_fetch_assoc($result)){

$sql3 = "UPDATE fine set fine.payment='".$row['id']."' where fine.id='".$d."';";
if (mysqli_query($conn, $sql3)) {
   
    echo "New record created successfully";
   
} else {
    echo "Error: " . $sql3 . "<br>" . mysqli_error($conn);
}
    }
mysqli_close($conn);
header( "Location: payment.php");
?>