let spaceCount = 0;
let wordsPerMinute=0;
document.addEventListener('DOMContentLoaded', function () {
    let sentenceList = [];
    fetch('fetch_love_letter.php')
    .then(response => response.json())
    .then(sentences => {
        // Store the fetched sentences in the sentenceList array
        sentenceList = sentences;
    console.log(sentenceList[2]);
    const pnsentenceList = [
        'under the 1,000,000 celestial ,tapestry of tanabata where 100 stars weave dreams',' i find my heart entwined with, thoughts of you. like the fabled lovers our paths converged','in this cosmic dance your presence a radiant star, in my sky fills my world with joy, on this auspicious day i pen my feelings hoping our love, like vega and altair. transcends any cosmic divide',
        'where stars 23 weave dreams, i find my heart entwined with ,thoughts of you .like the fabled, lovers. our paths converged in this cosmic dance your presence a radiant star in my sky fills my world with joy on this auspicious day i pen my feelings hoping our love like vega and altair transcends any cosmic divide',
        'I pen my heart whispers to you on this Tanabata night. Like the meeting of Orihime and Hikoboshi, our destinies intertwined. Your love, a luminous river flowing through my soul, guides me towards you. Across galaxies of time, our love story unfolds, a tale written in stardust, binding us in eternal celestial embrace.'
    ];
    let currentSentenceIndex = Math.floor(Math.random() * 10);
    let startTime;
    let endTime;
    let timerInterval;
    let totalTypedWords = 0;
    let userInput = '';
    let totalErrors = 0; 
    document.getElementById('sentence-type').addEventListener('change', function () {
        const selectedType = parseInt(this.value, 5);
        if(selectedType == 2){
            sentenceList = pnsentenceList;
        }
    });
    let qwertyToDvorakMap = {
        'q': '/',
        'w': ',',
        'e': '.',
        'r': 'p',
        't': 'y',
        'y': 'f',
        'u': 'g',
        'i': 'c',
        'o': 'r',
        'p': 'l',
        '[': 'a',
        ']': 'o',
        'a': 'e',
        's': 'u',
        'd': 'i',
        'f': 'd',
        'g': 'h',
        'h': 't',
        'j': 'n',
        'k': 's',
        'l': '-',
        ';': ';',
        "'": '[',
        'z': '=',
        'x': 'q',
        'c': 'j',
        'v': 'k',
        'b': 'x',
        'n': 'b',
        'm': 'm',
        ',': 'w',
        '.': 'v',
        '/': 'z',
    };
    document.getElementById('layout').addEventListener('change', function () {
        const selectedType = parseInt(this.value, 10);
        if (selectedType === 2) {
           fetch('DVORAK.php')
           
        .then(response => response.text())
        .then(html => {
            // Insert the HTML content into the container element
            document.querySelector('.keyboard').innerHTML = html;
        });

            const textInput = document.createElement('div');
            document.body.appendChild(textInput);
        
           
        
            document.addEventListener('keypress', simulateKeyPress);
        
            function typeCharacter(character) {
                // Append the typed character to the textInput element
                textInput.textContent += character;

            }
        
            function simulateKeyPress(event) {
                const key = event.key.toLowerCase(); // Convert to lowercase for case-insensitivity
        
                // Check if the pressed key is a printable character and part of the mapping
                if (key.length === 1 && qwertyToDvorakMap.hasOwnProperty(key)) {
                    // Prevent the default action to avoid unwanted input
                    event.preventDefault();
        
                    // Use the mapping
                    const dvorakKey = qwertyToDvorakMap[key];
        
                    typeCharacter(dvorakKey);
                }
            }

        
        }
    });
    
    
    const sentenceDisplay = document.getElementById('sentence-display');
    const feedbackMessage = document.getElementById('feedback-message');
    const timerElement = document.getElementById('timer');
    const accuracyElement = document.getElementById('accuracy');
    const errorMessage = document.getElementById('errors');
    let speech = new SpeechSynthesisUtterance();
    let isInc = 0;
    console.log(timerElement);

    //audio-function
    function Audio(){
        console.log("dfsfds");
        window.speechSynthesis.onvoiceschanged = function () {
        var voices = window.speechSynthesis.getVoices();
        var selectedVoice = voices.find(function (voice) {
            return voice.name === 'Zira' || voice.voiceURI.includes('Zira');
        });
            speech.voice = selectedVoice;
            speech.text = document.querySelector("#sentence-display").textContent;
            speech.rate = 0.1;
            window.speechSynthesis.speak(speech);
        };
    }
    //audio
    



    function displayNextSentence() {
        const currentSentence = sentenceList[currentSentenceIndex];
    const words = String(currentSentence).split(' ');
        console.log(words);
        let sentenceHTML = '';
        for (let i = 0; i < words.length; i++) {
            sentenceHTML += `<span>${words[i]}</span> `;
        }

        sentenceDisplay.innerHTML = sentenceHTML.trim();
        userInput = ''; // Clear the typed content
        window.speechSynthesis.cancel();
        let ae = document.getElementById('audio-excercise');
        if(ae.checked){
            Audio();
        }

    }
    
    //vars need for calculating WPM
    let typedalready = [];
    let typedalreadybutnotcorrect = [];
    var uniquewords;
    var uniquewrongs;
    var totaltypedwords;
    var totalwrongwords;
    var totalwrongs;

    function handleInput() {
        const currentSentence = sentenceList[currentSentenceIndex];
        const words = currentSentence.split(' ');
    
        let sentenceHTML = '';
        let typedWords = userInput.split(' ');
    
        for (let i = 0; i < words.length; i++) {
            const word = words[i];
            const isTyped = i < typedWords.length && typedWords[i] === word;
            const isIncorrect = i < typedWords.length && typedWords[i] !== word;
    
            let wordHTML;
            if (isTyped) {
                wordHTML = `<span class="correct-word">${word}</span>`;
                typedalready.push(word);
            } 
            else if (isIncorrect) {
                wordHTML = `<span class="incorrect-word">${word}</span>`;
                isInc++;
                typedalreadybutnotcorrect.push(word);
            } else {
                wordHTML = `<span>${word}</span>`;
            }

            sentenceHTML += `${wordHTML} `;
        }
        function onlyUnique(value, index, array) {
            return array.indexOf(value) === index;
          }
          
        uniquewords = typedalready.filter(onlyUnique);
         uniquewrongs = typedalreadybutnotcorrect.filter(onlyUnique);

         totaltypedwords = uniquewords.length;
         totalwrongwords = uniquewrongs.length;
         totalwrongs = (totalwrongwords - totaltypedwords)-1;

        sentenceDisplay.innerHTML = sentenceHTML.trim();
        const correctWords = typedWords.filter((word, index) => words[index] === word).length;
        const accuracy = Math.round((correctWords / words.length) * 100);
        accuracyElement.textContent = `Accuracy: ${accuracy}%`;
    }
    

    
    
    let selectedTimer = 10; // Default timer duration in seconds

    // Event listener for timer option selection
    document.getElementById('timer-select').addEventListener('change', function () {
        selectedTimer = parseInt(this.value, 10);
        timerElement.textContent = `${selectedTimer}s`;
    });
    
    let finishHandled = false;

        sentenceHTML += `${wordHTML} `;
    }

    sentenceDisplay.innerHTML = sentenceHTML.trim();
    const correctWords = typedWords.filter((word, index) => words[index] === word).length;
    const accuracy = Math.round((correctWords / words.length) * 100);
    accuracyElement.textContent = `Accuracy: ${accuracy}%`;
}

    
    
    let selectedTimer = 30; // Default timer duration in seconds

    // Event listener for timer option selection
    document.getElementById('timer-select').addEventListener('change', function () {
        selectedTimer = parseInt(this.value, 10);
        timerElement.textContent = `${selectedTimer}s`;
    });
    
    function updateTimer() {
        const currentTime = new Date();
        const elapsedMilliseconds = currentTime - startTime;
        const remainingMilliseconds = Math.max(0, selectedTimer * 1000 - elapsedMilliseconds);
        const remainingSeconds = Math.ceil(remainingMilliseconds / 1000);
        timerElement.textContent = `${remainingSeconds}s`;

        if (remainingSeconds === 0 && !finishHandled) {
            finishHandled = true;
            handleFinish();
        }

    }
    

    function startExercise() {
        currentSentenceIndex = Math.floor(Math.random()*6);
        startTime = new Date(); // Set the start time
        displayNextSentence();
        feedbackMessage.textContent = '';
        totalTypedWords = 0; // Reset total typed words

        timerInterval = setInterval(updateTimer, 1000);
    }
    function updateDatabaseWPM(wordsPerMinute) {
        fetch('update_hwpm.php', {
    
            method: 'POST',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded',
            },
            body: 'wpm=' + wordsPerMinute,
            
        })
        .then(response => response.json())
        .then(data => console.log(data))
        .catch(error => console.error('Error:', error));
    }
    function elapsedTimes(timer){
        if(timer === 10){
            return 0.16;
        }
        else if(timer === 60){
            return 1;
        }
        else if(timer == 120){
            return 2;
        }
    }
        var beepsound = new Audio(   
            'https://www.soundjay.com/button/sounds/beep-01a.mp3');   
                         
     function handleFinish() {

        beepsound.play;   

        clearInterval(timerInterval);

        endTime = new Date();
        const elapsedTime = elapsedTimes(selectedTimer); // in minutes
        let cw = 0;
        const totalCorrectWords = sentenceList.reduce((acc, sentence) => {
            const sentenceWords = sentence.split(' ');
            const typedWords = userInput.split(' ');
            const correctWords = sentenceWords.reduce((wordAcc, word, index) => {
            const typedWord = typedWords.length > index ? typedWords[index].trim().toLowerCase() : '';
            const isCorrect = typedWord === word.toLowerCase(); // Compare after trimming and converting to lowercase
            
                if (!isCorrect) {
                    totalErrors++; // Increment error count
                }  
                
                return wordAcc + (isCorrect ? 1 : 0);
            }, 0);

            


            cw += correctWords;
            return acc + correctWords;
            
        }, 0);
        console.log("time",elapsedTime);
        console.log("Correct",totaltypedwords);
        console.log(totaltypedwords/elapsedTime);
        const wordsPerMinute = totaltypedwords/elapsedTime;

        feedbackMessage.textContent = `Your typing speed: ${wordsPerMinute} WPM`;        
        updateDatabaseWPM(wordsPerMinute);
        console.log("After updating WPM");
        return;
    }

    document.addEventListener('keyup', function (event) {
        const selectedLayout = parseInt(document.getElementById('layout').value, 10);
    
        if (event.key === 'Enter') {
            startExercise();
        } else if (event.key === 'Backspace') {
            // Disable Backspace
            event.preventDefault();
            // Handle backspace
            userInput = userInput.slice(0, -1); // Remove the last character
        } else {
            // Check if Dvorak layout is selected
            if (selectedLayout === 2) {
                const key = event.key.toLowerCase(); // Convert to lowercase for case-insensitivity
                if (/^[a-zA-Z\s]+$/.test(key) || key === 'CapsLock') {
                    // Check if the pressed key is a valid character (letter or space) or CapsLock is active
                    if (key !== 'CapsLock') {
                        // Use the Dvorak mapping directly
                        const dvorakKey = qwertyToDvorakMap[key] || key;
                        userInput += dvorakKey.toLowerCase(); // Convert to lowercase
                        console.log(dvorakKey);
                    }
                }
            } else {
                // For QWERTY
                if (/^[a-zA-Z\s]+$/.test(event.key) || event.key === 'CapsLock') {
                    // Check if the pressed key is a valid character (letter or space) or CapsLock is active
                    if (event.key !== 'CapsLock') {
                        userInput += event.key.toLowerCase(); // Convert to lowercase
                    }
                }
            }
        }

        handleInput();

        // Check if the user has reached the end of the current sentence
        const currentSentence = sentenceList[currentSentenceIndex];
        if (userInput.length === currentSentence.length) {
            totalTypedWords += currentSentence.split(/\s+/).filter(Boolean).length; // Update total typed words
            currentSentenceIndex++;
            if (currentSentenceIndex < sentenceList.length) {
                displayNextSentence();
            } else {
                handleFinish();
            }
        }
    });
    


    document.addEventListener('keydown', function () {
        const currentSentence = sentenceList[currentSentenceIndex];
        if (userInput === currentSentence) {
            currentSentenceIndex++;
            if (currentSentenceIndex < sentenceList.length) {
                displayNextSentence();
            } else {
                handleFinish();
            }
        }
    });
})});