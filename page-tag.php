<?php
/*
Template Name: Tag Clound
*/
?>
<!-- Tags -->
<?php get_header(); ?>

<?php $args = array(
    'smallest'                  => 14,
    'largest'                   => 30,
    'unit'                      => 'px',
    'number'                    => 45,
    'taxonomy'                  => array('post_tag','category')
); ?>

<div class="fish-tag-cloud">
  <?php wp_tag_cloud($args); ?>
</div>

<?php get_footer(); ?>
