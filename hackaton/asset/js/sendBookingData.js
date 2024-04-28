function sendBookingData() {
    const date = document.getElementById('start').value;
    const time = document.getElementById('appt').value;
    const persons = document.getElementById('quantity').value;
    const restId = document.getElementById('rest_id').value; // Получаем значение rest_id

    const formData = new FormData();
    formData.append('date', date);
    formData.append('time', time);
    formData.append('persons', persons);
    formData.append('rest_id', restId);

    fetch('../asset/php/process_booking.php', {
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
        console.log(data); // Печать ответа от сервера в консоль для отладки
        alert("Столик забронирован!")
    })
    .catch(error => {
        console.error('There has been a problem with your fetch operation:', error);
    });
}