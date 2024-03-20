/*document.addEventListener('DOMContentLoaded', function() {
    // Get all filter tabs
    var filterTabs = document.querySelectorAll('.filter-tabs a');

    // Add click event listener to each filter tab
    filterTabs.forEach(function(tab) {
        tab.addEventListener('click', function(e) {
            e.preventDefault(); // Prevent the default behavior of anchor links
            
            // Get the data-location attribute value
            var location = this.getAttribute('data-location');

            // Hide all team content
            var teamContents = document.querySelectorAll('.team-content');
            teamContents.forEach(function(content) {
                content.style.display = 'none';
            });

            // Show team content for the selected location
            var selectedContent = document.querySelector('.team-content[data-location="' + location + '"]');
            if (selectedContent) {
                selectedContent.style.display = 'block';
            }
        });

        // Prevent the page from scrolling to the top when clicking on the tab
        tab.addEventListener('click', function(e) {
            e.preventDefault();
        });
    });
});*/