let images = document.querySelectorAll('.carousel img');
let index = 0;

function changerImage() {
    images[index].classList.remove('active');
    index = (index + 1) % images.length;
    images[index].classList.add('active');
}

let interval = setInterval(changerImage, 3000);

document.querySelector('.carousel').addEventListener('click', changerImage);
document.querySelector('.carousel').addEventListener('wheel', (event) => {
    event.preventDefault();
    changerImage();
});