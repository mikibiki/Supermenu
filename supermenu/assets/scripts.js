document.addEventListener('DOMContentLoaded', function() {
    const menuToggle = document.querySelector('.nav-toggler');
    const menuItems = document.querySelector('.nav-items');

    menuToggle.addEventListener('click', function() {
        menuItems.classList.toggle('active');
    });

    function updateMenuVisibility() {
        const containerWidth = document.querySelector('.nav-wrapper').offsetWidth;
        let totalWidth = 0;
        const items = document.querySelectorAll('.nav-items > li');

        items.forEach(item => {
            item.style.display = 'block';
            totalWidth += item.offsetWidth;
        });

        if (totalWidth > containerWidth) {
            let currentWidth = 0;
            items.forEach(item => {
                currentWidth += item.offsetWidth;
                if (currentWidth > containerWidth - 50) {
                    item.style.display = 'none';
                }
            });
        }
    }

    window.addEventListener('resize', updateMenuVisibility);
    updateMenuVisibility();
});