<?php
session_start();

$conn = mysqli_connect('localhost', 'root', '', 'finalproject');
if (mysqli_connect_errno()) {
    exit('Failed to connect to MySQL: ' . mysqli_connect_error());
}

// Check for submitted form data
if (!isset($_POST['username'], $_POST['password'])) {
    exit('Please fill both the username and password fields!');
}

// Prepare statement for security
if ($stmt = $conn->prepare('SELECT id, password, role FROM data_user WHERE username = ?')) {
    $stmt->bind_param('s', $_POST['username']);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        $stmt->bind_result($id, $password, $role);
        $stmt->fetch();

        // Verify password using password_verify
        if (password_verify($_POST['password'], $password)) {
            // Successful login
            session_regenerate_id(); // Enhance security
            $_SESSION['loggedin'] = TRUE;
            $_SESSION['name'] = $_POST['username'];
            $_SESSION['id'] = $id;
            $_SESSION['role'] = $role; // Store user's role

            switch ($role) {
                case 'managerPengadaan':
                    header('Location: managerPengadaan.php');
                    exit();
                case 'vendor':
                    header('Location: vendor.php');
                    exit();
                case 'managerProyek':
                    header('Location: managerProyek.php');
                    exit();
                default:
                    // Handle unexpected roles or redirect to a default page
                    header('Location: default.php');
                    exit();
            }
        } else {
            // Incorrect password
            $error = 'Incorrect username and/or password!';
        }
    } else {
        // Incorrect username
        $error = 'Incorrect username and/or password!';
    }

    $stmt->close();
} else {
    // Handle statement preparation error
    $error = 'Internal error!';
}

// Display error message if any
if (isset($error)) {
    echo $error;
}
?>