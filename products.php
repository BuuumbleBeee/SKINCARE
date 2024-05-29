<!DOCTYPE html>
<html>

<head>
  <title> IRA SKINCARE </title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" href="styles/content.css">
  <link rel="stylesheet" type="text/css" href="styles/styles.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
  <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
  <style>
    .dropdown-menu{
      max-height:200px;
      overflow-y:auto;
    }
  </style>
     <?php
            require('handlers/dbHandler.php');
            global $productTable;
            $pdo = getPDOConnection();
            $sql = "SELECT * FROM $productTable";
            $stmt = $pdo->query($sql);
            $items = $stmt->fetchAll(PDO::FETCH_ASSOC);
        ?>
</head>

<body>

  <div class="content-for-footer">
    <?php
      include 'utils/navigationbar.php'
    ?>

    <section class="my-5">
      <div class="container-fluid mt-5">
          <div class="input-group mb-3">
            <div class="input-group-prepend">
                  <button class="btn btn-outline-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">                      
                  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <a class="dropdown-item" href="" data-sort="option1">Cleansers</a>
                    <a class="dropdown-item" href="" data-sort="option2">Exfoliators</a>
                    <a class="dropdown-item" href="" data-sort="option3">Toners</a>
                    <a class="dropdown-item" href="" data-sort="option4">Serums</a>
                    <a class="dropdown-item" href="" data-sort="option5">Sunscreens</a>
                    <a class="dropdown-item" href="" data-sort="option6">Lip Care</a>
                    <a class="dropdown-item" href="" data-sort="option7">Eye Care</a>
                  </div>
            </div>
              <input type="text" class="form-control" placeholder="Search" id = "search-input">
              <div class="input-group-append">
                  <button class="btn btn-outline-secondary" type="button">
                      <i class="fas fa-search"></i>
                  </button>
              </div>
          </div>
          <h1 class="mb-5">Available Products</h1>
            <?php if (!empty($items)) : ?>
                <div class="row">
                    <?php foreach ($items as $item) : ?>
                        <div class="col-md-4">
                            <a href="item_details_product.php?id=<?php echo $item['Products_ID']; ?>" class="item-link grow-image">
                                <div class="card item-card">
                                    <?php if ($item['Product_Image']) : ?>
                                        <img src="data:image/jpeg;base64,<?php echo base64_encode($item['Product_Image']); ?>" alt="Item Image" class="card-img-top item-image">
                                    <?php else : ?>
                                        <img src="default_image.png" alt="Default Image" class="card-img-top item-image">
                                    <?php endif; ?>
                                    <div class="card-body">
                                        <h5 class="card-title"><?php echo htmlspecialchars($item['Products_Name']); ?></h5>
                                        <p class="card-text"><?php echo htmlspecialchars($item['Products_Description']); ?></p>
                                    </div>
                                </div>
                            </a>
                        </div>
                    <?php endforeach; ?>
                </div>
            <?php else : ?>
                <p>No items found.</p>
            <?php endif; ?>
        </div>
      </div>
    </section>
  </div>

  <?php
    require('utils/footer.php');
  ?>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
    <script>
    $(document).ready(function(){
      const searchInput = $('#search-input');
            const listItems = $('#list-items .list-item');

            // Handle sorting
            $('.dropdown-item').on('click', function() {
                const sortBy = $(this).data('sort');
                const sortedItems = listItems.sort((a, b) => {
                    return $(a).data(sortBy) - $(b).data(sortBy);
                });

                $('#list-items').html(sortedItems);
            });

            // Handle search input
            searchInput.on('input', function() {
                const query = $(this).val().toLowerCase();
                listItems.each(function() {
                    const itemText = $(this).text().toLowerCase();
                    $(this).toggle(itemText.indexOf(query) !== -1);
                });
            });
    });
  </script>
</body>

</html>