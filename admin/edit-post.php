<?php include "header.php"; ?>

<?php
$post_id = intval($_GET['id']);

$author_id = $_SESSION['login_user_id'];
$get_cat_query = "SELECT * FROM categories ORDER BY category_name";
$get_cat_record = mysqli_query($conn, $get_cat_query);

$get_post_query = "SELECT * FROM posts WHERE id = '$post_id'";
$post_data = mysqli_query($conn, $get_post_query);
$post = mysqli_fetch_assoc($post_data);

if (isset($_POST['update_post'])) {
    $post_title = mysqli_real_escape_string($conn, trim($_POST['post_title']));
    $post_description = mysqli_real_escape_string($conn, trim($_POST['post_description']));
    $post_category = $_POST['post_category'];
    $final_file_name = null;

    date_default_timezone_set('Asia/Kolkata');
    $post_date = date('Y-m-d H:i:s');

    if (
        isset($_FILES['post_thumbnail']) &&
        $_FILES['post_thumbnail']['error'] === UPLOAD_ERR_OK &&
        $_FILES['post_thumbnail']['size'] > 0
    ) {
        $thumb_file_name = $_FILES['post_thumbnail']['name'];
        $thumb_temp_name = $_FILES['post_thumbnail']['tmp_name'];
        $thumb_file_size = $_FILES['post_thumbnail']['size'];

        $thumb_name = pathinfo($thumb_file_name, PATHINFO_FILENAME);
        $thumb_ext = strtolower(pathinfo($thumb_file_name, PATHINFO_EXTENSION));

        $allowed_file = ['jpg', 'jpeg', 'png', 'webp'];

        if (!in_array($thumb_ext, $allowed_file)) {
            header('location:' . $_SERVER['PHP_SELF'] . '?error=invalid-file');
            exit();
        }

        $thumb_size_kb = round($thumb_file_size / 1024, 3);

        if ($thumb_size_kb > 2 * 1024) {
            header('location:' . $_SERVER['PHP_SELF'] . '?error=invalid-filesize');
            exit();
        }

        $final_file_name = $thumb_name . date('dmyhis') . "." . $thumb_ext;
        move_uploaded_file($thumb_temp_name, "../assets/images/" .  $final_file_name);
    } else {
        $final_file_name = $post['thumbnail'];
    }
    $update_post_query = "UPDATE posts SET `title` = '$post_title', `description` =     '$post_description', `thumbnail` = '$final_file_name', `category_id` = '$post_category' WHERE id = '$post_id'";

    $update_post = mysqli_query($conn, $update_post_query);

    if ($update_post) {
        header('location:posts.php?success=updated');
    }
}


if (isset($_GET['success']) || isset($_GET['error'])) {
    $alert_text = "";
    $class_name = "";
    if (isset($_GET['success'])) {
        $class_name = "alert-success";
        if ($_GET['success'] == 'updated') {
            $alert_text = "😊 Post data successfully updated.";
        }
    }
    if (isset($_GET['error'])) {
        $class_name = "alert-danger";
        if ($_GET['error'] == 'invalid-file') {
            $alert_text = "🙄 Invalid file type. Only allow jpg, jpeg, png and webp file types.";
        }
        if ($_GET['error'] == 'invalid-filesize') {
            $alert_text = "🙄 Invalid file size.File size maximum 2MB allow.";
        }
    }
    echo "<div class='alert $class_name alert-dismissible fade show' role='alert'> $alert_text
    <button type='button' class='btn-close btn-sm' data-bs-dismiss='alert'></button></div>";
}

?>
<section class="news-section section-padding min-height">
    <div class="container">
        <div class="mt-2">
            <div class="row">
                <div class="col-md-8">
                    <div class="section-wrapper">
                        <div class="title-head">
                            <div class="row align-items-center">
                                <div class="col-md-6">
                                    <h2 class="common-title">Update Post</h2>
                                </div>
                                <div class="col-md-6 text-end">
                                    <a href="posts.php" class="btn btn-warning btn-sm">Posts <i class="fa-solid fa-list"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <form action="<?php echo htmlentities($_SERVER['PHP_SELF']) . '?id=' . $post['id']; ?>" method="POST" class="form" enctype="multipart/form-data">
                            <div class=" mb-3">
                                <label for="post_title" class="form-label">Post Title<sup class="text-danger fw-bold">*</sup></label>
                                <input type="text" name="post_title" placeholder="Write post title.." class="form-control" id="post_title" value="<?= $post['title'] ?>" required>
                            </div>
                            <div class=" mb-3">
                                <label for="post_description" class="form-label">Description<sup class="text-danger fw-bold">*</sup></label>
                                <textarea name="post_description" id="post_description" rows="5" class="form-control" required><?= $post['description']; ?></textarea>
                            </div>

                            <div class="mb-3">
                                <label for="post_category" class="form-label">Post Category<sup class="text-danger fw-bold">*</sup></label>
                                <select name="post_category" id="post_category" class="form-select" required>
                                    <option selected disabled>Select post category</option>
                                    <?php if (mysqli_num_rows($get_cat_record) > 0) {
                                        while ($cat_data = mysqli_fetch_assoc($get_cat_record)) {
                                    ?>
                                            <option value="<?= $cat_data['id'] ?>"
                                                <?= ($post['category_id'] == $cat_data['id']) ? 'selected' : ''; ?>>
                                                <?= $cat_data['category_name']; ?>
                                            </option>
                                        <?php
                                        }
                                    } else { ?>
                                        <option disabled>
                                            No categories found. Add category first.
                                        </option>
                                    <?php } ?>
                                </select>
                            </div>

                            <div class="mb-4">
                                <div class="row">
                                    <div class="col-md-7"> <label for="post_thumbnail" class="form-label">Post Thumbnail<sup class="text-danger fw-bold">*</sup></label>
                                        <input type="file" name="post_thumbnail" id="post_thumbnail" class="form-control">
                                        <div class="form-text">*Only jpg, jpeg, png and webp file types allowed.</div>
                                        <div class="form-text">*Maximum file size 2MB allowed.</div>
                                    </div>
                                    <div class="col-md-5">
                                        <div class="mt-2">
                                            <img src="../assets/images/<?= $post['thumbnail']; ?>" alt="" style="width:100%;aspect-ratio: 16/9;object-fit:cover;border: 1px solid #ced4da;">
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <input type="hidden" name="post_id" value="<?= $post['id']; ?>">
                            <div>
                                <button type="submit" name="update_post" class="btn btn-success btn-md w-100">Update Post</button>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="sticky-effect">
                        <div class="section-wrapper">
                            <div class="title-head">
                                <h3>Latest Updated Posts</h3>
                            </div>
                            <ul>
                                <?php
                                $latest_added_posts = "SELECT ps.title, ps.description, ps.thumbnail, ps.post_date, cs.category_name, us.first_name, us.last_name
                                                        FROM posts as ps 
                                                        LEFT JOIN categories as cs 
                                                        ON ps.category_id  = cs.id
                                                        LEFT JOIN users as us
                                                        ON ps.author_id = us.id 
                                                        ORDER BY ps.updated_at DESC LIMIT 3";

                                $fetch_latest_posts = mysqli_query($conn, $latest_added_posts);

                                if (mysqli_num_rows($fetch_latest_posts) > 0) :

                                    while ($rows = mysqli_fetch_assoc($fetch_latest_posts)) {
                                ?>
                                        <li>
                                            <?php
                                            $post_title = strip_tags($rows['title']);
                                            $title_words = explode(' ', $post_title);

                                            if (count($title_words) > 10) {
                                                $post_title = implode(' ', array_slice($title_words, 0, 10)) . '...';
                                            }

                                            $post_description = strip_tags($rows['description']);
                                            if (mb_strlen($post_description, 'UTF-8') > 100) {
                                                $post_description = mb_substr($post_description, 0, 100, 'UTF-8') . "...";
                                            }
                                            ?>
                                            <div>
                                                <span style="max-width: 50%;">
                                                    <img src="../assets/images/<?= $rows['thumbnail']; ?>" alt=""
                                                        style="width: 40px; height: 40px; border-radius: 50%; margin-bottom: 2px; object-fit: cover;">
                                                    <br>
                                                    <?php echo $post_title . '&nbsp;(<em style="color:#000; opacity: 0.75;">' . $rows['category_name'] . '</em>)' ?>
                                                </span>
                                                <span>
                                                    <?php echo $rows['first_name'] . "&nbsp;" . $rows['last_name']; ?>
                                                </span>
                                                <br>

                                                <span>

                                                    <b>Description:</b> <?php echo $post_description; ?>
                                                </span>
                                            </div>
                                        </li>
                                    <?php }
                                else : ?>
                                    <p>🙄 No posts found!</p>
                                <?php endif; ?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php include "footer.php"; ?>