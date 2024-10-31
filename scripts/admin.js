jQuery(document).ready(function() {
    var $ = jQuery;
    var img_src= $('#image_path').val();
    $('#img_preview').attr("src",img_src);
    $('.schedule_notice_banner_image').click(function() {

        var image= wp.media({
            title:"Set Banner",
            multiple:false,
            button: {text: 'Set'}
        }).open().on('select',function(e){
          var selectedBanner= image.state().get('selection').first();
           var setBanner= selectedBanner.toJSON();

            $('#image_path').val(setBanner.url);
            $('#img_preview').attr("src",setBanner.url);
        })
        return false;
    });
});

