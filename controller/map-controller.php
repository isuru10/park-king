<?php



//require("phpsqlajax_dbinfo.php");

// Start XML file, create parent node
$doc = new DOMDocument('1.0', 'UTF-8');
$node = $doc->createElement("markers");
$parnode = $doc->appendChild($node);

// Opens a connection to a MySQL server
$connection = mysqli_connect("127.0.0.1","root","123","parking_app","3306");
if (!$connection) {
    die('Not connected : ' . mysqli_connect_error());
}

// Set the active MySQL database

// Select all the rows in the markers table
$result = $connection->query("SELECT * FROM parking_lot WHERE 1");
if (!$result) {
    die('Invalid query: ');
}

header("Content-type: text/xml");

// Iterate through the rows, adding XML nodes for each
while ($row = @mysqli_fetch_assoc($result)){
    $lot_id = $row['lot_id'];
    $total_slots = $row['total_slots'];
    $free_slots = $row['empty_slots'];
    $cusId = $row['customer_id'];



    // Add to XML document node
    $node = $doc->createElement("marker");
    $newnode = $parnode->appendChild($node);

//    if($cusId == $_SESSION['customerId']){
        $newnode->setAttribute("color", 'green');
//    }else{
//        $newnode->setAttribute("color", 'red');
//    }

    $newnode->setAttribute("id", $row['lot_id']);
    $newnode->setAttribute("name", $row['lot_name']);
    $newnode->setAttribute("address", $row['street']);
    $newnode->setAttribute("lat", $row['latitude']);
    $newnode->setAttribute("lng", $row['longitude']);
    $newnode->setAttribute("total", $total_slots);
    $newnode->setAttribute("free", $free_slots);
//    $newnode->set_attribute("type", $row['type']);
}

$xmlfile = $doc->saveXML();
echo $xmlfile;

?>