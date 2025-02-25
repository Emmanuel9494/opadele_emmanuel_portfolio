export function sendMail() {
    const form = document.querySelector("#contactForm");
    const feedBack = document.querySelector("#feedback");

    function regForm(event) {
        event.preventDefault();
        const thisform = event.currentTarget;
        const url = "sendmail.php";

        
        const formdata = 
        `first_name=${thisform.elements.first_name.value}&last_name=${thisform.elements.last_name.value}&email=${thisform.elements.email.value}&comments=${thisform.elements.comments.value}`
         console.log(formdata);

       

        fetch(url, {
            method: "POST",
            headers: {
                "Content-type": "application/x-www-form-urlencoded"
            },
            body: formdata
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

                // Redirect if a redirect URL is provided
                if (response.redirect) {
                    setTimeout(() => {
                        window.location.href = response.redirect;
                    }, 1000); // Redirect after 2 seconds
                }
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