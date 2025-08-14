function openForm(cityName) {
    var forms, tablinks;

forms = document.getElementsByTagName('form');

for (let i = 0; i < forms.length; i++) {
    forms[i].style.display = "none";
}

tablinks = document.getElementsByClassName('tablinks');
for (let i = 0; i < tablinks.length; i++) {
    tablinks[i].classList.remove('active');
}

currentForm = document.getElementById(cityName)
currentForm.style.display = "block";
currentForm.classList.add('active')
var btnLogin, btnCadastro

}
