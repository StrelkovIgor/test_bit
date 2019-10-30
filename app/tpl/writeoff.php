<?php
$tpl->section();
?>

    <section class="section summary-section">
        <h2 class="section-title"><i class="fa fa-user"></i>Списание средств</h2>
        <div class="summary">
            <p style="color:red;"><?=$html->error;?></p>
            <form method="post">
                <input type="text" name="coin" >
                <input type="submit" value="Списать" />
            </form>
        </div><!--//summary-->
    </section><!--//section-->
<?php
$tpl->endSection('content');
?>
<?php
$tpl->advanced('template');
?>