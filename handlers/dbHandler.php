<?php
    // Database configuration
    $host = 'localhost';
    $db = 'skincare_shop';
    $user = 'root';
    $pass = '';
    $userTable = 'Users';
    $customerTable = 'Customers';
    $productTable = 'Products';
    $categoriesTable = "Categories";
    $brandsTable = "Brands";

    // DSN for connecting to MySQL server (without specifying a database)
    $dsn = "mysql:host=$host;charset=utf8mb4";

    // PDO options
    $options = [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    ];

    function getPDOConnection($useDb = true) {
        global $dsn, $user, $pass, $options, $db;
        static $pdo = null;
    
        if ($pdo === null) {
            $pdo = new PDO($dsn, $user, $pass, $options);
            if ($useDb) {
                $pdo->exec("USE $db");
            }
        }
        return $pdo;
    }

    // Function to create a PDO connection
    function createPDOConnection() {
        global $dsn, $user, $pass, $options;
        try {
            return new PDO($dsn, $user, $pass, $options);
        } catch (PDOException $e) {
            die('Connection failed: ' . $e->getMessage());
        }
    }

    // Function to create a database if it doesn't exist
    function createDatabase() {
        global $db;
        try {
            // Get the PDO instance without selecting the database
            $pdo = getPDOConnection(false);
    
            // Check if the database exists
            $stmt = $pdo->query("SHOW DATABASES LIKE '$db'");
            $databaseExists = $stmt->rowCount() > 0;
    
            // If the database does not exist, create it
            if (!$databaseExists) {
                $pdo->exec("CREATE DATABASE $db");
                // echo "Database '$db' created successfully.<br>";
            } else {
                // echo "Database '$db' already exists.<br>";
            }
        } catch (PDOException $e) {
            echo 'Connection failed: ' . $e->getMessage();
        }
    }

    // Function to create a table if it doesn't exist

    function createCustomerTable(){
        global $db,$customerTable;
        $pdo = getPDOConnection();

        $pdo->exec("USE $db");

        // Check if the table exists
        $sql = "SHOW TABLES LIKE :table_name";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':table_name', $customerTable);

        // Execute the query
        $stmt->execute();
        $tableExists = $stmt->rowCount() > 0;

        // If the table does not exist, create it
        if (!$tableExists) {
            $sql = "
            CREATE TABLE Customers (
                Customers_ID INTEGER AUTO_INCREMENT PRIMARY KEY NOT NULL, 
                Customers_Name VARCHAR(200) NOT NULL, 
                Customers_Phone_Number VARCHAR(20), 
                Customers_Email VARCHAR(200) UNIQUE, 
                Customers_Contact_Info VARCHAR(200), 
                Customer_Image LONGBLOB,
                Password VARCHAR(50)
            );";

            $pdo->exec($sql);
            echo "Table $customerTable created successfully.";
        } else {
            // echo "Table $customerTable already exists.";
        }
    }

    function createProductsTable(){
        global $db,$productTable;
        $pdo = getPDOConnection();

        $pdo->exec("USE $db");

        // Check if the table exists
        $sql = "SHOW TABLES LIKE :table_name";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':table_name', $productTable);

        // Execute the query
        $stmt->execute();
        $tableExists = $stmt->rowCount() > 0;

        // If the table does not exist, create it
        if (!$tableExists) {
            $sql = "
            CREATE TABLE $productTable (
                Products_ID INTEGER AUTO_INCREMENT PRIMARY KEY NOT NULL,
                Products_Name VARCHAR(200),
                Products_Description VARCHAR(200),
                Products_Price FLOAT,
                Product_Image LONGBLOB,
                Stock_Avaibility INTEGER
            )";

            $pdo->exec($sql);
            echo "Table $productTable created successfully.";
        } else {
            // echo "Table $productTable already exists.";
        }
    }

    function createCategoriesTable(){
        global $db,$categoriesTable,$productTable;
        $pdo = getPDOConnection();

        $pdo->exec("USE $db");

        // Check if the table exists
        $sql = "SHOW TABLES LIKE :table_name";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':table_name', $categoriesTable);

        // Execute the query
        $stmt->execute();
        $tableExists = $stmt->rowCount() > 0;

        // If the table does not exist, create it
        if (!$tableExists) {
            $sql = "
            CREATE TABLE $categoriesTable (
                Category_ID INTEGER AUTO_INCREMENT PRIMARY KEY NOT NULL,
                Category_Name VARCHAR(200),
                Category_Description VARCHAR(200),
                Products_ID INTEGER,
                FOREIGN KEY (Products_ID) REFERENCES $productTable(Products_ID) ON DELETE CASCADE ON UPDATE CASCADE
            );
            ";

            $pdo->exec($sql);
            echo "Table $categoriesTable created successfully.";
        } else {
            // echo "Table $categoriesTable already exists.";
        }
    }

    function createBrandsTable(){
        global $db,$brandsTable,$productTable;
        $pdo = getPDOConnection();

        $pdo->exec("USE $db");

        // Check if the table exists
        $sql = "SHOW TABLES LIKE :table_name";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':table_name', $brandsTable);

        // Execute the query
        $stmt->execute();
        $tableExists = $stmt->rowCount() > 0;

        // If the table does not exist, create it
        if (!$tableExists) {
            $sql = "
            CREATE TABLE $brandsTable (
                Brands_ID INTEGER AUTO_INCREMENT PRIMARY KEY NOT NULL,
                Brands_Name VARCHAR(200),
                Brands_Description VARCHAR(200),
                Products_ID INTEGER,
                FOREIGN KEY (Products_ID) REFERENCES $productTable(Products_ID) ON DELETE CASCADE ON UPDATE CASCADE
            )";

            $pdo->exec($sql);
            echo "Table $brandsTable created successfully.";
        } else {
            // echo "Table $brandsTable already exists.";
        }
    }

    function createAllTable(){
        createCustomerTable();
        createProductsTable();
        createBrandsTable();
        createCategoriesTable();
    }

?>
