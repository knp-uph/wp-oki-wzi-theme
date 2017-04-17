<?php 
/**
 * Publication Section
*/

$section_title= get_theme_mod( 'oki_wzi_publication_section_title' );
$button_one   = get_theme_mod( 'oki_wzi_publication_section_button_one' );
$btn_one_link = get_theme_mod( 'oki_wzi_publication_button_one_url' ); 
$button_two   = get_theme_mod( 'oki_wzi_publication_section_button_two' );
$btn_two_link = get_theme_mod( 'oki_wzi_publication_button_two_url' );

if( $section_title || $button_one || $btn_one_link || $button_two || $btn_two_link ){
?>
<div class="theme-description">
	<div class="container">
	<?php education_zone_get_section_header( $section_title ); 
   
        if( $button_one && $btn_one_link ) echo '<a href="' . esc_url( $btn_one_link ) . '" class="apply" target="_blank">' . esc_html( $button_one ) . '</a>';
        if( $button_two && $btn_two_link ) echo '<a href="' . esc_url( $btn_two_link ) . '" class="apply" target="_blank">' . esc_html( $button_two ) . '</a>'; 
	         
	?>
    </div>
</div>
<?php 
}