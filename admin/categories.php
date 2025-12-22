<?php
$activePage = 'categories';
include "header.php";
?>

<section class="users-section section-padding min-height">
    <div class="container">
        <div class="section-wrapper">
            <div class="title-head">
                <div class="row align-items-center">
                    <div class="col-md-6">
                        <h2>All Categories</h2>
                    </div>
                    <div class="col-md-6 text-end">
                        <a href="add-category.php" class="btn btn-success btn-sm"><i class="fa-solid fa-plus"></i>&nbsp;Add Category</a>
                    </div>
                </div>
            </div>
            <table class="table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Category Name</th>
                        <th>Category Slug</th>
                        <th>No. of Posts</th>
                        <th>Date</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1.</td>
                        <td>Technology</td>
                        <td>/technology</td>
                        <td>15</td>
                        <td>20aug2025</td>
                        <td class="text-center">
                            <a href="" class="mx-2 edit-icon">
                                <i class="fa-solid fa-pen-to-square text-secondary"></i>
                            </a>

                            <a href="" class="mx-2 delete-icon" onclick="return confirm('Are you sure?')">
                                <i class="fa-solid fa-trash text-secondary"></i>
                            </a>

                        </td>
                    </tr>
                    <?php //else:  
                    ?>
                    <!-- <tr class="text-center">
                            <td colspan="7">😢 No records found!</td>
                        </tr> -->
                    <?php //endif; 
                    ?>
                </tbody>
            </table>
        </div>
    </div>

</section>
<?php include "footer.php" ?>