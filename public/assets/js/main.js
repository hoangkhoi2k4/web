function setActive(link) {
    let links = document.querySelectorAll('a');
    links.forEach(function (item) {
        item.classList.remove('active');
    });
    link.classList.add('active');
    localStorage.setItem('activeMenu', link.href);
}

window.onload = function () {
    let activeMenu = localStorage.getItem('activeMenu');
    if (activeMenu) {
        let links = document.querySelectorAll('a');
        links.forEach(function (link) {
            if (link.href === activeMenu) {
                link.classList.add('active');
            }
        });
    }
}