<?php get_header(); ?>

<main class="container page">

  <?php while (have_posts()): the_post(); ?>

    <h1 class="text-center text-primary"><?php the_title(); ?></h1>

    <?php
    if (has_post_thumbnail()): the_post_thumbnail('blog');
    endif;
    ?>

    <div class="text-center">
      <p> <?php the_content(); ?></p>
    </div>

  <?php endwhile; ?>
</main>

<?php get_footer(); ?>