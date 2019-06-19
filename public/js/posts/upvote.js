$(document).ready(function () {
    var btn_upvote = $('.img-upvote');

    if (btn_upvote.attr('voted') == 1) {
        btn_upvote.attr('opacity', '1');


    } else {
        btn_upvote.attr('opacity', '0.5');
    }


    btn_upvote.on('click', function () {
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type: "POST",
            contentType: "application/json; charset=utf-8",
            url: "/upvote/" + $(this).attr('post_id'),
            data: "{post_id: '" + $(this).attr('post_id') + "' }",
            dataType: "json",
            success: function (data) {
                if (btn_upvote.attr('voted') == 1) {
                    btn_upvote.fadeTo( "fast" , 0.5, function() {
                        // Animation complete.
                    });

                    btn_upvote.attr('voted','0');


                } else {
                    btn_upvote.fadeTo( "fast" , 1, function() {
                        // Animation complete.
                    });
                    btn_upvote.attr('voted','1');
                }
            }
        })
    });
});
