<?php

add_action('admin_menu', 'my_social_media_share_buttons_settings_page');

function my_social_media_share_buttons_settings_page() {
  add_options_page('My Social Media Share Buttons Settings', 'My Social Media Share Buttons', 'manage_options', 'my-social-media-share-buttons-settings', 'my_social_media_share_buttons_settings_page_content');
}
//turn on the checkbox if it is set in the options
function isChecked($key) {
  $options = get_option('my_social_media_share_buttons_options');
  echo((!empty($options) && !empty($options[$key])) ? 'checked' : '');
}
function my_social_media_share_buttons_settings_page_content() {
  // Get the plugin options.
  $options = get_option('my_social_media_share_buttons_options');
  
  // Display the settings form.
  ?>
  <form method="post" action="options.php">
    <?php settings_fields('my_social_media_share_buttons_settings_group'); ?>

    <section>
      <h2>My Social Media Share Buttons Settings</h2>

      <table class="form-table">
        <tr>
          <th><label for="my_social_media_share_buttons_facebook">Facebook</label></th>
          <td>
            <input type="checkbox" name="my_social_media_share_buttons_options[facebook]" id="my_social_media_share_buttons_facebook" value="1" <?php isChecked('facebook') ?> >
            <label for="my_social_media_share_buttons_facebook">Enable Facebook share button</label>
          </td>
        </tr>

        <tr>
          <th><label for="my_social_media_share_buttons_twitter">Twitter</label></th>
          <td>
            <input type="checkbox" name="my_social_media_share_buttons_options[twitter]" id="my_social_media_share_buttons_twitter" value="1" <?php isChecked('twitter') ?> >
            <label for="my_social_media_share_buttons_twitter">Enable Twitter share button</label>
          </td>
        </tr>

        <tr>
          <th><label for="my_social_media_share_buttons_linkedin">LinkedIn</label></th>
          <td>
            <input type="checkbox" name="my_social_media_share_buttons_options[linkedin]" id="my_social_media_share_buttons_linkedin" value="1" <?php isChecked('linkedin') ?> >
            <label for="my_social_media_share_buttons_linkedin">Enable LinkedIn share button</label>
          </td>
        </tr>

        <tr>
          <th><label for="my_social_media_share_buttons_pinterest">Pinterest</label></th>
          <td>
            <input type="checkbox" name="my_social_media_share_buttons_options[pinterest]" id="my_social_media_share_buttons_pinterest" value="1" <?php isChecked('pinterest') ?> >
            <label for="my_social_media_share_buttons_pinterest">Enable Pinterest share button</label>
          </td>
        </tr>
      </table>
    </section>

    <?php submit_button(); ?>
  </form>
<?php
  } 

// Register the settings page with WordPress.
add_action('admin_init', 'my_social_media_share_buttons_register_settings');

 function my_social_media_share_buttons_register_settings() {
  register_setting('my_social_media_share_buttons_settings_group', 'my_social_media_share_buttons_options');
}