<!DOCTYPE html>
<html>
  <head>
    <title> IRA SKINCARE </title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php
      require('includes/dependencies.php');
    ?>
    <link rel="stylesheet" href="styles/placeholder.css">
    <link rel="stylesheet" href="styles/content.css">
    <link rel="stylesheet" href="styles/animations.css">
  </head>
  <body>
  <?php
      include('handlers/dbHandler.php');
      if ($_SERVER['REQUEST_METHOD'] == 'POST') {
          $name = $_POST['name'];
          $username = $_POST['username'];
          $password = $_POST['password'];
          $email = $_POST['email'];
          $password = $_POST['password'];
          $password_repeat = $_POST['password_repeat'];
          $phone = $_POST['mobile'];
          $address = $_POST['address'];
          $image = file_get_contents($_FILES['imageInput']['tmp_name']);
          if($password === $password_repeat){
            try {
              $pdo = getPDOConnection();
              global $customerTable;
              createDatabase();
              createAllTable();  
              // SQL query to insert data into your table
              $sql = "INSERT INTO $customerTable (Customers_Name, Customers_Email, Customer_Image, Password ,Customers_Phone_Number,Customers_Contact_Info) VALUES (:name, :email, :image, :password, :phone_no,:address)";
              $stmt = $pdo->prepare($sql);
          
              // Bind parameters
              $stmt->bindParam(':name', $name);
              $stmt->bindParam(':email', $email);
              $stmt->bindParam(':image', $image);
              $stmt->bindParam(':password', $password);
              $stmt->bindParam(':phone_no', $phone);
              $stmt->bindParam(':address', $address);

              // Execute the query
              $stmt->execute();
          
              echo "Data inserted successfully.";
          } catch(PDOException $e) {
              echo "Error: " . $e->getMessage();
          }
            header('location: login.php');
          }
      }
      ?>
    <div class="content-for-footer">
    <?php
    include('utils/navigationbar.php')
    ?>
      

    <div>
      <input class="form-control" type="text" placeholder=" Provide your information to register ...." readonly>
    </div>
    <section class="my-5">
      <div class="py-5 fade-in">
        <h1 class=text-center> Registration Form</h1>
      </div>
      <div class="w-50 m-auto">
        <form action="register.php" method="POST" enctype="multipart/form-data">

          <div class="row justify-content-center align-items-center min-vh-100">
            <div class="col-md-4 text-center shrink-image">
              <div id="placeholder" class="rounded-circle">
                <img src="images/placeholder.jpg" alt="Click to upload" id="placeholderImage" class="rounded-circle">
              </div>
              <input type="file" name="imageInput" id="imageInput" accept="image/*" class="form-control-file" required>
            </div>
          </div>

          <div class="form-group">
            <level> Full Name</level>
            <input type="text" name="name" autocomplete="off" class="form-control">

          </div>
          <div class="form-group">
            <level> Username</level>
            <input type="text" name="username" autocomplete="off" class="form-control">

          </div>

          <div class="form-group">
            <level> Email</level>
            <input type="text" name="email" autocomplete="off" class="form-control">

          </div>

          <div class="form-group">
            <level> Password</level>
            <input type="text" name="password" autocomplete="off" class="form-control">

          </div>
          <div class="form-group">
            <level> Confirm Password</level>
            <input type="text" name="password_repeat" autocomplete="off" class="form-control">

          </div>

          <div class="form-group">
            <level> Phone number</level>
            <input type="text" name="mobile" autocomplete="off" class="form-control">

          </div>
          <div class="form-group">
            <level> Address</level>
            <input type="text" name="address" autocomplete="off" class="form-control">
          </div>

          <div class="py-5">
            <button type="submit" class="btn btn-primary">Register</button>
          </div>
        </form>
    </section>
    
    <script>
      document.getElementById('placeholder').addEventListener('click', function() {
        document.getElementById('imageInput').click();
      });

      document.getElementById('imageInput').addEventListener('change', function(event) {
        const file = event.target.files[0];
        if (file) {
          const reader = new FileReader();
          reader.onload = function(e) {
            document.getElementById('placeholderImage').src = e.target.result;
          };
          reader.readAsDataURL(file);
        }
      });
    </script>
    </div>
    <?php
          require('utils/footer.php');
          ob_end_flush();
      ?>

  </body>

</html>