<?php
session_start();
include_once "connection.php";
$outgoing_id = $_SESSION['id'];
$sql = "SELECT * FROM user WHERE NOT id = {$outgoing_id} ORDER BY id DESC";
$query = mysqli_query($con, $sql);
$output = "";
if (mysqli_num_rows($query) == 0) {
    $output .= "No users are available to chat";
} elseif (mysqli_num_rows($query) > 0) {
    include_once "data.php";
}

?>

    <?php echo $output; ?>
