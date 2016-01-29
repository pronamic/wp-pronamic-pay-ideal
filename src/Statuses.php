<?php

/**
 * Title: iDEAL statuses constants
 * Description:
 * Copyright: Copyright (c) 2005 - 2016
 * Company: Pronamic
 *
 * @author Remco Tolsma
 * @version 1.0.0
 */
class Pronamic_WP_Pay_Gateways_IDeal_Statuses {
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
}
