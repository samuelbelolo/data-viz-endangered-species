function previous_page () {
    const $backLink = document.querySelector('.js-go-back')

    if ($backLink) {
        $backLink.addEventListener('click', (_event) => {
            _event.preventDefault()
            
            history.go(-1)
        })
    }
}