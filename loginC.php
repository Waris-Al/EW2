<?php
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $password = $_POST["password"];
    // Connect to database using PDO

    try {
        $conn = new PDO("sqlsrv:server = tcp:access4all.database.windows.net,1433; Database = ActionPoints", "groupthreeadmin", "%Pa55w0rd");
  
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Prepare and execute the query using bound parameters
        $stmt = $conn->prepare("SELECT id, email, btype FROM company WHERE email=:email AND pass=:password");
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':password', $password);
        $stmt->execute();

        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$result) {
            // Invalid login, redirect to login page with error message
            $_SESSION['error_message'] = "Wrong username or password";
            header("Location: login.php");
            exit();
        } else {
            // Valid login, set session variables and redirect to greeting page
            $_SESSION['id'] = $result['id'];
            header("Location: LoginGreeting.php?company=$email");
            exit();
        }

    } catch(PDOException $e) {
        // Database connection error, redirect to error page
        $_SESSION['error_message'] = "Failed to connect to database: " . $e->getMessage();
        header("Location: error.php");
        exit();
    }
}
?>
