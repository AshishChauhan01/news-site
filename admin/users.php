<?php include "header.php"; ?>
<?php
$query = "SELECT * FROM users WHERE is_active = 1";
$fetch_records = mysqli_query($conn, $query);

if (isset($_GET['success'])) {
    $alert_text = '';
    if ($_GET['success'] === 'updated') {
        $alert_text = "😊 Record has been successfully updated.";
    }
    if ($_GET['success'] === 'inserted') {
        $alert_text = "😊 Record has been successfully inserted.";
    }

    if (!empty($alert_text)) {
        echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>$alert_text
        <button type='button' class='btn-close' data-bs-dismiss='alert'></button>
        </div>";
    }
}
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
                    <th>Id</th>
                    <th>Full Name</th>
                    <th>Email</th>
                    <th>User Name</th>
                    <th>Role</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php if (mysqli_num_rows($fetch_records) > 0) : ?>
                    <?php
                    $count = 1;
                    while ($data = mysqli_fetch_assoc($fetch_records)):
                    ?>

                        <tr>
                            <td><?= $count; ?>.</td>
                            <td><?= $data['id']; ?></td>
                            <td><?= $data['first_name'] . "&nbsp;" . $data['last_name'] ?></td>
                            <td><?= $data['email']; ?></td>
                            <td><?= $data['username']; ?></td>
                            <td><?= $data['user_type'] == '0' ? 'Admin' : 'Standard User'; ?></td>
                            <td class="text-center">
                                <a href="edit-user.php?id=<?= $data['id'] ?>" class="mx-2 edit-icon"><i class="fa-solid fa-pen-to-square text-secondary"></i></a>
                                <a href="delete-user.php" class="mx-2 delete-icon"> <i class="fa-solid fa-trash text-secondary"></i></a>
                            </td>
                        </tr>
                    <?php
                        $count++;
                    endwhile; ?>
                <?php else:  ?>
                    <tr class="text-center">
                        <td colspan="7">😢 No records found!</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>

</section>
<?php include "footer.php" ?>