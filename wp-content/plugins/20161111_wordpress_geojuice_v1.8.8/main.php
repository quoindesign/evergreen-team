<?php
	/*
	Plugin Name: GeoJuice
	Plugin URI: http://surefiresocial.com/
	Description: GeoJuice - Recent Reviews, Service Area Plugin and Audio Testimonials.
	Version: 1.8.8
	Author: Surefire Social
	Author URI: http://surefiresocial.com/
	*/

	class GeoJuice_ShortCode
	{
		static $add_scripts;

		static function init()
		{
			add_shortcode('recentreviews',			array(__CLASS__, 'get_recent_reviews'));
			add_shortcode('serviceareamap',			array(__CLASS__, 'get_service_area_map'));
			add_shortcode('serviceareareviewcombo', array(__CLASS__, 'get_service_area_review_combo_map'));
			add_shortcode('nntestimonials',	array(__CLASS__, 'get_testimonials'));
			add_shortcode('nnphotogallery',	array(__CLASS__, 'get_photogallery'));
			add_shortcode('checkin',				array(__CLASS__, 'get_checkin'));
			add_shortcode('review',					array(__CLASS__, 'get_review'));

			

			add_action('wp_head', array(__CLASS__, 'register_open_graph'), 1);
			
			

			add_action('init',						array(__CLASS__, 'register_scripts'));
			add_action('wp_footer',					array(__CLASS__, 'render_scripts'));
		}

		

		static function register_open_graph() {
			$checkin_id = $_GET['usercheckin_id'];
			$survey_id = $_GET['css'];
			if (!empty($checkin_id) || !empty($survey_id)) {
				$options = get_option('geojuice_options');
				$exclude_open_graph = $options['open_graph_exclude'];
				if (empty($exclude_open_graph) || !(bool)$exclude_open_graph) {
					$apitoken = $options['text_string'];
					$token = trim($apitoken);
					$url = "http://api.sidebox.com/plugin/opengraph?storefronttoken=$token&checkin_id=$checkin_id&review_id=$survey_id";
					$request = wp_remote_get($url);
					if ( is_wp_error( $request ) ) {
						return;
					}
					$body = wp_remote_retrieve_body( $request );
					if (!is_null($body)) {
						$json = json_decode( $body );
						if(!is_null($json)) {
							echo '<meta property="og:title" content="'.$json->title.'"/>';
							echo '<meta property="og:type" content="article"/>';
							echo '<meta property="og:url" content="'.$json->url.'"/>';
							echo '<meta property="og:image" content="'.$json->image.'"/>';
							echo '<meta property="og:site_name" content="'.$json->site_name.'"/>';
							echo '<meta property="og:description" content="'.$json->description.'"/>';
							echo '<meta property="fb:app_id" content="'.$json->app_id.'"/>';
						}
					}
				}
			}
		}

		

		static function get_checkin($atts)
		{
			self::$add_scripts = true;
			$id = $_GET['usercheckin_id'];
			if (!empty($id)) {
				$agent = urlencode($_SERVER['HTTP_USER_AGENT']);
				if (isset($atts['apikey'])) {
					$token = trim($atts['apikey']);
				}
				else {
					$options = get_option('geojuice_options');
					$apitoken = $options['text_string'];
					$token = trim($apitoken);
				}

				$smm = "yes";
				$sp = "yes";

				if (isset($atts['showminimap']))
					$smm = trim($atts['showminimap']);

				if (isset($atts['showphotos']))
					$sp = trim($atts['showphotos']);

				$url = self::ApiLocation() . "usercheckin?storefronttoken=$token&id=$id&agent=$agent&showminimap=$smm&showphotos=$sp";
				$request = wp_remote_get($url, array( 'timeout' => 15));
				$body = wp_remote_retrieve_body( $request );
				if( is_wp_error( $request ) ) {
					return;
				} else {
					return $body;
				}
			}
		}

		static function get_review($atts)
		{
			self::$add_scripts = true;
			$id = $_GET['css'];
			if (!empty($id)) {
				$agent = urlencode($_SERVER['HTTP_USER_AGENT']);
				if (isset($atts['apikey'])) {
					$token = trim($atts['apikey']);
				}
				else {
					$options = get_option('geojuice_options');
					$apitoken = $options['text_string'];
					$token = trim($apitoken);
				}

				$smm = "yes";

				if (isset($atts['showminimap']))
					$smm = trim($atts['showminimap']);

				$url = self::ApiLocation() . "survey?storefronttoken=$token&id=$id&agent=$agent&showminimap=$smm";
				$request = wp_remote_get($url, array( 'timeout' => 15));
				$body = wp_remote_retrieve_body( $request );
				if( is_wp_error( $request ) ) {
					return;
				} else {
					return $body;
				}
			}
		}

		static function get_recent_reviews($atts)
		{
			self::$add_scripts = true;

			$url = self::ApiLocation() . "nearbyreviews";
			$args = array(
				'method' => 'POST',
				'body' => self::get_pluginparams($atts),
				'timeout' => 15
			);
			$response = wp_remote_post($url, $args);
			if( is_wp_error( $response ) ) {
			   return '';
			} else {
			   return $response['body'];
			}
		}

		static function get_service_area_map($atts)
		{
			self::$add_scripts = true;

			$url = self::ApiLocation() . "nearbyservicearea";
			$args = array(
				'method' => 'POST',
				'body' => self::get_pluginparams($atts),
				'timeout' => 15
			);
			$response = wp_remote_post($url, $args);
			if( is_wp_error( $response ) ) {
			   return '';
			} else {
			   return $response['body'];
			}
		}

		static function get_service_area_review_combo_map($atts)
		{
			self::$add_scripts = true;

			$url = self::ApiLocation() . "nearbyserviceareareviewcombo";
			$args = array(
				'method' => 'POST',
				'body' => self::get_pluginparams($atts),
				'timeout' => 15
			);
			$response = wp_remote_post($url, $args);
			if( is_wp_error( $response ) ) {
			   return '';
			} else {
			   return $response['body'];
			}
		}

		static function get_testimonials($atts)
		{
			self::$add_scripts = true;
			$agent = urlencode($_SERVER['HTTP_USER_AGENT']);
			$start = isset($atts['start']) ? $atts['start'] : '';
			$count = isset($atts['count']) ? $atts['count'] : '';
			$playlist = isset($atts['playlist']) ? $atts['playlist'] : '';
			$showTranscription = isset($atts['showtranscription']) ? $atts['showtranscription'] : '';

			$token = '';
			if(isset($atts['apikey']) ) {
				$token = trim($atts['apikey']);
			} else {
				$options = get_option('geojuice_options');
				$apitoken = $options['text_string'];
				$token = trim($apitoken);
			}

			$url = self::ApiLocation() . "testimonials?storefronttoken=$token&start=$start&count=$count&playlist=$playlist&showtranscription=$showTranscription&agent=$agent";
			$response = wp_remote_get($url, array( 'timeout' => 15));
			if( is_wp_error( $response ) ) {
			   return '';
			} else {
			   return $response['body'];
			}
		}

		static function get_photogallery($atts)
		{
			self::$add_scripts = true;
			$agent = urlencode($_SERVER['HTTP_USER_AGENT']);
			$start = isset($atts['start']) ? $atts['start'] : '';
			$count = isset($atts['count']) ? $atts['count'] : '';

			$token = '';
			if(isset($atts['apikey']) ) {
				$token = trim($atts['apikey']);
			} else {
				$options = get_option('geojuice_options');
				$apitoken = $options['text_string'];
				$token = trim($apitoken);
			}

			$url = self::ApiLocation() . "photogallery?storefronttoken=$token&start=$start&count=$count&agent=$agent";
			$response = wp_remote_get($url, array( 'timeout' => 15));
			if( is_wp_error( $response ) ) {
			   return '';
			} else {
			   return $response['body'];
			}
		}

		static function register_scripts()
		{
			$options = get_option('geojuice_options');
			wp_register_style( 'geojuice_css', 'https://d2gwjd5chbpgug.cloudfront.net/v3/css/nnplugin.min.css' );

	   		wp_register_script( 'geojuice_heatmap', 'https://d2gwjd5chbpgug.cloudfront.net/v3/scripts/heatmap.min.js', null, null, true);
		}

		static function render_scripts()
		{
			if ( ! self::$add_scripts )
				return;

			wp_print_styles('geojuice_css');
			wp_print_scripts('geojuice_heatmap');
		}

		static function ApiLocation()
		{
			return "https://api.sidebox.com/plugin/";
		}

		static function get_pluginparams($atts)
		{
			// Server Variables
			$agent = urlencode($_SERVER['HTTP_USER_AGENT']);
			$referrer = $_SERVER['HTTP_REFERER'];
			$hostUrl = "http" . (($_SERVER['SERVER_PORT'] == 443) ? "s://" : "://") . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];

			// Plugin options
			$token = '';
			if(isset($atts['apikey']) ) {
				$token = trim($atts['apikey']);
			} else {
				$options = get_option('geojuice_options');
				$apitoken = $options['text_string'];
				$token = trim($apitoken);
			}

			// Common Parameters - Appearance
			$showMap = isset($atts['showmap']) ? $atts['showmap'] : '';
			$smm = "yes";
			$sp = "yes";
			if (isset($atts['showminimap']))
				$smm = trim($atts['showminimap']);
			if (isset($atts['showphotos']))
				$sp = trim($atts['showphotos']);

			$zoom = isset($atts['zoomlevel']) ? $atts['zoomlevel'] : '';
			$mapScrollWheel = isset($atts['mapscrollwheel']) ? $atts['mapscrollwheel'] : '';
			$fbLike = isset($atts['fblike']) ? $atts['fblike'] : '';
			$fbcomment = isset($atts['fbcomment']) ? $atts['fbcomment'] : '';
			$serviceAreaName = null;
			if (isset($atts['serviceareaname'])) {
				$serviceAreaName = trim($atts['serviceareaname']);
			}

			// Common Parameters - Filtering
			$state = isset($atts['state']) ? $atts['state'] : '';
			$city = isset($atts['city']) ? $atts['city'] : '';
			$radius = isset($atts['radius']) ? $atts['radius'] : '';
			$showFavorites = isset($atts['showfavorites']) ? $atts['showfavorites'] : '';
			$techEmail = null;
			if (isset($atts['techemail'])) {
				$techEmail = trim($atts['techemail']);
			}

			// servicearea and recentreviews
			$start = isset($atts['start']) ? $atts['start'] : '';
			$count = isset($atts['count']) ? $atts['count'] : '';

			// serviceareareviewcombo
			$reviewStart = isset($atts['reviewstart']) ? $atts['reviewstart'] : '';
			$checkinStart = isset($atts['checkinstart']) ? $atts['checkinstart'] : '';
			$reviewCount = isset($atts['reviewcount']) ? $atts['reviewcount'] : '';
			$checkinCount = isset($atts['checkincount']) ? $atts['checkincount'] : '';
			$reviewCityUrl = null;
			if (isset($atts['reviewcityurl'])) {
				$reviewCityUrl = str_replace('\"', '', trim($atts['reviewcityurl']));
			}
			$mapSize = isset($atts['mapsize']) ? $atts['mapsize'] : '';

			$body = array(
				'agent' => $agent,
				'referrer' => $referrer,
				'hosturl' => $hostUrl,

				'storefronttoken' => $token,

				'showmap' => $showMap,
				'showminimap' => $smm,
				'showphotos' => $sp,
				'zoomlevel' => $zoom,
				'mapscrollwheel' => $mapScrollWheel,
				'fblike' => $fbLike,
				'fbcomment' => $fbcomment,
				'serviceareaname' => $serviceAreaName,

				'state' => $state,
				'city' => $city,
				'radius' => $radius,
				'showfavorites' => $showFavorites,
				'techemail' => $techEmail,

				'start' => $start,
				'count' => $count,

				'reviewstart' => $reviewStart,
				'checkinstart' => $checkinStart,
				'reviewcount' => $reviewCount,
				'checkincount' => $checkinCount,
				'reviewcityurl' => $reviewCityUrl,
				'mapsize' => $mapSize
			);

			return $body;
		}

	}

	GeoJuice_ShortCode::init();

	function geojuice_admin()
	{
		$opt_name = array('api_token' => 'nbn_api_token');
		$hidden_field_name = 'nbn_submit_hidden';
		if(isset($_POST[ $hidden_field_name ]) && $_POST[ $hidden_field_name ] == 'Y' ) {
			$opt_val = array('api_token' => $_POST[ $opt_name['api_token'] ]);
		}
	}

	function geojuice_admin_actions()
	{
    	add_options_page("GeoJuice", "GeoJuice", "manage_options", "GeoJuice", "geojuice_options_page");
	}

	add_action('admin_menu', 'geojuice_admin_actions');
	add_action('admin_init', 'geojuice_admin_init');

	function geojuice_options_page()
	{
		?>

		<div>
			<form action="options.php" method="post">
				<?php settings_fields('geojuice_options'); ?>
				<?php do_settings_sections('geojuice'); ?>
				<input name="Submit" type="submit" value="<?php esc_attr_e('Save Settings'); ?>" />
			</form>
		</div>

		<?php
	}

	function geojuice_admin_init()
	{
		register_setting(
			'geojuice_options',
			'geojuice_options',
			'geojuice_options_validate'
		);

		add_settings_section(
			'geojuice_main',
			'GeoJuice Settings',
			'geojuice_section_text',
			'geojuice'
		);

		add_settings_field(
			'geojuice_text_string',
			'API Token',
			'geojuice_setting_string',
			'geojuice',
			'geojuice_main'
		);

		// add_settings_field(
		// 	'disable_google_maps',
		// 	'Disable Google Map Services',
		// 	'geojuice_google_maps_toggle',
		// 	'geojuice',
		// 	'geojuice_main'
		// );

		

		add_settings_field('geojuice_open_graph_string', 'Exclude Open Graph Headers', 'geojuice_open_graph_string', 'geojuice', 'geojuice_main');

		
	}

	function geojuice_section_text()
	{
		echo '<p>To use the plugin, simply enter one of the plugin short-codes into any page or blog post. Check out some of the examples below to help get you started.</p><pre>[recentreviews city="Mesa" state="AZ" count="10" zoomlevel="9"]</pre><pre>[serviceareamap city="Scottsdale" state="AZ" count="10" zoomlevel="9"]</pre><pre>[serviceareareviewcombo city="Scottsdale" state="AZ" checkincount="10" reviewcount="10" zoomlevel="9"]</pre><pre>[nnphotogallery count="10"]</pre><p>The API Token is required for the GeoJuice plugin to function. If the token is missing or invalid the plugin will display an empty string. Enter your API key below and click save settings.</p>';
	}

	function geojuice_setting_string()
	{
		$options = get_option('geojuice_options');
		echo "<input id='geojuice_text_string' name='geojuice_options[text_string]' size='40' type='text' value='{$options['text_string']}' />";
	}

	function geojuice_google_maps_toggle()
	{
		$options = get_option('geojuice_options');
		$val = "0";

		if ($options['disable_google_maps'] == true)
			$val = "1";

		echo "<input id='disable_google_maps' name='geojuice_options[disable_google_maps]' type='checkbox' value='1' " . checked(1, $options['disable_google_maps'], false) .  " />";
		echo "<p style='display: inline-block; margin-left: 8px'>(Check this flag if you already have a plugin that uses the Google Maps API)</p>";
	}

	

	function geojuice_open_graph_string() {
		$options = get_option('geojuice_options');
		$html = '<input type="checkbox" id="open_graph_exclude" name="geojuice_options[open_graph_exclude]" value="1"' . checked( 1, $options['open_graph_exclude'], false ) . '/>';
		echo $html;
	}

	

	function geojuice_options_validate($input)
	{
		return $input;
	}
?>