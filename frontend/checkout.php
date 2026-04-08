<?php
session_start();
include __DIR__ . '/../backend/config/db.php';
include __DIR__ . '/../includes/header.php';
?>

<div class="checkout-box">
    <h2>Checkout</h2>

    <form id="orderForm">
        <input type="text" name="name" placeholder="Full Name" required>
        <input type="text" name="mobile" placeholder="Mobile Number" required>
        <textarea name="address" placeholder="Address" required></textarea>

        <button type="submit" class="btn0">Place Order</button>
    </form>
</div>

<!-- SweetAlert2 -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
document.addEventListener("DOMContentLoaded", function() {
    const orderForm = document.getElementById("orderForm");

    orderForm.addEventListener("submit", function(e) {
        e.preventDefault(); // prevent normal form submit

        let formData = new FormData(this);

        fetch("checkout_ajax.php", { // separate PHP file for AJAX processing
            method: "POST",
            body: formData
        })
        .then(res => res.json())
        .then(data => {
            if (data.status === "success") {
                orderForm.reset();
                Swal.fire({
                    title: 'Success!',
                    text: `Your order has been placed! 🎉\nOrder ID: ${data.order_id}`,
                    icon: 'success',
                    confirmButtonText: 'OK'
                });
            } else {
                Swal.fire({
                    title: 'Error!',
                    text: data.message || 'Failed to place order.',
                    icon: 'error',
                    confirmButtonText: 'OK'
                });
            }
        })
        .catch(err => {
            console.error(err);
            Swal.fire({
                title: 'Error!',
                text: 'Something went wrong!',
                icon: 'error',
                confirmButtonText: 'OK'
            });
        });
    });
});
</script>

<?php include('../includes/footer.php'); ?>