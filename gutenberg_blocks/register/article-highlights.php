<?php 

acf_register_block(array(
            'name'              => 'article-highlights',
            'title'             => __('Höhepunkte'),
            'description'       => __(''),
            'render_callback'   => 'my_acf_block_render_callback',
            'category'          => 'custom-for-post',
            'icon'              => 'align-right',
            'keywords'          => array( 'highlights', 'text', 'Höhepunkte' ),
        ));

?>