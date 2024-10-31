<?php
/*
Plugin Name: Private WP 2
Plugin URI: http://neolee.cn/wordpress/private-wp-2
Description: Makes your blog (including RSS feeds) accessible only to logged in users.
Version: 1.0
Author: Neo Lee
Author URI: http://neolee.cn

    This program is free software: you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation, either version 3 of the License, or
    (at your option) any later version.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program.  If not, see <http://www.gnu.org/licenses/>.

*/
?>
<?php
function private_wp() {
if (!is_user_logged_in())  {
	auth_redirect();
	}
}
function log_in_message ($error) {
	global $error;
	$error="Sorry, you must login to view this blog.";
	return $error;
}
add_filter('login_headertitle','log_in_message');
add_action('do_feed', 'private_wp',1);
add_action('do_feed_rdf', 'private_wp',1);
add_action('do_feed_rss', 'private_wp',1);
add_action('do_feed_rss2', 'private_wp',1);
add_action('do_feed_atom', 'private_wp',1);
add_action('get_header', 'private_wp');
?>