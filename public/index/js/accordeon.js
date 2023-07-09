class Utils {
    static toggleButton() {
        const question = document.getElementById('question').value;
        if (question.indexOf('?') > -1) {
            document.getElementById('submitButton').classList.remove('disabled');
            document.getElementById('hintQuestion').classList.add('disabled');
        } else {
            document.getElementById('submitButton').classList.add('disabled');
            document.getElementById('hintQuestion').classList.remove('disabled');
        }
        if (question === ''){
            document.getElementById('hintQuestion').classList.add('disabled');
        }
    }
}

