<p>
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js"></script>
<script language="javascript" type="text/javascript">
		// <![CDATA[
function isNumberKey(evt) {
	var charCode = (evt.which) ? evt.which : event.keyCode
		if (charCode > 31 && (charCode < 48 || charCode > 57)) return false;
		return true;
}
function setPhone_STValue() {
	var p1_ST = document.getElementById('phone1_ST').value;
	var p2_ST = document.getElementById('phone2_ST').value;
        if(p1_ST== "" && p2_ST=="" ){
        	document.getElementById('phone_ST').value = p1_ST + "" + p2_ST;
        }
        else{
        	document.getElementById('phone_ST').value = p1_ST + "-" + p2_ST;
        }
}
function setMPhoneValue_ST(){
	var mp1_ST = document.getElementById('mphone1_ST').value;
	var mp2_ST = document.getElementById('mphone2_ST').value;
        if(mp1_ST== "" && mp2_ST=="" ){
               document.getElementById('rs_mobile_phone_st').value = mp1_ST + "" + mp2_ST;
        }
        else{
               document.getElementById('rs_mobile_phone_st').value = mp1_ST + "-" + mp2_ST;
        }
}
function setAddress_ST(){
	var ad1_ST = document.getElementById('add1_ST').value;
	var ad2_ST = document.getElementById('add2_ST').value;

	if(ad2_ST== ""){
                document.getElementById('address_ST').value = ad1_ST;
        }
        else{
	 	document.getElementById('address_ST').value = ad1_ST + " ," + ad2_ST;
	}
}
function validateForm_ST(){

	var fname_ST = document.getElementById('firstname_ST').value;
	var lname_ST = document.getElementById('lastname_ST').value;
	var add1_ST = document.getElementById('add1_ST').value;
	var add2_ST = document.getElementById('add2_ST').value;
	var ccode_ST = document.getElementById('country_code_ST').value;
	var scode_ST = document.getElementById('state_code_ST').value;
	var city_ST = document.getElementById('city_ST').value;
	var p1_ST = document.adminForm.phone1_ST.value
	var p2_ST = document.adminForm.phone2_ST.value
	var mp1_ST = document.adminForm.mphone1_ST.value
	var mp2_ST = document.adminForm.mphone2_ST.value
	var country_ST = $('#country_code_ST').val();

	if ((country_ST == 'PHL') && (fname_ST == "" || lname_ST == "" || add1_ST == "" || scode_ST == "" || city_ST == ""))
	{
		alert('Please fill-up all the required fields');
		return false;
	}
	else if ((country_ST != 'PHL') && (fname_ST == "" || lname_ST == "" || add1_ST == ""))
	{
		alert('Please fill-up all the required fields');
		return false;
	}
	else if (country_ST == '')
	{
		alert('Please fill-up all the required fields');
		return false;
	}
	else
	{
		var fields_ST = new Array(fname_ST,lname_ST,add1_ST,add2_ST,p1_ST,p2_ST,mp1_ST,mp2_ST);
	
		for (var i=0; i < fields_ST.length; i++) {
			if(fields_ST[i].match(/[\<\>!@#\$%^&\*,]+/i) ) {
				alert('Illegal characters not allowed!');
				return false;
			}
		}

		if (p1_ST=="" && p2_ST=="" && mp1_ST=="" && mp2_ST=="")
		{
			alert("Please provide at least one contact number")
			return false;
		}
		else if(mp1_ST=="" && mp2_ST=="" && (p1_ST.length < 2 || p2_ST.length < 7))
		{
			alert("Please provide valid landline number")
			return false;
		}
		else if(p1_ST=="" && p2_ST=="" && (mp1_ST.length < 4 || mp2_ST.length < 7))
		{
			alert("Please provide valid mobile phone number")
			return false;
		}

		if (p1_ST.length > 1 && p2_ST.length > 6)
		{
			if (mp1_ST != "" || mp2_ST != "")
			{
				if (mp1_ST.length < 4 || mp2_ST.length < 7)
				{
					alert("Please provide valid mobile phone number")
					return false;
				}
			}
		}

		if (mp1_ST.length > 3 && mp2_ST.length > 6)
		{
			if (p1_ST != "" || p2_ST != "")
			{
				if (p1_ST.length < 2 || p2_ST.length < 7)
				{
					alert("Please provide valid landline number")
					return false;
				}
			}
		}

		if (p1_ST != "" || p2_ST != "" && (mp1_ST == "" || mp2_ST == ""))
		{
			if (p1_ST.length < 2 || p2_ST.length < 7)
			{
				alert("Please provide valid landline number")
				return false;
			}
		}
		if (mp1_ST != "" || mp2_ST != "" && (p1_ST == "" || p2_ST == ""))
		{
			if (mp1_ST.length < 4 || mp2_ST.length < 7)
			{
				alert("Please provide valid mobile phone number")
				return false;
			}
		}
	}
}

$(document).ready(function(){
	$('#country_code_ST').change(function() {
		country_base_ST();
	});
	$('#state_code_ST').change(function() {
		$('#state_code_ST').attr('class', 'valid');
	});
	$('#city_ST').change(function() {
		$('#city_ST').attr('class', 'valid');
	});
	country_base_ST();
	dataLoader_ST();
});

function country_base_ST()
{
	var country_ST = $('#country_code_ST :selected').val();


	if(country_ST != 'PHL')
	{
		$('#div_state_txt_ST, #city-tr_ST').hide();
		$("#state_code_ST option[value='']").attr("selected", "selected");
		$("#city_ST option[value='']").attr("selected", "selected");
		$("#zipcode_ST option[value='']").attr("selected", "selected");
		$('#state_code_ST').val('');
		$('#city_ST').val('');
		$('#state_code_ST').attr('class', 'valid');
		$('#city_ST').attr('class', 'valid');
//		$('.error').hide();
	}
	else
	{
		$('#div_state_txt_ST, #city-tr_ST').show();
	}
}
function dataLoader_ST(){
var mpn_ST = document.getElementById('rs_mobile_phone_st').value;
var mpn1_ST = document.getElementById('mphone1_ST');
var mpn2_ST = document.getElementById('mphone2_ST');

var pn_ST = document.getElementById('phone_ST').value;
var pn1_ST = document.getElementById('phone1_ST');
var pn2_ST = document.getElementById('phone2_ST');

mpn1_ST.value = mpn_ST.slice(-12,-8);
mpn2_ST.value = mpn_ST.slice(-7);

pn1_ST.value = pn_ST.slice(-11,-8);
pn2_ST.value = pn_ST.slice(-7);

var add_ST = document.getElementById('address_ST').value;
var add1_ST = document.getElementById('add1_ST');
var add2_ST = document.getElementById('add2_ST');

var src_ST = add_ST.search(" ,");
	
var last_ST = add_ST.length;

if(src_ST=='-1'){
	add1_ST.value = add_ST;
}
else{
	add1_ST.value = add_ST.slice(0,src_ST);
	add2_ST.value = add_ST.slice(src_ST+2,last_ST);
}
var find = document.getElementById('prov_ST').value;

var dd = document.getElementById('state_code_ST');
	for (var i = 0; i < dd.options.length; i++) {
	    if (dd.options[i].value === find) {
		dd.selectedIndex = i;
		break;
	    }
	}

document.getElementById('Mobile Phone').style.display = "none";
}// ]]>
		
	</script>
</p>
<hr />
<p style="font-size: 10px;" align="right">*Required</p>
<table style="font-family:'Arial;',Verdana,Sans-serif;">
	<tbody>
		<tr>
			<td style="font-size: 11px;" colspan="2" align="left" width="100">{extra_field_st_start}{extra_field_st}{extra_field_st_end}</td>
		</tr>
	</tbody>
	<tbody>
		<tr>
			<td style="font-size: 11px;" align="left" width="100">{firstname_st_lbl}*</td>
			<td style="font-size: 11px;" width="265">: {firstname_st}</td>
			<td></td>
		</tr>
		<tr>
			<td style="font-size: 11px;" align="left" width="100">{lastname_st_lbl}*</td>
			<td style="font-size: 11px;" width="265">: {lastname_st}</td>
			<td></td>
		</tr>
		<!--<tr>
			<td align="left" width="100">{address_st_lbl}*</td>
			<td width="265">: {address_st}</td>
			<td></td>
		</tr>-->
		<tr>
			<td style="font-size: 11px;" align="left" width="100">{country_st_lbl}*</td>
			<td style="font-size: 11px;" width="265">: {country_st}</td>
			<td></td>
		</tr>
		<tr>
			<td style="font-size: 11px;" align="left" width="100">{address_st_lbl}*</td>
			<td style="font-size: 11px;" width="265">: <input type="text" class="inputbox required" name=add1_ST autocomplete="off" id=add1_ST size=31 maxlength=30 onchange="javascript:setAddress_ST();"></td>
			<td></td>
		</tr>
		<tr>
			<td style="font-size: 11px;" align="left" width="100"></td>
			<td style="font-size: 11px;" width="265">: <input type="text" name=add2_ST autocomplete="off" id=add2_ST size=31 maxlength=30 onchange="javascript:setAddress_ST();"></td>
			<td></td>
		</tr>
{source}<?php require('droppass_2.php'); ?>{/source}
		<tr id="city-tr_ST">
			<td style="font-size: 11px;" align="left" width="100">{city_st_lbl}*</td>
			<td style="font-size: 11px;" width="265">: {city_st}</td>
			<td></td>
		</tr>
		<tr id="zip-tr_ST">
			<td style="font-size: 11px;" align="left" width="100">{zipcode_st_lbl} *</td>
			<td style="font-size: 11px;" width="265">: {zipcode_st}</td>
			<td></td>
		</tr>
		<tr>
			<td> </td>
		</tr>
		<tr>
			<td style="font-size: 11px;" colspan=2>Contact Number(s)**</td>
		</tr>
		<tr>
			<td style="font-size: 11px;" align="left" width="100">Landline</td>
			<td style="font-size: 11px;" width="265">: <input name="phone1_ST" autocomplete="off" id="phone1_ST" size="4" maxlength="3" onchange="javascript:setPhone_STValue();" onkeypress="return isNumberKey(event)" type="text" /> - <input name="phone2_ST" autocomplete="off" id="phone2_ST" size="9" maxlength="7" onchange="javascript:setPhone_STValue();" onkeypress="return isNumberKey(event)" type="text" />
			</td>
			<td>
				<div style="display: none;">{phone_st}</div>
			</td>
		</tr>
		<tr>
			<td width="100"></td>
			<td style="font-size: 8px; color: blue; padding-left: 30px;" align="left">(Area Code - Phone Number) ex. 02-1234567 </td>
		</tr>
		<tr>
			<td style="font-size: 11px;" align="left" width="100">Mobile Phone </td>
			<td style="font-size: 11px;">: <input id="mphone1_ST" onkeypress="return isNumberKey(event)" name="mphone1_ST" autocomplete="off" size="4" maxlength="4" onchange="javascript:setMPhoneValue_ST();" type="text" /> - <input id="mphone2_ST" onkeypress="return isNumberKey(event)" name="mphone2_ST" autocomplete="off" size="9" maxlength="7" onchange="javascript:setMPhoneValue_ST();" type="text" /></td>
<td>
</td>
</tr>
		<tr>
			<td width="100"></td>
			<td style="font-size: 8px; color: blue; padding-left: 30px;" align="left">(Prefix Code - Phone Number) ex. 09XX-1234567 </td>
		</tr>
		<tr>
			<td style="font-size: 10px;" colspan=2>** At least one contact number is required</td>
		</tr>
	</tbody>
</table>
<table border="0">
	<tbody>
		<tr>
			<td align="left" width="100"></td>
			<td width="255"></td>
			<td></td>
		</tr>
		<tr>
			<td align="left" width="100"></td>
			<td width="255"></td>
			<td></td>
		</tr>
	</tbody>
</table>
<div style="display: none;">{address_st}</div>
<div style="display: none;">{province_st}</div>     
