
let state = 'play';

const audio = document.querySelector('audio');
const seekSlider = document.getElementById('seekSlider');
const volumeSlider = document.getElementById('volumeSlider')
const back = document.getElementById('SecBack');
const forward = document.getElementById('SecForward');
const playButton = document.getElementById('playIcon');
let currentTime = null;

const setSliderMax = () => {
    seekSlider.max = Math.floor(audio.duration);
}

const calculateTime = (secs) => {
    const minutes = Math.floor(secs / 60);
    const seconds = Math.floor(secs % 60);
    const returnedSeconds = seconds < 10 ? `0${seconds}` : `${seconds}`;
    return `${minutes}:${returnedSeconds}`;
}

playButton.addEventListener('click', () => {
    console.log('Button clicked');
    console.log('Current state:', state);

    if (state === 'play') {
        audio.play();
        state = 'pause';
        playButton.style.backgroundImage = "url('./Resources/Icons/Pause.png')";
    } else {
        audio.pause();
        state = 'play';
        playButton.style.backgroundImage = "url('./Resources/Icons/Play.png')";
    }

    playButton.style.backgroundRepeat = "no-repeat";
    playButton.style.backgroundPosition = "center";
    playButton.style.backgroundSize = "contain";
});


back.addEventListener('click', () => {
    audio.currentTime -= 10;
});

forward.addEventListener('click', () => {
    audio.currentTime += 10;
});


seekSlider.addEventListener('input', () => {
    currentTime = calculateTime(seekSlider.value);
    
});

seekSlider.addEventListener('input', () => {
    audio.currentTime = seekSlider.value;
});

audio.addEventListener('timeupdate', () => {
    seekSlider.value = Math.floor(audio.currentTime);
});


volumeSlider.addEventListener('input', (e) => {

    const value = e.target.value;
    audio.volume = value / 100;
});

audio.addEventListener('loadedmetadata', () => {

    setSliderMax();
});




