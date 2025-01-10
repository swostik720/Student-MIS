<?php
require 'connect.php';

if (isset($_POST) && !empty($_POST)) {
    // Sanitize inputs to prevent SQL injection
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $roll_number = mysqli_real_escape_string($conn, $_POST['roll_number']);
    $faculty = mysqli_real_escape_string($conn, $_POST['faculty']);
    $semester = mysqli_real_escape_string($conn, $_POST['semester']);
    $section = mysqli_real_escape_string($conn, $_POST['section']);
    $dob = mysqli_real_escape_string($conn, $_POST['dob']);
    $gender = mysqli_real_escape_string($conn, $_POST['gender']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $phone = mysqli_real_escape_string($conn, $_POST['phone']);
    $address = mysqli_real_escape_string($conn, $_POST['address']);
    $status = mysqli_real_escape_string($conn, $_POST['status']);

    // Handle file upload for photo
    if (isset($_FILES['photo']) && $_FILES['photo']['error'] === UPLOAD_ERR_OK) {
        $photo_name = $_FILES['photo']['name'];
        $photo_tmp_name = $_FILES['photo']['tmp_name'];
        $photo_path = "photos/" . $photo_name;

        // Move the uploaded photo to the 'uploads' directory
        if (move_uploaded_file($photo_tmp_name, $photo_path)) {
            // Insert data into the database
            $sql = "INSERT INTO students (name, roll_number, faculty, semester, section, dob, gender, email, phone, address, status, photo) 
                    VALUES ('$name', '$roll_number', '$faculty', '$semester', '$section', '$dob', '$gender', '$email', '$phone', '$address', '$status', '$photo_path')";
        } else {
            // If file upload fails, insert without photo
            $sql = "INSERT INTO students (name, roll_number, faculty, semester, section, dob, gender, email, phone, address, status) 
                    VALUES ('$name', '$roll_number', '$faculty', '$semester', '$section', '$dob', '$gender', '$email', '$phone', '$address', '$status')";
        }
    } else {
        // Insert data without a photo if no photo is uploaded
        $sql = "INSERT INTO students (name, roll_number, faculty, semester, section, dob, gender, email, phone, address, status) 
                VALUES ('$name', '$roll_number', '$faculty', '$semester', '$section', '$dob', '$gender', '$email', '$phone', '$address', '$status')";
    }

    // Execute the query
    $query = mysqli_query($conn, $sql);

    if ($query) {
        // Redirect to the list page if successful
        header("Location: list.php");
        exit;
    } else {
        // Redirect back to the form page if there's an error
        header("Location: form.php");
        exit;
    }
}
