
var database = [
    {
        username: "salman",
        password: "1234"
    }
];


var userNamePrompt = prompt("What's your username?");
var passwordPrompt = prompt("What's your password?");


function signIn(user, pass) {
    if (user === database[0].username && pass === database[0].password) {
        alert("Login successful! Form data will be displayed below.");

        let params = new URLSearchParams(window.location.search);
        let data = "";
        for (let [key, value] of params.entries()) {
            data += `<b>${key}</b>: ${value} <br>`;
        }

        document.getElementById("output").innerHTML =
            "<h3>Form Data:</h3>" + data;

    } else {
        alert(" Incorrect username or password");

        window.location.href = "contactme.html";
    }
}


signIn(userNamePrompt, passwordPrompt);
