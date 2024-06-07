document.addEventListener("DOMContentLoaded", function() {
    const toggler = document.getElementById('theme-toggle');

    if (toggler) {
        toggler.addEventListener('click', function () {
            if (this.checked) {
                document.body.classList.add('dark');
            } else {
                document.body.classList.remove('dark');
            }
        });
    } else {
        console.error("Element with ID 'theme-toggle' not found.");
    }
});
