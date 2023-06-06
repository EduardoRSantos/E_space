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

const typingIndicator = document.querySelector('.typing-indicator');

function toggleTypingIndicator() {
  typingIndicator.classList.toggle('active');
}

// Simula a digitação de uma mensagem
setTimeout(function() {
  toggleTypingIndicator();
  setTimeout(function() {
    toggleTypingIndicator();
    const chatBody = document.querySelector('.chat-body');
    const message = document.createElement('div');
    message.classList.add('message');
    message.innerHTML = '<p>Tudo bem e você?</p>';
    chatBody.appendChild(message);
  }, 2000);
}, 1000);


// Obtém todas as imagens dentro do carrossel
const imagens = document.querySelectorAll('.carrossel .imagem img');

// Adiciona um evento de clique a cada imagem
imagens.forEach(imagem => {
  imagem.addEventListener('click', () => {
    // Remove a classe 'ampliada' de todas as imagens
    imagens.forEach(imagem => imagem.classList.remove('ampliada'));
    
    // Adiciona a classe 'ampliada' à imagem clicada
    imagem.classList.add('ampliada');
  });
});


function toggleAdditionalInfo() {
  const additionalInfo = document.querySelector('.additional-info');
  additionalInfo.style.display = additionalInfo.style.display === 'none' ? 'block' : 'none';
}