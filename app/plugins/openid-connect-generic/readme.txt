=== OpenID Connect Generic Client ===
Contributors: daggerhart
Donate link: http://www.daggerhart.com/
Tags: security, login, oauth2, openidconnect, apps, authentication, autologin, sso 
Requires at least: 4
Tested up to: 4.2.2
Stable tag: trunk
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

A simple client that provides SSO or opt-in authentication against a generic OAuth2 Server implementation.

== Description ==

This plugin allows to authenticate users against OpenID Connect OAuth2 API with Authorization Code Flow.
Once installed, it can be configured to automatically authenticate users (SSO), or provide a "Login with OpenID Connect"
button on the login form. After consent has been obtained, an existing user is automatically logged into WordPress, while 
new users are created in WordPress database.

Much of the documentation can be found on the Settings > OpenID Connect Generic dashboard page.

Originally based on the plugin provided by shirounagi - https://wordpress.org/plugins/generic-openid-connect/ - but 
has been completely rewritten.

== Installation ==

1. Upload to the `/wp-content/plugins/` directory
1. Activate the plugin
1. Visit Settings > OpenID Connect and configure to meet your needs

== Frequently Asked Questions ==

= What is the client's Redirect URI? =

Most OAuth2 servers will require whitelisting a set of redirect URIs for security purposes. The Redirect URI provided
by this client is like so:  https://example.com/wp-admin/admin-ajax.php?action=openid-connect-authorize

Replace `example.com` with your domain name and path to WordPress.


== Changelog ==

= 3.0.5 =

* Added [openid_connect_generic_login_button] shortcode to allow the login button to be placed anywhere
* Added setting to "Redirect Back to Origin Page" after a successful login instead of redirecting to the home page.

= 3.0.4 =

* Added setting to allow linking existing WordPress user accounts with newly-authenticated OpenID Connect login

= 3.0.3 =

* Using WordPresss's is_ssl() for setcookie()'s "secure" parameter
* Bug fix: Incrementing username in case of collision.
* Bug fix: Wrong error sent when missing token body

= 3.0.2 =

* Added http_request_timeout setting

= 3.0.1 =

* Finalizing 3.0.x api

= 3.0 =

* Complete rewrite to separate concerns
* Changed settings keys for clarity (requires updating settings if upgrading from another version)
* Error logging

= 2.1 =

* Possible breaking change.  Now checking for preferred_username as priority.
* New username determination to avoid collisions

= 2.0 =

Complete rewrite of another plugin

