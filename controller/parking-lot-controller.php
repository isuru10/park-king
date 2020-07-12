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

    if (isset($_POST['latitude'])) {
        $no = $_POST["no"];
        $street = $_POST["street"];
        $city = $_POST["city"];
        $latitude = $_POST["latitude"];
        $longitude = $_POST["longitude"];
        $slots = $_POST["slots"];
        $name = $_POST["name"];
        $customer_id = $_SESSION['customerId'];


        $connection->autocommit(false);
//            $connection->begin_transaction(MYSQLI_TRANS_START_READ_ONLY);
        $sql = "INSERT INTO parking_lot (no, street, city, latitude, longitude, customer_id, lot_name, total_slots, empty_slots) 
                VALUES ('$no', '$street', '$city', $latitude, $longitude, '$customer_id', '$name', '$slots', $slots)";
        if (mysqli_query($connection, $sql)) {
            echo "Lot created successfully";
            $genId = mysqli_insert_id($connection);
            for ($x = 1; $x <= $slots; $x++) {
                $slotid = $genId."_".$x;
                $sql = "INSERT INTO slot (slot_id, status, lot_id, slot_type_id) VALUES ('$slotid', 0, $genId, 0)";
                $result = $connection->query($sql);
                $result = (bool)($connection->affected_rows > 0);
                if (!$result){
                    $connection->rollback();
                    echo "Error: " . $sql . "<br>" . mysqli_error($connection);
                    return;
                }
            }
            $connection->commit();
            $connection->autocommit(true);
            echo "Success!";
        } else {
            $connection->rollback();
            echo "Error: " . $sql . "<br>" . mysqli_error($connection);
        }

    }else if(isset($_GET['reserve'])){
        $restime = $_GET["res-time"];
        $endtime = $_GET["end-time"];
        echo $restime;
        echo $endtime;
    }else  if(isset($_GET['all'])){
        $customer_id = $_SESSION['customerId'];
        $result = $connection->query("SELECT * FROM parking_lot WHERE customer_id = '$customer_id'");
        $result = json_encode($result->fetch_all());
        echo(mysqli_error($connection));
        echo($result);
    }else if(isset($_GET['delete'])){
        $lot_id = $_GET["id"];
        $result = $connection->query("DELETE FROM parking_lot WHERE lot_id = $lot_id");
        echo $result;
        echo mysqli_error($connection);
    }else if(isset($_POST['update'])){
        $lot_id = $_POST["id"];
        $no = $_POST["no"];
        $street = $_POST["street"];
        $city = $_POST["city"];
        $name = $_POST["name"];
        $tot_slots = $_POST["tot_slots"];
        $customer_id = $_SESSION['customerId'];

        $result = $connection->query("UPDATE parking_lot SET no = '$no', street = '$street', city = '$city', 
                                    lot_name = '$name', total_slots = '$tot_slots' WHERE lot_id = '$lot_id'");
        echo $result;
        echo mysqli_error($connection);
    }
    else{
        echo("Please enter valid information");
    }
}