import tableNames from './tableNames.js'; // Import the JavaScript object

const tableSelectElement = document.getElementById('tableSelect');

 // this variable is used to access the description key in the condition object if you 
 // change the key in the tableNames.js file then you need to change this variable 
 // to match the new key
const keyhole = 'description'; // can be found with variable subkey

// this variable holds the form heading text. If you want to change the title of the form use this variable.
const formHeaderDescription = "Add & Update form for "; 

const formFields = 'form-field';

function formLoader(event) {
    console.log("formLoader triggered"); // Debugging statement
    const tableSelect = tableSelectElement.value;
    console.log("Selected table:", tableSelect); // Debugging statement
    const tableName = tableNames[tableSelect];
    console.log("Table data:", tableName); // Debugging statement
    const mainForm = document.getElementById('Main-form');
    const output = document.querySelector('.output');

    deleteFormElements(mainForm); // Clear previous form content

    const headerDiv = document.createElement('div');
    headerDiv.classList.add('mainFormHeading');
    const header = document.createElement('h2');
    header.textContent = formHeaderDescription + tableSelect.charAt(0).toUpperCase() + tableSelect.slice(1);
    headerDiv.appendChild(header);
    mainForm.appendChild(headerDiv);

    for (const key in tableName[0]) { // Access the first object in the array
        const value = tableName[0][key];
        console.log("Processing key:", key, "with value:", value); // Debugging statement

        const formDiv = document.createElement('div');
        formDiv.classList.add(formFields);

        const label = document.createElement('label');
        label.htmlFor = key;

        if (Array.isArray(value)) {
            console.log("Key is an array:", key); // Debugging statement
            label.textContent = key; // Use the key for the label
            formDiv.appendChild(label);

            const select = document.createElement('select');
            select.id = key;
            select.name = key;
            formDiv.appendChild(select);

            const option = document.createElement('option');
            option.value = '';
            option.textContent = 'Select an option';
            select.appendChild(option);

            for (const item of value) {
                console.log("Adding option to select:", item); // Debugging statement
                const option = document.createElement('option');
                option.value = item;
                option.textContent = item;
                select.appendChild(option);
            }
        } else if (typeof value === 'object' && value !== null) {
            console.log("Key is an object:", key, "with value:", value); // Debugging statement

            for (const subKey in value) {
                const subValue = value[subKey];
                console.log("Processing subKey:", subKey, "with subValue:", subValue); // Debugging statement

                const subLabel = document.createElement('label');

                //key is the original variable in the outter for in loop, key is the key side of the object structure.
                // For example width: small, medium, large; width is the key side of the key-value structure.
                subLabel.htmlFor = key; // used to for the element tag.

                // Use the value for the description key as the label text
                if (subKey === keyhole) {
                    subLabel.textContent = subValue; // Use the description value
                } 

                formDiv.appendChild(subLabel);

                if (Array.isArray(subValue)) {
                  // next three statements creates a select element and appends attribute names along with text content subkey.
                  //  example subKey is used to carry over database name identifiers like primary ID
                    const select = document.createElement('select');
                    select.id = subKey;
                    select.name = subKey;

                    // creates a blank option to keep the first value null if this list is not selected
                    const option = document.createElement('option');
                    option.value = '';
                    option.textContent = 'Select an option';
                    select.appendChild(option);

                    for (const item of subValue) {// iterates through an array within the object
                        console.log("Adding option to sub-select:", item); // Debugging statement
                        const option = document.createElement('option');// element create process for the options in the drop down list
                        option.value = item;
                        option.textContent = item;
                        select.appendChild(option);
                    }
                    formDiv.appendChild(select);
                } else {
                  // this section fires if the current value is not an array or object it gets a simple input text element.
                    /* const input = document.createElement('input');
                    input.type = 'text';
                    input.id = key;
                    input.name = key;
                    input.value = ''; // Ensure the input is blank
                    formDiv.appendChild(input); */
                }
            }
        } else {
          // this section fires if the current value is not an array or object it gets a simple input text element.
            console.log("Key is a single value (text input):", key, "with value:", value); // Debugging statement
            label.textContent = value; // Use the key for the label
            formDiv.appendChild(label);
            const input = document.createElement('input');
            input.type = 'text';
            input.id = key;
            input.name = key;
            input.value = ''; // Ensure the input is blank
            formDiv.appendChild(input);
        }
        mainForm.appendChild(formDiv);
        moveButtonContainer(mainForm);
        fetchTable(Object.keys(tableName[0]));
    }
    output.appendChild(mainForm);
}

tableSelectElement.addEventListener('change', formLoader);

function deleteFormElements(form) {
   let formChildElement = form.querySelectorAll('.'+ formFields);
   
   formChildElement.forEach(childElement => childElement.remove());

   formChildElement = form.querySelectorAll('.mainFormHeading')

   formChildElement.forEach(childElement => childElement.remove());
}

function moveButtonContainer(form){
  let buttonContainer = form.querySelector('.button-container');
  if(buttonContainer){
    form.appendChild(buttonContainer);
  }
  else{
    console.error('Element is not found or doesnt exist.')
  }
}

/* function formLoader(event) {
    event.preventDefault();
    const tableSelect = tableSelectElement.value;
  
    const tableArray = tableNames[tableSelect];
    const output = document.querySelector('.output');
    output.innerHTML = ''; // Clear previous content
  
    if (tableArray && tableArray.length > 0) {
      const tableObject = tableArray[0]; // Access the first object
  
      for (const key in tableObject) {
        const value = tableObject[key]; // Access each property dynamically
  
        // Create an element for each key-value pair
        const paragraph = document.createElement('p');
        paragraph.textContent = `${key}: ${Array.isArray(value) ? value.join(', ') : value}`;
        output.appendChild(paragraph);
      }
    } else {
      output.innerHTML = '<p>No data available for the selected table.</p>';
    }
  } */

/*     function formLoader(event) {
        event.preventDefault();
        const tableSelect = tableSelectElement.value;
      
        // Access the selected table's array
        const tableArray = tableNames[tableSelect];
      
        const output = document.querySelector('.output');
      
        // Check if the selected table exists in the tableNames object
        if (tableArray && tableArray.length > 0) {
          // Render the first item in the selected table array (you can modify to display all items)
          const tableObject = tableArray[0];
          output.innerHTML = `
            <h2>${tableSelect}</h2>
            <p>ID: ${tableObject.id}</p>
            <p>Name: ${tableObject.name}</p>
            ${tableObject.condition ? `<p>Condition: ${tableObject.condition.description}</p>` : ''}
            ${tableObject.cost ? `<p>Cost: ${tableObject.cost}</p>` : '<p>Cost: Not available</p>'}
            <p>Status: ${tableObject.status.join(', ')}</p>
            ${tableObject.location ? `<p>Location: ${tableObject.location}</p>` : ''}
            ${tableObject.size ? `<p>Size: ${tableObject.size.join(', ')}</p>` : ''}
            ${tableObject.width ? `<p>Width: ${tableObject.width.join(', ')}</p>` : ''}
          `;
        } else {
          output.innerHTML = `<p>No data available for the selected table.</p>`;
        }
      } */


/*         // Get all divs with the class 'form-field'
const formFields = document.querySelectorAll('.form-field');

// Create an array to store the collected data
const fieldData = [];

formFields.forEach(field => {
    let input = field.querySelector('input'); // Find the input field inside the div
    
    if (input) { // Ensure there's an input field
        fieldData.push({
            id: input.id,
            value: input.value
        });
    }
});

console.log(fieldData); // Outputs an 
// 
// 
// 
// formFields.forEach(field => {//debugger
            console.error('Form field 1:', field);
            let input = field.querySelector('input');
            if (input) {
                console.log('Input ID:', input.id);
                console.log('Input Value:', input.value);
            }
        }); */