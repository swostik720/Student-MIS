<!DOCTYPE html>
<html>
    <head>
        <title>Student Details</title>
        <link rel="stylesheet" type="text/css" href="./style.css">
    </head>
    <body>
        <h2>Student Details Form</h2>
        <form action="submit.php" method="post" enctype="multipart/form-data" onsubmit="return validateForm()">
            <!-- Name -->
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" required><br><br>

            <!-- Roll Number -->
            <label for="roll_number">Roll Number:</label>
            <input type="text" id="roll_number" name="roll_number" required><br><br>

            <!-- Faculty -->
            <label for="faculty">Faculty:</label>
            <select id="faculty" name="faculty" required>
                <option value="">-- Select Faculty --</option>
                <option value="CSIT">CSIT</option>
                <option value="BBA">BBA</option>
                <option value="BIM">BIM</option>
            </select><br><br>

            <!-- Semester -->
            <label for="semester">Semester:</label>
            <select id="semester" name="semester" required>
                <option value="">-- Select Semester --</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
                <option value="6">6</option>
                <option value="7">7</option>
                <option value="8">8</option>
            </select><br><br>

            <!-- Section -->
            <label for="section">Section:</label>
            <select id="section" name="section" required>
                <option value="">-- Select Section --</option>
                <option value="A">A</option>
                <option value="B">B</option>
            </select><br><br>

            <!-- Date of Birth -->
            <label for="dob">Date of Birth:</label>
            <input type="date" id="dob" name="dob" required><br><br>

            <!-- Gender -->
            <label for="gender">Gender:</label>
            <input type="radio" id="male" name="gender" value="Male" required> Male
            <input type="radio" id="female" name="gender" value="Female"> Female
            <input type="radio" id="other" name="gender" value="Other"> Other<br><br>

            <!-- Email -->
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required><br><br>

            <!-- Phone -->
            <label for="phone">Phone:</label>
            <input type="tel" id="phone" name="phone" pattern="[0-9]{10}" required>
            <small>Format: 10 digits</small><br><br>

            <!-- Address -->
            <label for="address">Address:</label>
            <input type="text" id="address" name="address" required><br><br>

            <!-- Status -->
            <label for="status">Status:</label>
            <select id="status" name="status" required>
                <option value="Active" class="active">Active</option>
                <option value="Inactive" class="inactive">Inactive</option>
            </select><br><br>

            <!-- Photo -->
            <label for="photo">Upload Photo:</label>
            <input type="file" id="photo" name="photo" accept="image/*" required><br><br>

            <!-- Submit and Reset Buttons -->
            <input type="submit" value="Submit">
            <input type="reset" value="Reset">
        </form>
    </body>
    <script src="./script.js"></script>
</html>
