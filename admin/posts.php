<?php
$activePage = 'posts';
include "header.php";
?>

<section class="users-section section-padding min-height">
    <div class="container">
        <div class="section-wrapper">
            <div class="title-head">
                <div class="row align-items-center">
                    <div class="col-md-6">
                        <h2>All Posts</h2>
                    </div>
                    <div class="col-md-6 text-end">
                        <a href="add-user.php" class="btn btn-success btn-sm"><i class="fa-solid fa-plus"></i>&nbsp;Add Post</a>
                    </div>
                </div>
            </div>
            <table class="table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Post Id</th>
                        <th>Title</th>
                        <th>Category</th>
                        <th>Date</th>
                        <th>Author</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1.</td>
                        <td>1</td>
                        <td>Lorem ipsum dolor sit, amet consectetur adipisicing.</td>
                        <td>technology</td>
                        <td>20aug2025</td>
                        <td>ashish</td>
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