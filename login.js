const url = 'login.php';
const form = document.querySelector('form');

form.addEventListener('submit', e => {
    e.preventDefault();

    username = document.getElementById("luserid").value;
    password = document.getElementById("lpswrd").value;
    const formData = new FormData();

   /* eU = btoa(username);
    eP = btoa(password);*/
    var d = "false";
    formData.append("un",username);
    formData.append("ps",password);

    fetch(url, {
        method: 'POST',
        body: formData
    }).then(response => response.text()).then(data => {if( data === "true"){
        window.location.replace("2factor.html");}});
        console.log(d);

});
