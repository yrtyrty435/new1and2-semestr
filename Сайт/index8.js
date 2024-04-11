document.addEventListener('DOMContentLoaded', function() {
    let form = document.querySelector('form');
    
    form.addEventListener('submit', function(event) {
      event.preventDefault();
      
      let formData = new FormData(form);
      
      // Далее можно отправить данные на сервер для обработки и сохранения в базе данных
      
      // Открываем новое окно и выводим информацию о регистрации пользователя
      let userInfoWindow = window.open('', 'userInfoWindow', 'width=400,height=400');
      userInfoWindow.document.write('<h2>Данные пользователя</h2>');
      userInfoWindow.document.write('<p><strong>Имя:</strong> ' + formData.get('firstname') + '</p>');
      userInfoWindow.document.write('<p><strong>Email:</strong> ' + formData.get('email') + '</p>');
      // Добавьте вывод остальных полей формы по аналогии
      
      userInfoWindow.document.write('<h2>Регистрация успешно завершена!</h2>');
    });
  });
