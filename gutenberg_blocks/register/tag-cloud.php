<?php 

acf_register_block(array(
            'name'              => 'tag-cloud',
            'title'             => __('Tag Wolke'),
            'description'       => __(''),
            'render_callback'   => 'my_acf_block_render_callback',
            'category'          => 'formatting',
            'icon'              => 'schedule',
            'keywords'          => array( 'tag', 'cloud', 'Tag Wolke' ),
        ));

?>