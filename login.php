<!DOCTYPE html>
<html>

<head>
    <title> IRA SKINCARE </title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="styles/content.css">
    <link rel="stylesheet" href="styles/animations.css">
    <?php
    ob_start();
    session_start();
    require('includes/dependencies.php');
    require('handlers/dbHandler.php');
    ?>
</head>

<body class="fade-in">

    <div class="content-for-footer">
    <?php
        include('utils/navigationbar.php')
    ?>

    <?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $email = $_POST['email'];
        $password = $_POST['password'];
        createDatabase();
        createAllTable();   
        try {
            // PDO connection
            global $customerTable;
            $pdo = getPDOConnection();        
            // SQL query to retrieve user based on email
            $sql = "SELECT * FROM $customerTable WHERE Customers_Email = :email";
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(':email', $email);
            $stmt->execute();
        
            // Fetch the result
            $user = $stmt->fetch(PDO::FETCH_ASSOC);
        
            // Verify user
            if ($user) {
                // Password verification (string match)
                if ($user['Password'] === $password) {
                    // Authentication successful
                    header('location:dashboard.php');
                } else {
                    // Incorrect password
                    echo "Incorrect password.";
                }
            } else {
                // User not found
                echo "User not found with email: " . $email;
            }
        } catch(PDOException $e) {
            echo "Error: " . $e->getMessage();
        }     
    }
    ?>
    <section class="my-5">
        <div class="py-5">
            <h1 class=text-center> Login</h1>
        </div>
        <div class="w-50 m-auto">


            <form action="login.php" method="POST">

                <?php if (isset($_SESSION['error_message'])) : ?>
                    <div class="alert alert-danger">
                        <?php
                        echo htmlspecialchars($_SESSION['error_message']);
                        unset($_SESSION['error_message']);
                        ?>
                    </div>
                <?php endif; ?>
                <div class="form-group">
                    <level> Email</level>
                    <input type="text" name="email" autocomplete="off" class="form-control">

                </div>

                <div class="form-group">
                    <level> Password</level>
                    <input type="password" name="password" autocomplete="off" class="form-control">

                </div>

                <div class="form-group d-flex justify-content-between align-items-center">
                    <button type="submit" class="btn btn-primary">Login</button>
                    <a href="#" class="text-primary">Forgot Password?</a>
                </div>

            </form>
        </div>
    </section>
    </div>
    <?php
        require('utils/footer.php');
        ob_end_flush();
    ?>
</body>

</html>