
/*
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
*/
document.addEventListener('DOMContentLoaded', () => {
    // Get dialog elements
    const registerDialog = document.getElementById('RegisterDialog');
    const loginDialog = document.getElementById('LoginDialog');

    // Get buttons
    const closeRegisterDialogBtn = document.getElementById('closeRegisterDialog');
    const closeLoginDialogBtn = document.getElementById('closeLoginDialog');

    const toLoginLink = document.getElementById('toLogin');
    const toRegisterLink = document.getElementById('toRegister');

    // Close all dialogs
    function closeAllDialogs() {
        if (registerDialog.open) {
            registerDialog.close();
        }
        if (loginDialog.open) {
            loginDialog.close();
        }
    }

    // Show Register Dialog
    function showRegisterDialog() {
        closeAllDialogs(); // Ensure no other dialog is open
        registerDialog.show();
    }

    // Show Login Dialog
    function showLoginDialog() {
        closeAllDialogs(); // Ensure no other dialog is open
        loginDialog.show();
    }

    // Event listeners for closing dialogs
    closeRegisterDialogBtn.addEventListener('click', () => {
        registerDialog.close();
    });

    closeLoginDialogBtn.addEventListener('click', () => {
        loginDialog.close();
    });

    // Event listeners for switching between dialogs
    toLoginLink.addEventListener('click', (e) => {
        e.preventDefault();
        showLoginDialog();
    });

    toRegisterLink.addEventListener('click', (e) => {
        e.preventDefault();
        showRegisterDialog();
    });

    // Optionally, you could open one dialog by default
    // loginDialog.show(); // Uncomment to open the login dialog initially
});

