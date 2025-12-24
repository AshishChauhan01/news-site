<?php
$activePage = 'posts';
include "header.php";

$total_records = mysqli_num_rows(mysqli_query($conn, "SELECT id FROM posts"));
$limit = 5;
$current_page = 1;

if (isset($_GET['page']) && is_numeric($_GET['page'])) {
    $current_page = $_GET['page'];
}

$posts_offset = ($current_page * $limit) - $limit;

$get_posts_query = "SELECT ps.*, cs.category_name, us.first_name, us.last_name FROM posts as ps 
                    LEFT JOIN categories as cs ON ps.category_id = cs.id 
                    LEFT JOIN users as us ON ps.author_id = us.id
                    ORDER BY id DESC LIMIT $posts_offset, $limit";
$get_posts = mysqli_query($conn, $get_posts_query);

if (isset($_GET['success']) || isset($_GET['error'])) {
    $alert_text = "";
    $class_name = "";
    if (isset($_GET['success'])) {
        $class_name = "alert-success";
        if ($_GET['success'] == 'updated') {
            $alert_text = "😊 Post data updated successfully.";
        }
        if ($_GET['success'] == 'deleted') {
            $alert_text = "😊 Post removed successfully.";
        }
    }
    echo "<div class='alert $class_name alert-dismissible fade show' role='alert'> $alert_text
    <button type='button' class='btn-close btn-sm' data-bs-dismiss='alert'></button></div>";
}
?>

<section class="posts-section section-padding min-height">
    <div class="container">
        <div class="section-wrapper">
            <div class="title-head">
                <div class="row align-items-center">
                    <div class="col-md-6">
                        <h2>All Posts</h2>
                    </div>
                    <div class="col-md-6 text-end">
                        <a href="add-post.php" class="btn btn-success btn-sm"><i class="fa-solid fa-plus"></i>&nbsp;Add Post</a>
                    </div>
                </div>
            </div>
            <table class="table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th></th>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Category</th>
                        <th>Author</th>
                        <th>Publish date</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (mysqli_num_rows($get_posts)):
                        $count = 1;
                        while ($posts = mysqli_fetch_assoc($get_posts)) :
                    ?>
                            <tr>
                                <td><?= $count; ?>.</td>
                                <td>
                                    <div class="post-thumbnail">
                                        <img src="../assets/images/<?= $posts['thumbnail'];  ?>" alt="">
                                    </div>
                                </td>
                                <?php
                                $post_title = strip_tags($posts['title']);
                                $title_words = explode(" ", $post_title);
                                if (count($title_words) > 20) {
                                    $post_title = implode(" ", array_slice($title_words, 0, 20)) . "...";
                                }

                                $post_description = strip_tags($posts['description']);
                                $description_words = explode(" ", $post_description);
                                if (count($description_words) > 50) {
                                    $post_description = implode(" ", array_slice($description_words, 0, 50)) . "...";
                                }
                                ?>
                                <td style="min-width: 160px;" class="fw-bold"><?= $post_title; ?></td>
                                <td><?= $post_description; ?></td>
                                <td><?= $posts['category_name'] ?></td>
                                <td><?= $posts['first_name'] . '&nbsp;' . $posts['last_name'] ?></td>
                                <td style="min-width: 104px;"><?= date('d-M-Y', strtotime($posts['post_date'])); ?></td>
                                <td class="text-center" style="min-width:145px">
                                    <a href="single.php?id=<?= $posts['id']; ?>" class="mx-2 view-icon">
                                        <i class="ri-eye-line text-primary"></i>
                                    </a>
                                    <a href="edit-post.php?id=<?= $posts['id']; ?>" class="mx-2 edit-icon">
                                        <i class="fa-solid fa-pen-to-square text-secondary"></i>
                                    </a>

                                    <a href="delete-post.php?id=<?= $posts['id']; ?>" class="mx-2 delete-icon" onclick="return confirm('Are you sure?')">
                                        <i class="fa-solid fa-trash text-secondary"></i>
                                    </a>
                                </td>
                            </tr>
                        <?php
                            $count++;
                        endwhile;
                    else:
                        ?>
                        <tr class="text-center">
                            <td colspan="9">😢 No records found!</td>
                        </tr>
                    <?php endif;
                    ?>
                </tbody>
            </table>
        </div>
        <?php $no_of_pages = ceil($total_records / $limit);
        ?>

        <div class="row align-items-center mt-4">
            <div class="col-md-6">
                <p style="#f8fafc" class="mb-0">Showing <span class="fw-normal"><?= $posts_offset + 1; ?></span><span>-</span><span class="fw-bold"><?= ($total_records >= ($posts_offset + $limit)) ? ($posts_offset + $limit) : $total_records; ?></span>
                    of <span class="fw-bolder"><?= $total_records; ?></span> records
                </p>
            </div>
            <div class="col-md-6">
                <div class="pagination text-end">
                    <li class="page-item">
                        <a href="<?php echo $_SERVER['PHP_SELF'] . '?page=' . $current_page - 1 ?>"
                            onclick="return <?= $current_page == 1 ? 'false' : 'true' ?>"
                            class="page-link">Previous</a>
                    </li>
                    <?php for ($i = 1; $i <= $no_of_pages; $i++) : ?>
                        <li class="page-item <?= $i == $current_page ? 'active' : ''; ?>"><a href="<?php echo $_SERVER['PHP_SELF'] . '?page=' . $i ?>" class="page-link"><?= $i; ?></a></li>
                    <?php endfor; ?>
                    <li class="page-item">
                        <a href="<?php echo $_SERVER['PHP_SELF'] . '?page=' . $current_page + 1 ?>"
                            onclick="return <?= $current_page == $no_of_pages ? 'false' : 'true'; ?>"
                            class="page-link">Next</a>
                    </li>
                </div>
            </div>
        </div>
    </div>

</section>
<?php include "footer.php" ?>