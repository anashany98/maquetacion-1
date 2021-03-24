

const enviar = document.getElementById("send");

enviar.addEventListener("click", (event) => {
    
    event.preventDefault ()
    
    const forms = document.querySelectorAll(".formulario");
    
    forms.forEach(form => { 

        let data = new FormData(document.getElementById(form.id));
        let url = form.action;

        let sendPostRequest = async () => {

            try {
                let response = await axios.post(url, data).then(response => {
                    form.innerHTML = response.data.form;
                    console.log('2');
                });
                 
            } catch (error) {
                console.error(error);
            }
        };

        sendPostRequest();

        console.log('1');
    
    })
   
})