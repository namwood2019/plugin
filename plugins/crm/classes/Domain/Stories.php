<?php

namespace Crm\Domain;

class Stories
{
    public function __construct()
    {
        $this->create_histoires_post_type();
    }

    public function create_histoires_post_type()
    {
        $label = array(
            'name'               => __('Histoires', 'kraft'),
            'singular_name'      => __('Histoire', 'kraft'),
            'menu_name'          => _x('Histoires', 'Admin menu name', 'kraft'),
            'add_new'            => __('Ajouter une histoire', 'kraft'),
            'add_new_item'       => __('Ajouter une histoire', 'kraft'),
            'edit'               => __('Editer la histoire', 'kraft'),
            'edit_item'          => __('Editer la histoires', 'kraft'),
            'new_item'           => __('Nouvelle histoire', 'kraft'),
            'view'               => __('Voir la histoire', 'kraft'),
            'view_item'          => __('Voir la histoire', 'kraft'),
            'search_items'       => __('Rechercher une histoire', 'kraft'),
            'not_found'          => __('Aucun histoire trouvée', 'kraft'),
            'not_found_in_trash' => __('Aucune histoire trouvée dans la corbeille', 'kraft'),
            'parent'             => __('histoire parente', 'kraft'),

        );
        $args = array(
            'labels'              => $label,
            'public'              => true,
            'has_archive'         => true,
            'publicly_queryable'  => true,
            'exclude_from_search' => false,
            'show_in_menu'        => true,
            'hierarchical'        => false,
            'rewrite'             => array('slug' => 'histoires'),
            'capability_type'     => 'post',
        );
        register_post_type('kraft_histoires', $args);
    }
}
