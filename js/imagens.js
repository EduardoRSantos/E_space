function previewImages(input) {
    var preview = document.querySelector('#preview');
    if (input.files) {
        for (var i = 0; i < input.files.length; i++) {
            var reader = new FileReader();
            reader.onload = function(e) {
                var image = document.createElement('img');
                image.className = 'preview';
                image.onload = function() {
                    var canvas = document.createElement('canvas');
                    var context = canvas.getContext('2d');
                    var MAX_WIDTH = 1000; // Definindo a largura máxima da imagem
                    var MAX_HEIGHT = 1000; // Definindo a altura máxima da imagem
                    var width = image.width;
                    var height = image.height;

                    if (width > height) {
                        if (width > MAX_WIDTH) {
                            height *= MAX_WIDTH / width;
                            width = MAX_WIDTH;
                        }
                    } else {
                        if (height > MAX_HEIGHT) {
                            width *= MAX_HEIGHT / height;
                            height = MAX_HEIGHT;
                        }
                    }
                    canvas.width = width;
                    canvas.height = height;
                    context.drawImage(image, 0, 0, width, height);
                    image.src = canvas.toDataURL('image/jpeg');
                }
                image.src = e.target.result;
                preview.appendChild(image);
                image.style.marginRight = '15px'; // Adicionar a margem direita de 5 pixels
            }
            reader.readAsDataURL(input.files[i]);
        }
    }
}
