
var id;
$(document).ready(function () {
    GetSelect()
});

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
        url: '/sendData.php',
        method: 'post',
        dataType: 'json',
        data: { array: array },

        success: function (data) {
            alert(data);
        }
    });

    clear();
    $('#modal').toggleClass('hidden');

}




function GetSelect() {
    $.ajax({
        type: "GET",
        url: "getData.php",
        success: function (response) {
            let data = JSON.parse(response);
            let element = document.getElementById("getData");
            for (let i in data) {
                let row = `<tr>`
                for (let j in data[i]) {
                    row += `<td>${data[i][j]}</td>`
                }
                row += `</tr>`
                element.insertAdjacentHTML('beforeend', row)
            }
            select();
        }
    });
}



function update() {
    let name = document.getElementById('first-name').value
    let lastName = document.getElementById('last-name').value
    let telephone = document.getElementById('telephone').value
    let IIN = document.getElementById('IIN').value
    let email = document.getElementById('email-address').value
    let date = document.getElementById('date').value
    let adress = document.getElementById('street-adress').value

    let array = [[name, lastName, date, IIN, telephone, email, adress, id]];

    $.ajax({
        url: 'update.php',
        method: 'post',
        dataType: 'json',
        data: {
            array: array,
        },

        success: function (data) {
            alert(data);
        }
    });

    clear();
    $('#modal2').toggleClass('hidden');


}


function select() {
    $(document).ready(function () {
        $('.table tr').hover(function () {
            $(this).addClass('hover');
        }, function () {
            $(this).removeClass('hover');
        });
        $('.table tr').click(function () {
            $('.table tr').removeClass('active');
            $(this).addClass('active');

            id = this.cells[0].innerHTML;
            document.getElementById("first-name").value = this.cells[1].innerHTML;
            document.getElementById("last-name").value = this.cells[2].innerHTML;
            document.getElementById("date").value = this.cells[3].innerHTML;
            document.getElementById("IIN").value = this.cells[4].innerHTML;
            document.getElementById("telephone").value = this.cells[5].innerHTML;
            document.getElementById("email-address").value = this.cells[6].innerHTML;
            document.getElementById("street-adress").value = this.cells[7].innerHTML;
        });
    });
}

function clear() {
    document.getElementById("first-name").value = "";
    document.getElementById("last-name").value = "";
    document.getElementById("telephone").value = null;
    document.getElementById("IIN").value = null;
    document.getElementById("email-address").value = "";
    document.getElementById("date").value = null;
    document.getElementById("street-adress").value = "";
}


