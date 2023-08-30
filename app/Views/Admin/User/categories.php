<?= $this->extend('Layouts/Admin/AdminView') ?>
<!-- table section -->
<?= $this->section('content') ?>
<link rel="stylesheet" type="text/css" href="<?= base_url('css/styles.css') ?>">
<style>

	table {
		border-collapse: collapse;
		width: 80%;
		margin: 0 auto;
	}
 a{
        list-style: none;
        text-decoration: none;
    }
	th,
	td,
	tr {
		border: 1px solid black;
		padding: 8px;
		text-align: left;
	}

	.form-container {
		max-width: 400px;
		margin: 0 auto;
		padding: 20px;
		background-color: #f2f2f2;
		border-radius: 5px;
		box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
	}

	.form-container input[type="text"],
	.form-container input[type="file"],
	.form-container button {
		display: block;
		width: 100%;
		padding: 10px;
		margin-bottom: 10px;
		border: 1px solid #ccc;
		border-radius: 4px;
		box-sizing: border-box;
		font-size: 14px;
	}

	.form-container button {
		background-color: #4CAF50;
		color: white;
		font-weight: bold;
		cursor: pointer;
	}

	.form-container button:hover {
		background-color: #45a049;
	}
</style>
<script>
	// Reload the page after any action (form submission or delete link click)
	document.addEventListener('DOMContentLoaded', function() {
		const form = document.querySelector('form');
		const deleteLinks = document.querySelectorAll('a[href^="<?= base_url('admin/delete-category/') ?>"]');

		function reloadPage() {
			location.reload();
		}

		form.addEventListener('submit', reloadPage);

		deleteLinks.forEach(function(link) {
			link.addEventListener('click', reloadPage);
		});
	});
</script>
<div>
	<div>
		<h1>Add Category</h1>
	</div>
	<div>
		<!-- Modal Area -->
		<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
						<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
					</div>
					<div class="modal-body">
						<div class="form-container">

							<form method="POST" action="<?= base_url('/admin/insert-categories') ?>" enctype="multipart/form-data">
								<?= csrf_field() ?>


								<input type="text" name="name" placeholder="Category Name" required>

								<label for="image">Image:</label>
								<input type="file" name="image" id="image" required>


								<div class="modal-footer">
									<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
									<button type="submit" class="btn btn-primary">Add Category</button>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- Modal Area -->
		<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
			Add Product
		</button>
	</div>

	<div>
		<h1>Categories</h1><br>

	</div>
	<table>
		<thead>
			<tr>
				<th>ID</th>
				<th>Name</th>
				<th>Images</th>
				<th>Action</th>
			</tr>
		</thead>
		<tbody>
			<?php foreach ($data as $row) : ?>
				<tr>
					<td><?php echo $row['id']; ?></td>
					<td><?php echo $row['name']; ?></td>

					<td><img src="<?= base_url('uploads/' . $row['image']) ?>" alt="Image" height="100px" width="100px">
					</td>

					<td><button class="btn btn-danger"> <a href="<?= base_url('/admin/category/' . $row['id']) ?>">Delete</a></button>
						<button class="btn btn-warning"> Edit</a></button>

					</td>

					<!-- Display other row data as needed -->
				</tr>

			<?php endforeach; ?>
		</tbody>
	</table>
	<!-- table section -->
</div>
<?= $this->endSection() ?>