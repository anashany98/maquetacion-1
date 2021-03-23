require('./bootstrap');

const enviar = document.getElementById("send");

enviar.addEventListener("click", (event) => {
    
    event.preventDefault ()
    
    const forms = document.querySelectorAll(".formulario");
    
    forms.forEach(form => { 

        const data = new FormData(document.getElementById(form.id))
        
        for (var entry of data.entries()){
            console.log(entry [0] + ": " + entry[1]);
        }
    })
   
})