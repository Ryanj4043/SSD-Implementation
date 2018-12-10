const url = 'server\\register.php';
const form = document.querySelector('form');

function validateEmail(email)
{
    var re = /^(?:[a-z0-9!#$%&amp;'*+/=?^_`{|}~-]+(?:\.[a-z0-9!#$%&amp;'*+/=?^_`{|}~-]+)*|"(?:[\x01-\x08\x0b\x0c\x0e-\x1f\x21\x23-\x5b\x5d-\x7f]|\\[\x01-\x09\x0b\x0c\x0e-\x7f])*")@(?:(?:[a-z0-9](?:[a-z0-9-]*[a-z0-9])?\.)+[a-z0-9](?:[a-z0-9-]*[a-z0-9])?|\[(?:(?:25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)\.){3}(?:25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?|[a-z0-9-]*[a-z0-9]:(?:[\x01-\x08\x0b\x0c\x0e-\x1f\x21-\x5a\x53-\x7f]|\\[\x01-\x09\x0b\x0c\x0e-\x7f])+)\])$/;
    return re.test(email);
}

form.addEventListener('submit', e => {
    e.preventDefault();

    username = document.getElementById("userid").value;
    password = document.getElementById("pswrd").value;
    cpassword = document.getElementById("Cpswrd").value;
    if(validateEmail(username)){
        if (cpassword == password) {
            const formData = new FormData();

            var d = "false";
            formData.append("un", username);
            formData.append("ps", password);

            fetch(url, {
                method: 'POST',
                body: formData
                }).then(response => response.text()).then(data => {
                    var output = data.split(",");
                    if (output[1] === "true") {
                        window.alert("Please enter this code into the google autheticator app: "+output[0]);
                        window.location.replace("2factor.html");

                    }
                });

            }
    }});

