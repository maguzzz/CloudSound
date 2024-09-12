const audioPlayers = document.querySelectorAll('.audio-player');
const fadeDuration = 700; // Dauer der Ausblendung in Millisekunden (hier 1 Sekunde)

function fadeOut(audio) {
    const interval = 50; // Interval für die Lautstärke-Reduzierung
    const step = interval / fadeDuration; // Schrittweite für die Lautstärke-Reduzierung
    let volume = audio.volume;
    const originalVolume = volume; // Speichern der ursprünglichen Lautstärke

    const fadeOutInterval = setInterval(() => {
        volume -= step;
        if (volume <= 0) {
            clearInterval(fadeOutInterval);
            audio.pause();
            audio.currentTime = 0; // Setze die Wiedergabeposition auf 0
            // Wiederherstellen der ursprünglichen Lautstärke
            setTimeout(() => {
                audio.volume = originalVolume;
            }, 100); // Kurze Verzögerung, um die Lautstärke nach der Pause wiederherzustellen
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