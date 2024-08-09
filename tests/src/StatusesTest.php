<?php

namespace Pronamic\WordPress\Pay\Gateways\IDeal;

use WP_UnitTestCase;

/**
 * Title: iDEAL statuses constants tests
 * Description:
 * Copyright: 2005-2024 Pronamic
 * Company: Pronamic
 *
 * @author Remco Tolsma
 * @version 2.0.0
 * @link https://www.mollie.nl/support/documentatie/betaaldiensten/ideal/en/
 */
class StatusesTest extends WP_UnitTestCase {
	/**
	 * Test transform.
	 *
	 * @dataProvider status_matrix_provider
	 */
	public function test_status_constant( $status, $expected ) {
		$this->assertEquals( $expected, $status );
	}

	public function status_matrix_provider() {
		return [
			[ Statuses::SUCCESS, 'Success' ],
			[ Statuses::CANCELLED, 'Cancelled' ],
			[ Statuses::EXPIRED, 'Expired' ],
			[ Statuses::FAILURE, 'Failure' ],
			[ Statuses::OPEN, 'Open' ],
		];
	}
}
