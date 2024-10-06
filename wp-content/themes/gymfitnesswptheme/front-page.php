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

      foreach ($areas as $key => $value) {
      ?>
        <li class="area">
          <?php
          $key = get_field('area_' . $key + 1);
          $image = wp_get_attachment_image_src($key['area_image'], 'mediumSize')[0];
          ?>
          <img src="<?php echo $image ?>">
          <p><?php echo $key['area_name']; ?></p>
        </li>
      <?php
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
<?php endwhile; ?>

<?php get_footer() ?>