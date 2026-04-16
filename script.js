
function logoutUser() {
    fetch('logout.php');

    const popup = document.getElementById("logoutPopup");

    if (!popup) {
        console.log("Popup not found");
        return;
    }

    popup.style.display = "block";

    setTimeout(() => {
        popup.style.display = "none";
        window.location.href = "index.php";
    }, 1000);
}
