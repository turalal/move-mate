// Smooth Scrolling
document.querySelectorAll('a[href^="#"]').forEach(anchor => {
    anchor.addEventListener('click', function(e) {
        e.preventDefault();
        document.querySelector(this.getAttribute('href')).scrollIntoView({
            behavior: 'smooth'
        });
    });
});

// Sticky Navigation Bar
window.onscroll = function() {stickyNav()};
var navbar = document.querySelector("nav");
var sticky = navbar.offsetTop;

function stickyNav() {
    if (window.pageYOffset > sticky) {
        navbar.classList.add("sticky");
    } else {
        navbar.classList.remove("sticky");
    }
}

// Form Validation
const form = document.querySelector('form');
const nameInput = document.getElementById('name');
const emailInput = document.getElementById('email');
const messageInput = document.getElementById('message');
const submitButton = document.querySelector('button[type="submit"]');

form.addEventListener('submit', function(event) {
    let valid = true;

    if (nameInput.value === '') {
        alert('Please enter your name');
        valid = false;
    }

    if (emailInput.value === '' || !validateEmail(emailInput.value)) {
        alert('Please enter a valid email');
        valid = false;
    }

    if (messageInput.value === '') {
        alert('Please enter your message');
        valid = false;
    }

    if (!valid) {
        event.preventDefault();
    }
});

function validateEmail(email) {
    const re = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    return re.test(String(email).toLowerCase());
}

// Responsive Mobile Menu Toggle
const menuToggle = document.querySelector('.menu-toggle');
const navLinks = document.querySelector('.nav-links');

menuToggle.addEventListener('click', function() {
    navLinks.classList.toggle('open');
});

// Dynamic Content Loading (Optional Example)
const loadMoreBtn = document.getElementById('load-more');
loadMoreBtn.addEventListener('click', function() {
    // Fetch or load more content
    alert('Loading more content...');
});
