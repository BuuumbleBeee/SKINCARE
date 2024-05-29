<!DOCTYPE html>
<html>

<head>
  <title> IRA SKINCARE </title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" href="styles/content.css">
  <?php
  require('includes/dependencies.php');
  ?>
</head>

<body>

  <div class="content-for-footer">
    <?php
    include 'utils/navigationbar.php'
    ?>

    <section class="my-5">
      <div class="py-5">
        <h3 class=text-center>About Us</h3>
      </div>
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-6 col-md-6 col-12">
            <img src="images/IMG 4.jpg" height="200" , class="img-fluid">
          </div>
          <div class="col-lg-6 col-md-6 col-12">
            <h1> IRA SKINCARE</h1>
            <p> Welcome to IRA SKINCARE! We are a small team passionate about helping you achieve healthy, beautiful skin. Our e-commerce site offers high-quality, natural skincare products that are perfect for all skin types. We believe in using the best ingredients from nature combined with scientific knowledge to create products that really work.

            We care deeply about our planet, so our products are cruelty-free and we use eco-friendly packaging whenever possible. Our goal is to provide you with great skincare products and excellent customer service.

            Thank you for choosing IRA SKINCARE. We're excited to be a part of your skincare journey!
            </p>
            <a href="register.php" class="btn btn-success"> Register </a>
          </div>
        </div>
      </div>
    </section>
  </div>

  <?php
  require('utils/footer.php');
  ?>
  
</body>

</html>