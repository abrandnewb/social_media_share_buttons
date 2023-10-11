<?php

function my_social_media_share_buttons_css() {
  // Add the Font Awesome link to the header of the page.
  echo '<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">';

  // Add the CSS to the header of the page.
  echo '<style type="text/css">
    .my-social-media-share-buttons {
      display: flex;
      justify-content: center;
      align-items: center;
    }

    .my-social-media-share-buttons a {
      margin: 0 5px;
      font-size: 40px;
      color: #000;
    }
  </style>';
}

function network_enabled($network) {
    $options = get_option('my_social_media_share_buttons_options');
    return ((!empty($options) && !empty($options[$network])));
}
add_action('wp_head', 'my_social_media_share_buttons_css');

function my_social_media_share_buttons($content) {
  // Get the social media sharing buttons.
  $share_buttons = array(
    'facebook' => '<a href="https://www.facebook.com/sharer/sharer.php?u=%URL%" target="_blank"><i class="fa-brands fa-facebook"></i></a>',
    'twitter' => '<a href="https://twitter.com/intent/tweet?url=%URL%" target="_blank"><i class="fa-brands fa-twitter"></i></a>',
    'linkedin' => '<a href="https://www.linkedin.com/shareArticle?mini=true&url=%URL%" target="_blank"><i class="fa-brands fa-linkedin"></i></a>',
    'pinterest' => '<a href="https://pinterest.com/pin/create/button/?url=%URL%" target="_blank"><i class="fa-brands fa-pinterest"></i></a>',
  );

  // Create a buffer to store the plugin output.
  $plugin_output = '<div class="my-social-media-share-buttons">';

  // Display the plugin output after the content of the post.
  foreach ($share_buttons as $network => $button) {
    if(network_enabled($network)) {
        $url = get_permalink();
        $button = str_replace('%URL%', $url, $button);
        $plugin_output .= $button;
    }
  }

  $plugin_output .= '</div>';
  // Add the plugin output to the end of the post content.
  $content .= $plugin_output;
  return $content;
}

add_filter('the_content', 'my_social_media_share_buttons');
