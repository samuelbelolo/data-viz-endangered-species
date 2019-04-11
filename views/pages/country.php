<?php
$country = str_replace('_', ' ', explode('/',$_GET['q'])[0]);
?>

<?php include './views/partials/header.php' ?>

<script>
    const countryCode = <?= json_encode($countryArray->country) ?>;
</script>

<div class="region">
    <?php include './views/partials/sidebar.php' ?>
    <div class="region__scroll-content">
        <div class="region__scroll-content__stats">
            <h2>Statistics</h2>
            <div class="container">
                <div class="total-count">
                    <h3>Endangered Animals in <span><?= $country ?><span></h3>
                    <p><?= $countryArray->count ?></p>
                </div>
                <div class="donut-chart">
                    <h3>Percentage by category of endangerment</h3>
                </div>
            </div>
        </div>
        <div class="region__scroll-content__header">
            <h2>Browse the animals</h2>
            <div class="filter">You can filter here</div>
            <form action="#" method="post">
                <div class="category">
                    <input type="radio" name="cat" id="lc">
                    <label for="lc">Least Concern</label>
                </div>
                <div class="category">
                    <input type="radio" name="cat" id="nv">
                    <label for="nv">Never Threatened</label>
                </div>
                <div class="category">
                    <input type="radio" name="cat" id="vu">
                    <label for="vu">Vulnerable</label>
                </div>
                <div class="category">
                    <input type="radio" name="cat" id="en">
                    <label for="en">Endangered</label>
                </div>
                <div class="category">
                    <input type="radio" name="cat" id="ce">
                    <label for="ce">Critically Endangered</label>
                </div>
                <div class="category">
                    <input type="radio" name="cat" id="ew">
                    <label for="ew">Extinct in the wild</label>
                </div>
                <div class="category">
                    <input type="radio" name="cat" id="ex">
                    <label for="ex">Extinct</label>
                </div>
            </form>
        </div>
        <div class="region__scroll-content__tiles">
            <a href="#" title="Animal">    
                <div class="region__scroll-content__tiles__single-tile">
                    <div class="img-container">
                        <img src="<?= URL ?>dist/img/test_img.png" alt="Test">
                    </div>
                    <div class="description">
                        <div class="details">
                            <span>ANIMALIA - ACTINOPTERYGII</span>
                            <span>Global</span>
                        </div>
                        <h3>Lined Seahorse</h3>
                        <p class="italic">Hippocampus erectus</p>
                        <div class="status">
                            <div class="status__arrow">
                                <span>Decreasing</span>
                                <img src="<?= URL ?>dist/img/arrow.png" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </a>
            <a href="#" title="Animal">
                <div class="region__scroll-content__tiles__single-tile">
                    <div class="img-container">
                        <img src="<?= URL ?>dist/img/test_img.png" alt="Test">
                    </div>
                    <div class="description">
                        <div class="details">
                            <span>ANIMALIA - ACTINOPTERYGII</span>
                            <span>Global</span>
                        </div>
                        <h3>Lined Seahorse</h3>
                        <p class="italic">Hippocampus erectus</p>
                        <div class="status">
                            <div class="status__arrow">
                                <span>Decreasing</span>
                                <img src="<?= URL ?>dist/img/arrow.png" alt="">
                            </div>
                            
                        </div>
                    </div>
                </div>
            </a>
            <a href="#" title="Animal">
                <div class="region__scroll-content__tiles__single-tile">
                    <div class="img-container">
                        <img src="<?= URL ?>dist/img/test_img.png" alt="Test">
                    </div>
                    <div class="description">
                        <div class="details">
                            <span>ANIMALIA - ACTINOPTERYGII</span>
                            <span>Global</span>
                        </div>
                        <h3>Lined Seahorse</h3>
                        <p class="italic">Hippocampus erectus</p>
                        <div class="status">
                            <div class="status__arrow">
                                <span>Decreasing</span>
                                <img src="<?= URL ?>dist/img/arrow.png" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </a>
            <a href="#" title="Animal">
                <div class="region__scroll-content__tiles__single-tile">
                    <div class="img-container">
                        <img src="<?= URL ?>dist/img/test_img.png" alt="Test">
                    </div>
                    <div class="description">
                        <div class="details">
                            <span>ANIMALIA - ACTINOPTERYGII</span>
                            <span>Global</span>
                        </div>
                        <h3>Lined Seahorse</h3>
                        <p class="italic">Hippocampus erectus</p>
                        <div class="status">
                            <div class="status__arrow">
                                <span>Decreasing</span>
                                <img src="<?= URL ?>dist/img/arrow.png" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        </div>
    </div>
</div>
<script>
    const count = <?= json_encode($categoryCountArray['count']) ?>;    
</script>
<script src="https://d3js.org/d3.v5.min.js"></script>
<?php include './views/partials/footer.php'; ?>