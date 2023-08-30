<?php
$cartItems = session('cartItems') ?? [];
?>

<table>
    <thead>
        <tr>
            <th>Name</th>
            <th>Price</th>
            <th>Quantity</th>
            <th>Total</th>
        </tr>
    </thead>
    <tbody>
        <?php if (!empty($cartItems)) : ?>
            <?php foreach ($cartItems as $item) : ?>
                <tr>
                    <td><?= $item['name'] ?></td>
                    <td><?= $item['price'] ?></td>
                    <td><?= $item['quantity'] ?></td>
                    <td><?= $item['price'] * $item['quantity'] ?></td>
                </tr>
            <?php endforeach; ?>
        <?php else : ?>
            <tr>
                <td colspan="4">Cart is empty</td>
            </tr>
        <?php endif; ?>
    </tbody>
</table>
