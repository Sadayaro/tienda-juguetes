document.addEventListener("DOMContentLoaded", () => {
  const form = document.getElementById("formLogin");
  const emailInput = document.getElementById("email");
  const passwordInput = document.getElementById("password");

  // Validación Bootstrap general
  form.addEventListener("submit", function (event) {
    if (!form.checkValidity()) {
      event.preventDefault();
      event.stopPropagation();
    }

    form.classList.add("was-validated");
  });

  // Validación personalizada de contraseña segura
  passwordInput.addEventListener("input", function () {
    const value = passwordInput.value;
    const strongPassword = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).{6,}$/;

    if (!strongPassword.test(value)) {
      passwordInput.setCustomValidity("La contraseña debe tener al menos 6 caracteres, una mayúscula, una minúscula y un número.");
    } else {
      passwordInput.setCustomValidity("");
    }
  });
});