$(document).ready(function() {
    $(function() {
        $(".content a .box")
            .mouseenter(function(event) {
                var w = $(this).width(),
                    h = $(this).height(),
                    x =
                        (event.pageX - $(this).offset().left - w / 2) *
                        (w > h ? h / w : 1),
                    y =
                        (event.pageY - $(this).offset().top - h / 2) *
                        (h > w ? w / h : 1),
                    direction =
                        Math.round(
                            (Math.atan2(y, x) * (180 / Math.PI) + 180) / 90 + 3
                        ) % 4;

                switch (direction) {
                    case 0:
                        $(this).css({
                            //Fill To Bottom
                            "background-image":
                                "linear-gradient(to bottom, #fff 50%, #663399 50%)",
                            "background-position": "0 -100%"
                        });

                        break;
                    case 1:
                        $(this).css({
                            //Fill To left
                            "background-image":
                                "linear-gradient(to left, #663399 50%, #fff 50%)",
                            "background-position": "100% 0"
                        });

                        break;
                    case 2:
                        $(this).css({
                            //Fill To Top
                            "background-image":
                                "linear-gradient(to top, #663399 50%, #fff 50%)",
                            "background-position": "0 100%"
                        });

                        break;
                    case 3:
                        $(this).css({
                            //Fill To Right
                            "background-image":
                                "linear-gradient(to right, #fff 50%, #663399 50%)",
                            "background-position": "-100% 0"
                        });

                        break;
                }
            })
            .mouseleave(function(event) {
                var w = $(this).width(),
                    h = $(this).height(),
                    x =
                        (event.pageX - $(this).offset().left - w / 2) *
                        (w > h ? h / w : 1),
                    y =
                        (event.pageY - $(this).offset().top - h / 2) *
                        (h > w ? w / h : 1),
                    direction =
                        Math.round(
                            (Math.atan2(y, x) * (180 / Math.PI) + 180) / 90 + 3
                        ) % 4;

                switch (direction) {
                    case 0:
                        $(this).css({
                            //Drain To Top
                            "background-image":
                                "linear-gradient(to bottom, #663399 50%, #fff 50%)",
                            "background-position": "0 100%"
                        });
                        
                        break;
                    case 1:
                        //Drain To Right
                        $(this).css({
                            "background-image":
                                "linear-gradient(to left, #fff 50%, #663399 50%)",
                            "background-position": "-100% 0"
                        });

                        break;
                    case 2:
                        //Drain To Bottom
                        $(this).css({
                            "background-image":
                                "linear-gradient(to top, #fff 50%, #663399 50%)",
                            "background-position": "0 -100%"
                        });

                        break;
                    case 3:
                        //Drain To Left
                        $(this).css({
                            "background-image":
                                "linear-gradient(to right, #663399 50%, #fff 50%)",
                            "background-position": "100% 0"
                        });

                        break;
                }
            });
    });
});
