document.addEventListener('DOMContentLoaded', function () {
    alert()
    const textInput = document.getElementById('textInput');
    const qwertyToDvorakMap = {
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

    function typeCharacter(character) {
        const currentText = textInput.value;
        textInput.value = currentText + character;
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

    document.addEventListener('keydown', simulateKeyPress);
});
        