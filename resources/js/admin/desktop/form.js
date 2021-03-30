
const forms = document.querySelectorAll(".admin-form");
const labels = document.getElementsByTagName('label');
const inputs = document.querySelectorAll('.input');
const enviar = document.getElementById("send");
const table = document.getElementById("table");
const form = document.getElementById("form")
const editButtons= document.querySelectorAll(".edit");
const removeButtons = document.querySelectorAll(".remove");


inputs.forEach(input => {

    input.addEventListener('focusin', () => {

        for( var i = 0; i < labels.length; i++ ) {
            if (labels[i].htmlFor == input.name){
                labels[i].classList.add("active");
            }
        }
    });

    input.addEventListener('blur', () => {

        for( var i = 0; i < labels.length; i++ ) {
            labels[i].classList.remove("active");
        }
    });
});

enviar.addEventListener("click", (event) => {
    
    event.preventDefault ()
    
    const forms = document.querySelectorAll(".formulario");
    
    forms.forEach(form => { 

        let data = new FormData(form);
        let url = form.action;
       

        let sendPostRequest = async () => {

            try {
                await axios.post(url, data).then(response => {
                    form.id.value = response.data.id;
                    table.innerHTML = response.data.table;
                });
                 
            } catch (error) {
                console.error(error);
            }
        };

        sendPostRequest();

        console.log('1');
    
    })
   
})

editButtons.forEach(editButton => {

    editButton.addEventListener("click", (event) => {

        let url = editButton.dataset.url;

        let sendGetRequest = async () => {

            try {
                await axios.get(url).then(response => {
                    form.innerHTML = response.data.form;
                });
                
            } catch (error) {
                console.error(error);
            }
        };

        sendGetRequest();

        console.log('OK');
    });
});


removeButtons.forEach(removeButton => {

    removeButton.addEventListener("click", (event) => {

        let url = removeButton.dataset.url;

        let sendDeleteRequest = async () => {

            try {
                await axios.delete(url).then(response => {
                   table.innerHTML=response.data.table;
                })
            }
            catch (error) {
                console.error(error);
            }
        };

        sendDeleteRequest();

        console.log('OK');
    });
});





    