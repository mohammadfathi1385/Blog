<?php
    require_once("layouts/header.php");
?>

<div class="tm-home-img-container">
    <img src="img/tm-home-img.jpg" alt="Image" class="hidden-lg-up img-fluid">
</div>

<section class="tm-section">
    <div class="container-fluid">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-xs-center">
                <h2 class="tm-gold-text tm-title">آخرین پست های سایت</h2>
            </div>
        </div>
        <div class="row">
        <?php foreach($articles as $article){ ?>
            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3 col-xl-3">

                <div class="tm-content-box">
                    <img src="http://localhost/public/images/<?= $article['image'] ?>" alt="Image" class="tm-margin-b-20 img-fluid">
                    <h4 class="tm-margin-b-20 tm-gold-text"><?= $article["title"] ?></h4>
                    <a href="http://localhost/home/show_article/<?= $article['id'] ?>" class="tm-btn text-uppercase">Read More</a>
                </div>

            </div>
        <?php } ?>
        </div> <!-- row -->
    </div>
</section>

<?php
    require_once("layouts/footer.php");
?>