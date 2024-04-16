<?php
// Server-side validation
$name = htmlspecialchars($_POST['name']);
$matricNo = htmlspecialchars($_POST['matricNo']);
$currentAddress = htmlspecialchars($_POST['currentAddress']);
$homeAddress = htmlspecialchars($_POST['homeAddress']);
$email = htmlspecialchars($_POST['email']);
$mobileNo = htmlspecialchars($_POST['mobileNo']);
$homePhoneNo = htmlspecialchars($_POST['homePhoneNo']);

// server-side validation with regex
if (!preg_match("/^[A-Za-z\s]+$/", $name)) {
    echo "Invalid Name";
    exit;
}

if (!preg_match("/^[0-9]{7}+$/", $matricNo)) {
    echo "Invalid Matric No";
    exit;
}

if (!preg_match("/^[a-z0-9._%+-]+@gmail.com+$/", $email)) {
    echo "Invalid Email";
    exit;
}

if (!preg_match("/^[0-9]{10}+$/", $mobileNo)) {
    echo "Invalid phone number";
    exit;
}

if (!preg_match("/^[0-9]{10}+$/", $homePhoneNo)) {
    echo "Invalid home phone number";
    exit;
}

// Connect to database and store student details data
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "studentdetails";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "INSERT INTO details (name, matricNo, currentAddress, homeAddress, email, mobileNo, homePhoneNo)
VALUES ('$name', '$matricNo', '$currentAddress', '$homeAddress', '$email', '$mobileNo', '$homePhoneNo')";

if ($conn->query($sql) === TRUE) {
    echo "Student details submitted successfully!";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>

