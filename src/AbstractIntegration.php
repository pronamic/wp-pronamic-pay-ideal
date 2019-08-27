<?php

namespace Pronamic\WordPress\Pay\Gateways\IDeal;

use Pronamic\WordPress\Pay\Gateways\Common\AbstractIntegration as Common_AbstractIntegration;

/**
 * Title: iDEAL abstract integration
 * Description:
 * Copyright: Copyright (c) 2005 - 2018
 * Company: Pronamic
 *
 * @author Remco Tolsma
 * @version 2.0.0
 * @since 1.1.2
 */
abstract class AbstractIntegration extends Common_AbstractIntegration {
	public function get_settings_fields() {
		$fields = array();

		// Merchant ID
		$fields[] = array(
			'section'  => 'general',
			'filter'   => FILTER_SANITIZE_STRING,
			'meta_key' => '_pronamic_gateway_ideal_merchant_id',
			'title'    => __( 'Merchant ID', 'pronamic_ideal' ),
			'type'     => 'text',
			'classes'  => array( 'code' ),
			'tooltip'  => sprintf(
				'%s %s.',
				__( 'Merchant ID (or Acceptant ID)', 'pronamic_ideal' ),
				__( 'as mentioned in the payment provider dashboard', 'pronamic_ideal' )
			),
		);

		// Sub ID
		$fields[] = array(
			'section'     => 'advanced',
			'filter'      => FILTER_SANITIZE_STRING,
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
		);

		// Purchase ID
		$fields[] = array(
			'section'     => 'advanced',
			'filter'      => FILTER_SANITIZE_STRING,
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
		);

		// Return fields
		return $fields;
	}
}
