<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>IRA SKINCARE</title>
    <link rel="stylesheet" href="styles/content.css">
    <link rel="stylesheet" href="styles/animations.css">
    <?php
        require('handlers/dbHandler.php');

        require('includes/dependencies.php');
    ?>
    <style>
        .facts-container {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
            margin-bottom: 20px;
            margin-top: 20px;
        }
        .fact {
            background-color: #96d2d4;
            text-size-adjust: 30px;
            padding: 15px;
            border-radius: 5px;
            font-size: 25px;
            font-family:'Times New Roman', Times, serif;
            flex: 1 1 calc(33.333% - 20px);
            box-sizing: border-box;
            height: 320px; /* Adjust height as needed */
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
        }
        .container-box {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
            margin-bottom: 20px;
        }
        .box {
            background-color: #f8f9fa;
            padding: 15px;
            border-radius: 5px;
            flex: 1 1 calc(33.333% - 20px);
            box-sizing: border-box;
            height: 250px; /* Adjust height as needed */
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            text-align: center;
        }
        @media (max-width: 768px) {
            .box {
                flex: 1 1 calc(50% - 20px);
            }
        }
        @media (max-width: 576px) {
            .box {
                flex: 1 1 100%;
            }
        }
        .box img {
            width: 100px;
            height: 100px;
            object-fit: cover;
            border-radius: 5px;
        }
        .box .content {
            margin-top: 10px;
            width: 100%;
        }
        .box .content p {
            font-size: 14px; /* Adjust font size as needed */
            margin: 5px 0;
        }
        .news-article, .blog-post {
            margin-bottom: 20px;
        }
        .news-article img, .blog-post img {
            max-width: 100%;
            height: auto;
        }
    </style>
</head>
<body>


    <div class="content-for-footer">
    <div class="container mt-5" style="padding-top: 70px;">
        
        <h2 class="mb-5 fade-in">Products</h2>
        <div id="products" class="container-box slide-in"></div>
        <h2 class="mb-5 fade-in">Brands</h2>
        <div id="brands" class="container-box slide-in"></div>
    </div>
    </div>  
    <?php
        require('utils/footer.php');
    ?>
</body>
</html>