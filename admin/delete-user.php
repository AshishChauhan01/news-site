<?php
include "../connection.php";

if (!isset($_GET['id']) or !is_numeric($_GET['id'])) {
    echo "<div class='alert alert-danger'>Invalid Request</div>";
}

$user_id = intval($_GET['id']);

$delete_query = "DELETE FROM users WHERE id = '$user_id'";
$query_execute = mysqli_query($conn, $delete_query);

if ($query_execute) {
    header("location:users.php?success=deleted");
} else {
    echo "User record do not deleted successfully: " . mysqli_error($conn);
}
