<?php
/**
 * The template used for displaying a row in aparments list
 *
 * @package Ustedalen
 * @since Ustedalen 1.0
 */
?>
<tr id="apartment-<?php the_ID(); ?>" <?php post_class('aprow'); ?> data-svg="<?php echo meterez(get_post_meta($post->ID, '_cmb_svg', true)); ?>" data-status="<?php echo get_post_meta($post->ID, '_cmb_salg', true); ?>" data-url="<?php the_permalink(); ?>" data-flat="flat-<?php echo get_post_meta($post->ID, '_cmb_snr', true); ?>">
		<td>
			<a href="<?php the_permalink(); ?>" title="<?php echo esc_attr( sprintf( __( 'Permalink to %s', 'ustedalen' ), the_title_attribute( 'echo=0' ) ) ); ?>" class="rowlink">
				<?php echo get_post_meta($post->ID, '_cmb_snr', true); ?>
			</a>
		</td>
		<td>
			<a href="<?php the_permalink(); ?>" title="<?php echo esc_attr( sprintf( __( 'Permalink to %s', 'ustedalen' ), the_title_attribute( 'echo=0' ) ) ); ?>" class="rowlink">
				<?php echo get_post_meta($post->ID, '_cmb_lnr', true); ?>
			</a>
		</td>
		<td>
			<a href="<?php the_permalink(); ?>" title="<?php echo esc_attr( sprintf( __( 'Permalink to %s', 'ustedalen' ), the_title_attribute( 'echo=0' ) ) ); ?>" class="rowlink">
					<?php echo get_post_meta($post->ID, '_cmb_etg', true); ?>
			</a>
		</td>
		<td>
			<a href="<?php the_permalink(); ?>" title="<?php echo esc_attr( sprintf( __( 'Permalink to %s', 'ustedalen' ), the_title_attribute( 'echo=0' ) ) ); ?>" class="rowlink">
				<?php echo meterez(get_post_meta($post->ID, '_cmb_bra', true)); ?>
			</a>
		</td>
		<td>
			<a href="<?php the_permalink(); ?>" title="<?php echo esc_attr( sprintf( __( 'Permalink to %s', 'ustedalen' ), the_title_attribute( 'echo=0' ) ) ); ?>" class="rowlink">
				<?php echo meterez(get_post_meta($post->ID, '_cmb_braloft', true)); ?>
			</a>
		</td>
		<td>
			<a href="<?php the_permalink(); ?>" title="<?php echo esc_attr( sprintf( __( 'Permalink to %s', 'ustedalen' ), the_title_attribute( 'echo=0' ) ) ); ?>" class="rowlink">
				<?php echo get_post_meta($post->ID, '_cmb_prom', true); ?>m<sup>2</sup>
			</a>
		</td>
		<td>
			<a href="<?php the_permalink(); ?>" title="<?php echo esc_attr( sprintf( __( 'Permalink to %s', 'ustedalen' ), the_title_attribute( 'echo=0' ) ) ); ?>" class="rowlink">
				<?php echo meterez(get_post_meta($post->ID, '_cmb_golv', true)); ?>
			</a>
		</td>
		<td>
			<a href="<?php the_permalink(); ?>" title="<?php echo esc_attr( sprintf( __( 'Permalink to %s', 'ustedalen' ), the_title_attribute( 'echo=0' ) ) ); ?>" class="rowlink">
				<?php echo get_post_meta($post->ID, '_cmb_antsov', true); ?>
			</a>
		</td>
		<td>
			<a href="<?php the_permalink(); ?>" title="<?php echo esc_attr( sprintf( __( 'Permalink to %s', 'ustedalen' ), the_title_attribute( 'echo=0' ) ) ); ?>" class="rowlink">
				<?php echo number_format(get_post_meta($post->ID, '_cmb_pris', true),0,'.',' '); ?>,-
			</a>
		</td>
		<td>
			<a href="<?php the_permalink(); ?>" title="<?php echo esc_attr( sprintf( __( 'Permalink to %s', 'ustedalen' ), the_title_attribute( 'echo=0' ) ) ); ?>" class="rowlink">
				<?php echo (get_post_meta($post->ID, '_cmb_salg', true)!='ledig')?get_post_meta($post->ID, '_cmb_salg', true):''; ?>
			</a>
		</td>
</tr><!-- #apartment-## -->

