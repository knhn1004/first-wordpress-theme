
<?php
require_once 'lib/helpers.php';
require_once 'lib/enqueue-assets.php';

function after_pagination()
{
    echo 'lorem ipsum';
}

function after_pagination2()
{
    echo 'lorem ipsum second';
}

add_action('_themename_after_pagination', 'after_pagination', 2);
add_action('_themename_after_pagination', 'after_pagination2', 1);

add_action('pre_get_posts', 'function_to_add', 10, 1);

function function_to_add($query)
{
    if ($query->is_main_query()) {
        $query->set('posts_per_page', 2);
    }
}

remove_action('pre_get_posts', 'function_to_add', 10, 1);

