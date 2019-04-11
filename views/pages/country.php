<?php include './views/partials/header.php' ?>

<div class="region">
    <?php include './views/partials/sidebar.php' ?>
    <div class="region__scroll-content">
        <div class="region__scroll-content__stats">
            <h2>Statistics</h2>
            
        </div>
        <div class="region__scroll-content__header">
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

<?php include './views/partials/footer.php'; ?>