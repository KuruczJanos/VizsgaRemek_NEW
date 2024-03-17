const LogEmailInput = document.querySelector("#LogEmailInput");
const LogPassInput = document.querySelector("#LogPassInput");

document.addEventListener('DOMContentLoaded', function () {
    const cards = document.querySelectorAll('.card');

    cards.forEach(card => {
        card.addEventListener('mouseenter', () => {
            card.style.transform = 'scale(1.1)';
        });

        card.addEventListener('mouseleave', () => {
            card.style.transform = 'scale(1)';
        });
    });
});
// function handleLoginFormSubmit(event) {
//     event.preventDefault(); // Az alapértelmezett űrlap elküldésének megakadályozása
//     document.getElementById('LoginForm').action = '../includes/logvalid.php';
//     document.getElementById('LoginForm').submit(); // Bejelentkezési űrlap elküldése
// }

// function handleSubscribeFormSubmit(event) {
//     event.preventDefault(); // Az alapértelmezett űrlap elküldésének megakadályozása
//     document.getElementById('SubscribeForm').action = '../includes/subscribe.php';
//     document.getElementById('SubscribeForm').submit(); // Feliratkozási űrlap elküldése
// }
// function handlelistServiceFormSubmit(event) {
//     event.preventDefault(); // Az alapértelmezett űrlap elküldésének megakadályozása
//     document.getElementById('listServiceForm').action = '../includes/listServicesContent.php';
//     document.getElementById('listServiceForm').submit(); // Feliratkozási űrlap elküldése
// }

// Az űrlapok elküldését figyelő eseménykezelő hozzáadása
// document.getElementById('LoginForm').addEventListener('submit', handleLoginFormSubmit);
// document.getElementById('SubscribeForm').addEventListener('submit', handleSubscribeFormSubmit);
// document.getElementById('listServiceForm').addEventListener('submit', handlelistServiceFormSubmit);
// // JavaScript függvény az űrlapok elküldésének kezelésére
// function handleFormSubmit(event) {
//     event.preventDefault(); // Megakadályozzuk az alapértelmezett űrlap elküldését

//     // Meghatározzuk, melyik űrlapot küldték el
//     if (event.target.id === 'LoginForm') {
//         // Bejelentkezési űrlap elküldése
//         // Itt lehetőség van további ellenőrzésekre vagy műveletekre
//         document.getElementById('LoginForm').action = '../includes/logvalid.php';
//         document.getElementById('LoginForm').submit(); // Bejelentkezési űrlap elküldése
//     } else if (event.target.id === 'SubscribeForm') {
//         // Feliratkozási űrlap elküldése
//         // Itt lehetőség van további ellenőrzésekre vagy műveletekre
//         document.getElementById('SubscribeForm').action = '../includes/subscribe.php';
//         document.getElementById('SubscribeForm').submit(); // Feliratkozási űrlap elküldése
//     }
// }

// // Az űrlapok elküldését figyelő eseménykezelő hozzáadása
// document.getElementById('LoginForm').addEventListener('submit', handleFormSubmit);
// document.getElementById('SubscribeForm').addEventListener('submit', handleFormSubmit);