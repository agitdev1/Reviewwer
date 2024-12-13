<!DOCTYPE html>
<html>

<head>
    <title>Insert Page page</title>
</head>

<body>
    <center>
        <?php

       
        $conn = mysqli_connect("localhost", "root", "", "mknrdb");

        // Check connection
        if($conn === false){
            die("ERROR: Could not connect. "
                . mysqli_connect_error());
        }

        // Taking all 5 values from the form data(input)
        $full_name = $_REQUEST['name'];
        $phone = $_REQUEST['phone'];
        $email = $_REQUEST['email'];
        $message = $_REQUEST['message'];
		$province = $_REQUEST['province'];
		$city = $_REQUEST['city'];
        

        // We are going to insert the data into our sampleDB table
        $sql = "INSERT INTO contact VALUES ('$full_name',
            '$phone','$email','$message','$province','$city')";

        // Check if the query is successful
        if(mysqli_query($conn, $sql)){
            echo "<h3>data stored in a database successfully."
                . " Please browse your localhost php my admin"
                . " to view the updated data</h3>";

            echo nl2br("\n$full_name\n $phone\n "
                . "$email\n $message\n $province\n $city");
        } else{
            echo "ERROR: Hush! Sorry $sql. "
                . mysqli_error($conn);
        }

        // Close connection
        mysqli_close($conn);
        ?>
    </center>
</body>

</html>