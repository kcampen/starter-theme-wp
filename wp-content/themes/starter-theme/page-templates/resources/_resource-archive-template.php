
<?php $page_ID = get_the_ID(); ?>

<?php
    
    // IF TAXONOMY ARCHIVE SET TAXONOMY
    $current_tax = null;
    if(is_tax()) {
        $current_tax = get_queried_object();
    }

    // GET URL TO ARCHIVE PAGE
    $resources_archive_page = get_field("resources_archive", "option");
    
    // GET LIST OF RESOURCE TYPES
    $resource_types = get_terms(array(
        'taxonomy' => 'resource_type_tax',
        'hide_empty' => false,
    ));

    // SET TYPE IF TAXONOMY OR FILTER
    $type_result = null;
    $type_query = null;
    if(isset($_GET['type']) || $current_tax) {
        if($current_tax) {
            $type_result = $current_tax->term_id;
        }
        else {
            $type_result = htmlspecialchars($_GET['type'], ENT_QUOTES);
        }
        $type_name = get_term($type_result, 'resource_type_tax')->name;

        if($type_result == "all") {
            $type_result = null;
        }
        else {
            $type_query = array(
                'taxonomy' => 'resource_type_tax',
                'field' => 'term_id',
                'terms' => $type_result
            );
        }
    }

    // SET SEARCH RESULT
    $search_result = null;
    if(isset($_GET['search'])) {
        $search_result = htmlspecialchars($_GET['search'], ENT_QUOTES);
    }
?>

<?php require_once( get_stylesheet_directory() . '/page-templates/resources/resource-filter-search.php'); ?>
<?php require_once( get_stylesheet_directory() . '/page-templates/resources/resource-loop.php'); ?>