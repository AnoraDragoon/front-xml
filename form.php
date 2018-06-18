<?php
function deeperTag($tag) {
	// recursive function
	$result = "";
	if ($tag->count() > 0) {
		// push the children to the left
		$result .= '<div style="margin-left:25px;">';
		$result .= '<h3>' . ucfirst($tag->getName()) . '</h3>';
		if($tag->attributes() != false)
			$result .= '<p>' . $tag->attributes()[0]->getName() . ' : ' . $tag->attributes()[0] . '</p>';
		// call the recursive function
		foreach ($tag as $key => $value) {
			$result .= deeperTag($value);
		}
		$result .= '</div>';
	} else {
		// if it doesnt has more deeper tags, print the label and the input
		$result .= '<div  class="field">';
		$result .= '<label> <strong>' . ucfirst($tag->getName()) . '</strong>';
		// if it has a attribute, print it next to the label
		if($tag->attributes() != false) {
			$result .= ' ' . $tag->attributes()[0]->getName() . ' : ' . $tag->attributes()[0];
		}
		$result .= '</label> ';
		// if the input is have an element inside, print it in the value
		$result .= '<input type="text" name="' . $tag->getName() . '"';
		if($tag->__toString() != null && $tag->__toString() != "" && $tag->__toString() != " ")
			$result .= ' value="' . $tag->__toString() . '"';
		$result .= '/>';
		$result .= '</div>';
	}

	return $result;
}

$form_fields  = null;
$file = 'jats.xml';
$data = simplexml_load_file($file);

$form_fields = deeperTag($data);
//var_dump($data);
//echo count($data->children()[0]->children()[0]->attributes()) . "<br>";
//echo count($data->children()[0]->children()[2]->attributes()) . "<br>";
// echo $data->children()[0]->children()[0]->attributes() == false ? "false" . "<br>" : "true" . "<br>";
// echo $data->children()[0]->children()[2]->attributes() == false ? "false" . "<br>" : "true" . "<br>";
// echo $data->children()[0]->children()[0]->children() == false ? "false" . "<br>" : "true" . "<br>";
// echo $data->children()[0]->children()[2]->children() == false ? "false" . "<br>" : "true" . "<br>";
//echo $data->children()[0]->getName() . "<br>";
//echo $data->children()[0]->children()[0]->count() . "<br>";
//echo $data->children()[0]->children()[0]->getName() . "<br>";

?>
 <!DOCTYPE html>
<html>
<head>
	<script
	  src="https://code.jquery.com/jquery-3.3.1.min.js"
	  integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
	  crossorigin="anonymous"></script>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/semantic-ui@2.3.2/dist/semantic.min.css">
	<script src="https://cdn.jsdelivr.net/npm/semantic-ui@2.3.2/dist/semantic.min.js"></script>
<style>
</style>
</head>
<body>
	<div class="ui raised very padded text container segment">
			<h2 class="ui header">Enter front information from the banner</h2>
		<form class="ui form" method="POST" action="jats-process.php">
		<?php echo $form_fields; ?>
		  <button class="ui button" name="submit" value="Submit" type="submit">Submit</button>
		<!-- <input type="submit" name="submit" value="Submit" class="btn"  />-->
		</form>
	</div>	

</body>
</html>

