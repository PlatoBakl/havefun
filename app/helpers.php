<?php

if (! function_exists('active_class_path')) {
    /**
     * Get the evaluated view contents for the given view.
     *
     * @param  string  $view
     * @param  array   $data
     * @param  array   $mergeData
     * @return \Illuminate\View\View|\Illuminate\Contracts\View\Factory
     */
    function active_class_path($paths, $classes = null)
    {
//        return request()->path();
//        return (request()->is('admin/events'))? 1 : 0;
        foreach ((array) $paths as $path) {
            if (request()->is($path)) {
                return 'class=' . ($classes ? $classes . ' ' : '') . 'active';
            }
        }
        return $classes ? 'class="' . $classes . '"' : '';
    }
}