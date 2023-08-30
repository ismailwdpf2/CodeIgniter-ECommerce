<?= $this->extend('Layouts/ecom.php') ?>

<?= $this->section('content') ?>
<div class="container">
    <div class="row">
        <div class="col-2">
            <p><b>Sub-Category</b></p>
            <hr>
            <?php foreach ($subcats as $row) : ?>
                <a href="<?= base_url('user/products/' . $row['id']) ?>">
                    <ul>
                        <li><?= $row['name'] ?></li>
                    </ul>
                </a>
            <?php endforeach; ?>
        </div>
        <div class="col-8">
            <h3>All Products from category</h3>
           
            <div class="row">
          
               
                    <div class="d-flex">
                    <?php foreach ($products as $row) : ?>
                        <div class="card col-3 m-2 p-2">
                        
                            <a href="<?= base_url('singal/product/' . $row['id']) ?>">
                                <img src="<?= base_url('storage/' . $row['image_name']) ?>" class="card-img-top p-2" alt="...">
                                <div class="card-body">
                                    <h6 class="card-title"><?= $row['name'] ?></h6>
                                </div>
                                <div>
                                    <p>Price: <?= $row['price'] ?></p>
                                    <p>Discount: <?= $row['discount'] ?></p>
                                    <p>Quantity: <?= $row['quantity'] ?></p>
                                    <button class="btn btn-outline-primary add-to-cart-btn" data-product-id="<?= $row['id'] ?>" data-product-name="<?= $row['name'] ?>" data-product-price="<?= $row['price'] ?>" data-product-quantity="<?= $row['quantity'] ?>"><i class="fa-solid fa-cart-shopping"></i></button>

                                    <!-- <button class="btn allpbutton cart_btn">Add to Cart</button> -->

                                </div>
                            </a>
                        </div>

                    <?php endforeach; ?>
                    </div>
            </div>
        </div>
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