<?php 

acf_register_block(array(
            'name'              => 'article-list',
            'title'             => __('Liste'),
            'description'       => __(''),
            'render_callback'   => 'my_acf_block_render_callback',
            'category'          => 'custom-for-post',
            'icon'              => 'editor-ol',
            'keywords'          => array( 'list', 'Liste' ),
        ));

?>