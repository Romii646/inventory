
document.addEventListener('DOMContentLoaded', function (){
    formLoader('customer');
    
    // Add an event listener to the form to handle form submissions.
    document.getElementById('Main-form').addEventListener("submit", queryAction);

    // Add an event listener to the delete form to handle form submissions.
    document.getElementById('deleteForm').addEventListener("submit", queryAction)
})

const handleCustomerData = async (event) =>{
    let buttonValue = event.submitter.name;

    const formFields = this.querySelectorAll('.form-field');
    const data = tableKeyAndDataJoiner(formFields);
    const formData = new URLSearchParams();
    if(Array.isArray(data)){

    }

    if(buttonValue === 'add'){
        await fetch('../app/Routes/Router.php?router=grabSession', {
            method : "POST",
            headers : {'content-type' : 'application/json'},
            body: JSON.stringify()
        })
        .then(response =>{

        })
        .then(data => {

        })
        .catch(error => {

        });
    }
}