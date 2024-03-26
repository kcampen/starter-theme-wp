<?php
    $resource_args = array(
        'post_type' => ['resource_posts'],
        'post_status' => 'publish',
        'posts_per_page' => 3,
        'paged' => $paged,
        's' => $search_result,
        'tax_query' => array(
            $type_query
        )
    );

    $resource_loop = new WP_Query($resource_args);
    if($resource_loop->have_posts()) : 
?>
        <section class="resource-archive prev-<?= $GLOBALS['prev_section']; ?>">
            <div class="container">
                <div class="columns archive-loop">
                    <?php while($resource_loop->have_posts()) : $resource_loop->the_post(); ?>

                        <div class="column">
                            <?php require(get_stylesheet_directory() . '/page-templates/resources/resource-loop-item.php'); ?>
                        </div>

                    <?php endwhile; ?>
                </div>
            </div>
            <div class="container">
                <div class="columns">
                    <?php
                        // PAGINATION
                        $pagination_base = $resources_archive_page['url'];
                        if(is_tax()) {
                            $pagination_base = get_term_link(get_queried_object()->term_id);
                        }
                        $total_pages = $resource_loop->max_num_pages;
                        if($total_pages > 1) :
                    ?>
                            <div class="column archive-pagination">
                                <?php
                                    $current_page = max(1, get_query_var('paged'));

                                    echo paginate_links(array(
                                        'base' => $pagination_base . "%_%",
                                        'format' => 'page/%#%',
                                        'current' => $current_page,
                                        'total' => $total_pages,
                                        'prev_text' => __('< '),
                                        'next_text' => __(' >'),
                                        'add_args' => array()
                                    ));
                                ?>
                            </div>
                    <?php endif; ?>
                </div>
            </div>
        </section>
    <?php else : ?>
        <section class="">
            <div class="container">
                <div class="columns">
                    <div class="column">
                        No results found. Please Try again.
                    </div>
                </div>
            </div>
        </section>
    <?php endif; wp_reset_postdata(); ?>
    <?php $GLOBALS['prev_section'] = "resource-archive"; ?>