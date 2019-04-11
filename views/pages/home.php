<?php include './views/partials/header.php' ?>
<div class="home">
    <?php include './views/partials/navigation.php' ?>
    <div class="block">
        <div class="text">
            <p> <strong>Urgency</strong> <br> More than <b>27,000</b> species are threatened with <strong>extinction</strong>. <br> That is more than <b>27%</b> of all assessed species.</p>
        </div>
        <div class="click">
                <span>click here !</span>
                <img class="arrow" src="<?= URL ?>dist/img/arrow.svg" alt="arrow">
            </div>
        <a class="map-link" href="<?= URL ?>map" title="The map">
            <?php include './views/partials/world_svg.php' ?>
        </a>
    </div>
</div>
<?php include './views/partials/footer.php' ?>