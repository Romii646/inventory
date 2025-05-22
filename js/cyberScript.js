// Description: This script handles the functionality of the Cyber Lab Management System. It includes functions for adding, updating, deleting, and viewing computer setups in the lab. The script also manages the visibility of form fields based on user selections and handles form submissions.
// It uses the Fetch API to communicate with a PHP backend for database operations. The script is designed to be modular and reusable, with clear separation of concerns for different functionalities.

//Global variables
let CSVdata = [];
let tableFileName = '';
function showNeededFields(table, accessories, monitors, motherboards, ramsticks, powersupplies){
    // declared variables
    const tableSelect = document.getElementById(table).value;
    const accessoryField = document.getElementById(accessories);
    const monitorsFields = document.getElementById(monitors);
    const motherboardsFields = document.getElementById(motherboards);
    const ramsticksFields = document.getElementById(ramsticks);
    const powerSupplyFields = document.getElementById(powersupplies);

    accessoryField.classList.add('hidden');
    monitorsFields.classList.add('hidden');
    motherboardsFields.classList.add('hidden');
    ramsticksFields.classList.add('hidden');
    powerSupplyFields.classList.add('hidden');

    if(tableSelect === 'accessories') {
        accessoryField.classList.remove('hidden');
    }
    else if (tableSelect === 'monitors') {
        monitorsFields.classList.remove('hidden');
    }
    else if (tableSelect === 'motherboards') {
        motherboardsFields.classList.remove('hidden');
    }
    else if (tableSelect === 'ramsticks') {
        ramsticksFields.classList.remove('hidden');
    }
    else if (tableSelect === 'powersupplies') {
        powerSupplyFields.classList.remove('hidden');
    }
}// end of addShowNeededFields
/******************************************************************************************************************************************************************************************************************/
//function to clear form values
function clearForm(formId){
    formValue = document.getElementById(formId);
    formValue.reset();
    showNeededFields(); // reset for all hidden entries
}
/*************************************************************************************************************************************************************************************************************************/
// function to fetchTable pcSetUp which is for the main table that keeps track of computers currently on the lab floor
// Functions that uses this function are virtualView, queryTable, and deleteRow.
function fetchTable(event) {
    tableFileName = event;
    fetch('./php/pc_set_up_process.php?action=view', {
        method : 'POST',
        headers : {'content-type' : 'application/json'},
        body : event
    })
    .then(response => {
        console.log('Response Status:', response.status); // Log the HTTP status
        return response.json(); // Read the response as text
    })
    .then(data => {
        if (data.message) {
            document.getElementById('pcSetUp-table').innerHTML = data.message;
        } 
        else {
            CSVdata = structuredClone(data); // deep copy of the data for CSV export
            let table = '<table border="1"><tr>';
            for (let key in data[0]) {
                table += `<th>${key}</th>`;
            }
            table += '</tr>';
            data.forEach(row => {
                table += '<tr>';
                for (let key in row) {
                    table += `<td>${row[key]}</td>`;
                }
                table += '</tr>';
            });
            table += '</table>';
            document.getElementById('pcSetUp-table').innerHTML = table; //this will be replaced by a function that will create a paragraph element and append it to a container
        }
    })
    .catch(error => {
        console.error('Error in fetchTable:', error);
        document.getElementById('error').innerHTML = '<p>Error loading data.</p>';
    });
}
/**************************************************************************************************************************************************************************************************************************************/
// function to fetchTable for the view tables
function virtualView(event){
    event.preventDefault();
    const idName = event.target.id;
    if(idName === 'pcsetups'){
        window.location.reload();
    }else{
        fetchTable(idName);// fetch table data for view tables
    }
}

document.addEventListener('DOMContentLoaded', function() {
    // Fetch and display the table data as soon as the page loads.
    fetchTable("pcsetups");
    
    // Add an event listener to the form to handle form submissions.
    document.getElementById('Main-form').addEventListener("submit", queryAction);

    // Add an event listener to the delete form to handle form submissions.
    document.getElementById('deleteForm').addEventListener("submit", queryAction);

    // Add an event listener to the viewTableContainer to handle view table submissions.
    document.querySelector('.viewTableContainer').addEventListener("click", virtualView);
});
/****************************************************************************************************************************************************************************************************************************************************/
// function add is used to add new entries to the pcSetUP table and update to table
function queryTable(event){
    event.preventDefault();
    const nameValue = event.submitter.name;
    const pc_id = document.getElementById('pc_id').value;
    const mobo_id = document.getElementById('mobo_id').value;
    const gpu_id = document.getElementById('gpu_id').value;
    const ram_id = document.getElementById('ram_id').value;
    const storage_slot_id = document.getElementById('storage_slot_id').value;
    const psu_id = document.getElementById('psu_id').value;
    const monitor_id = document.getElementById('monitor_id').value;
    const acc_id = document.getElementById('acc_id').value;
    const kb_id = document.getElementById('kb_id').value;
    const mouse_id = document.getElementById('mouse_id').value;
    const tableLoc = document.getElementById('tableLocation').value;
    const PCcondition = document.getElementById('PCcondition').value;

    const fieldValueArray = {
        'pc_id' : pc_id,
        'mobo_id' : mobo_id,
        'gpu_id' : gpu_id,
        'ram_id' : ram_id,
        'storage_slot_id' : storage_slot_id,
        'psu_id' : psu_id,
        'monitor_id' : monitor_id,
        'acc_id' : acc_id,
        'kb_id' : kb_id,
        'mouse_id' : mouse_id,
        'tableLocation' : tableLoc,
        'PCcondition' : PCcondition
    };

    console.log(nameValue);

    if(nameValue === 'add'){
        fetch('./php/pc_set_up_process.php?action=add', {
            method : 'POST',
            headers : {'content-type' : 'application/json' },
            body: JSON.stringify(fieldValueArray)
        })
        .then(data => {
            console.log('Response:', data);
            if (data.error) {
                console.error('Error: ', data.error);
                document.getElementById('error').innerHTML = data.error;
            } else {
                fetchTable("pcsetups");
                document.getElementById('success').innerHTML = "Add successful.";
                document.getElementById('error').innerHTML = "";
            }
        })
        .catch(error =>{
            console.error('Error: ', error);
            document.getElementById('error').innerHTML = "Add operation failed.";
        });
    }
    else if(nameValue === 'update'){
        fetch('./php/pc_set_up_process.php?action=update', {
            method : 'POST',
            headers : {'content-type' : 'application/json'},
            body : JSON.stringify(fieldValueArray) 
        })
        .then(() =>{
            fetchTable("pcsetups");
            document.getElementById('success').innerHTML = "Update successful.";
        })
        .catch(error => {
            console.error('Error: ', error);
            document.getElementById('error').innerHTML = "Update failed.";
        })
       } 
}
/*****************************************************************************************************************************************************************************************************************************************************************************/
// function to delete row from the pc set up table
function deleteRow(event){
        event.preventDefault();
        const pc_id = document.getElementById('delete_pc_id').value;

        fetch('./php/pc_set_up_process.php?action=delete', {
            method : 'POST',
            headers : {'content-type' : 'application/json'},
            body : JSON.stringify({pc_id : pc_id})
        })
        .then(() => {
            fetchTable("pcsetups");
            document.getElementById('success').innerHTML = "Row deleted successfully."
        })
        .catch(error => {
            console.error('Error: ', error);
            document.getElementById('error').innerHTML = "Row deleted failed."
        });
}
/**********************************************************************************************************************************************************************************************************************************************************************************/
function queryAction(event) {
    event.preventDefault();
    let formID = event.submitter.value;
    // for the fetchTable function. the string represents a key-value pair name where it finds the value.
    //  value is the names of the tables in the database
    console.log("the name", formID);
    let tableSelect = document.getElementById('tableSelect');

    if(formID === 'addPCForm'){
        queryTable(event);
    }
    else if(formID === 'deletePCForm'){
        deleteRow(event);
    }
    else{
      //  event.preventDefault();
        let nameValue = event.submitter.name;
        // for the fetchTable function. the string represents a key-value pair name where it finds the value.
        //  value is the names of the tables in the database

        const formFields = this.querySelectorAll('.form-field');
        const data = tableKeyAndDataJoiner(formFields);
            
        const formData = new URLSearchParams();
        if(Array.isArray(data)){
            data.forEach(field =>{
                for(const key in field){
                    formData.append(key, field[key]);
                }
            });
        }  
        else{
            console.error("Invalid data format. function queryAction")
        }
        
        for (const [key, value] of formData.entries()) {//debugger
            console.log('Input ID:', key);
            console.log('Input Value:', value);
        }
 
        if(nameValue === 'add'){
            fetch('./php/form_process.php?form=form1', {
                method : 'POST',
                body : formData
            })
            .then(() =>{
                console.log('Response back from php server for insertion: ', data);
                fetchTable(tableSelect.value);
            })
            .catch(error =>{
                console.error('Error from cyberScript: FUNCTION queryAction : add section: ', error);
            });
        }
        else if(nameValue === 'update'){
            fetch('./php/form_process.php?form=form3', {
                method : 'POST',
                body : formData
            })
            .then(() =>{
                console.log('Response back from php server for updating: ', data);
                fetchTable(tableSelect.value);
            })
            .catch(error =>{
                console.error('Error from cyberScript: FUNCTION queryAction : update section: ', error);
            });
        }
        else if (nameValue === 'delete'){
            fetch('./php/form_process.php?form=form4', {
                method : 'POST',
                body : formData
            })
            .then(() => {
                console.log('Response back from php server for deleting row: ', data);
                fetchTable(tableSelect.value);
            })
            .catch(error =>{
                console.error('Error from cyberScript: FUNCTION queryAction : delete section: ', error);
            });
        }
    }
}
/*****************************************************************************************************************************************************************************************************************************************************************************************/
function tableKeyAndDataJoiner (formFields){
// Create an array to store the collected data
    const fieldData = [];
    let tableSelect = document.getElementById('tableSelect');
   formFields.forEach(field => {
    //gets the child node of .form-field's element input to capture the id and value of the input inside a div element with aa class tag of .form-field
       let input = field.querySelector('input');
       let select = field.querySelector('select');
       if(input){
            fieldData.push({
                [input.id] : input.value
            });
        }
        else if(select){
            fieldData.push({
                [select.id] : select.value
            });
        }
   });
fieldData.push({
    [tableSelect.id] : tableSelect.value
});
return fieldData;
}

/*************************************************************************************************************************************************************************************************************************************************************************************************/
// function to export data to CSV
function exportToCSV() {
    const header = Object.keys(CSVdata[0]);
    const csvRows = []; // Create an array to hold the CSV data

    //add header row
    csvRows.push(header.join(',')); // Join the header keys with commas
    // loop through the data to create rows for the csv file
    CSVdata.forEach(row => {
        const tableValues = header.map(fieldNames =>{
            const values = row[fieldNames];
            return `"${String(values).replace(/"/g, '""')}"`; // Escape double quotes
        })
        csvRows.push(tableValues.join(",")); // Join the values with commas
    });

    const csvContent = csvRows.join('\n'); // Join the rows with new lines
    const blob = new Blob([csvContent], {type: 'text/csv;charset=utf-8;'}); // Create a new Blob object with the CSV content used for download files.

    const url = URL.createObjectURL(blob); // Create a URL for the Blob

    const link = document.createElement('a'); // Create a link element
    link.setAttribute('href', url); // Set the href attribute to the Blob URL
    link.setAttribute('download', tableFileName + 'TableData.csv'); // Set the download attribute with a default file name
    link.style.display = 'none';
    document.body.appendChild(link);

    link.click(); // Programmatically click the link to trigger the download
    document.body.removeChild(link); 
    URL.revokeObjectURL(url); // Release the Blob URL
}