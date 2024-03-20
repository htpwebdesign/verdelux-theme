document.addEventListener('DOMContentLoaded', (e) => {
   e.preventDefault();
   const jobPostButtons = document.querySelectorAll('.view-more');

   jobPostButtons.forEach(button => {
      button.addEventListener('click', event => {
         console.log(button)
         const description = event.target.previousElementSibling;
         console.log('Show Description', description); // Add this line
         const fullDescription = description.dataset.full;
         description.innerHTML = fullDescription;
      });
   });
});
