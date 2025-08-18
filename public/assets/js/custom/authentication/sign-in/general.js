"use strict";

// Enable cookies & CSRF with axios for Laravel
axios.defaults.withCredentials = true;
axios.defaults.headers.common["X-Requested-With"] = "XMLHttpRequest";

var KTSigninGeneral = (function () {
    let form, submitButton, validator;

    // Init form validation
    const initValidation = () => {
        validator = FormValidation.formValidation(form, {
            fields: {
                email: {
                    validators: {
                        notEmpty: { message: "Email address is required" },
                        regexp: {
                            regexp: /^[^\s@]+@[^\s@]+\.[^\s@]+$/,
                            message: "Enter a valid email address",
                        },
                    },
                },
                password: {
                    validators: {
                        notEmpty: { message: "Password is required" },
                        stringLength: {
                            min: 6,
                            message: "Password must be at least 6 characters",
                        },
                    },
                },
            },
            plugins: {
                trigger: new FormValidation.plugins.Trigger(),
                bootstrap: new FormValidation.plugins.Bootstrap5({
                    rowSelector: ".fv-row",
                    eleInvalidClass: "",
                    eleValidClass: "",
                }),
            },
        });
    };

    // Handle form submit
    const handleSubmit = () => {
        submitButton.addEventListener("click", function (e) {
            e.preventDefault();

            validator.validate().then(function (status) {
                if (status === "Valid") {
                    submitButton.setAttribute("data-kt-indicator", "on");
                    submitButton.disabled = true;

                    axios
                        .post(form.getAttribute("action"), new FormData(form))
                        .then((response) => {
                            // If Laravel redirected to dashboard
                            if (
                                response.request.responseURL.includes("dashboard")
                            ) {
                                Swal.fire({
                                    text: "You have successfully logged in!",
                                    icon: "success",
                                    buttonsStyling: false,
                                    confirmButtonText: "Ok, got it!",
                                    customClass: {
                                        confirmButton: "btn btn-primary",
                                    },
                                }).then(() => {
                                    window.location.href =
                                        form.getAttribute(
                                            "data-kt-redirect-url"
                                        );
                                });
                            } else {
                                Swal.fire({
                                    text: "Invalid credentials, please try again.",
                                    icon: "error",
                                    buttonsStyling: false,
                                    confirmButtonText: "Ok, got it!",
                                    customClass: {
                                        confirmButton: "btn btn-primary",
                                    },
                                });
                            }
                        })
                        .catch((error) => {
                            let message =
                                error.response?.data?.message ||
                                "An error occurred. Please try again.";
                            Swal.fire({
                                text: message,
                                icon: "error",
                                buttonsStyling: false,
                                confirmButtonText: "Ok, got it!",
                                customClass: {
                                    confirmButton: "btn btn-primary",
                                },
                            });
                        })
                        .finally(() => {
                            submitButton.removeAttribute("data-kt-indicator");
                            submitButton.disabled = false;
                        });
                } else {
                    Swal.fire({
                        text: "Please fill in all required fields correctly.",
                        icon: "error",
                        buttonsStyling: false,
                        confirmButtonText: "Ok, got it!",
                        customClass: { confirmButton: "btn btn-primary" },
                    });
                }
            });
        });
    };

    return {
        init: function () {
            form = document.querySelector("#kt_sign_in_form");
            submitButton = document.querySelector("#kt_sign_in_submit");

            if (!form) return;

            initValidation();
            handleSubmit();
        },
    };
})();

KTUtil.onDOMContentLoaded(function () {
    KTSigninGeneral.init();
});
