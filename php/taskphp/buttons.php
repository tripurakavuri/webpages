<?php
function get_buttons()
{
$str='';
$btns=array(

1=>'Save',
2=>'Delete',
3=>'Edit',

);
while (list($k,$v)=each($btns))
{
	$str.='&nbsp;<input type="submit" value='.$v.'" name="btn_'.$k.'" id="btn_'.$k.'"/>';
}
return $str;

}
?>

<!DOCTYPE html>
<html>
	<head>
	</head>
	<body>
		<div id="buttons_panel">
			<?php echo get_buttons(); ?>
		</div>
	</body>
</html>
