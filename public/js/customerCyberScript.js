document.addEventListener("DOMContentLoaded", function () {
  formLoader("customer");

  document.getElementById("Main-form").addEventListener("submit", queryAction);

  document.getElementById("deleteForm").addEventListener("submit", queryAction);
});

function handleCustomerData(event) {
  let buttonValue = event.submitter.name;
  let tableSelect = document.getElementById("tableSelect");

  const formFields = this.querySelectorAll(".form-field");
  const data = tableKeyAndDataJoiner(formFields);
  const formData = new URLSearchParams();
  if (Array.isArray(data)) {
    data.forEach((field) => {
      for (const key in field) {
        formData.append(key, field[key]);
      }
    });
  } else {
    console.error("Invalid data format. function queryAction");
  }

  if (buttonValue === "add") {
    fetch("../app/Routes/Router.php?router=customerRegistration", {
      method: "POST",
      headers: { "content-type": "application/json" },
      body: formData,
    })
      .then((response) => {
        console.log("Response back from php server", response);
        fetchTable(tableSelect.value);
      })
      .catch((error) => {
        console.error(
          "Error from cyberScript: FUNCTION queryAction : add section: ",
          error
        );
      });
  }

  // TODO: Implement the update and delete functionality
}
