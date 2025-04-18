// Récupération des boutons et des formulaires, afficher sois formulaire d'inscription, sois de connection en 
//fonction des boutons

const btnConnexion = document.getElementById('btn-connexion');
const btnInscription = document.getElementById('btn-inscription');
const formConnexion = document.getElementById('form-connexion');
const formInscription = document.getElementById('form-inscription'); 

// Clic sur "Connexion"
btnConnexion.addEventListener('click', () => {
  btnConnexion.classList.add('active');
  btnInscription.classList.remove('active');
  formConnexion.classList.add('actif');
  formInscription.classList.remove('actif');
});

// Clic sur "Inscription"
btnInscription.addEventListener('click', () => {
  btnInscription.classList.add('active');
  btnConnexion.classList.remove('active');
  formInscription.classList.add('actif');
  formConnexion.classList.remove('actif');
});
