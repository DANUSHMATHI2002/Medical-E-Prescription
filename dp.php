	<?php

		$conn = mysqli_connect("localhost", "root", "", "signup");
		$conn1 = mysqli_connect("localhost", "root", "", "pharmicist");

		// Check connection
		if($conn === false){
			die("ERROR: Could not connect. "
			. mysqli_connect_error());
		}
		if($conn1 === false){
			die("ERROR: Could not connect. "
			. mysqli_connect_error());
		}
		
		// Taking all 8 values from the form data(input)
		$name = $_REQUEST['name'];
		$age = $_REQUEST['age'];
		$check_up_date = $_REQUEST['check_up_date'];
		$gender = $_REQUEST['gender'];
        $patient_id = $_REQUEST['patient_id'];
        $temperature = $_REQUEST['temperature'];
        $disease = $_REQUEST['disease'];
		$phone_number = $_REQUEST['phone_number'];
		$Medicine = $_REQUEST['Medicine'];
		$Extra_medicine = $_REQUEST['Extra_medicine'];

		// Performing insert query execution
		// here our table name is college
		$sql = "INSERT INTO users VALUES (DEFAULT, '$name','$age','$check_up_date','$gender','$patient_id','$temperature','$disease','$phone_number','$Medicine','$Extra_medicine')";
		$sql1 = "INSERT INTO pharm VALUES (DEFAULT, '$name','$age','$check_up_date','$gender','$patient_id','$temperature','$disease','$phone_number','$Medicine','$Extra_medicine')";

		if(mysqli_query($conn, $sql)){
			echo "<h3>data stored in a database successfully.</h3>";}
		if (mysqli_query($conn1, $sql1)){
			echo "<h3>data stored in a database successfully.</h3>";
		} else{
			echo "ERROR: Hush! Sorry $sql. "
				. mysqli_error($conn);
		}
		
		// Close connection
		mysqli_close($conn);



    
		?>

