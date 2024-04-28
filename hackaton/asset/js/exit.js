function exit() {
    fetch('../asset/php/exit_session.php') // Отправляем запрос на сервер для завершения сеанса пользователя
      .then(response => response.text())
      .then(data => { myCallback(data) })
      .catch(error => console.error(error));
  
    function myCallback(call) {
      alert("Вы успешно вышли из аккаунта"); // Выводим сообщение об успешном выходе из аккаунта
      window.location = 'index.php'; // Перенаправляем пользователя на страницу 'index.php'
    }
  }