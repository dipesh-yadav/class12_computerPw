//FOR ./includes/filter.php

function applyFilter() {
    var searchQuery = document.getElementById("search_box").value;
    var category = document.getElementById("category_filter").value;
    window.location.href = "./Store.php?search=" + encodeURIComponent(searchQuery) + "&category=" + encodeURIComponent(category);
}

//FOR ./includes/showProduct.php

function openCartPage(name, image, seller, price, description) {
    window.location.href = "./Cart.php?name=" + encodeURIComponent(name) +
        "&image=" + encodeURIComponent(image) +
        "&seller=" + encodeURIComponent(seller) +
        "&price=" + encodeURIComponent(price) +
        "&description=" + encodeURIComponent(description);
}


