<?php get_header(); ?>

<div class="header-events-page">
    <h1>EVENTS AT FRIANT</h1>
    <p>Explore Upcoming Events</p>
</div>

<div class="container-fluid px-md-5 event-container">
    <div class="row">
        <!-- Sidebar Filters -->
        <aside class="col-lg-3 col-md-12 filter-section p-lg-4 p-0">
            <!-- Desktop Filters -->
            <div class="desktp-view">
                <div class="filter-card">
                    <h5>Location</h5>
                    <?php
                    $locations = get_terms(array('taxonomy' => 'event-location', 'hide_empty' => true));
                    foreach ($locations as $location) {
                        echo '<div class="filter-input">
                            <input type="checkbox" class="filter-checkbox" data-filter="event-location" value="' . $location->slug . '"> 
                            ' . $location->name . '
                        </div>';
                    }
                    ?>
                </div>
                <div class="filter-card">
                    <h5 class="mt-3">Event Type</h5>
                    <?php
                    $types = get_terms(array('taxonomy' => 'event-type', 'hide_empty' => true));
                    foreach ($types as $type) {
                        echo '<div class="filter-input">
                            <input type="checkbox" class="filter-checkbox" data-filter="event-type" value="' . $type->slug . '"> 
                            ' . $type->name . '
                        </div>';
                    }
                    ?>
                </div>
            </div>

            <!-- Mobile Filters -->
            <div class="mob-view">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="custom-select-container">
                                <select id="location" class="custom-select">
                                    <option selected> Location</option>
                                    <?php foreach ($locations as $location) { ?>
                                        <option value="<?php echo $location->slug; ?>"><?php echo $location->name; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="custom-select-container">
                                <select id="eventType" class="custom-select">
                                    <option selected> Event Type</option>
                                    <?php foreach ($types as $type) { ?>
                                        <option value="<?php echo $type->slug; ?>"><?php echo $type->name; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </aside>

        <!-- Events Section -->
        <section class="col-lg-9 col-md-12 pl-lg-5 px-2">
            <div id="event-results">
                <?php get_template_part('template-parts/content', 'events'); ?>
            </div>
        </section>
    </div>
</div>


<?php get_footer(); ?>