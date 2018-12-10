const url = 'server\\2factor.php';
const form = document.querySelector('form');

form.addEventListener('submit', e => {
    e.preventDefault();

    var code = document.getElementById("code").value;
    const formData = new FormData();

    formData.append("code", code);
    fetch(url, {
        method: 'POST',
        body: formData
    }).then(response => response.text()).then(data => {
        if (data === "true") {
            alert("Success");
            window.location.replace("upload.html");
        } else {
            alert("Unsuccesful attempt, try another code!")
        }

    });
});