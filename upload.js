const url = 'server\\parse.php';
const form = document.querySelector('form');

form.addEventListener('submit', e => {
    e.preventDefault();

    const files = document.querySelector('[type=file]').files;
    const formData = new FormData();

    for (let i = 0; i < files.length; i++) {
        let file = files[i];

        formData.append('files[]', file);
    }

    fetch(url, {
        method: 'POST',
        body: formData
    }).then(response => response.text()).then( data => {

        if (data === "index.html") {
            alert("Please log in!!");
            window.location.replace("index.html");
        }else{

            if (data != null){
                var myWindow = window.open("","results");
            myWindow.document.write("<h3>Your results are:</h3>" +"<p>"+ data + "</p>")
            }else{
                alert("Input data not valid!")
            }
        }
        });
});