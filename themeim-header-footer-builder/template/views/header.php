<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <?php wp_head(); ?>
</head>

<body>
<?php

global $post;
$header_id = Themeim_Header_Footer_Builder_Frontend_Init::getInstance()->get_themebuilder_Id($post->ID, 'header');
do_action('header_content', $header_id);
echo \Elementor\Plugin::instance()->frontend->get_builder_content_for_display( $header_id );
