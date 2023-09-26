<?php
session_start();

$server_name = "localhost";
$username = "root";
$password = "";
$database_name = "ambulance_reservation";

$conn = mysqli_connect($server_name, $username, $password, $database_name);

//now check the connection
if (!$conn) {
    die("Connection Failed:" . mysqli_connect_error());

}

//$user_name = $_SESSION['id'];
$pincode = $_POST['pincode'];

$result = mysqli_query($conn, "SELECT * FROM driver_detail WHERE pin_code='$pincode'");


if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while ($row = mysqli_fetch_assoc($result)) {

        $stmt_name = $row["driver_name"];
        $stmt_num = $row["driver_num"];
        $stmt_hospital = $row["driver_hospital"];
        $stmt_car = $row["driver_car"];
        $stmt_pincode = $row["pin_code"];

        echo '
        
            <div class="col">
                <div class="card h-100">
                <div class="card-body">
                    <h5 class="card-title">Driver Name: ' . $stmt_name . ' </h5>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">Driver Number: ' . $stmt_num . '</li>
                            <li class="list-group-item">Hospital: ' . $stmt_hospital . '</li>
                            <li class="list-group-item">Ambulance Number: ' . $stmt_car . '</li>
                            <li class="list-group-item">Current Area Pin Code: ' . $stmt_pincode . '</li>
                        </ul>
                        <a href="dashboardmain.php"
                        <button type="button" name="submit" class="btn btn-dark">Submit</button></a>
                    
                    </div>
                </div>
            </div>
        ';
    }
} else {
    echo "0 results found";
}

?>