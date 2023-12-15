<?php
$this->render('blocks/clients/header')
?>

<?php
$this->render('blocks/clients/navbar')
?>

<!-- / Content -->
<?php
$this->render($content, $sub_content);
?>
<!-- / Content -->


<?php
$this->render('blocks/clients/footer', $sub_content);
?>


<?php
$this->render('blocks/clients/scrip')
?>