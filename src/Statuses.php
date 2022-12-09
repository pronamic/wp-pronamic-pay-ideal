<?php

namespace Pronamic\WordPress\Pay\Gateways\IDeal;

/**
 * Title: iDEAL statuses constants
 * Description:
 * Copyright: 2005-2022 Pronamic
 * Company: Pronamic
 *
 * @author Remco Tolsma
 * @version 2.0.0
 */
class Statuses {
	/**
	 * Status indicator for success
	 *
	 * @var string
	 */
	const SUCCESS = 'Success';

	/**
	 * Status indicator for cancelled
	 *
	 * @var string
	 */
	const CANCELLED = 'Cancelled';

	/**
	 * Status indicator for expired
	 *
	 * @var string
	 */
	const EXPIRED = 'Expired';

	/**
	 * Status indicator for failure
	 *
	 * @var string
	 */
	const FAILURE = 'Failure';

	/**
	 * Status indicator for open
	 *
	 * @var string
	 */
	const OPEN = 'Open';

	/**
	 * Check if status is valid.
	 *
	 * @param string $status Status to validate.
	 * @return bool
	 */
	public static function is_valid( $status ): bool {
		return \in_array(
			$status,
			[
				self::SUCCESS,
				self::CANCELLED,
				self::EXPIRED,
				self::FAILURE,
				self::OPEN,
			],
			true
		);
	}
}
