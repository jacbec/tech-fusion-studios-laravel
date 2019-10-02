$(document).ready(function () {
    $(function() {
        $('.sidebar-slide').on('click', function() {
            $('.navbar-top').toggleClass('slide');
            $('.slide-wrapper').toggleClass('slide');
        });
    });

    $(function () {
        $('.navbar-left li.group .second-level').hide();
        $('.navbar-left li.group .second-level li.group .third-level').hide();
        $('.navbar-left li.group .second-level-button').click(function() {
            $(this).next('.navbar-left li.group .second-level').slideToggle('slow');
            $(this).find('i').toggleClass('fa-caret-left fa-caret-down');
        });

        $('.navbar-left li.group .second-level li.group .third-level-button').click(function() {
            $(this).next('.navbar-left li.group .second-level li.group .third-level').slideToggle('slow');
            $(this).find('i').toggleClass('fa-caret-left fa-caret-down');
        });
    });

    $(function () {
        $('.navbar-left').mCustomScrollbar();
    });
});