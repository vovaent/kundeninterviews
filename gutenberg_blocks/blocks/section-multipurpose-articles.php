<?php

if (get_field('uniq_id')) {
    $unique_id = get_field('uniq_id');
} else {
    $unique_id = uniqid('MultiArticles_');
}

$posts_str = '';
if (get_field('posts_on') == 'on') {
    $posts = get_field('posts');
    $posts_str = implode(',', $posts);
}

$tag = '';
if (get_field('tag_on') == 'on') {
    $tag = get_field('tag');
}
?>

<section class="MultiArticles" id="<?php echo $unique_id ?>">
    <div class="container">
        <?php if ($title = get_field('title')) { ?>
            <div class="MultiArticlesTitle">
                <?php echo $title ?>
            </div>
        <?php } ?>
        <div class="MultiArticlesContant">

        </div>
    </div>
</section>
<?php if ($number_row = get_field('number_row')) { ?>
    <style>
        <?php if (get_field('card_type') == 'medium') { ?>#<?php echo $unique_id ?>.MediumArticle {
            width: calc(100%/<?php echo $number_row ?> - 16px);
        }

        <?php if ($number_row == 4) { ?>#<?php echo $unique_id ?>.MediumArticle {
            background-color: #CCF3EA;
        }

        #<?php echo $unique_id ?>.MediumArticle:nth-child(2n) {
            background-color: #fff;
        }

        #<?php echo $unique_id ?>.MediumArticle .MediumArticleBottomDescription {
            display: none;
        }

        #<?php echo $unique_id ?>.MediumArticle .MediumArticleBottom {
            padding: 16px;
        }

        #<?php echo $unique_id ?>.CTAMedium {
            padding: 16px;
        }

        #<?php echo $unique_id ?>.CTAMedium .CTAMediumDescription {
            font-size: 20px;
        }

        <?php } ?>#<?php echo $unique_id ?>.CTAMedium {
            width: calc(100%/<?php echo $number_row ?> - 16px);
        }

        <?php } ?>
    </style>
<?php } ?>

<script>
    function card_load(paged) {
        $.ajax({
            type: 'POST',
            url: '/wp-admin/admin-ajax.php',
            data: {
                action: 'kundeninterviews_card_load',
                posts: '<?php echo $posts_str; ?>',
                tag: '<?php echo $tag; ?>',
                card_type: '<?php echo get_field('card_type') ?>',
                q_posts: <?php echo get_field('count') ?>,
                paged: paged,
                settings_button: <?php echo wp_json_encode(get_field('button_settings')) ?>,
                cta_on: '<?php echo get_field('cta_on') ?>',
                cta_content: <?php echo json_encode(get_field('cta')) ?>,
                number_row: <?php echo get_field('number_row') ?>
            },
            success: function(res) {
                $('#<?php echo $unique_id ?> #load_more').remove();
                $('#<?php echo $unique_id ?> .MultiArticlesContant').append(res);
            }
        });
    }

    var page = 1;
    card_load(page);

    $('#<?php echo $unique_id ?> .MultiArticlesContant').on('click', '#load_more', function(e) {
        page = page + 1;
        card_load(page);
    })
</script>