document.addEventListener('DOMContentLoaded', () => {
  const modal = document.querySelector('#successModal');
  const closeBtn = document.querySelector('#closeModal');

  Livewire.on('formSuccess', () => {
    modal.style.display = 'flex';
  });

  closeBtn?.addEventListener('click', () => {
    modal.style.display = 'none';
  });
});
