<?php 

/**
 * Helper functions
 */

function assets_path($file = false) {
    if (!$file) return '';

    return get_template_directory_uri() . "/assets/dist/{$file}";
}