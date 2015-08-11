<?php
if(function_exists("register_field_group"))
{
	register_field_group(array (
		'id' => 'acf_campos-do-usuario',
		'title' => 'Campos do usuário',
		'fields' => array (
			array (
				'key' => 'field_55ca363f068ef',
				'label' => 'Avatar',
				'name' => 'custom_avatar',
				'type' => 'image',
				'save_format' => 'object',
				'preview_size' => 'thumbnail',
				'library' => 'all',
			),
			array (
				'key' => 'field_55a69be2ed09f',
				'label' => 'Idade',
				'name' => 'idade',
				'type' => 'text',
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'formatting' => 'html',
				'maxlength' => '',
			),
			array (
				'key' => 'field_55a69bffed0a0',
				'label' => 'Polo',
				'name' => 'polo',
				'type' => 'text',
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'formatting' => 'html',
				'maxlength' => '',
			),
			array (
				'key' => 'field_55a69c07ed0a1',
				'label' => 'Telefone',
				'name' => 'fone',
				'type' => 'text',
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'formatting' => 'html',
				'maxlength' => '',
			),
			array (
				'key' => 'field_55ca36ac634be',
				'label' => 'No projeto você é:',
				'name' => 'user_type',
				'type' => 'radio',
				'choices' => array (
					'Mediador(a)' => 'Mediador(a)',
					'Jogador(a)' => 'Jogador(a)',
					'Educador(a)' => 'Educador(a)',
				),
				'other_choice' => 1,
				'save_other_choice' => 0,
				'default_value' => '',
				'layout' => 'vertical',
			),
		),
		'location' => array (
			array (
				array (
					'param' => 'ef_user',
					'operator' => '==',
					'value' => 'all',
					'order_no' => 0,
					'group_no' => 0,
				),
			),
		),
		'options' => array (
			'position' => 'normal',
			'layout' => 'no_box',
			'hide_on_screen' => array (
			),
		),
		'menu_order' => 0,
	));
}
