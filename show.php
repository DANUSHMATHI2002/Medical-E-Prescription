<?php 

    require_once('sms.php');

    $conn = mysqli_connect("localhost", "root", "", "signup");

    if($conn === false){
        die("ERROR: Could not connect. "
            . mysqli_connect_error());
    }


    if(isset($_POST["SEND_SMS"])) {

        $id = $_POST["SEND_SMS"];

        $sql = "SELECT * FROM users WHERE id=$id";

        if($result = mysqli_query($conn, $sql)){
            $user = mysqli_fetch_assoc($result);
            $pharm = "8870408316";

            $data = json_encode(
                array('messages' => array(
                        array("body" => $user["name"]." Disease".$user["disease"]."Medicines".$user["Medicine"], "source" => "php", "to" => $user["phone_number"]),
                        array("body" => $user["name"]."Disease: ".$user["disease"]."Medicines ".$user["Medicine"], "source" => "php", "to" => $pharm),

                    )
                )
            );

            sendSMS($data);

                
        } else {
            echo "User not found!";
        }
    }

?>


<!DOCTYPE html>
<html>
<head>
<style>
#customers {
  font-family: Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

#customers td, #customers th {
  border: 1px solid #ddd;
  padding: 8px;
}

#customers tr:nth-child(even){background-color: #f2f2f2;}

#customers tr:hover {background-color: #ddd;}

#customers th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #04AA6D;
  color: white;
}
</style>
</head>
<body>

<h1>Users</h1>

<table id="customers">
  <tr>
    <th>Name</th>
    <th>Disease</th>
    <th>Medicine</th>
    <th>Phone</th>
    <th>User Action</th>
  </tr>
  
  <?php 

    $conn = mysqli_connect("localhost", "root", "", "signup");

    if($conn === false){
        die("ERROR: Could not connect. "
            . mysqli_connect_error());
    }

    $sql = "SELECT * FROM users";

    if($result = mysqli_query($conn, $sql,)){

        while($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>".$row["name"]."</td>";
            echo "<td>".$row["disease"]."</td>";
            echo "<td>".$row["Medicine"]."</td>";
            echo "<td>".$row["phone_number"]."</td>";
            echo "<td><form method='POST'><button name='SEND_SMS' value=".$row["id"].">Send SMS</button></form></td>";
            echo "</tr>";
        }

    } else{
        echo "ERROR: Hush! Sorry $sql. "
            . mysqli_error($conn);
    }

    mysqli_close($conn);




?>

</table>

</body>
</html>




