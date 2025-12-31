<?php

$page = $_GET['page'] ?? 1;
$posts_limit = "5";

$total_records = mysqli_num_rows(mysqli_query($conn, "SELECT id FROM posts"));
$no_pages = ceil($total_records / $posts_limit);

if (isset($_GET['page']) && (!is_numeric($_GET['page']) || ($_GET['page'] > $no_pages))) {
    echo "<div class='alert alert-danger'>Something went wrong or invaild page value</div>";
    exit();
}

$offset = ($posts_limit * $page) - $posts_limit;

$all_posts_query = "SELECT ps.id, ps.title, ps.thumbnail, ps.description, ps.category_id, ps.author_id, ps.post_date, cs.category_name, us.first_name, us.last_name  
                    FROM posts as ps
                    LEFT JOIN categories as cs ON ps.category_id =  cs.id
                    LEFT JOIN users as us ON ps.author_id =  us.id";
$limit_query =  " LIMIT $offset, $posts_limit";
$posts_query = $all_posts_query . $limit_query;

$posts = mysqli_query($conn, $posts_query);
?>

<div class="home-page">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="posts-section section-wrapper" style="height: 100%;">
                    <?php if (mysqli_num_rows($posts) > 0):
                        while ($post = mysqli_fetch_assoc($posts)) :
                    ?>
                            <a href="single.php?id=<?= $post['id']; ?>">
                                <div class="post">
                                    <div class="post-thumb">
                                        <img src="assets/images/<?= $post['thumbnail']; ?>" alt="">
                                    </div>
                                    <div>
                                        <?php $original_title = $post['title'];
                                        $description = $post['description'];
                                        if (mb_strlen($original_title, 'UTF-8') > 100) {
                                            $original_title = mb_substr($original_title, 0, 100, 'UTF-8') . '[...]';
                                        }
                                        if (mb_strlen($description) > 160) {
                                            $description = mb_substr($description, 0, 160, 'UTF-8') . '...';
                                        }
                                        ?>
                                        <h2 class="post-title"><?= $original_title; ?></h2>
                                        <div class="post-info" style="margin-left:-12px;">
                                            <a href="archieve.php?post_type=category&id=<?= $post['category_id']; ?>">
                                                <span><i class=" ri-price-tag-3-fill"></i></i>&nbsp;<?= $post['category_name']; ?></span>
                                            </a>
                                            <a href="archieve.php?post_type=author&id=<?= $post['author_id']; ?>">
                                                <span><i class="ri-user-3-fill"></i>&nbsp;<?= $post['first_name'] . '&nbsp;' . $post['last_name']; ?></span>
                                            </a>
                                            <span class="date"><i class="ri-calendar-fill"></i>&nbsp;<?= date('dMY', strtotime($post['post_date'])); ?></span>
                                        </div>
                                        <p class="post-description"><?= $description; ?><a href="single.php?id=<?= $post['id']; ?>">Read More</a></p>
                                    </div>
                                </div>
                            </a>
                        <?php
                        endwhile;
                    else : ?>
                        <div>No Post found!</div>
                    <?php endif; ?>
                </div>
            </div>
            <div class="col-md-4">
                <div class="posts-section section-wrapper">
                    <div class="search-post">
                        <h2 class="common-title title-border">Search</h2>
                        <form action="archieve.php" method="GET">
                            <div class="search-box">
                                <input type="text" placeholder="Search..." class="form-control" name="search_term">
                                <button type="submit" class="btn search-btn common-btn">Search</button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="posts-section section-wrapper mt-4">
                    <div class="recent-posts">
                        <h2 class="common-title title-border mb-3">Recent Posts</h2>
                        <?php
                        $l_posts_query = $all_posts_query . " ORDER BY ps.id DESC" . $limit_query;
                        $l_posts = mysqli_query($conn, $l_posts_query); ?>
                        <?php if (mysqli_num_rows($l_posts) > 0): ?>
                            <div class="recent-post">
                                <?php while ($post = mysqli_fetch_assoc($l_posts)) : ?>
                                    <?php
                                    $latest_title = $post['title'];
                                    if (mb_strlen($latest_title, 'UTF-8') > 70) {
                                        $latest_title = mb_substr($latest_title, 0, 70, 'UTF-8') . '[...]';
                                    }

                                    date_default_timezone_set('Asia/Kolkata');
                                    $time_interval = "NULL";
                                    $post_date = date_create($post['post_date']);
                                    $current_date = date_create('now');
                                    $date_diff = date_diff($post_date, $current_date);
                                    if ($date_diff->y) {
                                        $time_interval = $date_diff->y . '&nbsp;' . ($date_diff->y > 1 ? 'years' : 'year') . '&nbsp;ago';
                                    } else if ($date_diff->m) {
                                        $time_interval = $date_diff->m . '&nbsp;' . ($date_diff->m > 1 ? 'months' : 'month') . '&nbsp;ago';
                                    } else if ($date_diff->d) {
                                        $time_interval = $date_diff->d . '&nbsp;' . ($date_diff->d > 1 ? 'days' : 'day') . '&nbsp;ago';
                                    } else if ($date_diff->h) {
                                        $time_interval = $date_diff->h . '&nbsp;' . ($date_diff->h > 1 ? 'hours' : 'hour') . '&nbsp;ago';
                                    } else if ($date_diff->i) {
                                        $time_interval = $date_diff->i . '&nbsp;' . ($date_diff->i > 1 ? 'minutes' : 'minute') . '&nbsp;ago';
                                    } else if ($date_diff->s) {
                                        $time_interval = $date_diff->m . '&nbsp;' . ($date_diff->m > 1 ? 'seconds' : 'second') . '&nbsp;ago';
                                    } else {
                                        $time_interval = "just now";
                                    }

                                    ?>

                                    <div class="post">
                                        <a href="single.php?id=<?= $post['id'] ?>">
                                            <div class="inner-div">
                                                <div class="post-thumb">
                                                    <img src="assets/images/<?= $post['thumbnail'] ?>" alt="">
                                                </div>
                                                <div class="post-content">
                                                    <h2 class="post-title"><?= $latest_title; ?></h2>
                                                    <div class="post-info">
                                                        <div>
                                                            <a href="archieve.php?post_type=category&id=<?= $post['category_id'] ?>">
                                                                <span><i class="ri-price-tag-3-fill"></i>&nbsp;<?= $post['category_name']; ?></span>
                                                            </a>
                                                        </div>
                                                        <span><i class="ri-calendar-fill"></i>&nbsp;<?= $time_interval ?></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                <?php endwhile; ?>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>

        <div class="row align-items-center mt-4">
            <div class="col-md-4">
                <p class="mb-0">Showing <span class="fw-normal"><?= ($offset + 1) ?></span><span>-</span><span class="fw-bold"><?= ($offset + $posts_limit) > $total_records ? $total_records : ($offset + $posts_limit); ?></span>
                    of <span class="fw-bolder"><?= $total_records; ?></span> records
                </p>
            </div>
            <div class="col-md-4">
                <ul class="pagination text-end">
                    <li class="page-item">
                        <a href="?page=<?= ($page - 1) ?>" class="page-link" onclick="return <?= ($page <= 1) ? 'false' : 'true'; ?> ">Previous</a>
                    </li>
                    <?php for ($i = 1; $i <= $no_pages; $i++) { ?>
                        <li class="page-item <?= $i == $page ? 'active' : '' ?>">
                            <a href="?page=<?= $i ?>" class="page-link"><?= $i; ?></a>
                        </li>
                    <?php } ?>

                    <li class="page-item">
                        <a href="?page=<?= ($page + 1); ?>" class="page-link" onclick="return <?= ($page >= $no_pages) ? 'false' : 'true'; ?>">Next</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>

</div>