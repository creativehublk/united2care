<?php include_once '../../app/global/url.php';
include_once ROOT_PATH.'/app/global/sessions.php';
include_once ROOT_PATH.'/app/global/Gvariables.php';

session_destroy();
?>
<script>
    window.location = 'login.php';
</script>