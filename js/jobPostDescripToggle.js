document.addEventListener('DOMContentLoaded', function() {
   const buttons = document.querySelectorAll('.view-more');
   buttons.forEach(function(button) {
      button.addEventListener('click', function() {
         const description = this.previousElementSibling;
         if (description.style.display == 'none') {
            description.style.display = 'block';
         }else {
            description.style.display = 'none';
         }
      });
   });
})