<?php 

acf_register_block(array(
            'name'              => 'article-quote',
            'title'             => __('Zitieren'),
            'description'       => __(''),
            'render_callback'   => 'my_acf_block_render_callback',
            'category'          => 'custom-for-post',
            'icon'              => 'format-quote',
            'keywords'          => array( 'text', 'quote', 'Zitieren' ),
        ));

?>