/**
*   Sending the form on click on country 
*/

// Variables

const countryForm = document.querySelector('.countryForm')
const countryElementsArray = countryForm.querySelectorAll('.country')
const countryInput = countryForm.querySelector('.countryForm input')

for (const key of countryElementsArray) {
  countryElementsArray[key].addEventListener('click', () => {
    countryInput.value = countryElementsArray[key].dataset.country
    countryForm.submit()
  })
}