//const url = 'http://SsdCw2-env.fggdurpnvd.eu-west-2.elasticbeanstalk.com';
const url = "/server/index.php";
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
        mode: "no-cors",
        //credentials: "same-origin",
        body: formData
    }).then(response => response.text()).then(data => {if( data === "true"){
        window.location.replace("2factor.html");
        console.log(data)}});
});

