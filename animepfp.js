
const url = 'https://any-anime.p.rapidapi.com/v1/anime/gif/10';
    const options = {
        method: 'GET',
        headers: {
            'X-RapidAPI-Key': 'aa70b06a1fmsh2d5d7da19ee34dap17869fjsnf392e537ec5b',
            'X-RapidAPI-Host': 'any-anime.p.rapidapi.com'
        }
    };

    async function fetchAnimeAndSetImage(element) {
        try {
            const response = await fetch(url, options);
            const result = await response.json();
            console.log(result.status);
            var link = result.images[0];
            console.log(result);
            element.src = link;

            // debugging
        } catch (error) {
            console.error(error);
        }
    }

    document.addEventListener('DOMContentLoaded', function () {
        const animeGifElements = document.querySelectorAll('.animeGif');
        animeGifElements.forEach(function (element) {
            fetchAnimeAndSetImage(element);
        });
    });
    
    
    async function preloadImage(url) {
        return new Promise((resolve, reject) => {
            const img = new Image();
            img.onload = resolve;
            img.onerror = reject;
            img.src = url;
        });
    }
    