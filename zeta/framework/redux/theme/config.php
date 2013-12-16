<?php
/*
 *
 * Custom function for filtering the sections array. Good for child themes to override or add to the sections.
 * Simply include this function in the child themes functions.php file.
 *
 * NOTE: the defined constansts for URLs, and directories will NOT be available at this point in a child theme,
 * so you must use get_template_directory_uri() if you want to use any of the built in icons
 *
 */
function add_another_section($sections){
    //$sections = array();
    $sections[] = array(
        'title' => __('A Section added by hook', 'redux-framework'),
        'desc' => __('<p class="description">This is a section created by adding a filter to the sections array. Can be used by child themes to add/remove sections from the options.</p>', 'redux-framework'),
        'icon' => 'paper-clip',
        'icon_class' => 'icon-large',
        // Leave this as a blank section, no options just some intro text set above.
        'fields' => array()
    );

    return $sections;
}
add_filter('redux-opts-sections-redux-sample', 'add_another_section');


/*
 * 
 * Custom function for filtering the args array given by a theme, good for child themes to override or add to the args array.
 *
 */
function change_framework_args($args){
    //$args['dev_mode'] = false;
    
    return $args;
}
//add_filter('redux-opts-args-redux-sample-file', 'change_framework_args');


/*
 *
 * Most of your editing will be done in this section.
 *
 * Here you can override default values, uncomment args and change their values.
 * No $args are required, but they can be over ridden if needed.
 *
 */
function setup_framework_options(){
    $args = array();


    // For use with a tab below
        $tabs = array();

        ob_start();

        $ct = wp_get_theme();
        $theme_data = $ct;
        $item_name = $theme_data->get('Name'); 
        $tags = $ct->Tags;
        $screenshot = $ct->get_screenshot();
        $class = $screenshot ? 'has-screenshot' : '';

        $customize_title = sprintf( 'Customize &#8220;%s&#8221;', $ct->display('Name') );

        $sampleHTML = '';


        $md_animations = array('flash' => __('Flash', 'js_composer'),'bounce' => __('Bounce', 'js_composer'),'shake' => __('Shake', 'js_composer'),'tada' => __('Tada', 'js_composer'),'swing' => __('Swing', 'js_composer'),'wobble' => __('Wobble', 'js_composer'),'pulse' => __('Pulse', 'js_composer'),'flip' => __('Flip', 'js_composer'),'flipInX' => __('FlipInX', 'js_composer'),'flipOutX' => __('FlipOutX', 'js_composer'),'flipInY' => __('FlipInY', 'js_composer'),'flipOutY' => __('FlipOutY', 'js_composer'),'fadeIn' => __('FadeIn', 'js_composer'),'fadeInUp' => __('FadeInUp', 'js_composer'),'fadeInDown' => __('FadeInDown', 'js_composer'),'fadeInLeft' => __('FadeInLeft', 'js_composer'),'fadeInRight' => __('FadeInRight', 'js_composer'),'fadeInUpBig' => __('FadeInUpBig', 'js_composer'),'fadeInDownBig' => __('FadeInDownBig', 'js_composer'),'fadeInLeftBig' => __('FadeInLeftBig', 'js_composer'),'fadeInRightBig' => __('FadeInRightBig', 'js_composer'),'slideInDown' => __('SlideInDown', 'js_composer'),'slideInLeft' => __('SlideInLeft', 'js_composer'),'slideInRight' => __('SlideInRight', 'js_composer'),'slideOutUp' => __('SlideOutUp', 'js_composer'),'slideOutLeft' => __('SlideOutLeft', 'js_composer'),'slideOutRight' => __('SlideOutRight', 'js_composer'),'bounceIn' => __('BounceIn', 'js_composer'),'bounceInDown' => __('BounceInDown', 'js_composer'),'bounceInUp' => __('BounceInUp', 'js_composer'),'bounceInLeft' => __('BounceInLeft', 'js_composer'),'bounceInRight' => __('BounceInRight', 'js_composer'),'bounceOut' => __('BounceOut', 'js_composer'),'bounceOutDown' => __('BounceOutDown', 'js_composer'),'bounceOutUp' => __('BounceOutUp', 'js_composer'),'bounceOutLeft' => __('BounceOutLeft', 'js_composer'),'bounceOutRight' => __('BounceOutRight', 'js_composer'),'rotateIn' => __('RotateIn', 'js_composer'),'rotateInDownLeft' => __('RotateInDownLeft', 'js_composer'),'rotateInDownRight' => __('RotateInDownRight', 'js_composer'),'rotateInUpLeft' => __('RotateInUpLeft', 'js_composer'),'rotateInUpRight' => __('RotateInUpRight', 'js_composer'),'rotateOut' => __('RotateOut', 'js_composer'),'rotateOutDownLeft' => __('RotateOutDownLeft', 'js_composer'),'rotateOutDownRight' => __('RotateOutDownRight', 'js_composer'),'rotateOutUpLeft' => __('RotateOutUpLeft', 'js_composer'),'rotateOutUpRight' => __('RotateOutUpRight', 'js_composer'),'lightSpeedIn' => __('LightSpeedIn', 'js_composer'),'lightSpeedOut' => __('LightSpeedOut', 'js_composer'),'hinge' => __('Hinge', 'js_composer'),'rollIn' => __('RollIn', 'js_composer'),'rollOut' => __('RollOut', 'js_composer'));

        ?>
        <div id="current-theme" class="<?php echo esc_attr( $class ); ?>">
            <?php if ( $screenshot ) : ?>
                <?php if ( current_user_can( 'edit_theme_options' ) ) : ?>
                <a href="<?php echo wp_customize_url(); ?>" class="load-customize hide-if-no-customize" title="<?php echo esc_attr( $customize_title ); ?>">
                    <img src="<?php echo esc_url( $screenshot ); ?>" alt="<?php esc_attr_e( 'Current theme preview' ); ?>" />
                </a>
                <?php endif; ?>
                <img class="hide-if-customize" src="<?php echo esc_url( $screenshot ); ?>" alt="<?php esc_attr_e( 'Current theme preview' ); ?>" />
            <?php endif; ?>

            <h4>
                <?php echo $ct->display('Name'); ?>
            </h4>

            <div>
                <ul class="theme-info">
                    <li><?php printf( 'By %s', $ct->display('Author') ); ?></li>
                    <li><?php printf( 'Version %s', $ct->display('Version') ); ?></li>
                    <li><?php echo '<strong>'.__('Tags', 'redux-framework').':</strong> '; ?><?php printf( $ct->display('Tags') ); ?></li>
                </ul>
                <p class="theme-description"><?php echo $ct->display('Description'); ?></p>
                <?php if ( $ct->parent() ) {
                    printf( ' <p class="howto">' . __( 'This <a href="%1$s">child theme</a> requires its parent theme, %2$s.' ) . '</p>',
                         'http://codex.wordpress.org/Child_Themes' ,
                        $ct->parent()->display( 'Name' ) );
                } ?>
                
            </div>

        </div>

        <?php
        $item_info = ob_get_contents();
            
        ob_end_clean();


    if( file_exists( dirname(__FILE__).'/info-html.html' )) {
        global $wp_filesystem;
        if (empty($wp_filesystem)) {
            require_once(ABSPATH .'/wp-admin/includes/file.php');
            WP_Filesystem();
        }       
        $sampleHTML = $wp_filesystem->get_contents(dirname(__FILE__).'/info-html.html');
    }


    // Setting dev mode to true allows you to view the class settings/info in the panel.
    // Default: true
    $args['dev_mode'] = false;

    // Set the icon for the dev mode tab.
    // If $args['icon_type'] = 'image', this should be the path to the icon.
    // If $args['icon_type'] = 'iconfont', this should be the icon name.
    // Default: info-sign
    //$args['dev_mode_icon'] = 'info-sign';

    // Set the class for the dev mode tab icon.
    // This is ignored unless $args['icon_type'] = 'iconfont'
    // Default: null
    $args['dev_mode_icon_class'] = 'icon-large';

    // Set a custom option name. Don't forget to replace spaces with underscores!
    $args['opt_name'] = MD_THEME_NAME;

    // Setting system info to true allows you to view info useful for debugging.
    // Default: false
    //$args['system_info'] = true;

    
    // Set the icon for the system info tab.
    // If $args['icon_type'] = 'image', this should be the path to the icon.
    // If $args['icon_type'] = 'iconfont', this should be the icon name.
    // Default: info-sign
    //$args['system_info_icon'] = 'info-sign';

    // Set the class for the system info tab icon.
    // This is ignored unless $args['icon_type'] = 'iconfont'
    // Default: null
    $args['system_info_icon_class'] = 'icon-large';

    $theme = wp_get_theme();

    $args['display_name'] = $theme->get('Name');
    //$args['database'] = "theme_mods_expanded";
    $args['display_version'] = $theme->get('Version');

    // If you want to use Google Webfonts, you MUST define the api key.
    $args['google_api_key'] = 'AIzaSyAX_2L_UzCDPEnAHTG7zhESRVpMPS4ssII';

    // Define the starting tab for the option panel.
    // Default: '0';
    //$args['last_tab'] = '0';

    // Define the option panel stylesheet. Options are 'standard', 'custom', and 'none'
    // If only minor tweaks are needed, set to 'custom' and override the necessary styles through the included custom.css stylesheet.
    // If replacing the stylesheet, set to 'none' and don't forget to enqueue another stylesheet!
    // Default: 'standard'
    $args['admin_stylesheet'] = 'none';

    // Setup custom links in the footer for share icons
    $args['share_icons']['twitter'] = array(
        'link' => 'http://twitter.com/ghost1227',
        'title' => 'Follow me on Twitter', 
        //'img' => REDUX_URL . 'assets/img/social/Twitter.png'
    );
    $args['share_icons']['linked_in'] = array(
        'link' => 'http://www.linkedin.com/profile/view?id=52559281',
        'title' => 'Find me on LinkedIn', 
        //'img' => REDUX_URL . 'assets/img/social/LinkedIn.png'
    );

    // Enable the import/export feature.
    // Default: true
    //$args['show_import_export'] = false;

    // Set the icon for the import/export tab.
    // If $args['icon_type'] = 'image', this should be the path to the icon.
    // If $args['icon_type'] = 'iconfont', this should be the icon name.
    // Default: refresh
    $args['import_icon'] = 'import';

    // Set the class for the import/export tab icon.
    // This is ignored unless $args['icon_type'] = 'iconfont'
    // Default: null
    //$args['import_icon_class'] = 'icon-large';

    // Set a custom menu icon.
    $args['menu_icon'] = MD_THEME_URI.'/framework/redux/theme/assets/img/admin-icon.png';

    // Set a custom title for the options page.
    // Default: Options
    $args['menu_title'] = 'Theme Options';

    // Set a custom page title for the options page.
    // Default: Options
    $args['page_title'] = ucfirst(MD_THEME_NAME);

    // Set a custom page slug for options page (wp-admin/themes.php?page=***).
    // Default: redux_options
    $args['page_slug'] = MD_THEME_NAME.'_options';

    $args['default_show'] = false;
    $args['default_mark'] = '';

    // Set a custom page capability.
    // Default: manage_options
    //$args['page_cap'] = 'manage_options';

    // Set the menu type. Set to "menu" for a top level menu, or "submenu" to add below an existing item.
    // Default: menu
    //$args['page_type'] = 'submenu';

    // Set the parent menu.
    // Default: themes.php
    // A list of available parent menus is available at http://codex.wordpress.org/Function_Reference/add_submenu_page#Parameters
    //$args['page_parent'] = 'options_general.php';

    // Set a custom page location. This allows you to place your menu where you want in the menu order.
    // Must be unique or it will override other items!
    // Default: null
    //$args['page_position'] = null;

    // Set a custom page icon class (used to override the page icon next to heading)
    //$args['page_icon'] = 'icon-themes';

    // Set the icon type. Set to "iconfont" for Font Awesome, or "image" for traditional.
    // Redux no longer ships with standard icons!
    // Default: iconfont
    //$args['icon_type'] = 'image';

    // Disable the panel sections showing as submenu items.
    // Default: true
    //$args['allow_sub_menu'] = false;
        
    // Set ANY custom page help tabs, displayed using the new help tab API. Tabs are shown in order of definition.
    $args['help_tabs'][] = array(
        'id' => 'redux-opts-1',
        'title' => __('Theme Information 1', 'redux-framework'),
        'content' => __('<p>This is the tab content, HTML is allowed.</p>', 'redux-framework')
    );
    $args['help_tabs'][] = array(
        'id' => 'redux-opts-2',
        'title' => __('Theme Information 2', 'redux-framework'),
        'content' => __('<p>This is the tab content, HTML is allowed.</p>', 'redux-framework')
    );

    // Set the help sidebar for the options page.                                        
    $args['help_sidebar'] = __('<p>This is the sidebar content, HTML is allowed.</p>', 'redux-framework');


    // Add HTML before the form.
    if (!isset($args['global_variable']) || $args['global_variable'] !== false ) {
        if (!empty($args['global_variable'])) {
            $v = $args['global_variable'];
        } else {
            $v = str_replace("-", "_", $args['opt_name']);
        }
        $args['intro_text'] = __('<p>Did you know that Redux sets a global variable for you? To access any of your saved options from within your code you can use your global variable: <strong>$'.$v.'</strong></p>', 'redux-framework');
    } else {
        $args['intro_text'] = __('<p>This text is displayed above the options panel. It isn\'t required, but more info is always better! The intro_text field accepts all HTML.</p>', 'redux-framework');
    }

    $args['intro_text'] = '';


    // Add content after the form.
    $args['footer_text'] = '';

    // Set footer/credit line.
    $args['footer_credit'] = __('<p>Wordpress Premium Themes | <a href="http://demo.themesholic.com/?ref='.$_SERVER['HTTP_HOST'].'" target="_blank">Themesholic.com</a></p>', 'redux-framework');


    $sections = array();              

    //Background Patterns Reader
    $sample_patterns_path =  '../sample/patterns/';
    $sample_patterns_url  =  '../sample/patterns/';
    $sample_patterns      = array();

    if ( is_dir( $sample_patterns_path ) ) :
        
      if ( $sample_patterns_dir = opendir( $sample_patterns_path ) ) :
        $sample_patterns = array();

        while ( ( $sample_patterns_file = readdir( $sample_patterns_dir ) ) !== false ) {

          if( stristr( $sample_patterns_file, '.png' ) !== false || stristr( $sample_patterns_file, '.jpg' ) !== false ) {
            $name = explode(".", $sample_patterns_file);
            $name = str_replace('.'.end($name), '', $sample_patterns_file);
            $sample_patterns[] = array( 'alt'=>$name,'img' => $sample_patterns_url . $sample_patterns_file );
          }
        }
      endif;
    endif;



    $sections[] = array(
        'title' => __('General Settings', 'redux-framework'),
        'desc' => __('Welcome to <strong>'.ucfirst(MD_THEME_NAME).'</strong> option panel.', 'redux-framework'),
        'icon' => 'general',
        'fields' => array(
            
            array(
                'id'        => 'favicon',
                'type'      => 'media', 
                'title'     => __('Favicon', 'redux-framework'),
                'subtitle'  => __('Upload your favicon.', 'redux-framework'),
            ),
            array(
                'id'        => 'boxed',
                'type'      => 'switch', 
                'title'     => __('Boxed', 'redux-framework'),
                'subtitle'  => __('Enable / disable layout boxed.', 'redux-framework'),
                'default'   => 0
            ),
            array(
                'id'        => 'logo-image-enabled',
                'type'      => 'switch', 
                'title'     => __('Enable Logo Image', 'redux-framework'),
                'subtitle'  => __('Enable / disable logo image.', 'redux-framework'),
                'default'   => 0
            ),
             array(
                'id'        => 'logo-image',
                'type'      => 'media', 
                'title'     => __('Logo Image', 'redux-framework'),
                'subtitle'  => __('Upload your logo image.', 'redux-framework'),
                'required' => array('logo-image-enabled','=','1')
            ),
            array(
                'id'        => 'logo-image-retina',
                'type'      => 'media', 
                'title'     => __('Logo Image Retina', 'redux-framework'),
                'subtitle'  => __('Upload your logo image for Retina display.', 'redux-framework'),
                'required' => array('logo-image-enabled','=','1')
            ),
            array(
                'id'        => 'back-top',
                'type'      => 'switch', 
                'title'     => __('Back to Top', 'redux-framework'),
                'subtitle'  => __('Enable / disable back to top.', 'redux-framework'),
                'default'   => 1
            ),
            array(
                'id'        => 'tracking-code',
                'type'      => 'textarea', 
                'title'     => __('Tracking Code', 'redux-framework'),
                'subtitle'  => __('Paste here your tracking code', 'redux-framework'),
            ),
            array(
                'id'        => 'custom-css',
                'type'      => 'textarea', 
                'title'     => __('Custom CSS', 'redux-framework'),
                'subtitle'  => __('Paste here your custom Css', 'redux-framework'),
            ),
           array(
                'id'        => 'custom-login',
                'type'      => 'switch', 
                'title'     => __('Custom Login', 'redux-framework'),
                'subtitle'  => __('Enable / disable custom login page.', 'redux-framework'),
                'default'   => 1
            ),
        )
    );


    $sections[] = array(
        'title' => __('Font & Colors', 'redux-framework'),
        'desc' => __('Customize Fonts and Colors.', 'redux-framework'),
        'icon' => 'font-colors',
        'fields' => array(
            array(
                'id'        => 'accent-color',
                'type'      => 'color', 
                'title'     => __('Accent Color', 'redux-framework'),
                'validate'  => 'color',
                'default'   => '#22d6f9',
                'subtitle'  => __('Set the accent color of your site.', 'redux-framework'),
            ),
            array(
                'id'        => 'bg-fluid',
                'type'      => 'color', 
                'title'     => __('Fluid Background Color', 'redux-framework'),
                'subtitle'  => __('Set Fluid background color.', 'redux-framework'),
                'validate'  => 'color',
                'default'   => '#ffffff',
            ),
            array(
                'id'        => 'bg-boxed',
                'type'      => 'color', 
                'title'     => __('Boxed Background Color', 'redux-framework'),
                'subtitle'  => __('Set body background color.', 'redux-framework'),
                'validate'  => 'color',
                'default'   => '#2b303e',
            ),
            array(
                'id'        => 'bgimage-boxed',
                'type'      => 'media', 
                'title'     => __('Boxed Background Image', 'redux-framework'),
                'subtitle'  => __('Set boxed background image.', 'redux-framework'),
            ),
            array(
                'id'        => 'font-body',
                'type'      => 'typography', 
                'title'     => __('Body', 'redux-framework'),
                'subtitle'  => __('Set body font style.', 'redux-framework'),
                'default'=> array(
                    'color'         =>  "#666666", 
                    'font-weight'   =>  '400', 
                    'font-family'   =>  "Open Sans", 
                    'font-size'     =>  '13px', 
                    'line-height'   =>  '22px',
                    'google'        => true,
                ),
            ),
            array(
                'id'        => 'link-color',
                'type'      => 'color', 
                'title'     => __('Link Color', 'redux-framework'),
                'subtitle'  => __('Set default link color.', 'redux-framework'),
                'validate'  => 'color',
                'default'   => '#22d6f9',
            ),
             array(
                'id'        => 'font-special',
                'type'      => 'typography', 
                'title'     => __('Font Special', 'redux-framework'),
                'subtitle'  => __('Set special element font style.', 'redux-framework'),
                'color'     =>  false, 
                'font-weight' =>  false, 
                'font-style' =>  false, 
                'font-size' =>  false, 
                'line-height' =>  false, 
                'default'=> array(
                    'font-family'   =>  "Montserrat", 
                    'google'        => true,
                ),
            ),
             array(
                'id'        => 'font-h1',
                'type'      => 'typography', 
                'title'     => __('H1', 'redux-framework'),
                'subtitle'  => __('Set H1 style.', 'redux-framework'),
                'default'=> array(
                    'color'         =>  "#000000", 
                    'font-weight'   =>  '400', 
                    'font-family'   =>  "Roboto Slab", 
                    'font-size'     =>  '24px', 
                    'line-height'   =>  '34px',
                    'google'        => true,
                ),
            ),
             array(
                'id'        => 'font-h2',
                'type'      => 'typography', 
                'title'     => __('H2', 'redux-framework'),
                'subtitle'  => __('Set H2 style.', 'redux-framework'),
                'default'=> array(
                    'color'         =>  "#000000", 
                    'font-weight'   =>  '400', 
                    'font-family'   =>  "Roboto Slab", 
                    'font-size'     =>  '20px', 
                    'line-height'   =>  '30px',
                    'google'        => true,
                ),
            ),
             array(
                'id'        => 'font-h3',
                'type'      => 'typography', 
                'title'     => __('H3', 'redux-framework'),
                'subtitle'  => __('Set H3 style.', 'redux-framework'),
                'default'=> array(
                    'color'         =>  "#000000", 
                    'font-weight'   =>  '400', 
                    'font-family'   =>  "Roboto Slab", 
                    'font-size'     =>  '18px', 
                    'line-height'   =>  '24px',
                    'google'        => true,
                ),
            ),
             array(
                'id'        => 'font-h4',
                'type'      => 'typography', 
                'title'     => __('H4', 'redux-framework'),
                'subtitle'  => __('Set H4 style.', 'redux-framework'),
                'default'=> array(
                    'color'         =>  "#000000", 
                    'font-weight'   =>  '400', 
                    'font-family'   =>  "Roboto Slab", 
                    'font-size'     =>  '16px', 
                    'line-height'   =>  '20px',
                    'google'        => true,
                ),
            ),
            array(
                'id'        => 'font-h5',
                'type'      => 'typography', 
                'title'     => __('H5', 'redux-framework'),
                'subtitle'  => __('Set H5 style.', 'redux-framework'),
                'default'=> array(
                    'color'         =>  "#000000", 
                    'font-weight'   =>  '400', 
                    'font-family'   =>  "Roboto Slab", 
                    'font-size'     =>  '14px', 
                    'line-height'   =>  '18px',
                    'google'        => true,
                ),
            ),
            array(
                'id'        => 'font-h6',
                'type'      => 'typography', 
                'title'     => __('H6', 'redux-framework'),
                'subtitle'  => __('Set H6 style.', 'redux-framework'),
                'default'=> array(
                    'color'         =>  "#000000", 
                    'font-weight'   =>  '700', 
                    'font-family'   =>  "Open Sans", 
                    'font-size'     =>  '11px', 
                    'line-height'   =>  '16px',
                    'google'        =>  true,
                ),
            ),
       )
    );



    $sections[] = array(
        'title' => __('Header & Footer', 'redux-framework'),
        'desc' => __('Customize Header & Footer.', 'redux-framework'),
        'icon' => 'footer',
        'fields' => array(
            
            array(
                'id'        => 'header-fixed',
                'type'      => 'switch', 
                'title'     => __('Header Fixed', 'redux-framework'),
                'subtitle'  => __('Enable / disable header fixed.', 'redux-framework'),
                'default'   => 1
            ),

            array(
                'id'        => 'header-bgcolor',
                'type'      => 'color', 
                'title'     => __('Header Background Color', 'redux-framework'),
                'subtitle'  => __('Set Header Background Color.', 'redux-framework'),
                'default'   => '#fff'
            ),

            array(
                'id'        => 'header-logo-color',
                'type'      => 'color', 
                'title'     => __('Header Logo Color', 'redux-framework'),
                'subtitle'  => __('Set Header Logo Color.', 'redux-framework'),
                'default'   => '#000'
            ),

            array(
                'id'        => 'header-link-color',
                'type'      => 'color', 
                'title'     => __('Header Link Color', 'redux-framework'),
                'subtitle'  => __('Set Header Link Color.', 'redux-framework'),
                'default'   => '#444'
            ),

            array(
                'id'        => 'submenu-bgcolor',
                'type'      => 'color', 
                'title'     => __('Submenu Background Color', 'redux-framework'),
                'subtitle'  => __('Set Submenu Background Color.', 'redux-framework'),
                'default'   => '#fff'
            ),

            array(
                'id'        => 'submenu-link-color',
                'type'      => 'color', 
                'title'     => __('Submenu Link Color', 'redux-framework'),
                'subtitle'  => __('Set Submenu Link Color.', 'redux-framework'),
                'default'   => '#444'
            ),

            array(
                'id'        => 'submenu-border-color',
                'type'      => 'color', 
                'title'     => __('Submenu Border Color', 'redux-framework'),
                'subtitle'  => __('Set Submenu Border Color.', 'redux-framework'),
                'default'   => '#eee'
            ),

            array(
                'id'        => 'header-icons',
                'type'      => 'switch', 
                'title'     => __('Header Icons', 'redux-framework'),
                'subtitle'  => __('Show/Hide icons menu. (add &lt;i class="icon-x"&gt;&lt;/i&gt; to menu element in appearance).', 'redux-framework'),
                'default'   => 0
            ),

            array(
                'id'        => 'header-special-button',
                'type'      => 'switch', 
                'title'     => __('Header Special Button', 'redux-framework'),
                'subtitle'  => __('Enable / disable header special button.', 'redux-framework'),
                'default'   => 1
            ),
            array(
                'id'        => 'header-special-button-label',
                'type'      => 'text', 
                'title'     => __('Header Special Button Label', 'redux-framework'),
                'required'  => array('header-special-button','=','1'),
                'default'   => 'PURCHASE'
            ),
            array(
                'id'        => 'header-special-button-url',
                'type'      => 'text', 
                'title'     => __('Header Special Button Url', 'redux-framework'),
                'required'  => array('header-special-button','=','1'),
                'default'   => ''
            ),

            array(
                'id'        => 'footer-enabled',
                'type'      => 'switch', 
                'title'     => __('Footer', 'redux-framework'),
                'subtitle'  => __('Enable / disable footer.', 'redux-framework'),
                'default'   => 1
            ),
            array(
                'id'=>'footer-layout',
                'type' => 'image_select',
                'title' => __('Footer Layout', 'redux-framework-demo'), 
                'subtitle' => __('Choose your Footer Layout', 'redux-framework-demo'),
                'options' => array(
                                '2' => array('title' => '2 Columns', 'img' => MD_THEME_URI.'/framework/redux/theme/assets/img/2col.png'),
                                '3' => array('title' => '3 Columns', 'img' => MD_THEME_URI.'/framework/redux/theme/assets/img/3col.png'),
                                '4' => array('title' => '4 Columns', 'img' => MD_THEME_URI.'/framework/redux/theme/assets/img/4col.png'),
                                ),
                'default' => '4',
                'required' => array('footer-enabled','=','1')
            ),

            array(
                'id'        => 'footer-bgcolor',
                'type'      => 'color', 
                'title'     => __('Footer Background Color', 'redux-framework'),
                'subtitle'  => __('Set Footer Background Color.', 'redux-framework'),
                'default'   => '#30393e',
                'required' => array('footer-enabled','=','1')
            ),

            array(
                'id'        => 'copyright-enabled',
                'type'      => 'switch', 
                'title'     => __('Copyright', 'redux-framework'),
                'subtitle'  => __('Enable / disable copyright.', 'redux-framework'),
                'default'   => 1
            ),


            array(
                'id'=>'copyright-text',
                'type' => 'textarea',
                'title' => __('Copyright Text', 'redux-framework-demo'), 
                'subtitle' => __('Insert your copyright text. Html is allowed.', 'redux-framework-demo'),
                'default' => 'Premium Wordpress Theme by <a href="http://www.themesholic.com/?ref='.$_SERVER['HTTP_HOST'].'" target="_blank">Themesholic.com</a>',
                'required' => array('copyright-enabled','=','1')               
                ),

            array(
                'id'        => 'copyright-bgcolor',
                'type'      => 'color', 
                'title'     => __('Copyright Background Color', 'redux-framework'),
                'subtitle'  => __('Set Copyright Background Color.', 'redux-framework'),
                'default'   => '#262e31',
                'required' => array('copyright-enabled','=','1')
            ),

        )
    );



    $sections[] = array(
        'title' => __('Blog Settings', 'redux-framework'),
        'desc' => __('Customize the Blog.', 'redux-framework'),
        'icon' => 'blog',
        'fields' => array(
           array(
                'id'        => 'blog-sidebar-enabled',
                'type'      => 'switch', 
                'title'     => __('Blog Sidebar', 'redux-framework'),
                'subtitle'  => __('Enable / disable Blog Sidebar.', 'redux-framework'),
                'default'   => 1
            ),
            array(
                'id'=>'blog-sidebar-layout',
                'type' => 'image_select',
                'title' => __('Blog Layout', 'redux-framework-demo'), 
                'subtitle' => __('Choose your Blog Layout', 'redux-framework-demo'),
                'options' => array(
                                'sidebar-left' => array('title' => 'Sidebar Left', 'img' => MD_THEME_URI.'/framework/redux/theme/assets/img/sidebar-left.png'),
                                'sidebar-right' => array('title' => 'Sidebar Right', 'img' => MD_THEME_URI.'/framework/redux/theme/assets/img/sidebar-right.png')
                                ),
                'default' => 'sidebar-right',
                'required' => array('blog-sidebar-enabled','=','1')
            ),

            array(
                'id'        => 'blog-sidebar-animation-enabled',
                'type'      => 'switch', 
                'title'     => __('Enable Sidebar Animation', 'redux-framework'),
                'subtitle'  => __('Enable / disable Blog Sidebar Animation.', 'redux-framework'),
                'default'   => 0,
                'required'  => array('blog-sidebar-enabled','=','1')
            ),


            array(
                'id'        => 'blog-sidebar-animation-type',
                'type'      => 'select', 
                'title'     => __('Sidebar Animation Type', 'redux-framework'),
                'subtitle'  => __('Set Blog Sidebar Animation.', 'redux-framework'),
                'default'   => 'fadeInRight',
                'options'   => $md_animations,
                'required'  => array('blog-sidebar-animation-enabled','=','1')
            ),


            array(
                'id'        => 'post-sidebar-enabled',
                'type'      => 'switch', 
                'title'     => __('Post Sidebar', 'redux-framework'),
                'subtitle'  => __('Enable / disable Post Sidebar.', 'redux-framework'),
                'default'   => 1
            ),
            array(
                'id'=>'post-sidebar-layout',
                'type' => 'image_select',
                'title' => __('Post Layout', 'redux-framework-demo'), 
                'subtitle' => __('Choose your Post Layout', 'redux-framework-demo'),
                'options' => array(
                                'sidebar-left' => array('title' => 'Sidebar Left', 'img' => MD_THEME_URI.'/framework/redux/theme/assets/img/sidebar-left.png'),
                                'sidebar-right' => array('title' => 'Sidebar Right', 'img' => MD_THEME_URI.'/framework/redux/theme/assets/img/sidebar-right.png'),
                                ),
                'default' => 'sidebar-right',
                'required' => array('post-sidebar-enabled','=','1')
            ),

            array(
                'id'        => 'post-animation-enabled',
                'type'      => 'switch', 
                'title'     => __('Enable Post Animation', 'redux-framework'),
                'subtitle'  => __('Enable / disable Post Animation.', 'redux-framework'),
                'default'   => 0,
            ),


            array(
                'id'        => 'post-animation-type',
                'type'      => 'select', 
                'title'     => __('Post Animation Type', 'redux-framework'),
                'subtitle'  => __('Set Post Animation.', 'redux-framework'),
                'default'   => 'fadeInUp',
                'options'   => $md_animations,
                'required'  => array('post-animation-enabled','=','1')
            ),

        )
    );



    $sections[] = array(
        'title' => __('Portfolio Settings', 'redux-framework'),
        'desc' => __('Customize your Portfolio.', 'redux-framework'),
        'icon' => 'portfolio',
        'fields' => array(
           array(
                'id'        => 'portfolio-pagination-enabled',
                'type'      => 'switch', 
                'title'     => __('Portfolio Pagination', 'redux-framework'),
                'subtitle'  => __('Enable / disable Portfolio Pagination.', 'redux-framework'),
                'default'   => 1
            ),
            array(
                'id'=>'portfolio-pagination-prev',
                'type' => 'textarea',
                'title' => __('Pagination Prev Button', 'redux-framework-demo'), 
                'subtitle' => __('Set the content for the prev button.', 'redux-framework-demo'),
                'default' => '<i class="icon-chevron-left"></i>',
                'required' => array('portfolio-pagination-enabled','=','1')
            ),

            array(
                'id'=>'portfolio-pagination-next',
                'type' => 'text',
                'title' => __('Pagination Next Button', 'redux-framework-demo'), 
                'subtitle' => __('Set the content for the next button.', 'redux-framework-demo'),
                'default' => '<i class="icon-chevron-right"></i>',
                'required' => array('portfolio-pagination-enabled','=','1')
            ),

            array(
                'id'=>'portfolio-pagination-grid',
                'type' => 'text',
                'title' => __('Pagination Grid Button', 'redux-framework-demo'), 
                'subtitle' => __('Set the content for the grid button.', 'redux-framework-demo'),
                'default' => '<i class="icon-th-large"></i>',
                'required' => array('portfolio-pagination-enabled','=','1')
            ),

            array(
                'id'=>'portfolio-pagination-grid-url',
                'type' => 'text',
                'title' => __('Pagination Grid Url', 'redux-framework-demo'), 
                'subtitle' => __('Set the url for the grid button.', 'redux-framework-demo'),
                'default' => '#',
                'required' => array('portfolio-pagination-enabled','=','1')
            ),



        )
    );  $tabs = array();






    if (function_exists('wp_get_theme')){
    $theme_data = wp_get_theme();
    $theme_uri = $theme_data->get('ThemeURI');
    $description = $theme_data->get('Description');
    $author = $theme_data->get('Author');
    $version = $theme_data->get('Version');
    $tags = $theme_data->get('Tags');
    }else{
    $theme_data = wp_get_theme(trailingslashit(get_stylesheet_directory()).'style.css');
    $theme_uri = $theme_data['URI'];
    $description = $theme_data['Description'];
    $author = $theme_data['Author'];
    $version = $theme_data['Version'];
    $tags = $theme_data['Tags'];
    }   

    $theme_info = '<div class="redux-framework-section-desc">';
    $theme_info .= '<p class="redux-framework-theme-data description theme-uri">'.__('<strong>Theme URL:</strong> ', 'redux-framework').'<a href="'.$theme_uri.'" target="_blank">'.$theme_uri.'</a></p>';
    $theme_info .= '<p class="redux-framework-theme-data description theme-author">'.__('<strong>Author:</strong> ', 'redux-framework').$author.'</p>';
    $theme_info .= '<p class="redux-framework-theme-data description theme-version">'.__('<strong>Version:</strong> ', 'redux-framework').$version.'</p>';
    $theme_info .= '<p class="redux-framework-theme-data description theme-description">'.$description.'</p>';
    $theme_info .= '<p class="redux-framework-theme-data description theme-tags">'.__('<strong>Tags:</strong> ', 'redux-framework').implode(', ', $tags).'</p>';
    $theme_info .= '</div>';

    if(file_exists(dirname(__FILE__).'/README.md')){
    $tabs['theme_docs'] = array(
                'icon' => REDUX_URL.'assets/img/glyphicons/glyphicons_071_book.png',
                'title' => __('Documentation', 'redux-framework'),
                'content' => file_get_contents(dirname(__FILE__).'/README.md')
                );
    }//if





    $tabs['item_info'] = array(
        'icon' => 'info',
        'title' => __('Theme Information', 'redux-framework'),
        'content' => $item_info
    );
    
    if(file_exists(trailingslashit(dirname(__FILE__)) . 'README.html')) {
        $tabs['docs'] = array(
            'icon' => 'book',
            'title' => __('Documentation', 'redux-framework'),
            'content' => nl2br(file_get_contents(trailingslashit(dirname(__FILE__)) . 'README.html'))
        );
    }

    global $ReduxFramework;
    $ReduxFramework = new ReduxFramework($sections, $args, $tabs);

}
add_action('init', 'setup_framework_options', 0);


/*
 * 
 * Custom function for the callback referenced above
 *
 */
function my_custom_field($field, $value) {
    print_r($field);
    print_r($value);
}

/*
 * 
 * Custom function for the callback validation referenced above
 *
 */
function validate_callback_function($field, $value, $existing_value) {
    $error = false;
    $value =  'just testing';
    /*
    do your validation
    
    if(something) {
        $value = $value;
    } elseif(somthing else) {
        $error = true;
        $value = $existing_value;
        $field['msg'] = 'your custom error message';
    }
    */
    
    $return['value'] = $value;
    if($error == true) {
        $return['error'] = $field;
    }
    return $return;
}

/*
    This is a test function that will let you see when the compiler hook occurs. 
    It only runs if a field set with compiler=>true is changed.
*/
function testCompiler() {
    //echo "Compiler hook!";
}
add_action('redux-compiler-redux-sample-file', 'testCompiler');



/**
    Use this function to hide the activation notice telling users about a sample panel.
**/
function removeReduxAdminNotice() {
    delete_option('REDUX_FRAMEWORK_PLUGIN_ACTIVATED_NOTICES');
}
add_action('redux_framework_plugin_admin_notice', 'removeReduxAdminNotice');
