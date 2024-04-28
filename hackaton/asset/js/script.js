function realreg(){
    let name = document.getElementById('name_input').value;
    let name2 = document.getElementById('name2_input').value;
    let name3 = document.getElementById('name3_input').value;
    let login = document.getElementById('login_input').value;
    let password = document.getElementById('pass_input').value;
    let phone = document.getElementById('phone_input').value;
    fetch('../asset/php/serv_reg.php', {
      method: 'post', 
      body: 'login='+login+'&pass=' +password+'&name=' + name+'&name2=' + name2 + '&name3=' + name3 + '&phone=' + phone,
      headers: new Headers({'content-type': 'application/x-www-form-urlencoded'}),
  
  })
       .then(response => response.text())
       .then(data => { myCallback(data)} )
       .catch(error => console.error(error));
       function myCallback(call){
              if(call.includes("Успех")){
                window.location = 'index.php'
              }
              if(call.includes("Провал"))
              {
                alert("Акаунт с такой почтой уже сущетсвует!")
              }
       }
  }
  function registr(){
    let login = document.getElementById('login_input_enter').value;
    let password = document.getElementById('password_input_enter').value;
    fetch('../asset/php//serv_authform.php', {
      method: 'post', 
      body: 'login='+login+'&pass=' +password,
      headers: new Headers({'content-type': 'application/x-www-form-urlencoded'}),
  
  })
       .then(response => response.text())
       .then(data => { myCallback(data)} )
       .catch(error => console.error(error));
       function myCallback(call){
              if(call.includes("Пользователя нет")){
                alert("Пользоваьеля с таким логином не существует")
              }
              if(call.includes("Пользователь есть"))
              {
                window.location = 'index.php'
              }
       }
  }