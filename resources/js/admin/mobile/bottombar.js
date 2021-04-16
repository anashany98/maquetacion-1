const changeButton=document.querySelectorAll('.change');
const table = document.querySelectorAll(".table");
const form = document.querySelectorAll(".form");

changeButton.forEach(changeButton => { 

    changeButton.addEventListener("click", () => {

        let visibleElements = document.querySelectorAll(".visible");

        if(tableButton.classList.contains("visible")){

            tableButton.classList.remove("visible");

            visibleElements.forEach(visibleElement => {
                visibleElement.classList.remove("visible");
            });

        }else{

            visibleElements.forEach(visibleElement => {
                visibleElement.classList.remove("visible");
            });
            
            tableButton.classList.add("visible");

        }
    });
    
});





