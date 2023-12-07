// Đối tượng `Validator`
function Validator(options) {
    function getParent(element, selector) {
        while (element.parentElement) {
            if (element.parentElement.matches(selector)) {
                return element.parentElement;
            }
            element = element.parentElement;
        }
    }

    var selectorRules = {};

    // Hàm thực hiện validate
    function validate(inputElement, rule) {
        var errorElement = getParent(inputElement, options.formGroupSelector).querySelector(options.errorSelector);
        var errorMessage;

        // Lấy ra các rules của selector
        var rules = selectorRules[rule.selector];

        // Lặp qua từng rule & kiểm tra
        // Nếu có lỗi thì dừng việc kiểm
        for (var i = 0; i < rules.length; ++i) {
            switch (inputElement.type) {
                case 'radio':
                case 'checkbox':
                    errorMessage = rules[i](
                        formElement.querySelector(rule.selector + ':checked')
                    );
                    break;
                default:
                    errorMessage = rules[i](inputElement.value);
            }
            if (errorMessage) break;
        }

        if (errorMessage) {
            errorElement.innerText = errorMessage;
            getParent(inputElement, options.formGroupSelector).classList.add('invalid');
            inputElement.classList.add('is-invalid');
        } else {
            errorElement.innerText = '';
            getParent(inputElement, options.formGroupSelector).classList.remove('invalid');
            inputElement.classList.remove('is-invalid');
            // inputElement.classList.add('is-valid');
        }

        return !errorMessage;
    }

    // Lấy element của form cần validate
    var formElement = document.querySelector(options.form);
    if (formElement) {
        formElement.onsubmit = function (e) {
            e.preventDefault();

            var isFormValid = true;
            var errorTab = null;

            if (options.tabs) {
                var hasError = false; // To track if there's an error

                options.rules.forEach(function (rule) {
                    var inputElement = formElement.querySelector(rule.selector);
                    var isValid = validate(inputElement, rule);
                    if (!isValid && !errorTab) {
                        hasError = true; // Set the hasError flag
                        isFormValid = false;
                        // Remove 'active' class from the current active tab link
                        var activeTabLink = formElement.querySelector('.nav-link.active');
                        if (activeTabLink) {
                            activeTabLink.classList.remove('active');
                        }

                        errorTab = inputElement.closest('.tab-pane');
                    }
                });
                // Remove 'show' and 'active' classes from all tabs
                var allTabs = formElement.querySelectorAll('.tab-pane');
                allTabs.forEach(function (tab) {
                    tab.classList.remove('show', 'active');
                });

                if (errorTab) {
                    // Activate and show only the tab with errors
                    errorTab.classList.add('show', 'active');

                    // Activate the corresponding tab link in the <ul> by its aria-controls attribute
                    var tabLink = formElement.querySelector('[aria-controls="' + errorTab.id + '"]');
                    if (tabLink) {
                        tabLink.classList.add('active');
                    }
                }

                // Scroll to the top of the page if there's an error
                if (hasError) {
                    window.scrollTo({
                        top: 0,
                        behavior: 'smooth'
                    });
                }
            } else {
                // Validation for non-tabbed form
                options.rules.forEach(function (rule) {
                    var inputElement = formElement.querySelector(rule.selector);
                    var isValid = validate(inputElement, rule);
                    if (!isValid) {
                        isFormValid = false;
                    }
                });
            }


            if (isFormValid) {

                if (typeof options.onSubmit === 'function') {
                    var enableInputs = formElement.querySelectorAll('[name]');
                    var formValues = Array.from(enableInputs).reduce(function (values, input) {

                        switch (input.type) {
                            case 'radio':
                                values[input.name] = formElement.querySelector('input[name="' + input.name + '"]:checked').value;
                                break;
                            case 'checkbox':
                                if (!input.matches(':checked')) {
                                    values[input.name] = '';
                                    return values;
                                }
                                if (!Array.isArray(values[input.name])) {
                                    values[input.name] = [];
                                }
                                values[input.name].push(input.value);
                                break;
                            case 'file':
                                values[input.name] = input.files;
                                break;
                            default:
                                values[input.name] = input.value;
                        }

                        return values;
                    }, {});
                    options.onSubmit(formValues, e);
                } else {
                    formElement.submit();
                }
            }
        }

        options.rules.forEach(function (rule) {

            if (Array.isArray(selectorRules[rule.selector])) {
                selectorRules[rule.selector].push(rule.test);
            } else {
                selectorRules[rule.selector] = [rule.test];
            }

            var inputElements = formElement.querySelectorAll(rule.selector);

            Array.from(inputElements).forEach(function (inputElement) {
                inputElement.onblur = function () {
                    validate(inputElement, rule);
                }

                inputElement.oninput = function () {
                    var errorElement = getParent(inputElement, options.formGroupSelector).querySelector(options.errorSelector);
                    errorElement.innerText = '';
                    getParent(inputElement, options.formGroupSelector).classList.remove('invalid');
                    inputElement.classList.remove('is-invalid');
                }
            });
        });
    }

    //Clear error when closing modal
    const modalElement = document.querySelector(options.modal);
    if (modalElement) {
        modalElement.addEventListener('hidden.bs.modal', () => {
            options.rules.forEach((rule) => {
                const inputElement = document.querySelector(rule.selector);
                const errorElement = getParent(inputElement, options.formGroupSelector).querySelector(options.errorSelector);
                errorElement.innerText = '';
                getParent(inputElement, options.formGroupSelector).classList.remove('invalid');
                inputElement.classList.remove('is-invalid');
            });
        });
    }

}

ValidatorFormsModal = (options) => {
    const modalGroup = document.querySelector(options.modalGroup);
    const modalElements = modalGroup.querySelectorAll(options.modalEles);
    modalElements.forEach((modalEle, key) => {
        const getIdFormElement = modalEle.querySelector('form').getAttribute('id');
        const getIdModalElement = modalEle.getAttribute('id');
        Validator({
            form: `#${getIdFormElement}`,
            formGroupSelector: '.form-group',
            errorSelector: '.form-message',
            modal: `#${getIdModalElement}`,
            rules: options.rules,
        });
    })
}

Validator.isRequired = function (selector, message) {
    return {
        selector: selector,
        test: function (value) {
            return value ? undefined : message || 'Vui lòng nhập trường này'
        }
    };
}

Validator.isEmail = function (selector, message) {
    return {
        selector: selector,
        test: function (value) {
            var regex = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
            return regex.test(value) ? undefined : message || 'Trường này phải là email';
        }
    };
}

Validator.minLength = function (selector, min, message) {
    return {
        selector: selector,
        test: function (value) {
            return value.length >= min ? undefined : message || `Vui lòng nhập tối thiểu ${min} kí tự`;
        }
    };
}

Validator.isConfirmed = function (selector, getConfirmValue, message) {
    return {
        selector: selector,
        test: function (value) {
            return value === getConfirmValue() ? undefined : message || 'Giá trị nhập vào không chính xác';
        }
    }
}

Validator.isNumber = function (selector, message) {
    return {
        selector: selector,
        test: function (value) {
            if (value.length === 0) {
                return message || 'Không được bỏ trống';
            }

            if (isNaN(value)) {
                return message || '* Vui lòng nhập số !';
            }

            if (value < 1) {
                return message || '* Số lớn hơn 0 !';
            }
        }
    }
}

Validator.isDiscount = function (selector, getCost, message) {
    return {
        selector: selector,
        test: function (value) {
            if (isNaN(value)) {
                return '* Vui lòng nhập số !';
            }

            if (getCost()) {
                if (value >= getCost()) {
                    return message || '* Giá giảm phải nhỏ hơn giá gốc !';
                }
            }
        }
    }
}

Validator.isEmail = function (selector, message) {
    return {
        selector: selector,
        test: function (value) {

            let regex = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
            if (!regex.test(value)) {
                return message || "* Vui lòng nhập email !";
            }

        }
    }
}

Validator.isPhone = function (selector, message) {
    return {
        selector: selector,
        test: function (value) {

            let regex = /^(0|\+84)(\s|\.)?((3[2-9])|(5[689])|(7[06-9])|(8[1-689])|(9[0-46-9]))(\d)(\s|\.)?(\d{3})(\s|\.)?(\d{3})$/;
            if (!regex.test(value)) {
                return message || "* Số điện thoại không hợp lệ !";
            }

        }
    }
}
Validator.isPhoneNumber = function (selector, message) {
    return {
        selector: selector,
        test: function (value) {
            // Kiểm tra xem giá trị có phải là số và có đúng 10 chữ số không
            if (!/^\d{10}$/.test(value)) {
                return message || 'Số điện thoại phải đủ 10 số';
            }

            // Kiểm tra xem số đầu tiên có phải là 0 không
            if (value.charAt(0) !== '0') {
                return message || 'Số điện thoại phải bắt đầu bằng số 0';
            }

            // Nếu giá trị hợp lệ, trả về undefined (không có lỗi)
            return undefined;
        }
    };
};

//  kiểm tra giá tiền
// kiểm tra giá tiền phải lớn hơn 0
Validator.isGreaterThanZero = function (selector, message) {
    return {
        selector: selector,
        test: function (value) {
            // Kiểm tra xem giá trị có phải là số và lớn hơn 0 không
            if (value.trim() === '' || isNaN(value) || parseFloat(value) <= 0) {
                return message || 'Giá tiền không hợp lệ';
            }

            // Nếu giá trị hợp lệ, trả về undefined (không có lỗi)
            return undefined;
        }
    };
}
Validator.isDiscountPercentage = function (selector, getCost, message) {
    return {
        selector: selector,
        test: function (value) {
            // Kiểm tra xem giá trị có phải là số và lớn hơn 0 không
            if (value.trim() === '' || isNaN(value) || parseFloat(value) <= 0) {
                return message || 'Giảm giá phải > 0 và < 100';
            }

            // Kiểm tra giảm giá có nằm trong khoảng 0 - 100 không
            if (parseFloat(value) >= 100) {
                return message || 'Giảm giá phải > 0 và < 100';
            }

            // Nếu giá trị hợp lệ, trả về undefined (không có lỗi)
            return undefined;
        }
    };
};

Validator.isDateBeforeNow = function (selector, message) {
    return {
        selector: selector,
        test: function (value) {
            // Chuyển đổi giá trị ngày thành đối tượng Date
            var selectedDate = new Date(value);
            // Lấy ngày hiện tại
            var currentDate = new Date();

            // Kiểm tra xem ngày đã chọn có phải là ngày trong quá khứ không
            if (selectedDate < currentDate) {
                return message || 'Ngày phải là ngày trong tương lai';
            }

            // Nếu giá trị hợp lệ, trả về undefined (không có lỗi)
            return undefined;
        }
    };
};

Validator.isTimeWithinRange = function (selector, message) {
    return {
        selector: selector,
        test: function (value) {
            // Chuyển đổi giá trị giờ thành số
            var selectedTime = parseFloat(value);

            // Kiểm tra xem giờ đã chọn có nằm trong khoảng từ 8h sáng đến 10h tối không
            if (selectedTime >= 8 && selectedTime <= 22) {
                return undefined; // Nếu giá trị hợp lệ, trả về undefined (không có lỗi)
            } else {
                return message || 'Giờ phải nằm trong khoảng từ 8h sáng đến 10h tối';
            }
        }
    };
};





