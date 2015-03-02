<?php
	/*
	* Hide admin bar
	**/
	/*show_admin_bar(false);*/

	/*
	*	Register options page
	**/
	if( function_exists('acf_add_options_sub_page') )
	{
	    acf_add_options_sub_page( 'Footer' );
	}
	
	add_action( 'login_form_middle', 'add_lost_password_link' );
	function add_lost_password_link() {
	return '<p class="forgot-password"><a href="/wp-login.php?action=lostpassword">Har du glemt din adgangskode?</a></p>';
	}

	/*
	 * Register menus
	**/
	register_nav_menu('top_menu_area', __('Topmenuområde'));
	register_nav_menu('main_menu_area', __('Hovedmenuområde'));

	include("components/bars.php");	

	add_filter('acf/fields/wysiwyg/toolbars', 'my_toolbars');
	function my_toolbars( $toolbars )
	{

		// Add a new toolbar called "Very Simple"
		// - this toolbar has only 1 row of buttons
		$toolbars['Centreret tekst' ] = array();
		$toolbars['Centreret tekst' ][1] = array('bold');

		$toolbars['Lang tekst' ] = array();
		$toolbars['Lang tekst' ][1] = array('formatselect','bold','italic','underline','link','unlink','bullist','justifycenter','justifyleft','justifyright');

		$toolbars['Footer'] = array();
		$toolbars['Footer'][1] = array('formatselect','bold', 'italic', 'underline','link','unlink');
		//$toolbars['Footer'][1] = array('theme_advanced_blockformats' = 'p,h2,h3,h4,h5,h6,pre');

		// Edit the "Full" toolbar and remove 'code'
		// - delet from array code from http://stackoverflow.com/questions/7225070/php-array-delete-by-value-not-key
		if( ($key = array_search('code' , $toolbars['Full' ][2])) !== false )
		{
		    unset( $toolbars['Full' ][2][$key] );
		}

		// remove the 'Basic' toolbar completely
		unset( $toolbars['Basic' ] );

		// return $toolbars - IMPORTANT!
		return $toolbars;
	}


	if(function_exists("register_field_group"))
{
	register_field_group(array (
		'id' => 'acf_banner',
		'title' => 'Banner',
		'fields' => array (
			array (
				'key' => 'field_53fb28847a1e7',
				'label' => 'Slides',
				'name' => 'slides',
				'type' => 'repeater',
				'sub_fields' => array (
					array (
						'key' => 'field_53fb28a77a1e8',
						'label' => 'Billede',
						'name' => 'image',
						'type' => 'image',
						'required' => 1,
						'column_width' => '',
						'save_format' => 'object',
						'preview_size' => 'medium',
						'library' => 'all',
					),
					array (
						'key' => 'field_53fb28c57a1e9',
						'label' => 'Stor tekst',
						'name' => 'bigtext',
						'type' => 'text',
						'required' => 1,
						'column_width' => '',
						'default_value' => '',
						'placeholder' => '',
						'prepend' => '',
						'append' => '',
						'formatting' => 'none',
						'maxlength' => '',
					),
					array (
						'key' => 'field_53fb28e07a1ea',
						'label' => 'Lille tekst',
						'name' => 'smalltext',
						'type' => 'text',
						'column_width' => '',
						'default_value' => '',
						'placeholder' => '',
						'prepend' => '',
						'append' => '',
						'formatting' => 'none',
						'maxlength' => '',
					),
					array (
						'key' => 'field_53fb28ed7a1eb',
						'label' => 'Placering af tekstboks',
						'name' => 'textbox_position',
						'type' => 'select',
						'required' => 1,
						'column_width' => '',
						'choices' => array (
							'left' => 'Venstre',
							'right' => 'Højre',
						),
						'default_value' => '',
						'allow_null' => 0,
						'multiple' => 0,
					),
				),
				'row_min' => '',
				'row_limit' => '',
				'layout' => 'row',
				'button_label' => 'Tilføj slide',
			),
		),
		'location' => array (
			array (
				array (
					'param' => 'post_type',
					'operator' => '==',
					'value' => 'page',
					'order_no' => 0,
					'group_no' => 0,
				),
				array (
					'param' => 'page',
					'operator' => '!=',
					'value' => '534',
					'order_no' => 1,
					'group_no' => 0,
				),
				array (
					'param' => 'page',
					'operator' => '!=',
					'value' => '651',
					'order_no' => 2,
					'group_no' => 0,
				),
			),
		),
		'options' => array (
			'position' => 'acf_after_title',
			'layout' => 'default',
			'hide_on_screen' => array (
				0 => 'permalink',
				1 => 'excerpt',
				2 => 'custom_fields',
				3 => 'discussion',
				4 => 'comments',
				5 => 'revisions',
				6 => 'slug',
				7 => 'author',
				8 => 'format',
				9 => 'featured_image',
				10 => 'categories',
				11 => 'tags',
				12 => 'send-trackbacks',
			),
		),
		'menu_order' => 0,
	));
	register_field_group(array (
		'id' => 'acf_bjaelker',
		'title' => 'Bjælker',
		'fields' => array (
			array (
				'key' => 'field_53fb2f49190c1',
				'label' => 'Bjælker',
				'name' => 'bars',
				'type' => 'flexible_content',
				'layouts' => array (
					array (
						'label' => 'Type 1 : Lang tekst',
						'name' => 'type1',
						'display' => 'row',
						'min' => '',
						'max' => '',
						'sub_fields' => array (
							array (
								'key' => 'field_53fc9b7d41cf9',
								'label' => 'Farvetema',
								'name' => 'colortheme',
								'type' => 'select',
								'required' => 1,
								'column_width' => '',
								'choices' => array (
									'white' => 'Hvidt',
									'light' => 'Lyst',
									'dark' => 'Mørkt',
									//'black' => 'Sort',
								),
								'default_value' => '',
								'allow_null' => 0,
								'multiple' => 0,
							),
							array (
								'key' => 'field_53fc9a6441cf2',
								'label' => 'Afsnit',
								'name' => 'sections',
								'type' => 'repeater',
								'required' => 1,
								'column_width' => '',
								'sub_fields' => array (
									array (
										'key' => 'field_53fc9a9f41cf3',
										'label' => 'Titel',
										'name' => 'title',
										'type' => 'text',
										'required' => 1,
										'column_width' => '',
										'default_value' => '',
										'placeholder' => 'Titel',
										'prepend' => '',
										'append' => '',
										'formatting' => 'none',
										'maxlength' => '',
									),
									array (
										'key' => 'field_53ff09925bbce',
										'label' => 'Tilføj billede',
										'name' => 'withimage',
										'type' => 'select',
										'required' => 1,
										'column_width' => '',
										'choices' => array (
											0 => 'Nej',
											1 => 'Ja',
										),
										'default_value' => 0,
										'allow_null' => 0,
										'multiple' => 0,
									),
									array (
										'key' => 'field_53fc9ab341cf4',
										'label' => 'Billede',
										'name' => 'image',
										'type' => 'image',
										'conditional_logic' => array (
											'status' => 1,
											'rules' => array (
												array (
													'field' => 'field_53ff09925bbce',
													'operator' => '==',
													'value' => '1',
												),
											),
											'allorany' => 'all',
										),
										'column_width' => '',
										'save_format' => 'object',
										'preview_size' => 'thumbnail',
										'library' => 'all',
									),
									array (
										'key' => 'field_53fc9ac441cf5',
										'label' => 'Antal kolonner',
										'name' => 'columns',
										'type' => 'select',
										'required' => 1,
										'column_width' => '',
										'choices' => array (
											1 => '1 kolonne',
											2 => '2 kolonner',
										),
										'default_value' => 1,
										'allow_null' => 0,
										'multiple' => 0,
									),
									array (
										'key' => 'field_53fc9aea41cf6',
										'label' => 'Kolonne 1',
										'name' => 'column1',
										'type' => 'wysiwyg',
										'required' => 1,
										'column_width' => '',
										'default_value' => '',
										'toolbar' => 'lang_tekst',
										'media_upload' => 'yes',
									),
									array (
										'key' => 'field_53fc9b0141cf7',
										'label' => 'Kolonne 2',
										'name' => 'column2',
										'type' => 'wysiwyg',
										'conditional_logic' => array (
											'status' => 1,
											'rules' => array (
												array (
													'field' => 'field_53fc9ac441cf5',
													'operator' => '==',
													'value' => '2',
												),
											),
											'allorany' => 'all',
										),
										'column_width' => '',
										'default_value' => '',
										'toolbar' => 'lang_tekst',
										'media_upload' => 'yes',
									),
								),
								'row_min' => 1,
								'row_limit' => '',
								'layout' => 'row',
								'button_label' => 'Tilføj afsnit',
							),
							
						),
					),
					array (
						'label' => 'Type 2 : Billede',
						'name' => 'type2',
						'display' => 'row',
						'min' => '',
						'max' => '',
						'sub_fields' => array (
							array (
								'key' => 'field_53fb31d2190ca',
								'label' => 'Billede',
								'name' => 'image',
								'type' => 'image',
								'required' => 1,
								'column_width' => '',
								'save_format' => 'object',
								'preview_size' => 'medium',
								'library' => 'all',
							),
							array (
								'key' => 'field_53fb3262190cb',
								'label' => 'Stor tekst',
								'name' => 'bigtext',
								'type' => 'text',
								'required' => 1,
								'column_width' => '',
								'default_value' => '',
								'placeholder' => '',
								'prepend' => '',
								'append' => '',
								'formatting' => 'none',
								'maxlength' => '',
							),
							array (
								'key' => 'field_53fb3281190cc',
								'label' => 'Lille tekst',
								'name' => 'smalltext',
								'type' => 'text',
								'column_width' => '',
								'default_value' => '',
								'placeholder' => '',
								'prepend' => '',
								'append' => '',
								'formatting' => 'none',
								'maxlength' => '',
							),
							array (
								'key' => 'field_53fb3291190cd',
								'label' => 'Placering af tekstboks',
								'name' => 'textbox_position',
								'type' => 'select',
								'required' => 1,
								'column_width' => '',
								'choices' => array (
									'left' => 'Venstre',
									'right' => 'Højre',
								),
								'default_value' => '',
								'allow_null' => 0,
								'multiple' => 0,
							),
						),
					),
					array (
						'label' => 'Type 3: Tre indgange',
						'name' => 'type3',
						'display' => 'row',
						'min' => '',
						'max' => '',
						'sub_fields' => array (
							array (
								'key' => 'field_53fb3b9f1f783',
								'label' => 'Farvetema',
								'name' => 'colortheme',
								'type' => 'select',
								'required' => 1,
								'column_width' => '',
								'choices' => array (
									//'white' => 'Hvidt',
									'light' => 'Lyst',
									//'dark' => 'Mørkt',
									//'black' => 'Sort',
								),
								'default_value' => '',
								'allow_null' => 0,
								'multiple' => 0,
							),
							array (
								'key' => 'field_53fb35f16f8f1',
								'label' => 'Indgange',
								'name' => 'entries',
								'type' => 'repeater',
								'required' => 1,
								'column_width' => '',
								'sub_fields' => array (
									array (
										'key' => 'field_53fb36296f8f2',
										'label' => 'Ikon',
										'name' => 'icon',
										'type' => 'image',
										'required' => 1,
										'column_width' => '',
										'save_format' => 'object',
										'preview_size' => 'thumbnail',
										'library' => 'all',
									),
									array (
										'key' => 'field_53fb363a6f8f3',
										'label' => 'Titel',
										'name' => 'title',
										'type' => 'text',
										'required' => 1,
										'column_width' => '',
										'default_value' => '',
										'placeholder' => '',
										'prepend' => '',
										'append' => '',
										'formatting' => 'none',
										'maxlength' => '',
									),
									array (
										'key' => 'field_53fb36466f8f4',
										'label' => 'Tekst',
										'name' => 'text',
										'type' => 'textarea',
										'required' => 1,
										'column_width' => '',
										'default_value' => '',
										'placeholder' => '',
										'maxlength' => '',
										'rows' => '',
										'formatting' => 'none',
									),
									array (
										'key' => 'field_53fb365a6f8f5',
										'label' => 'Læs mere-links',
										'name' => 'read_more_links',
										'type' => 'repeater',
										'column_width' => '',
										'sub_fields' => array (
											array (
												'key' => 'field_53fb367d6f8f6',
												'label' => 'Tekst',
												'name' => 'text',
												'type' => 'text',
												'required' => 1,
												'column_width' => '',
												'default_value' => '',
												'placeholder' => '',
												'prepend' => '',
												'append' => '',
												'formatting' => 'none',
												'maxlength' => '',
											),
											array (
												'key' => 'field_53fb36866f8f7',
												'label' => 'Link',
												'name' => 'link',
												'type' => 'page_link',
												'required' => 1,
												'column_width' => '',
												'post_type' => array (
													0 => 'page',
												),
												'allow_null' => 0,
												'multiple' => 0,
											),
										),
										'row_min' => 1,
										'row_limit' => 2,
										'layout' => 'row',
										'button_label' => 'Tilføj læs mere-link',
									),
								),
								'row_min' => 3,
								'row_limit' => 3,
								'layout' => 'row',
								'button_label' => 'Add Row',
							),
							
						),
					),
					array (
						'label' => 'Type 4: Centreret tekst',
						'name' => 'type4',
						'display' => 'row',
						'min' => '',
						'max' => '',
						'sub_fields' => array (

							array (
								'key' => 'field_53fc5a087f7ff',
								'label' => 'Tekst',
								'name' => 'text',
								'type' => 'wysiwyg',
								'column_width' => '',
								'default_value' => '',
								'toolbar' => 'centreret_tekst',
								'media_upload' => 'no',
							),
							array (
								'key' => 'field_53fc5c8590202',
								'label' => 'Farvetema',
								'name' => 'colortheme',
								'type' => 'select',
								'required' => 1,
								'column_width' => '',
								'choices' => array (
									'white' => 'Hvidt',
									'light' => 'Lyst',
									'dark' => 'Mørkt',
								),
								'default_value' => '',
								'allow_null' => 0,
								'multiple' => 0,
							),
							array (
								'key' => 'field_53fc5b5890201',
								'label' => 'Baggrundstype',
								'name' => 'backgroundtype',
								'type' => 'select',
								'column_width' => '',
								'choices' => array (
									'image' => 'Billede',
									'color' => 'Farve',
								),
								'default_value' => '',
								'allow_null' => 0,
								'multiple' => 0,
							),
							array (
								'key' => 'field_53fc5b4390200',
								'label' => 'Baggrundsbillede',
								'name' => 'image',
								'type' => 'image',
								'conditional_logic' => array (
									'status' => 1,
									'rules' => array (
										array (
											'field' => 'field_53fc5b5890201',
											'operator' => '==',
											'value' => 'image',
										),
									),
									'allorany' => 'all',
								),
								'column_width' => '',
								'save_format' => 'object',
								'preview_size' => 'medium',
								'library' => 'all',
							),
							
						),
					),
					array (
						'label' => 'Type 5: Deleleasingsbil',
						'name' => 'type5',
						'display' => 'row',
						'min' => '',
						'max' => '',
						'sub_fields' => array (
							array (
								'key' => 'field_53fd9f76a1817',
								'label' => 'Stor tekst',
								'name' => 'bigtext',
								'type' => 'text',
								'required' => 1,
								'column_width' => '',
								'default_value' => '',
								'placeholder' => '',
								'prepend' => '',
								'append' => '',
								'formatting' => 'none',
								'maxlength' => '',
							),
							array (
								'key' => 'field_53fd9f83a1818',
								'label' => 'Lille tekst',
								'name' => 'smalltext',
								'type' => 'text',
								'column_width' => '',
								'default_value' => '',
								'placeholder' => '',
								'prepend' => '',
								'append' => '',
								'formatting' => 'html',
								'maxlength' => '',
							),
							array (
								'key' => 'field_53fd9f58a1816',
								'label' => 'Farvetema',
								'name' => 'colortheme',
								'type' => 'select',
								'required' => 1,
								'column_width' => '',
								'choices' => array (
									'white' => 'Hvidt',
								),
								'default_value' => '',
								'allow_null' => 0,
								'multiple' => 0,
							),
						),
					),
				),
				'button_label' => 'Tilføj bjælke',
				'min' => '',
				'max' => '',
			),
		),
		'location' => array (
			array (
				array (
					'param' => 'post_type',
					'operator' => '==',
					'value' => 'page',
					'order_no' => 0,
					'group_no' => 0,
				),
				array (
					'param' => 'page',
					'operator' => '!=',
					'value' => '534',
					'order_no' => 1,
					'group_no' => 0,
				),
				array (
					'param' => 'page',
					'operator' => '!=',
					'value' => '651',
					'order_no' => 2,
					'group_no' => 0,
				),
			),
		),
		'options' => array (
			'position' => 'acf_after_title',
			'layout' => 'default',
			'hide_on_screen' => array (
				0 => 'permalink',
				1 => 'excerpt',
				2 => 'custom_fields',
				3 => 'discussion',
				4 => 'comments',
				5 => 'revisions',
				6 => 'slug',
				7 => 'author',
				8 => 'format',
				9 => 'featured_image',
				10 => 'categories',
				11 => 'tags',
				12 => 'send-trackbacks',
			),
		),
		'menu_order' => 0,
	));
	register_field_group(array (
		'id' => 'acf_footer',
		'title' => 'Footer',
		'fields' => array (
			array (
				'key' => 'field_54002c2631137',
				'label' => 'Footer',
				'name' => 'footer',
				'type' => 'repeater',
				'required' => 1,
				'sub_fields' => array (
					array (
						'key' => 'field_54002d64068ab',
						'label' => 'Kolonne 1',
						'name' => 'column1',
						'type' => 'wysiwyg',
						'required' => 1,
						'column_width' => '',
						'default_value' => '',
						'toolbar' => 'footer',
						'media_upload' => 'no',
					),
					array (
						'key' => 'field_54002d8cf1df2',
						'label' => 'Kolonne 2',
						'name' => 'column2',
						'type' => 'wysiwyg',
						'required' => 1,
						'column_width' => '',
						'default_value' => '',
						'toolbar' => 'footer',
						'media_upload' => 'no',
					),
					array (
						'key' => 'field_54002d92f1df3',
						'label' => 'Kolonne 3',
						'name' => 'column3',
						'type' => 'wysiwyg',
						'required' => 1,
						'column_width' => '',
						'default_value' => '',
						'toolbar' => 'footer',
						'media_upload' => 'no',
					),
				),
				'row_min' => 1,
				'row_limit' => 1,
				'layout' => 'row',
				'button_label' => 'Add Row',
			),
		),
		'location' => array (
			array (
				array (
					'param' => 'options_page',
					'operator' => '==',
					'value' => 'acf-options-footer',
					'order_no' => 0,
					'group_no' => 0,
				),
			),
		),
		'options' => array (
			'position' => 'normal',
			'layout' => 'default',
			'hide_on_screen' => array (
			),
		),
		'menu_order' => 0,
	));
	register_field_group(array (
		'id' => 'acf_personale-3',
		'title' => 'Personale',
		'fields' => array (
			array (
				'key' => 'field_53fdc8208933f',
				'label' => 'Personale',
				'name' => 'staff',
				'type' => 'repeater',
				'required' => 1,
				'sub_fields' => array (
					array (
						'key' => 'field_53fde34c3921a',
						'label' => 'Navn',
						'name' => 'name',
						'type' => 'text',
						'required' => 1,
						'column_width' => '',
						'default_value' => '',
						'placeholder' => '',
						'prepend' => '',
						'append' => '',
						'formatting' => 'none',
						'maxlength' => '',
					),
					array (
						'key' => 'field_53fde3563921b',
						'label' => 'Titel',
						'name' => 'title',
						'type' => 'text',
						'required' => 1,
						'column_width' => '',
						'default_value' => '',
						'placeholder' => '',
						'prepend' => '',
						'append' => '',
						'formatting' => 'none',
						'maxlength' => '',
					),
					array (
						'key' => 'field_53fde4bebd147',
						'label' => 'Billede',
						'name' => 'image',
						'type' => 'image',
						'required' => 1,
						'column_width' => '',
						'save_format' => 'object',
						'preview_size' => 'thumbnail',
						'library' => 'all',
					),
					array (
						'key' => 'field_53fde35f3921c',
						'label' => 'Personalegruppe',
						'name' => 'staffgroup',
						'type' => 'select',
						'required' => 1,
						'column_width' => '',
						'choices' => array (
							'management' => 'Ledelse',
							'administration' => 'Administration',
							'consultants' => 'Konsulenter',
							'leasing' => 'Leasing',
							'financing' => 'Finansiering',
						),
						'default_value' => 'management',
						'allow_null' => 0,
						'multiple' => 0,
					),
					array (
						'key' => 'field_53fde39a3921d',
						'label' => 'Email',
						'name' => 'email',
						'type' => 'email',
						'required' => 1,
						'column_width' => '',
						'default_value' => '',
						'placeholder' => '',
						'prepend' => '',
						'append' => '',
					),
					array (
						'key' => 'field_53fde3a93921e',
						'label' => 'Mobil',
						'name' => 'mobile',
						'type' => 'text',
						'column_width' => '',
						'default_value' => '',
						'placeholder' => '',
						'prepend' => '',
						'append' => '',
						'formatting' => 'none',
						'maxlength' => '',
					),
				),
				'row_min' => '',
				'row_limit' => '',
				'layout' => 'row',
				'button_label' => 'Tilføj kontakt',
			),
		),
		'location' => array (
			array (
				array (
					'param' => 'page',
					'operator' => '==',
					'value' => '558',
					'order_no' => 0,
					'group_no' => 0,
				),
			),
		),
		'options' => array (
			'position' => 'acf_after_title',
			'layout' => 'default',
			'hide_on_screen' => array (
				0 => 'permalink',
				1 => 'the_content',
				2 => 'excerpt',
				3 => 'custom_fields',
				4 => 'discussion',
				5 => 'comments',
				6 => 'revisions',
				7 => 'slug',
				8 => 'author',
				9 => 'format',
				10 => 'featured_image',
				11 => 'categories',
				12 => 'tags',
				13 => 'send-trackbacks',
			),
		),
		'menu_order' => 0,
	));
}
?>
