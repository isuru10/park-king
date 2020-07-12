<?php
/**
 * Created by IntelliJ IDEA.
 * User: isuru
 * Date: 11/27/18
 * Time: 2:59 PM
 */
session_start();

if(!isset($_SESSION['exists'])){
    header("Location:/park-king");
}else {
    $connection = mysqli_connect("127.0.0.1", "root", "123", "parking_app", "3306");

    if (!$connection) {
        echo "Connection error <br>";
        echo mysqli_connect_error();
        die;
    }

    $time = $_POST["time"];
    $amount = $_POST["amount"];
    $res_id = $_POST["res_id"];

    $connection->query("INSERT INTO payment (amount, ptype_id, res_id) VALUES ($amount, 1, $res_id)");


    echo $res_id;
    echo mysqli_error($connection);
}

?>