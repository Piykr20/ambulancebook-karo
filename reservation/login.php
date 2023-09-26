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

        $user_name = mysqli_real_escape_string($conn,$_POST['pnum']);
        $password = mysqli_real_escape_string($conn,$_POST['pwd']);


        $sql = "SELECT user_num FROM user_detail WHERE user_num='$user_name' and user_pwd='$password'";

        $result = mysqli_query($conn,$sql);
        $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
        $active = $row['active'];

        $count = mysqli_num_rows($result);

        // If result matched $myusername and $mypassword, table row must be 1 row
		
        if($count == 1) 
        {
            $_SESSION['id'] = $user_name;
            header('Location: dashboardmain.php');
            exit();
        }
        else 
        {
            //$error = "Your Login Name or Password is invalid";
            header('Location: index.html');
        }
        
        mysqli_close($conn);
    }
?>