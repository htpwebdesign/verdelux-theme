document.addEventListener('DOMContentLoaded', function () {

   const buttons = document.querySelectorAll('.view-more');
   let selectedItem = null;
   console.log(buttons)


   buttons.forEach(function (button, index) {


      const description = button.parentElement.previousElementSibling;
      description.style.display = 'none';

      button.addEventListener('click', function () {


         if (selectedItem !== null && selectedItem !== index) {
            buttons[selectedItem].parentElement.previousElementSibling.style.display = 'none';
         }
         
         if (description.style.display === 'none' || selectedItem !== index) {
            description.style.display = 'block';
            button.innerText = 'Close Job Post';
            selectedItem = index;
         } else {
            description.style.display = 'none';
            button.innerText = 'View Job Posting'
            selectedItem = null;
         }

      });
   });
});
