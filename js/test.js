import tableNames from './tableNames.js'; // Import the JavaScript object

const tableSelectElement = document.getElementById('tableSelect');

function formLoader(event) {
    const tableSelect = tableSelectElement.value;
    const tableName = tableNames[tableSelect];
    const mainForm = document.getElementById('Main-form');
    const output = document.querySelector('.output');

    const headerDiv = document.createElement('div');
    headerDiv.classList.add('mainFormHeading');
    const header = document.createElement('h2');
     // Set the header text content
    header.textContent = "Add & Update form for " + tableSelect.charAt(0).toUpperCase() + tableSelect.slice(1);
    headerDiv.appendChild(header);// Append the header to the header div
    mainForm.appendChild(headerDiv);// Append the header to the main form

    for(const key in tableName){
        const value = tableName[key]; // Access each property dynamically

        const formDiv = document.createElement('div');// Create a div element for the form
        formDiv.classList.add('form-field');// Add a class to the form div

        const label = document.createElement('label');
        label.htmlFor = key;

        if(Array.isArray(value)){
            label.textContent = key + ':';
            formDiv.appendChild(label);

            const select = document.createElement('select');
            select.id = key;
            select.name = key;
            formDiv.appendChild(select);

            const option = document.createElement('option');
            option.value = '';
            option.textContent = 'Select an option';
            select.appendChild(option);

            for(const item of value){
                const option = document.createElement('option');
                option.value = item;
                option.textContent = item.charAt(0).toUpperCase() + item.toLowerCase();
                select.appendChild(option);
            }
        }
        else if (typeof value === 'object' && value !== null){
           
            for(const key in value){
                const subValue = value[key];
                label.htmlFor = key;

                const select = document.createElement('select');
                select.id = key;
                select.name = key;

                if(Array.isArray(subValue)){
                    const option = document.createElement('option');
                    option.value = '';
                    option.textContent = 'Select an option';
                    select.appendChild(option);

                    for(const item of subValue){
                        const option = document.createElement('option');
                        option.value = item;
                        option.textContent = item.charAt(0).toUpperCase() + item.slice(1);
                        select.appendChild(option);
                    }
                }
                else{
                    label.textContent = subValue + ':';
                    formDiv.appendChild(label); 
                }
                formDiv.appendChild(select);
            }
        }
        else {
            label.textContent = value + ':';
            formDiv.appendChild(label);
            const input = document.createElement('input');
            input.type = 'text';
            input.id = key;
            input.name = key;
            formDiv.appendChild(input);
        }
        mainForm.appendChild(formDiv);
        output.appendChild(mainForm);
        
    }
}



tableSelectElement.addEventListener('change', formLoader);


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