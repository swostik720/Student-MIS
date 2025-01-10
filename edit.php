<?php
require 'connect.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Fetch existing data for the student
    $sql = "SELECT * FROM students WHERE id = $id";
    $query = mysqli_query($conn, $sql);

    if ($query && mysqli_num_rows($query) > 0) {
        $row = mysqli_fetch_assoc($query);
    } else {
        echo "Record not found!";
        exit;
    }
} else {
    echo "Invalid request!";
    exit;
}
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Edit Student Details</title>
        <link rel="stylesheet" type="text/css" href="./style.css">
    </head>
    <body>
        <h2>Edit Student Details</h2>
        <form action="update.php" method="post" enctype="multipart/form-data" onsubmit="return validateForm()">
            <!-- Hidden ID field -->
            <input type="hidden" name="id" value="<?php echo $row['id']; ?>">

            <!-- Name -->
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" value="<?php echo $row['name']; ?>" required><br><br>

            <!-- Roll Number -->
            <label for="roll_number">Roll Number:</label>
            <input type="text" id="roll_number" name="roll_number" value="<?php echo $row['roll_number']; ?>" required><br><br>

            <!-- Faculty -->
            <label for="faculty">Faculty:</label>
            <select id="faculty" name="faculty" required>
                <option value="CSIT" <?php echo ($row['faculty'] == 'CSIT') ? 'selected' : ''; ?>>CSIT</option>
                <option value="BBA" <?php echo ($row['faculty'] == 'BBA') ? 'selected' : ''; ?>>BBA</option>
                <option value="BIM" <?php echo ($row['faculty'] == 'BIM') ? 'selected' : ''; ?>>BIM</option>
            </select><br><br>

            <!-- Semester -->
            <label for="semester">Semester:</label>
            <select id="semester" name="semester" required>
                <?php for ($i = 1; $i <= 8; $i++) { ?>
                    <option value="<?php echo $i; ?>" <?php echo ($row['semester'] == $i) ? 'selected' : ''; ?>><?php echo $i; ?></option>
                <?php } ?>
            </select><br><br>

            <!-- Section -->
            <label for="section">Section:</label>
            <select id="section" name="section" required>
                <option value="A" <?php echo ($row['section'] == 'A') ? 'selected' : ''; ?>>A</option>
                <option value="B" <?php echo ($row['section'] == 'B') ? 'selected' : ''; ?>>B</option>
            </select><br><br>

            <!-- Date of Birth -->
            <label for="dob">Date of Birth:</label>
            <input type="date" id="dob" name="dob" value="<?php echo $row['dob']; ?>" required><br><br>

            <!-- Gender -->
            <label for="gender">Gender:</label>
            <input type="radio" id="male" name="gender" value="Male" <?php echo ($row['gender'] == 'Male') ? 'checked' : ''; ?>> Male
            <input type="radio" id="female" name="gender" value="Female" <?php echo ($row['gender'] == 'Female') ? 'checked' : ''; ?>> Female
            <input type="radio" id="other" name="gender" value="Other" <?php echo ($row['gender'] == 'Other') ? 'checked' : ''; ?>> Other<br><br>

            <!-- Email -->
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" value="<?php echo $row['email']; ?>" required><br><br>

            <!-- Phone -->
            <label for="phone">Phone:</label>
            <input type="tel" id="phone" name="phone" value="<?php echo $row['phone']; ?>" pattern="[0-9]{10}" required><br><br>

            <!-- Address -->
            <label for="address">Address:</label>
            <input type="text" name="address" value="<?php echo $row['address']; ?>" required><br><br>

            <!-- Status -->
            <label for="status">Status:</label>
            <select id="status" name="status" required>
                <option value="Active" <?php echo ($row['status'] == 'Active') ? 'selected' : ''; ?>>Active</option>
                <option value="Inactive" <?php echo ($row['status'] == 'Inactive') ? 'selected' : ''; ?>>Inactive</option>
            </select><br><br>

            <!-- Photo (optional) -->
            <label for="photo">Upload Photo:</label>
            <input type="file" id="photo" name="photo" accept="image/*"><br><br>

            <!-- Submit and Reset Buttons -->
            <input type="submit" value="Update">
            <input type="reset" value="Reset">
        </form>
    </body>
    <script src="./script.js"></script>
</html>
