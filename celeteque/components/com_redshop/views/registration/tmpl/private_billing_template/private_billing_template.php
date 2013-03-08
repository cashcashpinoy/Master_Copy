<p>
<link rel="stylesheet" href="http://code.jquery.com/ui/1.10.0/themes/base/jquery-ui.css" />
<script src="http://code.jquery.com/jquery-1.8.3.js"></script>
<script src="http://code.jquery.com/ui/1.10.0/jquery-ui.js"></script>
<!--<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js"></script>-->
<script language="javascript" type="text/javascript">// <![CDATA[
function isNumberKey(evt)
{
         var charCode = (evt.which) ? evt.which : event.keyCode
         if (charCode > 31 && (charCode < 48 || charCode > 57))
         	return false;
         return true;
}
function setPhoneValue()
{
	var p1 = document.getElementById('phone1').value;
	var p2 = document.getElementById('phone2').value;
	if(p1== "" && p2=="" ){
		document.getElementById('phone').value = p1 + "" + p2;
	}
	else{
		document.getElementById('phone').value = p1 + "-" + p2;
	}
}
function setMPhoneValue()
{
	var mp1 = document.getElementById('mphone1').value;
	var mp2 = document.getElementById('mphone2').value;
	if(mp1== "" && mp2=="" ){
		document.getElementById('rs_mobile_phone').value = mp1 + "" + mp2;
	}
	else{
		document.getElementById('rs_mobile_phone').value = mp1 + "-" + mp2;
	}
}

function setAddress()
{
	var ad1 = document.getElementById('add1').value;
	var ad2 = document.getElementById('add2').value;
	if(ad2== ""){
               	document.getElementById('address').value = ad1;
        }
        else{
		document.getElementById('address').value = ad1 + " ," + ad2;
	}
}

function validateForm(){

	var email = document.getElementById('email1').value;
	var fname = document.getElementById('firstname').value;
	var lname = document.getElementById('lastname').value;
	var add1 = document.getElementById('add1').value;
	var add2 = document.getElementById('add2').value;
	var ccode = document.getElementById('country_code').value;
	var scode = document.getElementById('state_code').value;
	var city = document.getElementById('city').value;
	var bdayv = document.getElementById('rs_birthday').text;
	var p1 = document.adminForm.phone1.value
	var p2 = document.adminForm.phone2.value
	var mp1 = document.adminForm.mphone1.value
	var mp2 = document.adminForm.mphone2.value

	if ((ccode == 'PHL') && (email == "" || fname == "" || lname == "" || add1 == "" || ccode == "" || scode == "" || city == ""))
	{
		alert('Please fill-up all the required fields');
		return false;
	}
	else if ((ccode != 'PHL') && (email == "" || fname == "" || lname == "" || add1 == "" || ccode == "" ))
	{
		alert('Please fill-up all the required fields');
		return false;
	}
	else if (ccode == '')
	{
		alert('Please fill-up all the required fields');
		return false;
	}
	else
	{
		var fields = new Array(fname,lname,add1,add2,p1,p2,mp1,mp2);
	
		for (var i=0; i < fields.length; i++) {
			if(fields[i].match(/[\<\>!@#\$%^&\*,]+/i) ) {
				alert('Illegal characters not allowed!');
				return false;
			}
		}

		if (p1=="" && p2=="" && mp1=="" && mp2=="")
		{
			alert("Please provide at least one contact number")
			return false;
		}
		else if(mp1=="" && mp2=="" && (p1.length < 2 || p2.length < 7))
		{
			alert("Please provide valid landline number")
			return false;
		}
		else if(p1=="" && p2=="" && (mp1.length < 4 || mp2.length < 7))
		{
			alert("Please provide valid mobile phone number")
			return false;
		}

		if (p1.length > 1 && p2.length > 6)
		{
			if (mp1 != "" || mp2 != "")
			{
				if (mp1.length < 4 || mp2.length < 7)
				{
					alert("Please provide valid mobile phone number")
					return false;
				}
			}
		}

		if (mp1.length > 3 && mp2.length > 6)
		{
			if (p1 != "" || p2 != "")
			{
				if (p1.length < 2 || p2.length < 7)
				{
					alert("Please provide valid landline number")
					return false;
				}
			}
		}

		if (p1 != "" || p2 != "" && (mp1 == "" || mp2 == ""))
		{
			if (p1.length < 2 || p2.length < 7)
			{
				alert("Please provide valid landline number")
				return false;
			}
		}

		if (mp1 != "" || mp2 != "" && (p1 == "" || p2 == ""))
		{
			if (mp1.length < 4 || mp2.length < 7)
			{
				alert("Please provide valid mobile phone number")
				return false;
			}
		}
		
		if (bdayv != "")
		{
			var bDv = bdayv.split('-');
			if(bDv.length != 3)
			{
				alert("Please provide valid birthday format")
				return false;
			}
		}
	}
}
$(document).ready(function(){

	$("#rs_age").attr("size", "5");
	$("#rs_age").attr('readonly', true);
	$("#rs_birthday").attr('readonly', true);
	$("#Age").hide();

	Calendar.prototype.callCloseHandler = function () {
		if (this.onClose) {
			this.onClose(this);
			computeAge();
		}
		this.hideShowCovered();
	};

	$("#rs_birthday").change(function(){
		computeAge();
	});

	$("#rs_birthday_img").css("verticalAlign","middle");
	$('#country_code').change(function() {
		country_base();
	});
	country_base();
	dataLoader();
});

function country_base()
{
	var country = $('#country_code').val();
		
	if(country != 'PHL')
	{
		$('#div_state_txt, #city-tr').hide();
		$("#state_code option[value='']").attr("selected", "selected");
		$("#city option[value='']").attr("selected", "selected");
		$("#zipcode option[value='']").attr("selected", "selected");
		$('#state_code').val('');
		$('#city').val('');
	}
	else
	{
		$('#div_state_txt, #city-tr').show();
	}
}

function computeAge(){
	var bday = $("#rs_birthday").val();
	var bD = bday.split('-');
	if(bD.length == 3)
	{
		var born = new Date (bD[2], bD[1] * 1 - 1, bD[0]);
		var now = new Date();
		var years = Math.floor((now.getTime() - born.getTime()) / (365.25 * 24 * 60 * 60 * 1000));
		if (years < 0)
		{
			alert("Please provide valid birthday")
			$('#rs_birthday').val("");
			return false;
		}
		else
		{
			$('#rs_age').val(years);
		}
	}
}

function dataLoader(){

	var mpn = document.getElementById('rs_mobile_phone').value;
	var mpn1 = document.getElementById('mphone1');
	var mpn2 = document.getElementById('mphone2');

	var pn = document.getElementById('phone').value;
	var pn1 = document.getElementById('phone1');
	var pn2 = document.getElementById('phone2');

	mpn1.value = mpn.slice(-12,-8);
	mpn2.value = mpn.slice(-7);

	pn1.value = pn.slice(-11,-8);
	pn2.value = pn.slice(-7);

	var add = document.getElementById('address').value;
	var add1 = document.getElementById('add1');
	var add2 = document.getElementById('add2');

	var src = add.search(" ,");
	
	var last = add.length;

	if(src=='-1'){
		add1.value = add;
	}
	else{
		add1.value = add.slice(0,src);
		add2.value = add.slice(src+2,last);
	}
	var find = document.getElementById('prov').value;

	var dd = document.getElementById('state_code');
		for (var i = 0; i < dd.options.length; i++) {
		    if (dd.options[i].value === find) {
			dd.selectedIndex = i;
			break;
		    }
		}

	//document.getElementsByTagName("label")[0].style.display = "none";
	document.getElementById('Mobile Phone').style.display = "none";

}
// ]]></script>
</p>

<table style="width: 368px; font-family:'Arial;',Verdana,Sans-serif;" class="admintable" border="0">
	<tbody>
		<tr>
			<td style="text-align: left; font-size: 11px;" align="right" width="75">{email_lbl} *</td>
			<td style="font-size: 11px;">: {email}</td>
			<td></td>
		</tr>
		<!-- {retype_email_start} -->
		<tr>
			<td style="text-align: left; font-size: 11px;" align="right" width="75">{retype_email_lbl} *</td>
			<td>{retype_email}</td>
			<td></td>
		</tr>
		<!-- {retype_email_end} -->
		<tr>
			<td style="text-align: left; font-size: 11px;" align="right" width="75">{firstname_lbl} *</td>
			<td style="font-size: 11px;">: {firstname}</td>
			<td></td>
		</tr>
		<tr>
			<td style="text-align: left; font-size: 11px;" align="right" width="75">{lastname_lbl} *</td>
			<td style="font-size: 11px;">: {lastname}</td>
			<td></td>
		</tr>
		<!--<tr>
			<td style="text-align: left; font-size: 11px" align="right" width="75">{address_lbl} *</td>
			<td>: {address}</td>
			<td></td>
		</tr>-->
		<tr id="{country_txtid}">
			<td style="text-align: left; font-size: 11px;" align="right" width="100">{country_lbl} *</td>
			<td style="font-size: 11px;">: {country}</td>
			<td></td>
		</tr>
		<tr>
			<td style="text-align: left; font-size: 11px;" align="right" width="75">{address_lbl} *</td>
			<td style="font-size: 11px;">: <input type="text" class="inputbox required" autocomplete="off" name=add1 id=add1 size=31 maxlength=30 onchange="javascript:setAddress();"></td>
<!--HINT-->
<!--onfocus="if(this.value=='Enter Street number here')this.value=''" onblur="if(this.value=='')this.value='Enter Street number here'"-->
			<td></td>
		</tr>
		<tr>
			<td style="text-align: left; font-size: 11px;" align="right" width="75"></td>
			<td style="font-size: 11px;">: <input type="text" autocomplete="off" name=add2 id=add2 size=31 maxlength=250 onchange="javascript:setAddress();"></td>
			<td></td>
		</tr>
		{source}
		<?php 
		require_once('droppass.php');
		?>
		{/source}
		<div id="nextcity">
			<tr id="city-tr">
				<td style="text-align: left; font-size: 11px;" align="right" width="100">{city_lbl} *</td>
				<td style="font-size: 11px;">: {city}</td>
			</tr>
		</div>
		<div id="nextzip">
			<tr>
				<td style="text-align: left; font-size: 11px;" align="right" width="100">{zipcode_lbl} *</td>
				<td style="font-size: 11px;">: {zipcode}</td>
			</tr>
		</div>
		<tr>
			<td> </td>
		</tr>

		<tr>
			<td style="font-size: 11px;" colspan=2>Additional Information:</td>
		</tr>
		<tr>
			<td>{private_extrafield}</td>
		</tr>
		<tr>
			<td> </td>
		</tr>

		<tr>
			<td style="font-size: 11px;" colspan=2>Contact Number(s)**</td>
		</tr>

		<tr>
			<td  style="text-align: left; font-size: 11px;" align="right" width="100">Landline</td>
			<td style="font-size: 11px;">: <input id="phone1" onkeypress="return isNumberKey(event)" name="phone1" autocomplete="off" size="4" maxlength="3" onchange="javascript:setPhoneValue();" type="text" /> - <input id="phone2" onkeypress="return isNumberKey(event)" name="phone2" autocomplete="off" size="9" maxlength="7" onchange="javascript:setPhoneValue();" type="text" /></td>
			<td>
				<div style="display: none;">{phone}</div>
			</td>
		</tr>
		<tr>
			<td width="100"></td>
			<td style="font-size: 8px; color: blue; padding-left: 30px;" align="left">(Area Code - Phone Number) ex. 02-1234567 </td>
		</tr>
		<tr>
			<td style="text-align: left; font-size: 11px" align="right" width="100">Mobile Phone </td>
			<td style="font-size: 11px;">: <input id="mphone1" onkeypress="return isNumberKey(event)" name="mphone1" autocomplete="off" size="4" maxlength="4" onchange="javascript:setMPhoneValue();" type="text" /> - <input id="mphone2" onkeypress="return isNumberKey(event)" name="mphone2" autocomplete="off" size="9" maxlength="7" onchange="javascript:setMPhoneValue();" type="text" /></td>
		</tr>
		<tr>
			<td width="100"></td>
			<td style="font-size: 8px; color: blue; padding-left: 30px;" align="left">(Prefix Code - Phone Number) ex. 09XX-1234567 </td>
		</tr>
		<tr>
			<td> </td>
		</tr>
		<tr>
			<td style="font-size: 10px;" colspan=2>** At least one contact number is required</td>
		</tr>
	</tbody>
</table>
<div style="display: none;">{address}</div>
<div style="display: none;">{province}</div>
