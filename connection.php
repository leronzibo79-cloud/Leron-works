<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

$conn = mysqli_connect("localhost", "root", "", "nsu-uenr");

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $FullName    = $_POST['FullName'] ?? '';
    $Gender      = $_POST['Gender'] ?? '';
    $Level       = $_POST['Level'] ?? '';
    $Cell        = $_POST['Cell'] ?? '';
    $Email       = $_POST['Email'] ?? '';
    $Department  = $_POST['Department'] ?? '';
    $Date_of_com = $_POST['Date_of_com'] ?? '';

    $sql = "INSERT INTO nsu (FullName, Gender, Level, Cell, Email, Department, Date_of_com)
            VALUES ('$FullName', '$Gender', '$Level', '$Cell', '$Email', '$Department', '$Date_of_com')";

    if (mysqli_query($conn, $sql)) {
        echo "<h2 style='color:green'>Registration Successful!</h2>";
        echo "<p>Data saved to database!</p>";
    } else {
        echo "<h2 style='color:red'>Error: " . mysqli_error($conn) . "</h2>";
    }

    mysqli_close($conn);
} else {
    echo "Form was not submitted correctly!";
}
?>