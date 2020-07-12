<?php
/**
 * Created by IntelliJ IDEA.
 * User: isuru
 * Date: 12/7/18
 * Time: 11:59 AM
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


    $rows = null;
    if(isset($_GET['all'])){
        $cus_id = $_SESSION['customerId'];
        $result = $connection->query("SELECT lot_id FROM parking_lot WHERE customer_id = '$cus_id'");
        echo mysqli_error($connection);

        $query = "slot_id = ";
        $slots = array();
        while($row = $result->fetch_row()){
            $result2 = $connection->query("SELECT slot_id FROM slot WHERE lot_id = '$row[0]'");
            echo mysqli_error($connection);
            while($row2 = $result2->fetch_row()){
                array_push($slots, $row2[0]);
            }
        }

        for($x = 0; $x < sizeof($slots); $x++){

            if($x == sizeof($slots) - 1){
                $query .= "'$slots[$x]'";
            }else{
                $query .= "'$slots[$x]' OR slot_id = ";
            }
        }
        echo $query;
        $result = $connection->query("SELECT * FROM reservation WHERE ".$query);
        echo mysqli_error($connection);

        if(isset($result)) {
            $rows = $result->fetch_all();
            echo mysqli_error($connection);
            ob_clean();
            echo json_encode($rows);
        }
        else {
            echo mysqli_error($connection);
            echo '<script> alert("Error in the get data")</script>';
        }

    }
    else if (isset($_GET['delete'])){
        echo "delete";
        $id=$_GET['res_id'];
        $slot_id = $_GET['slot_id'];
        $connection->query("UPDATE slot SET status = 0 WHERE slot_id = '$slot_id'");
        $result2 = $connection->query("SELECT lot_id FROM slot WHERE slot_id = '$slot_id'");
        echo mysqli_error($connection);
        $row = $result2->fetch_row();

        $lot_id = $row[0];

        $result2 = $connection->query("SELECT empty_slots FROM parking_lot WHERE lot_id = '$lot_id'");
        $row = $result2->fetch_row();
        echo mysqli_error($connection);

        $empty_slots = $row[0];
        $empty_slots++;

        $connection->query("UPDATE parking_lot SET empty_slots = '$empty_slots' WHERE lot_id = '$lot_id'");
        echo mysqli_error($connection);

        $result = $connection->query("SELECT * FROM reservation WHERE res_id = '$id'");

        $row = $result->fetch_row();
        $restime = $row[1];
        $endtime = $row[2];
        $slot_id = $row[3];
        $plate_no = $row[4];

        $result = $connection->query("INSERT INTO reservation_done (res_id, res_time, end_time, slot_id, plate_no, res_type_id) VALUES 
              ('$id', '$restime', '$endtime', '$slot_id', '$plate_no', 1)");

        echo mysqli_error($connection);
        $result = $connection->query("DELETE FROM reservation WHERE  `res_id`='$id'");


        $result = (bool)(($connection->affected_rows) > 0);

        if ($result) {

            $message = "Reservation has been successfully Deleted";

        } else {

            $message = "Reservation had not been Deleted";
        }



        echo json_encode($message);

    }else if(isset($_GET['cancel'])){
        echo "delete";
        $id=$_GET['res_id'];
        $slot_id = $_GET['slot_id'];
        $connection->query("UPDATE slot SET status = 0 WHERE slot_id = '$slot_id'");
        $result2 = $connection->query("SELECT lot_id FROM slot WHERE slot_id = '$slot_id'");
        echo mysqli_error($connection);
        $row = $result2->fetch_row();

        $lot_id = $row[0];

        $result2 = $connection->query("SELECT empty_slots FROM parking_lot WHERE lot_id = '$lot_id'");
        $row = $result2->fetch_row();
        echo mysqli_error($connection);

        $empty_slots = $row[0];
        $empty_slots++;

        $connection->query("UPDATE parking_lot SET empty_slots = '$empty_slots' WHERE lot_id = '$lot_id'");
        echo mysqli_error($connection);

//        $result = $connection->query("SELECT * FROM reservation WHERE res_id = '$id'");
//
//        $row = $result->fetch_row();
//        $restime = $row[1];
//        $endtime = $row[2];
//        $slot_id = $row[3];
//        $plate_no = $row[4];
//
//        $result = $connection->query("INSERT INTO reservation_done (res_id, res_time, end_time, slot_id, plate_no, res_type_id) VALUES
//              ('$id', '$restime', '$endtime', '$slot_id', '$plate_no', 1)");


        $result = $connection->query("DELETE FROM reservation WHERE  `res_id`='$id'");
        echo $id;
        echo mysqli_error($connection);

        $result = (bool)(($connection->affected_rows) > 0);

        if ($result) {

            $message = "Reservation has been successfully Deleted";

        } else {

            $message = "Reservation had not been Deleted";
            echo mysqli_error($connection);
        }



        echo json_encode($message);

    }else if(isset($_POST["reserve"])){
        $id = $_POST['id'];
        $result = $connection->query("SELECT slot_id FROM slot WHERE lot_id = $id AND status = 0");
        $slots = array();
        while($row = $result->fetch_row()){
            $slots[] = $row[0];
        }

        $_SESSION["slots"] = $slots;
        $_SESSION["lot_id"] = $id;
        $_SESSION["name"] = $_POST["name"];
        $_SESSION["address"] = $_POST["street"];
        echo("/park-king/site/reserve.php");

    }else if(isset($_POST['update'])){
        $res_id = $_POST['res_id'];
        $connection->query("UPDATE reservation SET  res_type_id = 2 WHERE res_id = '$res_id'");
    }else {
        $restime = $_POST["res-time"];
        $endtime = $_POST["end-time"];
        $lot_id = $_POST["lot_id"];
        $plate_no = $_POST["plate_no"];

        $timezone = 'Asia/Colombo';

        $resdate = new DateTime($restime, new DateTimeZone($timezone));
        $enddate = new DateTime($endtime, new DateTimeZone($timezone));

        $restime = $resdate->format('Y-m-d H:i:s');
        $endtime = $enddate->format('Y-m-d H:i:s');

        $slot_id = $_POST["slot_id"];

        $result = $connection->query("INSERT INTO reservation (res_time, end_time, slot_id, plate_no, res_type_id) VALUES 
              ('$restime', '$endtime', '$slot_id', '$plate_no', 1)");
        $res_id = mysqli_insert_id($connection);
        $result = (bool)($connection->affected_rows > 0);
        if ($result) {
            $result = $connection->query("SELECT latitude, longitude FROM parking_lot WHERE lot_id = $lot_id");
            $row = $result->fetch_row();
            $lat = $row[0];
            $lng = $row[1];

            $result2 = $connection->query("SELECT total_slots, empty_slots FROM parking_lot WHERE lot_id = $lot_id");
            $row = $result2->fetch_row();
            $total_slots = $row[0];
            $empty_slots = $row[1] - 1;

            $connection->query("UPDATE parking_lot SET empty_slots = '$empty_slots' WHERE lot_id = '$lot_id'");
            $connection->query("UPDATE slot SET status = 1 WHERE slot_id = '$slot_id'");
            echo mysqli_error($connection);


            $_SESSION["slots"] = null;
            echo("../site/directions.php?dest_lat=$lat&dest_lng=$lng&res_id=$res_id&slot_id=$slot_id");
        } else {
            echo mysqli_error($connection);
        }


    }
}