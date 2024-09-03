document.addEventListener('DOMContentLoaded', function () {
    const dropdowns = document.querySelectorAll('.dropdown');

    dropdowns.forEach(dropdown => {
        const content = dropdown.querySelector('.dropdown-content');
        
        if (content) { // Verifica se o dropdown-content existe
            dropdown.addEventListener('click', function () {
                if (content.style.display === 'block' || getComputedStyle(content).display === 'block') {
                    content.style.display = 'none';
                } else {
                    content.style.display = 'block';
                }
            });
        }
    });
});

document.addEventListener('DOMContentLoaded', function () {
    const dropdowns = document.querySelectorAll('.dropdown');

    dropdowns.forEach(dropdown => {
        const dropbtn = dropdown.querySelector('.dropbtn');
        const dropdownContent = dropdown.querySelector('.dropdown-content');

        dropbtn.addEventListener('click', function () {
            dropdowns.forEach(d => {
                if (d !== dropdown) {
                    d.querySelector('.dropdown-content').style.display = 'none';
                }
            });
            const isVisible = dropdownContent.style.display === 'block';
            dropdownContent.style.display = isVisible ? 'none' : 'block';
        });
    });

    document.addEventListener('click', function (event) {
        dropdowns.forEach(dropdown => {
            const dropdownContent = dropdown.querySelector('.dropdown-content');
            if (!dropdown.contains(event.target) && dropdownContent.style.display === 'block') {
                dropdownContent.style.display = 'none';
            }
        });
    });

    const toggleButton = document.getElementById('mobile-menu');
    const navbarMenu = document.querySelector('.navbar-menu');

    toggleButton.addEventListener('click', function () {
        navbarMenu.classList.toggle('active');
        toggleButton.classList.toggle('active');
    });
});


                    // Função para definir um cookie
                    function setCookie(name, value, days) {
                        let expires = "";
                        if (days) {
                            const date = new Date();
                            date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
                            expires = "expires=" + date.toUTCString();
                        }
                        document.cookie = name + "=" + (value || "") + ";" + expires + ";path=/";
                    }

                    // Função para obter um cookie
                    function getCookie(name) {
                        const nameEQ = name + "=";
                        const ca = document.cookie.split(';');
                        for (let i = 0; i < ca.length; i++) {
                            let c = ca[i];
                            while (c.charAt(0) === ' ') c = c.substring(1, c.length);
                            if (c.indexOf(nameEQ) === 0) return c.substring(nameEQ.length, c.length);
                        }
                        return null;
                    }

                    // Mostrar ou esconder o banner de cookies com base no cookie
                    window.onload = function() {
                        const cookieBanner = document.getElementById('cookie-banner');
                        if (!getCookie('cookiesAccepted')) {
                            cookieBanner.style.display = 'block';
                        }

                        // Lidar com a aceitação de cookies
                        document.querySelector('.acceptButton').onclick = function() {
                            setCookie('cookiesAccepted', 'true', 365); // Define o cookie para 1 ano
                            cookieBanner.style.display = 'none';
                        };

                        // Lidar com a recusa de cookies
                        document.querySelector('.declineButton').onclick = function() {
                            setCookie('cookiesAccepted', 'false', 365); // Define o cookie para 1 ano
                            cookieBanner.style.display = 'none';
                        };
                    }

                            
                                    // Função para definir um cookie
                                    function setCookie(name, value, days) {
                                        let expires = "";
                                        if (days) {
                                            const date = new Date();
                                            date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
                                            expires = "expires=" + date.toUTCString();
                                        }
                                        document.cookie = name + "=" + (value || "") + ";" + expires + ";path=/";
                                    }

                                    // Função para obter um cookie
                                    function getCookie(name) {
                                        const nameEQ = name + "=";
                                        const ca = document.cookie.split(';');
                                        for (let i = 0; i < ca.length; i++) {
                                            let c = ca[i];
                                            while (c.charAt(0) === ' ') c = c.substring(1, c.length);
                                            if (c.indexOf(nameEQ) === 0) return c.substring(nameEQ.length, c.length);
                                        }
                                        return null;
                                    }

                                    // Mostrar ou esconder o banner de cookies com base no cookie
                                    window.onload = function() {
                                        const cookieBanner = document.getElementById('cookie-banner');
                                        if (!getCookie('cookiesAccepted')) {
                                            cookieBanner.style.display = 'block';
                                        }

                                        // Lidar com a aceitação de cookies
                                        document.querySelector('.acceptButton').onclick = function() {
                                            setCookie('cookiesAccepted', 'true', 365); // Define o cookie para 1 ano
                                            cookieBanner.style.display = 'none';
                                        };

                                        // Lidar com a recusa de cookies
                                        document.querySelector('.declineButton').onclick = function() {
                                            setCookie('cookiesAccepted', 'false', 365); // Define o cookie para 1 ano
                                            cookieBanner.style.display = 'none';
                                        };
                                    }