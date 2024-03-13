// Sanftes Scrollen für alle Links mit #
document.querySelectorAll('a[href^="#"]').forEach(anchor => {
    anchor.addEventListener('click', function (e) {
        e.preventDefault();

        document.querySelector(this.getAttribute('href')).scrollIntoView({
            behavior: 'smooth'
        });
    });
});

// Kontaktformular-Validierung (Beispiel)
document.querySelector('form').addEventListener('submit', event => {
    event.preventDefault(); // Verhindert die tatsächliche Formularübermittlung für das Beispiel

    // Einfache Validierung, ob das E-Mail-Feld ausgefüllt ist
    const email = document.querySelector('#email').value;
    if (email === '') {
        alert('Bitte geben Sie eine E-Mail-Adresse ein.');
        return false;
    }

    // Simuliert eine erfolgreiche Formularübermittlung
    alert('Danke für Ihre Nachricht! Wir werden uns bald bei Ihnen melden.');
});
