<?php

/**
 * Title: iDEAL abstract integration
 * Description:
 * Copyright: Copyright (c) 2005 - 2016
 * Company: Pronamic
 *
 * @author Remco Tolsma
 * @version 1.1.2
 * @since 1.1.2
 */
abstract class Pronamic_WP_Pay_Gateways_IDeal_AbstractIntegration extends Pronamic_WP_Pay_Gateways_AbstractIntegration {
	public function get_settings_class() {
		return 'Pronamic_WP_Pay_Gateways_IDeal_Settings';
	}

	/**
	 * Get required settings for this integration.
	 *
	 * @see https://github.com/wp-premium/gravityforms/blob/1.9.16/includes/fields/class-gf-field-multiselect.php#L21-L42
	 * @return array
	 */
	public function get_settings() {
		$settings = parent::get_settings();

		$settings[] = 'ideal';

		return $settings;
	}
}
