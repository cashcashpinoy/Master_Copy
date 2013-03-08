<?php

define( '_JEXEC', 1 );
define( 'DS', DIRECTORY_SEPARATOR );
define( 'JPATH_BASE', $_SERVER[ 'DOCUMENT_ROOT' ] );

require_once( JPATH_BASE . DS . 'includes' . DS . 'defines.php' );
require_once( JPATH_BASE . DS . 'includes' . DS . 'framework.php' );
require_once( JPATH_BASE . DS . 'libraries' . DS . 'joomla' . DS . 'factory.php' );
$mainframe =& JFactory::getApplication('site');

$db = JFactory::getDBO();
?>

<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js"></script>
<script type="text/javascript">
$(document).ready(function(){
	/*$("#city_ST").change(function(){
	    var provId=$("#state_code_ST option:selected").text();
	    var cityId=$("#city_ST").val();
	    $.ajax({
	      url: 'dropdownzip_2.php?idzip='+cityId+'&idprov='+provId,
	      success: function(data) {
	       $("#zipcode_ST").html(data);      
	      }
	    });
	});
 $.getScript("https://ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js");*/
	$("#state_code_ST").change(function(){
	    var stateId=$("#state_code_ST").val();
	    //$.ajax({
	     //url: 'dropdownlist.php?idcity='+stateId,
	      //success: function(data) {
		$.get('dropdownlist_2.php', {idcity:stateId}, function(data){
		//alert(data);
	       $("#city_ST").html(data);      
	    });
	});

});
</script>
<tr id="div_state_txt_ST">
	<td style="text-align: left; font-size: 11px;">Province *</td>
	<td style="font-size: 11px;">: <select name="state_code_ST" id="state_code_ST" class="inputbox billingRequired valid">
<?php	   echo '<option value="" selected="selected">Select Province</option>';

$query= "SELECT * FROM jml_redshop_state";
$database->setQuery($query);
$result = $database->query();

	while($row=mysqli_fetch_array($result, MYSQL_ASSOC))
	{
	$prov = $row['state_name'];
	$pcode = $row['state_2_code'];
	echo '<option value="'.$pcode.'">'.$prov.'</option>';
	}
?>
	</select></td>
	</tr>

