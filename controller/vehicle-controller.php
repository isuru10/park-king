<?php
/**
 * Created by IntelliJ IDEA.
 * User: isuru
 * Date: 12/7/18
 * Time: 7:46 PM
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

    $customer_id = $_SESSION['customerId'];


    if(isset($_POST['insert-all']) && isset($_POST['model_id']) && isset($_POST['plate_no']) && isset($_POST['colour'])){
        $model_id = $_POST['model_id'];
        $plate_no = $_POST['plate_no'];
        $colour = $_POST['colour'];

        $query = "INSERT INTO `vehicle` (plate_no, customer_id, colour, model_id) VALUES (?, ?, ?, ?)";
        $stmt = $connection->prepare($query);
        $customer_id = (int)$customer_id;
        $stmt->bind_param("siss", $plate_no,$customer_id, $colour, $model_id);

        $result = $stmt->execute();
        $result = (bool)(($connection->affected_rows) > 0);

        $plates = $_SESSION['plate_no'];
        array_push($plates, $plate_no);
        $_SESSION['plate_no'] = $plates;
        echo $plates;
        if($result){
            echo "Success!";
        }else{
            echo mysqli_error($connection);
            echo "Kawa!";
        }
    }

    if(isset($_GET['get-models'])){
        $query = "SELECT *  FROM model,brand WHERE model.brand_id = brand.brand_id";

        $result = $connection->query($query);

//        echo $result;

        if(isset($result)){
            $data = $result->fetch_all();
            ob_clean();
            echo json_encode($data);
        }else{
            echo "<script>alert('Data is not valid!')</script>";
        }
    }

    if(isset($_POST['add-model'])){
        $model_name = $_POST['new_model_name'];
        $brand_name = $_POST['new_brand_name'];

        $connection->query("INSERT INTO brand (brand_name) VALUES('$brand_name')");

        $brand_id = mysqli_insert_id($connection);
        $query = "INSERT INTO `model` (brand_id, model_name) VALUES (?,?)";
        $stmt = $connection->prepare($query);

        $stmt->bind_param("is", $brand_id,$model_name);

        $result = $stmt->execute();

        $result = (bool)($connection->affected_rows > 0);

        if($result){
            $model_id = mysqli_insert_id($connection);
            echo json_encode([$model_id, $brand_name, $model_name]);
        }else{
            echo mysqli_error($connection);
        }
    }




}