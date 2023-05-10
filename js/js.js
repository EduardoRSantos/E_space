const profileImage = document.getElementById('profile-image');
const profileOptions = document.getElementById('profile-options');

profileImage.addEventListener('click', () => {
  profileOptions.classList.toggle('show');
});

profileOptions.addEventListener('change', (event) => {
  const selectedOption = event.target.value;
  console.log(`Selected option: ${selectedOption}`);
  profileOptions.classList.remove('show');
});


const boxes = document.querySelectorAll('.box');
let currentBox = 0;
const intervalTime = 3000; // tempo em milissegundos
let interval = setInterval(changeBox, intervalTime);

function changeBox() {
  boxes[currentBox].classList.add('hide');
  currentBox++;
  if (currentBox === boxes.length) {
    currentBox = 0;
  }
  boxes[currentBox].classList.remove('hide');
}
