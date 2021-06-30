function validateEmail(emailField){

        var reg = /^[\w-\.]+@([\w-]+\.)+[\w-]{2,4}$/;


        if (reg.test(emailField.value) == false) 
        {
            document.getElementById('messageEmail').style.color = 'red';
   	        document.getElementById('messageEmail').innerHTML = 'Ε-mail not valid';
            return false;
        }
        if (reg.test(emailField.value) == true) 
        {
   	        document.getElementById('messageEmail').innerHTML = '';
            return false;
        }
}