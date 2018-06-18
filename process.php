<?php
if(isset($_POST['submit'])) {
	$data=simplexml_load_file('contact.xml');    


	if(isset($_POST['email']))    $data->email= preg_replace('/[^a-z0-9]+/i', '_', $_POST['email']);

	if(isset($_POST['phone']))    $data->phone= preg_replace('/[^a-z0-9]+/i', '_', $_POST['phone']);

	if(isset($_POST['issn']))    $data->issn= preg_replace('/[^a-z0-9]+/i', '_', $_POST['issn']);

	if(isset($_POST['name']))
	{
	    $contact_name =   preg_replace('/[^a-z0-9]+/i', '_', $_POST['name']);
	    $data->name= $contact_name ;
	    $new_filename = $contact_name . '.xml';
	    $data->asXML($new_filename);
	}

	var_dump($data);
	print_r($data);
}
?>