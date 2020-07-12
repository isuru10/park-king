<?php




if (!(isset($_POST["username"]) && isset($_POST["password"]))){

}

$username = $_POST["username"];
$password = $_POST["password"];



$connection = mysqli_connect("127.0.0.1","root","123","parking_app","3306");

if (!$connection){
    echo "Connection error <br>";
    echo mysqli_connect_error();
}else{

    $resultSet = $connection->query("SELECT * FROM `user` WHERE username='$username'");

    if ($resultSet->num_rows > 0){
        $rowData = $resultSet->fetch_row();
        $usertype = $rowData[2];
        $customerId=$rowData[3];
        if ( $password == $rowData[1]){

            $lot_id = array();
            if($usertype != "driver"){
                $resultSet = $connection->query("SELECT * FROM `parking_lot` WHERE customer_id='$customerId'");


                while($row = $resultSet->fetch_row()){
                    $lot_id[] = $row[0];
                }

            }

            $plate_no = array();
            if($usertype != "owner"){
                $resultSet = $connection->query("SELECT * FROM `vehicle` WHERE customer_id='$customerId'");

                $plate_no = array();

                while($row = $resultSet->fetch_row()){
                    $plate_no[] = $row[0];
                }
            }

            $result = $connection->query("SELECT rate FROM reservation_type WHERE description = 'reserved'");

            $row = $result->fetch_row();

            session_start();
            $_SESSION["exists"] = true;
            $_SESSION['username']=$username;
            $_SESSION['usertype']=$usertype;
            $_SESSION['customerId']=$customerId;
            $_SESSION['plate_no']=$plate_no;
            $_SESSION["parking_lot"] = $lot_id;
            $_SESSION["rate"] = $row[0];



            header("Location:../site/dashboard.php");

        }else{

           echo "<script>alert('Invalid Username or Password');</script>";
//           echo '<script>window.location.replace("../header.php");</script>';

        }

    }else{

        echo "<script>alert('Invalid Username or Password');</script>";
//        echo '<script>window.location.replace("../header.php");</script>';
    }
    mysqli_close($connection);
}






