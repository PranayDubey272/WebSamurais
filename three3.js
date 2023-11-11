// three3.js

var scene = new THREE.Scene();
var camera = new THREE.PerspectiveCamera(75, window.innerWidth / window.innerHeight, 0.1, 1000);
var renderer = new THREE.WebGLRenderer();
renderer.setSize(window.innerWidth, window.innerHeight);
document.getElementById('stars-container').appendChild(renderer.domElement);

var starsGeometry = new THREE.BufferGeometry();
var starsMaterial = new THREE.PointsMaterial({ color: 0xFFFFFF, size: 1 });

var starsVertices = [];
var totalStars = 1000; // Adjust the total number of stars

for (let i = 0; i < totalStars; i++) {
    var x = (Math.random() - 0.5) * 2000;
    var y = (Math.random() - 0.5) * 2000;
    var z = (Math.random() - 0.5) * 2000;

    starsVertices.push(x, y, z);
}

starsGeometry.setAttribute('position', new THREE.Float32BufferAttribute(starsVertices, 3));
var stars = new THREE.Points(starsGeometry, starsMaterial);
scene.add(stars);

var clock = new THREE.Clock();

function animate() {
    requestAnimationFrame(animate);

    // Rotate the entire scene
    scene.rotation.y += 0.0005; // Adjust the rotation speed

    // Rotate the camera based on mouse movement
    camera.rotation.x += (mouse.y * 0.5 - camera.rotation.x) * 0.05;
    camera.rotation.y += (mouse.x * 0.5 - camera.rotation.y) * 0.05;

    // Make stars blink
    var time = clock.getElapsedTime();
    var blinkSpeed = 0.2; // Adjust the speed of blinking
    var threshold = 0.35; // Adjust the threshold for stars to start blinking
    var blinkCount = Math.floor(Math.abs(Math.sin(time * blinkSpeed)) * totalStars);

    for (let i = 0; i < totalStars; i++) {
        stars.geometry.attributes.position.array[i * 3 + 2] = i < blinkCount * threshold ? -2000 : starsVertices[i * 3 + 2];
    }

    stars.geometry.attributes.position.needsUpdate = true;

    renderer.render(scene, camera);
}

var mouse = new THREE.Vector2();
window.addEventListener('mousemove', (event) => {
    mouse.x = (event.clientX / window.innerWidth) * 2 - 1;
    mouse.y = -(event.clientY / window.innerHeight) * 2 + 1;
});

camera.position.z = 5;

animate();
