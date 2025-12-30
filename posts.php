<?php

$page = $_GET['page'] ?? 1;
$posts_limit = "5";

$total_records = mysqli_num_rows(mysqli_query($conn, "SELECT id FROM posts"));
$no_pages = ceil($total_records / $posts_limit);

if (isset($_GET['page']) && (!is_numeric($_GET['page']) || ($_GET['page'] > $no_pages))) {
    echo "<div>Something went wrong or invaild page value</div>";
    exit();
}

$offset = ($posts_limit * $page) - $posts_limit;



$all_posts_query = "SELECT ps.title, ps.thumbnail, ps.description, ps.post_date, cs.category_name, us.first_name, us.last_name  
                    FROM posts as ps
                    LEFT JOIN categories as cs ON ps.category_id =  cs.id
                    LEFT JOIN users as us ON ps.author_id =  us.id LIMIT $offset, $posts_limit";
$posts = mysqli_query($conn, $all_posts_query);
?>

<div class="home-page">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="posts-section section-wrapper">
                    <?php if (mysqli_num_rows($posts) > 0):
                        while ($post = mysqli_fetch_assoc($posts)) :
                    ?>
                            <div class="post">
                                <div class="post-thumb">
                                    <img src="assets/images/<?= $post['thumbnail']; ?>" alt="">
                                </div>
                                <div>
                                    <?php $original_title = $post['title'];
                                    if (mb_strlen($original_title, 'UTF-8') > 100) {
                                        $original_title = mb_substr($original_title, 0, 100, 'UTF-8') . '...';
                                    }
                                    ?>
                                    <h2 class="post-title"><?= $original_title; ?></h2>
                                    <div class="post-info">
                                        <span><i class="ri-price-tag-3-fill"></i></i>&nbsp;<?= $post['category_name']; ?></span>
                                        <span><i class="ri-user-3-fill"></i>&nbsp;<?= $post['first_name'] . '&nbsp;' . $post['last_name']; ?></span>
                                        <span class="date"><i class="ri-calendar-fill"></i>&nbsp;<?= date('dMY', strtotime($post['post_date'])); ?></span>
                                    </div>
                                    <p class="post-description">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Dignissimos commodi perspiciatis modi ipsam tenetur obcaecati corporis vero velit laudantium numquam.</p>
                                </div>
                            </div>
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
                        <form action="">
                            <div class="search-box">
                                <input type="text" placeholder="Search..." class="form-control">
                                <button type="submit" class="btn search-btn common-btn">Search</button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="posts-section section-wrapper mt-4">
                    <div class="recent-posts">
                        <h2 class="common-title title-border">Recent Posts</h2>
                        <div class="recent-post">
                            <div class="post">
                                <div class="post-thumb">
                                    <img src="assets/images/apeejay-stya-university-asu-gurgaon241225103816.jpg" alt="">
                                </div>
                                <div class="post-content">
                                    <h2 class="post-title">Lorem ipsum dolor sit amet consectetur adipisicing elit. Nobis, illum.</h2>
                                    <div class="post-info">
                                        <span><i class="ri-price-tag-3-fill"></i></i>&nbsp;Technology</span>
                                        <span><i class="ri-calendar-fill"></i>&nbsp;2 days ago</span>
                                    </div>
                                </div>
                            </div>
                        </div>
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