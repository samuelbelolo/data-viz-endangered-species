// const map = L.map('map', {
//     center: [51.505, -0.09],
//     zoom: 13
// });
const $mapSvg = document.querySelector('.map-container .js-world-svg');

const windowSizes = {
    width: window.innerWidth,
    height: window.innerHeight
}

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

const oldPos = {}

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
        
        $mapSvg.style.top = `${top}px`
        $mapSvg.style.left = `${left}px`
    }
    mouseCursor.x = _event.clientX
    mouseCursor.y = _event.clientY
})

const $paths = $mapSvg.querySelectorAll('path');

for (const _$path of $paths) {
    const $link = document.createElementNS("http://www.w3.org/2000/svg",'a')
    $link.setAttribute('href', 'https://alphonsebouy.fr')
    
    // const newPath = _$path.cloneNode();
    
    $link.appendChild(_$path)
    $mapSvg.appendChild($link)
    // _$path.style.fill = 'blue';
}


