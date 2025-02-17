<?php
if (isset($_GET['stat'])) {
    $status = htmlspecialchars($_GET['stat']);
    echo "<div class='error-message'>$status</div>";
}
?>

