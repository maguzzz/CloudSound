const audioPlayers = document.querySelectorAll('.audio-player');
const fadeDuration = 700;

function fadeOut(audio) {
    const interval = 50;
    const step = interval / fadeDuration;
    let volume = audio.volume;
    const originalVolume = volume;

    const fadeOutInterval = setInterval(() => {
        volume -= step;
        if (volume <= 0) {
            clearInterval(fadeOutInterval);
            audio.pause();
            audio.currentTime = 0;
            setTimeout(() => {
                audio.volume = originalVolume;
            }, 100);
        } else {
            audio.volume = volume;
        }
    }, interval);
}

audioPlayers.forEach(audio => {
    audio.addEventListener('play', () => {
        audioPlayers.forEach(otherAudio => {
            if (otherAudio !== audio) {
                if (!otherAudio.paused) {
                    fadeOut(otherAudio);
                }
            }
        });
    });
});