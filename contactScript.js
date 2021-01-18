let form = document.querySelector('#contact');
// console.log(form.email);
// console.log('form.nom');

// ecouter la modification de l'email
form.email.addEventListener('change',function()
{
    validEMail(this);
});

// ecouter la modification de  nom
form.nom.addEventListener('change',function()
{
    validNom(this);
});

// ecouter la modification de  prenom
form.prenom.addEventListener('change',function()
{
    validPrenom(this);
});

// ecouter la modification de  code postale
form.postal.addEventListener('change',function()
{
    validPostal(this);
});

// ecouter la modification de  ville
form.ville.addEventListener('change',function()
{
    validVille(this);
});

// ecouter la modification de  telephone
form.tel.addEventListener('change',function()
{
    validTel(this);
});

// ecouter la modification de  question
form.cgu.addEventListener('change',function()
{
    validCgu(this);
});

// ecouter la soumission du formulaire
form.addEventListener('submit',function(e)
{
    e.preventDefault();
    e.preventDefault();
    if(validEMail(form.email) && validNom(form.nom) && validPrenom(form.prenom) && validPostal(form.postal) && validVille(form.ville) && validTel(form.tel) && validCgu(form.cgu) )
    {
        form.submit();
        // console.log('email valide');
    }
    // else{
    //     console.log('email non valide');
    // }
    
});



// **********Validation Email*******************************************
const validEMail = function (inputEmail)
{
    // creation de la reg exp pour validation email
    let emailRegExp = new RegExp('^[a-zA-Z0-9.-_]+[@]{1}[a-zA-Z0-9.-_]+[.]{1}[a-z]{2,10}$', 'g');
    

    // let testEmail = emailRegExp.test(inputEmail.value);
    // recuperation de la balise small
    let small = inputEmail.nextElementSibling;
    // console.log(testEmail) ;
    // on test l'expression reguliere
    if(emailRegExp.test(inputEmail.value))
    {
         small.innerHTML = 'Adresse Valide';
         small.classList.remove('text-danger');
         small.classList.add('text-success');
         return true;

    }
    else
    {
        small.innerHTML = 'Adresse Non Valide';
        small.classList.remove('text-success');
        small.classList.add('text-danger');
        return false;
    }
    
};


// **********Validation nom*******************************************
const validNom = function (inputNom)
{
   // creation de la reg exp pour validation nom
   let nomRegExp = /^[a-zA-ZéèîïÉÈÎÏ][a-zéèêàçîï]+([-'\s][a-zA-ZéèîïÉÈÎÏ][a-zéèêàçîï]+)?$/g;
   // recuperation de la balise small
   let small = inputNom.nextElementSibling;
   // on test l'expression reguliere
   if(nomRegExp.test(inputNom.value))
   {
        small.innerHTML = 'Nom Valide';
        small.classList.remove('text-danger');
        small.classList.add('text-success');
        return true;

   }
   else
   {
       small.innerHTML = 'Nom Non Valide';
       small.classList.remove('text-success');
       small.classList.add('text-danger');
       return false;
   }
   
};

// **********Validation prenom******************************************
const validPrenom = function (inputPrenom)
{
   // creation de la reg exp pour validation nom
   let prenomRegExp = /^[a-zA-ZéèîïÉÈÎÏ][a-zéèêàçîï]+([-'\s][a-zA-ZéèîïÉÈÎÏ][a-zéèêàçîï]+)?$/g;
   // recuperation de la balise small
   let small = inputPrenom.nextElementSibling;
   // on test l'expression reguliere
   if(prenomRegExp.test(inputPrenom.value))
   {
        small.innerHTML = 'Nom Valide';
        small.classList.remove('text-danger');
        small.classList.add('text-success');
        return true;

   }
   else
   {
       small.innerHTML = 'Nom Non Valide';
       small.classList.remove('text-success');
       small.classList.add('text-danger');
       return false;
   }
   
};


// **********Validation code postale*******************************************
const validPostal= function (inputPostal)
{
   // creation de la reg exp pour validation nom
   let postalRegExp = /^([0-9]{5})$/g;
  
   // recuperation de la balise small
   let small = inputPostal.nextElementSibling;
   // on test l'expression reguliere
   if(postalRegExp.test(inputPostal.value))
   {
        small.innerHTML = 'Adresse postale Valide';
        small.classList.remove('text-danger');
        small.classList.add('text-success');
        return true;

   }
   else
   {
       small.innerHTML = 'Adresse postale Non Valide';
       small.classList.remove('text-success');
       small.classList.add('text-danger');
       return false;
   }
   
};

// **********Validation ville*******************************************
const validVille= function (inputVille)
{
   // creation de la reg exp pour validation nom
   let villeRegExp = /^[A-Za-z]+$/g;
  
   // recuperation de la balise small
   let small = inputVille.nextElementSibling;
   // on test l'expression reguliere
   if(villeRegExp.test(inputVille.value))
   {
        small.innerHTML = 'Ville Valide';
        small.classList.remove('text-danger');
        small.classList.add('text-success');
        return true;

   }
   else
   {
       small.innerHTML = 'Ville Non Valide';
       small.classList.remove('text-success');
       small.classList.add('text-danger');
       return false;
   }
   
};

// **********Validation telephone*******************************************
const validTel= function (inputTel)
{
   // creation de la reg exp pour validation nom
   let telRegExp = /^(0|\+33)[1-9]([-. ]?[0-9]{2}){4}$/g;
  
   // recuperation de la balise small
   let small = inputTel.nextElementSibling;
   // on test l'expression reguliere
   if(telRegExp.test(inputTel.value))
   {
        small.innerHTML = 'Telephone Valide';
        small.classList.remove('text-danger');
        small.classList.add('text-success');
        return true;

   }
   else
   {
       small.innerHTML = 'Telephone Non Valide';
       small.classList.remove('text-success');
       small.classList.add('text-danger');
       return false;
   }
   
};

// **********Validation Cgu*******************************************
const validCgu= function (inputCgu)
{
   // creation de la reg exp pour validation question
   let cguRegExp = /^[\w+\s]/g;
  
   // recuperation de la balise small
   let small = inputCgu.nextElementSibling;
   // on test l'expression reguliere
   if(cguRegExp.test(inputCgu.value))
   {
        small.innerHTML = ' Veuillez cochez la case cgu';
        small.classList.remove('text-danger');
        small.classList.add('text-success');
        return false;

   }
   else
   {
       small.innerHTML = 'la case est coché';
       small.classList.remove('text-success');
       small.classList.add('text-danger');
       return true;
   }
   
};