<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ecomearce</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />


    <link rel="stylesheet" href="<?= base_url() ?>css/footer.css">

    <link rel="stylesheet" href="<?= base_url() ?>css/navbar.css">

</head>

<body>
<!-- navbar section -->

<nav class="navbar navbar-expand-lg">
    <div class="container-fluid mx-3">
        <a class="navbar-brand" href="<?= base_url('/') ?>">E-COMMERCE</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="<?= base_url('/') ?>">HOME</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= base_url('product-show') ?>">PRODUCT</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= base_url('/user/category') ?>">CATEGORY</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        MORE
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item nav-item" href="#">CONTACT US</a></li>
                        <li><a class="dropdown-item nav-item" href="#">ABOUT US</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item nav-item" href="#">HELP & SUPPORT</a></li>
                    </ul>
                </li>
            </ul>
            <a href="<?= base_url('/cart') ?>" class="cart-link">
                <i class="fa-solid fa-cart-plus me-2"></i>
                <span class="badge bg-primary cart-badge">0</span>
            </a>
            <ul>
                <li class=" dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="fa-sharp fa-solid fa-id-card"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end">
                        <li><a class="dropdown-item nav-item" href="<?= base_url('/login') ?>">Login</a></li>
                        <li><a class="dropdown-item nav-item" href="<?= base_url('/register') ?>">Registration</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item nav-item" href="<?= base_url('/logout') ?>">Log out</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>
	<!-- navbar section -->

    <!-- Dynamic condent -->
    <?= $this->renderSection('content') ?>
    <!-- Dynamic condent -->

    <!-- footer section -->

    <?= $this->include('Partial/footer') ?>
    <!-- footer section -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>

    <!-- add to cart section script -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const addToCartButtons = document.querySelectorAll('.add-to-cart-btn');
            const cartCountBadge = document.querySelector('.cart-badge');
            let cartCount = 0;
            let cartItems = [];

            addToCartButtons.forEach(function(button) {
                button.addEventListener('click', function(event) {
                    event.preventDefault();

                    // Add the product to the cart
                    // ...

                    cartCount++; // Increment the cart count
                    cartCountBadge.textContent = cartCount; // Update the badge with the new count

                    // Store the cartItems in localStorage
                    localStorage.setItem('cartItems', JSON.stringify(cartItems));
                });
            });

            const cartLink = document.querySelector('.cart-link');
            cartLink.addEventListener('click', function(event) {
                event.preventDefault();

                // Redirect to the cart page
                window.location.href = "<?= base_url('/cart') ?>";
            });
        });
    </script>
    <!-- add to cart section script -->

    <!-- add to cart section script -->
    <script src="<?= base_url() ?>js/cart.js"></script>
    <!-- add to cart section script -->




    <?= $this->renderSection('script') ?>
</body>

</html>