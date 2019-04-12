function map () {
    
    const $mapSvg = document.querySelector('.map-container .js-world-svg');
    
    const windowSizes = {
        width: window.innerWidth,
        height: window.innerHeight
    }
    
    window.addEventListener('resize', () => {
        windowSizes.width = window.innerWidth
        windowSizes.height = window.innerHeight
    })
    
    if ($mapSvg) {
        const mouseDown = {
            x: 0,
            y: 0
        }
    
        const mouseCursor = {
            x: 0,
            y: 0
        }
    
        const pos = {
            x: 0,
            y: 0
        }
    
        const $description = document.querySelector('.map-container .country-description')
    
        let isDown = false
    
        window.addEventListener('mousedown', (_event) => {
            isDown = true
            mouseDown.x = _event.clientX,
                mouseDown.y = _event.clientY
    
            // console.log(mouse, isDown);
    
        })
    
        window.addEventListener('mouseup', () => {
            isDown = false
        })
    
        window.addEventListener('mousemove', (_event) => {
    
            // if (_event.clientX < mouseCursor.x) {
            //     pos.x -= (_event.clientX - mouseDown.x) / windowSizes.width
            // }
            // else {
            //     pos.x += (_event.clientX - mouseDown.x) / windowSizes.width
            // }
            // if (_event.clientY < mouseCursor.y) {
            //     pos.y = $mapSvg.getBoundingClientRect().top + ((_event.clientY - mouseDown.y) / windowSizes.height)*100
            // }
            // else {
            //     pos.y = $mapSvg.getBoundingClientRect().top - ((_event.clientY - mouseDown.y) / windowSizes.height)*100
            // }
            
            $description.style.left = `${_event.clientX + 5}px`
            $description.style.top = `${_event.clientY + 5}px`
    
    
            pos.x = (_event.clientX - mouseDown.x) / windowSizes.width
            pos.y = (_event.clientY - mouseDown.y) / windowSizes.height
    
    
    
            if (isDown) {
                let top = $mapSvg.getBoundingClientRect().top + pos.y * 100
                let left = $mapSvg.getBoundingClientRect().left + pos.x * 100
                if (top > 60) {
                    top = 60
                }
                else if (top < -windowSizes.height - 500) {
                    top = -windowSizes.height - 500
                }
                if (left > 34) {
                    left = 34
                }
                else if (left < -windowSizes.width) {
                    left = -windowSizes.width
                }
    
                $mapSvg.style.top = `${ top }px`
                $mapSvg.style.left = `${ left }px`
            }
            mouseCursor.x = _event.clientX
            mouseCursor.y = _event.clientY
        })
    
        const $paths = $mapSvg.querySelectorAll('path');
    
        for (const _$path of $paths) {
            const countryCode = _$path.getAttribute('id')
            const countryName = Object.keys(countryNames).find(key => countryNames[key] === countryCode);
            let sanitizedCountryName
            if (countryName) {
                sanitizedCountryName = countryName.toLowerCase().split(' ').join('_')
            }
            
            _$path.addEventListener('mouseenter', () => {
                $description.innerHTML = `<strong>${countryName}</strong><br>${countryCodes[countryCode]} endangered species`
                $description.style.opacity = '1'
            })
            _$path.addEventListener('mouseleave', () => {
                $description.style.opacity = '0'
            })
    
    
            let fill = ''
            if (countryCodes[countryCode] > 7000) {
                fill = '#CA0813'
            }
            else if (countryCodes[countryCode] > 5000) {
                fill = '#FC361C'
            }
            else if (countryCodes[countryCode] > 3000) {
                fill = '#FC6620'
            }
            else if (countryCodes[countryCode] > 2000) {
                fill = '#FD9827'
            }
            else if (countryCodes[countryCode] > 1500) {
                fill = '#FECB2E'
            }
            else if (countryCodes[countryCode] > 1000) {
                fill = '#FFFD71'
            }
            else if (countryCodes[countryCode] > 500) {
                fill = '#3CCA3E'
            }
            else {
                fill = '#A7E7A8'
            }
    
            const $link = document.createElementNS("http://www.w3.org/2000/svg", 'a')
            $link.setAttribute('href', `${ URL }${ sanitizedCountryName }`)
    
            // const newPath = _$path.cloneNode();
    
            $link.appendChild(_$path)
            $mapSvg.appendChild($link)
            _$path.style.fill = fill;
        }
    }
}



