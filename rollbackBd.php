<?php
require_once "connection.php";
require_once "classes/DataBase.php";

$db = new DataBase($conn);
$db->deleteDb();
$db->createDb();
$db->migrate();
$conn->close();

header("Location: http://php-mysqli/");
exit;