<?php include "header.php"; ?>
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
                        <form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="POST" class="form">
                            <div class="mb-3">

                                <label for="post_title" class="form-label">Post Title</label>
                                <input type="text" name="post_title" placeholder="Write post title.." class="form-control" id="post_title" required>

                            </div>
                            <div class=" mb-3">
                                <label for="post_description" class="form-label">Description</label>
                                <textarea name="post_description" id="post_description" rows="5" class="form-control"></textarea>
                            </div>

                            <div class="mb-3">
                                <label for="post_category" class="form-label">Post Category</label>
                                <select name="post_category" id="post_category" class="form-select">
                                    <option selected disabled>Select post category</option>
                                    <option value="">Category NAme</option>
                                </select>
                            </div>

                            <div class="mb-4">
                                <label for="post_thumbnail" class="form-label">Post Thumbnail</label>
                                <input type="file" name="post_thumbnail" id="post_thumbnail" class="form-control" required>
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
                            <!-- <ul>
                                <?php if (mysqli_num_rows($latest_records) > 0) {
                                    while ($rows = mysqli_fetch_assoc($latest_records)) {
                                ?>      
                                        <li>
                                            <div>
                                                <span>
                                                    <?php echo $rows['first_name'] . "&nbsp;" . $rows['last_name'] ?>
                                                </span>
                                                <span>
                                                    (<?php echo $rows['user_role'] == "0" ? 'Admin' : 'Standard User'; ?>)
                                                </span>
                                                <span>
                                                    <b>Username:</b> <?php echo $rows['username']; ?>
                                                </span>
                                            </div>
                                        </li>
                                <?php }
                                } ?>

                            </ul> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php include "footer.php"; ?>