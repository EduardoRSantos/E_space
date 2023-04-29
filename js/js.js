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
