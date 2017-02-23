var validation = (function validation() {

    return {

        init: function () {

            $('form').on('change', 'select', function () {
                $(this).valid();
            });

            $.validator.setDefaults({ignore: ":hidden:not(select)"});

            var validator = $('#userForm').validate({

                submitHandler: function (form) {

                    $.ajax({
                        url: form.action,
                        type: form.method,
                        data: $(form).serialize(),
                        success: function (response) {
                            var data = JSON.parse(response);

                            if (data[0] != "false") {
                                $('.message').html('<b>User was added.</b>');
                                console.log('user was added');
                            } else {
                                $('.message').html('<b>User with such email already exsists: ' + data[1].name + ', "' + data[1].email + '", ' + data[1].territory + '</b>');
                                console.log('email was already taken');
                            }
                        }
                    });

                }
            });

        }

    }

})();