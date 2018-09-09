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
        'area' => array(
		array(

			'field' => 'name',
			'label' => 'Area Name',
			'rules' => 'required|callback_isunique|min_length[4]|xss_clean'
		),
		array(

			'field' => 'city_id',
			'label' => 'City Name',
			'rules' => 'required|xss_clean'
		)
        ),
        'property_type' => array(
                array(
                        'field' => 'name',
                        'label' => 'Property Name',
                        'rules' => 'required|callback_isunique|min_length[4]|xss_clean'
                )
        ),
        'amenity' => array(
                array(
                        'field' => 'name',
                        'label' => 'Amenity Name',
                        'rules' => 'required|callback_isunique|min_length[2]'
                )
        ),
        'property' => array(
                array(
                        'field' => 'title',
                        'label' => 'Title',
                        'rules' => 'trim|required|min_length[10]|max_length[200]|xss_clean'
                ),
                array(
                        'field' => 'description',
                        'label' => 'Description',
                        'rules' => 'trim|required|min_length[20]|xss_clean'
                ),               
                array(
                        'field' => 'city_id',
                        'label' => 'City',
                        'rules' => 'trim|numeric|required|xss_clean'
                ),
                array(
                        'field' => 'area_id',
                        'label' => 'Area',
                        'rules' => 'trim|numeric|required|xss_clean'
                ),
                array(
                        'field' => 'monthly_rent',
                        'label' => 'Monthly Rent',
                        'rules' => 'trim|numeric|required|xss_clean'
                ),
                array(
                        'field' => 'total_rooms',
                        'label' => 'Total Rooms',
                        'rules' => 'trim|numeric|required|xss_clean'
                ),
                array(
                        'field' => 'fixed_deposit',
                        'label' => 'Fixed Deposit',
                        'rules' => 'trim|numeric|required|xss_clean'
                ),
                array(
                        'field' => 'latitude',
                        'label' => 'Latitude',
                        'rules' => 'trim|numeric|required|xss_clean'
                ),
                array(
                        'field' => 'longitude',
                        'label' => 'Longitude',
                        'rules' => 'trim|numeric|required|xss_clean'
                ),
                array(
                        'field' => 'minimum_stay',
                        'label' => 'Minimum Stay',
                        'rules' => 'trim|numeric|required|xss_clean'
                ),
                array(
                        'field' => 'current_roommates',
                        'label' => 'Current Roommates',
                        'rules' => 'trim|numeric|required|xss_clean'
                ),
                 array(
                        'field' => 'preferred_age_from',
                        'label' => 'Preferred Age From',
                        'rules' => 'trim|numeric|required|xss_clean'
                ),
                array(
                        'field' => 'preferred_age_to',
                        'label' => 'Preferred Age To',
                        'rules' => 'trim|numeric|required|xss_clean'
                )
        ),
        'enquiry' => array(              
                array(
                        'field' => 'email',
                        'label' => 'Email',
                        'rules' => 'required|valid_email|xss_clean'
                ),
                array(
                        'field' => 'name',
                        'label' => 'Name',
                        'rules' => 'required|min_length[2]|xss_clean'
                ), 
                array(
                        'field' => 'message',
                        'label' => 'Message',
                        'rules' => 'required|min_length[5]|xss_clean'
                )
        ),
        'review' => array(              
                array(
                        'field' => 'email',
                        'label' => 'Email',
                        'rules' => 'required|valid_email|callback_unique_review|xss_clean'
                ),
                array(
                        'field' => 'name',
                        'label' => 'Name',
                        'rules' => 'required|min_length[2]|xss_clean'
                ), 
                array(
                        'field' => 'review',
                        'label' => 'Review',
                        'rules' => 'required|min_length[5]|xss_clean'
                )
        )
);