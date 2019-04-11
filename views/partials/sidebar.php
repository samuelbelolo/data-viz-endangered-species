<div class="region__sidebar">
    <div class="region__sidebar__header">
        <button class="menu js-menu">
            <div class="bar">
            </div>
        </button>
        
    </div>
    <div class="region__sidebar__content">
        <?php if($controller == 'country'): ?>
            <h1><?= $country ?></h1>
        <?php else: ?>
            <h2><?= $country ?></h2>
        <?php endif; ?>
        <div class="img-container">
            <?php include './views/partials/world_svg.php' ?>
        </div>
        <div class="back-link">
            <a href="<?= URL ?>" title="Go to the map">
                <img src="<?= URL ?>dist/img/world_minia.png" alt="">
                <p>Back to the map !</p>
            </a>
        </div>
    </div>
    <div class="full-menu">
        <nav>
            <ul>
                <li><a href="">Home</a></li>
                <li><a href="">Map</a></li>
                <li><a href="">About</a></li>
            </ul>
        </nav>
    </div>
</div>