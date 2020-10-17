<?php
namespace Crm\Domain;

use Crm\Domain\Meta\ProjetsMetabox;
use WP_Query;
class Projets extends ProjetsMetabox{
  private $post_type;
  
  public function __construct () {
    parent::__construct();
    $this->create_projets_post_type();
    $this->create_project_taxonomy();
  }

  public function create_projets_post_type() {
    $label = array (
        'name'               => __ ( 'Micro-CRM', 'kraft' ),
        'singular_name'      => __ ( 'Micro_CRM', 'kraft' ),
        'menu_name'          => _x ( 'Micro_CRM', 'Admin menu name', 'kraft' ),
        'add_new'            => __ ( 'Ajouter une projet', 'kraft' ),
        'add_new_item'       => __ ( 'Ajouter une projet', 'kraft' ),
        'edit'               => __ ( 'Editer la projet', 'kraft' ),
        'edit_item'          => __ ( 'Editer la projets', 'kraft' ),
        'new_item'           => __ ( 'Nouvelle projet', 'kraft' ),
        'view'               => __ ( 'Voir la projet', 'kraft' ),
        'view_item'          => __ ( 'Voir la projet', 'kraft' ),
        'search_items'       => __ ( 'Rechercher une projet', 'kraft' ),
        'not_found'          => __ ( 'Aucun projet trouvée', 'kraft' ),
        'not_found_in_trash' => __ ( 'Aucune projet trouvée dans la corbeille', 'kraft' ),
        'parent'             => __ ( 'projet parent', 'kraft' ),
    );

    $args = array (
        'labels'              => $label,
        'public'              => true,
        'has_archive'         => true,
        'publicly_queryable'  => true,
        'exclude_from_search' => false,
        'show_in_menu'        => true,
        'hierarchical'        => false,
        'show_in_rest'        => true,
        'menu_icon'           => 'dashicons-archive',
        'menu_position'       => 4,
        'show_in_nav_menus'   => FALSE,
        'rest_base'           => 'kraft_projets',
        'rewrite'             => array ( 'slug' => 'projets' ),
        'capability_type'     => 'post',
    );
    register_post_type( 'kraft_projets', $args );
  }
  
  public function create_project_taxonomy(){
    $labels = array(
        'name'              => _x( 'Type de projet', 'taxonomy general name', 'kraft' ),
        'singular_name'     => _x( 'Type de projet', 'taxonomy singular name', 'kraft' ),
        'search_items'      => __( 'Recherche type de projet', 'kraft' ),
        'all_items'         => __( 'Tout les types de projet', 'kraft' ),
        'parent_item'       => __( 'Type de projets parent', 'kraft' ),
        'parent_item_colon' => __( 'Type de projets parent:', 'kraft' ),
        'edit_item'         => __( 'Editer le type de projet', 'kraft' ),
        'update_item'       => __( 'Mettre a jour le type de projet', 'kraft' ),
        'add_new_item'      => __( 'Ajouter un nouveau type de projet', 'kraft' ),
        'new_item_name'     => __( 'Nouveau type de projet', 'kraft' ),
        'menu_name'         => __( 'Types de projet', 'kraft' ),
    );

    $args = array(
        'hierarchical'      => true,
        'labels'            => $labels,
        'show_ui'           => true,
        'show_admin_column' => true,
        'show_in_menu'      => true,
        'show_in_nav_menus' => true,
        'query_var'         => true,
        'show_in_rest'      => true,
        'rest_base'         => 'projets_types',
        'rewrite'           => array( 'slug' => 'type/projet' ),
    );

    register_taxonomy( 'project_type', 'kraft_projets', $args );
  }

  static public function get_all_projects(){
    $args = array(
        "post_type" => "kraft_projets",
        'order' => 'ASC',
        'orderby'   => 'date',
        "posts_per_page" => -1
    );
    
    return new WP_Query($args);
  }
  /**
   * Undocumented function
   *
   * @param string $nouveau
   * @return void
   */
  static public function get_all_projects_by_category( $nouveau = "nouveau"){
    $args = [ 
        'post_type' => 'kraft_projets',
        'posts_per_page' => -1,
        'tax_query' => [
            [
                'taxonomy' => 'project_type',
                'field' => 'slug',
                'terms' => $nouveau,
            ]
        ]
    ];
    return new WP_Query( $args );
  }

  static public function get_all_by_category( $post_type = 'product', $taxonomy = 'product_cat' , $nouveau = "hoodies", $nombre_de_posts = -1 ){
    $args = [ 
        'post_type' => $post_type,
        'posts_per_page' => $nombre_de_posts,
        'tax_query' => [
            [
                'taxonomy' => $taxonomy,
                'field' => 'slug',
                'terms' => $nouveau,
            ]
        ]
    ];
    return new WP_Query( $args );
  }
}



