<?php 

error_reporting(E_ALL);
ini_set('display_errors', 1);

session_start();
include "conf.php";
echo "direct order 2 files connected";

$name = isset($_POST["name"]) ? mysqli_escape_string($conn, $_POST["name"]) : '';
$email = isset($_POST["email"]) ? mysqli_escape_string($conn, $_POST["email"]) : '';
$password = isset($_POST["password"]) ? mysqli_escape_string($conn, $_POST["password"]) : '';
$number = isset($_POST["number"]) ? mysqli_escape_string($conn, $_POST["number"]) : '';
$address = isset($_POST["address"]) ? mysqli_escape_string($conn, $_POST["address"]) : '';
$category = isset($_POST["category"]) ? mysqli_escape_string($conn, $_POST["category"]) : '';
$p_id = isset($_POST["p_id"]) ? mysqli_escape_string($conn, $_POST["p_id"]) : '';
$qty = isset($_POST["qty"]) ? mysqli_escape_string($conn, $_POST["qty"]) : '';
$date = isset($_POST["date"]) ? mysqli_escape_string($conn, $_POST["date"]) : '';

if (!isset($_SESSION["u_id"])) {
    echo "Success";
} else {
    echo "Failed";
}
?>