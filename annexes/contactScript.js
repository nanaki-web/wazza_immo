let form = document.querySelector('#contact');
console.log(form.email);

// ecouter la modification de l'email
form.email.addEventListener('change',function()
{
    validEMail(this);
});

const validEmail = function (inputEmail){
    // creation de la reg exp pour validation email
    let emailRegExp = new RegExp('^[a-zA-Z0-9.-_]+[@]{1}[a-zA-Z0-9.-_]+[.]{1}[a-z]{2,10}$', 'g');
    let testEmail = emailRegExp.test(inputEmail.value);
    console.log(testEmail) ;
};