const fileInput = document.getElementById('songAudio');
const label = document.getElementById('labelForSongAudio');

fileInput.addEventListener('change', function() {
    if (fileInput.files.length > 0) {
        const fileName = fileInput.files[0].name;
        
        label.textContent = `${fileName}`;
    }
});