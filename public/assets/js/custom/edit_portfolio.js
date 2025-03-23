"use strict";
var KTPortfolioForm = function () {
    var form, submitButton, validator;
    return {
        init: function () {
            form = document.querySelector("#kt_ecommerce_edit_coupon_form");
            submitButton = document.querySelector("#kt_ecommerce_edit_coupon_submit");
            validator = FormValidation.formValidation(form, {
                fields: {
                    name: {
                        validators: {
                            notEmpty: {
                                message: "اسم المحفظة مطلوب"
                            }
                        }
                    },
                    investment_amount: {
                        validators: {
                            notEmpty: {
                                message: "المبلغ الإستثماري مطلوب"
                            },
                            numeric: {
                                message: "يجب أن يكون المبلغ الإستثماري رقم صحيح"
                            },
                            greaterThan: {
                                min: 0,
                                message: "يجب أن يكون مبلغ الاستثمار على الأقل 0."
                            }
                        }
                    },
                    status: {
                        validators: {
                            notEmpty: {
                                message: "حالة المحفظة مطلوبة"
                            }
                        }
                    }
                },
                plugins: {
                    trigger: new FormValidation.plugins.Trigger(),
                    bootstrap: new FormValidation.plugins.Bootstrap5({
                        rowSelector: ".fv-row",
                        eleInvalidClass: "",
                        eleValidClass: ""
                    })
                }
            });

            submitButton.addEventListener("click", function (e) {
                e.preventDefault();
                validator.validate().then(function (status) {
                    if (status === "Valid") {
                        submitButton.setAttribute("data-kt-indicator", "on");
                        submitButton.disabled = true;

                        let formData = new FormData(form);
                        let updateUrl = form.getAttribute("action");

                        axios.post(updateUrl, formData)
                            .then(function (response) {
                                Swal.fire({
                                    text: response.data.text,
                                    icon: response.data.icon,
                                    confirmButtonText: response.data.confirmButtonText,
                                    customClass: { confirmButton: "btn btn-primary" }
                                }).then(() => {
                                    var redirectUrl = form.getAttribute("data-kt-redirect");
                                    if (redirectUrl) {
                                        location.href = redirectUrl;
                                    }
                                });
                            })
                            .catch(function (error) {
                                if (error.response && error.response.status === 422) {
                                    var errors = error.response.data.errors;
                                    Object.keys(errors).forEach(function (key) {
                                        var errorMessage = errors[key][0];
                                        var errorElement = document.getElementById(`${key}-error`);
                                        if (errorElement) {
                                            errorElement.textContent = errorMessage;
                                        }
                                    });
                                    Swal.fire({
                                        text: error.response.data.text,
                                        icon: error.response.data.icon,
                                        confirmButtonText: error.response.data.confirmButtonText,
                                        customClass: { confirmButton: "btn btn-primary" }
                                    });
                                } else {
                                    Swal.fire({
                                        text: "حدث خطأ. يرجى المحاولة مرة أخرى.",
                                        icon: "error",
                                        confirmButtonText: "حسنًا، فهمت!",
                                        customClass: { confirmButton: "btn btn-primary" }
                                    });
                                }
                            })
                            .finally(() => {
                                submitButton.removeAttribute("data-kt-indicator");
                                submitButton.disabled = false;
                            });
                    } else {
                        Swal.fire({
                            text: "يرجى تصحيح الأخطاء المميزة والمحاولة مرة أخرى.",
                            icon: "error",
                            confirmButtonText: "حسنًا، فهمت!",
                            customClass: { confirmButton: "btn btn-primary" }
                        });
                    }
                });
            });
        }
    };
}();

KTUtil.onDOMContentLoaded(function () {
    KTPortfolioForm.init();
});
