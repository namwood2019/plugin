<?php
namespace Crm;

class Templater 
{
    public function crm_get_template( $template_name, $args = array(), $tempate_path = '', $default_path = '' ) {
        if ( is_array( $args ) && count( $args ) > 0 ) {
            extract( $args );
        }
        
        $template_file = $this->crm_locate_template( $template_name, $tempate_path, $default_path );
        if ( ! file_exists( $template_file ) ) {
            _doing_it_wrong( __FUNCTION__, sprintf( '<code>%s</code> does not exist.', $template_file ), '1.0.0' );
            return;
        }
        include $template_file;
    }

    public function crm_locate_template( $template_name, $template_path = '', $default_path = '' ) {

        if ( ! $template_path ) {
            $template_path = 'crm/';
        }

        if ( ! $default_path ) {
            $default_path = plugin_dir_path( dirname( __FILE__ ) ) . '/templates/'; // Path to the template folder
        }

        $template = locate_template( array(
            $template_path . $template_name,
            $template_name
        ) );

        if ( ! $template ) {
            $template = $default_path . $template_name;
        }

        return apply_filters( 'crm_locate_template', $template, $template_name, $template_path, $default_path );
    }
}
