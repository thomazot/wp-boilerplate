<?php
function zot_info_extra($customizer) {

    /**
     * Customizer Panel
     */

    $customizer->add_panel('zot_customizer_panel',array(
        'title'=>'Personalização do Site',
        'description'=> 'Personalização do Site',
        'priority'=> 30
    ));

    /**
     * Customizer Sections Contact
     */
    $customizer->add_section( 'zot_customizer_contact' , array(
        'title'      => __( 'Contatos', THEMENAME ),
        'priority'   => 10,
        'panel'      => 'zot_customizer_panel',
    ) );


    // Section Form Contact
    $customizer->add_section('zot_customizer_numbers', array(
        'title'     => __( 'Numeros', THEMENAME),
        'priority'  => 0,
        'panel'     => 'zot_customizer_panel'
    ));

    // Section Form Contact
    $customizer->add_section('zot_customizer_contact_form', array(
        'title'     => __( 'Formulário Contato Infomrações', THEMENAME),
        'priority'  => 0,
        'panel'     => 'zot_customizer_panel'
    ));

    // Section About
    $customizer->add_section('zot_customizer_about', array(
        'title'     => __( 'Sobre a Empresa', THEMENAME),
        'priority'  => 0,
        'panel'     => 'zot_customizer_panel'
    ));

    // Section Extra
    $customizer->add_section( 'zot_customizer' , array(
        'title'      => __( 'Extra', THEMENAME ),
        'priority'   => 20,
        'panel'      => 'zot_customizer_panel',
    ) );

    /**
     * Numeros
     */
    $customizer->add_setting('numbers_years',
        array(
            'default' => ''
        )
    );

    $customizer->add_control('control_numbers_years',
        array(
            'label' 	=> 'Anos',
            'type'		=> 'text',
            'section'	=> 'zot_customizer_numbers',
            'settings'	=> 'numbers_years'
        )
    );

    $customizer->add_setting('numbers_clients',
        array(
            'default' => ''
        )
    );

    $customizer->add_control('control_numbers_clients',
        array(
            'label' 	=> 'Clientes',
            'type'		=> 'text',
            'section'	=> 'zot_customizer_numbers',
            'settings'	=> 'numbers_clients'
        )
    );

    $customizer->add_setting('numbers_works',
        array(
            'default' => ''
        )
    );

    $customizer->add_control('control_numbers_works',
        array(
            'label' 	=> 'Clientes',
            'type'		=> 'text',
            'section'	=> 'zot_customizer_numbers',
            'settings'	=> 'numbers_works'
        )
    );

    /**
     *	Contact
     */
    $customizer->add_setting('contact_title',
        array(
            'default' => ''
        )
    );

    $customizer->add_control('control_contact_title',
        array(
            'label' 	=> 'Titulo',
            'type'		=> 'text',
            'section'	=> 'zot_customizer_contact_form',
            'settings'	=> 'contact_title'
        )
    );


    $customizer->add_setting('contact_text',
        array(
            'default' => ''
        )
    );

    $customizer->add_control('control_contact_text',
        array(
            'label' 	=> 'Texto',
            'type'		=> 'textarea',
            'section'	=> 'zot_customizer_contact_form',
            'settings'	=> 'contact_text'
        )
    );

    /**
     *	About Title
     */
    $customizer->add_setting('about_title',
        array(
            'default' => ''
        )
    );

    $customizer->add_control('control_about_title',
        array(
            'label' 	=> 'Titulo',
            'type'		=> 'text',
            'section'	=> 'zot_customizer_about',
            'settings'	=> 'about_title'
        )
    );
    

    $customizer->add_setting('about_text',
        array(
            'default' => ''
        )
    );

    $customizer->add_control('control_about_text',
        array(
            'label' 	=> 'Texto',
            'type'		=> 'textarea',
            'section'	=> 'zot_customizer_about',
            'settings'	=> 'about_text'
        )
    );

    $customizer->add_setting('about_image', array(
        'default' => ''
    ));

    $customizer->add_control( new WP_Customize_Image_Control($customizer, 'control_about_image', array(
        'label'    => 'Image',
        'section'  => 'zot_customizer_about',
        'settings' => 'about_image',
    )));

    /**
     *	Telefone
     */
    $customizer->add_setting('telefone',
        array(
            'default' => ''
        )
    );

    $customizer->add_control('control_telefone',
        array(
            'label' 	=> 'Telefone',
            'type'		=> 'text',
            'section'	=> 'zot_customizer_contact',
            'settings'	=> 'telefone'
        )
    );

    /**
     *	Whatsapp
     */
    $customizer->add_setting('whatsapp',
        array(
            'default' => ''
        )
    );

    $customizer->add_control('control_whatsapp',
        array(
            'label' 	=> 'Whatsapp (somente numeros)',
            'type'		=> 'text',
            'section'	=> 'zot_customizer_contact',
            'settings'	=> 'whatsapp'
        )
    );
    /**
     *	Whatsapp
     */
    $customizer->add_setting('whatsapp_text',
        array(
            'default' => ''
        )
    );

    $customizer->add_control('control_whatsapp_text',
        array(
            'label' 	=> 'Whatsapp Mensagem',
            'type'		=> 'text',
            'section'	=> 'zot_customizer_contact',
            'settings'	=> 'whatsapp_text'
        )
    );


    /**
     *	E-Mail
     */
    $customizer->add_setting('email',
        array(
            'default' => ''
        )
    );

    $customizer->add_control('control_email',
        array(
            'label' 	=> 'E-Mail de Vendas',
            'type'		=> 'text',
            'section'	=> 'zot_customizer_contact',
            'settings'	=> 'email'
        )
    );

    /**
     *	E-Mail
     */
    $customizer->add_setting('assistencia',
        array(
            'default' => ''
        )
    );

    $customizer->add_control('control_assistencia',
        array(
            'label' 	=> 'E-Mail de Assistência',
            'type'		=> 'text',
            'section'	=> 'zot_customizer_contact',
            'settings'	=> 'assistencia'
        )
    );


    /**
     *	IFrame Google Maps
     */
    $customizer->add_setting('iframemaps',
        array(
            'default' => ''
        )
    );

    $customizer->add_control('control_iframemaps',
        array(
            'label' 	=> 'Google Maps Iframe',
            'type'		=> 'textarea',
            'section'	=> 'zot_customizer',
            'settings'	=> 'iframemaps'
        )
    );
    /**
     *	Social Plugin Facebook
     */
    $customizer->add_setting('iframefacepage',
        array(
            'default' => ''
        )
    );

    $customizer->add_control('control_iframefacepage',
        array(
            'label' 	=> 'Facebook Page Iframe',
            'type'		=> 'textarea',
            'section'	=> 'zot_customizer',
            'settings'	=> 'iframefacepage'
        )
    );

    /**
     *	Social Plugin Facebook
     */
    $customizer->add_setting('social',
        array(
            'default' => ''
        )
    );

    $customizer->add_control('control_social',
        array(
            'label' 	=> 'HTML da Social',
            'type'		=> 'textarea',
            'section'	=> 'zot_customizer',
            'settings'	=> 'social'
        )
    );

    /**
     *	Logo Footer
     */

    $customizer->add_setting('footer_logo', array(
        'default' => ''
    ));

    $customizer->add_control( new WP_Customize_Image_Control($customizer, 'control_footer_logo', array(
        'label'    => 'Logo Rodape',
        'section'  => 'title_tagline',
        'settings' => 'footer_logo',
    )));

}

add_action( 'customize_register', 'zot_info_extra' );