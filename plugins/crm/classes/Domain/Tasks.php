<?php
namespace Crm\Domain;
class Tasks 
{


    public function __construct () {
        $this->create_tasks_post_type();
    }
    
    public function create_tasks_post_type () {
        $label = array (
            'name'               => __ ( 'Tâches', 'kraft' ),
            'singular_name'      => __ ( 'Tâche', 'kraft' ),
            'menu_name'          => _x ( 'Tâches', 'Admin menu name', 'kraft' ),
            'add_new'            => __ ( 'Ajouter une Tâche', 'kraft' ),
            'add_new_item'       => __ ( 'Ajouter une Tâche', 'kraft' ),
            'edit'               => __ ( 'Editer la Tâche', 'kraft' ),
            'edit_item'          => __ ( 'Editer la Tâches', 'kraft' ),
            'new_item'           => __ ( 'Nouvelle Tâche', 'kraft' ),
            'view'               => __ ( 'Voir la Tâche', 'kraft' ),
            'view_item'          => __ ( 'Voir la Tâche', 'kraft' ),
            'search_items'       => __ ( 'Rechercher une Tâche', 'kraft' ),
            'not_found'          => __ ( 'Aucun Tâche trouvée', 'kraft' ),
            'not_found_in_trash' => __ ( 'Aucune Tâche trouvée dans la corbeille', 'kraft' ),
            'parent'             => __ ( 'Tâche parente', 'kraft' ),
    
        );
        $args = array (
            'labels'              => $label,
            'public'              => true,
            'has_archive'         => true,
            'publicly_queryable'  => true,
            'exclude_from_search' => false,
            'show_in_menu'        => true,
            'hierarchical'        => false,
            'supports'            => ["title","editor", "author", "comments"],
            'rewrite'             => array ( 'slug' => 'tasks'),
            'capability_type'     => 'post',
        );
        register_post_type( 'kraft_tasks', $args );
    }
}