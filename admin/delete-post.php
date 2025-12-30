<?php
include "../connection.php";

if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    echo "<div class='alert alert-danger'>Invalid request</div>";
    exit();
}
$post_id = intval($_GET['id']);

$get_img = mysqli_query($conn, "SELECT thumbnail, category_id FROM posts WHERE id = $post_id");
$post = mysqli_fetch_assoc($get_img);

if ($post && !empty($post['thumbnail'])) {
    $img_path = "../assets/images/" . $post['thumbnail'];
    if (file_exists($img_path)) {
        unlink($img_path);
    }
}
$delete_query = "DELETE FROM posts WHERE id = $post_id;";
$delete_query .= "UPDATE categories SET posts = posts - 1 WHERE id = {$post['category_id']}";
$delete_post = mysqli_multi_query($conn, $delete_query);
if ($delete_post) {
    header('location:posts.php?success=deleted');
    exit();
} else {
    echo "<div class='alert alert-danger'>Delete failed</div>";
}
