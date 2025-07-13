<?php
    if (strtolower($_SESSION['username']) !== 'admin') {
        header('Location: /home');
        exit;
    }
?>
<?php require_once 'app/views/templates/header.php' ?>
<div class="container my-4">
    <div class="page-header" id="banner">
        <div class="row">
            <div class="col-lg-12">
                <h2>Users Report 📊</h2>
                   
            </div>
        </div>
    </div>
</div>   
<?php require_once 'app/views/templates/footer.php' ?>
