<?php
$activePage = 'posts';
include "header.php";

$get_posts_query = "SELECT ps.*, cs.category_name, us.first_name, us.last_name FROM posts as ps 
                    LEFT JOIN categories as cs ON ps.category_id = cs.id 
                    LEFT JOIN users as us ON ps.author_id = us.id";
$get_posts = mysqli_query($conn, $get_posts_query);

?>

<section class="posts-section section-padding min-height">
    <div class="container">
        <div class="section-wrapper">
            <div class="title-head">
                <div class="row align-items-center">
                    <div class="col-md-6">
                        <h2>All Posts</h2>
                    </div>
                    <div class="col-md-6 text-end">
                        <a href="add-post.php" class="btn btn-success btn-sm"><i class="fa-solid fa-plus"></i>&nbsp;Add Post</a>
                    </div>
                </div>
            </div>
            <table class="table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th></th>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Category</th>
                        <th>Date</th>
                        <th>Author</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1.</td>
                        <td>
                            <div class="post-thumbnail">
                                <img src="" alt="">
                            </div>
                        </td>
                        <td>Lorem ipsum dolor sit, amet consectetur adipisicing.</td>
                        <td>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Id, obcaecati dolorum veritatis quos nobis non illum? Rem nobis optio enim perspiciatis tempora autem voluptatum pariatur fuga placeat. Vel explicabo tenetur necessitatibus, optio tempora, quos sit omnis repellat dolore qui itaque cumque eos fugit provident! Assumenda dolorum minus eligendi sequi doloribus.</td>
                        <td>technology</td>
                        <td>20aug2025</td>
                        <td>ashish</td>
                        <td class="text-center" style="min-width:145px">
                            <a href="" class="mx-2 view-icon">
                                <i class="ri-eye-line text-primary"></i>
                            </a>
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