<?php

/**
 * Plugin Name: Hospitality Calculators
 * Plugin URI: https://www.innquest.com/support/
 * Description: Provides separate shortcodes for property calculators: ADR, RevPAR, GOPPAR, TRevPAR, TRevPAB, and Occupancy Rate. Includes an admin menu page with shortcode instructions.
 * Version: 2.3
 * Requires at least: 4.7
 * Tested up to: 5.4
 * Stable tag: 4.3
 * Author: Innquest
 * Author URI: https://innquest.com
 * License: GPLv3
 * License URI: http://www.gnu.org/licenses/gpl-3.0.html
 * You should have received a copy of the GNU General Public License
 * along with this program.  If not, see <http://www.gnu.org/licenses/>.
 */

if (!defined('ABSPATH')) {
  exit; // Exit if accessed directly.
}

/**
 * Main Plugin Class
 */
class Property_Calculators_Plugin
{

  private $has_shortcode = false;

  public function __construct()
  {
    // Register shortcodes
    add_shortcode('property_adr', array($this, 'shortcode_adr'));
    add_shortcode('property_revpar', array($this, 'shortcode_revpar'));
    add_shortcode('property_goppar', array($this, 'shortcode_goppar'));
    add_shortcode('property_trevpar', array($this, 'shortcode_trevpar'));
    add_shortcode('property_trevpab', array($this, 'shortcode_trevpab'));
    add_shortcode('property_occupancy', array($this, 'shortcode_occupancy'));

    // Admin menu
    add_action('admin_menu', array($this, 'add_admin_menu'));

    // Detect shortcodes in posts
    add_filter('the_posts', array($this, 'detect_shortcodes'));

    // Enqueue scripts and styles
    add_action('wp_enqueue_scripts', array($this, 'enqueue_assets'));
  }

  /**
   * Add a new top-level admin menu page.
   */
  public function add_admin_menu()
  {
    add_menu_page(
      'Hospitality Calculators',
      'Hospitality Calculators',
      'manage_options',
      'property-calculators',
      array($this, 'admin_page'),
      'dashicons-chart-area',
      6
    );
  }

  /**
   * Render the admin page content.
   */
  public function admin_page()
  {
?>
    <div class="wrap">
      <h1>Hospitality Calculators Shortcodes</h1>
      <p>When adding value to your posts or pages, you can easily insert these shortcodes to display powerful property performance calculators. Each one gives you instant insight into different aspects of your hospitality business:</p>
      <ul>
        <li><strong>[property_adr]</strong> – Property ADR Calculator</li>
        <li><strong>[property_revpar]</strong> – Property RevPAR Calculator</li>
        <li><strong>[property_goppar]</strong> – Property GOPPAR Calculator</li>
        <li><strong>[property_trevpar]</strong> – Property TRevPAR Calculator</li>
        <li><strong>[property_trevpab]</strong> – Property TRevPAB Calculator</li>
        <li><strong>[property_occupancy]</strong> – Property Occupancy Rate Calculator</li>
      </ul>
    </div>
  <?php
  }


  /**
   * Detect if any plugin shortcode is present in the posts
   */
  public function detect_shortcodes($posts)
  {
    if (empty($posts)) return $posts;

    $shortcodes = array('property_adr', 'property_revpar', 'property_goppar', 'property_trevpar', 'property_trevpab', 'property_occupancy');

    foreach ($posts as $post) {
      foreach ($shortcodes as $shortcode) {
        if (has_shortcode($post->post_content, $shortcode)) {
          $this->has_shortcode = true;
          return $posts; // Once detected, no need to check further
        }
      }
    }
    return $posts;
  }

  /**
   * Enqueue scripts and styles if shortcode is present
   */
  public function enqueue_assets()
  {
    if (!$this->has_shortcode) return;

    // Enqueue JavaScript
    wp_enqueue_script(
      'hospitality-calculators',
      plugins_url('hospitality-calculators.js', __FILE__),
      array(),
      '1.1.0',
      true
    );

    // Enqueue CSS
    wp_enqueue_style(
      'hospitality-calculators',
      plugins_url('hospitality-calculators.css', __FILE__),
      array(),
      '1.1.0'
    );
  }

  // Admin menu and shortcode methods remain mostly the same, except for removed inline scripts
  // Example shortcode method (others follow similar structure):

  public function shortcode_adr()
  {
    ob_start();
  ?>
    <div class="property-calculator" id="calculator-adr">
      <h2>Calculate your Property’s ADR</h2>
      <div class="group-wrap">
        <div class="input-group-wrap">
          <div class="input-group">
            <label for="adr_total_room_revenue">Total Room Revenue</label>
            <input type="text" id="adr_total_room_revenue">
            <span class="error" id="adr_total_room_revenue_error"></span>
          </div>
          <div class="input-group">
            <label for="adr_total_rooms_sold">Total Rooms Sold</label>
            <input type="text" id="adr_total_rooms_sold">
            <span class="error" id="adr_total_rooms_sold_error"></span>
          </div>
        </div>
        <button type="button" class="calc-btn" data-calc="adr">Calculate</button>
      </div>
      <div class="result" id="adr_result">Your Property's ADR is:</div>
    </div>
  <?php
    return ob_get_clean();
  }
  public function shortcode_revpar()
  {
    ob_start();
  ?>
    <div class="property-calculator" id="calculator-revpar">
      <h2>Calculate your Property’s RevPAR</h2>
      <div class="group-wrap">
        <div class="input-group-wrap">
          <div class="input-group">
            <label for="revpar_total_room_revenue">Total Rooms Revenue</label>
            <input type="text" id="revpar_total_room_revenue">
            <span class="error" id="revpar_total_room_revenue_error"></span>
          </div>
          <div class="input-group">
            <label for="revpar_total_rooms_available">Total Rooms Available</label>
            <input type="text" id="revpar_total_rooms_available">
            <span class="error" id="revpar_total_rooms_available_error"></span>
          </div>
        </div>
        <button type="button" class="calc-btn" data-calc="revpar">Calculate</button>
      </div>
      <div class="result" id="revpar_result">Your Property's RevPAR is:</div>
    </div>

  <?php
    return ob_get_clean();
  }

  public function shortcode_goppar()
  {
    ob_start();
  ?>
    <div class="property-calculator" id="calculator-goppar">
      <h2>Calculate your Property’s GOPPAR</h2>
      <div class="group-wrap">
        <div class="input-group-wrap">
          <div class="input-group">
            <label for="goppar_gop">Gross Operating Profit (GOP)</label>
            <input type="text" id="goppar_gop">
            <span class="error" id="goppar_gop_error"></span>
          </div>
          <div class="input-group">
            <label for="goppar_total_rooms_available">Total Rooms Available</label>
            <input type="text" id="goppar_total_rooms_available">
            <span class="error" id="goppar_total_rooms_available_error"></span>
          </div>
        </div>
        <button type="button" class="calc-btn" data-calc="goppar">Calculate</button>
      </div>
      <div class="result" id="goppar_result">Your Property's GOPPAR is:</div>
    </div>
  <?php
    return ob_get_clean();
  }

  public function shortcode_trevpar()
  {
    ob_start();
  ?>
    <div class="property-calculator" id="calculator-trevpar">
      <h2>Calculate your Property’s TRevPAR</h2>
      <div class="group-wrap">
        <div class="input-group-wrap">
          <div class="input-group">
            <label for="trevpar_total_revenue">Total Revenue</label>
            <input type="text" id="trevpar_total_revenue">
            <span class="error" id="trevpar_total_revenue_error"></span>
          </div>
          <div class="input-group">
            <label for="trevpar_rooms_available">Rooms Available</label>
            <input type="text" id="trevpar_rooms_available">
            <span class="error" id="trevpar_rooms_available_error"></span>
          </div>
        </div>
        <button type="button" class="calc-btn" data-calc="trevpar">Calculate</button>
      </div>
      <div class="result" id="trevpar_result">Your Property's TRevPAR is:</div>
    </div>

  <?php
    return ob_get_clean();
  }

  public function shortcode_trevpab()
  {
    ob_start();
  ?>
    <div class="property-calculator" id="calculator-trevpab">
      <h2>Calculate your Property’s TRevPAB</h2>
      <div class="group-wrap">
        <div class="input-group-wrap">
          <div class="input-group">
            <label for="trevpab_total_revenue">Total Revenue ($)</label>
            <input type="text" id="trevpab_total_revenue">
            <span class="error" id="trevpab_total_revenue_error"></span>
          </div>
          <div class="input-group">
            <label for="trevpab_total_bed_nights">Total Available Bed Nights</label>
            <input type="text" id="trevpab_total_bed_nights">
            <span class="error" id="trevpab_total_bed_nights_error"></span>
          </div>
        </div>
        <button type="button" class="calc-btn" data-calc="trevpab">Calculate</button>
      </div>
      <div class="result" id="trevpab_result">Your Property's TRevPAB is: </div>
    </div>

  <?php
    return ob_get_clean();
  }

  public function shortcode_occupancy()
  {
    ob_start();
  ?>
    <div class="property-calculator" id="calculator-occupancy">
      <h2>Calculate your Property’s Occupancy Rate</h2>
      <div class="group-wrap">
        <div class="input-group-wrap">
          <div class="input-group">
            <label for="occupancy_total_rooms_occupied">Total Rooms Occupied</label>
            <input type="text" id="occupancy_total_rooms_occupied">
            <span class="error" id="occupancy_total_rooms_occupied_error"></span>
          </div>
          <div class="input-group">
            <label for="occupancy_total_rooms_available">Total Rooms Available</label>
            <input type="text" id="occupancy_total_rooms_available">
            <span class="error" id="occupancy_total_rooms_available_error"></span>
          </div>
        </div>
        <button type="button" class="calc-btn" data-calc="occupancy">Calculate</button>
      </div>
      <div class="result" id="occupancy_result">Your Property’s Occupancy Rate is:</div>

    </div>

<?php
    return ob_get_clean();
  }

  // ... Other shortcode methods (remove inline scripts and modify buttons similarly) ...

}

new Property_Calculators_Plugin();
