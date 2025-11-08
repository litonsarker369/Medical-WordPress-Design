<?php


$cmb = new_cmb2_box( array(
    'id'            => 'project_options',
    'title'         => esc_html__( 'Project Settings', 'medyc' ),
    'object_types'  => array( 'project' ), // Post type
    'context'       => 'normal',
    'priority'      => 'high',
    'show_names'    => true, // Show field names on the left
) );

$cmb->add_field(
    array(
            'name'     => esc_html__( 'Banner SubTitle', 'medyc' ),
            'desc'     => esc_html__( 'Page Banner SubTittle', 'medyc' ),
            'id'       => $prefix . 'banner_subtitle',
            'type'     => 'text',
            'on_front' => false,
        )
);