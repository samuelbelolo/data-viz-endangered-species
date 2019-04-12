function load_more () {
    
    const $countryLoadMore = document.querySelector('.js-load-more')
    
    if ($countryLoadMore) {
        const $loader = document.querySelector('.region__scroll-content__tiles .loader-container')
        $countryLoadMore.addEventListener('click', () => {
            $loader.style.display = 'block'
            //load more here
        })
    }
    
}