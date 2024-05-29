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
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <?php
        include('utils/navigationbarcustomer.php');
    ?>

    <div class="content-for-footer">
    <div class="container mt-5" style="padding-top: 70px;">
        
        <h2 class="mb-5 fade-in">Products</h2>
        <div id="products" class="container-box slide-in">
        <div id="product-detail-container"></div>

            <script>
  document.addEventListener('DOMContentLoaded', function() {
            fetch('fetch_products.php')
                .then(response => response.json())
                .then(data => {
                    const container = document.getElementById('product-detail-container');
                    
                    if (data.length === 0) {
                        const noProductsMessage = document.createElement('p');
                        noProductsMessage.textContent = "No products to show";
                        noProductsMessage.className = 'no-products-message';
                        container.appendChild(noProductsMessage);
                        return;
                    }

                    data.forEach(product => {
                        const productDiv = document.createElement('div');
                        productDiv.className = 'product-card';

                        const img = document.createElement('img');
                        img.src = `data:image/jpeg;base64,${product.Product_Image}`;
                        img.alt = product.Products_Name;
                        productDiv.appendChild(img);

                        const infoDiv = document.createElement('div');
                        infoDiv.className = 'product-info';

                        const name = document.createElement('h3');
                        name.textContent = product.Products_Name;
                        infoDiv.appendChild(name);

                        const description = document.createElement('p');
                        description.textContent = product.Products_Description;
                        infoDiv.appendChild(description);

                        const price = document.createElement('p');
                        price.textContent = `$${product.Products_Price}`;
                        infoDiv.appendChild(price);

                        const stock = document.createElement('p');
                        stock.textContent = `Stock: ${product.Stock_Avaibility}`;
                        infoDiv.appendChild(stock);

                        const addToCartButton = document.createElement('button');
                        addToCartButton.textContent = 'Add to Cart';
                        addToCartButton.className = 'add-to-cart';
                        addToCartButton.onclick = function(event) {
                            event.stopPropagation();
                            addToCart(product.Products_ID);
                        };
                        infoDiv.appendChild(addToCartButton);

                        productDiv.appendChild(infoDiv);

                        productDiv.onclick = function() {
                            window.location.href = `product_detail.html?id=${product.Products_ID}`;
                        };

                        container.appendChild(productDiv);
                    });
                })
                .catch(error => console.error('Error fetching products:', error));
        });

        function addToCart(productId) {
            console.log(`Product ${productId} added to cart`); // Implement your add to cart logic here
        }
            </script>
        </div>

    </div>
    </div>  
    <?php
        require('utils/footer.php');
    ?>
</body>
</html>