<?php

/**
 * Title: iDEAL gateway settings
 * Description:
 * Copyright: Copyright (c) 2005 - 2015
 * Company: Pronamic
 * @author Remco Tolsma
 * @version 1.2.0
 * @since 1.2.0
 */
class Pronamic_WP_Pay_Gateways_IDeal_GatewaySettings extends Pronamic_WP_Pay_GatewaySettings {
	public function __construct() {
		add_filter( 'pronamic_pay_gateway_sections', array( $this, 'sections' ) );
		add_filter( 'pronamic_pay_gateway_fields', array( $this, 'fields' ) );
	}

	public function sections( array $sections ) {
		// iDEAL
		$sections['ideal'] = array(
			'title'   => __( 'iDEAL', 'pronamic_ideal' ),
			'methods' => array(
				'ideal_basic',
				'ideal_advanced',
				'ideal_advanced_v3',
			),
		);

		// Return
		return $sections;
	}

	public function fields( array $fields ) {
		// Merchant ID
		$fields[] = array(
			'filter'      => FILTER_SANITIZE_STRING,
			'section'     => 'ideal',
			'meta_key'    => '_pronamic_gateway_ideal_merchant_id',
			'title'       => __( 'Merchant ID', 'pronamic_ideal' ),
			'type'        => 'text',
			'classes'     => array( 'code' ),
			'description' => __( 'You receive the merchant ID (also known as: acceptant ID) from your iDEAL provider.', 'pronamic_ideal' ),
			'methods'     => array( 'ideal_basic', 'ideal_advanced', 'ideal_advanced_v3' ),
		);

		// Sub ID
		$fields[] = array(
			'filter'      => FILTER_SANITIZE_STRING,
			'section'     => 'ideal',
			'meta_key'    => '_pronamic_gateway_ideal_sub_id',
			'name'        => 'subId',
			'id'          => 'pronamic_ideal_sub_id',
			'title'       => __( 'Sub ID', 'pronamic_ideal' ),
			'type'        => 'text',
			'classes'     => array( 'small-text', 'code' ),
			'description' => sprintf( __( 'You receive the sub ID from your iDEAL provider, the default is: %s.', 'pronamic_ideal' ), 0 ),
			'methods'     => array( 'ideal_basic', 'ideal_advanced', 'ideal_advanced_v3' ),
		);

		// Purchase ID
		$fields[] = array(
			'filter'      => FILTER_SANITIZE_STRING,
			'section'     => 'ideal',
			'meta_key'    => '_pronamic_gateway_ideal_purchase_id',
			'title'       => __( 'Purchase ID', 'pronamic_ideal' ),
			'type'        => 'text',
			'classes'     => array( 'regular-text', 'code' ),
			'description' => sprintf(
				'%s<br />%s<br />%s',
				sprintf(
					__( 'This controls the iDEAL %s parameter.', 'pronamic_ideal' ),
					sprintf( '<code>%s</code>', 'purchaseID' )
				),
				sprintf( __( 'Default: <code>%s</code>.', 'pronamic_ideal' ), '{payment_id}' ),
				sprintf( __( 'Tags: %s', 'pronamic_ideal' ), sprintf( '<code>%s</code> <code>%s</code>', '{order_id}', '{payment_id}' ) )
			),
			'methods'     => array( 'ideal_basic', 'ideal_advanced', 'ideal_advanced_v3' ),
		);

		// Return
		return $fields;
	}
}
