<!DOCTYPE html>
<html>

<head>
    <title>Chipset</title>
    <link rel="stylesheet" href="css/Store1.css" />
</head>

<body>

    <?php
        include 'navbar.php';
        require 'productInfo.php';
        require 'function.php';
    ?>

    <div class="store">

        <!-- FILTER -->
        <div class="filter">
            <div class="search">
                <input type="text" id="search_box"><button>Search</button>
            </div>
            <div class="filter_block">
                <?php
                $categories = ["Boards", "Modules", "Components", "Connectors", "Shields and Carriers", "Kits", "Accessories", "Tools", "Merchandise"];
                foreach ($categories as $category) {
                    echo "<div class='filter_element'>
                            <div class='text_element'>$category</div>
                            <div class='arrow_element'><button>&#8594</button></div>
                          </div>";
                }
                ?>
            </div>
        </div>
        <!-- FILTER END -->

        <!-- ITEMS -->
        <div class="items">
            <?php foreach ($products as $product): 
                list($name, $image, $seller, $price, $description) = $product;
                $escapedDescription = addslashes($description);
            ?>
                <div class="frame" onclick="openCartPage('<?= $name ?>', '<?= $image ?>', '<?= $seller ?>', '<?= $price ?>', '<?= $escapedDescription ?>')">
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
            <?php endforeach; ?>
        </div>
        <!-- ITEMS END -->

        <script>
        function openCartPage(name, image, seller, price, description) {
            window.location.href = "Cart.php?name=" + encodeURIComponent(name) +
                "&image=" + encodeURIComponent(image) +
                "&seller=" + encodeURIComponent(seller) +
                "&price=" + encodeURIComponent(price) +
                "&description=" + encodeURIComponent(description);
        }
        </script>

    </div>

</body>

</html>
