<?php


$cmb = new_cmb2_box( array(
    'id'            => 'page_options',
    'title'         => esc_html__( 'Page Settings', 'medyc' ),
    'object_types'  => array( 'page' ), // Post type
    'context'       => 'normal',
    'priority'      => 'high',
    'show_names'    => true, // Show field names on the left
) );




