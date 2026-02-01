const sessionData = () => {
  fetch("../app/Routes/Router.php?router=grabSession", {
    method: "POST",
  })
    .then((response) => {
      if (!response.ok) {
        window.alert("Session expired, please login again");
        window.location.href = "./login-page.html";
        return;
      }
      return response.json();
    })
    .then((data) => {
      if (data && data.employeeID) {
        const el = document.getElementById("welcome");
        if (el) {
          el.innerHTML = `Welcome ${data.firstName} <br> Role: ${data.employeeType}`;
        }
      }
    })
    .catch((error) => {
      console.error("Error fetching session data:", error.message);
      window.alert("Error fetching session data: " + error.message);
      window.location.href = "./LoginPage.html";
    });
};

addEventListener("DOMContentLoaded", sessionData);
