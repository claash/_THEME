<?php

class App
{
    public function title()
    {

        if (is_home()) {
            return __('Blog', 'theme');
        }

        if (is_archive()) {
            return get_the_archive_title();
        }

        if (is_search()) {
            return sprintf(__('Search Results for %s', 'theme'), get_search_query());
        }

        if (is_404()) {
            return __('404', 'theme');
        }

        return get_the_title();
    }
}
