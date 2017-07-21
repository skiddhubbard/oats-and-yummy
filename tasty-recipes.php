<?php echo $recipe_styles;
$instagram_handle = ''; //add your instagram handle between the quotes to activate the footer area with instagram info
$instagram_hashtag = ''; //you'll also need to add a hashtag between these quotes
?>

<header class="tasty-recipes-entry-header">
	<?php if ( ! empty( $recipe_image ) ) : ?>
		<div class="tasty-recipes-image">
			<?php echo $recipe_image; ?>
		</div>
	<?php endif; ?>
	<h2><?php echo $recipe_title; ?></h2>
	<hr>
	<?php if ( ! empty( $recipe_rating_label ) ) : ?>
		<div class="tasty-recipes-rating">
			<a href="#respond">
				<span class="tasty-recipes-rating-stars"><?php echo $recipe_rating_icons; ?></span>
				<span class="tasty-recipes-rating-label"><?php echo $recipe_rating_label; ?></span>
			</a>
		</div>
	<?php endif; ?>
	<?php if ( ! empty( $recipe_details ) ) : ?>
		<div class="tasty-recipes-details">
			<ul>
				<?php foreach ( $recipe_details as $key => $detail ) : ?>
					<li class="<?php echo esc_attr( $detail['class'] ); ?>"><span class="tasty-recipes-label"><?php
					$icons = array(
						'cook_time'     => 'icon-clock-white',
						'prep_time'     => 'icon-clock-white',
						'total_time'    => 'icon-clock-white',
						'method'        => 'icon-squares-white',
						'cuisine'       => 'icon-flag-white',
						'category'      => 'icon-folder-white',
						'yield'         => 'icon-cutlery-white',
					);
					if ( isset( $icons[ $key ] ) ) {
						echo '<img class="detail-icon" src="' . esc_url( get_stylesheet_directory_uri() . '/tr-images/' . $icons[ $key ] ) . '.png">';
					}
					?><?php echo $detail['label']; ?>:</span> <?php echo $detail['value']; ?></li>
				<?php endforeach; ?>
			</ul>
		</div>
	<?php endif; ?>
</header>

<div class="tasty-recipes-entry-content">

	<?php if ( ! tasty_recipes_is_print() ) : ?>
	<div class="tasty-recipes-buttons">
		<?php
			$print_button = '<div class="tasty-recipes-button-wrap"><a class="button tasty-recipes-print-button tasty-recipes-no-print"';
			$current_post = get_post();
			$print_button .= ' href="' . esc_url( tasty_recipes_get_print_url( $current_post->ID, $recipe->get_id() ) ) . '"><img class="svg-print" src="' . esc_url( get_stylesheet_directory_uri() . '/tr-images/icon-print-white' ) . '.png">Print Recipe</a></div>';
			echo $print_button; ?>
		<div class="tasty-recipes-button-wrap">
			<a class="share-pin button" data-pin-custom="true" href="<?php echo esc_url( add_query_arg( 'url', rawurlencode( get_permalink( $current_post->ID ) ), 'https://www.pinterest.com/pin/create/button/' ) ); ?>"><img class="svg-pinterest" src="<?php echo esc_url( get_stylesheet_directory_uri() . '/tr-images/icon-pinterest-white.png' ); ?>">Pin Recipe</a>
		</div>
	</div>
	<?php endif; ?>

	<?php
	$show_hr = false;
	if ( ! empty( $recipe_description ) && '<div itemprop="description"></div>' !== $recipe_description ) :
		$show_hr = true; ?>
		<div class="tasty-recipes-description">
			<h3>Description</h3>
			<?php echo $recipe_description; ?>
		</div>
	<?php endif; ?>

	<?php if ( $show_hr ) :
		$show_hr = false; ?>
		<hr>
	<?php endif; ?>

	<?php if ( ! empty( $recipe_ingredients ) ) :
		$show_hr = true; ?>
		<div class="tasty-recipes-ingredients">
			<h3><?php esc_html_e( 'Ingredients', 'tasty-recipes' ); ?></h3>
			<?php echo $recipe_ingredients; ?>
		</div>
	<?php endif; ?>

	<?php if ( $show_hr ) :
		$show_hr = false; ?>
		<hr>
	<?php endif; ?>

	<?php if ( ! empty( $recipe_instructions ) ) :
		$show_hr = true; ?>
		<div class="tasty-recipes-instructions">
			<h3><?php esc_html_e( 'Instructions', 'tasty-recipes' ); ?></h3>
			<?php echo $recipe_instructions; ?>
		</div>
	<?php endif; ?>

	<?php if ( ! empty( $recipe_notes ) ) : ?>
		<div class="tasty-recipes-notes">
			<h3><?php esc_html_e( 'Notes', 'tasty-recipes' ); ?></h3>
			<?php echo $recipe_notes; ?>
		</div>
	<?php endif; ?>

	<?php if ( ! empty( $recipe_nutrifox_id ) ) : ?>
		<div class="tasty-recipes-nutrifox">
			<div class="nutrifox-label" data-recipe-id="<?php echo (int) $recipe_nutrifox_id; ?>"></div>
			<script async src="https://nutrifox.com/embed.js" charset="utf-8"></script>
		</div>
	<?php endif; ?>

	<?php if ( ! empty( $recipe_nutrition ) || ! empty( $recipe_hidden_nutrition ) ) : ?>
		<?php if ( ! empty( $recipe_nutrition ) ) : ?>
			<div class="tasty-recipes-nutrition" itemscope itemprop="nutrition" itemtype="http://schema.org/NutritionInformation">
			<h3><?php esc_html_e( 'Nutrition', 'tasty-recipes' ); ?></h3>
			<ul>
				<?php foreach ( $recipe_nutrition as $nutrition ) : ?>
					<li><strong class="tasty-recipes-label"><?php echo $nutrition['label']; ?>:</strong> <?php echo $nutrition['value']; ?></li>
				<?php endforeach; ?>
			</ul>
			</div>
			<?php endif; ?>
			<?php if ( ! empty( $recipe_hidden_nutrition ) ) : ?>
				<div class="tasty-recipes-nutrition" itemscope itemprop="nutrition" itemtype="http://schema.org/NutritionInformation" style="display:none;">
					<div class="tasty-recipes-hidden-nutrition" style="display:none;">
					<?php
					foreach ( $recipe_hidden_nutrition as $nutrition ) {
						echo $nutrition['value'];
					}
					?>
					</div>
				</div>
		<?php endif; ?>
	<?php endif; ?>


<?php if ( $instagram_handle != '' ) : ?>
<footer class="tasty-recipes-entry-footer">
	<div class="tasty-recipes-footer-content">
		<?php if ( ! tasty_recipes_is_print() ) : ?>
		<img class="svg-instagram" src="<?php echo esc_url( get_stylesheet_directory_uri() . '/tr-images/icon-instagram-white.png' ); ?>">
		<?php endif; ?>
		<h3>Did you make this recipe?</h3>
		<p>Tag <a href="https://www.instagram.com/<?php echo $instagram_handle; ?>/" target="_blank">@<?php echo $instagram_handle; ?></a> on Instagram and hashtag it <a href="https://www.instagram.com/explore/tags/<?php echo $instagram_hashtag; ?>/" target="_blank">#<?php echo $instagram_hashtag; ?></a></p>
	</div>
</footer>
<?php endif; ?>
</div>