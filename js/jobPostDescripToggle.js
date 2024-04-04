document.addEventListener('DOMContentLoaded', function () {

   const buttons = document.querySelectorAll('.view-more');
   let selectedItem = null;

   buttons.forEach(function (button, index) {

      // Hide the description initially
      const description = button.parentElement.previousElementSibling;
      description.style.display = 'none';

      button.addEventListener('click', function () {

         // Hide the previously selected item
         if (selectedItem !== null && selectedItem !== index) {
            buttons[selectedItem].parentElement.previousElementSibling.style.display = 'none';
         }

         if (description.style.display === 'none' || selectedItem !== index) {
            description.style.display = 'block';
            selectedItem = index;
         } else {
            description.style.display = 'none';
            selectedItem = null;
         }

      });
   });
});
