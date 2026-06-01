document.querySelectorAll(".toggle-password").forEach((button) => {
    button.addEventListener("click", function () {
        const input = document.getElementById(this.dataset.target);

        const icon = this.querySelector("i");

        if (input.type === "password") {
            input.type = "text";

            icon.classList.remove("bi-eye-slash");
            icon.classList.add("bi-eye");
        } else {
            input.type = "password";

            icon.classList.remove("bi-eye");
            icon.classList.add("bi-eye-slash");
        }
    });
});

document.querySelectorAll(".delete-form").forEach((form) => {
    form.addEventListener("submit", function (e) {
        e.preventDefault();

        Swal.fire({
            title: "Tem certeza?",
            text: "Esse usuário será excluído permanentemente!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#d33",
            cancelButtonColor: "#6c757d",
            confirmButtonText: "Sim, excluir",
            cancelButtonText: "Cancelar",
        }).then((result) => {
            if (result.isConfirmed) {
                form.submit();
            }
        });
    });
});
