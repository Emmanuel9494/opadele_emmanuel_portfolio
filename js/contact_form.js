export  function contactForm() {
   
 
    const form = document.querySelector("#driverForm");
      const feedBack = document.querySelector("#feedback");
  
      function regForm(event){
          event.preventDefault();
          // console.log("regForm Called");
          const thisform = event.currentTarget;
          const url = "adduser.php";
          // console.log(thisform.elements.email.value);
          const formdata = 
          `lname=${thisform.elements.lname.value}&fname=${thisform.elements.fname.value}&email=${thisform.elements.email.value}&city=${thisform.elements.city.value}`
           console.log(formdata);
  
           fetch(url,{
              method: "POST",
              headers:{
                  "Content-type":"application/x-www-form-urlencoded"
              },
              body: formdata
           })
           .then(response => response.json())
           .then(response => {
              console.log(response);
              feedBack.innerHTML = "";
              if(response.errors){
                  response.errors.forEach(error => {
                      const errorElement = document.createElement("p");
                      errorElement.textContent = error;
                      feedBack.appendChild(errorElement);
                  })
              }
              else{
                  form.reset();
                  const messageElement = document.createElement("p");
                  messageElement.textContent = response.message;
                  feedBack.appendChild(messageElement);
              }
              feedBack.scrollIntoView({behavior: 'smooth', block: 'end'});
           })
           .catch(error => {
              console.log(error);
              const errorMessage = document.createElement("p");
              errorMessage.textContent = "Whoops,it looks like you are one of those Users"
              feedBack.appendChild(errorMessage);
           });
      }
  
  
      form.addEventListener("submit", regForm);
  
  
  
}