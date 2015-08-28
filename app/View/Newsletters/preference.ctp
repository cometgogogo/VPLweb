<?php include("crumbs.php");
$this->pageTitle = "eNewsletter - Update Your Preferences";
?>



<script language="Javascript" type="text/javascript">

var fieldstocheck = new Array();
    fieldnames = new Array();

/*
function checkform() {
  for (i=0;i<fieldstocheck.length;i++) {
    if (eval("document.subscribeform.elements['"+fieldstocheck[i]+"'].value") == "") {
      alert("Please enter your "+fieldnames[i]);
      eval("document.subscribeform.elements['"+fieldstocheck[i]+"'].focus()");
      return false;
    }
  }

  if(! compareEmail())
  {
    alert("Email addresses you entered do not match");
    return false;
  }
  return true;
}*/

function checkform() {

   apos = document.subscribeform.elements['currentemail'].value.indexOf("@");
   if ( (eval("document.subscribeform.elements['currentemail'].value") == "") || (apos<1)) {
	alert("Please enter a valid email address (example: johnd@some.com)");
	eval("document.subscribeform.elements['currentemail'].focus()");
	return false;
   }

   apos = document.subscribeform.elements['email'].value.indexOf("@");
   if ( (eval("document.subscribeform.elements['email'].value") == "") || (apos<1)) {
	alert("Please enter a valid new email address (example: johnd@some.com)");
	eval("document.subscribeform.elements['email'].focus()");
	return false;
   }
    if (eval("document.subscribeform.elements['emailconfirm'].value") == "") {
	alert("Please enter your new email address again.");
	eval("document.subscribeform.elements['emailconfirm'].focus()");
	return false;
   }

   if(! compareEmail())
   {
	alert("The email addresses you entered do not match");
	return false;
   }
   return true;
}

function addFieldToCheck(value,name) {
  fieldstocheck[fieldstocheck.length] = value;
  fieldnames[fieldnames.length] = name;
}

function compareEmail()
{
  return (document.subscribeform.elements["email"].value == document.subscribeform.elements["emailconfirm"].value);
}


</script>





<div id="page_header">
	<div class="opening"></div>
	<div class="details">
		<h1>Update Your Preferences</h1>
	</div>
	<div class="closing"></div>
</div>

<div id="page_content">
	<div class="opening"></div>
	<div class="details">
		<!--<div class="intro">Due to the system maintenance, VPL's eNewsletter is temporarily unavailable. Please check back later. Thank you for your patience! </div>
		-->

	<?php
		if ($update == 1) {

			echo "<div class=intro>Thanks for updating your information. Your email address has been changed. You will receive an email with the changes. Please visit the link in the email you will receive to confirm your new email address.</div>";

		} else if($update == 0) {


		?>
		<div class="entry">To change the email address to which you receive VPL's eNewsletter, please complete the form below and click on the update button.</div>
			<form method=post name="subscribeform" action="http://newsletter.vaughanpl.info/lists/?p=preferences&uid=<?php echo $uniqID; ?>">

			<div class="whole_width">

			<fieldset>
			<div class="field">
				  <div class="field_label">Current email address:</div>
				  <div class="field_input"><input type="text" readonly="readonly" name="currentemail" value="<?php echo $email;?>" size="40"></div>
			</div>
			<div class="field">
				<div class="field_label">New email address:</div>
				<div class="field_input"><input type=text name=email value="" size="40"><script language="Javascript" type="text/javascript">addFieldToCheck("email","Email");</script></div>
			</div>
			<div class="field">
				<div class="field_label">Confirm new email address:</div>
				<div class="field_input"><input type=text name=emailconfirm value="" size="40"><script language="Javascript" type="text/javascript">addFieldToCheck("emailconfirm","Confirm your email address");</script></div>
			</div>

			<div style="display:none">
			        <span class="attributeinput"><input type=checkbox name="htmlemail" value="1" checked /></span>
			        <span class="attributename">I prefer to receive emails in HTML format</span>
			 </div>


			<input type="hidden" name="list[1]" value="signup"><input type="hidden" name="listname[1]" value="sandbox"/>
			<input type=submit name="update" class="submit_button" value="Update" onClick="return checkform();">

			</div>
			<div id="newsletter_spacer">&nbsp;</div>

			</form>
		<?php
		}
		?>





		&nbsp;
	</div>
	<div class="closing"></div>
</div>