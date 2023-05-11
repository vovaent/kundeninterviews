<?php 

acf_register_block(array(
            'name'              => 'article-cta',
            'title'             => __('CTA'),
            'description'       => __(''),
            'render_callback'   => 'my_acf_block_render_callback',
            'category'          => 'custom-for-post',
            'icon'              => 'align-wide',
            'keywords'          => array( 'cta', 'Mehrzweckartikel' ),
        ));

?>