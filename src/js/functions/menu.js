function menu () {
    const $menuButton = document.querySelector('.js-menu')
    const $menu = document.querySelector('.full-menu')

    if ($menuButton) {
        $menuButton.addEventListener('click', () => {
            $menu.classList.toggle('is-open')
            $menuButton.classList.toggle('menu-open')
        })
    }
}