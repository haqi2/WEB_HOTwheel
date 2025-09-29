document.addEventListener('DOMContentLoaded', function() {
    const nav = document.querySelector('nav');
    let isMobileMenuOpen = false;

    if (window.innerWidth > 768) return;

    nav.style.flexDirection = 'column';
    nav.style.gap = '0.5rem';

    const toggleButton = document.createElement('button');
    toggleButton.textContent = '☰ Menu';
    toggleButton.style.cssText = `
        background: #ff8400ff;
        color: white;
        border: none;
        padding: 0.5rem 1rem;
        cursor: pointer;
        font-weight: bold;
        margin-bottom: 0.5rem;
        border-radius: 5px;
    `;
    nav.prepend(toggleButton);

    toggleButton.addEventListener('click', function() {
        isMobileMenuOpen = !isMobileMenuOpen;
        const links = nav.querySelectorAll('a');
        links.forEach(link => {
            link.style.display = isMobileMenuOpen ? 'block' : 'none';
        });
        toggleButton.textContent = isMobileMenuOpen ? '✕ Tutup' : '☰ Menu';
    });

    const links = nav.querySelectorAll('a');
    links.forEach(link => link.style.display = 'none');
});

document.addEventListener('DOMContentLoaded', function() {
    const images = document.querySelectorAll('img');

    images.forEach(img => {
        img.addEventListener('click', function() {
            const modal = document.createElement('div');
            modal.style.cssText = `
                position: fixed;
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
                background: rgba(0,0,0,0.9);
                display: flex;
                justify-content: center;
                align-items: center;
                z-index: 1000;
                cursor: pointer;
            `;

            const modalImg = document.createElement('img');
            modalImg.src = this.src;
            modalImg.alt = this.alt;
            modalImg.style.cssText = `
                max-width: 90%;
                max-height: 90%;
                border-radius: 10px;
                box-shadow: 0 0 20px rgba(255,204,0,0.8);
                transition: transform 0.3s ease;
            `;

            modalImg.addEventListener('mouseenter', () => {
                modalImg.style.transform = 'scale(1.05)';
            });

            modalImg.addEventListener('mouseleave', () => {
                modalImg.style.transform = 'scale(1)';
            });

            modal.appendChild(modalImg);
            document.body.appendChild(modal);

            modal.addEventListener('click', function() {
                document.body.removeChild(modal);
            });
        });
    });
});

document.addEventListener('DOMContentLoaded', function() {
    const body = document.body;
    const header = document.querySelector('header');
    const sections = document.querySelectorAll('section');
    const footer = document.querySelector('footer');
    const nav = document.querySelector('nav');
    const toggleBtn = document.createElement('button');
    toggleBtn.textContent = '🌙 Mode Hitam';
    toggleBtn.style.cssText = `
        position: fixed;
        bottom: 20px;
        right: 20px;
        background: #ff7e00;
        color: white;
        border: none;
        padding: 0.7rem 1.2rem;
        border-radius: 20px;
        cursor: pointer;
        font-weight: bold;
        z-index: 1000;
        box-shadow: 0 4px 8px rgba(0,0,0,0.2);
        transition: all 0.3s ease;
    `;

    toggleBtn.addEventListener('mouseenter', () => {
        toggleBtn.style.transform = 'scale(1.1)';
    });

    toggleBtn.addEventListener('mouseleave', () => {
        toggleBtn.style.transform = 'scale(1)';
    });

    toggleBtn.addEventListener('click', function() {
        body.classList.toggle('Mode-Hitam');
        if (body.classList.contains('Mode-Hitam')) {
            body.style.backgroundColor = '#121212';
            body.style.color = '#fff';
            header.style.background = 'linear-gradient(to right, #003366, #0055aa)';
            nav.style.backgroundColor = '#333';
            sections.forEach(sec => {
                sec.style.backgroundColor = '#1e1e1e';
                sec.style.borderTopColor = '#ffcc00';
            });
            footer.style.backgroundColor = '#001a33';
            toggleBtn.textContent = '☀️ Sipaling Putih';
        } else {
            body.style.backgroundColor = '#f5f5f5';
            body.style.color = '#333';
            header.style.background = 'linear-gradient(to right, #0077cc, #0099ff)';
            nav.style.backgroundColor = '#ff7e00';
            sections.forEach(sec => {
                sec.style.backgroundColor = 'white';
                sec.style.borderTopColor = '#ff7e00';
            });
            footer.style.backgroundColor = '#003366';
            toggleBtn.textContent = '🌙 Mode Hitam';
        }
    });

    document.body.appendChild(toggleBtn);
});