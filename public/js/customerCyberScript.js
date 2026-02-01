// script is broken because of the form being dynamic the addeventListener is being removed. I either need to hard code the form or readd the event listener after the form is loaded
document.addEventListener("DOMContentLoaded", function () {
  // Attach a listener for 'formReady' so we can safely wire submit handlers
  document.addEventListener("formReady", function (e) {
    const form = document.getElementById(e.detail.formId);
    if (form) {
      form.removeEventListener("submit", handleCustomerData);
      form.addEventListener("submit", handleCustomerData);
    }

    const deleteForm = document.getElementById("deleteForm");
    if (deleteForm) {
      deleteForm.removeEventListener("submit", handleCustomerData);
      deleteForm.addEventListener("submit", handleCustomerData);
    }
  });
});

function handleCustomerData(event) {
  console.log("Data to be sent to the server:");
  event.preventDefault();
  let buttonValue = event.submitter.name;

  const formFields = this.querySelectorAll(".form-field");
  const data = tableKeyAndDataJoiner(formFields); // Make this return an object, not array!
  //   const formData = new URLSearchParams();
  /*  if (Array.isArray(data)) {
    data.forEach((field) => {
      for (const key in field) {
        formData.append(key, field[key]);
      }
    });
  } else {
    console.error("Invalid data format. function queryAction");
  } */
  console.log("Data to be sent to the server:", data);
  if (buttonValue === "addCustomer") {
    fetch("../app/Routes/Router.php?router=customerRegistration", {
      method: "POST",
      headers: { "Content-Type": "application/json" },
      body: JSON.stringify(data),
    })
      .then((response) => {
        console.log("Response back from php server", response);
        fetchTable("customer");
      })
      .catch((error) => {
        console.error(
          "Error from cyberScript: FUNCTION queryAction : add section: ",
          error,
        );
      });
  }

  // TODO: Implement the update and delete functionality
}

function tableKeyAndDataJoiner(formFields) {
  const fieldData = {};
  let tableSelect = document.getElementById("tableSelect");
  formFields.forEach((field) => {
    let input = field.querySelector("input");
    let select = field.querySelector("select");
    if (input) {
      fieldData[input.id] = input.value;
    } else if (select) {
      fieldData[select.id] = select.value;
    }
  });
  fieldData[tableSelect.id] = tableSelect.value;
  return fieldData;
}
