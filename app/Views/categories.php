<?= $this->extend('Layouts/ecom.php') ?>

<?= $this->section('content') ?>
<div class="container">
    <div class="row">

        <h1>Category</h1>
        <?php foreach ($data as $row) : ?>

            <div class="card col-2 my-1" style="height: 170px;">
                <a href="<?= base_url('user/subcategory/' . $row['id']) ?>">
                    <img src="<?= base_url('uploads/' . $row['image']) ?>" class="card-img-top p-2" alt="..." style="height: 100px;">
                    <div class="card-body">
                        <h6 class="card-title"><?= $row['name'] ?></h6>

                        <!-- <a href="#" class="btn btn-primary">Go somewhere</a> -->
                    </div>
                </a>
            </div>

        <?php endforeach; ?>
    </div>

</div>



<?= $this->endSection() ?>