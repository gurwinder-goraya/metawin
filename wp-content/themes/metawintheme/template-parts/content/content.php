<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php if ( is_singular() ) : ?>
			<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
		<?php else : ?>
			<?php the_title( sprintf( '<h2 class="entry-title"><a href="%s">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>
		<?php endif; ?>
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php
			the_content();
		?>
		<img class="lozad" src="<?php echo get_the_post_thumbnail_url(); ?>" />
		<?php if ( get_field( 'address' ) ) : ?>
            <div>Address : <?php the_field( 'address' ); ?></div>
        <?php endif ?>
        
        <?php if ( get_field( 'star_rating' ) ) : ?>
            <div>Star Rating : <?php the_field( 'star_rating' ); ?></div>
        <?php endif ?>
        
        <?php if ( get_field( 'score' ) ) : ?>
            <div>Score : <?php the_field( 'score' ); ?></div>
        <?php endif ?>
        
         <?php if ( get_field( 'external_link' ) ) : ?>
            <div>External link : <?php the_field( 'external_link' ); ?></div>
        <?php endif ?>
        
	</div><!-- .entry-content -->
</article><!-- #post-<?php the_ID(); ?> -->
