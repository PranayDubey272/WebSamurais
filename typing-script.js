let wordsPerMinute=0;
document.addEventListener('DOMContentLoaded', function () {
    const sentenceList = [
        'the quick brown fox jumps over the lazy dog a journey of a thousand miles begins with a single step.To be or not to be, that is the question.',
        'In the beginning God created the heavens and the earth.',
        'All that glitters is not gold.'
    ];

    let currentSentenceIndex = 0;
    let startTime;
    let endTime;
    let timerInterval;
    let totalTypedWords = 0;
    let userInput = '';

    const sentenceDisplay = document.getElementById('sentence-display');
    const feedbackMessage = document.getElementById('feedback-message');
    const timerElement = document.getElementById('timer');
    const accuracyElement = document.getElementById('accuracy');
    const startButton = document.getElementById('start-button');
    const restartButton = document.getElementById('restart-button');

    function displayNextSentence() {
        const currentSentence = sentenceList[currentSentenceIndex];
        const words = currentSentence.split(' ');

        let sentenceHTML = '';
        for (let i = 0; i < words.length; i++) {
            sentenceHTML += `<span>${words[i]}</span> `;
        }

        sentenceDisplay.innerHTML = sentenceHTML.trim();
        userInput = ''; // Clear the typed content
    }

    function handleInput() {
        const currentSentence = sentenceList[currentSentenceIndex];
        const words = currentSentence.split(' ');

        let sentenceHTML = '';
        let typedWords = userInput.split(' ');

        for (let i = 0; i < words.length; i++) {
            const word = words[i];
            const isTyped = i < typedWords.length && typedWords[i] === word;
            const wordHTML = isTyped ? `<span class="correct-word">${word}</span>` : `<span class="incorrect-word">${word}</span>`;
            sentenceHTML += `${wordHTML} `;
        }

        sentenceDisplay.innerHTML = sentenceHTML.trim();
        const correctWords = typedWords.filter((word, index) => words[index] === word).length;
        const accuracy = Math.round((correctWords / words.length) * 100);
        accuracyElement.textContent = `Accuracy: ${accuracy}%`;
    }

    function updateTimer() {
        const currentTime = new Date();
        const elapsedMilliseconds = currentTime - startTime;
        const remainingMilliseconds = Math.max(0, 30000 - elapsedMilliseconds); // 30 seconds in milliseconds
        const remainingSeconds = Math.ceil(remainingMilliseconds / 1000);
        timerElement.textContent = `${remainingSeconds}s`;

        if (remainingSeconds === 0) {
            handleFinish();
        }
    }

    function startExercise() {
        currentSentenceIndex = 0;
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
    
    function handleFinish() {
        clearInterval(timerInterval);
        endTime = new Date();
        const elapsedTime = (endTime - startTime) / 60000; // in minutes
        const totalCorrectWords = sentenceList.reduce((acc, sentence) => {
            const sentenceWords = sentence.split(' ');
            const typedWords = userInput.split(' ');
            const correctWords = sentenceWords.reduce((wordAcc, word, index) => {
                return wordAcc + (typedWords[index] === word ? 1 : 0);
            }, 0);
            return acc + correctWords;
        }, 0);

        const wordsPerMinute = Math.round(totalCorrectWords / elapsedTime);
        feedbackMessage.textContent = `Congratulations! Your typing speed: ${wordsPerMinute} WPM`;
        updateDatabaseWPM(wordsPerMinute);
        
    }

    function updateCursor() {
        const currentSentence = sentenceList[currentSentenceIndex];
        const cursorPosition = userInput.length * 20; // Adjust the multiplier based on your font size and style
        cursor.style.left = `${cursorPosition}px`;
    }

    document.addEventListener('keydown', function (event) {
        if (event.key === 'Enter') {
            startExercise();
        } else if (event.key === 'Backspace') {
            // Handle backspace
            userInput = userInput.slice(0, -1); // Remove the last character
        } else if (/^[a-zA-Z\s]+$/.test(event.key) || event.key === 'CapsLock') {
            // Check if the pressed key is a valid character (letter or space) or CapsLock is active
            if (event.key !== 'CapsLock') {
                userInput += event.key.toLowerCase(); // Convert to lowercase
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

    startButton.addEventListener('click', startExercise);
    restartButton.addEventListener('click', restartExercise);

    document.addEventListener('keydown', function () {
        const currentSentence = sentenceList[currentSentenceIndex];
        updateCursor();
        if (userInput === currentSentence) {
            currentSentenceIndex++;
            if (currentSentenceIndex < sentenceList.length) {
                displayNextSentence();
            } else {
                handleFinish();
            }
        }
    });
});
