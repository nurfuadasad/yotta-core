<?php
/**
 * Theme Taxonomy Options
 * @package Yotta
 * @since 1.0.0
 */

if ( !defined('ABSPATH') ){
	exit(); // exit if access directly
}

if ( class_exists('CSF') ){

	$allowed_html = yotta_core()->kses_allowed_html(array('mark'));

	$prefix = 'yotta';

    /**
     * Service Category Options
     * @package yotta
     * @since 1.0.0
     */

	CSF::createTaxonomyOptions( $prefix .'_service_category', array(
		'taxonomy'  => 'service-cat',
		'data_type' => 'serialize', // The type of the database save options. `serialize` or `unserialize`
	) );

	// Create a section
	CSF::createSection( $prefix .'_service_category', array(
		'fields' => array(
			array(
				'id'    => 'icon',
				'type'  => 'icon',
				'title' => esc_html__('Icon','yotta'),
				'default' => 'flaticon-businessman'
			),
		)
	) );


    /**
     * Packages Category Options
     * @package yotta
     * @since 1.0.0
     */
    CSF::createTaxonomyOptions( $prefix .'_packages_category', array(
        'taxonomy'  => 'packages-cat',
        'data_type' => 'serialize', // The type of the database save options. `serialize` or `unserialize`
    ) );

    // Create a section
    CSF::createSection( $prefix .'_packages_category', array(
        'fields' => array(
            array(
                'id'    => 'icon',
                'type'  => 'icon',
                'title' => esc_html__('Icon','yotta'),
                'default' => 'flaticon-statistics'
            ),
        )
    ) );


    /**
     * training Category Options
     * @package yotta
     * @since 1.0.0
     */
    CSF::createTaxonomyOptions( $prefix .'_training_category', array(
        'taxonomy'  => 'training-cat',
        'data_type' => 'serialize', // The type of the database save options. `serialize` or `unserialize`
    ) );

    // Create a section
    CSF::createSection( $prefix .'_training_category', array(
        'fields' => array(
            array(
                'id'    => 'icon',
                'type'  => 'icon',
                'title' => esc_html__('Icon','yotta'),
                'default' => 'flaticon-suitcase'
            ),
        )
    ) );

    /**
     * Team Category Options
     * @package yotta
     * @since 1.0.0
     */
    CSF::createTaxonomyOptions( $prefix .'_team_category', array(
        'taxonomy'  => 'team-cat',
        'data_type' => 'serialize', // The type of the database save options. `serialize` or `unserialize`
    ) );

    // Create a section
    CSF::createSection( $prefix .'_team_category', array(
        'fields' => array(
            array(
                'id'    => 'icon',
                'type'  => 'icon',
                'title' => esc_html__('Icon','yotta'),
                'default' => 'flaticon-suitcase'
            ),
        )
    ) );

}//endif