<?php
namespace Crm\Helpers;

use Crm\Domain\Tasks;
use WP_Query;

class SearchHelpers{
    public function __construct()
    {
        do_action('kraft_search', [$this, "search_projects"]);
    }

    public function search_projects( $search_string, $category = null )
    {
        $args = [
            'post_type' => 'kraft_projets',
            's' => $search_string,
        ];

        if (!is_null($category)){
            $args['tax_query'] =  [
                'relation' => 'OR',
                [
                    'taxonomy' => 'category',
                    'field'    => 'slug',
                    'terms'    => [ 'project_type' ],
                ],
            ];
        }
        return new WP_Query($args);
    }
}