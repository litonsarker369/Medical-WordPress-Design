<?php

    $cmb = new_cmb2_box( array(
        'id'            => 'user_options',
        'title'         => esc_html__( 'User Options', 'medyc' ),
        'object_types'  => array( 'user'), // Post type
        'context'       => 'normal',
        'priority'      => 'high',
        'show_names'    => true, // Show field names on the left
        
    ) );

    $cmb->add_field( array(
        'name'       => esc_html__( 'User Occupation', 'medyc' ),
        'desc'     => esc_html__( 'Occupation', 'medyc' ),
        'id'         => $prefix . 'occupation',
        'type'       => 'text',
    ) );

    $cmb->add_field( array(
        'name'       => esc_html__( 'Facebook', 'medyc' ),
        'desc'     => esc_html__( 'Add your facebook profile link here', 'medyc' ),
        'id'         => $prefix . 'facebook_link',
        'type'       => 'text',
    ) );

    $cmb->add_field( array(
        'name'       => esc_html__( 'Twitter', 'medyc' ),
        'desc'     => esc_html__( 'Add your twitter profile link here', 'medyc' ),
        'id'         => $prefix . 'twitter_link',
        'type'       => 'text',
    ) );

    $cmb->add_field( array(
        'name'       => esc_html__( 'Instagram', 'medyc' ),
        'desc'     => esc_html__( 'Add your instagram profile link here', 'medyc' ),
        'id'         => $prefix . 'instagram_link',
        'type'       => 'text',
    ) );