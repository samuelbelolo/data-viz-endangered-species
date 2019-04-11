<?php include './views/partials/header.php'; ?>

<div class="species">
    <?php include './views/partials/sidebar.php'; ?>
    <div class="species__scroll-content">
        <div class="species__scroll-content__main">
            <div class="title">
                <h1>Lined Seahorse</h1>
                <a href="#" title="Back to country">Back</a>
            </div>
            <p class="italic scientific">Hippocampus Erectus</p>
            <h2>Threats</h2>
            <div class="threat">
                <h3>Threat 1</h3>
                <ul>
                    <li>Housing</li>
                    <li>Commercial interest</li>
                </ul>
            </div>
            <div class="threat">
                <h3>Threat 2</h3>
                <ul>
                    <li>Housing</li>
                    <li>Commercial interest</li>
                </ul>
            </div>
            <div class="threat">
                <h3>Threat 3</h3>
                <ul>
                    <li>Housing</li>
                    <li>Commercial interest</li>
                </ul>
            </div>
            <h2>Conservation actions needed</h2>
            <ul>
                <li>Housing</li>
                <li>Commercial interest</li>
            </ul>
            <h2>Whatever</h2>
            <ul>
                <li>Housing</li>
                <li>Commercial interest</li>
            </ul>
        </div>
        <div class="species__scroll-content__sidebar">
            <div class="img-container">
                <img src="<?= URL ?>dist/img/test_img.png" alt="">
            </div>
            <div class="description">
                <div class="categories">
                    <p>LC</p>
                    <p>NV</p>
                    <p>VU</p>
                    <p>EN</p>
                    <p class="is-selected">CE</p>
                    <p>EW</p>
                    <p>EX</p>
                </div>
                <h2>Habitat and Ecology</h2>
                <p>System : <strong>Marine</strong></p>
                <p>Habitat Type : <strong>Marine</strong></p>
                <h2>Geographic Range</h2>
            </div>
        </div>
        
        
    </div>
</div>

<?php include './views/partials/footer.php'; ?>
