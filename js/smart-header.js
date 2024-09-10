document.addEventListener('DOMContentLoaded', function() {
    var lastScrollTop = 0;
    var header = document.getElementById('masthead'); // Replace with your header ID
    var startSmartBehavior = 120; // Start the smart behavior after 120px of scrolling
    var menuToggle = document.querySelector('.main-navigation'); // Your mobile menu element
    var menuLinks = document.querySelectorAll('.main-navigation a'); // Select all links inside the mobile menu
    var hamburger = document.querySelector('.menu-toggle'); // The hamburger button element

    // Toggle menu visibility
    window.addEventListener('scroll', function() {
        var currentScroll = window.scrollY;

        if (currentScroll > lastScrollTop && currentScroll > startSmartBehavior) {
            // Scrolling down and past 120px
            header.style.top = '-106px'; // Adjust as needed
        } else if (currentScroll <= lastScrollTop || currentScroll <= startSmartBehavior) {
            // Scrolling up or hasn't scrolled 120px yet
            header.style.top = '0';
        }

        lastScrollTop = currentScroll <= 0 ? 0 : currentScroll;
    }, false);

    // Close the menu when a link is clicked
    menuLinks.forEach(function(link) {
        link.addEventListener('click', function() {
            if (menuToggle.classList.contains('toggled')) {
                menuToggle.classList.remove('toggled');
                hamburger.style.display = 'block'; // Ensure hamburger remains visible
            }
        });
    });
});
