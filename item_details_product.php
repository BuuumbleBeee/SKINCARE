<?php
// Include the database configuration file
require('handlers/dbHandler.php');
require('includes/dependencies.php');

global $productTable;

if (isset($_GET['Products_ID'])) {
    $id = $_GET['Products_ID'];
    $sql = "SELECT * FROM $productTable WHERE Products_ID = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':id', $id);
    $stmt->execute();
    $item = $stmt->fetch(PDO::FETCH_ASSOC);
} else {
    echo 'Invalid request.';
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Item Details</title>

    <script src="script.js"></script>
    <link rel="stylesheet" href="styles/content.css">
    <link rel="stylesheet" href="styles/animations.css">
</head>

<body>
    <div class="content-for-footer">
    <?php
    require('utils/navigationbarlogin.php');
    ?>
    <div class="container mt-5" style="padding-top: 60px;">
        <div class="row">
            <div class="col-md-4 slide-in">
                <div class="card">
                    <?php if ($item['Product_Image']) : ?>
                        <img src="data:image/jpeg;base64,<?php echo base64_encode($item['Product_Image']); ?>" alt="Item Image" class="card-img-top">
                    <?php else : ?>
                        <img src="images/placeholder.jpg" alt="Profile Image" class="card-img-top">
                    <?php endif; ?>
                    <div class="card-body text-center">
                        <h5 class="card-title" id="profile-name"><?php echo htmlspecialchars($item['Products_Name']); ?></h5>
                    </div>
                </div>
            </div>
            <div class="col-md-8 slide-in-right">
                <div class="card">
                    <div class="card-header">
                        About Product
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">Description</h5>
                        <p class="card-text" id="profile-about"><?php echo htmlspecialchars($item['Products_Description']); ?></p>
                        
                    </div>

                </div>
                <div style="text-align: center;">
                    <a href="#" class="btn btn-primary" style="margin-top: 20px; width:30%; ">Back</a>
                    <?php if ($item['up_for_adoption']): ?>
                        <button id="cancel" class="btn btn-danger" style="margin-top: 20px; width:30%;">Cancel</button>
                    <?php else: ?>
                        <button id="putToCart" class="btn btn-success" style="margin-top: 20px; width:30%;">Add to Cart</button>
                    <?php endif; ?>
                </div>

            </div>

        </div>
    </div>

    </div>
    <?php
        require('utils/footer.php');
    ?>
</body>

</html>