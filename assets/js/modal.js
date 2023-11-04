// Get the modal
var modal = document.getElementById('login');

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}

var modalAdmin = document.getElementById('loginAdmin');

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modalAdmin) {
        modalAdmin.style.display = "none";
    }
}