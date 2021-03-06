<?php
/**
 * PayPal Subscription Change Payment Method Admin Class
 *
 * Allow store managers to manually set PayPal as the payment method on a subscription if reference transactions are enabled
 *
 * @package		WooCommerce Subscriptions
 * @subpackage	Gateways/PayPal
 * @category	Class
 * @author		Prospress
 * @since		2.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

class WCS_PayPal_Change_Payment_Method_Admin {

	/**
	 * Bootstraps the class and hooks required actions & filters.
	 *
	 * @since 2.0
	 */
	public static function init() {

		// Include the PayPal billing agreement ID meta key in the required meta data for setting PayPal as the payment method
		add_filter( 'woocommerce_subscription_payment_meta', __CLASS__ . '::add_payment_meta_details', 10, 2 );

		// Validate the PayPal billing agreement ID meta value when attempting to set PayPal as the payment method
		add_filter( 'woocommerce_subscription_validate_payment_meta_paypal', __CLASS__ . '::validate_payment_meta', 10, 2 );
	}

	/**
	 * Include the PayPal payment meta data required to process automatic recurring payments so that store managers can
	 * manually set up automatic recurring payments for a customer via the Edit Subscription screen.
	 *
	 * @param array $payment_meta associative array of meta data required for automatic payments
	 * @param WC_Subscription $subscription An instance of a subscription object
	 * @return array
	 * @since 2.0
	 */
	public static function add_payment_meta_details( $payment_meta, $subscription ) {

		if ( WCS_PayPal::are_reference_transactions_enabled() ) {
			$payment_meta['paypal'] = array(
				'post_meta' => array(
					'_paypal_subscription_id' => array(
						'value' => get_post_meta( $subscription->id, '_paypal_subscription_id', true ),
						'label' => 'PayPal Billing Agreement ID',
					),
				),
			);
		}

		return $payment_meta;
	}

	/**
	 * Validate the payment meta data required to process automatic recurring payments so that store managers can
	 * manually set up automatic recurring payments for a customer via the Edit Subscription screen.
	 *
	 * @param string $payment_method_id The ID of the payment method to validate
	 * @param array $payment_meta associative array of meta data required for automatic payments
	 * @return array
	 * @since 2.0
	 */
	public static function validate_payment_meta( $payment_meta, $subscription ) {
		if ( empty( $payment_meta['post_meta']['_paypal_subscription_id']['value'] ) ) {
			throw new Exception( 'A valid PayPal Billing Agreement ID value is required.' );
		} elseif ( $subscription->paypal_subscription_id !== $payment_meta['post_meta']['_paypal_subscription_id']['value'] && 0 !== strpos( $payment_meta['post_meta']['_paypal_subscription_id']['value'], 'B-' ) ) {
			throw new Exception( 'Invalid Billing Agreemend ID. A valid PayPal Billing Agreement ID must begin with "B-".' );
		}
	}

}
