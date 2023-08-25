<!DOCTYPE html>
<html>

<head>
    <title>Insert User - Admin Panel</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
</head>

<body>

<div class="nav">
    <a href="admin.php">Home</a>
    <a class="active" href="insert_users.php">Add User</a>
    <a href="index.php" id="loginLink">Logout</a>
</div>

<div class="mainsection">
    <div class="instructions">
        <h2>Insert New User</h2>
        <form action="insert_users.php" method="post">
            <label for="stID">Student_ID:</label>
            <input type="text" id="stID" name="stID" required>
            <br>
            <label for="stFirstName">Student_FirstName:</label>
            <input type="text" id="stFirstName" name="stFirst" required>
            <br>
            <label for="stSecondName">Student_SecondName:</label>
            <input type="text" id="stSecondName" name="stSecond" required>
            <br>
            <label for="stFamilyName">Student_FamilyName:</label>
            <input type="text" id="stFamilyName" name="stFamily" required>
            <br>
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>
            <br>
            <button type="submit">Add User</button>
        </form>
    </div>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Establish a database connection
        $conn = mysqli_connect('localhost:3306', 'root', 'root', 'sopDB');
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Get user input from the form
        $userID = $_POST['stID'];
        $userFN = $_POST['stFirst'];
        $userSN = $_POST['stSecond'];
        $userFAN = $_POST['stFamily'];
        $password = $_POST['password'];

        // Hash the password using password_hash
        $hashedPassword = sha1($password);

        // Prepare and execute the SQL query to insert the user
        $sql = "INSERT INTO user (stNumber, stFirstName, stSecondName, stFamilyName, stPassWord, stPassText) 
                VALUES (?, ?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssssss", $userID, $userFN, $userSN, $userFAN, $hashedPassword, $password);

        if ($stmt->execute()) {
            echo "User inserted successfully.";
        } else {
            echo "Error inserting user: " . $stmt->error;
        }

        // Close the database connection and the prepared statement
        $stmt->close();
        $conn->close();
    }
    ?>
</div>

</body>

</html>
