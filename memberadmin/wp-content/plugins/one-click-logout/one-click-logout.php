<?php
/*
Plugin Name: One Click Logout
Plugin URI: http://wordpress.org/plugins/one-click-logout/
Description: Logging Out from WordPress DashBoard with a Single One Click Logout (Build 2014-06-16)
Version: 1.2.1
Author: <a title="Visit author homepage" href="http://slangji.wordpress.com/">sLaNGjIs</a> & <a title="Visit plugin-master-author homepage" href="http://www.rackofpower.com/">olyma</a>
Network: true
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html
Indentation: GNU style coding standard
Indentation URI: http://www.gnu.org/prep/standards/standards.html
Humans: We are the humans behind
Humans URI: http://humanstxt.org/Standard.html
 *
 * LICENSING (license.txt)
 *
 * [One Click Logout](//wordpress.org/plugins/one-click-logout/)
 *
 * Logging Out from the WordPress DashBoard with a Single One Click Logout
 *
 * Copyright (C) 2010-2014 [slangjis](//slangji.wordpress.com/) (email: <slangjis [at] googlemail [dot] com>)
 *
 * This program is free software; you can redistribute it and/or
 * modify it under the terms of the [GNU General Public License](//wordpress.org/about/gpl/)
 * as published by the Free Software Foundation; either version 2
 * of the License, or (at your option) any later version.
 *
 * This program is free software; you can redistribute it and/or
 * modify it under the terms of the [GNU General Public License](//wordpress.org/about/gpl/)
 * as published by the Free Software Foundation; either version 2
 * of the License, or (at your option) any later version.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program; if not, see [GNU General Public Licenses](//www.gnu.org/licenses/),
 * or write to the Free Software Foundation, Inc., 51 Franklin Street,
 * Fifth Floor, Boston, MA 02110-1301, USA.
 *
 * DISCLAIMER
 *
 * This program is distributed "AS IS" in the hope that it will be useful, but:
 * without any warranty of function, without any warranty of merchantability,
 * without any fitness for a particular or specific purpose, without any type
 * of future assistance from your own author or other authors.
 *
 * The license under which the WordPress software is released is the GPLv2 (or later) from the
 * Free Software Foundation. A copy of the license is included with every copy of WordPress.
 *
 * Part of this license outlines requirements for derivative works, such as plugins or themes.
 * Derivatives of WordPress code inherit the GPL license.
 *
 * There is some legal grey area regarding what is considered a derivative work, but we feel
 * strongly that plugins and themes are derivative work and thus inherit the GPL license.
 *
 * The license for this software can be found on [Free Software Foundation](//www.gnu.org/licenses/gpl-2.0.html) and as license.txt into this plugin package.
 *
 * The author of this plugin is available at any time, to make all changes, or corrections, to respect these specifications.
 *
 * THERMS
 *
 * According to the Terms of the GNU General Public License version 2 (or later) part of Copyright belongs to your own author and part belongs to their respective others authors:
 *
 * Copyright (C) 2010-2014 [slangjis](//slangji.wordpress.com/) (email: <slangjis [at] googlemail [dot] com>)
 * Copyright (C) 2011-2014 [olyma](//www.rackofpower.com/) (email: <olyma [at] rackofpower [dot] com>)
 *
 * VIOLATIONS
 *
 * [Violations of the GNU Licenses](//www.gnu.org/licenses/gpl-violation.en.html)
 * The author of this plugin is available at any time, to make all changes, or corrections, to respect these specifications.
 *
 * GUIDELINES
 *
 * This software meet [Detailed Plugin Guidelines](//wordpress.org/plugins/about/guidelines/)
 * paragraphs 1,4,10,12,13,16,17 quality requirements.
 * The author of this plugin is available at any time, to make all changes, or corrections, to respect these specifications.
 *
 * CODING
 *
 * This software implement [GNU style](//www.gnu.org/prep/standards/standards.html) coding standard indentation.
 * The author of this plugin is available at any time, to make all changes, or corrections, to respect these specifications.
 *
 * VALIDATION
 *
 * This readme.txt rocks. Seriously. Flying colors. It meet the specifications according to
 * WordPress [Readme Validator](//wordpress.org/plugins/about/validator/) directives.
 * The author of this plugin is available at any time, to make all changes, or corrections, to respect these specifications.
 *
 * HUMANS (humans.txt)
 *
 * We are the Humans behind this project [humanstxt.org](//humanstxt.org/Standard.html)
 *
 * This software meet detailed humans rights belongs to your own author and to their respective other authors.
 * The author of this plugin is available at any time, to make all changes, or corrections, to respect these specifications.
 *
 * THANKS
 *
 * To olyma @ www.rackofpower.com for this plugin!
 *
 * TODOLIST
 *
 * [to-do list and changelog](//wordpress.org/plugins/one-click-logout/changelog/)
 *
 * End of October 2014
 *
 * Planned for Version 1.3.0 - Maintenance Refresh Release
 * Planned for Version 1.3.0 - Code Cleanup and Optimization
 * Planned for Version 1.3.0 - Class Isolation and Functions Redesigned
 *
 */

	if ( ! function_exists( 'add_action' ) )

		{

			header( 'HTTP/0.9 403 Forbidden' );
			header( 'HTTP/1.0 403 Forbidden' );
			header( 'HTTP/1.1 403 Forbidden' );
			header( 'Status: 403 Forbidden' );
			header( 'Connection: Close' );

				exit;

		}

	if ( ! defined( 'ABSPATH' ) ) exit;

	if ( ! defined( 'WPINC' ) ) exit;

	global $wp_version;

	if ( $wp_version < 3.3 )

		{

			wp_die( __( 'This Plugin Requires WordPress 3.3+ or Greater: Activation Stopped!' ) );

		}

	add_action( 'activated_plugin' , 'ocl_1st', 0 );

	function ocl_1st()

		{

			$wp_path_to_this_file = preg_replace( '/(.*)plugins\/(.*)$/', WP_PLUGIN_DIR . "/$2", __FILE__ );
			$this_plugin          = plugin_basename( trim( $wp_path_to_this_file ) );
			$active_plugins       = get_option( 'active_plugins' );
			$this_plugin_key      = array_search( $this_plugin, $active_plugins );

			if ( $this_plugin_key )

				{

					array_splice( $active_plugins, $this_plugin_key, 1 );
					array_unshift( $active_plugins, $this_plugin );
					update_option( 'active_plugins', $active_plugins );

				}

		}

	add_action( 'wp_before_admin_bar_render' , 'ocl_remove_old_logout' );

	function ocl_remove_old_logout()

		{

			global $wp_admin_bar;

			$wp_admin_bar->remove_node( 'my-account' );

			$wp_admin_bar->remove_menu( 'wp-logo' );
			$wp_admin_bar->remove_menu( 'about' );
			$wp_admin_bar->remove_menu( 'wporg' );
			$wp_admin_bar->remove_menu( 'documentation' );
			$wp_admin_bar->remove_menu( 'support-forums' );
			$wp_admin_bar->remove_menu( 'feedback' );

		}

	if ( $wp_version > 3.8 )

		{

			add_action( 'admin_bar_menu' , 'ocl_newlogout' );

		}

	if ( $wp_version < 3.8 )

		{

			add_action( 'admin_bar_menu' , 'ocl_newlogoutold' );

		}

	function ocl_newlogout()

		{

?>
<style type="text/css">
table#one-click-logout tr td a:link,
table#one-click-logout tr td a:visited{
	color:white;
	text-decoration:none
}
table#one-click-logout tr td a:active,
table#one-click-logout tr td a:focus,
table#one-click-logout tr td a:hover{
	color:#2EA2CC;
	text-decoration:none
}
table#one-click-logout{
	background:#222222;
	float:right;
	padding-left:0;
	padding-right:20px;
	position:fixed;
	right:0;
	top:0;
	z-index:100000
}
body table#one-click-logout tr td{
	color:#CCCCCC;
	font-family:sans-serif;
	font-size:13px;
	line-height:2.4
}
body.wp-admin table#one-click-logout{
	border-collapse:collapse;
	border-spacing:0;
	margin:0
}
body.wp-admin table#one-click-logout tr td{
	border:0;
	height:32px;
	padding-right:20px;
	padding-top:0
}
body.logged-in table#one-click-logout{
	border-collapse:collapse;
	border-spacing:0;
	margin:0
}
body.logged-in table#one-click-logout tr td{
	border:0;
	height:32px;
	padding-right:20px;
	padding-top:0
}
ul#adminmenu{
	margin-top:0
}
</style>
<table id="one-click-logout" border="0" cellspacing="0" cellpadding="0">
<tr>
<td align="center" valign="center">
<?php

			echo date_i18n( get_option( 'date_format' ) );

			echo ' @ ' . date_i18n( get_option( 'time_format' ) );

 			wp_get_current_user();

			$current_user = wp_get_current_user();

			if ( ! ( $current_user instanceof WP_User ) ) return;

			echo ' | ' . $current_user->display_name . '';

			if ( is_multisite() && is_super_admin() )

				{

					if ( ! is_network_admin() )

						{

							echo ' | <a title="' . $current_user->display_name . '" href="' . network_admin_url() . '">' . __( 'Network Admin' ) . '</a>';

						}

					else

						{

							echo ' | <a title="' . $current_user->display_name . '" href="' . admin_url() . '">' . __( 'Site Admin' ) . '</a>';

						}

				}

			echo ' | <a title="' . $current_user->display_name . '" href="' . wp_logout_url() . '">' . __('Log Out') . '</a>';

?>
</td>
</tr>
</table>
<?php 

		}

	function ocl_newlogoutold()

		{

?>
<style type="text/css">
table#one-click-logout tr td a:link,
table#one-click-logout tr td a:visited{
	color:#CCCCCC;
	text-decoration:none
}
table#one-click-logout tr td a:active,
table#one-click-logout tr td a:focus,
table#one-click-logout tr td a:hover{
	color:#FAFAFA;
	text-decoration:none
}
table#one-click-logout{
	background:#464646;
	float:right;
	padding-left:0;
	padding-right:20px;
	position:fixed;
	right:0;
	top:0;
	z-index:100000
}
body table#one-click-logout tr td{
	color:#CCCCCC;
	font-family:sans-serif;
	font-size:13px;
	line-height:2.1
}
body.wp-admin table#one-click-logout{
	border-collapse:collapse;
	border-spacing:0;
	margin:0
}
body.wp-admin table#one-click-logout tr td{
	border:0;
	height:28px;
	padding-right:20px;
	padding-top:0
}
body.logged-in table#one-click-logout{
	border-collapse:collapse;
	border-spacing:0;
	margin:0
}
body.logged-in table#one-click-logout tr td{
	border:0;
	height:28px;
	padding-right:20px;
	padding-top:0
}
#adminmenushadow,
#adminmenuback{
	background-image:none !important
}
#adminmenu li.wp-menu-separator{
	height:0;
	border-style:none
}
.icon32{
	display:none
}
</style>
<table id="one-click-logout" border="0" cellspacing="0" cellpadding="0">
<tr>
<td align="center" valign="center">
<?php

			echo date_i18n( get_option( 'date_format' ) );

			echo ' @ ' . date_i18n( get_option( 'time_format' ) );

 			wp_get_current_user();

			$current_user = wp_get_current_user();

			if ( ! ( $current_user instanceof WP_User ) ) return;

			echo ' | ' . $current_user->display_name . '';

			if ( is_multisite() && is_super_admin() )

				{

					if ( ! is_network_admin() )

						{

							echo ' | <a title="' . $current_user->display_name . '" href="' . network_admin_url() . '">' . __( 'Network Admin' ) . '</a>';

						}

					else

						{

							echo ' | <a title="' . $current_user->display_name . '" href="' . admin_url() . '">' . __( 'Site Admin' ) . '</a>';

						}

				}

			echo ' | <a title="' . $current_user->display_name . '" href="' . wp_logout_url() . '">' . __('Log Out') . '</a>';

?>
</td>
</tr>
</table>
<?php 

		}

	add_filter( 'plugin_row_meta' , 'ocl_prml' , 10 , 2 );

	function ocl_prml( $links , $file )

		{

			if ( $file == plugin_basename( __FILE__ ) )

				{

					$links[] = '<a title="Bugfix and Suggestions" href="//slangji.wordpress.com/contact/">Contact</a>';

					$links[] = '<a title="Offer a Beer to sLa" href="//slangji.wordpress.com/donate/">Donate</a>';

					$links[] = '<a title="Visit other author plugins site" href="//slangji.wordpress.com/plugins/">Other</a>';

				}

			return $links;

		}

	add_action( 'wp_head' , 'ocl_shfl' );
	add_action( 'wp_footer' , 'ocl_shfl' );

	function ocl_shfl()

		{

			echo "\n<!--Plugin One Click Logout 1.2.1 Build 2014-06-16 Active - Tag ".md5(md5("".""))."-->\n";

		}

?>