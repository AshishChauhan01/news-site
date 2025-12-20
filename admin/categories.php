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
                <a href="javascript:void(0)" class="blue-btn" data-bs-toggle="modal" data-bs-target="#addCategoryModal"><i class="ri-add-large-line"></i>&nbsp;&nbsp;Add Category</a>
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


<!-- add category form model -->
<div class="modal fade add-category-modal" id="addCategoryModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <form action="#">
                <div class="modal-header">
                    <h2 class="modal-title common-title" id="exampleModalLabel">Add New Category</h2>
                    <button type="button" class="btn-close  btn-close-white" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"></span>
                    </button>
                </div>

                <div class="modal-body">
                    <div class="mb-3">
                        <label for="" class="form-label">Category Name *</label>
                        <input type="text" class="form-control" placeholder="e.g., Technology, Lifestyle, Business" name="cat_name" id="cat_name" required>
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">URL Slug *</label>
                        <input type="text" class="form-control" placeholder="e.g., technology, lifestyle, business" name="cat-slug" id="cat-slug" required>
                        <div class="form-text">*This will be used in the URL: /category/slug</div>
                    </div>

                    <div class="mb-3">
                        <label for="" class="form-label">Description</label>
                        <textarea placeholder="Brief description of this category..." class="form-control" name="cat-description" id="cat-description" rows="4"></textarea>
                    </div>
                    <div class="mb-3">
                        <div class="row">
                            <div class="col-md-6">
                                <label for="" class="form-label">Category Color</label>

                                <div class="d-flex align-items-center gap-3">
                                    <input type="color"
                                        id="colorPicker"
                                        class="form-control form-control-color"
                                        value="#3B82F6"
                                        name="cat-color"
                                        title="Choose color">

                                    <input type="text"
                                        id="colorCode"
                                        class=" form-control"
                                        value="#3B82F6"
                                        placeholder="#000000">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label for="" class="form-label">Category Icon (Emoji)*</label>
                                <div class="emoji-field">
                                    <input
                                        type="text"
                                        id="emojiInput"
                                        class="form-control"
                                        placeholder="Select emoji"
                                        readonly>
                                    <input
                                        type="hidden"
                                        name="cat-emoji"
                                        id="emojiValue">

                                    <div class="emoji-picker-wrapper d-none" id="emojiPicker">
                                        <emoji-picker></emoji-picker>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="mb-2">
                        <div class="cat-preview-box">
                            <h4>Preview</h4>
                            <div class="cat-content">
                                <div class="cat-icon" style="background-color:#3B82F6;">
                                    😀
                                </div>
                                <div>
                                    <p class="cat-name">Category Name</p>
                                    <p class="cat-slug">/category-slug</p>
                                    <p class="cat-description">Category description will appear here...</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn blue-btn">Add Category</button>
                    <button type="button" class="btn btn-cancel" data-bs-dismiss="modal">Cancel</button>
                </div>
        </div>
        </form>
    </div>
</div>
<!-- End model -->
<?php include "footer.php"; ?>