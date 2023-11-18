<?php
session_start();
if (isset($_SESSION['username'])) {
    echo '<p>Hello, ' . $_SESSION['username'] . '! Welcome!</p>';
    include 'navbar-loggedin.php';
} else {
    include 'navbar.php';
}

?>
<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


    <script src="https://cdnjs.cloudflare.com/ajax/libs/three.js/r128/three.min.js"></script>
    <link rel="stylesheet" href="typing-style.css">
    <link rel="stylesheet" href="test.css">
    <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>

    <title> Typing Page</title>
</head>
<body>
    <div class="working">
    <div id="timer-options">
    <label for="timer-select"></label>
    <select id="timer-select" class="tnl">
        <option value="30">30 seconds</option>
        <option value="60">1 minute</option>
        <option value="120">2 minutes</option>
    </select>
    <div class="tnl">
    <label for="sentence-count" class="tnl"></label>
    <select id="sentence-count">
        <option value="1">1 Sentence</option>
        <option value="2">2 Sentences</option>
        <option value="3">3 Sentences</option>
    </select>
    <label for="typeof-sentence" class="tnl"></label>
    <select id="sentence-type">
        <option value="1">Without Punctuations and numbers</option>
        <option value="2">with Punctuations and numbers</option>
    </select>
</div>

    <div id="sentence-display" class="landingline">
        <p>Press Enter to start typing!</p>
    </div>
    
    <div id="feedback-message"></div>
    <div id="errors"></div>
    <div id="stats">
        <span id="timer">0s</span>
        <span id="accuracy">Accuracy: 100%</span>
        
    </div>
    </div>
    <div class="keyboard">
    
        <div class="look">
        <span class="btn second" id="onscreen-backtick"><sub>`</sub><sup>~</sup></span>
        <span class="btn col1" id="onscreen-1"><sub>1</sub><sup>!</sup></span>
        <span class="btn col1" id="onscreen-2"><sub>2</sub><sup>@</sup></span>
        <span class="btn Row1" id="onscreen-3"><sub>3</sub><sup>#</sup></span>
        <span class="btn Row2" id="onscreen-4"><sub>4</sub><sup>$</sup></span>
        <span class="btn Row2" id="onscreen-5"><sub>5</sub><sup>%</sup></span>
        <span class="btn Row2" id="onscreen-6"><sub>6</sub><sup>^</sup></span>
        <span class="btn Row2" id="onscreen-7"><sub>7</sub><sup>&</sup></span>
        <span class="btn Row1" id="onscreen-8"><sub>8</sub><sup>*</sup></span>
        <span class="btn col1" id="onscreen-9"><sub>9</sub><sup>(</sup></span>
        <span class="btn col1" id="onscreen-0"><sub>0</sub><sup>)</sup></span>
        <span class="btn col1" id="onscreen-underscore"><sub>_</sub><sup>-</sup></span>
        <span class="btn col1" id="onscreen-equals"><sub>=</sub><sup>+</sup></span>
        <span class="btn longkey" id="onscreen-backspace">backspace</span>
            <br>
            <br>
            
        </div>
        
        <div class="look">
        <span class="btn tab" id="onscreen-tab">tab</span>
        <span class="btn col2" id="onscreen-Q"><sub>Q</sub></span>
        <span class="btn col2" id="onscreen-W"><sub>W</sub></span>
        <span class="btn Row1" id="onscreen-E"><sub>E</sub></span>
        <span class="btn Row2" id="onscreen-R"><sub>R</sub></span>
        <span class="btn Row2" id="onscreen-T"><sub>T</sub></span>
        <span class="btn Row2" id="onscreen-Y"><sub>Y</sub></span>
        <span class="btn Row2" id="onscreen-U"><sub>U</sub></span>
        <span class="btn Row1" id="onscreen-I"><sub>I</sub></span>
        <span class="btn col1" id="onscreen-O"><sub>O</sub></span>
        <span class="btn col1" id="onscreen-P"><sub>P</sub></span>
        <span class="btn col1" id="onscreen-left-bracket"><sub>[</sub><sup>{</sup></span>
        <span class="btn col1" id="onscreen-right-bracket"><sub>]</sub><sup>}</sup></span>
        <span class="btn tab" id="onscreen-backslash"><sub>\</sub><sup>|</sup></span>
            
            <br>
            <br>
            <br>
    
        </div>
        <div class="look">
        <span class="btn caps" id="onscreen-capslock">capslock</span>
        <span class="btn col3" id="onscreen-A"><sub>A</sub></span>
        <span class="btn col3" id="onscreen-S"><sub>S</sub></span>
        <span class="btn Row1" id="onscreen-D"><sub>D</sub></span>
        <span class="btn Row2" id="onscreen-F"><sub>F</sub></span>
        <span class="btn Row2" id="onscreen-G"><sub>G</sub></span>
        <span class="btn Row2" id="onscreen-H"><sub>H</sub></span>
        <span class="btn Row2" id="onscreen-J"><sub>J</sub></span>
        <span class="btn Row1" id="onscreen-K"><sub>K</sub></span>
        <span class="btn col3" id="onscreen-L"><sub>L</sub></span>
        <span class="btn col3" id="onscreen-semicolon"><sub>;</sub><sup>:</sup></span>
        <span class="btn col3" id="onscreen-quote"><sub>'</sub><sup>"</sup></span>
        <span class="btn caps" id="onscreen-enter">enter</span>
            <br>
            <br>
            <br>
    
        </div>
        
        <div class="look">
        <span class="btn shift" id="onscreen-shift">shift</span>
        <span class="btn col4" id="onscreen-Z"><sub>Z</sub></span>
        <span class="btn col4" id="onscreen-X"><sub>X</sub></span>
        <span class="btn Row1" id="onscreen-C"><sub>C</sub></span>
        <span class="btn Row2" id="onscreen-V"><sub>V</sub></span>
        <span class="btn Row2" id="onscreen-B"><sub>B</sub></span>
        <span class="btn Row2" id="onscreen-N"><sub>N</sub></span>
        <span class="btn Row2" id="onscreen-M"><sub>M</sub></span>
        <span class="btn Row1" id="onscreen-comma"><sub>,</sub><sup>&lt;</sup></span>
        <span class="btn col4" id="onscreen-period"><sub>.</sub><sup>&gt;</sup></span>
        <span class="btn col4" id="onscreen-slash"><sub>/</sub><sup>?</sup></span>
        <span class="btn shift" id="onscreen-shift">shift</span>
            <br>
            <br>
            <br>
    
        </div>
        <div class="look">
        <span class="btn six" id="onscreen-ctrl">ctrl</span>
        <span class="btn six" id="onscreen-fn">fn</span>
        <span class="btn col5" id="onscreen-win">win</span>
        <span class="btn col5" id="onscreen-alt">alt</span>
        <span class="btn space" id="onscreen-space">space</span>
        <span class="btn col5" id="onscreen-alt">alt</span>
        <span class="btn col5" id="onscreen-ctrl">ctrl</span>
        <span class="btn six" id="onscreen-left-arrow">&lt;</span>
        <span class="btn six" id="onscreen-up-arrow">^</span>
        <span class="btn six" id="onscreen-right-arrow">&gt;</span>
    
        </div>
        
</div>

<script>
        document.addEventListener('DOMContentLoaded', function() {
            // Add event listeners for keydown and keyup events
            document.addEventListener('keydown', handleKeyPress);
            document.addEventListener('keyup', handleKeyRelease);

            function handleKeyPress(event) {
                // Get the pressed key and build the corresponding onscreen key ID
                const pressedKey = event.key.toUpperCase();
                const onscreenKeyId = `onscreen-${pressedKey}`;

                // Select the corresponding onscreen key and add the highlight class
                const onscreenKey = document.getElementById(onscreenKeyId);
                if (onscreenKey) {
                    onscreenKey.classList.add('highlight');
                }
            }

            function handleKeyRelease(event) {
                // Get the released key and build the corresponding onscreen key ID
                const releasedKey = event.key.toUpperCase();
                const onscreenKeyId = `onscreen-${releasedKey}`;

                // Select the corresponding onscreen key and remove the highlight class
                const onscreenKey = document.getElementById(onscreenKeyId);
                if (onscreenKey) {
                    onscreenKey.classList.remove('highlight');
                }
            }
        });
    </script>
<div id="stars-container"></div>
    <script src="typing-script.js"></script>
    <script src="three3.js"></script>
</body>
</html>
