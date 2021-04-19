const buttonFilters = document.querySelectorAll('.filter-button')
const filter = document.querySelectorAll('.filter')

buttonFilters.forEach(buttonFilter => { 

    buttonFilter.addEventListener("click", () => {

        let appearElements = document.querySelectorAll(".appear");

        if(buttonFilter.classList.contains("appear")){

            buttonFilter.classList.remove("appear");

            appearElements.forEach(appearElement => {
                appearElement.classList.remove("appear");
            });

        }else{

            appearElements.forEach(appearElement => {
                appearElement.classList.remove("appear");
            });
            
            buttonFilter.classList.add("appear");

            filter.forEach(filter => {

                if(filter.dataset.content == buttonFilter.dataset.button){
                    filter.classList.add("appear"); 
                }else{
                }
            });
        }
    });
    
});