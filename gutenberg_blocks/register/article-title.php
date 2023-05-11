<?php 

acf_register_block(array(
            'name'              => 'article-title',
            'title'             => __('Titel'),
            'description'       => __(''),
            'render_callback'   => 'my_acf_block_render_callback',
            'category'          => 'custom-for-post',
            'icon'              => 'editor-textcolor',
            'keywords'          => array( 'title', 'titel' ),
        ));

?>