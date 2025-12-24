<?php include "header.php"; ?>

<?php
$get_cat_query = "SELECT * FROM categories ORDER BY category_name";
$get_cat_record = mysqli_query($conn, $get_cat_query);

$author_id = $_SESSION['login_user_id'];

if (isset($_POST['add_post'])) {
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
    }
    if (!isset($post_category)) {
        header('location:' . $_SERVER['PHP_SELF'] . '?error=select-category');
        exit();
    }

    $insert_post_query = "INSERT INTO posts(`title`, `description`, `thumbnail`, `category_id`, `post_date`, `author_id`)
     VALUES('$post_title', ' $post_description','$final_file_name', '$post_category', '$post_date', '$author_id')";
    $insert_post = mysqli_query($conn, $insert_post_query);

    if ($insert_post) {
        header('location:' . $_SERVER['PHP_SELF'] . '?success=post-inserted');
    }
}


if (isset($_GET['success']) || isset($_GET['error'])) {
    $alert_text = "";
    $class_name = "";
    if (isset($_GET['success'])) {
        $class_name = "alert-success";
        if ($_GET['success'] == 'post-inserted') {
            $alert_text = "😊 New post successfully inserted.";
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
        if ($_GET['error'] == 'select-category') {
            $alert_text = "🙄 You must select a category before submitting the post.";
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
                                    <h2 class="common-title">Add New Post</h2>
                                </div>
                                <div class="col-md-6 text-end">
                                    <a href="posts.php" class="btn btn-warning btn-sm">Posts <i class="fa-solid fa-list"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="POST" class="form" enctype="multipart/form-data">
                            <div class=" mb-3">
                                <label for="post_title" class="form-label">Post Title<sup class="text-danger fw-bold">*</sup></label>
                                <input type="text" name="post_title" placeholder="Write post title.." class="form-control" id="post_title" required>
                            </div>
                            <div class=" mb-3">
                                <label for="post_description" class="form-label">Description<sup class="text-danger fw-bold">*</sup></label>
                                <textarea name="post_description" id="post_description" rows="5" class="form-control" required></textarea>
                            </div>

                            <div class="mb-3">
                                <label for="post_category" class="form-label">Post Category<sup class="text-danger fw-bold">*</sup></label>
                                <select name="post_category" id="post_category" class="form-select" required>
                                    <option selected disabled>Select post category</option>
                                    <?php if (mysqli_num_rows($get_cat_record) > 0) {
                                        while ($cat_data = mysqli_fetch_assoc($get_cat_record)) {
                                    ?>
                                            <option value="<?= $cat_data['id'] ?>"><?= $cat_data['category_name']; ?></option>
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
                                <label for="post_thumbnail" class="form-label">Post Thumbnail<sup class="text-danger fw-bold">*</sup></label>
                                <input type="file" name="post_thumbnail" id="post_thumbnail" class="form-control" required>
                                <div class="form-text">*Only jpg, jpeg, png and webp file types allowed.</div>
                                <div class="form-text">*Maximum file size 2MB allowed.</div>
                            </div>
                            <div>
                                <button type="submit" name="add_post" class="btn btn-success btn-md w-100">Add Post</button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="sticky-effect">
                        <div class="section-wrapper">
                            <div class="title-head">
                                <h3>Latest Added Posts</h3>
                            </div>
                            <ul>
                                <?php
                                $latest_added_posts = "SELECT ps.title, ps.description, ps.thumbnail, ps.post_date, cs.category_name, us.first_name, us.last_name
                                                        FROM posts as ps 
                                                        LEFT JOIN categories as cs 
                                                        ON ps.category_id  = cs.id
                                                        LEFT JOIN users as us
                                                        ON ps.author_id = us.id 
                                                        ORDER BY ps.id DESC LIMIT 6";

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
                                            date_default_timezone_set('Asia/Kolkata');
                                            $actual_diff = null;
                                            $post_date = date_create($rows['post_date']);
                                            $today_date = date_create('now');
                                            $diff = date_diff($post_date, $today_date);
                                            if ($diff->y) {
                                                $actual_diff = $diff->y . '&nbsp;' . (($diff->y > 1) ? 'years' : 'year') . '&nbsp;ago';
                                            } else if ($diff->m) {
                                                $actual_diff = $diff->m . '&nbsp;' . (($diff->h > 1) ? 'months' : 'month') . '&nbsp;ago';
                                            } else if ($diff->d) {
                                                $actual_diff = $diff->d . '&nbsp;' . (($diff->d > 1) ? 'days' : 'day') . '&nbsp;ago';
                                            } else if ($diff->h) {
                                                $actual_diff = $diff->h . '&nbsp;' . (($diff->h > 1) ? 'hours' : 'hour') . '&nbsp;ago';
                                            } else if ($diff->i) {
                                                $actual_diff = $diff->i . '&nbsp;' . (($diff->i > 1) ? 'minutes' : 'minute') . '&nbsp;ago';
                                            } else if ($diff->s) {
                                                $actual_diff = $diff->s . '&nbsp;' . (($diff->s > 1) ? 'seconds' : 'second') . '&nbsp;ago';
                                            } else {
                                                $actual_diff = "Just now";
                                            }

                                            // $post_time = strtotime($rows['post_date']);
                                            // $current_time = time();
                                            // $time_margin = $current_time - $post_time;
                                            // echo floor($time_margin / (3600 * 24));
                                            ?>
                                            <div class="latest-added-post">

                                                <div class="thumbnail">
                                                    <img src="../assets/images/<?= $rows['thumbnail']; ?>" alt="thumbnail">
                                                </div>
                                                <div>
                                                    <p><?= $post_title ?></p>
                                                    <div class="author">
                                                        <span><?php echo $rows['first_name'] . "&nbsp;" . $rows['last_name']; ?></span>
                                                        <span><?= $actual_diff ?></span>
                                                    </div>
                                                </div>
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