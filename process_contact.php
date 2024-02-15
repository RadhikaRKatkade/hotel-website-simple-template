<?php
$e = $_POST['email'];
$p = $_POST['password'];
$a = $_POST['address'];
$a2 = $_POST['address2'];
$c = $_POST['city'];
$s = $_POST['state'];
$z = $_POST['zip'];
$check_me_out = isset($_POST['check_me_out']) ? 1 : 0; // Handle checkbox

echo "email is: " . $e . "<br>";
echo "password is: " . $p . "<br>";
echo "address: " . $a . "<br>";
echo "address2: " . $a2 . "<br>";
echo "city: " . $c . "<br>";
echo "state is: " . $s . "<br>";
echo "zip is: " . $z . "<br>";
echo "check_me_out: " . $check_me_out . "<br>";

$conn = new mysqli('localhost', 'root', 'rk1409', 'food'); // Correct database name
if ($conn->connect_error) {
    die('Connection failed: ' . $conn->connect_error);
} else {
    $stmt = $conn->prepare("INSERT INTO contact_form(email, password, address, address2, city, state, zip, check_me_out) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");

    $stmt->bind_param("sssssssi", $e, $p, $a, $a2, $c, $s, $z, $check_me_out);
    
    if ($stmt->execute()) {
        echo "Data inserted successfully.";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
?>
