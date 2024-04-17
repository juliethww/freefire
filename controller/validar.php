<?php
if(!isset($_SESSION['id_tip_user']) && !isset($_SESSION['username'])){
echo '
<script>
    alert("error");
    window.location = "../index.php";
</script>
';
}
?>
