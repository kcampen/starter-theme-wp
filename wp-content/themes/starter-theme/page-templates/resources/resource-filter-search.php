<section class="search-inputs resource prev-<?= $GLOBALS['prev_section']; ?>">
    <a name="filter" class="page-anchor"></a>
    <div class="container">
        <div class="columns">
            <div class="column">
                <form role="search" id="resource-search" action="<?= $resources_archive_page['url']; ?>" method="get">
                    <div class="input-side">
                        <div class="text-side">
                            <input 
                                type="text" 
                                value="<?= isset($search_result) ? $search_result : ""; ?>" 
                                placeholder="Search Resources" 
                                name="search"
                                id="search-input"
                                class="<?= $search_result ? "active" : null; ?>"
                            >
                        </div>
                        <?php if(is_array($resource_types)) : ?>
                            <div class="type-side">
                                <select name="type">
                                    <option value="all" <?= !$type_result ? "selected" : null; ?>>All Types</option>
                                    <?php foreach($resource_types as $type) : ?>
                                        <?php if($type->name != "All") : ?>
                                            <option 
                                                value="<?= $type->term_id; ?>" 
                                                <?= $type_result && $type_result == $type->term_id ? "selected" : null; ?>
                                            >
                                                    <?= $type->name; ?>
                                            </option>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        <?php endif; ?>
                        <div class="search-side">
                            <div class="trigger-search <?= $search_result || $type_result && !$current_tax ? "active" : null; ?>">
                            </div>
                        </div>
                        <div class="button-side">
                            <input type="submit"></input>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
<?php $GLOBALS['prev_section'] = "resource-filter-search"; ?>