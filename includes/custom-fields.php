<?php
if(function_exists("register_field_group"))
{
	register_field_group(array (
		'id' => 'acf_campos-do-usuario',
		'title' => 'Campos do usuário',
		'fields' => array (
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
				'key' => 'field_55a69c15ed0a2',
				'label' => 'No projeto você é',
				'name' => 'user_type',
				'type' => 'select',
				'choices' => array (
					'Mediador(a)' => 'Mediador(a)',
					'Jogador(a)' => 'Jogador(a)',
					'Educador(a)' => 'Educador(a)',
					'Outros' => 'Outros',
				),
				'default_value' => '',
				'allow_null' => 0,
				'multiple' => 0,
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
