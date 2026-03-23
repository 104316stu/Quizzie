document.addEventListener('DOMContentLoaded', () => {
  const buttons = document.querySelectorAll('button.question');
  buttons.forEach(btn => {
      btn.addEventListener('click', () => {
          buttons.forEach(b => b.classList.remove('current'));
          btn.classList.add('current');
          document.getElementById('chosen').value = btn.value;
      });
  });
});