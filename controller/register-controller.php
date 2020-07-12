<?php




if(!isset($_POST['username'])){
    header("Location:/park-king");
}else {

    $username = $_POST["username"];
    $password = $_POST["password"];
    $first_name = $_POST["first_name"];
    $last_name = $_POST["last_name"];
    $email = $_POST["email"];
    $telephone_no = $_POST["telephone_no"];
    $user_type = strtolower($_POST["user_type"]);

    $connection = mysqli_connect("127.0.0.1", "root", "123", "parking_app", "3306");

    if (!$connection) {
        echo "Connection error <br>";
        echo mysqli_connect_error();
    } else {
        $sql = "INSERT INTO customer (first_name, last_name, email) VALUES ('$first_name', '$last_name', '$email')";
        if (mysqli_query($connection, $sql)) {
//            echo "New record created successfully";
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($connection);
        }

        $resultSet = $connection->query("SELECT * FROM customer WHERE email='$email'");

        if ($resultSet->num_rows > 0) {
            $rowData = $resultSet->fetch_row();
            $customer_id = $rowData[0];

            $sql = "INSERT INTO `user` (username, password, utype_id, customer_id) VALUES ('$username', '$password', '$user_type', '$customer_id')";
            if (mysqli_query($connection, $sql)) {
//                echo "New user created successfully";
                echo "<script>alert('User registered successfully!')</script>";
                echo "<script>window.location.replace('/park-king')</script>";
            } else {
                echo "Error: " . $sql . "<br>" . mysqli_error($connection);
            }

        }else{

            echo "<script>alert('Cus ID error');</script>";
//           echo '<script>window.location.replace("../header.php");</script>';

        }




    }

}






