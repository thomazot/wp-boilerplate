<?php 
// Register and load the widget
function zot_load_widget_logo() {
    register_widget( 'zot_logo_widget' );
}
add_action( 'widgets_init', 'zot_load_widget_logo' );

// Creating the widget 
class zot_logo_widget extends WP_Widget {
    function __construct() {
        parent::__construct(
            // Base ID of your widget
            'zot_logo_widget', 
            // Widget name will appear in UI
            __('Logo', 'zot_widget_domain'), 
            // Widget description
            array( 'description' => __( 'Escolha a Imagem da Logo', 'zot_widget_domain' ), ) 
        );
    }

    // Creating widget front-end 
    public function widget( $args, $instance ) {
        $title = apply_filters( 'widget_title', $instance['title'] );
        $logo   = $instance['logo'];
        $slug = slug($title ? $title : bloginfo( 'name' ) );

        // before and after widget arguments are defined by themes
        echo $args['before_widget'];
        echo '<div class="logo logo--'. $slug .'">';
            if ( ! empty($logo) ) {
                echo '<a href="/" class="logo__link logo__link--image"><img src="'.$logo.'" class="logo__image" /></a>';
            }
            if ( ! empty( $title ) ) {
                if ( is_front_page() && is_home() ):
                    echo '<h1 class="logo__name"><a href="/" class="logo__link logo__link--name">'.$title.'</a></h1>';
                else:
                    echo '<div class="logo__name"><a href="/" class="logo__link logo__link--name">'.$title.'</a></div>';
                    //echo __( 'Hello, World!', 'zot_widget_domain' );
                endif; 
            }
        echo '</div>';
        echo $args['after_widget'];
    }

    // Widget Backend 
    public function form( $instance ) {
        if ( isset( $instance[ 'title' ] ) ) {
            $title = $instance[ 'title' ];
        }
        else {
            $title = __( 'Titulo', 'zot_widget_domain' );
        }
        if ( isset( $instance[ 'logo' ] ) ) {
            $logo = $instance[ 'logo' ];
        }
        else {
            $logo = __( 'Logo', 'zot_widget_domain' );
        }
        // Widget admin form
        ?>
            <p>
                <label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Titulo:' ); ?></label> 
                <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
            </p>
            <p>
            <p>
                <label for="<?php echo $this->get_field_id( 'logo' ); ?>">Image</label>
                <img class="<?php echo $this->id ?>_img" src="<?php echo (!empty($logo)) ? $logo : ''; ?>" style="margin:0;padding:0;max-width:100%;display:block"/>
                <input type="hidden" class="widefat <?php echo $this->id ?>_url" name="<?php echo $this->get_field_name( 'logo' ); ?>" value="<?php echo $logo; ?>" style="margin-top:5px;" />
                <input type="button" id="<?php echo $this->id ?>" class="button button-primary js_custom_upload_media" value="Upload Image" style="margin-top:5px;" />

            </p>
            <script>
                jQuery(document).ready(function ($) {
                    function media_upload(button_selector) {
                        var _custom_media = true,
                            _orig_send_attachment = wp.media.editor.send.attachment;
                        $('body').on('click', button_selector, function () {
                        var button_id = $(this).attr('id');
                        wp.media.editor.send.attachment = function (props, attachment) {
                            if (_custom_media) {
                            $('.' + button_id + '_img').attr('src', attachment.url);
                            $('.' + button_id + '_url').val(attachment.url);
                            } else {
                            return _orig_send_attachment.apply($('#' + button_id), [props, attachment]);
                            }
                        }
                        wp.media.editor.open($('#' + button_id));
                        return false;
                        });
                    }
                    media_upload('.js_custom_upload_media');
                });
            </script>
        <?php 
    }
    
    // Updating widget replacing old instances with new
    public function update( $new_instance, $old_instance ) {
        $instance = array();
        $instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
        $instance['logo'] = ( ! empty( $new_instance['logo'] ) ) ? strip_tags( $new_instance['logo'] ) : '';
        return $instance;
    }
}