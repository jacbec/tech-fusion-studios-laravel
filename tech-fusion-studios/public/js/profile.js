$(document).ready(function () {
    $(function () {
        $croppieResult = null;

        $croppie = $('.croppie-editor').croppie({
            viewport: {
                width: 400,
                height: 400,
                type: 'circle'
            },
            boundary: {
                width: 800,
                height: 500
            },
            enableExif: true
        });

        $('.avatar').on('change', function () { readFile(this); });

        $('.croppie-editor').bind('mouseenter', function () {
            this.id = setInterval(function() {
                $('.croppie-editor').croppie('result', {
                    type: 'canvas',
                    size: 'viewport'
                }).then(function (resp) {
                    /*$('.croppie-avatar').html('<img name="croppie-avatar" src="' + resp + '">');*/
                    setCroppieResult(resp);
                });
            }, 1);
        }).bind('mouseleave', function(){
            this.id && clearInterval(this.id);
        });

        $('.avatar-form').submit( function (e) {
            e.preventDefault();
            $.ajax({
                url        : $(this).attr('action'),
                method     : $(this).attr('method'),
                data       : {'croppie-avatar':$croppieResult, _token: token},
                success    : function( response ) { window.location.href = 'profile';},
                error      : function( xhr, err ) { console.log(xhr); console.log(err);}
            });
        });

        $('.croppie-sweet-alert').on('click', function () {
            swallResult({
                src: $croppieResult
            });
        });

        function readFile(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $croppie.croppie('bind', {
                        url: e.target.result
                    }).then(function(){
                        console.log('jQuery bind complete');
                    });

                };

                reader.readAsDataURL(input.files[0]);
            }
            else {
                swal("Sorry - you're browser doesn't support the FileReader API");
            }
        }

        function setCroppieResult(resp) {
            $croppieResult = resp;
        }
    });

    function swallResult(result) {
        var html;
        if (result.html) {
            html = result.html;
        }
        if (result.src) {
            html = '<img type="image" src="' + result.src + '">';
        }
        swal({
            title: '',
            html: html,
            allowOutsideClick: true
        });

        setTimeout(function(){
            $('.sweet-alert').css('margin', function() {
                var top = -1 * ($(this).height() / 2),
                    left = -1 * ($(this).width() / 2);

                return top + 'px 0 0 ' + left + 'px';
            });
        }, 1);
    }
});