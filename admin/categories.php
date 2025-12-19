<?php
$activePage = 'categories';
include "header.php"; ?>
<div class="posts-page section-padding min-height">
    <div class="container">
        <div class="page-title-section">
            <div class="title-content">
                <h2 class="common-title">Categories Management</h2>
                <p class="section-content">Organize and manage your content categories.</p>
            </div>
            <div class="add-post-btn">
                <a href="add-post.php" class="blue-btn"><i class="ri-add-large-line"></i>&nbsp;&nbsp;Add Category</a>
            </div>
        </div>
        <div class="dashboard-section">
            <div class="dashboard-elements">
                <div class="row g-3 g-md-4">
                    <div class="col-md-6 col-lg-3">
                        <a href="#">
                            <div class="element-box">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="icon">
                                        <i class="ri-price-tag-3-line"></i>
                                    </div>
                                    <!-- <div class="graph-percentage">
                                        <i class="fa-solid fa-arrow-trend-up"></i>
                                    </div> -->
                                </div>
                                <p class="title">Total Categories</p>
                                <p class="count">10</p>
                            </div>
                        </a>
                    </div>
                    <div class="col-md-6 col-lg-3">
                        <a href="#">
                            <div class="element-box">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="icon bg-purple">
                                        <i class="ri-file-text-line"></i>
                                    </div>
                                    <!-- <div class="graph-percentage">
                                        <i class="fa-solid fa-arrow-trend-up"></i>
                                    </div> -->
                                </div>
                                <p class="title">Total Posts</p>
                                <p class="count">5,660</p>
                            </div>
                        </a>
                    </div>
                    <div class="col-md-6 col-lg-3">
                        <a href="#">
                            <div class="element-box">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="icon bg-color-5">
                                        <i class="ri-heart-line"></i>
                                    </div>
                                    <!-- <div class="graph-percentage text-red ">
                                        <i class="fa-solid fa-arrow-trend-up"></i>
                                    </div> -->
                                </div>
                                <p class="title">Total Likes</p>
                                <p class="count">9,237</p>
                            </div>
                        </a>
                    </div>
                    <div class="col-md-6 col-lg-3">
                        <a href="#">
                            <div class="element-box">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="icon bg-orange">
                                        <i class="ri-line-chart-line"></i>
                                    </div>
                                    <!-- <div class="graph-percentage">
                                        <i class="fa-solid fa-arrow-trend-up"></i>
                                    </div> -->
                                </div>
                                <p class="title">Trending</p>
                                <p class="count">4 Categories</p>

                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="filter-section">
            <form action="#">
                <div class="filters">
                    <div class="search-box">
                        <input type="text" name="search_post" placeholder="Search categories by name or description..." class="form-control" />
                        <div class="search-icon">
                            <i class="ri-search-line"></i>
                        </div>
                    </div>
                    <div class="others-filters">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="status-box">
                                    <select name="post-status" id="" class="form-select">
                                        <option value="" selected>All Categories</option>
                                        <option value="">Trending</option>
                                        <option value="">Most Popular</option>
                                        <option value="">Recently Added</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <a href="#" class="filter-btn form-control"><i class="ri-filter-line"></i>&nbsp;Filter</a>
                            </div>
                            <div class="col-md-3">
                                <a href="#" class="filter-btn form-control"><i class="ri-export-line"></i>&nbsp;Export</a>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <div class="posts-table mt-4">
            <table>
                <thead>
                    <tr>
                        <th>Category</th>
                        <th>Description</th>
                        <th>Posts</th>
                        <th>Likes</th>
                        <th>Created</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php for ($i = 1; $i <= 3; $i++) { ?>
                        <tr>
                            <td class="flex-box">
                                <div class="icon-box" style="background-color:#4b83f9">
                                    💻
                                </div>
                                <div>
                                    <span>Technology</span>
                                    <br>
                                    <span class="slug">/technology</span>
                                </div>
                            </td>
                            <td>Latest tech news, gadgets, and innovations</td>
                            <td><i class="ri-file-text-line"></i>&nbsp;1,245</td>
                            <td><i class="ri-heart-line"></i>&nbsp;8,924</td>
                            <td><i class="ri-calendar-line"></i>&nbsp;Jan 15, 2025</td>
                            <td class="actions">
                                <a href="#"><i class="ri-file-edit-line"></i></a>
                                <a href="#"><i class="ri-delete-bin-6-line"></i></a>
                            </td>
                        </tr>
                        <tr>
                            <td class="flex-box">
                                <div class="icon-box" style="background-color:#3eb97f">
                                    💪
                                </div>
                                <div>
                                    <span>Health & Fitness</span>
                                    <br>
                                    <span class="slug">/health-fitness</span>
                                </div>
                            </td>
                            <td>Wellness tips, workout routines, and nutrition</td>
                            <td><i class="ri-file-text-line"></i>&nbsp;892</td>
                            <td><i class="ri-heart-line"></i>&nbsp;6,543</td>
                            <td><i class="ri-calendar-line"></i>&nbsp;Feb 10, 2024</td>
                            <td class="actions">
                                <a href="#"><i class="ri-file-edit-line"></i></a>
                                <a href="#"><i class="ri-delete-bin-6-line"></i></a>
                            </td>
                        </tr>
                        <tr>
                            <td class="flex-box">
                                <div class="icon-box" style="background-color:#ee9d00">
                                    ✈️
                                </div>
                                <div>
                                    <span>Travel</span>
                                    <br>
                                    <span class="slug">/travel</span>
                                </div>
                            </td>
                            <td>Explore destinations and travel guides</td>
                            <td><i class="ri-file-text-line"></i>&nbsp;756</td>
                            <td><i class="ri-heart-line"></i>&nbsp;5,234</td>
                            <td><i class="ri-calendar-line"></i>&nbsp;Jan 20, 2024</td>
                            <td class="actions">
                                <a href="#"><i class="ri-file-edit-line"></i></a>
                                <a href="#"><i class="ri-delete-bin-6-line"></i></a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
                <tfoot>
                    <tr>
                        <td>
                            <div class="showing-post-counting">
                                Showing <span>1</span> to <span>9</span> of <span>9</span> categories
                            </div>
                        </td>
                        <td>
                            <div class="pagination">

                            </div>
                        </td>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
</div>

<?php include "footer.php"; ?>