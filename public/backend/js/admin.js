/**
 * White Energy Admin Panel JavaScript
 */

document.addEventListener('DOMContentLoaded', function () {
  // Mobile Sidebar Toggle
  const mobileToggleBtn = document.getElementById('mobileSidebarToggle');
  const sidebar = document.querySelector('.admin-sidebar');

  if (mobileToggleBtn && sidebar) {
    mobileToggleBtn.addEventListener('click', function () {
      sidebar.classList.toggle('open');
    });

    document.addEventListener('click', function (e) {
      if (!sidebar.contains(e.target) && !mobileToggleBtn.contains(e.target) && sidebar.classList.contains('open')) {
        sidebar.classList.remove('open');
      }
    });
  }

  // Sidebar Dropdown Toggle
  const dropdownToggles = document.querySelectorAll('.nav-dropdown-toggle');
  dropdownToggles.forEach((toggle) => {
    toggle.addEventListener('click', function (e) {
      e.preventDefault();
      const parent = this.closest('.nav-item');
      if (parent) {
        parent.classList.toggle('open');
      }
    });
  });

  // Modal Dialogs Handling
  window.openModal = function (modalId) {
    const modal = document.getElementById(modalId);
    if (modal) {
      modal.classList.add('show');
      document.body.style.overflow = 'hidden';
    }
  };

  window.closeModal = function (modalId) {
    const modal = document.getElementById(modalId);
    if (modal) {
      modal.classList.remove('show');
      document.body.style.overflow = '';
    }
  };

  // Close modals on backdrop click
  document.querySelectorAll('.modal-backdrop').forEach((backdrop) => {
    backdrop.addEventListener('click', function (e) {
      if (e.target === this) {
        this.classList.remove('show');
        document.body.style.overflow = '';
      }
    });
  });

  // Media File Preview Helper
  window.initMediaPreview = function (inputEl, previewImgEl, previewVidEl, mediaTypeSelectEl) {
    if (!inputEl) return;

    inputEl.addEventListener('change', function () {
      const file = this.files[0];
      if (!file) return;

      const fileType = file.type;
      const objectUrl = URL.createObjectURL(file);

      if (fileType.startsWith('video/')) {
        if (mediaTypeSelectEl) mediaTypeSelectEl.value = 'video';
        if (previewImgEl) previewImgEl.style.display = 'none';
        if (previewVidEl) {
          previewVidEl.src = objectUrl;
          previewVidEl.style.display = 'block';
        }
      } else if (fileType.startsWith('image/')) {
        if (mediaTypeSelectEl) mediaTypeSelectEl.value = 'image';
        if (previewVidEl) previewVidEl.style.display = 'none';
        if (previewImgEl) {
          previewImgEl.src = objectUrl;
          previewImgEl.style.display = 'block';
        }
      }
    });
  };

  // Auto-dismiss alerts after 5 seconds
  const alerts = document.querySelectorAll('.alert');
  alerts.forEach((alert) => {
    setTimeout(() => {
      alert.style.transition = 'opacity 0.5s ease, transform 0.5s ease';
      alert.style.opacity = '0';
      alert.style.transform = 'translateY(-6px)';
      setTimeout(() => alert.remove(), 500);
    }, 5000);
  });
});
