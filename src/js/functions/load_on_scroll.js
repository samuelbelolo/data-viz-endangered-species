function load_on_scroll () {
    const loadMoreButton = document.querySelector('.load-more')

    loadMoreButton.addEventListener('click', () => {
        fetch(window.location.href,
        {
            headers: {
              'Accept': 'application/json',
              'Content-Type': 'application/json'
            },
            method: "POST",
            body: {'array': JSON.stringify(selectedSpecies)}
        })
        .then((e) =>{
            console.log(e.text().then((e)=>{console.log(e)}));
            
            // e.json()
            // .then((e) => {
            //     console.log(e);
                
            // })
            
        })
    })
    
    
}