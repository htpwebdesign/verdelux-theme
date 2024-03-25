document.addEventListener('DOMContentLoaded', function () {
   const buttons = document.querySelectorAll('.view-more');
   buttons.forEach(function (button) {
      button.addEventListener('click', function () {
         const description = this.parentElement.previousElementSibling;
         if (description.style && description.style.display == 'none') {
            description.style.display = 'block';
         } else if (description) {
            description.style.display = 'none';
         }
      });
   });
})