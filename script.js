
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

document.addEventListener("DOMContentLoaded", function () {
    const textarea = document.querySelector("textarea");

    if (!textarea) return;

    textarea.addEventListener("input", function () {
        this.style.height = "auto";
        this.style.height = this.scrollHeight + "px";
    });
});