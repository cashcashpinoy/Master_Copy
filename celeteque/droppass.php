<?php
define( '_JEXEC', 1 );
define('JPATH_BASE', dirname(__FILE__));
define( 'DS', DIRECTORY_SEPARATOR );
require_once('configuration.php');
require_once ( JPATH_BASE .DS.'includes'.DS.'defines.php' );
require_once ( JPATH_BASE .DS.'includes'.DS.'framework.php' );
$mainframe =& JFactory::getApplication('site');
$mainframe->initialise();
/* If you need to use database object, add following line too */
// use this $db object for database related operation

$option = array(); //prevent problems
 
$option['driver']   = $dbtype;            // Database driver name
$option['host']     = $host;    // Database host name
$option['user']     = $user;       // User for database authentication
$option['password'] = $password;   // Password for database authentication
$option['database'] = $db;      // Database name
$option['prefix']   = '';             // Database prefix (may be empty)
 
$db = & JDatabase::getInstance( $option );

$database=&JFactory::getDBO();

?>

<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js"></script>
<script type="text/javascript">
$(document).ready(function(){
	/*$("#city").change(function(){
	//alert("asda");
	    var provId=$("#state_code option:selected").text();
	    var cityId=$("#city").val();
	    $.ajax({
	      url: 'dropdownzip.php?idzip='+cityId+'&idprov='+provId,
	      success: function(data) {
		//alert(data);
	       $("#zipcode").html(data);      
	      }
	    });
	});
 $.getScript("https://ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js");*/
	$("#state_code").change(function(){
	    var stateId=$("#state_code").val();
	    //$.ajax({
	     //url: 'dropdownlist.php?idcity='+stateId,
	      //success: function(data) {
		$.get('dropdownlist.php', {idcity:stateId}, function(data){
		//alert(data);
	       $("#city").html(data);      
	    });
	});
	document.getElementById('state_code').options[this.selectedIndex].innerHTML=document.getElementById('province').options[this.selectedIndex].innerHTML;
});
</script>



<?php
$query= "SELECT * FROM jml_redshop_state";
$database->setQuery($query);
$result = $database->query();
?>

<tr id="div_state_txt">
	<td style="text-align: left; font-size: 11px;">Province *</td>
	<td style="font-size: 11px;">: <select name="state_code" id="state_code" class="inputbox required">
<?php	
	echo '<option value="">Select Province</option>';   
	//echo '<option value="'.@$post ["state_code"].'" selected="selected">'.@$post ["state_code"].'</option>';

	while($row=mysqli_fetch_array($result, MYSQL_ASSOC))
	{
	$prov = $row['state_name'];
	$pcode = $row['state_2_code'];
	echo '<option value="'.$pcode.'">'.$prov.'</option>';
	}
?>
	</select></td>
	</tr>


