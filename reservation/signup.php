<?php

    session_start();

    $server_name = "localhost";
    $username = "root";
    $password = "";
    $database_name = "ambulance_reservation";

    $conn=mysqli_connect($server_name, $username, $password, $database_name);

    //now check the connection
    if(!$conn)
    {
        die("Connection Failed:" . mysqli_connect_error());

    }

    if(isset($_POST['submit']))
    {	

        $name = $_POST['fname'];
        $mobile_number = $_POST['pnum'];

        $_SESSION['id'] = $mobile_number; 

        
        $password = $_POST['pwd'];

        $sql_query = "INSERT INTO user_detail (user_name,user_num,user_pwd)
        VALUES ('$name','$mobile_number','$password')";

        if (mysqli_query($conn, $sql_query)) 
        {
            echo "New Details Entry inserted successfully !";
            header("Location: dashboardmain.php");
            exit();
        } 
        else
        {
            echo "Error: " . $sql . "" . mysqli_error($conn);
        }
        mysqli_close($conn);
    }
?>