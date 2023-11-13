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

    <div id="cursor"></div> 
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
            <span class="btn second"><sub>`</sub><sup>~</sup></span>
            <span class="btn col1"><sub>1</sub><sup>!</sup></span>
            <span class="btn col1"><sub>2</sub><sup>@</sup></span>
            <span class="btn Row1"><sub>3</sub><sup>#</sup></span>
            <span class="btn Row2"><sub>4</sub><sup>$</sup></span>
            <span class="btn Row2"><sub>5</sub><sup>%</sup></span>
            <span class="btn Row2"><sub>6</sub><sup>^</sup></span>
            <span class="btn Row2"><sub>7</sub><sup>&</sup></span>
            <span class="btn Row1"><sub>8</sub><sup>*</sup></span>
            <span class="btn col1"><sub>9</sub><sup>(</sup></span>
            <span class="btn col1"><sub>0</sub><sup>)</sup></span>
            <span class="btn col1"><sub>_</sub><sup>-</sup></span>
            <span class="btn col1"><sub>=</sub><sup>+</sup></span>
            <span class="btn longkey">backspace</span>
            <br>
            <br>
            <br>
            
        </div>
        
        <div class="look">
            <span class="btn tab">tab</span>
            <span class="btn col2">Q</span>
            <span class="btn col2">W</span>
            <span class="btn Row1">E</span>
            <span class="btn Row2">R</span>
            <span class="btn Row2">T</span>
            <span class="btn Row2">Y</span>
            <span class="btn Row2">U</span>
            <span class="btn Row1">l</span>
            <span class="btn col2">O</span>
            <span class="btn col2">P</span>
            <span class="btn col2"><sub>[</sub><sup>{</sup></span>
            <span class="btn col2"><sub>]</sub><sup>}</sup></span>
            <span class="btn tab"><sub>\</sub><sup>|</sup></span>
            
            <br>
            <br>
            <br>
    
        </div>
        <div class="look">
            <span class="btn caps">capslock</span>
            <span class="btn col3">A</span>
            <span class="btn col3">S</span>
            <span class="btn Row1">D</span>
            <span class="btn Row2">F</span>
            <span class="btn Row2">G</span>
            <span class="btn Row2">H</span>
            <span class="btn Row2">J</span>
            <span class="btn Row1">K</span>
            <span class="btn col3">L</span>
            <span class="btn col3"><sub>;</sub><sup>:</sup></span>
            <span class="btn col3"><sub>]</sub><sup>"</sup></span>
            <span class="btn caps">enter</span>
            <br>
            <br>
            <br>
    
        </div>
        
        <div class="look">
            <span class="btn shift">shift</span>
            <span class="btn col4">Z</span>
            <span class="btn col4">X</span>
            <span class="btn Row1">C</span>
            <span class="btn Row2">V</span>
            <span class="btn Row2">B</span>
            <span class="btn Row2">N</span>
            <span class="btn Row2">M</span>
            <span class="btn Row1"><sub>,</sub><sup>&lt</sup></span>
            <span class="btn col4"><sub>.</sub><sup>&gt</sup></span>
            <span class="btn col4"><sub>/</sub><sup>?</sup></span>
            <span class="btn shift">shift</span>
            <br>
            <br>
            <br>
    
        </div>
        <div class="look">
            <span class="btn six">ctrl</span>
            <span class="btn six">fn</span>
            <span class="btn col5">win</span>
            <span class="btn col5">alt</span>
            <span class="btn space">space</span>
            <span class="btn col5">alt</span>
            <span class="btn col5">ctrl</span>
            <span class="btn six">&lt</span>
            <span class="btn six">^</span>
            <span class="btn six">&gt</span>
    
        </div>
        
</div>
<div id="stars-container"></div>
    <script src="typing-script.js"></script>
    <script src="three3.js"></script>
</body>
</html>
