
<?= $this->extend('Layouts/ecom.php') ?>

<?= $this->section('content') ?>
<link rel="stylesheet" href="<?= base_url() ?>css/card.css">


<div class="container">
	<div class="row">
		<?php foreach ($product as $row) : ?>
			<div class="col-3 card">
            <a href="<?= base_url('singal/product/'. $row['id']) ?>">
				<figure class="figure">

					<img class="cardimg" src="<?= base_url('storage/' . $row['imagename']) ?>" alt="">

					<figcaption>
					<div class="card-body">
                                <h6 class="card-title"><?= $row['name'] ?></h6>
                            </div>
                            <div>
                                <p>Price: <?= $row['price'] ?></p>
                                <p>Discount: <?= $row['discount'] ?></p>
                                <p>Quantity: <?= $row['quantity'] ?></p>
						<button class="btn btn-outline-primary add-to-cart-btn" data-product-id="<?= $row['id'] ?>" data-product-name="<?= $row['name'] ?>" data-product-price="<?= $row['price'] ?>" data-product-quantity="<?= $row['quantity'] ?>"><i class="fa-solid fa-cart-shopping"></i></button>
					</figcaption>
					<a href="#"></a>
				</figure>
            </a>
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