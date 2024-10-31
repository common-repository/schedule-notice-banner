<?php
function open_schedule_banner_menu()
{
    add_menu_page('Schedule Notice Banner','Schedule Notice Banner','manage_options','schedule_banner_menu','schedule_banner_create_fields','dashicons-images-alt2',20);
}
add_action('admin_menu','open_schedule_banner_menu');


function schedule_banner_create_fields ()
{
    if(!current_user_can('administrator'))
    {
       die();
    }

    if(array_key_exists("submit_options",$_POST))
    {
        if(isset($_POST['snb_nonce'])) {
            if(wp_verify_nonce($_POST['snb_nonce'], 'snb_nonce')) {
                update_option("schedule_notice_banner_location",sanitize_text_field($_POST['location']));
                update_option("schedule_notice_banner_start_date",sanitize_text_field($_POST['startdate']));
                update_option("schedule_notice_banner_date",sanitize_text_field($_POST['date']));
                update_option("schedule_notice_banner_image_url",esc_url_raw($_POST['image_path']));
                update_option("schedule_notice_banner_image_link",esc_url_raw($_POST['link']));
            }

        }
        ?>
        <div class="updated-message notice is-success is-dismissible"><?php _e("Your Settings have been updated","default");?></div>
        <?php
    }
    $location = get_option('schedule_notice_banner_location',"none");
    $start_date=get_option('schedule_notice_banner_start_date',"");
    $expiry_date= get_option('schedule_notice_banner_date',"");
    $image_path= get_option('schedule_notice_banner_image_url',"");
    $link=get_option('schedule_notice_banner_image_link',"");

    ?>
    <div class="wrap">
        <h2><?php _e("Please configure your Banner Settings Below","default");?></h2>

        <form method="post" action="" id="snb_form">
            <table class="form-table">
                <tbody>

                <tr>
                    <th scope="row"><label for="username"> <?php _e ('Where do you want the banner to appear? ','default');?></label></th>
                    <td>
                        <select name="location" class="regular-text" required id="location">


                            <option value="Header" <?php if ($location == "Header" ) echo 'selected' ; ?> >Top of Page</option>
                            <option value="Footer" <?php if ($location == "Footer" ) echo 'selected' ; ?> >Below Navigation</option>
                        </select>

                    </td>
                </tr>

                <tr>
                    <th scope="row"><label for="startdate"> <?php _e ('Set Banner Start Date','default');?></label></th>
                    <td><input type="datetime" name="startdate" required id="startdate" class="regular-text" value="<?php _e($start_date,'default') ?>"> </td>
                </tr>


                <tr>
                    <th scope="row"><label for="date"> <?php _e ('Set Banner Expiry Date ','default');?></label></th>
                    <td><input type="datetime" name="date" required id="date" class="regular-text" value="<?php _e($expiry_date,'default') ?>"> </td>
                </tr>

                <tr>
                    <th scope="row"><label for="image_path"> <?php _e ('Upload your Image ','default');?></label></th>
                    <td><input type="text" name="image_path" required id="image_path" class="regular-text" value="<?php _e($image_path,'default');?>"> <button class="schedule_notice_banner_image button button-primary" >Select Banner</button></td>
                </tr>

                <tr>
                    <th scope="row"><label for="link"> <?php _e ('Set Image Link ','default');?></label></th>
                    <td><input type="url" name="link" id="link" class="regular-text" value="<?php _e($link,'default') ?>"> </td>
                </tr>



                <input type="hidden" name="snb_nonce" value="<?php echo wp_create_nonce('snb_nonce'); ?>"/>
                </tbody>

            </table>

            <div id=”show_upload_preview”>

                <?php if(! empty($image_path)){
                    ?>
                    <img id="img_preview"  style="max-height: 300px; max-width: 90%">
                <?php } ?>
            </div>

            <p class="submit"><input type="submit" name="submit_options" id="submit" class="button button-primary" value="<?php _e('Save Changes','SCS_domain')?>"></p>
        </form>
    </div>


    <script type="text/javascript">
        $(function(){
            $('*[name=date]').appendDtpicker({
               // "futureOnly": true
            });

            $('*[name=startdate]').appendDtpicker({
                "futureOnly": true
            });
        });

    </script>

    <?php
}
