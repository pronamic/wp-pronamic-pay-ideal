<?php

namespace Pronamic\WordPress\Pay\Gateways\IDeal;

use Pronamic\WordPress\Pay\Core\GatewaySettings;

/**
 * Title: iDEAL gateway settings
 * Description:
 * Copyright: 2005-2019 Pronamic
 * Company: Pronamic
 *
 * @author Remco Tolsma
 * @version 2.0.0
 * @since 1.0.0
 */
class Settings extends GatewaySettings {
	public function __construct() {
		add_filter( 'pronamic_pay_gateway_sections', array( $this, 'sections' ) );
		add_filter( 'pronamic_pay_gateway_fields', array( $this, 'fields' ) );
	}

	public function sections( array $sections ) {
		// iDEAL
		$sections['ideal'] = array(
			'title'       => __( 'iDEAL', 'pronamic_ideal' ),
			'methods'     => array( 'ideal' ),
			'description' => __( 'Account details are provided by the payment provider after registration. These settings need to match with the payment provider dashboard.', 'pronamic_ideal' ),
		);

		// Advanced
		$sections['ideal_advanced'] = array(
			'title'       => __( 'Advanced', 'pronamic_ideal' ),
			'methods'     => array( 'ideal' ),
			'description' => __( 'Optional settings for advanced usage only.', 'pronamic_ideal' ),
		);

		// Return sections
		return $sections;
	}

	public function fields( array $fields ) {
		// Merchant ID
		$fields[] = array(
			'filter'   => FILTER_SANITIZE_STRING,
			'section'  => 'ideal',
			'meta_key' => '_pronamic_gateway_ideal_merchant_id',
			'title'    => __( 'Merchant ID', 'pronamic_ideal' ),
			'type'     => 'text',
			'classes'  => array( 'code' ),
			'tooltip'  => sprintf(
				'%s %s.',
				__( 'Merchant ID (or Acceptant ID)', 'pronamic_ideal' ),
				__( 'as mentioned in the payment provider dashboard', 'pronamic_ideal' )
			),
			'methods'  => array( 'ideal' ),
		);

		// Sub ID
		$fields[] = array(
			'filter'      => FILTER_SANITIZE_STRING,
			'section'     => 'ideal_advanced',
			'meta_key'    => '_pronamic_gateway_ideal_sub_id',
			'name'        => 'subId',
			'id'          => 'pronamic_ideal_sub_id',
			'title'       => __( 'Sub ID', 'pronamic_ideal' ),
			'type'        => 'text',
			'classes'     => array( 'small-text', 'code' ),
			'default'     => '0',
			'description' => sprintf(
				/* translators: %s: 0 */
				__( 'Default: <code>%s</code>', 'pronamic_ideal' ),
				0
			),
			'tooltip'     => sprintf(
				'%s %s.',
				__( 'Sub ID', 'pronamic_ideal' ),
				__( 'as mentioned in the payment provider dashboard', 'pronamic_ideal' )
			),
			'methods'     => array( 'ideal' ),
		);

		// Purchase ID
		$fields[] = array(
			'filter'      => FILTER_SANITIZE_STRING,
			'section'     => 'ideal_advanced',
			'meta_key'    => '_pronamic_gateway_ideal_purchase_id',
			'title'       => __( 'Purchase ID', 'pronamic_ideal' ),
			'type'        => 'text',
			'classes'     => array( 'regular-text', 'code' ),
			'tooltip'     => sprintf(
				/* translators: %s: <code>purchaseID</code> */
				__( 'The iDEAL %s parameter.', 'pronamic_ideal' ),
				sprintf( '<code>%s</code>', 'purchaseID' )
			),
			'description' => sprintf(
				'%s %s<br />%s',
				__( 'Available tags:', 'pronamic_ideal' ),
				sprintf(
					'<code>%s</code> <code>%s</code>',
					'{order_id}',
					'{payment_id}'
				),
				sprintf(
					/* translators: %s: {payment_id} */
					__( 'Default: <code>%s</code>', 'pronamic_ideal' ),
					'{payment_id}'
				)
			),
			'methods'     => array( 'ideal' ),
		);

		// Return fields
		return $fields;
	}
}
