<?php 

acf_register_block(array(
            'name'              => 'hero-articles',
            'title'             => __('Hauptartikel'),
            'description'       => __('Blockieren Sie mit dem Hauptpfosten und drei anderen'),
            'render_callback'   => 'my_acf_block_render_callback',
            'category'          => 'formatting',
            'icon'              => 'table-col-before',
            'keywords'          => array( 'hero', 'article', 'Hauptartikel' ),
        ));

?>