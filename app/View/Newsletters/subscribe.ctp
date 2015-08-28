<?php include("crumbs.php");

$this->pageTitle = "eNewsletter - Subscribe";
?>



<script language="Javascript" type="text/javascript">


function checkform() {

   apos = document.subscribeform.elements['email'].value.indexOf("@");
   if ( (eval("document.subscribeform.elements['email'].value") == "") || (apos < 1)) {
	alert("Please enter a valid email address (example: johnd@some.com)");
	eval("document.subscribeform.elements['email'].focus()");
	return false;
   }


    if (eval("document.subscribeform.elements['emailconfirm'].value") == "") {
	alert("Please enter your email address again.");
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

var fieldstocheck = new Array();
var fieldnames = new Array();

function addFieldToCheck(value,name) {
  fieldstocheck[fieldstocheck.length] = value;
  fieldnames[fieldnames.length] = name;
}

var groupstocheck = new Array();
var groupnames = new Array();

function addGroupToCheck(value,name) {
  groupstocheck[groupstocheck.length] = value;
  groupnames[groupnames.length] = name;
}

function compareEmail()
{
  return (document.subscribeform.elements["email"].value == document.subscribeform.elements["emailconfirm"].value);
}


</script>


<div id="page_header">
	<div class="opening"></div>
	<div class="details">
		<h1>Subscribe To Our eNewsletter </h1>
	</div>
	<div class="closing"></div>
</div>

<div id="page_content">
	<div class="opening"></div>
	<div class="details">
	<div style="display: none !important;"><h2>Subscribe</h2></div>
	<!--	<div class="intro"> Due to the system maintenance, VPL's eNewsletter is temporarily unavailable. Please check back later. Thank you for your patience! </div>-->

	<?php if ($confirmed != 1) { ?>
		<div class="intro">Sign up for VPL's eNewsletter: The Buzz!  Get information about VPL's programs, services, announcements, author visits, Staff Picks and more delivered to your inbox!</div>




		<form method="post" name="subscribeform" action="http://newsletter.vaughanpl.info/lists/?p=subscribe">
			<div class="whole_width">

			  <div class="field">
				  <div class="field_label"><label for="email">Email</label></div>
				  <div class="field_input"><input type="text" name="email" id="email" value="" size="40" /><script language="Javascript" type="text/javascript">addFieldToCheck("email","Email");</script></div>
			  </div>
			  <div class="field">
				<div class="field_label"><label for="emailconfirm">Confirm your email address</label></div>
				<div class="field_input"><input type="text" name="emailconfirm" id="emailconfirm" value="" size="40" />
				    <script language="Javascript" type="text/javascript">addFieldToCheck("emailconfirm","Confirm your email address");</script>
				</div>
			 </div>

			<input type="hidden" name="htmlemail" value="1" />
			<input type="hidden" name="list[1]" value="signup" />
			<input type="hidden" name="listname[1]" value="The Buzz"/>


			<div style="display:none">

			<label for="VerificationCodeX">Vorification Codex</label><input type="text" name="VerificationCodeX" id="VerificationCodeX" value="" size="20" />

			</div>

			<input type="submit" name="subscribe" class="submit_button" value="Subscribe" onclick="return checkform();" />

		      </div>

		      <div id="newsletter_spacer">&nbsp;</div>
		</form>



		<div class="newsletternotes"><strong>Notes:</strong>
		<ol>
		<li>To ensure delivery of the eNewsletter, please add vpl_newsletter@vaughan.ca to your email address book.</li>

		<li>You may unsubscribe from VPL's eNewsletter at any time by clicking on the unsubscribe link found in each issue.</li>

		<li>Privacy: Personal information on this form is collected under the authority of the Freedom of Information and Protection of Privacy Act, 1990,  MFIPPA\Regulation 29 and will be used for the purpose of circulating an electronic newsletter. Questions regarding the collection of this information should be directed to the Director of Service Delivery.  Freedom of Information Requests should be mailed to: Vaughan Public Libraries Administration Offices 900 Clark Avenue W., Thornhill, ON  L4J 8C1.</li>
		</ol>
		</div>


		&nbsp;

		<?php } else { ?>

		<div class="entry">
		Thank you for confirming your subscription to our eNewsletter: The Buzz!
		</div>
		<?php } ?>

	</div>
	<div class="closing"></div>
</div>