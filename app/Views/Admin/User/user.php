<?= $this->extend('Layouts/Admin/AdminView') ?>

<?= $this->section('content') ?>

<style>
    table {
        border-collapse: collapse;
        width: 80%;
        margin: 0 auto;
    }

    th,
    td,
    tr {
        border: 1px solid black;
        padding: 8px;
        text-align: left;
    }
    a{
        list-style: none;
        text-decoration: none;
    }
</style>
<h1 class="mt-4">User Management</h1>
<ol class="breadcrumb mb-4">
    <li class="breadcrumb-item"><a href="<?= base_url("admin/dashboard") ?>">Dashboard</a></li>
    <li class="breadcrumb-item active">Static Navigation</li>
</ol>
<hr>
<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Role</th>
            <th>Action</th>
            <!-- Add more table headers as needed -->
        </tr>
    </thead>
    <tbody>
        <?php foreach ($data as $row) : ?>
            <tr>
                <td><?php echo $row['id']; ?></td>
                <td><?php echo $row['name']; ?></td>
                <td><?php echo $row['email']; ?></td>
                <td><?php echo $row['role']; ?></td>
                <td><button class="btn btn-danger"> <a href="<?= site_url('/admin/user/' . $row['id']) ?>" data-method="delete" data-confirm="Are you sure you want to delete this user?">Delete</a></button>
                <button class="btn btn-warning"> Edit</a></button>
                </td>



                <!-- Display other row data as needed -->
            </tr>

        <?php endforeach; ?>
    </tbody>
</table>
<script>
    // Handle delete confirmation and send delete request
    document.addEventListener('DOMContentLoaded', function() {
        const deleteLinks = document.querySelectorAll('a[data-method="delete"]');

        deleteLinks.forEach(function(link) {
            link.addEventListener('click', function(event) {
                event.preventDefault();

                if (confirm(link.getAttribute('data-confirm'))) {
                    const deleteUrl = link.getAttribute('href');

                    fetch(deleteUrl, {
                        method: 'DELETE',
                        headers: {
                            'X-Requested-With': 'XMLHttpRequest',
                            'Content-Type': 'application/json',
                            'Accept': 'application/json',
                            '<?= csrf_header() ?>': '<?= csrf_token() ?>'
                        }
                    })
                    .then(response => {
                        if (response.ok) {
                            location.reload();
                        } else {
                            console.error('Error deleting user:', response);
                        }
                    })
                    .catch(error => {
                        console.error('Error deleting user:', error);
                    });
                }
            });
        });
    });
</script>


<?= $this->endSection() ?>