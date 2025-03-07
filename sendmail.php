<?php
// header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Origin: https://emmanuelopadele.com");
header("Content-Type: application/json; charset=UTF-8");

// Database credentials Local
$db_host = 'localhost';
$db_user = 'usmubh24_general_user';
$db_pass = 'genuserOLA-ola94-9-4&mide@94';
$db_name = 'usmubh24_portfolio';

try {
    // Connect to database using PDO
    $pdo = new PDO("mysql:host=$db_host;dbname=$db_name;charset=utf8", $db_user, $db_pass, [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
    ]);
} catch (PDOException $e) {
    echo json_encode(["error" => "Database connection failed."]);
    exit;
}

// Sanitize and validate input
$errors = [];
$first_name = trim($_POST['first_name'] ?? '');
$last_name = trim($_POST['last_name'] ?? '');
$email  = trim($_POST['email'] ?? '');
$comments = trim($_POST['comments'] ?? '');

// Validate required fields
if (!$first_name) $errors[] = "First name field is empty.";
if (!$last_name) $errors[] = "Last name field is empty.";
if (!$email) $errors[] = "Email field is empty.";
elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $errors[] = "\"$email\" is not a valid email address.";
}
if (!$comments) $errors[] = "Comment field is empty.";

// Return validation errors if any
if (!empty($errors)) {
    echo json_encode(["errors" => $errors]);
    exit;
}

// Insert into database and send email
try {
    $stmt = $pdo->prepare("INSERT INTO contacts (first_name, last_name, email, comments) VALUES (:first_name, :last_name, :email, :comments)");
    $stmt->execute([
        ":first_name" => $first_name,
        ":last_name" => $last_name,
        ":email" => $email,
        ":comments" => $comments
    ]);

    // Prepare email notification
    $to = "contact@emmanuelopadele.com";  
    $subject = "New Message from Your Portfolio Website!";
    $message = "You have received a new contact form submission:\n\n";
    $message .= "Name: $first_name $last_name\n";
    $message .= "Email: $email\n\n";
    $message .= "Message:\n$comments\n\n";

    // Email headers
    $headers = "From: $email\r\n";
    $headers .= "Reply-To: $email\r\n";
    $headers .= "Content-Type: text/plain; charset=UTF-8\r\n";

    //Send email
    @mail($to, $subject, $message, $headers);

    // JS will handle errors if mail fails
    echo json_encode(["message" => "Form submitted successfully. Thank you for your interest!"]);

} catch (PDOException $e) {
    echo json_encode(["error" => "Failed to submit form. Please try again later."]);
}
?>
