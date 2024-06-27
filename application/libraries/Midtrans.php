<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Midtrans
{
	public function __construct()
	{
		// Load Composer's autoload
		require APPPATH . '../vendor/autoload.php';

		$CI = &get_instance();
		$CI->config->load('midtrans', TRUE);

		\Midtrans\Config::$serverKey = $CI->config->item('midtrans_server_key', 'midtrans');
		\Midtrans\Config::$isProduction = $CI->config->item('midtrans_is_production', 'midtrans');
		\Midtrans\Config::$isSanitized = $CI->config->item('midtrans_is_sanitized', 'midtrans');
		\Midtrans\Config::$is3ds = $CI->config->item('midtrans_is_3ds', 'midtrans');
	}

	public function getSnapToken($params)
	{
		return \Midtrans\Snap::getSnapToken($params);
	}
}
