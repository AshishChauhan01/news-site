<?php include "header.php";
$post_id = intval($_GET['id']);
$get_data_query = "SELECT ps.*, cs.category_name, us.first_name, us.last_name FROM posts as ps 
                    LEFT JOIN categories as cs ON ps.category_id = cs.id 
                    LEFT JOIN users as us ON ps.author_id = us.id 
                    WHERE ps.id = $post_id";

$get_post = mysqli_query($conn, $get_data_query);
$post = mysqli_fetch_assoc($get_post);

$cat_id = $post['category_id'];
?>

<section class="single-post-section section-padding min-height">
    <div class="container">
        <div class="single-post">
            <h3 class="common-title category-name "><?= $post['category_name']; ?></h3>
            <h2 class="post-title common-title"><?= $post['title']; ?></h2>
            <p class="author"><?= $post['first_name'] . '&nbsp;' . $post['last_name']; ?></p>
            <p class="post-date"><?= date('F d, Y', strtotime($post['post_date'])) ?></p>
            <div class="thumbnail-image">
                <img src="../assets/images/<?= $post['thumbnail']; ?>" alt="">
            </div>
            <div class="post-content">
                <?= $post['description']; ?>
            </div>
        </div>
    </div>
</section>

<?php

$related_post_query = "SELECT ps.*, cs.category_name, us.first_name, us.last_name FROM posts as ps 
                    LEFT JOIN categories as cs ON ps.category_id = cs.id 
                    LEFT JOIN users as us ON ps.author_id = us.id WHERE ps.category_id = $cat_id AND ps.id != $post_id LIMIT 3";
$get_related_posts = mysqli_query($conn, $related_post_query);
?>

<?php if (mysqli_num_rows($get_related_posts) > 0) { ?>
    <section class="latest-posts-section section-padding">
        <div class="container">
            <h2 class="common-title">Related Posts</h2>
            <div class="row">
                <?php while ($post = mysqli_fetch_assoc($get_related_posts)): ?>
                    <div class="col-md-4">
                        <a href="single.php?id=<?= $post['id']; ?>" class="box-link">
                            <div class="latest-post">
                                <div class="thumbnail">
                                    <img src="../assets/images/<?= $post['thumbnail']; ?>" alt="">
                                </div>

                                <div class="content">
                                    <div class="category">
                                        <a href="archieve.php?post_type=category&id=<?= $post['category_id'] ?>">
                                            <span><?= $post['category_name']; ?></span>
                                        </a>
                                    </div>
                                    <a href="single.php?id=<?= $post['id']; ?>">
                                        <h3 class="post-title">
                                            <?php
                                            $post_title = $post['title'];
                                            $title_array = explode(' ', $post_title);
                                            if (count($title_array) > 15) {
                                                $post_title = implode(' ', array_slice($title_array, 0, 15)) . "[...]";
                                            }
                                            echo $post_title;
                                            ?>
                                        </h3>
                                    </a>
                                    <div class="author-and-date">
                                        <a href="archieve.php?post_type=author&id=<?= $post['author_id'] ?>"><span class="author"><i class="ri-user-line me-1"></i>Ashish Chauhan</span></a>
                                        <span>&nbsp;|&nbsp;</span>
                                        <span class="post-date"><i class="ri-calendar-line me-1"></i>August 15, 2025</span>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                <?php endwhile; ?>
            </div>
        </div>
    </section>
<?php } ?>

<?php include "footer.php"; ?>