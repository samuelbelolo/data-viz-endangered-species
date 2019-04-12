function loading () {
    const $loader = document.querySelector('.loader-package')

    window.addEventListener('load', () => {
        $loader.style.display = 'none'
    })

    const $links = document.querySelectorAll('a')

    for (const _link of $links) {
        _link.addEventListener('click', () => {
            $loader.style.display = 'flex'
        })
    }
}