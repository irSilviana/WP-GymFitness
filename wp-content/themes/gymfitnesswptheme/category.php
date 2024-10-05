<?php get_header(); ?>

<main class="container page section">
  <?php
  $category = get_queried_object(); ?>
  <h2 class="text-center text-primary">Category: &nbsp;<?php echo $category->name; ?>
  </h2>
  <div class="text-center">
    <p>
      <?php echo category_description($category->ID) ?>
    </p>
  </div>
  <?php get_template_part('template-parts/blog', 'loop') ?>
</main>

<?php get_footer(); ?>