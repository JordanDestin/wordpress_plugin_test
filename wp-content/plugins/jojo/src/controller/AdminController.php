<?php

namespace Jojo\Test\Controller;

use Jojo\Test\JojoPlugin;

class AdminController {

    const REDIRECT_TO_LIST = 0;
    const REDIRECT_TO_EDIT = 1;

    public function __construct() {
       $this->init_hooks();
    }

    public function init_hooks() 
    {
        add_action('admin_menu', [$this, 'admin_menu']);
        add_action('admin_init', [$this, 'admin_init']);
        add_action('post_row_actions', [$this, 'duplicate_post_actions'], 10, 2);
        add_action('admin_action_duplicate', [$this, 'duplicate_post']);
    }

    public function admin_menu()
    {
        add_options_page('Jojo', 'JojoReglage', 'manage_options', 'jojoslug', [$this, 'config_page']);
    }

    public function admin_init()
    {
        register_setting('test_general', 'jojo_general');
        add_settings_section('jojo_main',null, null, 'jojoslug');
        add_settings_field('jojo_field', 'Jojo Field Tesst Redirect', [$this, 'jojo_redirect_render'], 'jojoslug', 'jojo_main');
    } 
    
    public function jojo_redirect_render()
    {
        $options = get_option('jojo_general',['redirect_to' => self::REDIRECT_TO_LIST]);
        $selectedValue = $options['redirect_to'];
        ?>
        <select name="jojo_general[redirect_to]">
            <option value="<?php echo self::REDIRECT_TO_LIST; ?>" <?= selected(self::REDIRECT_TO_LIST, $selectedValue) ?>>Liste</option>
            <option value="<?php echo self::REDIRECT_TO_EDIT; ?>" <?= selected(self::REDIRECT_TO_EDIT, $selectedValue) ?>>Edition</option>
        </select>
        <?php
    }

    public function duplicate_post_actions(array $actions, \WP_Post $post)
    {
     $post_id = $post->ID;
        if (current_user_can('edit_post', $post_id)) {
            $actions['jojo'] = "<a href='admin.php?post=$post_id&action=duplicate'>Dupliquer</a>";
        }
        return $actions;
    }

    public function duplicate_post()
    {
        $options = get_option('jojo_general',['redirect_to' => self::REDIRECT_TO_LIST]);
        $redirect_to = intval($options['redirect_to']);
        $post_id = (isset($_GET['post'])) ? intval($_GET['post']) : 0;
        $this->verify_request($post_id);
        $post = get_post($post_id);

        if (empty($post)) {
            wp_die('Post non trouvé');
        }

        $current_user = wp_get_current_user();
        $user_id = $current_user->ID;

        $post_data = [
            'post_author' => $user_id,
            'post_content' => $post->post_content,
            'post_title' => $post->post_title,
            'posst_excerpt' => $post->post_excerpt,
            'post_status' => $post->post_status,
            'comment_status' => $post->comment_status,
            'ping_status' => $post->ping_status,
            'post_password' => $post->post_password,
            'to_ping' => $post->to_ping,
            'post_parent' => $post->post_parent,
            'menu_order' => $post->menu_order,
            
        ];

        $new_post_id = wp_insert_post($post_data);

        if($redirect_to === self::REDIRECT_TO_EDIT) {
            wp_redirect(admin_url('post.php?action=edit&post=' . $new_post_id));
        } else {
            wp_redirect(admin_url('edit.php'));
        }
    }

    public function verify_request($post_id)
    {
        $referer = wp_get_referer();
        $location = $referer ? : get_site_url();

        if (!current_user_can('edit_post', $post_id)) {
            wp_safe_redirect($location);
            exit;
        }
    }

    public function config_page()
    {
        JojoPlugin::render('config');
    }
}