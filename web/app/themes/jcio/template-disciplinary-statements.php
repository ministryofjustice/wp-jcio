<?php
/**
 * Template Name: Disciplinary Statements
 */

$year = get_query_var('disciplinary_stmnt_year');

$statements = new WP_Query(array(
  'post_type' => 'disciplinary_stmnt',
  'year' => $year,
  'posts_per_page' => -1,
  'orderby' => 'post_date',
  'order' => 'DESC',
));

?>
<?php while (have_posts()) : the_post(); ?>
  <?php get_template_part('templates/page', 'header'); ?>
  <?php get_template_part('templates/tabs', 'disciplinary-statements'); ?>
  <h2><?php echo wptexturize($year); ?></h2>

  <?php if ($statements->have_posts()): ?>
    <ul>
      <?php while ($statements->have_posts()): $statements->the_post(); ?>
        <li>
          <?php

          $document = get_field('document');

          ?>
          <a href="<?php echo esc_url($document['url']); ?>" target="_blank" onclick="pageTracker._trackPageview('<?php echo esc_url($document['url']); ?>');"><?php the_title(); ?></a>
          <?php echo \Roots\Sage\Extras\attachment_meta_info($document['ID']); ?>
        </li>
      <?php endwhile; ?>
    </ul>
    <?php wp_reset_postdata(); ?>
  <?php endif; ?>

<?php endwhile; ?>
