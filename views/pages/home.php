<?php include './views/partials/header.php' ?>

<div id="map" class="map-container">
    <?php include './views/partials/world_svg.php' ?>
    <div class="legend">
        <h4>Number of endangered species</h4>
        <div class="color">
            <div class="color-1"></div>
            <span>7000 +</span>
        </div>
        <div class="color">
            <div class="color-2"></div>
            <span>5000 +</span>
        </div>
        <div class="color">
            <div class="color-3"></div>
            <span>3000 +</span>
        </div>
        <div class="color">
            <div class="color-4"></div>
            <span>2000 +</span>
        </div>
        <div class="color">
            <div class="color-5"></div>
            <span>1500 +</span>
        </div>
        <div class="color">
            <div class="color-6"></div>
            <span>1000 +</span>
        </div>
        <div class="color">
            <div class="color-7"></div>
            <span>500 +</span>
        </div>
        <div class="color">
            <div class="color-8"></div>
            <span>1 +</span>
        </div>
    </div>
</div>

<script>
    const countryCodes = <?= json_encode($countryInfos['count']) ?>;
    const countryNames = <?= json_encode($countryInfos['names']) ?>;
    const URL = <?= json_encode(URL) ?>;
</script>

<?php include './views/partials/footer.php' ?>