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

//function to clear form values
function clearForm(formId){
    formValue = document.getElementById(formId);
    formValue.reset();
    showNeededFields(); // reset for all hidden entries
}

// function to fetchTable pcSetUp which is for the main table that keeps track of computers currently on the lab floor
function fetchTable(event) {
    fetch('pc_set_up_process.php?action=view', {
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
            document.getElementById('pcSetUp-table').innerHTML = table;
        }
    })
    .catch(error => {
        console.error('Error in fetchTable:', error);
        document.getElementById('error').innerHTML = '<p>Error loading data.</p>';
    });
}

document.addEventListener('DOMContentLoaded', function() {
    // Fetch and display the table data as soon as the page loads.
    fetchTable("pcsetups");
    
    // Add an event listener to the form to handle form submissions.
    document.getElementById('Main-form').addEventListener("submit", queryTable);

    // Add an event listener to the delete form to handle form submissions.
    document.getElementById('deleteForm').addEventListener("submit", deleteRow);

    // Add an event listener to the viewTableContainer to handle view table submissions.
    document.querySelector('.viewTableContainer').addEventListener("click", virtualView);
});

// function add is used to add new entries to the pcSetUP table and update to table
function queryTable(event){
    event.preventDefault();
    var nameValue = event.submitter.name;
    const pc_id = document.getElementById('pc_id').value;
    const mobo_id = document.getElementById('mobo_id').value;
    const gpu_id = document.getElementById('gpu_id').value;
    const ram_id = document.getElementById('ram_id').value;
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
        'psu_id' : psu_id,
        'monitor_id' : monitor_id,
        'acc_id' : acc_id,
        'kb_id' : kb_id,
        'mouse_id' : mouse_id,
        'tableLocation' : tableLoc,
        'PCcondition' : PCcondition
    };

    if(nameValue === 'add'){
        fetch('pc_set_up_process.php?action=add', {
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
           // fetchTable();
            console.error('Error: ', error);
            document.getElementById('error').innerHTML = "Add operation failed.";
        });
    }
    else if(nameValue === 'update'){
        fetch('pc_set_up_process.php?action=update', {
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

// function to delete row from the pc set up table
function deleteRow(event){
        event.preventDefault();
        const pc_id = document.getElementById('delete_pc_id').value;

        fetch('pc_set_up_process.php?action=delete', {
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

function virtualView(event){
    event.preventDefault();
    const idName = event.target.id;

    fetchTable(idName);// fetch table data for view tables
}