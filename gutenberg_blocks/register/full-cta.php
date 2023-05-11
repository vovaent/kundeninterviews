<?php 

acf_register_block(array(
            'name'              => 'full-cta',
            'title'             => __('Volle cta'),
            'description'       => __('CTA in voller Breite'),
            'render_callback'   => 'my_acf_block_render_callback',
            'category'          => 'formatting',
            'icon'              => 'align-wide',
            'keywords'          => array( 'full', 'cta', 'Mehrzweckartikel' ),
        ));

?>