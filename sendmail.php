<?php

require_once('submit.php'); // Ensure this contains the PDO connection as $connect

// Gather the form content
$fname = $_POST['first_name'];
$lname = $_POST['last_name'];
$email = $_POST['email'];
$msg = $_POST['comments'];

$errors = [];

// Validate and clean these values
$fname = trim($fname);
$lname = trim($lname);
$email = trim($email);
$msg = trim($msg);

if (empty($lname)) {
    $errors['last_name'] = 'Last Name can\'t be empty';
}

if (empty($fname)) {
    $errors['first_name'] = 'First Name can\'t be empty';
}

if (empty($msg)) {
    $errors['comments'] = 'Comment field can\'t be empty';
}

if (empty($email)) {
    $errors['email'] = 'You must provide an email';
} else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $errors['legit_email'] = 'You must provide a REAL email';
}

if (empty($errors)) {
    try {
        // Insert these values as a new row in the contacts table
        $stmt = $connect->prepare("INSERT INTO contacts (last_name, first_name, email, comments) VALUES (?, ?, ?, ?)");
        $stmt->bindParam(1, $_POST['last_name'], PDO::PARAM_STR);
        $stmt->bindParam(2, $_POST['first_name'], PDO::PARAM_STR);
        $stmt->bindParam(3, $_POST['email'], PDO::PARAM_STR);
        $stmt->bindParam(4, $_POST['comments'], PDO::PARAM_STR);

        $stmt->execute();

        // Format and send these values in an email
        $to = 'olatopmide@gmail.com';
        $subject = 'Message from your Portfolio site!';
        $message = "You have received a new contact form submission:\n\n";
        $message .= "Name: " . $fname . " " . $lname . "\n";
        $message .= "Email: " . $email . "\n\n";
        $message .= "Message: " . $msg . "\n\n";
        mail($to, $subject, $message);

        header('Location: submit.php');
        exit();
    } catch (Exception $e) {
        error_log($e->getMessage());
        exit('Error occurred while processing the form. Please try again later.');
    }
} else {
    // Print validation errors
    foreach ($errors as $error) {
        echo $error . '<br>';
    }
}
?>
