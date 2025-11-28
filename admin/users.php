<?php include "header.php"; ?>
<section class="users-section section-padding min-height">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-6">
                <h2>All Users</h2>
            </div>
            <div class="col-md-6 text-end">
                <a href="add-user.php" class="btn btn-success btn-sm">Add User <i class="fa-solid fa-user-pen"></i>
                </a>
            </div>
        </div>
        <table class="table table-striped table-bordered border-white mt-2">
            <thead class="table-dark text-center">
                <tr>
                    <th>#</th>
                    <th>Full Name</th>
                    <th>Email</th>
                    <th>User Name</th>
                    <th>Role</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1.</td>
                    <td>Ashish Chauhan</td>
                    <td>ashishchauhanindian@gmail.com</td>
                    <td>ashish@chauhan</td>
                    <td>Admin</td>
                    <td class="text-center">
                        <a href="edit-user.php" class="mx-3 edit-icon"><i class="fa-solid fa-pen-to-square text-secondary"></i></a>
                        <a href="delete-user.php" class="mx-3 delete-icon"> <i class="fa-solid fa-trash text-secondary"></i></a>
                    </td>
                </tr>
                <tr>
                    <td>2.</td>
                    <td>Ashish Chauhan</td>
                    <td>ashishchauhanindian@gmail.com</td>
                    <td>ashish@chauhan</td>
                    <td>Admin</td>
                    <td class="text-center">
                        <a href="edit-user.php" class="mx-3 edit-icon"><i class="fa-solid fa-pen-to-square text-secondary"></i></a>
                        <a href="delete-user.php" class="mx-3 delete-icon"> <i class="fa-solid fa-trash text-secondary"></i></a>
                    </td>
                </tr>
                <tr>
                    <td>3.</td>
                    <td>Ashish Chauhan</td>
                    <td>ashishchauhanindian@gmail.com</td>
                    <td>ashish@chauhan</td>
                    <td>Admin</td>
                    <td class="text-center">
                        <a href="edit-user.php" class="mx-3 edit-icon"><i class="fa-solid fa-pen-to-square text-secondary"></i></a>
                        <a href="delete-user.php" class="mx-3 delete-icon"> <i class="fa-solid fa-trash text-secondary"></i></a>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>

</section>
<?php include "footer.php" ?>