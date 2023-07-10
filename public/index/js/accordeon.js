class Utils {
    static gbCanSubmit = false;
    static toggleButton() {

        const question = document.getElementById('question').value;
        if (question.indexOf('?') > -1) {
            document.getElementById('submitButton').classList.remove('disabled');
            document.getElementById('hintQuestion').classList.add('disabled');
            this.gbCanSubmit = true
        } else {
            document.getElementById('submitButton').classList.add('disabled');
            document.getElementById('hintQuestion').classList.remove('disabled');
            this.gbCanSubmit = false
        }
        if (question === ''){
            document.getElementById('hintQuestion').classList.add('disabled');
            this.gbCanSubmit = true
        }
    }
}

