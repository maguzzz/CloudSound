const fileInput = document.getElementById('songAudio');
const label = document.getElementById('labelForSongAudio');

fileInput.addEventListener('change', function() {
    if (fileInput.files.length > 0) {
        const fileName = fileInput.files[0].name;
        
        label.textContent = `${fileName}`;
    }
});



document.getElementById('songImageUploader').addEventListener('change', function(event) {
    const songImageDiv = document.getElementById('songImage');
    const file = event.target.files[0];

    if (file && file.type.startsWith('image/')) {
        const reader = new FileReader();
        
        reader.onload = function(e) {
            songImageDiv.style.backgroundImage = `url(${e.target.result})`;
            songImageDiv.style.backgroundSize = 'cover';
            songImageDiv.style.backgroundPosition = 'center';
        };

        reader.readAsDataURL(file);
    } else {
        alert('Please upload a valid image file.');
    }
});