
const popupBtn = document.getElementById('popupBtn');
const popup = document.getElementById('popup');
const popupInfo = document.getElementById('popupInfo');
const closeBtn = document.querySelector('.close');

popupBtn.addEventListener('click', () => {
  popup.style.display = 'block';

  // Inserir dados do foreach no popupInfo
  const foreachData = ['titulo', 'Dado 2', 'Dado 3'];
  const popupInfoText = foreachData.map(data => `<p>${data}</p>`).join('');
  popupInfo.innerHTML = popupInfoText;
});

closeBtn.addEventListener('click', () => {
  popup.style.display = 'none';
});