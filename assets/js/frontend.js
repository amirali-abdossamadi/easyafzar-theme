document.addEventListener('DOMContentLoaded', function () {
      const logo = document.querySelector('.easyafzar-logo');
      const letters = document.querySelectorAll('.easyafzar-logo .letter');
  
      logo.addEventListener('mousemove', function (e) {
          const rect = logo.getBoundingClientRect();
          const x = e.clientX - rect.left;
          const y = e.clientY - rect.top;
  
          letters.forEach(letter => {
              const letterRect = letter.getBoundingClientRect();
              const letterX = letterRect.left - rect.left + letterRect.width / 2;
              const letterY = letterRect.top - rect.top + letterRect.height / 2;
              const distance = Math.sqrt(Math.pow(x - letterX, 2) + Math.pow(y - letterY, 2));
  
              if (distance < 50) {
                  letter.style.transform = 'translateY(-5px)';
                  letter.style.color = '#FFFFFF';
              } else {
                  letter.style.transform = 'translateY(0)';
                  letter.style.color = 'transparent';
              }
          });
      });
  
      logo.addEventListener('mouseleave', function () {
          letters.forEach(letter => {
              letter.style.transform = 'translateY(0)';
              letter.style.color = 'transparent';
          });
      });
  });

 // مدیریت پاپ‌آپ در پنل ادمین
if (document.querySelector('.add-product-btn')) {
      const addButton = document.querySelector('.add-product-btn');
      const modal = document.querySelector('.modal-overlay');
      const cancelButton = document.querySelector('.cancel-modal');
  
      addButton.addEventListener('click', function (e) {
          e.preventDefault();
          modal.style.display = 'flex';
      });
  
      cancelButton.addEventListener('click', function () {
          modal.style.display = 'none';
      });
  
      modal.addEventListener('click', function (e) {
          if (e.target === modal) {
              modal.style.display = 'none';
          }
      });
  
      // دیباگ فرم
      const form = modal.querySelector('form');
      form.addEventListener('submit', function (e) {
          console.log('Form submitted');
          const formData = new FormData(form);
          for (let [key, value] of formData.entries()) {
              console.log(key + ': ' + value);
          }
      });
  }