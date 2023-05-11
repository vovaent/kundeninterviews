<?php 

acf_register_block(array(
            'name'              => 'multipurpose-articles',
            'title'             => __('Mehrzweckartikel'),
            'description'       => __('Universalblock für die Ausgabe von Artikeln'),
            'render_callback'   => 'my_acf_block_render_callback',
            'category'          => 'formatting',
            'icon'              => 'grid-view',
            'keywords'          => array( 'multipurpose', 'articles', 'Mehrzweckartikel' ),
        ));

?>