<?php
    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=UTF-8");

    // Database credentials
    $db_host = 'localhost';
    $db_user = 'root';
    $db_pass = '';
    $db_name = 'portfolio';

    try {
        // Connect to the database using PDO
        $pdo = new PDO("mysql:host=$db_host;dbname=$db_name;charset=utf8", $db_user, $db_pass, [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
        ]);
    } catch (PDOException $e) {
        die(json_encode(["error" => "Database connection failed."]));
    }

    // Gather and sanitize the form content
    $errors = [];
    $fname = trim($_POST['first_name'] ?? '');
    $lname = trim($_POST['last_name'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $msg = trim($_POST['comments'] ?? '');

    // Validate required fields
    if (empty($lname)) $errors[] = "Last name field is empty.";
    if (empty($fname)) $errors[] = "First name field is empty.";
    if (empty($msg)) $errors[] = "Comment field is empty.";
    if (empty($email)) $errors[] = "You must provide an email.";
    elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "\"$email\" is not a valid email address.";
    }

        // Return validation errors if any
        if (!empty($errors)) {
            echo json_encode(["errors" => $errors]);
            exit;
        }

    // Insert data into the database using prepared statements
    try {
    $stmt = $pdo->prepare("INSERT INTO contacts (first_name, last_name, email, comments) VALUES (:fname, :lname, :email, :msg)");
    $stmt->execute([
        ":fname" => $fname,
        ":lname" => $lname,
        ":email" => $email,
        ":msg" => $msg
    ]);
    // localhost cant process sendmail, so even if the form submits succefully, it will still print an error
    // Send an email notification
    // $to = 'contact@emmanuelopadele.com';
    // $subject = 'Message from your Portfolio site!';
    // $message = "You have received a new contact form submission:\n\n";
    // $message .= "Name: $fname $lname\n";
    // $message .= "Email: $email\n\n";
    // $message .= "Message: $msg\n\n";
    // mail($to, $subject, $message);

    // Suppress errors and handle mail sending failure manually
    // if (@mail($to, $subject, $message)) {
    //     echo json_encode(["message" => "Form submitted successfully. Thank you for your interest!"]);
    // } else {
    //     echo json_encode(["error" => "Failed to send email."]);
    // }


    // Send success response with redirect URL
    echo json_encode(["message" => "Form submitted successfully. Thank you for your interest!", "redirect" => "submit.php"]);
    exit;
   
} catch (PDOException $e) {
    echo json_encode(["error" => "Failed to submit form. Please try again later."]);
}
?>