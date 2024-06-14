import "./bootstrap";

import * as bootstrap from "bootstrap";

// Login Show Password Start
document.getElementById("showPassword").addEventListener("change", function () {
    const passwordInput = document.getElementById("passwordInput");
    if (this.checked) {
        passwordInput.type = "text";
    } else {
        passwordInput.type = "password";
    }
});
// Login Show Password End

window.onload = function () {
    const allAlerts = document.querySelectorAll(".alert");

    for (const alertElement of allAlerts) {
        setTimeout(() => {
            alertElement.classList.add("d-none");
        }, 3000);
    }
};
