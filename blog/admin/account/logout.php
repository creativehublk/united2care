<?php  
session_start();

unset($_SESSION['user_id']);
session_destroy();
?>

<script>
window.location = "login.php";
</script>