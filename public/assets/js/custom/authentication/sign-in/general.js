"use strict";

var KTSigninGeneral = (function () {
    var form, submitButton;

    return {
        init: function () {
            form = document.querySelector("#kt_sign_in_form");
            submitButton = document.querySelector("#kt_sign_in_submit");

            // Form validation
            var validator = FormValidation.formValidation(form, {
                fields: {
                    email: {
                        validators: {
                            notEmpty: { message: "Email is required" },
                            regexp: {
                                regexp: /^[^\s@]+@[^\s@]+\.[^\s@]+$/,
                                message: "Please enter a valid email address"
                            }
                        }
                    },
                    password: {
                        validators: {
                            notEmpty: { message: "Password is required" }
                        }
                    }
                },
                plugins: {
                    trigger: new FormValidation.plugins.Trigger(),
                    bootstrap5: new FormValidation.plugins.Bootstrap5({
                        rowSelector: ".fv-row"
                    })
                }
            });

            // Submit handler
            submitButton.addEventListener("click", function (e) {
                e.preventDefault();

                validator.validate().then(function (status) {
                    if (status === "Valid") {
                        submitButton.setAttribute("data-kt-indicator", "on");
                        submitButton.disabled = true;

                        let formData = new FormData(form);

                        axios.post(form.getAttribute("action"), formData, {
                            headers: {
                                "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').getAttribute("content"),
                                "Accept": "application/json"
                            }
                        })
                            .then(function (response) {
                                submitButton.removeAttribute("data-kt-indicator");
                                submitButton.disabled = false;

                                if (response.data.success) {
                                    Swal.fire({
                                        text: response.data.message,
                                        icon: "success",
                                        confirmButtonText: "Ok"
                                    }).then(function () {
                                        window.location.href = response.data.redirect ?? "/dashboard";
                                    });
                                } else {
                                    Swal.fire({
                                        text: response.data.message || "Invalid login credentials.",
                                        icon: "error",
                                        confirmButtonText: "Try Again"
                                    });
                                    form.querySelector('[name="password"]').value = ""; // clear password field
                                }
                            })
                            .catch(function (error) {
                                submitButton.removeAttribute("data-kt-indicator");
                                submitButton.disabled = false;

                                Swal.fire({
                                    text: error.response?.data?.message || "Something went wrong. Please try again.",
                                    icon: "error",
                                    confirmButtonText: "Ok"
                                });
                                form.querySelector('[name="password"]').value = ""; // clear password field
                            });
                    } else {
                        Swal.fire({
                            text: "Please fill all required fields correctly.",
                            icon: "error",
                            confirmButtonText: "Ok"
                        });
                    }
                });
            });
        }
    };
})();

// On document ready
KTUtil.onDOMContentLoaded(function () {
    KTSigninGeneral.init();
});
