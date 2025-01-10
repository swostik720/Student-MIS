function validateForm() {
    let name = document.getElementById('name').value;
    let rollNumber = document.getElementById('roll_number').value;
    let faculty = document.getElementById('faculty').value;
    let semester = document.getElementById('semester').value;
    let section = document.getElementById('section').value;
    let dob = document.getElementById('dob').value;
    let gender = document.querySelector('input[name="gender"]:checked');
    let email = document.getElementById('email').value;
    let phone = document.getElementById('phone').value;
    let address = document.getElementById('address').value;
    let photo = document.getElementById('photo').files.length;

    // Check if any required field is empty or invalid
    if (name == '' || rollNumber == '' || faculty == '' || semester == '' || section == '' || dob == '' || !gender || email == '' || phone == '' || address == '') {
        alert("Please fill in all the required fields.");
        return false;
    }

    // Validate phone number (10 digits)
    let phonePattern = /^[0-9]{10}$/;
    if (!phone.match(phonePattern)) {
        alert("Please enter a valid 10-digit phone number.");
        return false;
    }

    // Validate email format
    let emailPattern = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6}$/;
    if (!email.match(emailPattern)) {
        alert("Please enter a valid email address.");
        return false;
    }

    // Validate photo (optional, but if selected, it must be an image)
    if (photo > 0) {
        let file = document.getElementById('photo').files[0];
        let fileType = file['type'];
        let validImageTypes = ['image/jpeg', 'image/png', 'image/gif'];
        if (!validImageTypes.includes(fileType)) {
            alert("Please upload a valid image (JPEG, PNG, GIF).");
            return false;
        }
    }

    return true;
}