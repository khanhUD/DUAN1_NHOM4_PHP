<?php
if (!isset($_SESSION['users'])) {
    $response = new Response;
    $response->redirect(_WEB_ROOT.'Dang-Nhap');
}
$this->render('blocks/admin/header')
?>
<!-- Layout wrapper -->
<div class="layout-wrapper layout-content-navbar">
    <div class="layout-container">
        <?php
        $this->render('blocks/admin/menu')
        ?>

        <!-- Layout container -->
        <div class="layout-page">
            <?php
            $this->render('blocks/admin/navbar')
            ?>
            <!-- Content wrapper -->
            <div class="content-wrapper">
                <div class="container-xxl flex-grow-1 container-p-y">
                    <!-- / Content -->
                    <?php
                    $this->render($content, $sub_content);

                    ?>
                    <!-- / Content -->
                </div>

                <?php
                $this->render('blocks/admin/footer')
                ?>


                <div class="content-backdrop fade"></div>
            </div>
            <!-- Content wrapper -->
        </div>
        <!-- / Layout page -->
    </div>

    <!-- Overlay -->
    <div class="layout-overlay layout-menu-toggle"></div>
</div>
<!-- / Layout wrapper -->
<?php
$this->render('blocks/admin/scrip')
?>