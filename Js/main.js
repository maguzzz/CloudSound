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


document.addEventListener('DOMContentLoaded', () => {
    // Get dialog elements and buttons
    const dialogs = {
        register: document.getElementById('RegisterDialog'),
        login: document.getElementById('LoginDialog')
    };

    const buttons = {
        closeRegister: document.getElementById('closeRegisterDialog'),
        closeLogin: document.getElementById('closeLoginDialog'),
        openLogin: document.getElementById('openLoginDialog'),
        toLogin: document.getElementById('toLogin'),
        toRegister: document.getElementById('toRegister')
    };

    // Close all dialogs
    function closeAllDialogs() {
        Object.values(dialogs).forEach(dialog => dialog.close());
    }

    // Show a dialog
    function showDialog(type) {
        closeAllDialogs();
        dialogs[type].show();
    }

    // Event listener for buttons
    buttons.closeRegister.addEventListener('click', () => dialogs.register.close());
    buttons.closeLogin.addEventListener('click', () => dialogs.login.close());
    buttons.toLogin.addEventListener('click', (e) => { e.preventDefault(); showDialog('login'); });
    buttons.toRegister.addEventListener('click', (e) => { e.preventDefault(); showDialog('register'); });
    buttons.openLogin.addEventListener('click', (e) => { e.preventDefault(); showDialog('login'); });
});
