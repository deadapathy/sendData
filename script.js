function sendData() {
    let name = document.getElementById('first-name').value
    let lastName = document.getElementById('last-name').value
    let telephone = document.getElementById('telephone').value
    let IIN = document.getElementById('IIN').value
    let email = document.getElementById('email-address').value
    let date = document.getElementById('date').value
    let adress = document.getElementById('street-adress').value

    let array = [[name, lastName, date, IIN, telephone, email, adress]];

    $.ajax({
        url: '/php.php',
        method: 'post',
        dataType: 'json',
        data: { array: array },

        success: function (data) {
            alert(data);
        }
    });
}

document.getElementById("button").onclick = function(e){
    document.getElementById("first-name").value = "";
}

