<?php require_once 'app/views/templates/header.php' ?>
<div class="container my-4">
    <div class="page-header" id="banner">
        <div class="row">
            <div class="col-lg-12">
                <h1>Hey, <?= htmlspecialchars($_SESSION['username'] ?? 'Guest') ?></h1>
                <p class="lead"> <?= date("F jS, Y"); ?></p>
            </div>
        </div>
    </div>
</div>   
<?php require_once 'app/views/templates/footer.php' ?>
