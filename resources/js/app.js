import './bootstrap';

document.addEventListener('DOMContentLoaded', () => {
    const tabButtons = document.querySelectorAll('.login-tab-btn');

    // Get the base URL (without the last segment)
    let baseUrl = window.location.pathname;
    baseUrl = baseUrl.split('/').slice(0, -1).join('/').replace(/\/$/, '') || '/';

    // Determine the initial tab based on the URL's last segment
    const urlSegments = window.location.pathname.split('/');
    const lastSegment = urlSegments.pop() || urlSegments.pop(); // Handle trailing slash
    const initialTab = ['login', 'signup'].includes(lastSegment) ? lastSegment : 'login';
    showTab(initialTab);

    // Add click event listeners to tab buttons
    tabButtons.forEach(button => {
        button.addEventListener('click', () => {
            const tabName = button.dataset.tab;
            showTab(tabName);

            // Update the URL by replacing the last segment
            const newUrl = `${baseUrl}/${tabName}`;
            history.pushState({}, '', newUrl);
        });
    });

    // Handle back/forward navigation
    window.addEventListener('popstate', () => {
        const path = window.location.pathname.split('/').pop();
        const validTabs = ['login', 'signup'];
        const tabName = validTabs.includes(path) ? path : 'login';
        showTab(tabName);
    });
});

function showTab(tabName) {
    document.querySelectorAll('.login-form-content').forEach(form => {
        form.classList.remove('active');
    });

    document.querySelectorAll('.login-tab-btn').forEach(btn => {
        btn.classList.remove('active');
        btn.setAttribute('aria-selected', 'false');
    });

    const activeContent = document.getElementById(tabName);
    if (activeContent) {
        activeContent.classList.add('active');
    }

    const activeButton = document.querySelector(`button[data-tab="${tabName}"]`);
    if (activeButton) {
        activeButton.classList.add('active');
        activeButton.setAttribute('aria-selected', 'true');
    }
}

// Interactive background
const canvas = document.createElement('canvas');
document.querySelector('.background-canvas').appendChild(canvas);
const ctx = canvas.getContext('2d');
canvas.width = window.innerWidth;
canvas.height = window.innerHeight;

window.addEventListener('resize', () => {
    canvas.width = window.innerWidth;
    canvas.height = window.innerHeight;
});

const particles = [];
for (let i = 0; i < 50; i++) {
    particles.push({
        x: Math.random() * canvas.width,
        y: Math.random() * canvas.height,
        radius: Math.random() * 3 + 1,
        speedX: Math.random() * 0.5 - 0.25,
        speedY: Math.random() * 0.5 - 0.25,
    });
}

function animate() {
    ctx.clearRect(0, 0, canvas.width, canvas.height);
    particles.forEach(p => {
        ctx.beginPath();
        ctx.arc(p.x, p.y, p.radius, 0, Math.PI * 2);
        ctx.fillStyle = '#E0CA3C';
        ctx.fill();

        p.x += p.speedX;
        p.y += p.speedY;

        if (p.x < 0 || p.x > canvas.width) p.speedX *= -1;
        if (p.y < 0 || p.y > canvas.height) p.speedY *= -1;
    });
    requestAnimationFrame(animate);
}
animate();

// Dropdown functionality
document.querySelector('.dropbtn').addEventListener('click', function() {
    this.parentElement.classList.toggle('show');
});

window.addEventListener('click', function(event) {
    if (!event.target.matches('.dropbtn')) {
        var dropdowns = document.querySelectorAll('.dropdown');
        dropdowns.forEach(function(dropdown) {
            if (dropdown.classList.contains('show')) {
                dropdown.classList.remove('show');
            }
        });
    }
});


// // Interactive background
// document.addEventListener('DOMContentLoaded', () => {
//     const canvas = document.createElement('canvas');
//     const backgroundCanvas = document.querySelector('.background-canvas');
    
//     if (backgroundCanvas) {
//         backgroundCanvas.appendChild(canvas);
//         const ctx = canvas.getContext('2d');
//         canvas.width = window.innerWidth;
//         canvas.height = window.innerHeight;

//         window.addEventListener('resize', () => {
//             canvas.width = window.innerWidth;
//             canvas.height = window.innerHeight;
//         });

//         const particles = [];
//         for (let i = 0; i < 50; i++) {
//             particles.push({
//                 x: Math.random() * canvas.width,
//                 y: Math.random() * canvas.height,
//                 radius: Math.random() * 3 + 1,
//                 speedX: Math.random() * 0.5 - 0.25,
//                 speedY: Math.random() * 0.5 - 0.25,
//             });
//         }

//         function animate() {
//             ctx.clearRect(0, 0, canvas.width, canvas.height);
//             particles.forEach(p => {
//                 ctx.beginPath();
//                 ctx.arc(p.x, p.y, p.radius, 0, Math.PI * 2);
//                 ctx.fillStyle = '#E0CA3C';
//                 ctx.fill();

//                 p.x += p.speedX;
//                 p.y += p.speedY;

//                 if (p.x < 0 || p.x > canvas.width) p.speedX *= -1;
//                 if (p.y < 0 || p.y > canvas.height) p.speedY *= -1;
//             });
//             requestAnimationFrame(animate);
//         }
//         animate();
//     } else {
//         console.error('Background canvas element not found');
//     }
// });