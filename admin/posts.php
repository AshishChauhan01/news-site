<?php
$activePage = 'posts';
include "header.php"; ?>
<div class="posts-page section-padding min-height">
    <div class="container">
        <div class="page-title-section">
            <div class="title-content">
                <h2 class="common-title">Posts Management</h2>
                <p class="section-content">Manage and monitor all your published content.</p>
            </div>
            <div class="add-post-btn">
                <a href="add-post.php" class="blue-btn"><i class="ri-add-large-line"></i>&nbsp;&nbsp;Add New Post</a>
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
                                        <i class="ri-eye-line"></i>
                                    </div>
                                    <div class="graph-percentage">
                                        <i class="fa-solid fa-arrow-trend-up"></i>
                                    </div>
                                </div>
                                <p class="title">Total Users</p>
                                <p class="count">71,510</p>
                            </div>
                        </a>
                    </div>
                    <div class="col-md-6 col-lg-3">
                        <a href="#">
                            <div class="element-box">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="icon bg-purple">
                                        <i class="ri-chat-4-line"></i>
                                    </div>
                                    <div class="graph-percentage">
                                        <i class="fa-solid fa-arrow-trend-up"></i>
                                    </div>
                                </div>
                                <p class="title">Total Comments</p>
                                <p class="count">1,189</p>
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
                                    <div class="graph-percentage text-red ">
                                        <i class="fa-solid fa-arrow-trend-up"></i>
                                    </div>
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
                                    <div class="icon bg-green">
                                        <i class="ri-share-line"></i>
                                    </div>
                                    <div class="graph-percentage">
                                        <i class="fa-solid fa-arrow-trend-up"></i>
                                    </div>
                                </div>
                                <p class="title">Total Posts</p>
                                <p class="count">8</p>

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
                        <input type="text" name="search_post" placeholder="Search posts by title, author, or category..." class="form-control" />
                        <div class="search-icon">
                            <i class="ri-search-line"></i>
                        </div>
                    </div>
                    <div class="others-filters">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="status-box">
                                    <select name="post-status" id="" class="form-select">
                                        <option value="" selected>All Status</option>
                                        <option value="">Published</option>
                                        <option value="">Draft</option>
                                        <option value="">Scheduled</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <a href="#" class="filter-btn form-control"><i class="ri-filter-line"></i>&nbsp;Filter</a>
                            </div>
                            <div class="col-md-4">
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
                        <th>Post Title</th>
                        <th>Author</th>
                        <th>Category</th>
                        <th>Status</th>
                        <th>stats</th>
                        <th>Date</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>

                    <tr>
                        <td>The Future of Artificial Intelligence in 2025</td>
                        <td>John Smith</td>
                        <td>Technology</td>
                        <td><span class="status published">Published</span></td>
                        <td class="stats">
                            <span class="views"><i class="ri-eye-line"></i>&nbsp;15,420&nbsp;</span>
                            <span class="comments"><i class="ri-chat-4-line"></i>&nbsp;234&nbsp;</span>
                            <span class="likes"><i class="ri-heart-line"></i>&nbsp;1,892&nbsp;</span>
                        </td>
                        <td><i class="ri-calendar-line"></i>&nbsp;Jan 15, 2025</td>
                        <td class="actions">
                            <a href="#"><i class="ri-eye-line"></i></a>
                            <a href="#"><i class="ri-file-edit-line"></i></a>
                            <a href="#"><i class="ri-delete-bin-line"></i></a>
                        </td>
                    </tr>
                    <tr>
                        <td>10 Healthy Habits to Transform Your Life</td>
                        <td>Sarah Johnson</td>
                        <td>Health & Fitness</td>
                        <td><span class="status draft">Draft</span></td>
                        <td class="stats">
                            <span class="views"><i class="ri-eye-line"></i>&nbsp;12,350&nbsp;</span>
                            <span class="comments"><i class="ri-chat-4-line"></i>&nbsp;189&nbsp;</span>
                            <span class="likes"><i class="ri-heart-line"></i>&nbsp;1,456&nbsp;</span>
                        </td>
                        <td><i class="ri-calendar-line"></i>&nbsp;Jan 15, 2025</td>
                        <td class="actions">
                            <a href="#"><i class="ri-eye-line"></i></a>
                            <a href="#"><i class="ri-file-edit-line"></i></a>
                            <a href="#"><i class="ri-delete-bin-line"></i></a>
                        </td>
                    </tr>
                    <tr>
                        <td>The Future of Artificial Intelligence in 2025</td>
                        <td>John Smith</td>
                        <td>Technology</td>
                        <td><span class="status scheduled">Scheduled</span></td>
                        <td class="stats">
                            <span class="views"><i class="ri-eye-line"></i>&nbsp;15,420&nbsp;</span>
                            <span class="comments"><i class="ri-chat-4-line"></i>&nbsp;234&nbsp;</span>
                            <span class="likes"><i class="ri-heart-line"></i>&nbsp;1,892&nbsp;</span>
                        </td>
                        <td><i class="ri-calendar-line"></i>&nbsp;Jan 15, 2025</td>
                        <td class="actions">
                            <a href="#"><i class="ri-eye-line"></i></a>
                            <a href="#"><i class="ri-file-edit-line"></i></a>
                            <a href="#"><i class="ri-delete-bin-line"></i></a>
                        </td>
                    </tr>
                </tbody>
                <tfoot>
                    <tr>
                        <td>
                            <div class="showing-post-counting">
                                Showing <span>1</span> to <span>8</span> of <span>8</span> posts
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