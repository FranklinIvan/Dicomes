
const pass1 = document.getElementById("password1");
const pass2 = document.getElementById("password2");
const form = document.getElementById("form");
const error = document.getElementById("error");

form.addEventListener('submit',(e)=>{
    let messages = [];
    
    if(pass2.value != pass1.value){
        messages.push('Las contraseñas deben coincidir');
        pass2.style.borderColor = "red";
        
    }

    if(messages.length>0){
        e.preventDefault();
        error.innerText = messages.join(', ')
    }
    
    
})
