$(document).ready(function () {
    $(function() {
        $('.navbar-left-btn').on('click', function() {
            $('.navbar-left').toggleClass('slide-right');
            $('.slide-wrapper').toggleClass('slide-right');
        });
    });

    $(function() {
        $('.navbar-right-login-btn').on('click', function() {
            if($('.navbar-right-register').hasClass('slide-left')) {
                $('.navbar-right-login').toggleClass('slide-left');
                $('.navbar-right-register').toggleClass('slide-left');
            } else {
                $('.navbar-right-login').toggleClass('slide-left');
                $('.slide-wrapper').toggleClass('slide-left');
            }
        });
    });

    $(function() {
        $('.navbar-right-register-btn').on('click', function() {
            if($('.navbar-right-login').hasClass('slide-left')) {
                $('.navbar-right-register').toggleClass('slide-left');
                $('.navbar-right-login').toggleClass('slide-left');
            } else {
                $('.navbar-right-register').toggleClass('slide-left');
                $('.slide-wrapper').toggleClass('slide-left');
            }
        });
    });

    $(function() {
        $('.reset-form-btn').on('click', function() {
            $(this).closest('form').find('input[type=text], input[type=email], input[type=password]').val('');
        });
    });

    $(function () {
        $('.navbar-left .nav-item.group .second-level').hide();
        $('.navbar-left .nav-item.group .second-level .nav-item.group .third-level').hide();
        $('.navbar-left .nav-item.group .second-level-button').click(function() {
            $(this).next('.navbar-left .nav-item.group .second-level').slideToggle('slow');
            $(this).find('i').toggleClass('fa-caret-left fa-caret-down');
        });

        $('.navbar-left .nav-item.group .second-level .nav-item.group .third-level-button').click(function() {
            $(this).next('.navbar-left .nav-item.group .second-level .nav-item.group .third-level').slideToggle('slow');
            $(this).find('i').toggleClass('fa-caret-left fa-caret-down');
        });
    });

    $(function () {
        $('.login-modal').on('hidden.bs.modal', function (e) {
            $(this).find('input[type=email], input[type=password]').val('').end();
        });

        $('.register-modal').on('hidden.bs.modal', function (e) {
            $(this).find('input[type=text], input[type=email], input[type=password]').val('').end();
        });
    });

    $(function () {
        $('.firstname').blur(function () {
            $('.fullname').val($(this).val() + ' ' + $('.lastname').val());
        });

        $('.lastname').blur(function () {
            $('.fullname').val($('.firstname').val() + ' ' + $(this).val());
        });
    });

    $(function () {
        $('.password-toggle').on('click', function () {
            $('.password-toggle i').toggleClass('fa-eye-slash fa-eye');

            if ($('.password-toggle i').hasClass('fa-eye-slash')) {
                $('.password').prop('type', 'text');
            } else {
                $('.password').prop('type', 'password');
            }
        });
    });
});