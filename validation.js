document.getElementById('studentForm').addEventListener('submit', function(event) {
    var valid = true;
    var inputs = this.getElementsByTagName('input');
    for (var i = 0; i < inputs.length; i++) {
        if (inputs[i].hasAttribute('pattern') && !inputs[i].value.match(inputs[i].getAttribute('pattern'))) {
            alert('Error: ' + inputs[i].getAttribute('title'));
            valid = false;
            event.preventDefault();
        }
    }
});
