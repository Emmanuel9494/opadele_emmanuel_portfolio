<?php

// require_once('index.php');
require_once('submit.php');

///gather the form content
$fname = $_POST['first_name'];
$lname = $_POST['last_name'];
$email = $_POST['email'];
$msg = $_POST['comments'];

$errors = [];

//validate and clean these values

$fname = trim($fname);
$lname = trim($lname);
$email = trim($email);
$msg = trim($msg);

if(empty($lname)) {
    $errors['last_name'] = 'Last Name cant be empty';
}

if(empty($fname)) {
    $errors['first_name'] = 'First Name cant be empty';
}

if(empty($msg)) {
    $errors['comments'] = 'Comment field cant be empty';
}

if(empty($email)) {
    $errors['email'] = 'You must provide an email';
} else if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $errors['legit_email'] = 'You must provide a REAL email';
}

if(empty($errors)) {

    //insert these values as a new row in the contacts table, also preventing sql injection---preparing and binding parameters to the data type s=string, i=integers, b=binary, d=double(float)

    $stmt = $connect->prepare("INSERT INTO contacts (last_name, first_name, email, comments) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $lname, $fname, $email, $msg);
    $stmt->execute();

    if(mysqli_query($connect, $query)) {

//format and send these values in an email

$to = 'olatopmide@gmail.com';
$subject = 'Message from your Portfolio site!';

$message = "You have received a new contact form submission:\n\n";
$message .= "Name: ".$fname." ".$lname."\n";
$message .= "Email: ".$email."\n\n";
$message .= "Message: ".$msg."\n\n";
//build out rest of message body...

mail($to,$subject,$message);

header('Location: submit.php');
exit();

}else{
    for($i=0; $i < count($errors); $i++) {
        echo $errors[$i].'<br>';
    }
}

}


?>