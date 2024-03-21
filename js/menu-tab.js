document.addEventListener('DOMContentLoaded', function(){
    const tabs = document.querySelectorAll('.menu-tab');
    const menuContents = document.querySelectorAll('.menu-contents');
    const chefsSpecial = document.getElementById('chefs-specials');
    chefsSpecial.classList.add("show");

    tabs.forEach(tab=>{
        tab.addEventListener('click', (event)=>{
            const filter = tab.getAttribute('data-filter');
            menuContents.forEach(section=>{
                if(section.id == filter){
                    section.classList.add("show");
                }else{
                    section.classList.remove("show");
                }
                
            })
            

            event.preventDefault();
        });
    });
});

