<?php 

acf_register_block(array(
            'name'              => 'article-textarea',
            'title'             => __('Textbereich'),
            'description'       => __(''),
            'render_callback'   => 'my_acf_block_render_callback',
            'category'          => 'custom-for-post',
            'icon'              => 'text',
            'keywords'          => array( 'text', 'area', 'Textbereich' ),
        ));

?>