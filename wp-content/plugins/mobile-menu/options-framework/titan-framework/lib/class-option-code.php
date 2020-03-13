<?php

/**
 * Code Option Class
 *
 * @author Benjamin Intal
 * @package Titan Framework Core
 **/

if ( ! defined( 'ABSPATH' ) ) { exit; // Exit if accessed directly
}
/**
 * Code Option Class
 *
 * @since	1.3
 **/
class TitanFrameworkOptionCode extends TitanFrameworkOption {


	/**
	 * Default settings specific for this container
	 * @var array
	 */
	public $defaultSecondarySettings = array(

		/**
		 * (Optional) The language used for syntax highlighting for this option. The list of all supported languages are available in the Ace GitHub repo.
		 * @since 1.0
		 * @var string
		 */
		'lang' => 'css',

		/**
		 * (Optional) The color theme used in the option. The list of all supported themes are available in the Ace GitHub repo.
		 * @since 1.0
		 * @var string
		 */
		'theme' => 'chrome',

		/**
		 * (Optional) The height of the editor in pixels.
		 * @since 1.0
		 * @var string
		 */
		'height' => 200,

		/**
		 * (Optional) The inputted code is automatically included in the frontend if the <code>lang</code> parameter is <code>css</code> or <code>javascript</code>. Setting this to false forces the option to stop including the code in the front end. This is useful if you want to use the option value in the back end or somewhere else.
		 * @since 1.9.3
		 * @var bool
		 */
		'enqueue' => true,
	);


	/**
	 * Constructor
	 *
	 * @since	1.3
	 */
	function __construct( $settings, $owner ) {
		parent::__construct( $settings, $owner );

		add_action( 'admin_enqueue_scripts', array( $this, 'loadAdminScripts' ) );

		// CSS generation for CSS code langs
		add_filter( 'tf_generate_css_code_' . $this->getOptionNamespace(), array( $this, 'generateCSSCode' ), 10, 2 );
		add_filter( 'wp_head', array( $this, 'printCSSForPagesAndPosts' ), 100 );

		// JS inclusion for Javascript code langs
		add_filter( 'wp_footer', array( $this, 'printJS' ), 100 );
		add_filter( 'wp_footer', array( $this, 'printJSForPagesAndPosts' ), 101 );
	}


	/**
	 * Prints javascript code in the header using wp_print_scripts
	 *
	 * @return	void
	 * @since	1.3
	 */
	public function printJS() {

		// Allow the enqueue setting to stop this.
		if ( ! $this->settings['enqueue'] ) {
			return;
		}

		// For CSS langs only
		if ( $this->settings['lang'] != 'javascript' ) {
			return;
		}

		// For non-meta box options only
		if ( TitanFrameworkOption::TYPE_META == $this->type ) {
			return;
		}

		$js = $this->getValue();

		if ( ! empty( $js ) ) {
			printf( "<script type=\"text/javascript\">\n%s\n</script>\n", $js );
		}
	}


	/**
	 * Prints javascript code in the header for meta options using wp_print_scripts
	 *
	 * @return	void
	 * @since	1.3
	 */
	public function printJSForPagesAndPosts() {

		// Allow the enqueue setting to stop this.
		if ( ! $this->settings['enqueue'] ) {
			return;
		}

		// This is for meta box options only, other types get generated normally
		if ( TitanFrameworkOption::TYPE_META != $this->type ) {
			return;
		}

		// For CSS langs only
		if ( $this->settings['lang'] != 'javascript' ) {
			return;
		}

		// Don't generate CSS for non-pages and non-posts
		$id = get_the_ID();
		if ( empty( $id ) || 1 == $id || ! is_singular() ) {
			return;
		}

		?>
		<script>
		<?php echo $this->getValue( $id ) ?>
		</script>
		<?php
	}


	/**
	 * Prints CSS styles in the header for meta options using wp_print_scripts
	 *
	 * @return	void
	 * @since	1.3
	 */
	public function printCSSForPagesAndPosts() {

		// Allow the enqueue setting to stop this.
		if ( ! $this->settings['enqueue'] ) {
			return;
		}

		// This is for meta box options only, other types get generated normally
		if ( TitanFrameworkOption::TYPE_META != $this->type ) {
			return;
		}

		// For CSS langs only
		if ( $this->settings['lang'] != 'css' ) {
			return;
		}

		// Don't generate CSS for non-pages and non-posts
		$id = get_the_ID();
		if ( empty( $id ) || 1 == $id || ! is_singular() ) {
			return;
		}

		// Check if a CSS was entered
		$css = $this->getValue( $id );
		if ( empty( $css ) ) {
			return;
		}

		// Print out valid CSS only
		require_once( trailingslashit( dirname( dirname( __FILE__ ) ) ) . 'inc/scssphp/scss.inc.php' );
		$scss = new titanscssc();
		try {
			$css = $scss->compile( $css );
			echo "<style type='text/css' media='screen'>{$css}</style>";
		} catch (Exception $e) {
		}
	}


	/**
	 * Generates CSS to be included in our dynamically generated CSS file in
	 * TitanFrameworkCSS, using tf_generate_css_code
	 *
	 * @param	string               $css The CSS to output
	 * @param	TitanFrameworkOption $option The option object being generated
	 * @return	void
	 * @since	1.3
	 */
	public function generateCSSCode( $css, $option ) {
		if ( $this->settings['id'] != $option->settings['id'] ) {
			return $css;
		}

		// Allow the enqueue setting to stop this.
		if ( ! $this->settings['enqueue'] ) {
			return $css;
		}

		if ( TitanFrameworkOption::TYPE_META != $option->type ) {
			$css = $this->getValue();
		}
		return $css;
	}


	/**
	 * Loads the ACE library for displaying our syntax highlighted code editor
	 *
	 * @return	void
	 * @since	1.3
	 */
	public function loadAdminScripts() {
		wp_enqueue_code_editor(array('type' => 'text/css'));
		wp_localize_script('jquery', 'cm_settings', false);
	   
		wp_enqueue_script('wp-theme-plugin-editor');
		wp_enqueue_style('wp-codemirror');

	}


	/**
	 * Displays the option for admin pages and meta boxes
	 *
	 * @return	void
	 * @since	1.3
	 */
	public function display() {
		$this->echoOptionHeader();

		// The hidden textarea that will hold our contents
		printf( "<textarea name='%s' id='%s' style='display: none'>%s</textarea>",
			esc_attr( $this->getID() ),
			esc_attr( $this->getID() ),
			esc_textarea( $this->getValue() )
		);

		$this->echoOptionFooter();
	}


	/**
	 * Cleans the value for getOption
	 *
	 * @param	string $value The raw value of the option
	 * @return	mixes The cleaned value
	 * @since	1.3
	 */
	public function cleanValueForGetting( $value ) {
		return stripslashes( $value );
	}
}
