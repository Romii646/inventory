function showTable(event) {
  // function to show table currently a function not in use until more php focused files are developed.
  event.preventDefault();
  var tables = document.getElementById("table").value; // get the value of the table
  var httpRequest = new XMLHttpRequest(); // create a new XMLHttpRequest object
  var form = document.getElementById("form2").value; // get the value of the form
  if (!tables || !form) {
    console.log("Table or form value is missing.");
  }
  httpRequest.onreadystatechange = function () {
    // function to be called when the readyState property changes
    if (this.readyState == 4 && this.status == 200) {
      document.getElementById("show").innerHTML = this.responseText;
    }
  };
  httpRequest.open(
    "GET",
    "../../app/controller_Layer/form_process.php?table=" +
      tables +
      "&form=" +
      form,
    true
  ); // specify the type of request
  httpRequest.send(); // send the request
}

/*********************************************************************************************************************************************************** */
// import tableNames from './tableNames.js'; // Import the JavaScript object

const tableSelectElement = document.getElementById("tableSelect");

// this variable is used to access the description key in the condition object if you
// change the key in the tableNames.js file then you need to change this variable
// to match the new key
const keyhole = "description"; // can be found with variable subkey

const formFields = "form-field";

const formHeading = "mainFormHeading";

// this variable holds the form heading text. If you want to change the title of the form use this variable.
const formHeaderDescription = "Add & Update form for ";

// this variable holds the form's dropdown menu option text title. If you want to change the title of the dropdown menu use this variable.
const optionDescription = "Select an option";

function formLoader(event) {
  let tableSelect = tableSelectElement.value;
  let tableName = undefined;

  if (window.rentalTables && window.rentalTables[tableSelect]) {
    tableName = window.rentalTables[tableSelect];
  } else if (window.tableNames && window.tableNames[tableSelect]) {
    tableName = window.tableNames[tableSelect];
  } else if (event && (window.customerTable || window.rentalTables)) {
    const firstKey = window.customerTable
      ? Object.keys(window.customerTable)[0]
      : Object.keys(window.rentalTables)[0];
    tableName = window.customerTable
      ? window.customerTable[firstKey]
      : window.rentalTables[firstKey];
    tableSelect = event;
  }

  if (!tableName) {
    console.error("No table definition found for", tableSelect, tableName);
    return;
  }

  const mainForm = document.getElementById("Main-form");
  // const output = document.querySelector('.formMaker');

  deleteFormElements(mainForm); // Clear previous form content

  const headerDiv = document.createElement("div");
  headerDiv.classList.add("mainFormHeading");
  const header = document.createElement("h2");
  header.textContent =
    formHeaderDescription +
    tableSelect.charAt(0).toUpperCase() +
    tableSelect.slice(1);
  headerDiv.appendChild(header);
  mainForm.appendChild(headerDiv);

  for (const key in tableName[0]) {
    // Access the first object in the array
    const value = tableName[0][key];

    const formDiv = document.createElement("div");
    formDiv.classList.add(formFields);

    const label = document.createElement("label");
    label.htmlFor = key;

    if (Array.isArray(value)) {
      label.textContent = key; // Use the key for the label
      formDiv.appendChild(label);

      const select = document.createElement("select");
      select.id = key;
      select.name = key;
      formDiv.appendChild(select);

      const option = document.createElement("option");
      option.value = "";
      option.textContent = optionDescription;
      select.appendChild(option);

      for (const item of value) {
        const option = document.createElement("option");
        option.value = item;
        option.textContent = item;
        select.appendChild(option);
      }
    } else if (typeof value === "object" && value !== null) {
      const subLabel = document.createElement("label");
      for (const subKey in value) {
        const subValue = value[subKey];

        // key is the original variable in the outer for-in loop, key is the key side of the object structure.
        // For example width: small, medium, large; width is the key side of the key-value structure.
        subLabel.htmlFor = key; // used to create a for attribute tag with context in this case key values.

        // Use the value for the description key as the label text
        if (subKey === keyhole) {
          subLabel.textContent = subValue; // Use the description value
        }

        formDiv.appendChild(subLabel);

        if (Array.isArray(subValue)) {
          // next three statements creates a select element and appends attribute names along with text content subkey.
          // example subKey is used to carry over database name identifiers like primary ID
          const select = document.createElement("select");
          select.id = subKey;
          select.name = subKey;

          // creates a blank option to keep the first value null if this list is not selected
          const option = document.createElement("option");
          option.value = "";
          option.textContent = optionDescription;
          select.appendChild(option);

          for (const item of subValue) {
            // iterates through an array within the object
            const option = document.createElement("option"); // element create process for the options in the drop down list
            option.value = item;
            option.textContent = item;
            select.appendChild(option);
          }

          formDiv.appendChild(select);
        } else {
          continue;
        }
      }
    } else {
      // this section fires if the current value is not an array or object it gets a simple input text element.
      label.textContent = value; // Use the key for the label
      formDiv.appendChild(label); // this area can be modified to help destinguish butween a text input and a date input
      const input = document.createElement("input");
      input.type = "text";
      input.id = key;
      input.name = key;
      input.value = ""; // Ensure the input is blank
      formDiv.appendChild(input);
    }
    mainForm.appendChild(formDiv);
  }
  moveButtonContainer(mainForm);
  deleteRowFormLoader(tableName);
  fetchTable(tableSelect);
}

tableSelectElement.addEventListener("change", formLoader);

function deleteFormElements(form) {
  let formChildElement = form.querySelectorAll("." + formFields);

  formChildElement.forEach((childElement) => childElement.remove());

  formChildElement = form.querySelectorAll("." + formHeading);

  formChildElement.forEach((childElement) => childElement.remove());
}

function moveButtonContainer(form) {
  const buttonContainer = form.querySelector(".button-container");
  buttonContainer.firstElementChild.value = "None";
  buttonContainer.children[1].value = "None";

  if (buttonContainer) {
    form.appendChild(buttonContainer);
  } else {
    console.error("Element is not found or doesnt exist.");
  }
}

function deleteRowFormLoader(tableName) {
  const deleteForm = document.getElementById("deleteForm");
  deleteFormElements(deleteForm);

  const headerDiv = document.createElement("div");
  headerDiv.classList.add(formHeading);
  deleteForm.appendChild(headerDiv);

  const header = document.createElement("h2");
  header.textContent = "Delete Row Form";
  headerDiv.appendChild(header);

  const deleteFormDiv = document.createElement("div");
  deleteFormDiv.classList.add(formFields);

  const key = Object.keys(tableName[0])[0];
  const value = tableName[0][key];

  const deleteLabel = document.createElement("label");
  console.log(key, value);
  deleteLabel.htmlFor = key;
  deleteLabel.textContent = value;
  deleteFormDiv.appendChild(deleteLabel);

  const deleteInput = document.createElement("input");
  deleteInput.type = "text";
  deleteInput.id = key;
  deleteInput.name = key;
  deleteFormDiv.appendChild(deleteInput);
  deleteForm.appendChild(deleteFormDiv);

  moveButtonContainer(deleteForm);
}
/*************************************************************************************************************************************************************************/
function setDropdownOptions(tableNames) {
  const tableSelect = document.getElementById("tableSelect");
  Object.keys(tableNames).forEach((tableName) => {
    const option = document.createElement("option");
    option.value = tableName;
    option.textContent = tableName.charAt(0).toUpperCase() + tableName.slice(1);
    tableSelect.appendChild(option);
  });
}

if (window.tableNames) {
  setDropdownOptions(window.tableNames);
} else if (window.rentalTables) {
  setDropdownOptions(window.rentalTables);
} else if (window.customerTable) {
  setDropdownOptions(window.customerTable);
} else {
  console.error(
    "No tableNames, rentalTables, or customerTable found. ",
    window.customerTable
  );
}
/*************************************************************************************************************************************************************************/
