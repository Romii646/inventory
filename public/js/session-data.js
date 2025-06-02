const sessionData = () => {
    fetch('../../app/Routes/Router.php?router=grabSession',{
        method : 'GET'
    })
    .then(response => {
        if (!response.ok) {
            window.alert('Session expired, please login again');
            window.location.href = './LoginPage.html';
            return;
        }
        return response.json();
    })
    .then(data => {
        if (data && data.employeeID) {
            const el = document.getElementById('welcome');
            if (el) {
                el.innerHTML = `Welcome ${data.firstName} <br> Role: ${data.employeeType}`;
            }
        }
    })
    .catch(error => {
        console.error('Error fetching session data:', error);
        window.alert('Session expired, please login again');
        window.location.href = './LoginPage.html';
    });
}

addEventListener('DOMContentLoaded', sessionData);