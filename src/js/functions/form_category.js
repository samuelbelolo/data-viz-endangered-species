function form_category () {
    
    console.log('ok');
    
    /**
    *   Variables 
    */
    const categoryForm = document.querySelector('.categoryForm')
    
    
    
    if (categoryForm) {
        
        const categoryDivElement = [...categoryForm.querySelectorAll('.category')]
        const categoryInput = categoryForm.querySelectorAll('.category input')
        
        
        /**
        *   Submit form 
        */
        if (categoryForm) {
            // For each category div
            for (const key in categoryDivElement) {
                // On click
                categoryDivElement[key].addEventListener('click', () => {
                    // Add checked to input type radio
                    categoryInput[key].checked = true;
                    // Submit the form
                    categoryForm.submit()
                })
            }
        }
    }
}