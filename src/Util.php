<?php

/**
 * Title: iDEAL utility
 * Description:
 * Copyright: Copyright (c) 2005 - 2016
 * Company: Pronamic
 *
 * @author Remco Tolsma
 * @version 1.0.0
 */
class Pronamic_WP_Pay_Gateways_IDeal_Util {
	/**
	 * Get order ID
	 *
	 * @param string $status
	 */
	public static function get_purchase_id( $purchase_id, $data, $payment ) {
		// Find and replace
		// @see https://github.com/woothemes/woocommerce/blob/v2.0.19/classes/emails/class-wc-email-new-order.php
		$find    = array();
		$replace = array();

		$find[]    = '{order_id}';
		$replace[] = $data->get_order_id();

		$find[]    = '{payment_id}';
		$replace[] = $payment->get_id();

		// Purchase ID
		$purchase_id = str_replace( $find, $replace, $purchase_id, $count );

		// Make sure there is an dynamic part in the purchase ID
		// @see http://pronamic.nl/wp-content/uploads/2011/12/iDEAL_Basic_EN_v2.3.pdf
		if ( 0 === $count ) {
			$purchase_id .= $payment->get_id();
		}

		// Return purchase ID
		return $purchase_id;
	}
}
