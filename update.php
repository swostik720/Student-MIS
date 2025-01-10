<?php
require 'connect.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $roll_number = $_POST['roll_number'];
    $faculty = $_POST['faculty'];
    $semester = $_POST['semester'];
    $section = $_POST['section'];
    $dob = $_POST['dob'];
    $gender = $_POST['gender'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $status = $_POST['status'];
    $photo = $_FILES['photo']['name'] ? 'photos/' . $_FILES['photo']['name'] : $_POST['existing_photo']; // Handle photo upload

    if ($_FILES['photo']['name']) {
        move_uploaded_file($_FILES['photo']['tmp_name'], 'photos/' . $_FILES['photo']['name']);
    }

    $sql = "UPDATE students SET
                name = '$name',
                roll_number = '$roll_number',
                faculty = '$faculty',
                semester = '$semester',
                section = '$section',
                dob = '$dob',
                gender = '$gender',
                email = '$email',
                phone = '$phone',
                address = '$address',
                status = '$status',
                photo = '$photo'
            WHERE id = $id";

    $query = mysqli_query($conn, $sql);

    if ($query) {
        header("Location: list.php");
        exit;
    } else {
        echo "Error updating record.";
    }
}
?>
