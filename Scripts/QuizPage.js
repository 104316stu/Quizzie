document.addEventListener('DOMContentLoaded', function() {
    const form = document.getElementById('quiz-form');
    if (!form) return;

    const answerButtons = form.querySelectorAll('.answer-btn');
    const chosenInput = document.getElementById('chosen-input');

    answerButtons.forEach(button => {
        button.addEventListener('click', function() {
            if (this.hasAttribute('disabled')) return;

            answerButtons.forEach(btn => btn.classList.remove('selected'));
            this.classList.add('selected');
            chosenInput.value = this.dataset.choice;
        });
    });
});