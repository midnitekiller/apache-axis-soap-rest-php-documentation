<?php
$serverName = "localhost";
$connectionOptions = [
    "Database" => "test",
    "Uid" => "SA",
    "PWD" => "qwe!@#123",
    "CharacterSet"=> "UTF-8"
];

$conn = sqlsrv_connect($serverName, $connectionOptions);

$sql = "SELECT * FROM Inventory";

$stmt = sqlsrv_query($conn, $sql);

while ($row[] = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {

        $tem = $row;

}

        header('Content-Type: application/json; charset=utf-8');

         echo json_encode($tem, JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT);

?>
