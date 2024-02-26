const signinForm = document.querySelector(".login form"),
signinContinueBtn = signinForm.querySelector(".button input"),
signinErrorText = signinForm.querySelector(".error-text");

signinForm.onsubmit = (e) => {
    e.preventDefault();
}

signinContinueBtn.onclick = () => {
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "php/login.php", true);
    xhr.onload = () => {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
                let data = xhr.response;
                if (data === "success") {
                    location.href = "chat.php";
                } else {
                    signinErrorText.style.display = "block";
                    signinErrorText.textContent = data;
                }
            }
        }
    }
    let formData = new FormData(signinForm);
    xhr.send(formData);
}