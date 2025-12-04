document.addEventListener('DOMContentLoaded', function () {
    var form = document.getElementById('myForm');
    if (!form) return;

    form.addEventListener('submit', function(event) {
        var nameFeedback = document.getElementById('name-feedback');
        var emailFeedback = document.getElementById('email-feedback');
        nameFeedback.textContent = '';
        emailFeedback.textContent = '';

        var name = document.getElementById('name').value.trim();
        var email = document.getElementById('email').value.trim();
        var emailPattern = /^[^ ]+@[^ ]+\.[a-z]{2,6}$/i;

        var nameErrors = [];
        var emailErrors = [];

        if (name.length < 3) {
            nameErrors.push('Name must be at least 3 characters long.');
        }

        if (!emailPattern.test(email)) {
            emailErrors.push('Please enter a valid email address.');
        }

        if (nameErrors.length || emailErrors.length) {
            // prevent submission and show inline errors
            event.preventDefault();
            if (nameErrors.length) {
                nameFeedback.style.color = 'red';
                nameFeedback.textContent = nameErrors.join(' ');
            }
            if (emailErrors.length) {
                emailFeedback.style.color = 'red';
                emailFeedback.textContent = emailErrors.join(' ');
            }
            return;
        }

        // client-side passed: show quick positive feedback and allow normal submit
        nameFeedback.style.color = 'green';
        nameFeedback.textContent = 'Looks good.';
        emailFeedback.style.color = 'green';
        emailFeedback.textContent = 'Looks good.';
        // no event.preventDefault() here — form will submit to the same page and included PHP will process
    });
});