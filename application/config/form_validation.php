<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$config = array(
        
        'item' => array(
                array(
                    'field' => 'name',
                    'label' => 'Product Name',
                    'rules' => 'required|callback_isunique|min_length[4]|xss_clean'
                ),
                array(
                    'field' => 'description',
                    'label' => 'Product Description',
                    'rules' => 'required|min_length[4]|xss_clean'            
                ),
                array(
                    'field' => 'actual_price',
                    'label' => 'Product Actual Price',
                    'rules' => 'required|xss_clean'            
                ),
                array(
                    'field' => 'weight',
                    'label' => 'Product Weight',
                    'rules' => 'required|xss_clean'            
                ),
                array(
                    'field' => 'quantity',
                    'label' => 'Product Quantity',
                    'rules' => 'required|xss_clean'            
                )
        ),
        
        'order' => array(
                array(
                        'field' => 'firstname',
                        'label' => 'First Name',
                        'rules' => 'required|xss_clean'
                ),
                array(
                        'field' => 'lastname',
                        'label' => 'Last Name',
                        'rules' => 'required|xss_clean'
                ),
                array(
                        'field' => 'email',
                        'label' => 'Email',
                        'rules' => 'required|xss_clean'
                ),
                array(
                        'field' => 'phoneno',
                        'label' => 'Phone Number',
                        'rules' => 'required|xss_clean'
                ),
                array(
                        'field' => 'address',
                        'label' => 'Address',
                        'rules' => 'required|xss_clean'
                ),
                array(
                        'field' => 'city',
                        'label' => 'City',
                        'rules' => 'required|xss_clean'
                ),
                array(
                        'field' => 'state',
                        'label' => 'State',
                        'rules' => 'required|xss_clean'
                ),
                array(
                        'field' => 'zipcode',
                        'label' => 'Zipcode',
                        'rules' => 'required|xss_clean'
                ),
        ),
        'amenity' => array(
                array(
                        'field' => 'name',
                        'label' => 'Amenity Name',
                        'rules' => 'required|callback_isunique|min_length[2]'
                )
        )
);