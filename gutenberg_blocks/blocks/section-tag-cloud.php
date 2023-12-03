<?php

if (get_field('uniq_id')) {
    $unique_id = get_field('uniq_id');
} else {
    $unique_id = uniqid('TagCloud_');
}



if (get_field('tag_all') == 'on') {
    $tag_args = [
        'hide_empty' => false,
    ];

    $tags = get_tags($tag_args);
} else {
    $tags = get_field('tags');
}

?>

<section class="TagCloud" id="<?php echo $unique_id ?>">
    <!-- <div class="container"> -->
    <div class="TagCloudContent">
        <?php if ($title = get_field('title')) { ?>
            <div class="TagCloudContentTitle">
                <?php echo $title ?>
            </div>
        <?php } ?>
        <?php if ($tags) { ?>
            <div class="TagCloudContentTags">
                <?php foreach ($tags as $item) { ?>
                    <div class="TagCloudContentTagsItem" data-tagid="<?php echo $item->term_id ?>" onClick="location.href='<?php echo get_tag_link($item) ?>'">
                        <?php echo $item->name ?>
                    </div>
                <?php } ?>
            </div>
        <?php } ?>
    </div>
    <!-- </div> -->
</section>