jQuery(document).ready(function() {
    'use strict';
  jQuery('#magazin_metabox_post_gallery').hide();
  jQuery('#magazin_metabox_post_video').hide();

  jQuery('#post-format-gallery').is(':checked') ? jQuery("#magazin_metabox_post_gallery").show() : jQuery("#magazin_metabox_post_gallery").hide();
  jQuery('#post-format-video').is(':checked') ? jQuery("#magazin_metabox_post_video").show() : jQuery("#magazin_metabox_post_video").hide();

  jQuery('#post-format-gallery').click(function() {
      jQuery("#magazin_metabox_post_gallery").toggle(this.checked);
  });

  jQuery('#post-format-video').click(function() {
      jQuery("#magazin_metabox_post_video").toggle(this.checked);
  });

  jQuery('#post-format-0, #post-format-video').click(function() {
      jQuery('#magazin_metabox_post_gallery').hide();
  });
  jQuery('#post-format-0, #post-format-gallery').click(function() {
      jQuery('#magazin_metabox_post_video').hide();
  });


  jQuery('#magazin_metabox_reviews_setting, .mt-review-shortcode').hide();

  jQuery('#magazin_review_type2, #magazin_review_type3, #magazin_review_type4').is(':checked') ? jQuery("#magazin_metabox_reviews_setting").show() : jQuery("#magazin_metabox_reviews_setting").hide();

  jQuery('#magazin_review_type2, #magazin_review_type3, #magazin_review_type4').click(function() {
      jQuery("#magazin_metabox_reviews_setting").toggle(this.checked);
  });
  jQuery('#magazin_review_type1').click(function() {
      jQuery('#magazin_metabox_reviews_setting').hide();
  });

  jQuery('#magazin_review_location3').is(':checked') ? jQuery(".mt-review-shortcode").show() : jQuery(".mt-review-shortcode").hide();

  jQuery('#magazin_review_location3').click(function() {
      jQuery(".mt-review-shortcode").toggle(this.checked);
  });
  jQuery('#magazin_review_location1, #magazin_review_location2').click(function() {
      jQuery('.mt-review-shortcode').hide();
  });

});
