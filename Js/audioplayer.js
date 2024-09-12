// Fade-out duration
const fadeDuration = 700;

// Function to fade out audio
function fadeOut(audioElement, playButton) {
    const interval = 50;
    const step = interval / fadeDuration;
    let volume = audioElement.volume;
    const originalVolume = volume;

    const fadeOutInterval = setInterval(() => {
        volume -= step;
        if (volume <= 0) {
            clearInterval(fadeOutInterval);
            audioElement.pause();
            audioElement.currentTime = 0;
            setTimeout(() => {
                audioElement.volume = originalVolume;
                // Reset the play button background image to "Play.png" after fade-out
                playButton.style.backgroundImage = "url('./Resources/Icons/Play.png')";
            }, 100);
        } else {
            audioElement.volume = volume;
        }
    }, interval);
}

// Function to initialize an audio player
function initializeAudioPlayer(playerContainer) {
    const audio = playerContainer.querySelector('audio');
    const seekSlider = playerContainer.querySelector('.seekSlider');
    const volumeSlider = playerContainer.querySelector('.volumeSlider');
    const back = playerContainer.querySelector('.SecBack');
    const forward = playerContainer.querySelector('.SecForward');
    const playButton = playerContainer.querySelector('.playIcon');
    let state = 'play';

    const setSliderMax = () => {
        seekSlider.max = Math.floor(audio.duration);
    };

    const calculateTime = (secs) => {
        const minutes = Math.floor(secs / 60);
        const seconds = Math.floor(secs % 60);
        const returnedSeconds = seconds < 10 ? `0${seconds}` : `${seconds}`;
        return `${minutes}:${returnedSeconds}`;
    };

    // Play/Pause button functionality
    playButton.addEventListener('click', () => {
        if (state === 'play') {
            // Pause and update other audio players
            document.querySelectorAll('.audio-player').forEach(otherAudio => {
                if (otherAudio !== audio && !otherAudio.paused) {
                    const otherPlayButton = otherAudio.closest('#playerContainer').querySelector('.playIcon');
                    fadeOut(otherAudio, otherPlayButton);  // Fade out the other audio
                    otherPlayButton.style.backgroundImage = "url('./Resources/Icons/Play.png')";
                }
            });

            audio.play();
            playButton.style.backgroundImage = "url('./Resources/Icons/Pause.png')";
            state = 'pause';
        } else {
            audio.pause();
            playButton.style.backgroundImage = "url('./Resources/Icons/Play.png')";
            state = 'play';
        }

        playButton.style.width = "5em";
        playButton.style.backgroundRepeat = "no-repeat";
        playButton.style.backgroundPosition = "center";
        playButton.style.backgroundSize = "contain";
    });

    // Seek slider updates
    seekSlider.addEventListener('input', () => {
        audio.currentTime = seekSlider.value;
    });

    audio.addEventListener('timeupdate', () => {
        seekSlider.value = Math.floor(audio.currentTime);
    });

    // Volume slider updates
    volumeSlider.addEventListener('input', (e) => {
        audio.volume = e.target.value / 100;
    });

    audio.addEventListener('loadedmetadata', setSliderMax);

    // Skip 10 seconds back
    back.addEventListener('click', () => {
        audio.currentTime -= 10;
    });

    // Skip 10 seconds forward
    forward.addEventListener('click', () => {
        audio.currentTime += 10;
    });
}

// Apply the audio player logic to all players
document.querySelectorAll('#playerContainer').forEach(initializeAudioPlayer);
