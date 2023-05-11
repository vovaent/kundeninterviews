<?php 

acf_register_block(array(
            'name'              => 'article-cta-link',
            'title'             => __('CTA Link'),
            'description'       => __(''),
            'render_callback'   => 'my_acf_block_render_callback',
            'category'          => 'custom-for-post',
            'icon'              => 'align-wide',
            'keywords'          => array( 'cta', 'link', 'Mehrzweckartikel' ),
        ));

?>