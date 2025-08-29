document.addEventListener('DOMContentLoaded', () => {
  // Mobile menu toggle
  const menuBtn = document.getElementById('menu-btn-mobile');
  const menu = document.getElementById('menu-links');

  if (menuBtn && menu) {
    const links = menu.querySelectorAll('.menu-link');

    menuBtn.addEventListener('click', () => {
      menu.classList.toggle('hidden');

      if (!menu.classList.contains('hidden')) {
        links.forEach((link, i) => {
          setTimeout(() => {
            link.classList.add('show');
          }, i * 100); // 100ms stagger
        });
      } else {
        links.forEach(link => link.classList.remove('show'));
      }
    });
  }

  // Desktop role switcher toggle
  const desktopBtn = document.getElementById('menu-btn-desktop');
  const roleSwitcher = document.getElementById('role-switcher-desktop');

  if (desktopBtn && roleSwitcher) {
    desktopBtn.addEventListener('click', (e) => {
      e.preventDefault();
      roleSwitcher.classList.toggle('hidden');
    });

    document.addEventListener('click', (e) => {
      if (!desktopBtn.contains(e.target) && !roleSwitcher.contains(e.target)) {
        roleSwitcher.classList.add('hidden');
      }
    });
  }

  // 🔹 AJAX role switcher logic
  const roleLinks = document.querySelectorAll('#role-switcher-desktop a[data-role]');

  roleLinks.forEach(link => {
    link.addEventListener('click', (e) => {
      e.preventDefault();
      const selectedRole = link.getAttribute('data-role');

      fetch('/controllers/switch-role.php', {
        method: 'POST',
        headers: {
          'Content-Type': 'application/x-www-form-urlencoded'
        },
        body: `selected_role=${encodeURIComponent(selectedRole)}`
      })
        .then(response => {
          if (response.ok) {
            const redirects = {
              1: '/pages/main-staff.php',
              2: '/pages/main-admin.php',
              99: '/pages/main-super-admin.php'
            };
            window.location.href = redirects[selectedRole] || '/pages/dashboard.php';
          } else {
            alert('Failed to switch role.');
          }
        })
        .catch(error => {
          console.error('Error switching role:', error);
        });
    });
  });


});