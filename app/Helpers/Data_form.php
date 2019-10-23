<?php
// form data agama 
function nama_negara() 
{
	$data = [	'indonesia',
						'singapura',
						'malaysia',
						'thailand',
						'vietnam',
						'jepang'];
	return $data;
}

// form data islam
function nama_agama()
{
	$data = [ 'islam',
						'kristen',
						'hindu',
						'budha'];
	return $data;
}

// form gender
function gender()
{
	$data = [ 'male',
						'female',
						'other'];
	return $data;
}

// form blood type
function blood()
{
	$data = [ 'None',
						'A',
						'B',
						'AB',
						'O'];
	return $data;
}

// form marital status
function marital()
{
	$data = [ 'single',
						'married'];
	return $data;
}

// status grup
function status_group()
{
	$data = ['available','full'];
	return $data;
}
