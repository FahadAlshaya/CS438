
let password = document.getElementById("password");
let form = document.getElementById("form");
let b = document.getElementById("error");

form.addEventListener('submit', (e)=> { 
  let messages = []
  

  if(password.value.length <= 6 ){
    messages.push("password must be longer than 6 characters");
  
}


if(password.value === "password" ){
    messages.push("The Password can not be password");
  
}
    if(messages.length > 0){
      e.preventDefault()
    b.innerText=messages.join(', ');
  }
  


}
)