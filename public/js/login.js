const ErrorMessage = document.createElement("p");
ErrorMessage.innerText = "Ievadīti nepareizi lietotāja dati!";
ErrorMessage.style.color = "red";


function Error() {
    document.getElementById("submit-error").appendChild(ErrorMessage);
}