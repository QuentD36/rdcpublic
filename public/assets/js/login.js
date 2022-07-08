let nom = document.getElementById("nom");
let prenom = document.getElementById("prenom");
let login = document.getElementById('login');

prenom.addEventListener('change', (event) => {
    var firstname = event.target.value;
    var name = nom.value;
    login.value = firstname.toLowerCase().charAt(0) +  '.' + name.toLowerCase();
    login.innerHTML = firstname.toLowerCase().charAt(0) +  '.' + name.toLowerCase();
}, false);
nom.addEventListener('change', (event) => {
    var firstname = prenom.value;
    var name = event.target.value;
    login.value = firstname.toLowerCase().charAt(0) +  '.' + name.toLowerCase();
    login.innerHTML = firstname.toLowerCase().charAt(0) + '.' + name.toLowerCase();
}, false);