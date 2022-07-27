<!-- Planned event -->
<?php
// add_action('montheme_import_content', function () {
//     // Create a directory
//     touch(__DIR__ . '/demo-' . time());
// });

// // Create a custom interval for wp_schedule_event
// add_filter('cron_schedules', function ($schedules) {
//     $schedules['ten_seconds'] = [
//         'interval' => 10,
//         'display' => __('Toutes les 10 secondes', 'montheme')
//     ];
//     return $schedules;
// });

// // Check if this action is already pending
// if (!wp_next_scheduled('montheme_import_content')) {
//     // Plan the action
//     wp_schedule_event(time(), 'ten_seconds', 'montheme_import_content');
// }
