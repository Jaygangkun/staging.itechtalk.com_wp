<?php

/* Header */
Redux::setSection( $opt_name, array(
        'icon'      => ' el-icon-bookmark',
        'title'     => esc_html__( 'Header', 'voice' ),
        'heading' => false,
        'fields'  => array(
        )
    )
);


/* Header - main */
Redux::setSection( $opt_name, array(
        'icon'       => '',
        'title'     => esc_html__( 'Main', 'voice' ),
        'heading'    => false,
        'subsection' => true,
        'fields'     => array(

            array(
                'id'        => 'header_section',
                'type'      => 'section',
                'title'     => esc_html__( 'Main header', 'voice' ),
                'subtitle'  => esc_html__( 'These are options to modify and style your main header arear', 'voice' ),
                'indent'    => false
            ),

            array(
                'id'        => 'header_layout',
                'type'      => 'image_select',
                'title'     => esc_html__( 'Header layout', 'voice' ),
                'subtitle'  => esc_html__( 'Choose header layout', 'voice' ),
                'options'   => array(
                    '1' => array( 'title' => esc_html__( '1 (centered)', 'voice' ),  'img' => esc_url( get_parent_theme_file_uri( 'assets/img/admin/header_1.png' ) ) ),
                    '2' => array( 'title' => esc_html__( '2 (with ad space)', 'voice' ),   'img' => esc_url( get_parent_theme_file_uri( 'assets/img/admin/header_2.png' ) ) ),
                    '3' => array( 'title' => esc_html__( '3 (minimal)', 'voice' ),  'img' => esc_url( get_parent_theme_file_uri( 'assets/img/admin/header_3.png' ) ) )
                ),
                'default' => vce_get_default_option( 'header_layout' ),
            ),

            array(
                'id' => 'header_height',
                'type' => 'text',
                'class' => 'small-text',
                'title' => esc_html__( 'Header height', 'voice' ),
                'subtitle' => esc_html__( 'Specify height for your header area', 'voice' ),
                'desc' => esc_html__( 'Note: Height value is in px.', 'voice' ),
                'default' => vce_get_default_option( 'header_height' ),
                'validate' => 'numeric'
            ),

            array(
                'id' => 'header_ad',
                'type' => 'editor',
                'title' => esc_html__( 'Header ad space', 'voice' ),
                'subtitle' => esc_html__( 'This is a place for header banner ad', 'voice' ),
                'default' => vce_get_default_option( 'header_ad' ),
                'desc' => esc_html__( 'Note: If you want to paste HTML or js code, use "text" mode in editor. Suggested size of an ad banner is 728x90', 'voice' ),
                'args'   => array(
                    'textarea_rows'    => 5,
                    'default_editor' => 'html'
                ),
                'required' => array( 'header_layout', '=', '2' )
            ),

            array(
                'id'        => 'logo',
                'type'      => 'media',
                'url'       => true,
                'title'     => esc_html__( 'Logo', 'voice' ),
                'subtitle'      => esc_html__( 'Upload your logo image here, or leave empty to show website title instead', 'voice' ),
                'default' => vce_get_default_option( 'logo' ),
            ),

            array(
                'id'        => 'logo_retina',
                'type'      => 'media',
                'url'       => true,
                'title'     => esc_html__( 'Retina logo (2x)', 'voice' ),
                'subtitle'      => esc_html__( 'Optionally upload another logo for devices with retina displays. It should be double size of your normal logo.', 'voice' ),
                'default' => vce_get_default_option( 'logo_retina' ),
            ),

            array(
                'id'        => 'logo_mobile',
                'type'      => 'media',
                'url'       => true,
                'title'     => esc_html__( 'Mobile logo', 'voice' ),
                'subtitle'      => esc_html__( 'Optionally upload another logo which will be displayed only for mobiles and tablets', 'voice' ),
                'default' => vce_get_default_option( 'logo_mobile' ),
            ),

            array(
                'id'        => 'logo_mobile_retina',
                'type'      => 'media',
                'url'       => true,
                'title'     => esc_html__( 'Mobile retina logo (2x)', 'voice' ),
                'subtitle'      => esc_html__( 'Optionally upload another mobile logo which will be displayed only for mobiles and tablets with retina displays.', 'voice' ),
                'default' => vce_get_default_option( 'logo_mobile_retina' ),
            ),

            array(
                'id' => 'logo_position',
                'type' => 'spacing',
                'title' => esc_html__( 'Logo/title position', 'voice' ),
                'subtitle' => esc_html__( 'Specify left and top positions for your logo/website title placement inside header', 'voice' ),
                'top' => false,
                'left' => false,
                'default' => vce_get_default_option( 'logo_position' ),
            ),

            array(
                'id' => 'logo_custom_url',
                'type' => 'text',
                'title' => esc_html__( 'Logo/title custom URL', 'voice' ),
                'subtitle' => esc_html__( 'Specify url if you want to link your logo/website title to some other URL address. By default it will lead to your home page.', 'voice' ),
                'default' => vce_get_default_option( 'logo_custom_url' ),
                'validate' => 'url'
            ),

            array(
                'id' => 'color_website_title',
                'type' => 'color',
                'title' => esc_html__( 'Site title color', 'voice' ),
                'subtitle' => esc_html__( 'Specify color for your website title (if logo is not used)', 'voice' ),
                'transparent' => false,
                'default' => vce_get_default_option( 'color_website_title' ),
            ),

            array(
                'id'        => 'header_description',
                'type'      => 'switch',
                'title'     => esc_html__( 'Display site description', 'voice' ),
                'subtitle'  => esc_html__( 'Check if you want to display site description (below logo/title)', 'voice' ),
                'desc'  => wp_kses_post( sprintf( __( 'Note: You can specify your site description inside <a href="%s">Settings -> General</a>', 'voice' ), admin_url( 'options-general.php' ) ) ),
                'default' => vce_get_default_option( 'header_description' ),
            ),

            array(
                'id' => 'color_website_desc',
                'type' => 'color',
                'title' => esc_html__( 'Site description color', 'voice' ),
                'transparent' => false,
                'default' => vce_get_default_option( 'color_website_desc' ),
                'required' => array( 'header_description', '=', true )
            ),

            array(
                'id'        => 'header_search',
                'type'      => 'switch',
                'title'     => esc_html__( 'Display search', 'voice' ),
                'subtitle'  => esc_html__( 'Check if you want to display search icon after main navigation', 'voice' ),
                'default' => vce_get_default_option( 'header_search' ),
            ),

            array(
                'id' => 'color_header_bg',
                'type' => 'color',
                'title' => esc_html__( 'Header background', 'voice' ),
                'subtitle' => esc_html__( 'This option applies to your main header area', 'voice' ),
                'transparent' => false,
                'default' => vce_get_default_option( 'color_header_bg' ),
            ),


            array(
                'id'        => 'nav_menu_section',
                'type'      => 'section',
                'title'     => esc_html__( 'Main navigation styling options', 'voice' ),
                'subtitle'  => esc_html__( 'Manage options for the main nav menu', 'voice' ),
                'indent'    => false
            ),

            array(
                'id' => 'color_header_nav_bg',
                'type' => 'color',
                'title' => esc_html__( 'Navigation background', 'voice' ),
                'subtitle' => esc_html__( 'This option applies to your navigation', 'voice' ),
                'transparent' => false,
                'default' => vce_get_default_option( 'color_header_nav_bg' ),
                'required' => array( 'header_layout', '!=', 3 )
            ),

            array(
                'id' => 'color_header_txt',
                'type' => 'color',
                'title' => esc_html__( 'Navigation color', 'voice' ),
                'subtitle' => esc_html__( 'This option applies to your navigation', 'voice' ),
                'transparent' => false,
                'default' => vce_get_default_option( 'color_header_txt' ),
            ),

            array(
                'id' => 'color_header_acc',
                'type' => 'color',
                'title' => esc_html__( 'Navigation accent color', 'voice' ),
                'subtitle' => esc_html__( 'This option applies to your navigation links hover', 'voice' ),
                'transparent' => false,
                'default' => vce_get_default_option( 'color_header_acc' ),
            ),

            array(
                'id' => 'color_navigation_cat',
                'type' => 'checkbox',
                'title' => esc_html__( 'Apply category colors as accent color', 'voice' ),
                'subtitle' => esc_html__( 'Check this option if you want to show actual category colors instead of accent color if category link is added in navigation', 'voice' ),
                'default' => vce_get_default_option( 'color_navigation_cat' ),
            ),

            array(
                'id' => 'color_header_submenu_bg',
                'type' => 'color',
                'title' => esc_html__( 'Navigation submenu background', 'voice' ),
                'subtitle' => esc_html__( 'This option applies to your submenu items', 'voice' ),
                'transparent' => false,
                'default' => vce_get_default_option( 'color_header_submenu_bg' ),
            ),

            array(
                'id'        => 'use_mega_menu',
                'type'      => 'switch',
                'title'     => esc_html__( 'Use mega menu navigation', 'voice' ),
                'subtitle'  => esc_html__( 'Check if you want to use our built in mega menu system in navigation', 'voice' ),
                'desc' => esc_html__( 'Note: You may want to set this option to off if you are using some other menu/navigation specific plugins and avoid possible conflicts', 'voice' ),
                'default' => vce_get_default_option( 'use_mega_menu' ),
            ),

            array(
                'id'        => 'ajax_mega_menu',
                'type'      => 'switch',
                'title'     => esc_html__( 'Use Ajax for mega menu', 'voice' ),
                'subtitle'  => esc_html__( 'Check if you want to load mega menu via ajax', 'voice' ),
                'desc' => esc_html__( 'Note: Enabling this options will cause a small delay when displaying mega menu', 'voice' ),
                'default' => vce_get_default_option( 'ajax_mega_menu' ),
                'required' => array( 'use_mega_menu', '=', true )
            ),

            array(
                'id'        => 'mega_menu_subcats',
                'type'      => 'switch',
                'title'     => esc_html__( 'Show subcategories in mega menu', 'voice' ),
                'subtitle'  => esc_html__( 'Check if you want to show subcategories instead of first post', 'voice' ),
                'default' => vce_get_default_option( 'mega_menu_subcats' ),
                'required' => array( 'use_mega_menu', '=', true )
            ),

            array(
                'id'        => 'mega_menu_slider',
                'type'      => 'switch',
                'title'     => esc_html__( 'Activate slider for mega-menu-posts', 'voice' ),
                'subtitle'  => esc_html__( 'Check if you want to show posts as a slider', 'voice' ),
                'default' => vce_get_default_option( 'mega_menu_slider' ),
                'required' => array( 'use_mega_menu', '=', true )
            ),

            array(
                'id' => 'mega_menu_slider_posts',
                'type' => 'text',
                'class' => 'small-text',
                'title' => esc_html__( 'Number of posts in mega menu slider', 'voice' ),
                'subtitle' => esc_html__( 'Specify number of posts to display in the mega menu', 'voice' ),
                'default' => vce_get_default_option( 'mega_menu_slider_posts' ),
                'validate' => 'numeric',
                'required' => array( 'mega_menu_slider', '=', true )
            ),
        )
    )
);


/* Header - topbar */
Redux::setSection( $opt_name, array(
        'icon'       => '',
        'title'     => esc_html__( 'Top bar', 'voice' ),
        'heading'    => false,
        'subsection' => true,
        'fields'     => array(

            array(
                'id'        => 'top_bar_section',
                'type'      => 'section',
                'title'     => esc_html__( 'Top bar', 'voice' ),
                'subtitle'  => esc_html__( 'Manage options for the header top bar area', 'voice' ),
                'indent'    => false
            ),

            array(
                'id'        => 'top_bar',
                'type'      => 'switch',
                'title'     => esc_html__( 'Enable header top bar', 'voice' ),
                'subtitle'  => esc_html__( 'Check if you want to enable header top bar', 'voice' ),
                'default' => vce_get_default_option( 'top_bar' ),
            ),

            array(
                'id'        => 'top_bar_mobile',
                'type'      => 'switch',
                'title'     => esc_html__( 'Display top bar on mobile navigation', 'voice' ),
                'subtitle'  => esc_html__( 'Check if you want to enable top bar in mobile/responsive navigation', 'voice' ),
                'default' => vce_get_default_option( 'top_bar_mobile' ),
                'required' => array( 'top_bar', '=', true ),
            ),
            array(
                'id'        => 'top_bar_mobile_group',
                'type'      => 'switch',
                'title'     => esc_html__( 'Group top bar navigation on mobile under "more" link ', 'voice' ),
                'default' => vce_get_default_option( 'top_bar_mobile_group' ),
                'required' => array( array( 'top_bar', '=', true ), array( 'top_bar_mobile', '=', true ) )
            ),

            array(
                'id'        => 'top_bar_left',
                'type'      => 'select',
                'title'     => esc_html__( 'Top bar left', 'voice' ),
                'subtitle'  => esc_html__( 'Choose what to display in top bar left area', 'voice' ),
                'options' => vce_get_topbar_items(),
                'required' => array( 'top_bar', '=', true ),
                'default' => vce_get_default_option( 'top_bar_left' ),
            ),
            array(
                'id'        => 'top_bar_center',
                'type'      => 'select',
                'title'     => esc_html__( 'Top bar center', 'voice' ),
                'subtitle'  => esc_html__( 'Choose what to display in top bar center area', 'voice' ),
                'options' => vce_get_topbar_items(),
                'required' => array( 'top_bar', '=', true ),
                'default' => vce_get_default_option( 'top_bar_center' ),
            ),
            array(
                'id'        => 'top_bar_right',
                'type'      => 'select',
                'title'     => esc_html__( 'Top bar right', 'voice' ),
                'subtitle'  => esc_html__( 'Choose what to display in top bar right area', 'voice' ),
                'options' => vce_get_topbar_items(),
                'required' => array( 'top_bar', '=', true ),
                'default' => vce_get_default_option( 'top_bar_right' ),
            ),

            array(
                'id' => 'color_top_bar_bg',
                'type' => 'color',
                'title' => esc_html__( 'Top bar background color', 'voice' ),
                'transparent' => false,
                'default' => vce_get_default_option( 'color_top_bar_bg' ),
                'required' => array( 'top_bar', '=', true ),
            ),

            array(
                'id' => 'color_top_bar_txt',
                'type' => 'color',
                'title' => esc_html__( 'Top bar text color', 'voice' ),
                'transparent' => false,
                'default' => vce_get_default_option( 'color_top_bar_txt' ),
                'required' => array( 'top_bar', '=', true ),
            ),
        )
    )
);

/* Header - sticky */
Redux::setSection( $opt_name, array(
        'icon'       => '',
        'title'     => esc_html__( 'Sticky header', 'voice' ),
        'heading'    => false,
        'subsection' => true,
        'fields'     => array(

            array(
                'id'        => 'sticky_header_section',
                'type'      => 'section',
                'title'     => esc_html__( 'Sticky header', 'voice' ),
                'subtitle'  => esc_html__( 'Manage options for the sticky header', 'voice' ),
                'indent'    => false
            ),

            array(
                'id'        => 'sticky_header',
                'type'      => 'switch',
                'title'     => esc_html__( 'Enable sticky header', 'voice' ),
                'subtitle'  => esc_html__( 'Check if you want to make main navigation always visible (sticky)', 'voice' ),
                'default' => vce_get_default_option( 'sticky_header' ),
            ),

            array(
                'id'        => 'sticky_header_offset',
                'type'      => 'text',
                'class'     => 'small-text',
                'title'     => esc_html__( 'Sticky header offset', 'voice' ),
                'subtitle'  => esc_html__( 'Specify after how many px of scrolling sticky header appears', 'voice' ),
                'default' => vce_get_default_option( 'sticky_header_offset' ),
                'validate'  => 'numeric',
                'required' => array( 'sticky_header', '=', true )
            ),

            array(
                'id'        => 'sticky_header_logo',
                'type'      => 'media',
                'url'       => true,
                'title'     => esc_html__( 'Sticky header logo', 'voice' ),
                'subtitle'      => esc_html__( 'Optionally upload your logo image if you want to have different logo in sticky header instead of main logo', 'voice' ),
                'desc'  => esc_html__( 'Note: Optimal logo height is 40px. Allowed extensions are .jpg, .png and .gif', 'voice' ),
                'default' => vce_get_default_option( 'sticky_header_logo' ),
                'required' => array( 'sticky_header', '=', true )
            ),

            array(
                'id' => 'sticky_header_menu',
                'type' => 'select',
                'title' => esc_html__( 'Sticky Menu', 'voice' ),
                'subtitle' => esc_html__( 'Choose different menu for sticky header', 'voice' ),
                'options' => array(
                    'vce_main_navigation_menu' => esc_html__( 'Main Navigation' , 'voice' ),
                    'vce_top_navigation_menu' => esc_html__( 'Top Menu' , 'voice' ),
                    'vce_social_menu' => esc_html__( 'Social menu' , 'voice' ),
                    'vce_footer_menu' => esc_html__( 'Footer Menu' , 'voice' ),
                ),
                'default' => vce_get_default_option( 'sticky_header_menu' ),
                'required' => array( 'sticky_header', '=', true )
            ),
        )
    )
);

/* Content */
Redux::setSection( $opt_name , array(
        'icon'      => 'el-icon-file',
        'title'     => esc_html__( 'Content Styling', 'voice' ),
        'desc'     => esc_html__( 'These are options to style your main content area', 'voice' ),
        'fields'    => array(

            array(
                'id'       => 'body_style',
                'type'     => 'background',
                'title'    => esc_html__( 'Body background', 'voice' ),
                'subtitle' => esc_html__( 'Setup your body background color, image, pattern...', 'voice' ),
                'default' => vce_get_default_option( 'body_style' ),
            ),
            array(
                'id' => 'color_box_title_bg',
                'type' => 'color',
                'title' => esc_html__( 'Box/module headings background', 'voice' ),
                'subtitle' => esc_html__( 'This option apply to module headings background', 'voice' ),
                'transparent' => false,
                'default' => vce_get_default_option( 'color_box_title_bg' ),
            ),
            array(
                'id' => 'color_box_title_txt',
                'type' => 'color',
                'title' => esc_html__( 'Box/module headings text', 'voice' ),
                'subtitle' => esc_html__( 'This option apply to module headings text', 'voice' ),
                'transparent' => false,
                'default' => vce_get_default_option( 'color_box_title_txt' ),
            ),

            array(
                'id' => 'color_box_bg',
                'type' => 'color',
                'title' => esc_html__( 'Box/module background', 'voice' ),
                'subtitle' => esc_html__( 'Specify main boxes background color', 'voice' ),
                'transparent' => false,
                'default' => vce_get_default_option( 'color_box_bg' ),
            ),

            array(
                'id' => 'color_content_bg',
                'type' => 'color',
                'title' => esc_html__( 'Post/content background', 'voice' ),
                'subtitle' => esc_html__( 'Specify background color for posts, pages, etc', 'voice' ),
                'transparent' => false,
                'default' => vce_get_default_option( 'color_content_bg' ),
            ),

            array(
                'id' => 'color_content_title_txt',
                'type' => 'color',
                'title' => esc_html__( 'Post titles/h-elements', 'voice' ),
                'subtitle' => esc_html__( 'Specify color for posts/page titles, h1,h2,h3,etc...', 'voice' ),
                'transparent' => false,
                'default' => vce_get_default_option( 'color_content_title_txt' ),
            ),

            array(
                'id' => 'color_content_txt',
                'type' => 'color',
                'title' => esc_html__( 'Post/content text', 'voice' ),
                'subtitle' => esc_html__( 'This color applies to standard post/content text', 'voice' ),
                'transparent' => false,
                'default' => vce_get_default_option( 'color_content_txt' ),
            ),

            array(
                'id' => 'color_content_acc',
                'type' => 'color',
                'title' => esc_html__( 'Accent color', 'voice' ),
                'subtitle' => esc_html__( 'This color applies to links, buttons, special elements, etc...', 'voice' ),
                'transparent' => false,
                'default' => vce_get_default_option( 'color_content_acc' ),
            ),

            array(
                'id' => 'color_content_meta',
                'type' => 'color',
                'title' => esc_html__( 'Meta color', 'voice' ),
                'subtitle' => esc_html__( 'This color applies to meta data such as date, comments link, views, etc...', 'voice' ),
                'transparent' => false,
                'default' => vce_get_default_option( 'color_content_meta' ),
            ),

            array(
                'id' => 'color_pagination_bg',
                'type' => 'color',
                'title' => esc_html__( 'Pagination/actions background', 'voice' ),
                'subtitle' => esc_html__( 'This color applies to third level/bottom area of boxes which has pagination, buttons, etc...', 'voice' ),
                'transparent' => false,
                'default' => vce_get_default_option( 'color_pagination_bg' ),
            )

        )
    )
);


/* Sidebar */

Redux::setSection( $opt_name , array(
        'icon'      => 'el-icon-th-list',
        'title'     => esc_html__( 'Sidebar Styling', 'voice' ),
        'desc'     => esc_html__( 'These are styling settings for your sidebar/widgets', 'voice' ),
        'fields'    => array(

            array(
                'id' => 'add_sidebars',
                'type' => 'text',
                'class' => 'small-text',
                'title' => esc_html__( 'Additional sidebars', 'voice' ),
                'subtitle' => wp_kses_post( sprintf( __( 'Specify number of additional sidebars you want to use in this theme. You can manage your sidebars via <a href="%s">Appearance -> Widgets</a>', 'voice' ), admin_url( 'widgets.php' ) ) ),
                'desc' => esc_html__( 'Note: Leave empty for no additional sidebars.', 'voice' ),
                'default' => vce_get_default_option( 'add_sidebars' ),
                'validate' => 'numeric'
            ),

            array(
                'id' => 'color_widget_title_bg',
                'type' => 'color',
                'title' => esc_html__( 'Widget title background', 'voice' ),
                'subtitle' => esc_html__( 'Specify widget title background color', 'voice' ),
                'transparent' => false,
                'default' => vce_get_default_option( 'color_widget_title_bg' ),
            ),
            array(
                'id' => 'color_widget_title_txt',
                'type' => 'color',
                'title' => esc_html__( 'Widget title text', 'voice' ),
                'subtitle' => esc_html__( 'Specify widget title text color', 'voice' ),
                'transparent' => false,
                'default' => vce_get_default_option( 'color_widget_title_txt' ),
            ),
            array(
                'id' => 'color_widget_bg',
                'type' => 'color',
                'title' => esc_html__( 'Widget background', 'voice' ),
                'subtitle' => esc_html__( 'Specify widget background color', 'voice' ),
                'transparent' => false,
                'default' => vce_get_default_option( 'color_widget_bg' ),
            ),
            array(
                'id' => 'color_widget_txt',
                'type' => 'color',
                'title' => esc_html__( 'Widget text', 'voice' ),
                'subtitle' => esc_html__( 'Specify widget text color', 'voice' ),
                'transparent' => false,
                'default' => vce_get_default_option( 'color_widget_txt' ),
            ),

            array(
                'id' => 'color_widget_acc',
                'type' => 'color',
                'title' => esc_html__( 'Widget accent', 'voice' ),
                'subtitle' => esc_html__( 'This color will apply to link hovers, buttons, etc...', 'voice' ),
                'transparent' => false,
                'default' => vce_get_default_option( 'color_widget_acc' ),
            ),

            array(
                'id' => 'color_widget_sub',
                'type' => 'color',
                'title' => esc_html__( 'Sub-level background', 'voice' ),
                'subtitle' => esc_html__( 'This color will apply to additional area used at the bottom of some widgets', 'voice' ),
                'transparent' => false,
                'default' => vce_get_default_option( 'color_widget_sub' ),
            )

        ) )
);

/* Footer */

Redux::setSection( $opt_name , array(
        'icon'      => 'el-icon-bookmark-empty',
        'title'     => esc_html__( 'Footer Styling', 'voice' ),
        'desc'     => esc_html__( 'Manage settings for footer area', 'voice' ),
        'fields'    => array(

            array(
                'id' => 'footer_display',
                'type' => 'switch',
                'switch' => true,
                'title' => esc_html__( 'Enable Footer', 'voice' ),
                'desc' => wp_kses_post( sprintf( __( 'Check if you want to include footer area in your theme. You can manage footer area content in <a href="%s">Apperance -> Widgets</a> settings.', 'voice' ), admin_url( 'widgets.php' ) ) ),
                'default' => vce_get_default_option( 'footer_display' ),
            ),

            array(
                'id'        => 'footer_layout',
                'type'      => 'image_select',
                'title'     => esc_html__( 'Footer Columns', 'voice' ),
                'subtitle'  => esc_html__( 'Choose number of columns in footer area', 'voice' ),
                'desc'  => wp_kses_post( sprintf( __( 'Note: Each column represents one Footer Sidebar in <a href="%s">Apperance -> Widgets</a> settings.', 'voice' ), admin_url( 'widgets.php' ) ) ),
                'options'   => array(
                    '1' => array( 'title' => esc_html__( '1 Column', 'voice' ),       'img' => esc_url( get_parent_theme_file_uri( 'assets/img/admin/footer_full.png' ) ) ),
                    '2_2' => array( 'title' => esc_html__( '2 Columns (1/2 + 1/2)', 'voice' ),       'img' => esc_url( get_parent_theme_file_uri( 'assets/img/admin/footer_half.png' ) ) ),
                    '3_23' => array( 'title' => esc_html__( '2 Columns (1/3 + 2/3)', 'voice' ),       'img' => esc_url( get_parent_theme_file_uri( 'assets/img/admin/footer_one_two.png' ) ) ),
                    '23_3' => array( 'title' => esc_html__( '2 Columns (2/3 + 1/3)', 'voice' ),       'img' => esc_url( get_parent_theme_file_uri( 'assets/img/admin/footer_two_one.png' ) ) ),
                    '3_3_3' => array( 'title' => esc_html__( '3 Columns', 'voice' ),       'img' => esc_url( get_parent_theme_file_uri( 'assets/img/admin/footer_third.png' ) ) )
                ),
                'default' => vce_get_default_option( 'footer_layout' ),
                'required' => array( 'footer_display', '=', true )
            ),

            array(
                'id' => 'color_footer_bg',
                'type' => 'color',
                'title' => esc_html__( 'Footer background', 'voice' ),
                'subtitle' => esc_html__( 'Specify footer background color', 'voice' ),
                'transparent' => false,
                'default' => vce_get_default_option( 'color_footer_bg' ),
            ),


            array(
                'id' => 'color_footer_title_txt',
                'type' => 'color',
                'title' => esc_html__( 'Headings text color', 'voice' ),
                'subtitle' => esc_html__( 'This color will apply to footer widget titles, headings, etc...', 'voice' ),
                'transparent' => false,
                'default' => vce_get_default_option( 'color_footer_title_txt' ),
            ),

            array(
                'id' => 'color_footer_txt',
                'type' => 'color',
                'title' => esc_html__( 'Text color', 'voice' ),
                'subtitle' => esc_html__( 'This is standard text color for footer', 'voice' ),
                'transparent' => false,
                'default' => vce_get_default_option( 'color_footer_txt' ),
            ),

            array(
                'id' => 'color_footer_acc',
                'type' => 'color',
                'title' => esc_html__( 'Accent color', 'voice' ),
                'subtitle' => esc_html__( 'This color will apply to buttons, links, etc...', 'voice' ),
                'transparent' => false,
                'default' => vce_get_default_option( 'color_footer_acc' ),
            ),


            array(
                'id' => 'enable_copyright',
                'type' => 'switch',
                'title' => esc_html__( 'Enable bottom bar / copyright area', 'voice' ),
                'subtitle' => esc_html__( 'Check if you want to include copyright area below footer', 'voice' ),
                'default' => vce_get_default_option( 'enable_copyright' ),
            ),

            array(
                'id' => 'footer_copyright',
                'type' => 'editor',
                'title' => esc_html__( 'Copyright', 'voice' ),
                'subtitle' => esc_html__( 'Specify some copyright text to show at the bottom of the website', 'voice' ),
                'default' => vce_get_default_option( 'footer_copyright' ),
                'args'   => array(
                    'textarea_rows'    => 3  ,
                    'default_editor' => 'html'                          ),
                'required' => array( 'enable_copyright', '=', true )
            ),


            array(
                'id'        => 'footer_bar_left',
                'type'      => 'select',
                'title'     => esc_html__( 'Bottom bar left', 'voice' ),
                'subtitle'  => esc_html__( 'Choose what to display in copyright bar left area', 'voice' ),
                'options' => vce_get_copybar_items(),
                'required' => array( 'enable_copyright', '=', true ),
                'default' => vce_get_default_option( 'footer_bar_left' ),
            ),

            array(
                'id'        => 'footer_bar_center',
                'type'      => 'select',
                'title'     => esc_html__( 'Bottom bar center', 'voice' ),
                'subtitle'  => esc_html__( 'Choose what to display in copyright bar center area', 'voice' ),
                'options' => vce_get_copybar_items(),
                'required' => array( 'enable_copyright', '=', true ),
                'default' => vce_get_default_option( 'footer_bar_center' ),
            ),

            array(
                'id'        => 'footer_bar_right',
                'type'      => 'select',
                'title'     => esc_html__( 'Bottom bar right', 'voice' ),
                'subtitle'  => esc_html__( 'Choose what to display in copyright bar right area', 'voice' ),
                'options' => vce_get_copybar_items(),
                'required' => array( 'enable_copyright', '=', true ),
                'default' => vce_get_default_option( 'footer_bar_right' ),
            )


        ) )
);


/* Post Layout settings */
Redux::setSection( $opt_name, array(
        'icon'    => 'el-icon-th-large',
        'title'   => esc_html__( 'Post Layouts', 'voice' ),
        'heading' => false,
        'fields'  => array() )
);

/* Layout FA large */
Redux::setSection( $opt_name, array(
        'icon'       => '',
        'title'      => esc_html__( 'Featured area (large)', 'voice' ),
        'heading'    => false,
        'subsection' => true,
        'fields'     => array(

            array(
                'id'        => 'section_layout_fa_big',
                'type'      => 'vce_section',
                'title'     => '<img src="' . esc_url( get_parent_theme_file_uri( 'assets/img/admin/featured_big.png' ) ) . '"/>'.esc_html__( 'Featured area (full-width posts)', 'voice' ),
                'subtitle'  => esc_html__( 'Manage options for big post(s) displayed in featured area', 'voice' ),
                'indent'    => false
            ),

            array(
                'id' => 'lay_fa_big_cat',
                'type' => 'switch',
                'title' => esc_html__( 'Display category', 'voice' ),
                'subtitle' => esc_html__( 'Check if you want to display category link for featured area main post', 'voice' ),
                'default' => vce_get_default_option( 'lay_fa_big_cat' ),
            ),

            array(
                'id' => 'lay_fa_big_title_limit',
                'type' => 'text',
                'class' => 'small-text',
                'title' => esc_html__( 'Post titles limit', 'voice' ),
                'subtitle' => esc_html__( 'Specify number of characters to limit post titles for featured area main posts', 'voice' ),
                'desc' => esc_html__( 'Note: Leave empty if you want to show full titles.', 'voice' ),
                'default' => vce_get_default_option( 'lay_fa_big_title_limit' ),
                'validate' => 'numeric'
            ),

            array(
                'id'        => 'lay_fa_big_meta',
                'type'      => 'sortable',
                'mode'      => 'checkbox',
                'title'     => esc_html__( 'Meta data', 'voice' ),
                'subtitle'  => esc_html__( 'Check which meta data to show for featured area main posts', 'voice' ),
                'options'   => vce_get_meta_opts(),
                'default' => vce_get_default_option( 'lay_fa_big_meta' ),
            ),

            array(
                'id' => 'lay_fa_big_autoplay',
                'type' => 'text',
                'class' => 'small-text',
                'title' => esc_html__( 'Autoplay slides', 'voice' ),
                'subtitle' => esc_html__( 'Specify number of seconds if you want to enable automatic sliding for featured area main posts', 'voice' ),
                'description' => esc_html__( 'i.e. Put "5" to auto slide each 5 seconds or leave empty for no autoplay', 'voice' ),
                'default' => vce_get_default_option( 'lay_fa_big_autoplay' ),
                'validate' => 'numeric'
            ),
            array(
                'id'        => 'lay_fa_big_opc',
                'type'      => 'slider',
                'title'     => esc_html__( 'Overlay opacity', 'voice' ),
                'subtitle'  => esc_html__( 'Choose values for image overlay opacity', 'voice' ),
                'description' => esc_html__( 'Note: First value is for initial opacity, second one is for image hover', 'voice' ),
                'default' => vce_get_default_option( 'lay_fa_big_opc' ),
                'resolution' => 0.1,
                'min' => 0,
                'step' => 0.1,
                'max' => 1,
                'display_value' => 'label',
                'handles' => 2,
            ),

        )
    )
);

/* Layout FA medium */
Redux::setSection( $opt_name, array(
        'icon'       => '',
        'title'      => esc_html__( 'Featured area (medium)', 'voice' ),
        'heading'    => false,
        'subsection' => true,
        'fields'     => array(

            array(
                'id'        => 'section_layout_fa_grid_big',
                'type'      => 'vce_section',
                'title'     => '<img src="' . esc_url( get_parent_theme_file_uri( 'assets/img/admin/featured_big_grid.png' ) ) . '"/>'.esc_html__( 'Featured area (3 grid items)', 'voice' ),
                'subtitle'  => esc_html__( 'Manage options for posts displayed in featured area grid/slider', 'voice' ),
                'indent'    => false
            ),

            array(
                'id' => 'lay_fa_grid_big_cat',
                'type' => 'switch',
                'title' => esc_html__( 'Display category', 'voice' ),
                'subtitle' => esc_html__( 'Check if you want to display category link for posts in featured area grid/slider', 'voice' ),
                'default' => vce_get_default_option( 'lay_fa_grid_big_cat' ),
            ),

            array(
                'id' => 'lay_fa_grid_big_title_limit',
                'type' => 'text',
                'class' => 'small-text',
                'title' => esc_html__( 'Post titles limit', 'voice' ),
                'subtitle' => esc_html__( 'Specify number of characters to limit post titles for featured area grid/slider', 'voice' ),
                'desc' => esc_html__( 'Note: Leave empty if you want to show full titles.', 'voice' ),
                'default' => vce_get_default_option( 'lay_fa_grid_big_title_limit' ),
                'validate' => 'numeric'
            ),

            array(
                'id'        => 'lay_fa_grid_big_meta',
                'type'      => 'sortable',
                'mode'      => 'checkbox',
                'title'     => esc_html__( 'Meta data', 'voice' ),
                'subtitle'  => esc_html__( 'Check which meta data to show for posts in featured area grid/slider', 'voice' ),
                'options'   => vce_get_meta_opts(),
                'default' => vce_get_default_option( 'lay_fa_grid_big_meta' ),
            ),

            array(
                'id' => 'lay_fa_grid_big_autoplay',
                'type' => 'text',
                'class' => 'small-text',
                'title' => esc_html__( 'Autoplay slides', 'voice' ),
                'subtitle' => esc_html__( 'Specify number of seconds if you want to enable automatic sliding for featured area grid/slider', 'voice' ),
                'description' => esc_html__( 'i.e. Put "5" to auto slide each 5 seconds or leave empty for no autoplay', 'voice' ),
                'default' => vce_get_default_option( 'lay_fa_grid_big_autoplay' ),
                'validate' => 'numeric'
            ),

            array(
                'id'        => 'lay_fa_grid_big_opc',
                'type'      => 'slider',
                'title'     => esc_html__( 'Overlay opacity', 'voice' ),
                'subtitle'  => esc_html__( 'Choose values for image overlay opacity', 'voice' ),
                'description' => esc_html__( 'Note: First value is for initial opacity, second one is for image hover', 'voice' ),
                'default' => vce_get_default_option( 'lay_fa_grid_big_opc' ),
                'resolution' => 0.1,
                'min' => 0,
                'step' => 0.1,
                'max' => 1,
                'display_value' => 'label',
                'handles' => 2,
            ),

        )
    )
);

/* Layout FA small */
Redux::setSection( $opt_name, array(
        'icon'       => '',
        'title'      => esc_html__( 'Featured area (small)', 'voice' ),
        'heading'    => false,
        'subsection' => true,
        'fields'     => array(

            array(
                'id'        => 'section_layout_fa_grid',
                'type'      => 'vce_section',
                'title'     => '<img src="' . esc_url( get_parent_theme_file_uri( 'assets/img/admin/featured_grid.png' ) ) . '"/>'.esc_html__( 'Featured area (5 grid items)', 'voice' ),
                'subtitle'  => esc_html__( 'Manage options for posts displayed in featured area grid/slider', 'voice' ),
                'indent'    => false
            ),

            array(
                'id' => 'lay_fa_grid_cat',
                'type' => 'switch',
                'title' => esc_html__( 'Display category', 'voice' ),
                'subtitle' => esc_html__( 'Check if you want to display category link for posts in featured area grid/slider', 'voice' ),
                'default' => vce_get_default_option( 'lay_fa_grid_cat' ),
            ),

            array(
                'id' => 'lay_fa_grid_title_limit',
                'type' => 'text',
                'class' => 'small-text',
                'title' => esc_html__( 'Post titles limit', 'voice' ),
                'subtitle' => esc_html__( 'Specify number of characters to limit post titles for featured area grid/slider', 'voice' ),
                'desc' => esc_html__( 'Note: Leave empty if you want to show full titles.', 'voice' ),
                'default' => vce_get_default_option( 'lay_fa_grid_title_limit' ),
                'validate' => 'numeric'
            ),

            array(
                'id'        => 'lay_fa_grid_meta',
                'type'      => 'sortable',
                'mode'      => 'checkbox',
                'title'     => esc_html__( 'Meta data', 'voice' ),
                'subtitle'  => esc_html__( 'Check which meta data to show for posts in featured area grid/slider', 'voice' ),
                'options'   => vce_get_meta_opts(),
                'default' => vce_get_default_option( 'lay_fa_grid_meta' ),
            ),

            array(
                'id' => 'lay_fa_grid_center',
                'type' => 'switch',
                'title' => esc_html__( 'Center text vertically', 'voice' ),
                'subtitle' => esc_html__( 'Check if you want to always center the text vertically over the image ', 'voice' ),
                'default' => vce_get_default_option( 'lay_fa_grid_center' ),
            ),

            array(
                'id' => 'lay_fa_grid_autoplay',
                'type' => 'text',
                'class' => 'small-text',
                'title' => esc_html__( 'Autoplay slides', 'voice' ),
                'subtitle' => esc_html__( 'Specify number of seconds if you want to enable automatic sliding for featured area grid/slider', 'voice' ),
                'description' => esc_html__( 'i.e. Put "5" to auto slide each 5 seconds or leave empty for no autoplay', 'voice' ),
                'default' => vce_get_default_option( 'lay_fa_grid_autoplay' ),
                'validate' => 'numeric'
            ),

            array(
                'id'        => 'lay_fa_grid_opc',
                'type'      => 'slider',
                'title'     => esc_html__( 'Overlay opacity', 'voice' ),
                'subtitle'  => esc_html__( 'Choose values for image overlay opacity', 'voice' ),
                'description' => esc_html__( 'Note: First value is for initial opacity, second one is for image hover', 'voice' ),
                'default' => vce_get_default_option( 'lay_fa_grid_opc' ),
                'resolution' => 0.1,
                'min' => 0,
                'step' => 0.1,
                'max' => 1,
                'display_value' => 'label',
                'handles' => 2,
            ),

        )
    )
);


/* Layout A */
Redux::setSection( $opt_name, array(
        'icon'       => '',
        'title'      => esc_html__( 'Layout A', 'voice' ),
        'heading'    => false,
        'subsection' => true,
        'fields'     => array(

            array(
                'id'        => 'section_layout_a',
                'type'      => 'vce_section',
                'title'     => '<img src="' . esc_url( get_parent_theme_file_uri( 'assets/img/admin/layout_a.png' ) ) . '"/>'.esc_html__( 'Layout A', 'voice' ),
                'subtitle'  => esc_html__( 'Manage options for posts displayed in layout A', 'voice' ),
                'indent'    => false
            ),

            array(
                'id' => 'lay_a_cat',
                'type' => 'switch',
                'title' => esc_html__( 'Display category', 'voice' ),
                'subtitle' => esc_html__( 'Check if you want to display category link for posts in layout A', 'voice' ),
                'default' => vce_get_default_option( 'lay_a_cat' ),
            ),

            array(
                'id' => 'lay_a_title_limit',
                'type' => 'text',
                'class' => 'small-text',
                'title' => esc_html__( 'Post titles limit', 'voice' ),
                'subtitle' => esc_html__( 'Specify number of characters to limit post titles for layout A', 'voice' ),
                'desc' => esc_html__( 'Note: Leave empty if you want to show full titles.', 'voice' ),
                'default' => vce_get_default_option( 'lay_a_title_limit' ),
                'validate' => 'numeric'
            ),

            array(
                'id'        => 'lay_a_meta',
                'type'      => 'sortable',
                'mode'      => 'checkbox',
                'title'     => esc_html__( 'Meta data', 'voice' ),
                'subtitle'  => esc_html__( 'Check which meta data to show for posts in layout A', 'voice' ),
                'options'   => vce_get_meta_opts(),
                'default' => vce_get_default_option( 'lay_a_meta' ),
            ),

            array(
                'id' => 'lay_a_content_type',
                'type' => 'radio',
                'title' => esc_html__( 'Layout A content type', 'voice' ),
                'subtitle' => esc_html__( 'Check how would you like to display post content for Layout A', 'voice' ),
                'options'   => array(
                    'content' => esc_html__( 'Content (manually split with "<--more-->" tag)', 'voice' ),
                    'excerpt' => esc_html__( 'Excerpt (automatically limit number of characters)', 'voice' )
                ),
                'default' => vce_get_default_option( 'lay_a_content_type' ),
            ),

            array(
                'id' => 'lay_a_excerpt',
                'type' => 'switch',
                'title' => esc_html__( 'Display excerpt', 'voice' ),
                'subtitle' => esc_html__( 'Check if you want to display text excerpt for posts in layout A', 'voice' ),
                'default' => vce_get_default_option( 'lay_a_excerpt' ),
                'required'  => array( 'lay_a_content_type', '=', 'excerpt' )
            ),


            array(
                'id' => 'lay_a_excerpt_limit',
                'type' => 'text',
                'class' => 'small-text',
                'title' => esc_html__( 'Excerpt limit', 'voice' ),
                'subtitle' => esc_html__( 'Specify your excerpt limit if you are using excerpts on blog posts', 'voice' ),
                'desc' => esc_html__( 'Note: Value represents number of characters', 'voice' ),
                'default' => vce_get_default_option( 'lay_a_excerpt_limit' ),
                'validate' => 'numeric',
                'required'  => array( array( 'lay_a_excerpt', '=', true ), array( 'lay_a_content_type', '=', 'excerpt' ) )
            ),

            array(
                'id' => 'lay_a_readmore',
                'type' => 'switch',
                'title' => esc_html__( 'Display read more link', 'voice' ),
                'subtitle' => esc_html__( 'Check if you want to display "read more" link for posts in layout C', 'voice' ),
                'default' => vce_get_default_option( 'lay_a_readmore' ),
            ),

            array(
                'id' => 'lay_a_icon',
                'type' => 'switch',
                'title' => esc_html__( 'Display post format icon', 'voice' ),
                'subtitle' => esc_html__( 'Check if you want to display post format icon (video, audio...) for posts in layout A', 'voice' ),
                'default' => vce_get_default_option( 'lay_a_icon' ),
            ),

        )
    )
);

/* Layout B */
Redux::setSection( $opt_name, array(
        'icon'       => '',
        'title'      => esc_html__( 'Layout B', 'voice' ),
        'heading'    => false,
        'subsection' => true,
        'fields'     => array(

            array(
                'id'        => 'section_layout_b',
                'type'      => 'vce_section',
                'title'     => '<img src="' . esc_url( get_parent_theme_file_uri( 'assets/img/admin/layout_b.png' ) ) . '"/>'.esc_html__( 'Layout B', 'voice' ),
                'subtitle'  => esc_html__( 'Manage options for layout B', 'voice' ),
                'indent'    => false
            ),

            array(
                'id' => 'lay_b_cat',
                'type' => 'switch',
                'title' => esc_html__( 'Display category', 'voice' ),
                'subtitle' => esc_html__( 'Check if you want to display category link for posts in layout B', 'voice' ),
                'default' => vce_get_default_option( 'lay_b_cat' ),
            ),

            array(
                'id' => 'lay_b_title_limit',
                'type' => 'text',
                'class' => 'small-text',
                'title' => esc_html__( 'Post titles limit', 'voice' ),
                'subtitle' => esc_html__( 'Specify number of characters to limit post titles for layout B', 'voice' ),
                'desc' => esc_html__( 'Note: Value represents number of characters. Leave empty if you want to show full titles.', 'voice' ),
                'default' => vce_get_default_option( 'lay_b_title_limit' ),
                'validate' => 'numeric'
            ),

            array(
                'id'        => 'lay_b_meta',
                'type'      => 'sortable',
                'mode'      => 'checkbox',
                'title'     => esc_html__( 'Meta data', 'voice' ),
                'subtitle'  => esc_html__( 'Check which meta data to show for layout B', 'voice' ),
                'options'   => vce_get_meta_opts(),
                'default' => vce_get_default_option( 'lay_b_meta' ),
            ),

            array(
                'id' => 'lay_b_excerpt',
                'type' => 'switch',
                'title' => esc_html__( 'Display excerpt', 'voice' ),
                'subtitle' => esc_html__( 'Check if you want to display text excerpt for posts in layout B', 'voice' ),
                'default' => vce_get_default_option( 'lay_b_excerpt' ),
            ),

            array(
                'id' => 'lay_b_excerpt_limit',
                'type' => 'text',
                'class' => 'small-text',
                'title' => esc_html__( 'Excerpt limit', 'voice' ),
                'subtitle' => esc_html__( 'Specify your post excerpt limit for layout B', 'voice' ),
                'desc' => esc_html__( 'Note: Value represents number of characters', 'voice' ),
                'default' => vce_get_default_option( 'lay_b_excerpt_limit' ),
                'validate' => 'numeric',
                'required'  => array( 'lay_b_excerpt', '=', true )
            ),

            array(
                'id' => 'lay_b_icon',
                'type' => 'switch',
                'title' => esc_html__( 'Display post format icon', 'voice' ),
                'subtitle' => esc_html__( 'Check if you want to display post format icon (video, audio...) for posts in layout B', 'voice' ),
                'default' => vce_get_default_option( 'lay_b_icon' ),
            ),

        )
    )
);

/* Layout C */
Redux::setSection( $opt_name, array(
        'icon'       => '',
        'title'      => esc_html__( 'Layout C', 'voice' ),
        'heading'    => false,
        'subsection' => true,
        'fields'     => array(


            array(
                'id'        => 'section_layout_c',
                'type'      => 'vce_section',
                'title'     => '<img src="' . esc_url( get_parent_theme_file_uri( 'assets/img/admin/layout_c.png' ) ) . '"/>'.esc_html__( 'Layout C', 'voice' ),
                'subtitle'  => esc_html__( 'Manage options for layout C', 'voice' ),
                'indent'    => false
            ),

            array(
                'id' => 'lay_c_cat',
                'type' => 'switch',
                'title' => esc_html__( 'Display category', 'voice' ),
                'subtitle' => esc_html__( 'Check if you want to display category link for posts in layout C', 'voice' ),
                'default' => vce_get_default_option( 'lay_c_cat' ),
            ),

            array(
                'id' => 'lay_c_title_limit',
                'type' => 'text',
                'class' => 'small-text',
                'title' => esc_html__( 'Post titles limit', 'voice' ),
                'subtitle' => esc_html__( 'Specify number of characters to limit post titles for layout C', 'voice' ),
                'desc' => esc_html__( 'Note: Value represents number of characters. Leave empty if you want to show full titles.', 'voice' ),
                'default' => vce_get_default_option( 'lay_c_title_limit' ),
                'validate' => 'numeric'
            ),


            array(
                'id'        => 'lay_c_meta',
                'type'      => 'sortable',
                'mode'      => 'checkbox',
                'title'     => esc_html__( 'Meta data', 'voice' ),
                'subtitle'  => esc_html__( 'Check which meta data to show for layout C', 'voice' ),
                'options'   => vce_get_meta_opts(),
                'default' => vce_get_default_option( 'lay_c_meta' ),
            ),

            array(
                'id' => 'lay_c_excerpt',
                'type' => 'switch',
                'title' => esc_html__( 'Display excerpt', 'voice' ),
                'subtitle' => esc_html__( 'Check if you want to display text excerpt for posts in layout C', 'voice' ),
                'default' => vce_get_default_option( 'lay_c_excerpt' ),
            ),

            array(
                'id' => 'lay_c_readmore',
                'type' => 'switch',
                'title' => esc_html__( 'Display read more link', 'voice' ),
                'subtitle' => esc_html__( 'Check if you want to display "read more" link for posts in layout A', 'voice' ),
                'default' => vce_get_default_option( 'lay_c_readmore' ),
            ),

            array(
                'id' => 'lay_c_excerpt_limit',
                'type' => 'text',
                'class' => 'small-text',
                'title' => esc_html__( 'Excerpt limit', 'voice' ),
                'subtitle' => esc_html__( 'Specify your post excerpt limit for layout C', 'voice' ),
                'desc' => esc_html__( 'Note: Value represents number of characters', 'voice' ),
                'default' => vce_get_default_option( 'lay_c_excerpt_limit' ),
                'validate' => 'numeric',
                'required'  => array( 'lay_c_excerpt', '=', true )
            ),


            array(
                'id' => 'lay_c_icon',
                'type' => 'switch',
                'title' => esc_html__( 'Display post format icon', 'voice' ),
                'subtitle' => esc_html__( 'Check if you want to display post format icon (video, audio...) for posts in layout C', 'voice' ),
                'default' => vce_get_default_option( 'lay_c_icon' ),
            ),

        )
    )
);

/* Layout D */
Redux::setSection( $opt_name, array(
        'icon'       => '',
        'title'      => esc_html__( 'Layout D', 'voice' ),
        'heading'    => false,
        'subsection' => true,
        'fields'     => array(

            array(
                'id'        => 'section_layout_d',
                'type'      => 'vce_section',
                'title'     => '<img src="' . esc_url( get_parent_theme_file_uri( 'assets/img/admin/layout_d.png' ) ) . '"/>'.esc_html__( 'Layout D', 'voice' ),
                'subtitle'  => esc_html__( 'Manage options for layout D', 'voice' ),
                'indent'    => false
            ),

            array(
                'id' => 'lay_d_cat',
                'type' => 'switch',
                'title' => esc_html__( 'Display category', 'voice' ),
                'subtitle' => esc_html__( 'Check if you want to display category link for posts in layout D', 'voice' ),
                'default' => vce_get_default_option( 'lay_d_cat' ),
            ),

            array(
                'id' => 'lay_d_title_limit',
                'type' => 'text',
                'class' => 'small-text',
                'title' => esc_html__( 'Post titles limit', 'voice' ),
                'subtitle' => esc_html__( 'Specify number of characters to limit post titles for layout D', 'voice' ),
                'desc' => esc_html__( 'Note: Value represents number of characters. Leave empty if you want to show full titles.', 'voice' ),
                'default' => vce_get_default_option( 'lay_d_title_limit' ),
                'validate' => 'numeric'
            ),

            array(
                'id'        => 'lay_d_meta',
                'type'      => 'sortable',
                'mode'      => 'checkbox',
                'title'     => esc_html__( 'Meta data', 'voice' ),
                'subtitle'  => esc_html__( 'Check which meta data to show for layout D', 'voice' ),
                'options'   => vce_get_meta_opts(),
                'default' => vce_get_default_option( 'lay_d_meta' ),
            ),

            array(
                'id' => 'lay_d_icon',
                'type' => 'switch',
                'title' => esc_html__( 'Display post format icon', 'voice' ),
                'subtitle' => esc_html__( 'Check if you want to display post format icon (video, audio...) for posts in layout D', 'voice' ),
                'default' => vce_get_default_option( 'lay_d_icon' ),
            ),


        )
    )
);

/* Layout E */
Redux::setSection( $opt_name, array(
        'icon'       => '',
        'title'      => esc_html__( 'Layout E', 'voice' ),
        'heading'    => false,
        'subsection' => true,
        'fields'     => array(

            array(
                'id'        => 'section_layout_e',
                'type'      => 'vce_section',
                'title'     => '<img src="' . esc_url( get_parent_theme_file_uri( 'assets/img/admin/layout_e.png' ) ) . '"/>'.esc_html__( 'Layout E', 'voice' ),
                'subtitle'  => esc_html__( 'Manage options for layout E', 'voice' ),
                'indent'    => false
            ),

            array(
                'id' => 'lay_e_title',
                'type' => 'switch',
                'title' => esc_html__( 'Display post title', 'voice' ),
                'subtitle' => esc_html__( 'Check if you want to display post title posts in layout E', 'voice' ),
                'default' => vce_get_default_option( 'lay_e_title' ),
            ),

            array(
                'id' => 'lay_e_title_limit',
                'type' => 'text',
                'class' => 'small-text',
                'title' => esc_html__( 'Post titles limit', 'voice' ),
                'subtitle' => esc_html__( 'Specify number of characters to limit post titles for layout E', 'voice' ),
                'desc' => esc_html__( 'Note: Value represents number of characters. Leave empty if you want to show full titles.', 'voice' ),
                'default' => vce_get_default_option( 'lay_e_title_limit' ),
                'validate' => 'numeric'
            ),

            array(
                'id'        => 'lay_e_meta',
                'type'      => 'sortable',
                'mode'      => 'checkbox',
                'title'     => esc_html__( 'Meta data', 'voice' ),
                'subtitle'  => esc_html__( 'Check which meta data to show for layout E', 'voice' ),
                'options'   => vce_get_meta_opts(),
                'default' => vce_get_default_option( 'lay_e_meta' ),
            ),

            array(
                'id' => 'lay_e_icon',
                'type' => 'switch',
                'title' => esc_html__( 'Display post format icon', 'voice' ),
                'subtitle' => esc_html__( 'Check if you want to display post format icon (video, audio...) for posts in layout E', 'voice' ),
                'default' => vce_get_default_option( 'lay_e_icon' ),
            ),

        )
    )
);

/* Layout F */
Redux::setSection( $opt_name, array(
        'icon'       => '',
        'title'      => esc_html__( 'Layout F', 'voice' ),
        'heading'    => false,
        'subsection' => true,
        'fields'     => array(

            array(
                'id'        => 'section_layout_f',
                'type'      => 'vce_section',
                'title'     => '<img src="' . esc_url( get_parent_theme_file_uri( 'assets/img/admin/layout_f.png' ) ) . '"/>'.esc_html__( 'Layout F', 'voice' ),
                'subtitle'  => esc_html__( 'Manage options for layout F', 'voice' ),
                'indent'    => false
            ),


            array(
                'id' => 'lay_f_title_limit',
                'type' => 'text',
                'class' => 'small-text',
                'title' => esc_html__( 'Post titles limit', 'voice' ),
                'subtitle' => esc_html__( 'Specify number of characters to limit post titles for layout F', 'voice' ),
                'desc' => esc_html__( 'Note: Value represents number of characters. Leave empty if you want to show full titles.', 'voice' ),
                'default' => vce_get_default_option( 'lay_f_title_limit' ),
                'validate' => 'numeric'
            ),

        )
    )
);


/* Layout G */
Redux::setSection( $opt_name, array(
        'icon'       => '',
        'title'      => esc_html__( 'Layout G', 'voice' ),
        'heading'    => false,
        'subsection' => true,
        'fields'     => array(

            array(
                'id'        => 'section_layout_g',
                'type'      => 'vce_section',
                'title'     => '<img src="' . esc_url( get_parent_theme_file_uri( 'assets/img/admin/layout_g.png' ) ) . '"/>'.esc_html__( 'Layout G', 'voice' ),
                'subtitle'  => esc_html__( 'Manage options for posts displayed in layout G', 'voice' ),
                'indent'    => false
            ),

            array(
                'id' => 'lay_g_cat',
                'type' => 'switch',
                'title' => esc_html__( 'Display category', 'voice' ),
                'subtitle' => esc_html__( 'Check if you want to display category link for posts in layout G', 'voice' ),
                'default' => vce_get_default_option( 'lay_g_cat' ),
            ),

            array(
                'id' => 'lay_g_title_limit',
                'type' => 'text',
                'class' => 'small-text',
                'title' => esc_html__( 'Post titles limit', 'voice' ),
                'subtitle' => esc_html__( 'Specify number of characters to limit post titles for layout G', 'voice' ),
                'desc' => esc_html__( 'Note: Leave empty if you want to show full titles.', 'voice' ),
                'default' => vce_get_default_option( 'lay_g_title_limit' ),
                'validate' => 'numeric'
            ),

            array(
                'id'        => 'lay_g_meta',
                'type'      => 'sortable',
                'mode'      => 'checkbox',
                'title'     => esc_html__( 'Meta data', 'voice' ),
                'subtitle'  => esc_html__( 'Check which meta data to show for posts in layout G', 'voice' ),
                'options'   => vce_get_meta_opts(),
                'default' => vce_get_default_option( 'lay_g_meta' ),
            ),

            array(
                'id' => 'lay_g_excerpt',
                'type' => 'switch',
                'title' => esc_html__( 'Display excerpt', 'voice' ),
                'subtitle' => esc_html__( 'Check if you want to display text excerpt for posts in layout G', 'voice' ),
                'default' => vce_get_default_option( 'lay_g_excerpt' ),
            ),

            array(
                'id' => 'lay_g_excerpt_limit',
                'type' => 'text',
                'class' => 'small-text',
                'title' => esc_html__( 'Excerpt limit', 'voice' ),
                'subtitle' => esc_html__( 'Specify your post excerpt limit for layout G', 'voice' ),
                'desc' => esc_html__( 'Note: Value represents number of characters', 'voice' ),
                'default' => vce_get_default_option( 'lay_g_excerpt_limit' ),
                'validate' => 'numeric',
                'required'  => array( 'lay_g_excerpt', '=', true )
            ),

            array(
                'id' => 'lay_g_icon',
                'type' => 'switch',
                'title' => esc_html__( 'Display post format icon', 'voice' ),
                'subtitle' => esc_html__( 'Check if you want to display post format icon (video, audio...) for posts in layout G', 'voice' ),
                'default' => vce_get_default_option( 'lay_g_icon' ),
            ),


        )
    )
);

/* Layout H */
Redux::setSection( $opt_name, array(
        'icon'       => '',
        'title'      => esc_html__( 'Layout H', 'voice' ),
        'heading'    => false,
        'subsection' => true,
        'fields'     => array(

            array(
                'id'        => 'section_layout_h',
                'type'      => 'vce_section',
                'title'     => '<img src="' . esc_url( get_parent_theme_file_uri( 'assets/img/admin/layout_h.png' ) ) . '"/>' . esc_html__( 'Layout H', 'voice' ),
                'subtitle'  => esc_html__( 'Manage options for layout H', 'voice' ),
                'indent'    => false
            ),

            array(
                'id' => 'lay_h_cat',
                'type' => 'switch',
                'title' => esc_html__( 'Display category', 'voice' ),
                'subtitle' => esc_html__( 'Check if you want to display category link for posts in layout H', 'voice' ),
                'default' => vce_get_default_option( 'lay_h_cat' ),
            ),

            array(
                'id' => 'lay_h_title_limit',
                'type' => 'text',
                'class' => 'small-text',
                'title' => esc_html__( 'Post titles limit', 'voice' ),
                'subtitle' => esc_html__( 'Specify number of characters to limit post titles for layout H', 'voice' ),
                'desc' => esc_html__( 'Note: Value represents number of characters. Leave empty if you want to show full titles.', 'voice' ),
                'default' => vce_get_default_option( 'lay_h_title_limit' ),
                'validate' => 'numeric'
            ),


            array(
                'id'        => 'lay_h_meta',
                'type'      => 'sortable',
                'mode'      => 'checkbox',
                'title'     => esc_html__( 'Meta data', 'voice' ),
                'subtitle'  => esc_html__( 'Check which meta data to show for layout H', 'voice' ),
                'options'   => vce_get_meta_opts(),
                'default' => vce_get_default_option( 'lay_h_meta' ),
            ),

            array(
                'id' => 'lay_h_excerpt',
                'type' => 'switch',
                'title' => esc_html__( 'Display excerpt', 'voice' ),
                'subtitle' => esc_html__( 'Check if you want to display text excerpt for posts in layout H', 'voice' ),
                'default' => vce_get_default_option( 'lay_h_excerpt' ),
            ),

            array(
                'id' => 'lay_h_excerpt_limit',
                'type' => 'text',
                'class' => 'small-text',
                'title' => esc_html__( 'Excerpt limit', 'voice' ),
                'subtitle' => esc_html__( 'Specify your post excerpt limit for layout H', 'voice' ),
                'desc' => esc_html__( 'Note: Value represents number of characters', 'voice' ),
                'default' => vce_get_default_option( 'lay_h_excerpt_limit' ),
                'validate' => 'numeric',
                'required'  => array( 'lay_h_excerpt', '=', true )
            )
        )
    )
);



/* Single Post */
Redux::setSection( $opt_name , array(
        'icon'      => 'el-icon-pencil',
        'title'     => esc_html__( 'Single Post', 'voice' ),
        'desc'     => esc_html__( 'Manage settings for single post template', 'voice' ),
        'fields'    => array(

            array(
                'id'        => 'single_layout',
                'type'      => 'image_select',
                'title'     => esc_html__( 'Single post layout', 'voice' ),
                'subtitle'  => esc_html__( 'Choose default layout for your single posts', 'voice' ),
                'desc' => esc_html__( 'Note: You can override this option for each particular post', 'voice' ),
                'options'   => vce_get_single_layout_opts(),
                'default' => vce_get_default_option( 'single_layout' ),
            ),

            array(
                'id'        => 'single_content_width',
                'type'      => 'slider',
                'title'     => esc_html__( 'Content width (with sidebar)', 'voice' ),
                'subtitle'  => esc_html__( 'Choose post content width for posts which have sidebar included', 'voice' ),
                'desc' => esc_html__( 'Note: Value is in px.', 'voice' ),
                'min' => 600,
                'max' => 760,
                'step' => 10,
                'default' => vce_get_default_option( 'single_content_width' ),
            ),

            array(
                'id'        => 'single_content_width_full',
                'type'      => 'slider',
                'title'     => esc_html__( 'Content width (without sidebar)', 'voice' ),
                'subtitle'  => esc_html__( 'Choose post content width for posts which don\'t have sidebar included (full width posts)', 'voice' ),
                'desc' => esc_html__( 'Note: Value is in px.', 'voice' ),
                'min' => 600,
                'max' => 1090,
                'step' => 10,
                'default' => vce_get_default_option( 'single_content_width_full' ),
            ),

            array(
                'id'        => 'single_use_sidebar',
                'type'      => 'image_select',
                'title'     => esc_html__( 'Sidebar layout', 'voice' ),
                'subtitle'  => esc_html__( 'Choose default sidebar layout for single posts', 'voice' ),
                'desc' => esc_html__( 'Note: You can override this option for each particular post', 'voice' ),
                'options'   => vce_get_sidebar_layouts(),
                'default' => vce_get_default_option( 'single_use_sidebar' ),
            ),

            array(
                'id'        => 'single_sidebar',
                'type'      => 'select',
                'title'     => esc_html__( 'Post standard sidebar', 'voice' ),
                'subtitle'  => esc_html__( 'Choose single post standard sidebar', 'voice' ),
                'options'   => vce_get_sidebars_list(),
                'default' => vce_get_default_option( 'single_sidebar' ),
                'required'  => array( 'single_use_sidebar', '!=', 'none' )
            ),

            array(
                'id'        => 'single_sticky_sidebar',
                'type'      => 'select',
                'title'     => esc_html__( 'Post sticky sidebar', 'voice' ),
                'subtitle'  => esc_html__( 'Choose single post sticky sidebar', 'voice' ),
                'options'   => vce_get_sidebars_list(),
                'default' => vce_get_default_option( 'single_sticky_sidebar' ),
                'required'  => array( 'single_use_sidebar', '!=', 'none' )
            ),

            array(
                'id'        => 'single_meta',
                'type'      => 'sortable',
                'mode'      => 'checkbox',
                'title'     => esc_html__( 'Meta data', 'voice' ),
                'subtitle'  => esc_html__( 'Check which meta data to show for single post', 'voice' ),
                'options'   => vce_get_meta_opts(),
                'default' => vce_get_default_option( 'single_meta' ),
            ),

            array(
                'id' => 'show_cat',
                'type' => 'switch',
                'title' => esc_html__( 'Display category link', 'voice' ),
                'subtitle' => esc_html__( 'Choose if you want to display category link', 'voice' ),
                'default' => vce_get_default_option( 'show_cat' ),
            ),

            array(
                'id' => 'show_fimg',
                'type' => 'switch',
                'title' => esc_html__( 'Display featured image', 'voice' ),
                'subtitle' => esc_html__( 'Choose if you want to display featured image', 'voice' ),
                'default' => vce_get_default_option( 'show_fimg' ),
            ),

            array(
                'id' => 'show_fimg_cap',
                'type' => 'switch',
                'title' => esc_html__( 'Display featured image caption', 'voice' ),
                'subtitle' => esc_html__( 'Choose if you want to display caption/description on featured image', 'voice' ),
                'default' => vce_get_default_option( 'show_fimg_cap' ),
                'required'  => array( 'show_fimg', '=', true )
            ),

            array(
                'id' => 'show_author_img',
                'type' => 'switch',
                'title' => esc_html__( 'Display author image', 'voice' ),
                'subtitle' => esc_html__( 'Choose if you want to display author image below featured image', 'voice' ),
                'default' => vce_get_default_option( 'show_author_img' ),
            ),

            array(
                'id' => 'show_headline',
                'type' => 'switch',
                'title' => esc_html__( 'Display headline (excerpt)', 'voice' ),
                'subtitle' => esc_html__( 'Choose if you want to display headline (post excerpt) before main post content', 'voice' ),
                'default' => vce_get_default_option( 'show_headline' ),
            ),

            array(
                'id' => 'show_tags',
                'type' => 'switch',
                'title' => esc_html__( 'Display tags', 'voice' ),
                'subtitle' => esc_html__( 'Choose if you want to display tags below post content', 'voice' ),
                'default' => vce_get_default_option( 'show_tags' ),
            ),

            array(
                'id' => 'show_share',
                'type' => 'switch',
                'title' => esc_html__( 'Display share buttons', 'voice' ),
                'subtitle' => esc_html__( 'Choose if you want to display social share buttons', 'voice' ),
                'desc' => !function_exists( 'meks_ess_share' ) ? wp_kses_post( sprintf( __( 'Note: <a href="%s">Meks Easy Social Share plugin</a> must be activated to use share option.', 'voice' ),  admin_url( 'themes.php?page=install-required-plugins' ) ) ) : '',
                'default' => vce_get_default_option( 'show_share' ),
            ),

            array(
                'id'        => 'social_share',
                'type'      => 'sortable',
                'mode'      => 'checkbox',
                'title'     => esc_html__( 'Social share buttons', 'voice' ),
                'subtitle'  => esc_html__( 'Check which social networks you want to use for sharing your posts', 'voice' ),
                'desc' => !function_exists( 'meks_ess_share' ) ? wp_kses_post( sprintf( __( 'Note: <a href="%s">Meks Easy Social Share plugin</a> must be activated to use share option.', 'voice' ),  admin_url( 'themes.php?page=install-required-plugins' ) ) ) : '',
                'options'   => vce_get_social_platforms(),
                'default' => vce_get_default_option( 'social_share' ),
                'required'  => array( 'show_share', '=', true ),
            ),

            array(
                'id' => 'show_prev_next',
                'type' => 'switch',
                'title' => esc_html__( 'Display previous/next post links', 'voice' ),
                'subtitle' => esc_html__( 'Choose if you want to display previous and next post links for current post.', 'voice' ),
                'default' => vce_get_default_option( 'show_prev_next' ),
            ),
            array(
                'id' => 'prev_next_cat',
                'type' => 'checkbox',
                'title' => esc_html__( 'Previous/next links to posts from same category?', 'voice' ),
                'subtitle' => esc_html__( 'Check if you want previous and next post links to display only posts from same category.', 'voice' ),
                'default' => vce_get_default_option( 'prev_next_cat' ),
                'required' => array( 'show_prev_next', '=', '1' )
            ),


            array(
                'id' => 'show_author_box',
                'type' => 'switch',
                'title' => esc_html__( 'Display author box', 'voice' ),
                'subtitle' => esc_html__( 'Choose if you want to display "about author" area below post content.', 'voice' ),
                'default' => vce_get_default_option( 'show_author_box' ),
            ),

            array(
                'id' => 'author_box_position',
                'type' => 'radio',
                'title' => esc_html__( 'Author box position', 'voice' ),
                'subtitle' => esc_html__( 'Choose where to display author box', 'voice' ),
                'options'   => array(
                    'up' => esc_html__( 'Above related posts', 'voice' ),
                    'down' => esc_html__( 'Below related posts', 'voice' )
                ),
                'default' => vce_get_default_option( 'author_box_position' ),
                'required'  => array( 'show_author_box', '=', true ),
            ),

            array(
                'id' => 'comments_position',
                'type' => 'switch',
                'title' => esc_html__( 'Comment form on top', 'voice' ),
                'subtitle' => esc_html__( 'Choose if you want to display the comment form before comments', 'voice' ),
                'default' => vce_get_default_option( 'comments_position' ),
            ),

            array(
                'id' => 'single_infinite_scroll',
                'type' => 'switch',
                'title' => esc_html__( 'Infinite scroll', 'voice' ),
                'subtitle' => esc_html__( 'Enable infinite scroll loading for single posts', 'voice' ),
                'default' => vce_get_default_option( 'single_infinite_scroll' ),
            ),

            array(
                'id'        => 'section_related',
                'type'      => 'section',
                'title'     => esc_html__( 'Related Posts', 'voice' ),
                'subtitle'  => esc_html__( 'Manage options for related posts area', 'voice' ),
                'indent'    => false
            ),

            array(
                'id' => 'show_related',
                'type' => 'switch',
                'title' => esc_html__( 'Display "related" posts box', 'voice' ),
                'subtitle' => esc_html__( 'Choose if you want to display additional area with related posts below post content', 'voice' ),
                'default' => vce_get_default_option( 'show_related' ),
            ),


            array(
                'id'        => 'related_layout',
                'type'      => 'image_select',
                'title'     => esc_html__( 'Related area posts layout', 'voice' ),
                'default' => vce_get_default_option( 'related_layout' ),
                'options'   => vce_get_main_layouts(),
                'required'  => array( 'show_related', '=', true ),
            ),

            array(
                'id'        => 'related_limit',
                'type'      => 'text',
                'class'     => 'small-text',
                'title'     => esc_html__( 'Related area posts number limit', 'voice' ),
                'default' => vce_get_default_option( 'related_limit' ),
                'validate'  => 'numeric',
                'required'  => array( 'show_related', '=', true ),
            ),

            array(
                'id'        => 'related_type',
                'type'      => 'radio',
                'title'     => esc_html__( 'Related area chooses from', 'voice' ),
                'options'   => array(
                    'cat' => esc_html__( 'Posts located in same category', 'voice' ),
                    'tag' => esc_html__( 'Posts tagged with at least one same tag', 'voice' ),
                    'cat_or_tag' => esc_html__( 'Posts located in same category OR tagged with same tag', 'voice' ),
                    'cat_and_tag' => esc_html__( 'Posts located in same category AND tagged with same tag', 'voice' ),
                    'author' => esc_html__( 'Posts by same author', 'voice' ),
                    '0' => esc_html__( 'All posts', 'voice' )
                ),
                'default' => vce_get_default_option( 'related_type' ),
                'required'  => array( 'show_related', '=', true ),
            ),

            array(
                'id'        => 'related_order',
                'type'      => 'radio',
                'title'     => esc_html__( 'Related posts are ordered by', 'voice' ),
                'options'   => vce_get_post_order_opts(),
                'default' => vce_get_default_option( 'related_order' ),
                'required'  => array( 'show_related', '=', true ),
            ),

            array(
                'id'        => 'related_time',
                'type'      => 'radio',
                'title'     => esc_html__( 'Related posts are not older than', 'voice' ),
                'options'   => vce_get_time_diff_opts( 'from' ),
                'default' => vce_get_default_option( 'related_time' ),
                'required'  => array( 'show_related', '=', true ),
            ),

            array(
                'id'        => 'section_paginated',
                'type'      => 'section',
                'title'     => esc_html__( 'Paginated/Multipage Posts', 'voice' ),
                'subtitle'  => esc_html__( 'These are options which apply to your posts split with "&lt;!--nextpage--&gt; tag"', 'voice' ),
                'indent'    => false
            ),

            array(
                'id' => 'show_paginated',
                'type' => 'radio',
                'title' => esc_html__( 'Display navigation for paginated posts', 'voice' ),
                'subtitle' => esc_html__( 'Choose where to display navigation for paginated/multi-page posts', 'voice' ),
                'options'   => array(
                    'above' => esc_html__( 'Above post content', 'voice' ),
                    'below' => esc_html__( 'Below post content', 'voice' )
                ),
                'default' => vce_get_default_option( 'show_paginated' ),
            ),

            array(
                'id' => 'show_paginated_fimg',
                'type' => 'switch',
                'title' => esc_html__( 'Display featured image on first page of paginated post', 'voice' ),
                'subtitle' => esc_html__( 'Check if you want to display featured image/author image on the first page of paginated/multi page posts', 'voice' ),
                'default' => vce_get_default_option( 'show_paginated_fimg' ),
            ),

            array(
                'id' => 'show_paginated_headline',
                'type' => 'switch',
                'title' => esc_html__( 'Display headline/excerpt on first page of paginated post', 'voice' ),
                'subtitle' => esc_html__( 'Check if you want to display headline/excerp on the first page of paginated/multi page posts', 'voice' ),
                'default' => vce_get_default_option( 'show_paginated_headline' ),
            ),

        ) )
);

/* Page */
Redux::setSection( $opt_name , array(
        'icon'      => 'el-icon-file-edit',
        'title'     => esc_html__( 'Page Templates', 'voice' ),
        'desc'     => esc_html__( 'Manage default settings for your pages (page templates)', 'voice' ),
        'fields'    => array(

            array(
                'id'        => 'page_layout',
                'type'      => 'image_select',
                'title'     => esc_html__( 'Page layout', 'voice' ),
                'subtitle'  => esc_html__( 'Choose default layout for your pages', 'voice' ),
                'desc' => esc_html__( 'Note: You can override this option for each particular page', 'voice' ),
                'options'   => vce_get_single_layout_opts(),
                'default' => vce_get_default_option( 'page_layout' ),
            ),

            array(
                'id'        => 'page_content_width',
                'type'      => 'slider',
                'title'     => esc_html__( 'Page content width (with sidebar)', 'voice' ),
                'subtitle'  => esc_html__( 'Choose page content width for pages which have sidebar included', 'voice' ),
                'desc' => esc_html__( 'Note: Value is in px.', 'voice' ),
                'min' => 600,
                'max' => 760,
                'step' => 10,
                'default' => vce_get_default_option( 'page_content_width' ),
            ),

            array(
                'id'        => 'page_content_width_full',
                'type'      => 'slider',
                'title'     => esc_html__( 'Page content width (without sidebar)', 'voice' ),
                'subtitle'  => esc_html__( 'Choose page content width for pages which don\'t have sidebar included (full width pages)', 'voice' ),
                'desc' => esc_html__( 'Note: Value is in px.', 'voice' ),
                'min' => 600,
                'max' => 1090,
                'step' => 10,
                'default' => vce_get_default_option( 'page_content_width_full' ),
            ),

            array(
                'id'        => 'page_use_sidebar',
                'type'      => 'image_select',
                'title'     => esc_html__( 'Sidebar layout', 'voice' ),
                'subtitle'  => esc_html__( 'Choose default sidebar layout for pages', 'voice' ),
                'desc' => esc_html__( 'Note: You can override this option for each particular page', 'voice' ),
                'options'   => vce_get_sidebar_layouts(),
                'default' => vce_get_default_option( 'page_use_sidebar' ),
            ),

            array(
                'id'        => 'page_sidebar',
                'type'      => 'select',
                'title'     => esc_html__( 'Page standard sidebar', 'voice' ),
                'subtitle'  => esc_html__( 'Choose page standard sidebar', 'voice' ),
                'options'   => vce_get_sidebars_list(),
                'default' => vce_get_default_option( 'page_sidebar' ),
                'required'  => array( 'page_use_sidebar', '!=', 'none' )
            ),

            array(
                'id'        => 'page_sticky_sidebar',
                'type'      => 'select',
                'title'     => esc_html__( 'Page sticky sidebar', 'voice' ),
                'subtitle'  => esc_html__( 'Choose page sticky sidebar', 'voice' ),
                'options'   => vce_get_sidebars_list(),
                'default' => vce_get_default_option( 'page_sticky_sidebar' ),
                'required'  => array( 'page_use_sidebar', '!=', 'none' )
            ),

            array(
                'id' => 'page_show_fimg',
                'type' => 'switch',
                'title' => esc_html__( 'Display featured image', 'voice' ),
                'subtitle' => esc_html__( 'Choose if you want to display featured image on single pages', 'voice' ),
                'default' => vce_get_default_option( 'page_show_fimg' ),
            ),

            array(
                'id' => 'page_show_fimg_cap',
                'type' => 'switch',
                'title' => esc_html__( 'Display featured image caption', 'voice' ),
                'subtitle' => esc_html__( 'Choose if you want to display caption/description on featured image', 'voice' ),
                'default' => vce_get_default_option( 'page_show_fimg_cap' ),
                'required'  => array( 'page_show_fimg', '=', true )
            ),

            array(
                'id' => 'page_show_comments',
                'type' => 'switch',
                'title' => esc_html__( 'Display comments', 'voice' ),
                'subtitle' => esc_html__( 'Choose if you want to display comments on single pages', 'voice' ),
                'description' => esc_html__( 'Note: This is just an option to quickly hide the comments on pages. If you want to allow/disallow comments properly, you need to do it in "Discussion" box for each particular page.', 'voice' ),
                'default' => vce_get_default_option( 'page_show_comments' ),
            ),

            array(
                'id' => 'page_show_share',
                'type' => 'switch',
                'title' => esc_html__( 'Display share buttons', 'voice' ),
                'subtitle' => esc_html__( 'Choose if you want to display social share buttons', 'voice' ),
                'desc' => !function_exists( 'meks_ess_share' ) ? wp_kses_post( sprintf( __( 'Note: <a href="%s">Meks Easy Social Share plugin</a> must be activated to use share option.', 'voice' ),  admin_url( 'themes.php?page=install-required-plugins' ) ) ) : '',
                'default' => vce_get_default_option( 'page_show_share' ),
            ),

            array(
                'id'        => 'page_social_share',
                'type'      => 'sortable',
                'mode'      => 'checkbox',
                'title'     => esc_html__( 'Social share buttons', 'voice' ),
                'subtitle'  => esc_html__( 'Check which social networks you want to use for sharing your pages', 'voice' ),
                'desc' => !function_exists( 'meks_ess_share' ) ? wp_kses_post( sprintf( __( 'Note: <a href="%s">Meks Easy Social Share plugin</a> must be activated to use share option.', 'voice' ),  admin_url( 'themes.php?page=install-required-plugins' ) ) ) : '',
                'options'   => vce_get_social_platforms(),
                'default' => vce_get_default_option( 'page_social_share' ),
                'required'  => array( 'page_show_share', '=', true ),
            ),
        ) )
);

/* Categories */
Redux::setSection( $opt_name , array(
        'icon'      => 'el-icon-folder',
        'title'     => esc_html__( 'Category Templates', 'voice' ),
        'desc'     => esc_html__( 'Manage settings for category templates. Note: these are global category settings, you can optionally modify these settings for each category.', 'voice' ),
        'fields'    => array(

            array(
                'id'        => 'category_fa',
                'type'      => 'switch',
                'title'     => esc_html__( 'Display featured area/slider', 'voice' ),
                'subtitle'  => esc_html__( 'Check if you want to enable featured area for category templates', 'voice' ),
                'default' => vce_get_default_option( 'category_fa' ),
            ),

            array(
                'id'        => 'category_fa_layout',
                'type'      => 'image_select',
                'title'     => esc_html__( 'Featured area layout', 'voice' ),
                'subtitle'  => esc_html__( 'Choose a layout for your featured area on category templates', 'voice' ),
                'options'   => vce_get_featured_area_layouts(),
                'default' => vce_get_default_option( 'category_fa_layout' ),
                'required' => array( 'category_fa', 'equals', true )
            ),

            array(
                'id'        => 'category_fa_limit',
                'class'     => 'small-text',
                'type'      => 'text',
                'title'     => esc_html__( 'Number of featured area posts', 'voice' ),
                'subtitle'  => esc_html__( 'Specify how many posts you want to display inside featured area', 'voice' ),
                'default' => vce_get_default_option( 'category_fa_limit' ),
                'validate'  =>'numeric',
                'required'  => array( 'category_fa', 'equals', true )
            ),

            array(
                'id'        => 'category_fa_order',
                'type'      => 'radio',
                'title'     => esc_html__( 'Featured posts are ordered by', 'voice' ),
                'options'   => vce_get_post_order_opts(),
                'default' => vce_get_default_option( 'category_fa_order' ),
                'required'  => array( 'category_fa', '=', true ),
            ),

            array(
                'id'        => 'category_fa_time',
                'type'      => 'radio',
                'title'     => esc_html__( 'Featured posts are not older than', 'voice' ),
                'options'   => vce_get_time_diff_opts( 'from' ),
                'default' => vce_get_default_option( 'category_fa_time' ),
                'required'  => array( 'category_fa', '=', true ),
            ),

            array(
                'id'        => 'category_fa_not_duplicate',
                'type'      => 'switch',
                'title'     => esc_html__( 'Do not duplicate', 'voice' ),
                'subtitle'  => esc_html__( 'Enable this option to exclude posts in featured area from showing in main post listing', 'voice' ),
                'default' => vce_get_default_option( 'category_fa_not_duplicate' ),
                'required'  => array( 'category_fa', '=', true ),
            ),

            array(
                'id'        => 'category_fa_hide_on_pages',
                'type'      => 'switch',
                'title'     => esc_html__( 'Show featured area on first page only', 'voice' ),
                'subtitle'  => esc_html__( 'Enable this option to display featured area only on first page of category', 'voice' ),
                'default' => vce_get_default_option( 'category_fa_hide_on_pages' ),
                'required'  => array( 'category_fa', '=', true ),
            ),



            array(
                'id'        => 'category_layout',
                'type'      => 'image_select',
                'title'     => esc_html__( 'Category posts main layout', 'voice' ),
                'subtitle'  => esc_html__( 'Choose how to display your posts on category templates', 'voice' ),
                'options'   => vce_get_main_layouts(),
                'default' => vce_get_default_option( 'category_layout' ),
            ),

            array(
                'id'        => 'category_use_top',
                'type'      => 'switch',
                'title'     => esc_html__( 'Enable starter posts', 'voice' ),
                'subtitle'  => esc_html__( 'Check if you want to enable top/starter posts which will have different different layout than posts in main listing', 'voice' ),
                'default' => vce_get_default_option( 'category_use_top' ),
            ),

            array(
                'id'        => 'category_top_layout',
                'type'      => 'image_select',
                'title'     => esc_html__( 'Category starter posts layout', 'voice' ),
                'subtitle'  => esc_html__( 'Choose how to display top/starter posts on category templates', 'voice' ),
                'options'   => vce_get_main_layouts(),
                'default' => vce_get_default_option( 'category_top_layout' ),
                'required'  => array( 'category_use_top', 'equals', true )
            ),

            array(
                'id'        => 'category_top_limit',
                'class'     => 'small-text',
                'type'      => 'text',
                'title'     => esc_html__( 'Number of starter posts', 'voice' ),
                'subtitle'  => esc_html__( 'Specify how many top/starter posts you want to have', 'voice' ),
                'default' => vce_get_default_option( 'category_top_limit' ),
                'validate'  =>'numeric',
                'required'  => array( 'category_use_top', 'equals', true )
            ),

            array(
                'id'        => 'category_use_sidebar',
                'type'      => 'image_select',
                'title'     => esc_html__( 'Sidebar layout', 'voice' ),
                'subtitle'  => esc_html__( 'Choose default sidebar layout for category template', 'voice' ),
                'options'   => vce_get_sidebar_layouts(),
                'default' => vce_get_default_option( 'category_use_sidebar' ),
            ),

            array(
                'id'        => 'category_sidebar',
                'type'      => 'select',
                'title'     => esc_html__( 'Category standard sidebar', 'voice' ),
                'subtitle'  => esc_html__( 'Choose standard category sidebar', 'voice' ),
                'options'   => vce_get_sidebars_list(),
                'default' => vce_get_default_option( 'category_sidebar' ),
                'required'  => array( 'category_use_sidebar', '!=', 'none' )
            ),

            array(
                'id'        => 'category_sticky_sidebar',
                'type'      => 'select',
                'title'     => esc_html__( 'Category sticky sidebar', 'voice' ),
                'subtitle'  => esc_html__( 'Choose sticky category sidebar', 'voice' ),
                'options'   => vce_get_sidebars_list(),
                'default' => vce_get_default_option( 'category_sticky_sidebar' ),
                'required'  => array( 'category_use_sidebar', '!=', 'none' )
            ),

            array(
                'id'        => 'category_pagination',
                'type'      => 'image_select',
                'title'     => esc_html__( 'Category pagination', 'voice' ),
                'subtitle'  => esc_html__( 'Choose which pagination to use on category templates', 'voice' ),
                'options'   => vce_get_pagination_layouts(),
                'default' => vce_get_default_option( 'category_pagination' ),
            ),

            array(
                'id'        => 'category_ppp',
                'type'      => 'radio',
                'title'     => esc_html__( 'Posts per page', 'voice' ),
                'subtitle'  => esc_html__( 'Choose how many posts per page you want to display', 'voice' ),
                'options'   => array(
                    'inherit' => wp_kses_post( sprintf( __( 'Inherit from global option in <a href="%s">Settings->Reading</a>', 'voice' ), admin_url( 'options-general.php' ) ) ),
                    'custom' => esc_html__( 'Custom number', 'voice' )
                ),
                'default' => vce_get_default_option( 'category_ppp' ),
            ),

            array(
                'id'        => 'category_ppp_num',
                'type'      => 'text',
                'class'     => 'small-text',
                'title'     => esc_html__( 'Number of post per page', 'voice' ),
                'default' => vce_get_default_option( 'category_ppp_num' ),
                'required'  => array( 'category_ppp', '=', 'custom' ),
                'validate'  => 'numeric'
            )

        ) )
);

/* Tags */
Redux::setSection( $opt_name , array(
        'icon'      => ' el-icon-tag',
        'title'     => esc_html__( 'Tag Templates', 'voice' ),
        'desc'     => esc_html__( 'Manage settings for tag templates', 'voice' ),
        'fields'    => array(

            array(
                'id'        => 'tag_layout',
                'type'      => 'image_select',
                'title'     => esc_html__( 'Tag archives layout', 'voice' ),
                'subtitle'  => esc_html__( 'Choose how to display your posts on tag template', 'voice' ),
                'options'   => vce_get_main_layouts(),
                'default' => vce_get_default_option( 'tag_layout' ),
            ),


            array(
                'id'        => 'tag_use_sidebar',
                'type'      => 'image_select',
                'title'     => esc_html__( 'Sidebar layout', 'voice' ),
                'subtitle'  => esc_html__( 'Choose sidebar layout for tag template', 'voice' ),
                'options'   => vce_get_sidebar_layouts(),
                'default' => vce_get_default_option( 'tag_use_sidebar' ),
            ),

            array(
                'id'        => 'tag_sidebar',
                'type'      => 'select',
                'title'     => esc_html__( 'Tag standard sidebar', 'voice' ),
                'subtitle'  => esc_html__( 'Choose standard sidebar for tag template', 'voice' ),
                'options'   => vce_get_sidebars_list(),
                'default' => vce_get_default_option( 'tag_sidebar' ),
                'required'  => array( 'tag_use_sidebar', '!=', 'none' )
            ),

            array(
                'id'        => 'tag_sticky_sidebar',
                'type'      => 'select',
                'title'     => esc_html__( 'Tag sticky sidebar', 'voice' ),
                'subtitle'  => esc_html__( 'Choose sticky sidebar for tag template', 'voice' ),
                'options'   => vce_get_sidebars_list(),
                'default' => vce_get_default_option( 'tag_sticky_sidebar' ),
                'required'  => array( 'tag_use_sidebar', '!=', 'none' )
            ),

            array(
                'id'        => 'tag_pagination',
                'type'      => 'image_select',
                'title'     => esc_html__( 'Tag pagination', 'voice' ),
                'subtitle'  => esc_html__( 'Choose which pagination to use on tag template', 'voice' ),
                'options'   => vce_get_pagination_layouts(),
                'default' => vce_get_default_option( 'tag_pagination' ),
            ),

            array(
                'id'        => 'tag_ppp',
                'type'      => 'radio',
                'title'     => esc_html__( 'Posts per page', 'voice' ),
                'subtitle'  => esc_html__( 'Choose how many posts per page you want to display', 'voice' ),
                'options'   => array(
                    'inherit' => wp_kses_post( sprintf( __( 'Inherit from global option in <a href="%s">Settings->Reading</a>', 'voice' ), admin_url( 'options-general.php' ) ) ),
                    'custom' => esc_html__( 'Custom number', 'voice' )
                ),
                'default' => vce_get_default_option( 'tag_ppp' ),
            ),

            array(
                'id'        => 'tag_ppp_num',
                'type'      => 'text',
                'class'     => 'small-text',
                'title'     => esc_html__( 'Number of post per page', 'voice' ),
                'default' => vce_get_default_option( 'tag_ppp_num' ),
                'required'  => array( 'tag_ppp', '=', 'custom' ),
                'validate'  => 'numeric'
            )

        ) )
);

/* Author */
Redux::setSection( $opt_name , array(
        'icon'      => 'el-icon-user',
        'title'     => esc_html__( 'Author Templates', 'voice' ),
        'desc'     => esc_html__( 'Manage settings for author templates', 'voice' ),
        'fields'    => array(

            array(
                'id'        => 'author_layout',
                'type'      => 'image_select',
                'title'     => esc_html__( 'Author archives layout', 'voice' ),
                'subtitle'  => esc_html__( 'Choose how to display your posts on author template', 'voice' ),
                'options'   => vce_get_main_layouts(),
                'default' => vce_get_default_option( 'author_layout' ),
            ),

            array(
                'id'        => 'author_use_sidebar',
                'type'      => 'image_select',
                'title'     => esc_html__( 'Sidebar layout', 'voice' ),
                'subtitle'  => esc_html__( 'Choose sidebar layout for author template', 'voice' ),
                'options'   => vce_get_sidebar_layouts(),
                'default' => vce_get_default_option( 'author_use_sidebar' ),
            ),

            array(
                'id'        => 'author_sidebar',
                'type'      => 'select',
                'title'     => esc_html__( 'Author standard sidebar', 'voice' ),
                'subtitle'  => esc_html__( 'Choose standard sidebar for author template', 'voice' ),
                'options'   => vce_get_sidebars_list(),
                'default' => vce_get_default_option( 'author_sidebar' ),
                'required'  => array( 'author_use_sidebar', '!=', 'none' )
            ),

            array(
                'id'        => 'author_sticky_sidebar',
                'type'      => 'select',
                'title'     => esc_html__( 'Author sticky sidebar', 'voice' ),
                'subtitle'  => esc_html__( 'Choose sticky sidebar for author template', 'voice' ),
                'options'   => vce_get_sidebars_list(),
                'default' => vce_get_default_option( 'author_sticky_sidebar' ),
                'required'  => array( 'author_use_sidebar', '!=', 'none' )
            ),

            array(
                'id'        => 'author_pagination',
                'type'      => 'image_select',
                'title'     => esc_html__( 'Author pagination', 'voice' ),
                'subtitle'  => esc_html__( 'Choose which pagination to use on author template', 'voice' ),
                'options'   => vce_get_pagination_layouts(),
                'default' => vce_get_default_option( 'author_pagination' ),
            ),

            array(
                'id'        => 'author_ppp',
                'type'      => 'radio',
                'title'     => esc_html__( 'Posts per page', 'voice' ),
                'subtitle'  => esc_html__( 'Choose how many posts per page you want to display', 'voice' ),
                'options'   => array(
                    'inherit' => wp_kses_post( sprintf( __( 'Inherit from global option in <a href="%s">Settings->Reading</a>', 'voice' ), admin_url( 'options-general.php' ) ) ),
                    'custom' => esc_html__( 'Custom number', 'voice' )
                ),
                'default' => vce_get_default_option( 'author_ppp' ),
            ),

            array(
                'id'        => 'author_ppp_num',
                'type'      => 'text',
                'class'     => 'small-text',
                'title'     => esc_html__( 'Number of post per page', 'voice' ),
                'default' => vce_get_default_option( 'author_ppp_num' ),
                'required'  => array( 'author_ppp', '=', 'custom' ),
                'validate'  => 'numeric'
            )

        ) )
);

/* Search */
Redux::setSection( $opt_name , array(
        'icon'      => 'el-icon-search',
        'title'     => esc_html__( 'Search Template', 'voice' ),
        'desc'     => esc_html__( 'Manage settings for search results template', 'voice' ),
        'fields'    => array(

            array(
                'id'        => 'search_layout',
                'type'      => 'image_select',
                'title'     => esc_html__( 'Search archives layout', 'voice' ),
                'subtitle'  => esc_html__( 'Choose how to display your posts on search template', 'voice' ),
                'options'   => vce_get_main_layouts(),
                'default' => vce_get_default_option( 'search_layout' ),
            ),

            array(
                'id'        => 'search_use_sidebar',
                'type'      => 'image_select',
                'title'     => esc_html__( 'Sidebar layout', 'voice' ),
                'subtitle'  => esc_html__( 'Choose sidebar layout for search template', 'voice' ),
                'options'   => vce_get_sidebar_layouts(),
                'default' => vce_get_default_option( 'search_use_sidebar' ),
            ),

            array(
                'id'        => 'search_sidebar',
                'type'      => 'select',
                'title'     => esc_html__( 'Search standard sidebar', 'voice' ),
                'subtitle'  => esc_html__( 'Choose standard sidebar for search template', 'voice' ),
                'options'   => vce_get_sidebars_list(),
                'default' => vce_get_default_option( 'search_sidebar' ),
                'required'  => array( 'search_use_sidebar', '!=', 'none' )
            ),

            array(
                'id'        => 'search_sticky_sidebar',
                'type'      => 'select',
                'title'     => esc_html__( 'Search sticky sidebar', 'voice' ),
                'subtitle'  => esc_html__( 'Choose sticky sidebar for search template', 'voice' ),
                'options'   => vce_get_sidebars_list(),
                'default' => vce_get_default_option( 'search_sticky_sidebar' ),
                'required'  => array( 'search_use_sidebar', '!=', 'none' )
            ),

            array(
                'id'        => 'search_pagination',
                'type'      => 'image_select',
                'title'     => esc_html__( 'Search pagination', 'voice' ),
                'subtitle'  => esc_html__( 'Choose which pagination to use on search template', 'voice' ),
                'options'   => vce_get_pagination_layouts(),
                'default' => vce_get_default_option( 'search_pagination' ),
            ),

            array(
                'id'        => 'search_ppp',
                'type'      => 'radio',
                'title'     => esc_html__( 'Posts per page', 'voice' ),
                'subtitle'  => esc_html__( 'Choose how many posts per page you want to display', 'voice' ),
                'options'   => array(
                    'inherit' => wp_kses_post( sprintf( __( 'Inherit from global option in <a href="%s">Settings->Reading</a>', 'voice' ), admin_url( 'options-general.php' ) ) ),
                    'custom' => esc_html__( 'Custom number', 'voice' )
                ),
                'default' => vce_get_default_option( 'search_ppp' ),
            ),

            array(
                'id'        => 'search_ppp_num',
                'type'      => 'text',
                'class'     => 'small-text',
                'title'     => esc_html__( 'Number of post per page', 'voice' ),
                'default' => vce_get_default_option( 'search_ppp_num' ),
                'required'  => array( 'search_ppp', '=', 'custom' ),
                'validate'  => 'numeric'
            )

        ) )
);



/* Posts page archive */
Redux::setSection( $opt_name , array(
        'icon'      => 'el-icon-folder-open',
        'title'     => esc_html__( 'Posts Page Archive', 'voice' ),
        'desc'     => wp_kses_post( sprintf( __( 'Manage settings for posts page archive if you are using "posts page" option in <a href="%s">Settings-> Reading</a>', 'voice' ), admin_url( 'options-reading.php' ) ) ),
        'fields'    => array(

            array(
                'id'        => 'posts_page_layout',
                'type'      => 'image_select',
                'title'     => esc_html__( 'Posts page archives layout', 'voice' ),
                'subtitle'  => esc_html__( 'Choose how to display your posts on posts page template', 'voice' ),
                'options'   => vce_get_main_layouts(),
                'default' => vce_get_default_option( 'posts_page_layout' ),
            ),

            array(
                'id'        => 'posts_page_pagination',
                'type'      => 'image_select',
                'title'     => esc_html__( 'Posts page pagination', 'voice' ),
                'subtitle'  => esc_html__( 'Choose which pagination to use on posts page template', 'voice' ),
                'options'   => vce_get_pagination_layouts(),
                'default' => vce_get_default_option( 'posts_page_pagination' ),
            ),

            array(
                'id'        => 'posts_page_ppp',
                'type'      => 'radio',
                'title'     => esc_html__( 'Posts per page', 'voice' ),
                'subtitle'  => esc_html__( 'Choose how many posts per page you want to display', 'voice' ),
                'options'   => array(
                    'inherit' => wp_kses_post( sprintf( __( 'Inherit from global option in <a href="%s">Settings->Reading</a>', 'voice' ), admin_url( 'options-reading.php' ) ) ),
                    'custom' => esc_html__( 'Custom number', 'voice' )
                ),
                'default' => vce_get_default_option( 'posts_page_ppp' ),
            ),

            array(
                'id'        => 'posts_page_ppp_num',
                'type'      => 'text',
                'class'     => 'small-text',
                'title'     => esc_html__( 'Number of post per page', 'voice' ),
                'default' => vce_get_default_option( 'posts_page_ppp_num' ),
                'required'  => array( 'posts_page_ppp', '=', 'custom' ),
                'validate'  => 'numeric'
            )

        ) )
);


/* Archives */

Redux::setSection( $opt_name , array(
        'icon'      => 'el-icon-folder-open',
        'title'     => esc_html__( 'Archive Templates', 'voice' ),
        'desc'     => esc_html__( 'Manage settings for other miscellaneous templates like date archives, post format archives, etc...', 'voice' ),
        'fields'    => array(
            array(
                'id'        => 'archive_layout',
                'type'      => 'image_select',
                'title'     => esc_html__( 'Archives layout', 'voice' ),
                'subtitle'  => esc_html__( 'Choose how to display your posts on miscellaneous archive templates', 'voice' ),
                'options'   => vce_get_main_layouts(),
                'default' => vce_get_default_option( 'archive_layout' ),
            ),

            array(
                'id'        => 'archive_use_sidebar',
                'type'      => 'image_select',
                'title'     => esc_html__( 'Sidebar layout', 'voice' ),
                'subtitle'  => esc_html__( 'Choose sidebar layout for archive templates', 'voice' ),
                'options'   => vce_get_sidebar_layouts(),
                'default' => vce_get_default_option( 'archive_use_sidebar' ),
            ),

            array(
                'id'        => 'archive_sidebar',
                'type'      => 'select',
                'title'     => esc_html__( 'Archive standard sidebar', 'voice' ),
                'subtitle'  => esc_html__( 'Choose standard sidebar for archive templates', 'voice' ),
                'options'   => vce_get_sidebars_list(),
                'default' => vce_get_default_option( 'archive_sidebar' ),
                'required'  => array( 'archive_use_sidebar', '!=', 'none' )
            ),

            array(
                'id'        => 'archive_sticky_sidebar',
                'type'      => 'select',
                'title'     => esc_html__( 'Archive sticky sidebar', 'voice' ),
                'subtitle'  => esc_html__( 'Choose sticky sidebar for archive templates', 'voice' ),
                'options'   => vce_get_sidebars_list(),
                'default' => vce_get_default_option( 'archive_sticky_sidebar' ),
                'required'  => array( 'archive_use_sidebar', '!=', 'none' )
            ),

            array(
                'id'        => 'archive_pagination',
                'type'      => 'image_select',
                'title'     => esc_html__( 'Archive pagination', 'voice' ),
                'subtitle'  => esc_html__( 'Choose which pagination to use on archive templates', 'voice' ),
                'options'   => vce_get_pagination_layouts(),
                'default' => vce_get_default_option( 'archive_pagination' ),
            ),

            array(
                'id'        => 'archive_ppp',
                'type'      => 'radio',
                'title'     => esc_html__( 'Posts per page', 'voice' ),
                'subtitle'  => esc_html__( 'Choose how many posts per page you want to display', 'voice' ),
                'options'   => array(
                    'inherit' => wp_kses_post( sprintf( __( 'Inherit from global option in <a href="%s">Settings->Reading</a>', 'voice' ), admin_url( 'options-reading.php' ) ) ),
                    'custom' => esc_html__( 'Custom number', 'voice' )
                ),
                'default' => vce_get_default_option( 'archive_ppp' ),
            ),

            array(
                'id'        => 'archive_ppp_num',
                'type'      => 'text',
                'class'     => 'small-text',
                'title'     => esc_html__( 'Number of post per page', 'voice' ),
                'default' => vce_get_default_option( 'archive_ppp_num' ),
                'required'  => array( 'archive_ppp', '=', 'custom' ),
                'validate'  => 'numeric'
            )
        ) )
);

/* Typography */
Redux::setSection( $opt_name , array(
        'icon'      => 'el-icon-fontsize',
        'title'     => esc_html__( 'Typography', 'voice' ),
        'desc'     => esc_html__( 'Manage fonts and typography settings', 'voice' ),
        'fields'    => array(

            array(
                'id'          => 'main_font',
                'type'        => 'typography',
                'title'       => esc_html__( 'Main text font', 'voice' ),
                'google'      => true,
                'font-backup' => false,
                'font-size' => false,
                'color' => false,
                'line-height' => false,
                'text-align' => false,
                'units'       =>'px',
                'subsets' => false,
                'subtitle'    => esc_html__( 'This is you main font for standard text', 'voice' ),
                'default' => vce_get_default_option( 'main_font' ),
                'preview' => array(
                    'always_display' => true,
                    'font-size' => '16px',
                    'line-height' => '26px',
                    'text' => 'This is a font used for your main content on the website. Here in MeksHQ, we think that readability is very important part of any WordPress theme. This is actually a rough example of how simple paragraph of text will look like on your website so you have a simple preview here.'
                )
            ),

            array(
                'id'          => 'h_font',
                'type'        => 'typography',
                'title'       => esc_html__( 'Headings font', 'voice' ),
                'google'      => true,
                'font-backup' => false,
                'font-size' => false,
                'color' => false,
                'line-height' => false,
                'text-align' => false,
                'units'       =>'px',
                'subsets' => false,
                'subtitle'    => esc_html__( 'This font is used for headings, titles, h-elements...', 'voice' ),
                'default' => vce_get_default_option( 'h_font' ),
                'preview' => array(
                    'always_display' => true,
                    'font-size' => '24px',
                    'line-height' => '30px',
                    'text' => 'There is no good blog without great readability'
                )

            ),

            array(
                'id'          => 'nav_font',
                'type'        => 'typography',
                'title'       => esc_html__( 'Navigation font', 'voice' ),
                'google'      => true,
                'font-backup' => false,
                'font-size' => false,
                'color' => false,
                'line-height' => false,
                'text-align' => false,
                'subsets' => false,
                'units'       =>'px',
                'subtitle'    => esc_html__( 'This font is used for main website navigation', 'voice' ),
                'default' => vce_get_default_option( 'nav_font' ),
                'preview' => array(
                    'always_display' => true,
                    'font-size' => '16px',
                    'text' => 'Home &nbsp;&nbsp;About &nbsp;&nbsp;Blog &nbsp;&nbsp;Contact'
                )

            ),

            array(
                'id'          => 'finetune',
                'type'        => 'section',
                'indent' => false,
                'title'       => esc_html__( 'Fine-tune typography', 'voice' ),
                'subtitle'    => esc_html__( 'Advanced options to adjust font sizes', 'voice' )
            ),

            array(
                'id'       => 'font_size_p',
                'type'     => 'spinner',
                'title'    => esc_html__( 'Main text font size', 'voice' ),
                'subtitle' => esc_html__( 'This is your body text font size, used for default text on single posts and pages', 'voice' ),
                'default' => vce_get_default_option( 'font_size_p' ),
                'min'      => '14',
                'step'     => '1',
                'max'      => '22',
            ),

            array(
                'id'       => 'font_size_nav',
                'type'     => 'spinner',
                'title'    => esc_html__( 'Navigation font size', 'voice' ),
                'subtitle' => esc_html__( 'Applies to main website navigation', 'voice' ),
                'default' => vce_get_default_option( 'font_size_nav' ),
                'min'      => '12',
                'step'     => '1',
                'max'      => '20',
            ),

            array(
                'id'       => 'font_size_module_title',
                'type'     => 'spinner',
                'title'    => esc_html__( 'Modules and Archive title font size', 'voice' ),
                'subtitle' => esc_html__( 'Applies to title of modules and archives (Category,  Author, Tag, etc.) titles.',  'voice' ),
                'default' => vce_get_default_option( 'font_size_module_title' ),
                'min'      => '15',
                'step'     => '1',
                'max'      => '30',
            ),

            array(
                'id'       => 'font_size_single_title',
                'type'     => 'spinner',
                'title'    => esc_html__( 'Single post title font size', 'voice' ),
                'subtitle' => esc_html__( 'Applies to title on the beginning of the post', 'voice' ),
                'default' => vce_get_default_option( 'font_size_single_title' ),
                'min'      => '30',
                'step'     => '1',
                'max'      => '60',
            ),

            array(
                'id'       => 'font_size_entry_text',
                'type'     => 'spinner',
                'title'    => esc_html__( 'Entry headline font size', 'voice' ),
                'subtitle' => esc_html__( 'Font size for text excerpt in the beginning of the single post', 'voice' ),
                'default' => vce_get_default_option( 'font_size_entry_text' ),
                'min'      => '16',
                'step'     => '1',
                'max'      => '30',
            ),

            array(
                'id'       => 'font_size_widget_title',
                'type'     => 'spinner',
                'title'    => esc_html__( 'Widget title font size', 'voice' ),
                'subtitle' => esc_html__( 'Applies to widgets titles', 'voice' ),
                'default' => vce_get_default_option( 'font_size_widget_title' ),
                'min'      => '12',
                'step'     => '1',
                'max'      => '24',
            ),

            array(
                'id'       => 'font_size_small',
                'type'     => 'spinner',
                'title'    => esc_html__( 'Small text (widget) font size', 'voice' ),
                'subtitle' => esc_html__( 'Applies to widgets and some special elements', 'voice' ),
                'default' => vce_get_default_option( 'font_size_small' ),
                'min'      => '12',
                'step'     => '1',
                'max'      => '20',
            ),

            array(
                'id'       => 'font_size_fa_big',
                'type'     => 'spinner',
                'title'    => esc_html__( 'Featured area big font size', 'voice' ),
                'subtitle' => esc_html__( 'Applies to titles in big (one column) featured area.', 'voice' ),
                'default' => vce_get_default_option( 'font_size_fa_big' ),
                'min'      => '35',
                'step'     => '1',
                'max'      => '70',
            ),

            array(
                'id'       => 'font_size_fa_medium',
                'type'     => 'spinner',
                'title'    => esc_html__( 'Featured area medium (3 posts) font size', 'voice' ),
                'subtitle' => esc_html__( 'Applies to titles in medium (3 column) featured area.', 'voice' ),
                'default' => vce_get_default_option( 'font_size_fa_medium' ),
                'min'      => '24',
                'step'     => '1',
                'max'      => '45',
            ),

            array(
                'id'       => 'font_size_fa_small',
                'type'     => 'spinner',
                'title'    => esc_html__( 'Featured area small (5 posts) font size', 'voice' ),
                'subtitle' => esc_html__( 'Applies to titles in small (5 column) featured area.', 'voice' ),
                'default' => vce_get_default_option( 'font_size_fa_small' ),
                'min'      => '15',
                'step'     => '1',
                'max'      => '30',
            ),

            array(
                'id'       => 'font_size_layout_a',
                'type'     => 'spinner',
                'title'    => esc_html__( 'Layout A', 'voice' ),
                'subtitle' => esc_html__( 'Applies to post layout A title', 'voice' ),
                'default' => vce_get_default_option( 'font_size_layout_a' ),
                'min'      => '25',
                'step'     => '1',
                'max'      => '50',
            ),

            array(
                'id'       => 'font_size_layout_b',
                'type'     => 'spinner',
                'title'    => esc_html__( 'Layout B', 'voice' ),
                'subtitle' => esc_html__( 'Applies to post layout B title', 'voice' ),
                'default' => vce_get_default_option( 'font_size_layout_b' ),
                'min'      => '18',
                'step'     => '1',
                'max'      => '32',
            ),

            array(
                'id'       => 'font_size_layout_c',
                'type'     => 'spinner',
                'title'    => esc_html__( 'Layout C', 'voice' ),
                'subtitle' => esc_html__( 'Applies to post layout C title', 'voice' ),
                'default' => vce_get_default_option( 'font_size_layout_c' ),
                'min'      => '16',
                'step'     => '1',
                'max'      => '30',
            ),

            array(
                'id'       => 'font_size_layout_d',
                'type'     => 'spinner',
                'title'    => esc_html__( 'Layout D', 'voice' ),
                'subtitle' => esc_html__( 'Applies to post layout D title', 'voice' ),
                'default' => vce_get_default_option( 'font_size_layout_d' ),
                'min'      => '12',
                'step'     => '1',
                'max'      => '22',
            ),

            array(
                'id'       => 'font_size_layout_e',
                'type'     => 'spinner',
                'title'    => esc_html__( 'Layout E', 'voice' ),
                'subtitle' => esc_html__( 'Applies to post layout E title', 'voice' ),
                'default' => vce_get_default_option( 'font_size_layout_e' ),
                'min'      => '12',
                'step'     => '1',
                'max'      => '20',
            ),

            array(
                'id'       => 'font_size_layout_f',
                'type'     => 'spinner',
                'title'    => esc_html__( 'Layout F', 'voice' ),
                'subtitle' => esc_html__( 'Applies to post layout F title', 'voice' ),
                'default' => vce_get_default_option( 'font_size_layout_f' ),
                'min'      => '12',
                'step'     => '1',
                'max'      => '20',
            ),

            array(
                'id'       => 'font_size_layout_g',
                'type'     => 'spinner',
                'title'    => esc_html__( 'Layout G', 'voice' ),
                'subtitle' => esc_html__( 'Applies to post layout G title', 'voice' ),
                'default' => vce_get_default_option( 'font_size_layout_g' ),
                'min'      => '20',
                'step'     => '1',
                'max'      => '40',
            ),

            array(
                'id'       => 'font_size_layout_h',
                'type'     => 'spinner',
                'title'    => esc_html__( 'Layout H', 'voice' ),
                'subtitle' => esc_html__( 'Applies to post layout H title', 'voice' ),
                'default' => vce_get_default_option( 'font_size_layout_h' ),
                'min'      => '18',
                'step'     => '1',
                'max'      => '32',
            ),

            array(
                'id'       => 'font_size_h1',
                'type'     => 'spinner',
                'title'    => esc_html__( 'H1 font size', 'voice' ),
                'subtitle' => esc_html__( 'Applies to H1 elements', 'voice' ),
                'default' => vce_get_default_option( 'font_size_h1' ),
                'min'      => '30',
                'step'     => '1',
                'max'      => '60',
            ),

            array(
                'id'       => 'font_size_h2',
                'type'     => 'spinner',
                'title'    => esc_html__( 'H2 font size', 'voice' ),
                'subtitle' => esc_html__( 'Applies to H2 elements', 'voice' ),
                'default' => vce_get_default_option( 'font_size_h2' ),
                'min'      => '30',
                'step'     => '1',
                'max'      => '50',
            ),

            array(
                'id'       => 'font_size_h3',
                'type'     => 'spinner',
                'title'    => esc_html__( 'H3 font size', 'voice' ),
                'subtitle' => esc_html__( 'Applies to H3 elements', 'voice' ),
                'default' => vce_get_default_option( 'font_size_h3' ),
                'min'      => '25',
                'step'     => '1',
                'max'      => '50',
            ),

            array(
                'id'       => 'font_size_h4',
                'type'     => 'spinner',
                'title'    => esc_html__( 'H4 font size', 'voice' ),
                'subtitle' => esc_html__( 'Applies to H4 elements', 'voice' ),
                'default' => vce_get_default_option( 'font_size_h4' ),
                'min'      => '15',
                'step'     => '1',
                'max'      => '35',
            ),

            array(
                'id'       => 'font_size_h5',
                'type'     => 'spinner',
                'title'    => esc_html__( 'H5 font size', 'voice' ),
                'subtitle' => esc_html__( 'Applies to H5 elements', 'voice' ),
                'default' => vce_get_default_option( 'font_size_h5' ),
                'min'      => '15',
                'step'     => '1',
                'max'      => '30',
            ),

            array(
                'id'       => 'font_size_h6',
                'type'     => 'spinner',
                'title'    => esc_html__( 'H6 font size', 'voice' ),
                'subtitle' => esc_html__( 'Applies to H6 elements', 'voice' ),
                'default' => vce_get_default_option( 'font_size_h6' ),
                'min'      => '12',
                'step'     => '1',
                'max'      => '24',
            ),

            array(
                'id'       => 'font_size_meta_data_smaller',
                'type'     => 'spinner',
                'title'    => esc_html__( 'Meta Data font size smaller', 'voice' ),
                'subtitle' => esc_html__( 'Applies to meta data in smaller module layouts',  'voice' ),
                'default' => vce_get_default_option( 'font_size_meta_data_smaller' ),
                'min'      => '10',
                'step'     => '1',
                'max'      => '15',
            ),

            array(
                'id'       => 'font_size_meta_data_bigger',
                'type'     => 'spinner',
                'title'    => esc_html__( 'Meta Data font size larger', 'voice' ),
                'subtitle' => esc_html__( 'Applies to meta data in larger module layouts',  'voice' ),
                'default' => vce_get_default_option( 'font_size_meta_data_bigger' ),
                'min'      => '10',
                'step'     => '1',
                'max'      => '20',
            ),

            array(
                'id' => 'text_upper',
                'type' => 'checkbox',
                'multi' => true,
                'title' => esc_html__( 'Uppercase text', 'voice' ),
                'subtitle' => esc_html__( 'Check if you want to show CAPITAL LETTERS for specific elements', 'voice' ),
                'options' => array(
                    'site-title a' => esc_html__( 'Site title', 'voice' ),
                    'site-description' => esc_html__( 'Site description', 'voice' ),
                    'nav-menu li a' => esc_html__( 'Main navigation', 'voice' ),
                    'entry-title' => esc_html__( 'Post/Page titles', 'voice' ),
                    'main-box-title' => esc_html__( 'Box (module, archive, category, tag, etc...) titles', 'voice' ),
                    'sidebar .widget-title' => esc_html__( 'Widget titles', 'voice' ),
                    'site-footer .widget-title' => esc_html__( 'Footer widget titles', 'voice' ),
                    'vce-featured-link-article' => esc_html__( 'Featured area titles', 'voice' )
                ),
                'default' => vce_get_default_option( 'text_upper' ),
            )

        ) )
);

/* Ads */
Redux::setSection( $opt_name , array(
        'icon'      => 'el-icon-usd',
        'title'     => esc_html__( 'Ads', 'voice' ),
        'desc'     => esc_html__( 'Use this options to fill your ads slots. Both image and JavaScript related ads are allowed.', 'voice' ),
        'fields'    => array(
            array(
                'id' => 'ad_below_header',
                'type' => 'editor',
                'title' => esc_html__( 'Below header', 'voice' ),
                'subtitle' => esc_html__( 'This ad will be displayed between your header and website content', 'voice' ),
                'default' => vce_get_default_option( 'ad_below_header' ),
                'desc' => esc_html__( 'Note: If you want to paste HTML or JavaScript code, use "text" mode in editor', 'voice' ),
                'args'   => array(
                    'textarea_rows'    => 5,
                    'default_editor' => 'html'
                )
            ),

            array(
                'id' => 'ad_above_footer',
                'type' => 'editor',
                'title' => esc_html__( 'Above footer', 'voice' ),
                'subtitle' => esc_html__( 'This ad will be displayed between your footer and website content', 'voice' ),
                'default' => vce_get_default_option( 'ad_above_footer' ),
                'desc' => esc_html__( 'Note: If you want to paste HTML or JavaScript code, use "text" mode in editor', 'voice' ),
                'args'   => array(
                    'textarea_rows'    => 5,
                    'default_editor' => 'html'
                )
            ),

            array(
                'id' => 'ad_below_single_header',
                'type' => 'editor',
                'title' => esc_html__( 'Below single post title', 'voice' ),
                'subtitle' => esc_html__( 'This ad will be displayed between single post title and its featured image on your single post templates on classic layout', 'voice' ),
                'default' => vce_get_default_option( 'ad_below_single_header' ),
                'desc' => esc_html__( 'Note: If you want to paste HTML or JavaScript code, use "text" mode in editor', 'voice' ),
                'args'   => array(
                    'textarea_rows'    => 5,
                    'default_editor' => 'html'
                )
            ),

            array(
                'id' => 'ad_above_single',
                'type' => 'editor',
                'title' => esc_html__( 'Above single post content', 'voice' ),
                'subtitle' => esc_html__( 'This ad will be displayed above post content on your single post templates', 'voice' ),
                'default' => vce_get_default_option( 'ad_above_single' ),
                'desc' => esc_html__( 'Note: If you want to paste HTML or JavaScript code, use "text" mode in editor', 'voice' ),
                'args'   => array(
                    'textarea_rows'    => 5,
                    'default_editor' => 'html'
                )
            ),

            array(
                'id' => 'ad_below_single',
                'type' => 'editor',
                'title' => esc_html__( 'Below single post content', 'voice' ),
                'subtitle' => esc_html__( 'This ad will be displayed below post content on your single post templates', 'voice' ),
                'default' => vce_get_default_option( 'ad_below_single' ),
                'desc' => esc_html__( 'Note: If you want to paste HTML or JavaScript code, use "text" mode in editor', 'voice' ),
                'args'   => array(
                    'textarea_rows'    => 5,
                    'default_editor' => 'html'
                )
            ),

            array(
                'id' => 'ad_between_posts',
                'type' => 'editor',
                'title' => esc_html__( 'Between posts', 'voice' ),
                'subtitle' => esc_html__( 'This ad will be displayed between posts on archive templates such as category archives, tag archives etc...', 'voice' ),
                'default' => vce_get_default_option( 'ad_between_posts' ),
                'desc' => esc_html__( 'Note: If you want to paste HTML or JavaScript code, use "text" mode in editor', 'voice' ),
                'args'   => array(
                    'textarea_rows'    => 5,
                    'default_editor' => 'html'
                )
            ),

            array(
                'id' => 'ad_between_posts_position',
                'type' => 'text',
                'class' => 'small-text',
                'title' => esc_html__( 'Between posts position', 'voice' ),
                'subtitle' => esc_html__( 'Specify after how many posts you want to display ad', 'voice' ),
                'default' => vce_get_default_option( 'ad_between_posts_position' ),
                'validate' => 'numeric'
            ),

            array(
                'id'       => 'ad_exclude_404',
                'type'     => 'switch',
                'title'    => esc_html__( 'Do not show ads on 404 page', 'voice' ),
                'subtitle' => esc_html__( 'Disable ads on 404 error page', 'voice' ),
                'default' => vce_get_default_option( 'ad_exclude_404' ),
            ),

            array(
                'id'       => 'ad_exclude_from_pages',
                'type'     => 'select',
                'title'    => esc_html__( 'Do not show ads on specific pages', 'voice' ),
                'subtitle' => esc_html__( 'Select pages on which you don\'t want to display ads', 'voice' ),
                'multi'    => true,
                'sortable' => true,
                'data'     => 'page',
                'args'     => array(
                    'posts_per_page' => - 1,
                ),
                'default' => vce_get_default_option( 'ad_exclude_from_pages' ),
            ),
        )
    )
);

/* Misc */
Redux::setSection( $opt_name , array(
        'icon'      => 'el-icon-wrench',
        'title'     => esc_html__( 'Miscellaneous', 'voice' ),
        'desc'     => esc_html__( 'These are some miscellaneous settings for the website', 'voice' ),
        'fields'    => array(

            array(
                'id' => 'rtl_mode',
                'type' => 'switch',
                'title' => esc_html__( 'RTL mode (right to left)', 'voice' ),
                'subtitle' => esc_html__( 'Enable this option if you are using right to left writing/reading', 'voice' ),
                'default' => vce_get_default_option( 'rtl_mode' ),
            ),
            array(
                'id' => 'rtl_lang_skip',
                'type' => 'text',
                'title' => esc_html__( 'Skip RTL for specific language(s)', 'voice' ),
                'subtitle' => wp_kses_post( __( 'Paste specific WordPress language <a href="http://wpcentral.io/internationalization/" target="_blank">locale code</a> to exclude it from RTL mode', 'voice' ) ),
                'desc' => esc_html__( 'i.e. If you are using Arabic and English versions on the same WordPress installation you should put "en_US" in this field and its version will not be displayed as RTL. Note: To exclude multiple languages, separate by comma: en_US, de_DE', 'voice' ),
                'default' => vce_get_default_option( 'rtl_lang_skip' ),
                'required' => array( 'rtl_mode', '=', true )
            ),

            array(
                'id'        => 'default_fimg',
                'type'      => 'media',
                'url'       => true,
                'title'     => esc_html__( 'Default featured image', 'voice' ),
                'subtitle'      => esc_html__( 'Upload your default featured image/placeholder which will be displayed for posts which do not have featured image set', 'voice' ),
                'desc'  => esc_html__( 'Note: Allowed extensions are .jpg and .png', 'voice' ),
                'default' => vce_get_default_option( 'default_fimg' ),
            ),

            array(
                'id' => 'more_string',
                'type' => 'text',
                'class' => 'small-text',
                'title' => esc_html__( 'More string', 'voice' ),
                'subtitle' => esc_html__( 'Specify your "more" string to append after limited post titles and excerpts across the theme', 'voice' ),
                'default' => vce_get_default_option( 'more_string' ),
                'validate' => 'no_html'
            ),

            array(
                'id'        => 'time_ago',
                'type'      => 'switch',
                'title'     => esc_html__( 'Display "time ago" format', 'voice' ),
                'subtitle'  => esc_html__( 'Display post dates in "time ago" manner, like Twitter and Facebook (i.e 5 hours ago, 3 days ago, 2 weeks ago, 4 months ago, etc...)', 'voice' ),
                'desc'  => wp_kses_post( sprintf( __( 'Note: If you disable this option, you can choose your preferred date format in <a href="%s">Settings -> General</a>', 'voice' ), admin_url( 'options-general.php' ) ) ),
                'default' => vce_get_default_option( 'time_ago' ),
            ),

            array(
                'id'        => 'time_ago_limit',
                'type'      => 'radio',
                'title'     => esc_html__( 'Apply "time ago" to posts which are not older than', 'voice' ),
                'options'   => array(
                    'hour' => esc_html__( '1 Hour', 'voice' ),
                    'day' => esc_html__( '1 Day', 'voice' ),
                    'week' => esc_html__( '1 Week', 'voice' ),
                    'month' => esc_html__( '1 Month', 'voice' ),
                    'three_months' => esc_html__( '3 Months', 'voice' ),
                    'six_months' => esc_html__( '6 Months', 'voice' ),
                    'year' => esc_html__( '1 Year', 'voice' ),
                    '0' => esc_html__( 'Apply to all posts', 'voice' ),
                ),
                'default' => vce_get_default_option( 'time_ago_limit' ),
                'required'  => array( 'time_ago', '=', true ),
            ),

            array(
                'id'        => 'ago_before',
                'type'      => 'checkbox',
                'title'     => esc_html__( 'Display "ago" word before date/time', 'voice' ),
                'subtitle'  => esc_html__( 'By default, "ago" word goes after date/time string but in some languages different than English it is more proper to display it before.', 'voice' ),
                'desc'  => esc_html__( 'Example: "Publie depuis 3 heures"', 'voice' ),
                'default' => vce_get_default_option( 'ago_before' ),
                'required'  => array( 'time_ago', '=', true )
            ),

            array(
                'id' => 'views_forgery',
                'type' => 'text',
                'class' => 'small-text',
                'title' => esc_html__( 'Post views forgery', 'voice' ),
                'subtitle' => esc_html__( 'Specify value to add to real number of entry views for each post', 'voice' ),
                'desc' => esc_html__( 'i.e. If post has 45 views and you put 100, your post will display 145 views', 'voice' ),
                'default' => vce_get_default_option( 'views_forgery' ),
                'validate' => 'numeric'
            ),

            array(
                'id'        => 'scroll_to_top',
                'type'      => 'switch',
                'title'     => esc_html__( 'Display scroll to top button', 'voice' ),
                'subtitle'  => esc_html__( 'Check if you want to display scroll to top button', 'voice' ),
                'default' => vce_get_default_option( 'scroll_to_top' ),
            ),

            array(
                'id' => 'scroll_to_top_color',
                'type' => 'color',
                'title' => esc_html__( 'Scroll to top button color', 'voice' ),
                'subtitle' => esc_html__( 'Choose color for scroll to top button', 'voice' ),
                'transparent' => false,
                'default' => vce_get_default_option( 'scroll_to_top_color' ),
                'required'  => array( 'scroll_to_top', '=', true )
            ),

            array(
                'id'        => 'use_gallery',
                'type'      => 'switch',
                'title'     => esc_html__( 'Use Voice gallery style', 'voice' ),
                'subtitle'  => esc_html__( 'Check if you want to use our built in gallery style or disable if you want to use default WordPress gallery or some other gallery plugin', 'voice' ),
                'default' => vce_get_default_option( 'use_gallery' ),
            ),

            array(
                'id'        => 'img_zoom',
                'type'      => 'switch',
                'title'     => esc_html__( 'Enable zoom effect on featured images', 'voice' ),
                'subtitle'  => esc_html__( 'Check if you want to enable zoom effect on featured image mouse-over', 'voice' ),
                'default' => vce_get_default_option( 'img_zoom' ),
            ),

            array(
                'id' => '404_img',
                'type' => 'media',
                'url' => true,
                'title' => esc_html__( '404 template image', 'voice' ),
                'subtitle' => esc_html__( 'Upload image for 404 template (optional)', 'voice' ),
                'desc' => esc_html__( 'Supported formats: .jpg and .png', 'voice' ),
                'default' => vce_get_default_option( '404_img' ),
            ),

            array(
                'id'        => 'multibyte_excerpts',
                'type'      => 'switch',
                'title'     => esc_html__( 'Enable "multibyte" support for text excerpts', 'voice' ),
                'subtitle'  => esc_html__( 'Use this option for some specific languages that have special characters i.e. Japanese', 'voice' ),
                'default' => vce_get_default_option( 'multibyte_excerpts' ),
            ),

            array(
                'id'        => 'multibyte_rtime',
                'type'      => 'switch',
                'title'     => esc_html__( 'Enable "multibyte" support for reading time', 'voice' ),
                'subtitle'  => esc_html__( 'Enable this option if your site is using a language with UTF8 characters i.e. Russian', 'voice' ),
                'default' => vce_get_default_option( 'multibyte_rtime' ),
            ),

            array(
                'id' => 'words_read_per_minute',
                'type' => 'text',
                'class' => 'small-text',
                'title' => esc_html__( 'Words to read per minute', 'voice' ),
                'subtitle' => esc_html__( 'Use this option to set number of words your visitors read per minute, in order to fine-tune calculation of post reading time meta data', 'voice' ),
                'validate' => 'numeric',
                'default' => vce_get_default_option( 'words_read_per_minute' ),
            ),

            array(
                'id' => 'primary_category',
                'type' => 'switch',
                'title' => esc_html__( 'Primary category support', 'voice' ),
                'subtitle' => esc_html__( 'This option supports primary category feature from Yoast SEO plugin. If a post is assigned to multiple categories, only selected primary category will be displayed for that post in all listing layouts', 'voice' ),
                'default' => vce_get_default_option( 'primary_category' ),
            ),

        ) )
);

/* WooCommerce */

if ( vce_is_woocommerce_active() ) {

    Redux::setSection( $opt_name , array(
            'icon'      => 'el-icon-shopping-cart',
            'title' => esc_html__( 'WooCommerce', 'voice' ),
            'desc' => esc_html__( 'Manage options for WooCommerce pages', 'voice' ),
            'fields' => array(
                array(
                    'id'        => 'product_use_sidebar',
                    'type'      => 'image_select',
                    'title'     => esc_html__( 'Product sidebar layout', 'voice' ),
                    'subtitle'  => esc_html__( 'Choose sidebar layout for WooCommerce products', 'voice' ),
                    'options'   => vce_get_sidebar_layouts(),
                    'default' => vce_get_default_option( 'product_use_sidebar' ),
                ),

                array(
                    'id'        => 'product_sidebar',
                    'type'      => 'select',
                    'title'     => esc_html__( 'Product standard sidebar', 'voice' ),
                    'subtitle'  => esc_html__( 'Choose standard sidebar for WooCommerce products', 'voice' ),
                    'options'   => vce_get_sidebars_list(),
                    'default' => vce_get_default_option( 'product_sidebar' ),
                    'required'  => array( 'product_use_sidebar', '!=', 'none' )
                ),

                array(
                    'id'        => 'product_sticky_sidebar',
                    'type'      => 'select',
                    'title'     => esc_html__( 'Product sticky sidebar', 'voice' ),
                    'subtitle'  => esc_html__( 'Choose sticky sidebar for WooCommerce products', 'voice' ),
                    'options'   => vce_get_sidebars_list(),
                    'default' => vce_get_default_option( 'product_sticky_sidebar' ),
                    'required'  => array( 'product_use_sidebar', '!=', 'none' )
                ),

                array(
                    'id'        => 'product_cat_use_sidebar',
                    'type'      => 'image_select',
                    'title'     => esc_html__( 'Product category sidebar layout', 'voice' ),
                    'subtitle'  => esc_html__( 'Choose sidebar layout for WooCommerce product category', 'voice' ),
                    'options'   => vce_get_sidebar_layouts(),
                    'default' => vce_get_default_option( 'product_cat_use_sidebar' ),
                ),

                array(
                    'id'        => 'product_cat_sidebar',
                    'type'      => 'select',
                    'title'     => esc_html__( 'Product category standard sidebar', 'voice' ),
                    'subtitle'  => esc_html__( 'Choose standard sidebar for WooCommerce product category', 'voice' ),
                    'options'   => vce_get_sidebars_list(),
                    'default' => vce_get_default_option( 'product_cat_sidebar' ),
                    'required'  => array( 'product_cat_use_sidebar', '!=', 'none' )
                ),

                array(
                    'id'        => 'product_cat_sticky_sidebar',
                    'type'      => 'select',
                    'title'     => esc_html__( 'Product category sticky sidebar', 'voice' ),
                    'subtitle'  => esc_html__( 'Choose sticky sidebar for WooCommerce product category', 'voice' ),
                    'options'   => vce_get_sidebars_list(),
                    'default' => vce_get_default_option( 'product_cat_sticky_sidebar' ),
                    'required'  => array( 'product_cat_use_sidebar', '!=', 'none' )
                ),

                array(
                    'id'        => 'woocommerce_cart_icon',
                    'type'      => 'switch',
                    'title'     => esc_html__( 'Dispaly WooCommerce cart icon in header', 'voice' ),
                    'subtitle'  => esc_html__( 'Check if you want to display cart icon after main navigation', 'voice' ),
                    'default' => vce_get_default_option( 'woocommerce_cart_icon' ),
                )

            ) )
    );
}

/* bbPress */
if ( vce_is_bbpress_active() ) {

    Redux::setSection( $opt_name , array(
            'icon'      => 'el-icon-quotes',
            'title' => esc_html__( 'bbPress', 'voice' ),
            'desc' => esc_html__( 'Manage options for bbPress pages', 'voice' ),
            'fields' => array(
                array(
                    'id'        => 'forum_use_sidebar',
                    'type'      => 'image_select',
                    'title'     => esc_html__( 'Forum sidebar layout', 'voice' ),
                    'subtitle'  => esc_html__( 'Choose sidebar layout for bbPress forums', 'voice' ),
                    'options'   => vce_get_sidebar_layouts(),
                    'default' => vce_get_default_option( 'forum_use_sidebar' ),
                ),

                array(
                    'id'        => 'forum_sidebar',
                    'type'      => 'select',
                    'title'     => esc_html__( 'Forum standard sidebar', 'voice' ),
                    'subtitle'  => esc_html__( 'Choose standard sidebar for bbPress forums', 'voice' ),
                    'options'   => vce_get_sidebars_list(),
                    'default' => vce_get_default_option( 'forum_sidebar' ),
                    'required'  => array( 'forum_use_sidebar', '!=', 'none' )
                ),

                array(
                    'id'        => 'forum_sticky_sidebar',
                    'type'      => 'select',
                    'title'     => esc_html__( 'Forum sticky sidebar', 'voice' ),
                    'subtitle'  => esc_html__( 'Choose sticky sidebar for bbPress forums', 'voice' ),
                    'options'   => vce_get_sidebars_list(),
                    'default' => vce_get_default_option( 'forum_sticky_sidebar' ),
                    'required'  => array( 'forum_use_sidebar', '!=', 'none' )
                ),

                array(
                    'id'        => 'topic_use_sidebar',
                    'type'      => 'image_select',
                    'title'     => esc_html__( 'Topic sidebar layout', 'voice' ),
                    'subtitle'  => esc_html__( 'Choose sidebar layout for bbPress topics', 'voice' ),
                    'options'   => vce_get_sidebar_layouts(),
                    'default' => vce_get_default_option( 'topic_use_sidebar' ),
                ),

                array(
                    'id'        => 'topic_sidebar',
                    'type'      => 'select',
                    'title'     => esc_html__( 'Topic standard sidebar', 'voice' ),
                    'subtitle'  => esc_html__( 'Choose standard sidebar for bbPress topics', 'voice' ),
                    'options'   => vce_get_sidebars_list(),
                    'default' => vce_get_default_option( 'topic_sidebar' ),
                    'required'  => array( 'topic_use_sidebar', '!=', 'none' )
                ),

                array(
                    'id'        => 'topic_sticky_sidebar',
                    'type'      => 'select',
                    'title'     => esc_html__( 'Topic sticky sidebar', 'voice' ),
                    'subtitle'  => esc_html__( 'Choose sticky sidebar for bbPress topics', 'voice' ),
                    'options'   => vce_get_sidebars_list(),
                    'default' => vce_get_default_option( 'topic_sticky_sidebar' ),
                    'required'  => array( 'topic_use_sidebar', '!=', 'none' )
                )


            ) )
    );
}

Redux::setSection( $opt_name , array( 'type' => 'divide', 'id' => 'vce-divide' ) );

/* Translation Options */

$translate_options[] = array(
    'id' => 'enable_translate',
    'type' => 'switch',
    'switch' => true,
    'title' => esc_html__( 'Enable theme translation?', 'voice' ),
    'default' => vce_get_default_option( 'enable_translate' ),
);

$translate_strings = vce_get_translate_options();

foreach ( $translate_strings as $string_key => $string ) {
    $translate_options[] = array(
        'id' => 'tr_'.$string_key,
        'type' => 'text',
        'title' => esc_html( $string['option_title'] ),
        'subtitle' => isset( $string['option_desc'] ) ? $string['option_desc'] : '',
        'default' => '',
    );
}

Redux::setSection( $opt_name , array(
        'icon'      => 'el-icon-globe-alt',
        'title' => esc_html__( 'Translation', 'voice' ),
        'desc' => wp_kses_post( __( 'Use these settings to quckly translate or change text inside this theme. If you want to remove the text completely instead of modifying it, you can use <strong>"-1"</strong> as a value for particular field translation. <br/><br/><strong>Note:</strong> If you are using this theme for multilingual website, you need to disable these options and use multilanguage plugins (such as WPML) or manual translation via .po and .mo files located inside "wp-content/themes/voice/languages" folder.', 'voice' ) ),
        'fields' => $translate_options
    )
);


//Generate option array for image sizes
$image_sizes = vce_get_image_sizes();
$image_sizes_opt = array();
foreach ( $image_sizes as $id => $size ) {
    $image_sizes_opt[$id] = $size['title'];
}

/* Performance */
Redux::setSection( $opt_name , array(
        'icon'      => 'el-icon-dashboard',
        'title'     => esc_html__( 'Performance', 'voice' ),
        'desc'     => esc_html__( 'Use these options to optimize your page speed', 'voice' ),
        'fields'    => array(

            array(
                'id' => 'min_css',
                'type' => 'switch',
                'title' => esc_html__( 'Use minified CSS', 'voice' ),
                'subtitle' => esc_html__( 'Load all theme css files combined and minified into a single file.', 'voice' ),
                'default' => vce_get_default_option( 'min_css' ),
            ),

            array(
                'id' => 'min_js',
                'type' => 'switch',
                'title' => esc_html__( 'Use minified JS', 'voice' ),
                'subtitle' => esc_html__( 'Load all theme js files combined and minified into a single file.', 'voice' ),
                'default' => vce_get_default_option( 'min_js' ),
            ),

            array(
                'id'        => 'image_sizes',
                'type'      => 'checkbox',
                'multi'     => true,
                'title'     => esc_html__( 'Generate image sizes', 'voice' ),
                'subtitle'  => esc_html__( 'Check what image sizes you want to generate i.e. if you dont want to use big featured image, uncheck this option  (if you are not sure, it is highly recommended to leave all sizes checked)', 'voice' ),
                'options'   => $image_sizes_opt,
                'default' => vce_get_default_option( 'image_sizes' ),
            )

        ) ) );


?>
