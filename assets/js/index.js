const sideMenu = document.querySelector('aside');
const menuBtn = document.getElementById('menu-btn');
const closeBtn = document.getElementById('close-btn');

const darkMode = document.querySelector('.dark-mode');

menuBtn.addEventListener('click', () => {
    sideMenu.style.display = 'block';
});

closeBtn.addEventListener('click', () => {
    sideMenu.style.display = 'none';
});

darkMode.addEventListener('click', () => {
    document.body.classList.toggle('dark-mode-variables');
    darkMode.querySelector('span:nth-child(1)').classList.toggle('active');
    darkMode.querySelector('span:nth-child(2)').classList.toggle('active');
})


// Orders.forEach(order => {
//     const tr = document.createElement('tr');
//     const trContent = `
//         <td></td>
//         <td>${order.productName}</td>
//         <td>${order.productNumber}</td>
//         <td>${order.paymentStatus}</td>
//         <td class="${order.status === 'Declined' ? 'danger' : order.status === 'Pending' ? 'warning' : 'primary'}">${order.status}</td>
//         <td class="primary">Modifier</td>
//     `;
//     tr.innerHTML = trContent;
//     document.querySelector('table tbody').appendChild(tr);
// });


function showForm(formId) {
    // Hide all forms
    document.querySelectorAll('.ajout form').forEach(form => {
        form.style.display = 'none';
    });

    // Show the selected form
    document.getElementById(formId).style.display = 'block';
}

// Add event listeners to buttons
document.querySelector('#livreurBtn').addEventListener('click', function() {
    showForm('livreurForm');
});

document.querySelector('#restaurantBtn').addEventListener('click', function() {
    showForm('restaurantForm');
});

document.querySelector('#adminBtn').addEventListener('click', function() {
    showForm('adminForm');
});

