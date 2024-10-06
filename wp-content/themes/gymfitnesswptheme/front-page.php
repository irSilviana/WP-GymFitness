<?php get_header('front') ?>

<?php while (have_posts()): the_post(); ?>
  <section class="welcome text-center section">
    <h2 class="text-primary">
      <?php the_field('welcome_heading') ?>
    </h2>
    <p>
      <?php the_field('welcome_text') ?>
    </p>
  </section>

  <section class="section-areas">
    <ul class="areas-container">
      <?php
      $areas = array(
        0 => get_field('area_1'),
        1 => get_field('area_2'),
        2 => get_field('area_3'),
        3 => get_field('area_4'),
      );

      // Loop through the areas
      foreach ($areas as $area) {
        // Check if the area exists (i.e., the ACF field is not empty)
        if (!empty($area)) {
          // Retrieve the image ID and get the URL for the medium size image
          $image_id = $area['area_image'];
          $image_url = wp_get_attachment_image_src($image_id, 'medium')[0];
      ?>
          <li class="area">
            <img src="<?php echo esc_url($image_url); ?>" alt="<?php echo esc_attr($area['area_name']); ?>">
            <p><?php echo esc_html($area['area_name']); ?></p>
          </li>
      <?php
        }
      }
      ?>
    </ul>
  </section>

  <section class="classes-homepage">
    <div class="container section">
      <h2 class="text-primary text-center">
        Our Clasess
      </h2>
      <?php gymfitness_classes_list(4); ?>
      <div class="button-container">
        <a class="button" href="<?php echo get_permalink(get_page_by_path('classes')); ?>">View All Classes</a>
      </div>
    </div>
  </section>

  <section class="instructors">
    <div class="container section">
      <h2 class="text-center">
        Our Instructors
      </h2>
      <p class="text-center">
        Professional instructors that will help you achieve your goals
      </p>
      <?php gymfitness_instructors_list(); ?>
    </div>
  </section>

  <section class="testimonials">
    <h2 class="text-center">
      Testimonials
    </h2>
    <div class="container-testimonials">
      <ul class="testimonials-list">
        <?php
        $args = array(
          'post_type' => 'testimonials',
          'posts_per_page' => 10
        );

        $testimonials = new WP_Query($args);
        while ($testimonials->have_posts()):  $testimonials->the_post(); ?>

          <li class="testimonial text-center">
            <blockquote> <?php the_content(); ?> </blockquote>
            <footer class="testimonial-footer">
              <?php the_post_thumbnail('thumbnail'); ?>
              <p> <?php the_title() ?></p>
            </footer>
          </li>

        <?php endwhile;
        wp_reset_postdata();
        ?>
      </ul>
    </div>
  </section>

  <section class="blog container section">
    <h2 class="text-center">
      Our Blog
    </h2>
    <p class="text-center">Read our experts blog post to achieve your goals</p>
    <ul class="blog-entries">
      <?php
      $args = array(
        'post_type' => 'post',
        'posts_per_page' => 4
      );
      $blog = new WP_Query($args);
      while ($blog->have_posts()): $blog->the_post(); ?>
        <?php get_template_part('template-parts/blog', 'loop') ?>
      <?php endwhile;
      wp_reset_postdata(); ?>
    </ul>

  </section>
<?php endwhile; ?>

<?php get_footer() ?>