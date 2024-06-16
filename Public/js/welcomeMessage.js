let handler = document.getElementById('random-message');
const messages = [
    ', reach for the stars!',
    ', fly your way!',
    ', fly fast!',
    ', left or right!',
    ', start the engine!',
    ", don't crash!"
];

if(handler){
    handler.innerHTML = messages[Math.floor(Math.random() * 6)];
}