<?php
/**
 * The Template for displaying all single posts
 * @package inhost
 */

get_header();
?>
<?php if ($inwave_cfg['slide-id']) { ?>
    <div class="slide-container <?php echo esc_attr($inwave_cfg['slide-id'])?>">
        <?php putRevSlider($inwave_cfg['slide-id']); ?>
    </div>
<?php } ?>
<?php if ($inwave_cfg['show-pageheading']) { ?>
    <div class="page-heading">
        <div class="container">
            <div class="page-title">
                <?php the_title('<h1>','</h1>') ?>
                <?php include(inwave_get_file_path('blocks/breadcrumb')); ?>
            </div>
        </div>
    </div>
<?php } ?>
<div class="page-content">
    <div class="main-content">
        <div class="container">
            <div class="row">
                <div class="<?php echo esc_attr(inwave_get_classes('container',$inwave_cfg['sidebar-position']))?> blog-content single-content">
                    <?php while (have_posts()) : the_post(); ?>
                        <?php get_template_part('content', 'single'); ?>
                        <?php
                        // If comments are open or we have at least one comment, load up the comment template
                        if (comments_open() || get_comments_number()) :
                            comments_template();
                        endif;
                        ?>
                    <?php endwhile; // end of the loop. ?>
                </div>
                <?php if ($inwave_cfg['sidebar-position']) { ?>
                    <div class="<?php echo esc_attr(inwave_get_classes('sidebar',$inwave_cfg['sidebar-position']))?>">
                        <?php get_sidebar($inwave_cfg['sidebar-name']); ?>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
</div>

<?php get_footer(); ?>