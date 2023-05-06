function previewImages(input) {
    var preview = document.querySelector('#preview');
    if (input.files) {
        for (var i = 0; i < input.files.length; i++) {
            var reader = new FileReader();
            reader.onload = function(e) {
                var image = document.createElement('img');
                image.className = 'preview';
                image.src = e.target.result;
                preview.appendChild(image);
            }
            reader.readAsDataURL(input.files[i]);
        }
    }
}