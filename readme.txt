=== Hospitality Calculators ===
Contributors: innquest
Donate link: https://innquest.com
Tags: calculator, hotel, revenue
Requires at least: 4.9
Tested up to: 6.7
Stable tag: 2.3
License: GPLv3
Requires PHP: 8.2
License URI: http://www.gnu.org/licenses/gpl-3.0.html

Provides six essential hospitality performance calculators with shortcode integration and admin documentation.

== Description ==
A comprehensive suite of hospitality calculators including:

– ADR (Average Daily Rate)
– RevPAR (Revenue Per Available Room)
– GOPPAR (Gross Operating Profit Per Available Room)
– TRevPAR (Total Revenue Per Available Room)
– TRevPAB (Total Revenue Per Available Bed)
– Occupancy Rate Calculator

Features:
– Responsive design
– Input validation
– Error handling
– Admin documentation
– Easy shortcode implementation
– Mobile-friendly interface

== Installation ==
1. Upload the plugin files to the `/wp-content/plugins/hospitality-calculators` directory
2. Activate the plugin through the 'Plugins' menu in WordPress
3. Access shortcodes through the admin menu (Hospitality Calculators > Shortcodes)

== Frequently Asked Questions ==
= What shortcodes are available? =
[property_adr] – Average Daily Rate Calculator
[property_revpar] – RevPAR Calculator  
[property_goppar] – GOPPAR Calculator
[property_trevpar] – TRevPAR Calculator
[property_trevpab] – TRevPAB Calculator
[property_occupancy] – Occupancy Rate Calculator

= How do I format currency inputs? =
The calculators automatically handle currency symbols. Users can input:
– $1000
– 1000
– 1,000
– 1000.00

= Why am I seeing validation errors? =
The system checks for:
– Non-numeric characters in number fields
– Zero values in denominator fields
– Logical inconsistencies (e.g. occupied rooms > available rooms)

== Screenshots ==
1. Admin interface with shortcode instructions
2. ADR Calculator interface
3. RevPAR Calculator interface
4. Occupancy Rate Calculator with result

== Changelog ==
= 2.0 =
* Added 6 separate calculators
* Enhanced mobile responsiveness
* Added admin documentation page
* Improved error validation
* Added currency formatting support
* Updated CSS styling

= 1.0 =
* Initial release with basic calculator functionality

== Upgrade Notice ==
= 2.0 =
Major update with multiple calculators and admin interface. Recommended for all users.

== License ==
This program is free software: you can redistribute it and/or modify it under the terms of the GNU General Public License as published by the Free Software Foundation, either version 3 of the License, or (at your option) any later version.