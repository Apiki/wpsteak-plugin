<?php declare(strict_types = 1);

?>
<label><?php esc_html_e( 'Endereço:', 'app' ); ?>
	<input
		type="text"
		name="address"
		class="large-text"
		value="<?php echo esc_attr( $entity->get_address() ); ?>"
	>
</label>
