<?php
require 'connect.php';

echo "<link rel='stylesheet' type='text/css' href='style.css'>";

echo "<h2>Student Details</h2>";
echo "<button><a href='form.php'>Add New Student</a></button><br><br>";

$sql = "SELECT * FROM students";

$query = mysqli_query($conn, $sql);

if ($query && mysqli_num_rows($query) > 0) {
    echo "<table border='1' cellpadding='5' cellspacing='0'>";
    echo "<tr>
            <th>Name</th>
            <th>Roll Number</th>
            <th>Faculty</th>
            <th>Semester</th>
            <th>Section</th>
            <th>Date of Birth</th>
            <th>Gender</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Address</th>
            <th>Status</th>
            <th>Photo</th>
            <th>Actions</th>
          </tr>";

    while ($row = mysqli_fetch_assoc($query)) {
        echo "<tr>";
        echo "<td>" . $row['name'] . "</td>";
        echo "<td>" . $row['roll_number'] . "</td>";
        echo "<td>" . $row['faculty'] . "</td>";
        echo "<td>" . $row['semester'] . "</td>";
        echo "<td>" . $row['section'] . "</td>";
        echo "<td>" . $row['dob'] . "</td>";
        echo "<td>" . $row['gender'] . "</td>";
        echo "<td>" . $row['email'] . "</td>";
        echo "<td>" . $row['phone'] . "</td>";
        echo "<td>" . $row['address'] . "</td>";
        echo "<td>";
        if (strtolower($row['status']) == 'active') {
            echo "<span class='active'>" . $row['status'] . "</span>";
        } else {
            echo "<span class='inactive'>" . $row['status'] . "</span>";
        }
        echo "</td>";


        // Display photo if available
        echo "<td>";
        if ($row['photo']) {
            echo "<img src='" . $row['photo'] . "' alt='Photo' width='50' height='50'>";
        } else {
            echo "No photo";
        }
        echo "</td>";

        // Actions: Edit and Delete
        echo "<td>
                <a href='edit.php?id=" . $row['id'] . "'>Edit</a> | 
                <a href='delete.php?id=" . $row['id'] . "' onclick='return confirm(\"Are you sure you want to delete this record?\")'>Delete</a>
              </td>";
        echo "</tr>";
    }

    echo "</table>";
} else {
    echo "No records found.";
}

//mysqli_close($conn);
