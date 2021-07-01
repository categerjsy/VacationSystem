

var checkP = function() {
  if (document.getElementById('password').value ==document.getElementById('confirm_password').value) {
    document.getElementById('message').innerHTML = '';
  } else {
    document.getElementById('message').style.color = 'red';
    document.getElementById('message').innerHTML = 'Passwords not matching';
  }
}

