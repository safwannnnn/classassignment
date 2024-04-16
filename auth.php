<?php
/*session_start();

if (!isset($_SESSION['authenticated']) || $_SESSION['authenticated'] !== true) {
    header('Location: login.html');
    exit;
}*/

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "users";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$email = isset($_POST['email']) ? $_POST['email'] : '';
$password = isset($_POST['password']) ? $_POST['password'] : '';

if (empty($email) || empty($password)) {
    echo 'Email and password are required.';
    exit;
}

$sql = "SELECT id, email, password FROM userdetails WHERE email = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $email);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows === 1) {
    $user = $result->fetch_assoc();
    if (password_verify($password, $user['password'])) {
        $_SESSION['authenticated'] = true;
        $_SESSION['email'] = $user['email'];
        header("Location: http://localhost/classassignment/student_details.html");
        exit();
    } else {
        echo 'Invalid email or password.';
        }

} else {
    echo 'Invalid email or password';
}

$stmt->close();
$conn->close();
?>