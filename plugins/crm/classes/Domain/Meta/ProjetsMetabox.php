<?php

namespace Crm\Domain\Meta;

use Crm\Templater;
use WP;

class ProjetsMetabox
{
    public $field;
    public function __construct()
    {
        $this->field = 'werk_email';
        $this->temp = new Templater();
        add_action("add_meta_boxes", [$this, "add_projets_metaboxes"]);
        add_action("save_post_kraft_projets", [$this, "save_projets_metaboxes"]);
    }

    public function add_projets_metaboxes()
    {
        add_meta_box('_werk_email', __('Votre courriel', 'werk'), [$this, 'email_metabox_callback'], "kraft_projets", "normal");
    }

    public function email_metabox_callback()
    {
        echo $this->temp->werk_get_template("metaboxes/email_projet.php");
    }

    public function save_projets_metaboxes($post_id)
    {
        if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) return;
        if ($parent_id = wp_is_post_revision($post_id)) {
            $post_id = $parent_id;
        }

        if (array_key_exists($this->field, $_POST)) {
            update_post_meta($post_id, $this->field, sanitize_text_field($_POST[$this->field]));
        }
    }
}
