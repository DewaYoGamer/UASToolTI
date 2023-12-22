var nimField = document.getElementById('nim');
var error = document.getElementById('nimError');

nimField.addEventListener('blur', function() {
    // Check if the NIM is less than 10 digits
    if (this.value.length < 10) {
        // If it is, show the error message
        error.style.display = 'block';
    }
});

nimField.addEventListener('input', function() {
    // Check if the NIM is 10 digits
    if (this.value.length === 10) {
        // If it is, hide the error message
        error.style.display = 'none';
    }
});

window.onload = function() {
    document.getElementById('searchForm').addEventListener('submit', function(e) {
        var nim = document.getElementById('nim');
        if (nim.value.length < 10) {
            e.preventDefault();
            document.getElementById('nimError').style.display = 'block';
        }
    });
};