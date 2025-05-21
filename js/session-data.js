const sessionData = () => {
    fetch('php/SessionsData.php')
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
            const el = document.getElementById('employeeID');
            if (el) {
                el.textContent = `welcome ${data.employeeID}`;
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