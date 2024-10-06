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
<?php endwhile; ?>

<?php get_footer() ?>