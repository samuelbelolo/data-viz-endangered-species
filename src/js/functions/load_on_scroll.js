function load_on_scroll () {
    const loadMoreButton = document.querySelector('.load-more')

    loadMoreButton.addEventListener('click', () => {
        window.location.reload()
        // Here make fetch request
    })
    
    
}