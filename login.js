
const url = 'login.php';
const form = document.querySelector('form');

form.addEventListener('login', e => {
    e.preventDefault();

    username = document.getElementById("userid");
    password = document.getElementById("pswrd")
    const formData = new FormData();
    var eU = cryptojs.
    formData.append('files[]', file);

    fetch(url, {
        method: 'POST',
        body: formData
    }).then(response => {
        console.log(response);
    });
});