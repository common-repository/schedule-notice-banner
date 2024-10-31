<?php

function snb_show_content($content)
{
    $image_path= esc_url(get_option('schedule_notice_banner_image_url',""));
    $location = esc_html(get_option('schedule_notice_banner_location'));
    $start_time=esc_html(get_option('schedule_notice_banner_start_date'));
    $expiry_time=esc_html(get_option('schedule_notice_banner_date'));
    $link=esc_url(get_option('schedule_notice_banner_image_link'));

    if(empty($link))
    {
        $link="#";
    }
    $start_timestamp = strtotime($start_time);
    $expiry_timestamp = strtotime($expiry_time);
    $blogtime = current_time( 'mysql' );
    $converted=strtotime($blogtime);


    if($start_timestamp <= $converted && $expiry_timestamp > $converted)
    {
        switch ($location)
        {
            case "Header":
                $banner="<div class='banner_wrap'>";
                $banner.= "<a href='$link'>";
                $banner.= "<img src='$image_path'>";
                $banner.= "</a>";
                $banner.="</div>";
                ?>
                <script>

                    jQuery('body').prepend("<?php echo $banner;?>");

                </script>
                <?php
                break;
            case "Footer":
                $banner="<div class='banner_wrap'>";
                $banner.= "<a href='$link'>";
                $banner.= "<img src='$image_path'>";
                $banner.= "</a>";
                $banner.="</div>";
                ?>
                <script>
                    jQuery('nav').after("<?php echo $banner;?>");
                </script>
                <?php
                break;
            default;
        }
    }

    return $content;

}

add_filter('the_content','snb_show_content');
