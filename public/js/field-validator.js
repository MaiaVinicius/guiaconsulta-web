/**
 * Created by Vinicius on 07/02/2017.
 */
"use strict";

var FieldValidator = function () {

    this.isCNPJValid = function (cnpj) {

        cnpj = cnpj.replace(/[^\d]+/g, "");
        if (cnpj.length !== 14 || cnpj === "") {
            return false;
        }
        // Elimina CNPJs invalidos conhecidos
        if (cnpj === "00000000000000" ||
            cnpj === "11111111111111" ||
            cnpj === "22222222222222" ||
            cnpj === "33333333333333" ||
            cnpj === "44444444444444" ||
            cnpj === "55555555555555" ||
            cnpj === "66666666666666" ||
            cnpj === "77777777777777" ||
            cnpj === "88888888888888" ||
            cnpj === "99999999999999") {
            return false;
        }


        // Valida DVs
        var tamanho = cnpj.length - 2,
            numeros = cnpj.substring(0, tamanho),
            digitos = cnpj.substring(tamanho),
            soma = 0,
            pos = tamanho - 7;

        for (var i = tamanho; i >= 1; i--) {
            soma += parseInt(numeros.charAt(tamanho - i)) * pos--;
            if (pos < 2) {
                pos = 9;
            }
        }

        var resultado = soma % 11 < 2 ? 0 : 11 - soma % 11;
        if (resultado !== parseInt(digitos.charAt(0))) {
            return false;
        }

        tamanho = tamanho + 1;
        numeros = cnpj.substring(0, tamanho);
        soma = 0;

        pos = tamanho - 7;
        for (i = tamanho; i >= 1; i--) {
            soma += numeros.charAt(tamanho - i) * pos--;
            if (pos < 2) {
                pos = 9;
            }
        }

        resultado = soma % 11 < 2 ? 0 : 11 - soma % 11;
        return (resultado === parseInt(digitos.charAt(1)));
    };

    this.isCPFValid = function (cpf) {
        cpf = cpf.replace(/[^\d]+/g, "");
        if (cpf === "") {
            return false;
        }
        // Elimina CPFs invalidos conhecidos
        if (cpf.length !== 11 ||
            cpf === "00000000000" ||
            cpf === "11111111111" ||
            cpf === "22222222222" ||
            cpf === "33333333333" ||
            cpf === "44444444444" ||
            cpf === "55555555555" ||
            cpf === "66666666666" ||
            cpf === "77777777777" ||
            cpf === "88888888888" ||
            cpf === "99999999999") {
            return false;
        }
        // Valida 1o digito
        var add = 0;
        for (var i = 0; i < 9; i++) {
            add += parseInt(cpf.charAt(i)) * (10 - i);
        }
        var rev = 11 - (add % 11);
        if (rev === 10 || rev === 11) {
            rev = 0;
        }
        if (rev !== parseInt(cpf.charAt(9))) {
            return false;
        }
        // Valida 2o digito
        add = 0;
        for (i = 0; i < 10; i++) {
            add += parseInt(cpf.charAt(i)) * (11 - i);
        }
        rev = 11 - (add % 11);
        if (rev === 10 || rev === 11) {
            rev = 0;
        }

        return (rev === parseInt(cpf.charAt(10)));
    };

    this.isDateValid = function (date) {
        var splitDate = date.split("/"),
            dd = parseInt(splitDate[0]),
            mm = parseInt(splitDate[1]),
            yyyy = parseInt(splitDate[2]),
            len = date.length;

        return !(mm > 12 || dd > 31) && (len === 10);
    };

    this.isEmailAddressValid = function (email) {
        var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
        return re.test(email);
    };

    this.isPhoneNumberValid = function (phone) {
        if (
            phone === "(00) 00000-0000" ||
            phone === "(11) 11111-1111" ||
            phone === "(22) 22222-2222" ||
            phone === "(33) 33333-3333" ||
            phone === "(44) 44444-4444" ||
            phone === "(55) 55555-5555" ||
            phone === "(66) 66666-6666" ||
            phone === "(77) 77777-7777" ||
            phone === "(88) 88888-8888" ||
            phone === "(99) 99999-9999" ||
            phone === "000000000000000" ||
            phone === "111111111111111" ||
            phone === "222222222222222" ||
            phone === "333333333333333" ||
            phone === "444444444444444" ||
            phone === "555555555555555" ||
            phone === "666666666666666" ||
            phone === "777777777777777" ||
            phone === "888888888888888" ||
            phone === "999999999999999" ||
            phone === "(00) 0000-0000" ||
            phone === "(11) 1111-1111" ||
            phone === "(22) 2222-2222" ||
            phone === "(33) 3333-3333" ||
            phone === "(44) 4444-4444" ||
            phone === "(55) 5555-5555" ||
            phone === "(66) 6666-6666" ||
            phone === "(77) 7777-7777" ||
            phone === "(88) 8888-8888" ||
            phone === "(99) 9999-9999"
        ) {
            return false;
        }

        var len = 14;
        if (phone.match(/ /) === null) {
            len = 11;
        }

        return (phone.length >= len);
    };

    this.validateCrm = function (crm) {
        return true;
    };

    var parent = this,
        for9DigitsMaskBehavior = function (val) {
            val = val.replace(/\D/g, "")
                .length === 11 ? "(00) 00000-0000" : "(00) 0000-00009";
            return val;
        },
        for9DigitsOptions = {
            onKeyPress: function (val, e, field, options) {
                field.mask(for9DigitsMaskBehavior.apply({}, arguments), options);
            }
        };

    var fields = {
        "cadastro-conselho": {
            "selector": ".crm",
            // "validateFunction": this.validateCrm,
            // "mask": "52-000000"
        },
        "required": {
            "selector": ":input[required]",
            "error": "Campo obrigatório!"
        },
        "cep": {
            "selector": ".cep",
            "error": "Cep inválido!",
            "mask": "00000-000"
        },
        "cnae": {
            "selector": ".cnae",
            "error": "CNAE inválido!",
            "mask": "0000-00/00"
        },
        "cpf": {
            "selector": ".cpf",
            "error": "CPF inválido!",
            "mask": "000.000.000-00",
            "validateFunction": this.isCPFValid,
            "attrs": {
                "autocomplete": false,
                "autocorrect": "off",
                "autocapitalize": "off",
                "spellcheck": false
            }
        },
        "cpf-cnpj": {
            "selector": ".cpf-cnpj",
            "error": "Campo inválido!",
            "exec": function ($selector) {

            }
            /*"mask": {
             "behavior": for9DigitsMaskBehavior,
             "options": for9DigitsOptions
             }*/
        },
        "uf": {
            "selector": ".uf",
            "error": "Estado UF inválido!",
            "regex": "[A-Za-z]{2}",
            "max": "2",
            "info": "Deve estar no formato de UF. &nbsp;&nbsp;&nbsp;Ex: RJ, DF, SP."
        },
        "cnpj": {
            "selector": ".cnpj",
            "error": "CNPJ inválido!",
            "mask": "00.000.000/0000-00",
            "validateFunction": this.isCNPJValid,
            "attrs": {
                "autocomplete": "off",
                "autocorrect": "off",
                "autocapitalize": "off",
                "spellcheck": false
            }
        },
        "birthdate": {
            "selector": ".birthdate",
            "error": "Data de nascimento inválida!",
            "mask": "00/00/0000",
            "validateFunction": this.isDateValid
        },
        "date": {
            "selector": ".date",
            "error": "Data inválida!",
            "mask": "00/00/0000",
            "validateFunction": this.isDateValid
        },
        "time": {
            "selector": ".time",
            "error": "Hora inválida!",
            "mask": "00:00"
        },
        "phone": {
            "selector": ".phone",
            "error": "Telefone inválido!",
            "mask": {
                "behavior": for9DigitsMaskBehavior,
                "options": for9DigitsOptions
            },
            "validateFunction": this.isPhoneNumberValid
        },
        "email": {
            "selector": "input[type='email']",
            "error": "Endereço de email inválido!",
            "validateFunction": this.isEmailAddressValid
        }
    };

    var notFormControlString = function () {
        var result = [];
        $.each(fields, function (i, val) {
            result.push(val.selector);
        });

        return result.join(",");
    };

    function addDefaultField() {
        fields.default = {
            "selector": ".form-control",
            "notSelector": notFormControlString(),
            "error": "Campo inválido!",
            "isDefault": true
        };
    }

    addDefaultField();

    this.apply = function () {
        $.each(fields, function (i, val) {
            if (typeof val.mask !== "undefined") {
                if (typeof val.mask === "object") {
                    $(val.selector).mask(val.mask.behavior, val.mask.options);
                } else {
                    $(val.selector).mask(val.mask);
                }
            }
            var $selector = $(val.selector);

            if (typeof val.info !== "undefined") {
                var text = '  <i data-toggle="tooltip" title="' + val.info + '" class="fa fa-info-circle" aria-hidden="true"></i>';
                $selector.parents(".form-group").find(".control-label").after(text);
            }

            if (typeof val.max !== "undefined") {
                $selector.attr("maxlength", val.max);
            }

            if (typeof val.regex !== "undefined") {
                $selector.attr("pattern", val.regex);
            }

            if (typeof val.attrs !== "undefined") {
                $.each(val.attrs, function (attr, val) {
                    $selector.attr(attr, val);
                });
            }

            if (typeof val.exec !== "undefined") {
                val.exec($selector);
            }

            if (typeof val.validateFunction !== "undefined") {

                parent.delegateFields($selector, val.validateFunction);
            } else {
                if (typeof val.notSelector !== "undefined") {
                    $selector = $selector.not(val.notSelector);
                }
                parent.delegateFields($selector);
            }
        });
    };

    this.delegateFields = function ($field, validator) {
        $field.on("change", function () {
            var $field = $(this),
                isRequired = $field.prop("required"),
                value = $field.val();

            if (typeof validator !== "undefined") {
                if (validator(value)) {
                    changeFieldStatus($field, 1);
                } else {
                    if (value === "" || value === " ") {
                        changeFieldStatus($field, null);
                    } else {
                        changeFieldStatus($field, -1);
                    }
                }
            } else {
                validateField($field);
            }
        }).on("keydown", function (e) {
            var $field = $(this),
                parent = this,
                fieldLength = $field.val().length,
                maxlength = parseInt($field.attr("maxlength"));

            if (typeof maxlength !== 'undefined') {
                if (maxlength === (fieldLength + 1)) {
                    setTimeout(function () {
                        $field.trigger("change");
                        var inputs = $field.closest('form').find(':input'),
                            $nextInput = inputs.eq(inputs.index(parent) + 1),
                            nextInputVal = $nextInput.val();

                        if ($nextInput.hasClass("form-control") && nextInputVal === "" && (e.keyCode >= 48 && e.keyCode <= 57) || (e.keyCode >= 96 && e.keyCode <= 105)) {
                            $nextInput.focus();
                        }
                    }, 5);
                }
            }
        });
    };

    var changeFieldStatus = function ($field, status) {
        //status 1 = success
        //status -1 = error
        //status 0 = warning

        /** @type {string} */
        var success = "has-success ",
            /** @type {string} */
            warning = "has-warning ",
            /** @type {string} */
            error = "has-error ",
            $formGroup = $field.parents(".form-group");

        switch (status) {
            case -1:
                $formGroup.addClass(error)
                    .removeClass(success + warning);
                break;
            case 0:
                $formGroup.addClass(warning)
                    .removeClass(success + error);
                break;
            case 1:
                $formGroup.addClass(success)
                    .removeClass(warning + error).find(".state-error").remove();
                break;
            case null:
                $formGroup.removeClass(warning + error + success).find(".state-error").remove();
                break;
        }
    };

    var validateField = function ($field) {
        if ($field.hasClass("form-group")) {
            $field = $field.find("form-control");
        }

        var val = $field.val(),
            isRequired = $field.attr("required") === "required";

        if (val === '') {
            if (isRequired) {
                changeFieldStatus($field, -1);
            } else {
                changeFieldStatus($field, null);
            }
        } else {
            changeFieldStatus($field, 1);
        }
    };

    var scrollToElement = function ($element) {
        if ($element.offset()) {
            $('html, body').animate({
                scrollTop: $element.offset().top - 55
            }, 600);
        }
    };

    function validateMinMaxLength($field) {
        var val = $field.val();
        if (val) {
            var valLength = val.length,
                min = $field.attr("minlength"),
                max = $field.attr("maxlength"),
                attrIsSet = function (attr) {
                    return typeof attr !== "undefined";
                };
            return ((attrIsSet(min) && valLength >= min) || !attrIsSet(min)) && ((attrIsSet(max) && valLength <= max) || !attrIsSet(max));
        } else {
            return true;
        }
    }

    this.isValidForm = function ($form, hiddenForm) {
        var $formGroup = $form.find(".form-group"),
            $fields = $form.find(":input:visible, select"),
            scrolled = false,
            success = true;

        if (typeof hiddenForm !== "undefined" && hiddenForm === true) {
            $fields = $form.find(":input, select");
        }

        $formGroup.not(".has-error").find(".state-error").remove();
        //required
        $fields.each(function () {
            var $field = $(this),
                value = $field.val(),
                $formGroup = $field.parents(".form-group"),
                isRequired = $field.prop("required"),
                fieldName = $field.attr("name"),
                status = 0,
                msg = false,
                hasError = $formGroup.hasClass("has-error");

            if ($field.data('select2')) {
                var fieldLabel = "select2-" + $field.attr("id") + "-container",
                    $select2field = $form.find("span[aria-labelledby='" + fieldLabel + "']");

                if (!$select2field.is(":visible") && !hiddenForm) {
                    return true;
                }
            }

            if ($field.val() === "" && isRequired) {
                status = -1;
            }

            if (typeof $field.attr("pattern") !== "undefined") {
                var re = new RegExp($field.attr("pattern"));
                if (!re.test(value)) {
                    status = -1;
                }
            }


            if (!validateMinMaxLength($field)) {
                var min = $field.attr("minlength"),
                    max = $field.attr("maxlength");

                msg = "Campo deve ter de " + min + " a " + max + " caractéres.";
                status = -1;
            }

            if (hasError) {
                status = -1;
            }

            if (status === -1) {
                success = false;
                addErrorMessage($formGroup, -1, msg);
            } else {
                $field.change();
            }

            if (!success && !scrolled) {
                scrollToElement($formGroup);
                scrolled = true;
            }
        });

        return success;
    };

    var getSelectorByDom = function ($dom) {
        var result = "";
        $.each(fields, function (i, val) {
            if ($dom.is(val.selector) && typeof val.isDefault !== "boolean") {
                result = val;
            }
        });

        return result;
    };

    function addErrorMessage($formGroup, state, msg) {
        var errorMessage = msg === false ? getSelectorByDom($formGroup.find(".form-control")).error : msg;
        var stateHtml = "<em class=\"state-error\">" + errorMessage + "</em>";

        if (!$formGroup.hasClass("has-error")) {
            $formGroup.addClass("has-error");
        }

        if ($formGroup.find(".state-error").length === 0) {
            $formGroup.append(stateHtml);
        }
    }

    this.resetForm = function ($form) {
        // this.apply();
        $form.find("select[tabindex='-1']").val(null).change();

        $form.find(".form-group").removeClass("has-success has-error has-warning");
        $form.get(0).reset();
    };

    this.apply();

    function isMobile() {
        return window.innerWidth <= 800 && window.innerHeight <= 600;
    }

    var isIphone = /iPhone|iPad|iPod/i.test(navigator.userAgent);

    if (jQuery().select2 && !isIphone) {
        //run plugin dependent code
        var selects = $("select");

        selects.each(function () {
            var $select = $(this),
                placeholder = $select.attr("placeholder"),
                numberOfOptions = $select.find("option").length,
                options = {
                    placeholder: placeholder !== "undefined" ? placeholder : "",
                    // allowClear: true
                };

            if (numberOfOptions <= 3) {
                if (isMobile()) {
                    $select.filter("option:first").text("Selecione");
                    return true;
                } else {
                    options.minimumResultsForSearch = Infinity;
                }
            }

            $select.select2(options, null).focus(function () {
                $(this).select2('focus');
            });
        });
    }

    $('[data-toggle="tooltip"]').tooltip();
};