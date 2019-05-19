<?php
function zot_info_extra($customizer) {
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


    /**
     *	Social Facebook Page
     */

    // $customizer->add_setting('facebook_page',
    //     array(
    //         'default' => ''
    //     )
    // );

    // $customizer->add_control('control_facebook_page',
    //     array(
    //         'label' 	=> 'Facebook Page (IFrame)',
    //         'type'		=> 'text',
    //         'section'	=> 'title_tagline',
    //         'settings'	=> 'facebook_page'
    //     )
    // );

    /**
     *	Endereço
     */

    $customizer->add_setting('address',
        array(
            'default' => ''
        )
    );

    $customizer->add_control('control_address',
        array(
            'label' 	=> 'Endreço',
            'type'		=> 'textarea',
            'section'	=> 'title_tagline',
            'settings'	=> 'address'
        )
    );

    /**
     *	Endereço
     */

    // $customizer->add_setting('address_link',
    //     array(
    //         'default' => ''
    //     )
    // );

    // $customizer->add_control('control_address_link',
    //     array(
    //         'label' 	=> 'Endreço Link do Google Maps',
    //         'type'		=> 'text',
    //         'section'	=> 'title_tagline',
    //         'settings'	=> 'address_link'
    //     )
    // );

    /**
     *	Telefone rodape
     */

    $customizer->add_setting('footer_phone',
        array(
            'default' => ''
        )
    );

    $customizer->add_control('control_footer_phone',
        array(
            'label' 	=> 'Telefone Rodape',
            'type'		=> 'text',
            'section'	=> 'title_tagline',
            'settings'	=> 'footer_phone'
        )
    );

    /**
     *	Endereço
     */

    $customizer->add_setting('footer_email',
        array(
            'default' => ''
        )
    );

    $customizer->add_control('control_footer_email',
        array(
            'label' 	=> 'E-mail Rodape',
            'type'		=> 'text',
            'section'	=> 'title_tagline',
            'settings'	=> 'footer_email'
        )
    );


}

add_action( 'customize_register', 'zot_info_extra' );