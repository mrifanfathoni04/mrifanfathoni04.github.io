const popup = document.getElementById("popup");
const closeBtn = document.getElementById("close-btn");

popup.style.display = "block";
closeBtn.addEventListener("click", () => {
    popup.style.display = "none";
})