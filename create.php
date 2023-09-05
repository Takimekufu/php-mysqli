<?php

require_once "connection.php";
$conn->query("USE mysqli_test");

if (isset($_POST["name"]) && $_POST["course"]) {
    
    $stmt = $conn->prepare("INSERT INTO classes (name, course) VALUES (?,?)");
    $stmt->bind_param("si", $_POST["name"], $_POST["course"]);
    $stmt->execute();

} elseif (isset($_POST["full_name"]) && isset($_POST["dob"]) && isset($_POST["group"])) {

    $stmt = $conn->prepare("SELECT id FROM classes WHERE name = ?");
    $stmt->bind_param("s", $_POST["group"]);
    $stmt->execute();
    $result = $stmt->get_result()->fetch_assoc();

    $go = $conn->prepare("INSERT INTO students (full_name, dob, classes_id) VALUES (?,?,?)");
    $go->bind_param("ssi", $_POST["full_name"], $_POST["dob"], $result["id"]);
    $go->execute();

} elseif (isset($_POST["full_name_professor"])) {

    $stmt = $conn->prepare("INSERT INTO professors (full_name) VALUES (?)");
    $stmt->bind_param("s", $_POST["full_name_professor"]);
    $stmt->execute();
}

$conn->close();
header("Location: http://php-mysqli/");
exit;