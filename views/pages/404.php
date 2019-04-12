<?php include './views/partials/header.php' ?>
<div class="not-found">
    <?php include './views/partials/navigation.php' ?>
    <h1>Oops there is nothing here</h1>
    <h2>Get back to the map :</h2>
    <a href="<?= URL ?>map" title="Back to the map">
        <?php include './views/partials/world_svg.php' ?>
    </a>
</div>

<?php include './views/partials/footer.php' ?>