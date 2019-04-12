function sidebar_svg () {
    const $sidebar = document.querySelector('.region__sidebar')

    if ($sidebar) {
        console.log(countryCode);
        
        const $svg_paths = $sidebar.querySelectorAll('svg path')
        
        for (const _path of $svg_paths) {
            
            if (_path.getAttribute('id').toLowerCase() === countryCode.toLowerCase()) {
                _path.classList.add('selected')
            }
        }
    }
}