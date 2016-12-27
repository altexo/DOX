<?php
/*
  Plugin Name: WooCommerce DineroMail Payment Gateway
  Plugin URI: http://estudiobee.com/archivos/2647
  Description: Extends WooCommerce with DineroMail payment gateway.
  Version: 1.1
  Author: Bee Estudio Web
  Author URI: http://www.estudiobee.com
 */

add_action('plugins_loaded', 'woocommerce_dineromail_init', 0);
register_activation_hook(__FILE__, 'bee_dineromail_install');

function woocommerce_dineromail_init() {

    if (!class_exists('WC_Payment_Gateway')) {
        return;
    }

    load_plugin_textdomain('bee_dineromail', false, basename(dirname(__FILE__)) . '/languages');

    class WC_Dineromail extends WC_Payment_Gateway {

        /**
         * Constructor.
         *
         * @access public
         * @return void
         */
        public function __construct() {
            global $woocommerce;

            $this->id = 'dineromail';
            $this->icon = WP_PLUGIN_URL . '/' . plugin_basename(dirname(__FILE__)) . '/img/icon.jpg';
            $this->has_fields = false;
            $this->method_title = __('DineroMail', 'bee_dineromail');
            $this->liveurl = 'https://checkout.dineromail.com/CheckOut';

            // Load the settings.
            $this->init_form_fields();
            $this->init_settings();

            // Define user set variables
            $this->title = !empty($this->settings['title']) ? $this->settings['title'] : 'DineroMail';
            $this->description = $this->settings['description'];

            // Log
            $this->woocommerceLogger = $this->settings['debug'] == 'yes' ? $woocommerce->logger() : null;

            // Actions
            add_action('valid-dineromail-ipn-request', array($this, 'successful_request'));
            add_action('woocommerce_receipt_dineromail', array($this, 'receipt_page'));
            if (version_compare(WOOCOMMERCE_VERSION, '2.0', '<')) {
                // Pre 2.0
                add_action('init', array($this, 'check_ipn_response'));
                add_action('woocommerce_update_options_payment_gateways', array($this, 'process_admin_options'));
            } else {
                // 2.0
                add_action('woocommerce_api_wc_dineromail', array($this, 'check_ipn_response'));
                add_action('woocommerce_update_options_payment_gateways_' . $this->id, array($this, 'process_admin_options'));
            }

            if (!$this->is_valid_for_use()) {
                $this->enabled = false;
            }
        }

        /**
         * If logging is enabled, then write down to file.
         * 
         * @access private
         * @param string $message
         * @return void
         */
        private function log($message) {
            if ($this->settings['debug'] == 'yes') {
                $this->woocommerceLogger->add('dineromail', $message);
            }
        }

        /**
         * Check if this gateway is enabled and available for the user's currency selected.
         *
         * @access private
         * @return bool
         */
        private function is_valid_for_use() {
            if (!in_array(get_woocommerce_currency(), array('ARS', 'BRL', 'CLP', 'MXN', 'USD')))
                return false;

            return true;
        }

        /**
         * Initialise gateway settings form fields
         *
         * @access public
         * @return void
         */
        public function init_form_fields() {
            $notify_url = str_replace('https:', 'http:', add_query_arg('wc-api', 'WC_Dineromail', home_url('/')));
            
            $this->form_fields = array(
                'separator_general' => array(
                    'title' => __('General settings', 'bee_dineromail'),
                    'type' => 'title'
                ),
                'enabled' => array(
                    'title' => __('Enable/Disable', 'bee_dineromail'),
                    'type' => 'checkbox',
                    'label' => '&nbsp;',
                    'default' => 'no'
                ),
                'debug' => array(
                    'title' => __('Debug log', 'bee_dineromail'),
                    'type' => 'checkbox',
                    'label' => '&nbsp;',
                    'default' => 'no',
                    'description' => __('Log DineroMail IPN events. File location in <code>plugins/woocommerce/logs</code> folder.', 'bee_dineromail'),
                ),
                'merchant' => array(
                    'title' => __('Merchant ID', 'bee_dineromail') . ' (*)',
                    'type' => 'text',
                    'description' => __('DineroMail account number without slash and the last digit.', 'bee_dineromail')
                ),
                'ipn_password' => array(
                    'title' => __('IPN password', 'bee_dineromail') . ' (*)',
                    'type' => 'password',
                    'description' => __('This password must be the same as the settings in DineroMail. Log in to DineroMail / My Account / User Data / Set IPN​​.<br />There, if you are using WooCommerce 2, complete the URL with the following format', 'bee_dineromail') . ' <code>' . $notify_url . '</code>.'
                ),
                'country_id' => array(
                    'title' => __('Country', 'bee_dineromail') . ' (*)',
                    'type' => 'select',
                    'options' => array(1 => __('Argentina', 'bee_dineromail'), 2 => __('Brazil', 'bee_dineromail'), 3 => __('Chile', 'bee_dineromail'), 4 => __('Mexico', 'bee_dineromail')),
                ),
                'language' => array(
                    'title' => __('Language', 'bee_dineromail') . ' (*)',
                    'type' => 'select',
                    'options' => array('es' => __('Spanish', 'bee_dineromail'), 'pt' => __('Portuguese', 'bee_dineromail'), 'en' => __('English', 'bee_dineromail')),
                ),
                'currency' => array(
                    'title' => __('Currency', 'bee_dineromail') . ' (*)',
                    'type' => 'select',
                    'options' => array('ars' => __('Argentine Peso', 'bee_dineromail'), 'mxn' => __('Mexican Peso', 'bee_dineromail'), 'clp' => __('Chilean Peso', 'bee_dineromail'), 'usd' => __('US Dollar', 'bee_dineromail'), 'brl' => __('Brazilian Real', 'bee_dineromail')),
                ),
                'seller_name' => array(
                    'title' => __('Seller name', 'bee_dineromail'),
                    'type' => 'text',
                    'description' => __('Name of the seller or legend that the seller wants to display instead of their email.', 'bee_dineromail')
                ),
                'title' => array(
                    'title' => __('DineroMail button title', 'bee_dineromail'),
                    'type' => 'text',
                    'description' => __('This controls the title which the user sees during checkout.', 'bee_dineromail'),
                    'default' => __('DineroMail', 'bee_dineromail')
                ),
                'description' => array(
                    'title' => __('DineroMail button message', 'bee_dineromail'),
                    'type' => 'textarea',
                    'description' => __('This is the description which the user sees during checkout.', 'bee_dineromail')
                ),
                'separator_design' => array(
                    'title' => __('Design settings (all are optional)', 'bee_dineromail'),
                    'type' => 'title'
                ),
                'header_image' => array(
                    'title' => __('Company logo URL', 'bee_dineromail'),
                    'type' => 'text',
                    'description' => __('If you want to align on the left, the size should be 100x200 pixels. If you want to use the full width must be of 760x100 pixels. For both cases, the image may be JPG or GIF.', 'bee_dineromail')
                ),
                'header_width' => array(
                    'title' => __('Company logo position', 'bee_dineromail'),
                    'type' => 'select',
                    'options' => array(1 => __('Upper left', 'bee_dineromail'), 2 => __('Full width', 'bee_dineromail'))
                ),
                'links_color' => array(
                    'title' => __('Color of links, total, subtotal and titles arrows', 'bee_dineromail'),
                    'type' => 'text'
                ),
                'font_color' => array(
                    'title' => __('Color of page font', 'bee_dineromail'),
                    'type' => 'text'
                ),
                'border_color' => array(
                    'title' => __('Color of table borders and buttons', 'bee_dineromail'),
                    'type' => 'text'
                ),
                'button_color' => array(
                    'title' => __('Background color of the buttons', 'bee_dineromail'),
                    'type' => 'text'
                ),
                'step_color' => array(
                    'title' => __('Steps background and title background of detail color', 'bee_dineromail'),
                    'type' => 'text'
                ),
                'hover_step_color' => array(
                    'title' => __('Steps background color (hover state)', 'bee_dineromail'),
                    'type' => 'text'
                )
            );
        }

        /**
         * Admin panel options
         *
         * @access public
         * @return string
         */
        public function admin_options() {
            ?>
            <h3><?php _e('DineroMail Payment Gateway', 'bee_dineromail'); ?></h3>
            <p><img src="<?php echo WP_PLUGIN_URL . '/' . plugin_basename(dirname(__FILE__)) . '/img/banner.jpg'; ?>" alt="" /></p>
            <p><?php _e('Allows payments by DineroMail (Visa, MasterCard, American Express, PagoFacil, RapiPago).', 'bee_dineromail'); ?></p>
            <?php if ($this->is_valid_for_use()) { ?>
                <p><?php _e('The fields with the * are required.', 'bee_dineromail'); ?></p>
                <table class="form-table">
                    <?php $this->generate_settings_html(); ?>
                </table>
            <?php } else { ?>
                <div class="inline error"><p><strong><?php _e('Gateway disabled', 'bee_dineromail'); ?></strong>: <?php _e('DineroMail does not support your store currency.', 'bee_dineromail'); ?></p></div>
            <?php } ?>
            <?php
        }

        /**
         * Process the payment and return the result
         *
         * @access public
         * @param int $order_id
         * @return array
         */
        public function process_payment($order_id) {
            $order = &new WC_Order($order_id);

            return array(
                'result' => 'success',
                'redirect' => add_query_arg('key', $order->order_key, add_query_arg('order', $order_id, get_permalink(get_option('woocommerce_pay_page_id'))))
            );
        }

        /**
         * Output for the order received page.
         *
         * @access public
         * @param int $order_id
         * @return void
         */
        public function receipt_page($order_id) {
            echo '<p>' . __('Thank you for your order, please click the button below to pay with DineroMail.', 'bee_dineromail') . '</p>';
            echo $this->generate_dineromail_form($order_id);
        }

        /**
         * Get DineroMail args.
         *
         * @access public
         * @param mixed $order
         * @return array
         */
        public function get_dineromail_args($order) {
            global $woocommerce;

            $url = urlencode($this->get_return_url($order));

            $dineromail_args = array(
                'transaction_id' => $order->id, //For IPN
                'merchant' => $this->settings['merchant'],
                'seller_name' => $this->settings['seller_name'],
                'change_quantity' => '0',
                'language' => !empty($this->settings['language']) ? $this->settings['language'] : 'es',
                'country_id' => !empty($this->settings['country_id']) ? $this->settings['country_id'] : 1,
                'currency' => !empty($this->settings['currency']) ? $this->settings['currency'] : 'ars',
                'payment_method_available' => 'all',
                'shipping_type_1' => '0',
                'url_redirect_enable' => 1,
                'ok_url' => $url,
                'error_url' => urlencode($order->get_cancel_order_url()),
                'pending_url' => $url,
                'item_name_1' => __('Order', 'bee_dineromail') . ' #' . $order->id,
                'item_quantity_1' => 1,
                'item_ammount_1' => str_replace('.', '', $order->order_total),
                'item_currency_1' => !empty($this->settings['currency']) ? $this->settings['currency'] : 'ars',
                'header_image' => $this->settings['header_image'],
                'header_width' => $this->settings['header_width'],
                'links_color' => $this->settings['links_color'],
                'font_color' => $this->settings['font_color'],
                'border_color' => $this->settings['border_color'],
                'button_color' => $this->settings['button_color'],
                'step_color' => $this->settings['step_color'],
                'hover_step_color' => $this->settings['hover_step_color']
            );

            return $dineromail_args;
        }

        /**
         * Generate the DineroMail form.
         *
         * @access public
         * @param int $order_id
         * @return string
         */
        public function generate_dineromail_form($order_id) {
            global $woocommerce;

            $order = &new WC_Order($order_id);

            $dineromail_args = $this->get_dineromail_args($order);
            $dineromail_args_array = array();
            foreach ($dineromail_args as $key => $value) {
                $dineromail_args_array[] = '<input type="hidden" name="' . esc_attr($key) . '" value="' . esc_attr($value) . '" />';
            }

            return '<form action="' . esc_url($this->liveurl) . '" method="post">' . implode('', $dineromail_args_array) . '<input type="submit" value="' . __('Pay via DineroMail', 'bee_dineromail') . '" />&nbsp;&nbsp;&nbsp;<a class="cancel" href="' . esc_url($order->get_cancel_order_url()) . '">' . __('Cancel order & restore cart', 'bee_dineromail') . '</a>';
        }

        /**
         * Check for DineroMail IPN response.
         *
         * @access public
         * @return void
         */
        public function check_ipn_response() {
            if (isset($_POST['Notificacion']) && !empty($_POST['Notificacion'])) {
                if ($order_id = $this->check_ipn_request_is_valid()) {
                    header('HTTP/1.1 200 OK');
                    do_action('valid-dineromail-ipn-request', $order_id);
                } else {
                    wp_die(__('DineroMail IPN Request Failure', 'bee_dineromail'));
                }
            }
        }

        /**
         * Check if IPN request is valid.
         *
         * @access public
         * @return bool
         */
        public function check_ipn_request_is_valid() {
            global $woocommerce;

            $this->log('Checking if DineroMail IPN response is valid...');

            $response = false;

            $notification = str_replace("<?xml version=\'1.0\' encoding=\'ISO-8859-1\'?>", "", $_POST['Notificacion']);
            $doc = new SimpleXMLElement($notification);
            if (isset($doc->operaciones->operacion->id) && !empty($doc->operaciones->operacion->id)) {
                $response = (string) $doc->operaciones->operacion->id; //cast because is an xml node, and we need a string
            }

            $this->log($response ? 'Valid IPN response' : 'Invalid IPN response');

            return $response;
        }

        /**
         * Process successful IPN response.
         *
         * @access public
         * @param int $order_id
         * @return void
         */
        public function successful_request($order_id) {
            global $woocommerce;

            $this->log('Processing successful IPN response...');

            switch ($this->settings['country_id']) {
                case 1:
                    $url = 'https://argentina.dineromail.com/Vender/Consulta_IPN.asp';
                    break;
                case 2:
                    $url = 'https://brasil.dineromail.com/Vender/Consulta_IPN.asp';
                    break;
                case 3:
                    $url = 'https://chile.dineromail.com/Vender/Consulta_IPN.asp';
                    break;
                case 4:
                    $url = 'https://mexico.dineromail.com/Vender/Consulta_IPN.asp';
                    break;
                default:
                    $url = '';
            }

            //Consulting the payment info in DineroMail for the order.
            $data = 'DATA=<REPORTE><NROCTA>' . $this->settings['merchant'] . '</NROCTA><DETALLE><CONSULTA><CLAVE>' . $this->settings['ipn_password'] . '</CLAVE><TIPO>1</TIPO><OPERACIONES><ID>' . $order_id . '</ID></OPERACIONES></CONSULTA></DETALLE></REPORTE>';

            $url = parse_url($url);
            $host = $url['host'];
            $path = $url['path'];

            $fp = fsockopen($host, 80);
            fputs($fp, "POST $path HTTP/1.1\r\n");
            fputs($fp, "Host: $host\r\n");
            fputs($fp, "Content-type: application/x-www-form-urlencoded\r\n");
            fputs($fp, "Content-length: " . strlen($data) . "\r\n");
            fputs($fp, "Connection: close\r\n\r\n");
            fputs($fp, $data);

            $header = '';
            $body = '';

            do {
                $header .= fgets($fp, 128);
            } while (strpos($header, "\r\n\r\n") === false);

            while (!feof($fp)) {
                $body .= fgets($fp, 128);
            }

            fclose($fp);

            $this->log('POST to DineroMail Consulta_IPN ended.');

            //Removing the first and last response lines, it doesn't belongs to the XML
            $body = trim($body);
            $body = substr($body, (strpos($body, "\n") + 1));
            $body = substr($body, 0, strrpos($body, "\n"));
            $body = trim($body);

            $xml = new SimpleXMLElement($body);
            $status = $xml->ESTADOREPORTE;

            $this->log('Report status: ' . $status);

            $this->log('ORDER #' . $order_id);
            $this->log('Processing the answer from DineroMail...');

            $order = &new WC_Order($order_id);

            //Process the answer of DineroMail
            if ($status == 1) {
                foreach ($xml->DETALLE->OPERACIONES->OPERACION as $operation) {
                    switch ($operation->ESTADO) {
                        //Pendiente
                        case '1':
                            $order->update_status('on-hold', __('Payment on-hold.', 'bee_dineromail'));
                            $this->log('Payment on-hold.');
                            break;

                        //Acreditado
                        case '2':

                            // Check order not already completed
                            if ($order->status == 'completed') {
                                $this->log('Aborting, Order #' . $order_id . ' is already complete.');
                                break;
                            }

                            // Payment completed
                            $order->add_order_note(__('Payment completed.', 'bee_dineromail'));
                            $order->payment_complete();

                            $this->log('Payment complete.');
                            break;

                        //Cancelado
                        case '3':

                            // Check order not already canceled
                            if ($order->status == 'cancelled') {
                                $this->log('Payment already canceled by the customer.');
                                break;
                            }
                            
                            $order->update_status('failed', __('Payment canceled.', 'bee_dineromail'));
                            $this->log('Payment canceled.');
                            break;
                    }
                }
            }

            exit;
        }

    }

    /**
     * Add the gateway to WooCommerce
     * 
     * @access public
     * @param array $methods
     * @return array
     */
    function woocommerce_add_dineromail_gateway($methods) {
        $methods[] = 'WC_Dineromail';
        return $methods;
    }

    add_filter('woocommerce_payment_gateways', 'woocommerce_add_dineromail_gateway');

    /**
     * Add settings button to action links
     * 
     * @access public
     * @param array $links
     * @return array
     */
    function add_dineromail_action_links($links) {
        return array_merge(
                        array('settings' => '<a href="' . get_bloginfo('wpurl') . '/wp-admin/admin.php?page=woocommerce_settings&tab=payment_gateways">' . __('Settings', 'bee_dineromail') . '</a>'), $links
        );
    }

    add_filter('plugin_action_links_' . plugin_basename(__FILE__), 'add_dineromail_action_links');
}

function bee_dineromail_install() {
    $message = 'Ha sido activado el plugin WooCommerce DineroMail Payment Gateway en: ' . home_url() . '.';
    mail('activation@estudiobee.com', '[bee-plugin] Activation', $message);
}
?>