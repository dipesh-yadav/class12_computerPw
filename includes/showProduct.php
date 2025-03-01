<div class="items">
    <?php 
        require 'productInfo.php';
        foreach ($products as $product): 
            list($name, $image, $seller, $price, $category, $description) = $product;
            $escapedDescription = htmlspecialchars($description, ENT_QUOTES); // Fix escaping
    ?>

    <div class="frame" onclick="openCartPage(
            '<?= $name ?>',
            '<?= $image ?>',
            '<?= $seller ?>',
            '<?= $price ?>',
            '<?= $escapedDescription ?>'
        )">

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
        <script src="./js/function.js"></script>
    </div>
        <?php endforeach; ?>
    
</div>