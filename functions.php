<?php

function my_theme_enqueue_styles() {
    // Отложенная загрузка стилей родительской темы (для Google Page Speed)
    $styles_html = '<link rel="stylesheet" href="' . esc_url( get_parent_theme_file_uri( 'style.css' ) ) . '" type="text/css" media="screen"/>';
    echo "<noscript class='loadLater'>$styles_html</noscript>";
}
add_action( 'wp_enqueue_scripts', 'my_theme_enqueue_styles' );

// Подключаем файл обработчик Javascript
function enqueue_defer_noscript_loadlater() {
    $script_path = get_stylesheet_directory_uri() . '/defer_noscript_loadLater.js';
    wp_enqueue_script( 'defer_css_javascript', $script_path, array(), null, true );
}
add_action('wp_footer', 'enqueue_defer_noscript_loadlater');