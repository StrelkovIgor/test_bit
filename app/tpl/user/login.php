<?php
$tpl->section();
?>

<section class="section summary-section">
    <h2 class="section-title"><i class="fa fa-user"></i>Вход</h2>
    <div class="summary">
        Логин: admin Пароль: admin
        <p style="color:red;"><?=$html->error;?></p>
        <form method="post">
            <input type="text" name="login" >
            <input type="password" name="password" >
            <input type="submit" value="Отправить" />
        </form>
    </div><!--//summary-->
</section><!--//section-->
<?php
$tpl->endSection('content');
?>
<?php
$tpl->advanced('template');
?>
