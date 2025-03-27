function showTable(event){//function to show table
    event.preventDefault();
    var tables = document.getElementById('table').value;//get the value of the table
    var httpRequest = new XMLHttpRequest();//create a new XMLHttpRequest object
    var form = document.getElementById('form2').value;//get the value of the form
    if (!tables || !form) {
        console.log("Table or form value is missing.");
    }
    httpRequest.onreadystatechange = function(){//function to be called when the readyState property changes
        if(this.readyState == 4 && this.status == 200){
            document.getElementById('show').innerHTML = this.responseText;
        }
    };
        httpRequest.open("GET", "./php/form_process.php?table=" + tables + "&form=" + form, true);//specify the type of request
        httpRequest.send();//send the request
} 