<?php 

acf_register_block(array(
            'name'              => 'article-slider',
            'title'             => __('Schieberegler'),
            'description'       => __(''),
            'render_callback'   => 'my_acf_block_render_callback',
            'category'          => 'custom-for-post',
            'icon'              => 'images-alt2',
            'keywords'          => array( 'slider', 'Schieberegler' ),
        ));

?>