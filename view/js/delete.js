// delete pop up 
function sendUserID(id, input, open) {
    opener(open);
    let realId = id.split('-');
    // input section for id on change password and email box
    document.getElementById(input).value = realId[1];

}
// delete form
if (document.getElementById('personal-delete-account')) {
    document.getElementById('personal-delete-account').addEventListener('submit', function(e) {
        e.preventDefault();
        const form = new FormData(this);
        sendDeleteForm(form);
    })

}

function sendDeleteForm(form) {
    var xmlhttp = new XMLHttpRequest();

    xmlhttp.onreadystatechange = function() {
        let response = this.responseText;
        let text_status = response.split('_');
        console.log(text_status);
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById('delete-acc-err').innerHTML = text_status[0];
            // if user deletion went well.
            if (text_status[1] == "good") {
                setTimeout(() => {
                    document.getElementById('personal-delete-account').reset();
                    document.getElementById('delete-acc-err').innerHTML = "";
                    window.location.reload();
                }, 1500);


            }

        }
    };
    xmlhttp.open("post", "../../controller/admin.php", true);
    xmlhttp.send(form);


}