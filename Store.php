<!DOCTYPE html>
<html>

<head>
    <title>Chipset</title>
    <link rel="stylesheet" href="css/Store1.css" />
</head>

<body>

    <?php
        include 'includes/navbar.php';
        require 'includes/productInfo.php';
        require 'includes/function.php';
    ?>
    <div class="store">
        <?php include 'includes/filter.php'; ?>
    
        <div class="items">
            <?php 
                $searchQuery = $_GET['search'] ?? '';
                $selectedCategory = $_GET['category'] ?? '';

                foreach ($products as $product): 
                    list($name, $image, $seller, $price, $category) = $product;
                    
                    // Apply search and filter logic
                    if (
                        ($searchQuery === '' || stripos($name, $searchQuery) !== false) &&
                        ($selectedCategory === '' || $selectedCategory === $category)
                    ):
            ?>
                <div class="frame" onclick="openCartPage('<?= $name ?>', '<?= $image ?>', '<?= $seller ?>', '<?= $price ?>', '<?= $category ?>')">
                    <img src="images/<?= $image ?>" alt="<?= $name ?>">
                    <div class="description">
                        <div class="text"><?= $name ?></div>
                        <div class="options"><button>&#x1F6D2</button></div>
                        <div class="seller"><?= $seller ?></div>
                        <div class="end">
                            <div class="rating">★★★★★</div>
                            <div class="price">Rs. <?= $price ?></div>
                        </div>
                    </div>
                </div>
            <?php endif; endforeach; ?>
        </div>
        <script src="js/function.js"></script>
    </div>
</body>
</html>
