<?php 
namespace Crm;
use Crm\Domain\Tasks;
use Crm\Domain\Projets;
use Crm\Domain\Stories;
use Crm\Helpers\SearchHelpers;
use Crm\Templater;

class Init
{
    private $temp;
    private $projets;
    private $search;

    public function __construct() {
        $this->temp = new Templater();
        add_action( 'init', [ $this, 'create_posttypes'] );
        add_action('admin_post_werk_handle_form',  [ $this, 'werk_form_handling']);
        add_shortcode('werk_search',  [ $this, 'werk_search_shortcode']);
        add_shortcode('werk_projet_list',  [ $this, 'werk_projets_listing']);
        add_shortcode('werk_projet_add',  [ $this, 'werk_projets_add']);
        add_action('admin_post_werk_add_post',  [ $this, 'werk_add_post']);
      
    }

    public function create_posttypes(){
        $this->projets = new Projets();
        $this->search = new SearchHelpers();
        new Stories();
        new Tasks();
    }

    public function werk_search_shortcode(){
        return $this->temp->werk_get_template("search-form.php");
    }

    public function werk_projets_listing(){
        $list = $this->projets->get_all_projects();
        ob_start();
        if($list->have_posts()){
            while($list->have_posts()){
                $list->the_post();
                $this->temp->werk_get_template("project-list.php");
            }
        }
        $content = ob_get_contents();
        ob_get_clean();
        return $content;
    }

    public function werk_form_handling(){
        if ( !isset($_POST['_nonce']) || !wp_verify_nonce($_POST['_nonce'],'form-submit')){
            wp_redirect('/');
        } else {
            $results = $this->search->search_projects($_POST['s']);
        }
    }

    public function werk_projets_add(){
        return $this->temp->werk_get_template("project-post.php");
    }

    public function werk_add_post(){
        $nouveau_suivi = [
            'post_title' => "Suivi ".$_POST['suivi']['courriel'],
            'post_content' => $_POST['suivi']['commentaires'], 
            'post_status' => "publish", 
            'post_date' => date('Y-m-d'),
            'post_type' => "kraft_projets",
        ];
        
        $post_id = wp_insert_post($nouveau_suivi);

        update_post_meta($post_id, "werk_email",sanitize_text_field($_POST['suivi']['courriel']));

        wp_redirect("/");
    }
}
