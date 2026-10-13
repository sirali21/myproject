<?php
$lastName = $_POST['lastName'] ?? '';
$email = $_POST['email'] ?? '';
$firstName = $_POST['firstName'] ?? '';

$errors = [
    'firstNameError' => '',
    'lastNameError' => '',
    'emailError' => '',
];

if (isset($_POST['submit'])) {




    //تحقق الاسم الاول
    if (empty($firstName)) {
        $errors['firstNameError'] = 'first name empty';
        // تحقق الاسم الاخير 
    }
    if (empty($lastName)) {
        $errors['lastNameError'] = 'last name empty';
        // تحقق الايميل 
    }
    if (empty($email)) {
        $errors['emailError'] = 'email empty';
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors['emailError'] = 'email incorrect';
    }
    if (!array_filter($errors)) {
        $lastName = mysqli_real_escape_string($conn, $_POST['lastName'] ?? null);
        $email = mysqli_real_escape_string($conn, $_POST['email'] ?? null);
        $firstName = mysqli_real_escape_string($conn, $_POST['firstName'] ?? null);
        $sql = "INSERT INTO users(firstName,lastName,email)
 VALUES ('$firstName','$lastName','$email')";
        if (mysqli_query($conn, $sql)) {
           header("Location: " . $_SERVER['PHP_SELF']);
exit;

        }
    }
 
}