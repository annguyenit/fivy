<?php
global $post;

$date_format = get_option('date_format');
$author_id=$post->post_author;

?>
<div <?php post_class(); ?>>
    <div class="tittle">
        <?php the_title() ?>
    </div>
    <?php
    // show post meta
    //if(st_get_setting('s_show_post_meta','y')!='n'){ ?>
        <div class="entry-meta">
            <span class="meta-item blog-author">
                <?php
                printf('By  <a href="%1$s">%2$s</a>',esc_url( get_author_posts_url( get_the_author_meta( 'ID', $author_id ) ) ), get_the_author_meta( 'display_name', $author_id ));
                ?>
            </span>
            <span class="meta-item blog-date"><?php printf(__('On %s',THEMENAME),get_the_time($date_format)); ?></span>
            <span class="meta-item blog-comment"><?php comments_number(__('0 Comment',THEMENAME),__('1 Comment',THEMENAME),__('% Comments',THEMENAME) )?> </span>
            <span class="meta-item blog-category">
                <?php printf(__('In %s',THEMENAME),get_the_category_list(', '));?>
            </span>
        </div>
    <?php //} ?>

    <div class="entry-content">
    <?php
    // show the content    
        the_content();
    ?>
    </div>

</div><!-- /. end post_class -->