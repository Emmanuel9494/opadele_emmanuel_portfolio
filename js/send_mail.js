export function sendMail (){
	const form = document.querySelector("#contactForm");
const feedBack = document.querySelector("#feedback");

function regForm(event) {
    event.preventDefault();
    const thisform = event.currentTarget;
    const url = "sendmail.php";

    
    const formdata = new URLSearchParams();
    for (const pair of new FormData(thisform)) {
        formdata.append(pair[0], pair[1]);
    }

    fetch(url, {
        method: "POST",
        headers: {
            "Content-type": "application/x-www-form-urlencoded"
        },
        body: formdata.toString()
    })
    .then(response => response.json())
    .then(response => {
        feedBack.innerHTML = "";
        if (response.errors) {
            response.errors.forEach(error => {
                const errorElement = document.createElement("p");
                errorElement.textContent = error;
                feedBack.appendChild(errorElement);
            });
        } else {
            form.reset();
            const messageElement = document.createElement("p");
            messageElement.textContent = response.message;
            feedBack.appendChild(messageElement);
        }
        feedBack.scrollIntoView({ behavior: 'smooth', block: 'end' });
    })
    .catch(error => {
        console.log(error);
        feedBack.innerHTML = "<p>Whoops, something went wrong. Please try again.</p>";
    });
}

form.addEventListener("submit", regForm);

}