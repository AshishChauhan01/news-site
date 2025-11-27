<div id="sidebar" class="col-md-4">
    <!-- search box -->
    <div class="search-box-container">
        <h4>Search</h4>
        <form class="search-post" action="search.php" method="GET">
            <div class="input-group">
                <input type="text" name="search" class="form-control" placeholder="Search .....">
                <span class="input-group-btn">
                    <button type="submit" class="btn btn-danger">Search</button>
                </span>
            </div>
        </form>
    </div>
    <!-- /search box -->
    <!-- recent posts box -->
    <div class="recent-post-container">
        <h4>Recent Posts</h4>

        <div class="recent-post">
            <a class="post-img" href="single.php">
                <img src="admin/upload/image.png" alt="" />
            </a>
            <div class="post-content">
                <h5><a href="single.php">Title</a></h5>
                <span>
                    <i class="fa fa-tags" aria-hidden="true"></i>
                    <a href='category.php'>Category Name</a>
                </span>
                <span>
                    <i class="fa fa-calendar" aria-hidden="true"></i>
                    25AUG2025
                </span>
                <a class="read-more" href="single.php">read more</a>
            </div>
        </div>

    </div>
    <!-- /recent posts box -->
</div>