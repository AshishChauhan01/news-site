<?php include('header.php'); ?>
<?php
if (isset($_POST['add_category'])) {
    $cat_name = mysqli_real_escape_string($conn, trim($_POST['category_name']));
    $cat_name_lower =  strtolower($cat_name);
    $slug_by_name = preg_replace('/\s+/', '-', preg_replace('/[^a-z0-9\s-]/', '', $cat_name_lower));

    $cat_slug = strtolower(mysqli_real_escape_string($conn, trim($_POST['category_slug'])));
    $cat_slug = preg_replace('/\s+/', '-', preg_replace('/[^a-z0-9\s-]/', '', $cat_slug));

    $final_cat_slug =  !empty($cat_slug) ?  $cat_slug : $slug_by_name;

    $get_dup_cat = "SELECT id FROM categories WHERE category_name = '$cat_name' OR category_slug =  '$final_cat_slug'";
    $fetch_dup_cat = mysqli_query($conn, $get_dup_cat);
    if (mysqli_num_rows($fetch_dup_cat) > 0) {
        header('location:' . $_SERVER['PHP_SELF'] . '?error=duplicate');
        exit();
    }

    $query = "INSERT INTO categories (`category_name`, `category_slug`) VALUES('$cat_name', '$final_cat_slug')";
    $ext_query = mysqli_query($conn, $query);
    if ($ext_query) {
        header('location:' . $_SERVER['PHP_SELF'] . '?success=added');
        exit();
    } else {
        header('location:' . $_SERVER['PHP_SELF'] . '?error=not-added');
        exit();
    }
}
if (isset($_GET['success']) || isset($_GET['error'])) {
    $alert_text = "";
    $class_name = "";
    if (isset($_GET['success'])) {
        $alert_text = "😊 Category added successfully.";
        $class_name = "alert-success";
    }
    if (isset($_GET['error'])) {
        $class_name = "alert-danger";
        if ($_GET['error'] == "not-added") {
            $alert_text = "🙄 Category not added.";
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
        <div class="mt-2">
            <div class="row">
                <div class="col-md-8">
                    <div class="section-wrapper">

                        <div class="title-head">
                            <div class="row align-items-center">
                                <div class="col-md-6">
                                    <h2 class="common-title">Add Category</h2>
                                </div>
                                <div class="col-md-6 text-end">
                                    <a href="categories.php" class="btn btn-warning btn-sm">Categories List <i class="fa-solid fa-list"></i>
                                    </a>
                                </div>
                            </div>
                        </div>

                        <form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="POST" class="form">
                            <div class="mb-3">
                                <label for="category_name" class="form-label">Category Name <sup class="text-danger fw-bold">*</sup></label>
                                <input type="text" name="category_name" id="category_name" placeholder="Enter Category Name" class="form-control" required>
                            </div>

                            <div class="mb-3">
                                <label for="category_slug" class="form-label">Category Slug</label>
                                <input type="text" name="category_slug" id="category_slug" placeholder="Enter Category Slug" class="form-control">
                                <div class="form-text">Optional. Only use this if you want a custom slug.</div>
                            </div>

                            <div>
                                <button type="submit" name="add_category" class="btn btn-success btn-md w-100">Add Category</button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="sticky-effect">
                        <div class="section-wrapper">
                            <div class="title-head">
                                <h3>Latest Added Categories</h3>
                            </div>
                            <ul>
                                <?php
                                $latest_added_cat = "SELECT * FROM categories ORDER BY ID DESC LIMIT 4";
                                $fetch_latest_rec = mysqli_query($conn, $latest_added_cat);
                                if (mysqli_num_rows($fetch_latest_rec) > 0) {
                                    while ($rows = mysqli_fetch_assoc($fetch_latest_rec)) {
                                ?>
                                        <li>
                                            <div>
                                                <span>
                                                    <?php echo $rows['category_name'] . '&nbsp;(' . $rows['category_slug'] . ')' ?>
                                                </span>
                                                <br>
                                                <span>
                                                    <b>No. of posts:</b> <?php echo $rows['posts']; ?>
                                                </span>
                                            </div>
                                        </li>
                                    <?php }
                                } else { ?>
                                    <p>🙄 No categories found!</p>
                                <?php } ?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php include "footer.php" ?>