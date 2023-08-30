<?= $this->extend('Layouts/ecom.php') ?>

<?= $this->section('content') ?>
<style>
	/* singlepost.css */

.container {
    margin-top: 20px;
		align-items: center;
}

.row {
    display: flex;
    justify-content: center;
}

.img {
    width: 100%;
    height: auto;
}

ul {
    list-style-type: none;
    padding: 0;
}

ul li {
    margin-bottom: 10px;
}

/* Add your own custom CSS styles here */

/* End of singlepost.css */

</style>
<div class="container">
	<div class="row">
	<?php foreach ($product as $row) : ?>
		<div class="d-flex">
			<div class="col-3 mx-3">
				<img class="img " src="<?= base_url('storage/' . $row['imagename']) ?>" alt="">" 
			</div>
			<div class="col-7 ">

				<h2>Product Details</h2>
			
				<ul>
					<li>ID: <?= $row['id'] ?></li>
					<li>Name: <?= $row['name'] ?></li>
					<li>Description: <?= $row['description'] ?></li>
					<li>Category: <?= $row['catname'] ?></li>
					<li>Price: <?= $row['price'] ?></li>
					<li>Discount: <?= $row['discount'] ?></li>				
					<li>Quantity: <?= $row['quantity'] ?></li>	
					<li><button class="btn btn-outline-primary add-to-cart-btn" data-product-id="<?= $row['id'] ?>" data-product-name="<?= $row['name'] ?>" data-product-price="<?= $row['price'] ?>" data-product-quantity="<?= $row['quantity'] ?>"><i class="fa-solid fa-cart-shopping"></i></button></li>											
				</ul>

				<!-- Add any other product details you want to display -->
			</div>
		</div>
		<?php endforeach; ?>
	</div>
</div>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const addToCartButtons = document.querySelectorAll('.add-to-cart-btn');
        const cartCountBadge = document.getElementById('cartCountBadge');
        const cartItems = [];

        addToCartButtons.forEach(function(button) {
            button.addEventListener('click', function(event) {
                event.preventDefault();

                const productId = button.getAttribute('data-product-id');
                const productName = button.getAttribute('data-product-name');
                const productPrice = button.getAttribute('data-product-price');
                const productQuantity = button.getAttribute('data-product-quantity');

                // Add the product to the cartItems array
                cartItems.push({
                    id: productId,
                    name: productName,
                    price: productPrice,
                    quantity: productQuantity
                });

                // Increment the cart count
                cartCountBadge.textContent = cartItems.length;
            });
        });

        // Store the cartItems in localStorage or pass them to the server
        // ...

    });
</script>
<?= $this->endSection() ?>