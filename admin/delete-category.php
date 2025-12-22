<?php
include('../connection.php');
if (!isset($_GET['id']) or !is_numeric($_GET['id'])) {
    echo "<div class='alert alert-danger'>Invalid Request</div>";
}
$cat_id = intval($_GET['id']);
$delete_cat_query = "DELETE FROM categories WHERE id = '$cat_id'";

$delete_cat = mysqli_query($conn, $delete_cat_query);
if ($delete_cat) {
    header('location:categories.php?success=removed');
} else {
    header('location:categories.php?error=not-removed');
}
