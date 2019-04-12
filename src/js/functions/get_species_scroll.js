window.addEventListener('scroll', (e) => {
    // console.log(document.scrollTop,document.scrollHeight);
    console.log(window.scrollY);
    
    if (window.scrollY == window.pageYOffset) {
        console.log('done');
    }
  
})

