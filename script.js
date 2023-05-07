const persons = [
    {
      id: 1,
      images : ['images/gabrieliuji1.jpeg', 'images/gabrieliuji2.jpeg', 'images/gabrieliuji3.jpeg'],
      name: 'Gabriel Iuji',
      age: 21
    }
];

// Getitng the data from the HTML
const card = document.querySelector('.card')
const photo = document.getElementById("photoimg");
const nome = document.getElementById("name");
const age = document.getElementById("age");
const info = document.querySelector('.info-btn');
const desc = document.getElementById('description');
const cardtext = document.querySelector('.card-text');

// Declaring the position in the array
let personnow = 0;
let photonow = 0;
let infoopen = 0;
// Loading when the site opens
window.addEventListener('DOMContentLoaded', ()=>{
getPerson(personnow);
});

// Function to make you see the other photos when you click on the card
photo.addEventListener('click', () =>{
photonow++;
if(photonow >= persons[personnow].images.length){
    photonow = 0;
}
getPerson(personnow);
});

// Function to show the description
info.addEventListener('click', () =>{
// Making it so that it only opens up the description if it's not already open.
if(infoopen == 0){
    photo.style.filter = 'brightness(0.2)';
    cardtext.style.bottom = '460px';
    card.style.cursor = 'pointer';
    nome.style.fontWeight = '400';
    nome.style.fontSize = '16px';
    info.style.fontSize = '16px';
    desc.style.visibility = 'visible';
    desc.style.opacity = '100%';
    infoopen = 1;
}
else{
    photo.style.filter = 'brightness(1)';
    cardtext.style.bottom = '65px'
    nome.style.fontWeight = 'bold';
    nome.style.fontSize = '20px';
    info.style.fontSize = '20px';
    desc.style.opacity = '0%';
    desc.style.visibility = 'hidden';
    infoopen  = 0;
}
});

// Making you able to close the desc by clicking on it
desc.addEventListener('click', () =>{
photo.style.filter = 'brightness(1)';
cardtext.style.bottom = '65px'
nome.style.fontWeight = 'bold';
nome.style.fontSize = '20px';
info.style.fontSize = '20px';
desc.style.opacity = '0%';
desc.style.visibility = 'hidden';
infoopen  = 0;
});

// Function to reload DATA from the array
function getPerson(person){
const item = persons[person];
photo.src = item.images[photonow];
nome.textContent = item.name + ", " + item.age;
}

// Making the like and dislike buttons
