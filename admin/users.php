<?php include "header.php"; ?>
<?php
$records_query = "SELECT * FROM users";
$records_data = mysqli_query($conn, $records_query);
?>

<section class="users-section section-padding min-height">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-6">
                <h2>All Users</h2>
            </div>
            <div class="col-md-6 text-end">
                <a href="add-user.php" class="btn btn-success btn-sm">Add User <i class="fa-solid fa-user-pen"></i>
                </a>
            </div>
        </div>
        <table class="table table-striped table-bordered border-white mt-2">
            <thead class="table-dark text-center">
                <tr>
                    <th>#</th>
                    <th>Full Name</th>
                    <th>Email</th>
                    <th>User Name</th>
                    <th>Role</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php if (mysqli_num_rows($records_data) > 0) { ?>
                    <?php while ($record = mysqli_fetch_assoc($records_data)) { ?>
                        <tr>
                            <td><?= $record['id']; ?>.</td>
                            <td><?= $record['first_name'] . "&nbsp;" . $record['last_name']; ?> </td>
                            <td><?= $record['email']; ?></td>
                            <td><?= $record['username']; ?></td>
                            <td><?= $record['user_type'] == "0" ? 'Admin' : 'Standard User'; ?></td>
                            <td class="text-center">
                                <a href="edit-user.php?id=<?= $record['id']; ?>" class="mx-2 edit-icon"><i class="fa-solid fa-pen-to-square text-secondary"></i></a>
                                <a href="delete-user.php?id=<?= $record['id']; ?>" class="mx-2 delete-icon" onclick="return confirm('Are you sure?');"> <i class="fa-solid fa-trash text-secondary"></i></a>
                            </td>
                        </tr>
                    <?php } ?>
                <?php } else { ?>
                    <tr class="text-center">
                        <td colspan="6"><b>Data not found!.</b></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>

</section>
<?php include "footer.php" ?>