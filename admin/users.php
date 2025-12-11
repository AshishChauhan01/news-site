<?php
$activePage = 'users';
include "header.php";

$pagination_limit = 8;
$page_no = $_GET['page'] ?? 1;
$offset = ($pagination_limit * $page_no) - $pagination_limit;

$records_q = "SELECT * FROM users WHERE is_active = 1";
$exe_q = mysqli_query($conn, $records_q);
$total_records = mysqli_num_rows($exe_q);

$query = "SELECT * FROM users WHERE is_active = 1 LIMIT $offset, $pagination_limit";

$fetch_records = mysqli_query($conn, $query);


if (isset($_GET['success'])) {
    $alert_text = '';
    if ($_GET['success'] === 'updated') {
        $alert_text = "😊 Record has been successfully updated.";
    }
    if ($_GET['success'] === 'inserted') {
        $alert_text = "😊 Record has been successfully inserted.";
    }
    if ($_GET['success'] === 'deleted') {
        $alert_text = "😊 Record has been successfully removed.";
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
        <div class="section-wrapper">
            <div class="title-head">
                <div class="row align-items-center">
                    <div class="col-md-6">
                        <h2>All Users</h2>
                    </div>
                    <div class="col-md-6 text-end">
                        <a href="add-user.php" class="btn btn-success btn-sm">Add User <i class="fa-solid fa-user-plus"></i>
                        </a>
                    </div>
                </div>
            </div>
            <table class="table">
                <thead>
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
                                <td class="user-role">
                                    <span class="<?= $data['user_role'] == '0' ? 'admin' : ''; ?>"><?= $data['user_role'] == '0' ? 'Admin' : 'Standard User'; ?></span>
                                </td>
                                <td class="text-center">
                                    <a href="edit-user.php?id=<?= $data['id'] ?>" class="mx-2 edit-icon">
                                        <i class="fa-solid fa-pen-to-square text-secondary"></i>
                                    </a>

                                    <a href="delete-user.php?id=<?= $data['id']; ?>" class="mx-2 delete-icon" onclick="return confirm('Are you sure?')">
                                        <i class="fa-solid fa-trash text-secondary"></i>
                                    </a>

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
        <?php
        $total_pages = ceil($total_records / $pagination_limit);

        if ($total_pages > 1) {
        ?>
            <div class="pagination mt-4">
                <li class="page-item"><a href="<?= $_SERVER['PHP_SELF'] . '?page=' . $page_no - 1; ?>" class="page-link" onclick=" <?= $page_no == 1 ? 'return false' : '';  ?>">Previous</a></li>
                <?php for ($i = 1; $i <= $total_pages; $i++) { ?>
                    <li class="page-item <?= $page_no == $i ? 'active' : ''  ?>"><a href="<?php echo $_SERVER['PHP_SELF'] . '?page=' . $i; ?>" class="page-link"><?= $i ?></a></li>
                <?php } ?>
                <li class="page-item">
                    <a href="<?= $_SERVER['PHP_SELF'] . '?page=' . $page_no + 1; ?>"
                        class="page-link"
                        onclick="<?= $page_no == $total_pages ? 'return false' : '';  ?>">
                        Next</a>
                </li>
            </div>
        <?php } ?>
    </div>

</section>
<?php include "footer.php" ?>