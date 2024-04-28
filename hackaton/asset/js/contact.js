document.getElementById('submitBtn').addEventListener('click', function(event) {
    event.preventDefault(); // Предотвращаем переход по ссылке

    const name = document.getElementById('name').value;
    const addres = document.getElementById('addres').value;
    const num = document.getElementById('num').value;
    const email = document.getElementById('email').value;
    const feedback = document.getElementById('feedback').value;

    const formData = new FormData();
    formData.append('name', name);
    formData.append('addres', addres);
    formData.append('num', num);
    formData.append('email', email);
    formData.append('feedback', feedback);

    fetch('../asset/php/process_form.php', {
        method: 'POST',
        body: formData
    })
    .then(response => {
        if (!response.ok) {
            throw new Error('Network response was not ok');
        }
        return response.text();
    })
    .then(data => {
        alert("Заявка оформленна!") // Печать ответа от сервера в консоль для отладки
        // Здесь можно выполнить дополнительные действия в зависимости от ответа сервера
    })
    .catch(error => {
        console.error('There has been a problem with your fetch operation:', error);
    });
});