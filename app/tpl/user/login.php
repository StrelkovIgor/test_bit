<?php
ob_start()
?>
    <form method="post">
        <input type="text" name="login" >
        <input type="password" name="password" >
        <input type="submit" value="Отправить" />
    </form>

<?php
$content = ob_get_clean();
?>