<?php
$activePage = 'categories';
include "header.php";
$categories_query = "SELECT * FROM categories ORDER BY category_name";
$get_records = mysqli_query($conn, $categories_query);
if (isset($_GET['success']) || isset($_GET['error'])) {
    $alert_text = "";
    $class_name = "";
    if (isset($_GET['success'])) {
        $class_name = "alert-success";
        if ($_GET['success'] == "removed") {
            $alert_text = "😊 Category removed successfully.";
        }
        if ($_GET['success'] == "updated") {
            $alert_text = "😊 Category updated successfully.";
        }
    }
    if (isset($_GET['error'])) {
        $class_name = "alert-danger";
        if ($_GET['error'] == "not-updated") {
            $alert_text = "🙄 Category not updated.";
        }
        if ($_GET['error'] == "duplicate") {
            $alert_text = "🙄 Category or slug already exists. please use a separate category.";
        }
    }
    echo "<div class='alert $class_name alert-dismissible fade show' role='alert'> $alert_text
    <button type='button' class='btn-close btn-sm' data-bs-dismiss='alert'></button></div>";
}
?>

<section class="users-section section-padding min-height">
    <div class="container">
        <div class="section-wrapper">
            <div class="title-head">
                <div class="row align-items-center">
                    <div class="col-md-6">
                        <h2>All Categories</h2>
                    </div>
                    <div class="col-md-6 text-end">
                        <a href="add-category.php" class="btn btn-success btn-sm"><i class="fa-solid fa-plus"></i>&nbsp;Add Category</a>
                    </div>
                </div>
            </div>
            <table class="table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Category Name</th>
                        <th>Category Slug</th>
                        <th>No. of Posts</th>
                        <th>Date</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (mysqli_num_rows($get_records) > 0): ?>
                        <?php
                        $count = 1;
                        while ($rows = mysqli_fetch_assoc($get_records)) { ?>
                            <tr>
                                <td><?= $count; ?></td>
                                <td><?= $rows['category_name']; ?></td>
                                <td><?= $rows['category_slug']; ?></td>
                                <td><?= $rows['posts']; ?></td>
                                <td><?= date('d/M/Y', strtotime($rows['created_at'])); ?></td>
                                <td class="text-center">
                                    <a href="edit-category.php?id=<?= $rows['id']; ?>" class="mx-2 edit-icon">
                                        <i class="fa-solid fa-pen-to-square text-secondary"></i>
                                    </a>

                                    <a href="delete-category.php?id=<?= $rows['id']; ?>" class="mx-2 delete-icon" onclick="return confirm('Are you sure?')">
                                        <i class="fa-solid fa-trash text-secondary"></i>
                                    </a>

                                </td>
                            </tr>
                        <?php $count++;
                        } ?>
                    <?php else:
                    ?>
                        <tr class="text-center">
                            <td colspan="6">😢 No records found!</td>
                        </tr>
                    <?php endif;
                    ?>
                </tbody>
            </table>
        </div>
    </div>

</section>
<?php include "footer.php" ?>