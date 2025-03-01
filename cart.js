document.addEventListener("DOMContentLoaded", function () {
    document.querySelectorAll(".increase").forEach(button => {
        button.addEventListener("click", function () {
            let frame = this.closest(".c_frame");
            let cartId = frame.getAttribute("data-id");
            updateQuantity(cartId, 1);
        });
    });

    document.querySelectorAll(".decrease").forEach(button => {
        button.addEventListener("click", function () {
            let frame = this.closest(".c_frame");
            let cartId = frame.getAttribute("data-id");
            updateQuantity(cartId, -1);
        });
    });
});

function updateQuantity(cartId, change) {
    fetch("cart_backend.php", {
        method: "POST",
        headers: { "Content-Type": "application/json" },
        body: JSON.stringify({ action: "update", cartId, change })
    })
        .then(response => response.json())
        .then(data => {
            if (data.success) location.reload();
        });
}
