<?php echo $javascript->link('jquery-1.3.2'); ?>
<?php echo $javascript->link('fullcalendar.min'); ?>


<?php echo $javascript->link('ui.core'); ?>
<?php echo $javascript->link('ui.draggable'); ?>
<?php echo $javascript->link('ui.resizable'); ?>

<script type="text/javascript" src="/js/slideMenus.js"></script>
<script type="text/javascript" src="/js/externallinks.js"></script>


<script type="text/javascript">
	function do_on_load() {try {onLoad();} catch (ex) {} externalLinks(); confirmMobile('<?php echo $mobile; ?>'); 	}
</script>



<script  type="text/javascript" >AC_FL_RunContent = 0;</script>
<script src="/js/AC_RunActiveContent.js" type="text/javascript" ></script>

<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-26049711-2']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>

<script type="text/javascript">
<!--
function confirmMobile(isMobile) {
	if (isMobile) {
		var answer = confirm("You're using a mobile device. Would you like to visit the mobile version of VPL website?")
		if (answer){
			window.location = "http://m.vaughanpl.info";
		}
	}
}
//-->
</script>

 <?php
echo $javascript->link('jquery/jquery-1.5.2.min');
echo $skitter->includeFiles();
?>

<script type="text/javascript" src="/js/jquery.twitter.js"></script>


<script type="text/javascript">
			$(document).ready(function() {
				$("#twitter").getTwitter({
					userName: "vaughanpl",
					numTweets: 5,
					loaderText: "Loading tweets...",
					slideIn: true,
					slideDuration: 750,
					showHeading: true,
					headingText: "",
					showProfileLink: false,
					showTimestamp: true,
					includeRetweets: true,
					excludeReplies: false
				});
			});


</script>

    <script type="text/javascript">

    jQuery(function() {
      jQuery.support.placeholder = false;
      test = document.createElement('input');
      if('placeholder' in test) jQuery.support.placeholder = true;
    });
    // This adds placeholder support to browsers that wouldn't otherwise support it.
    $(function() {
      if(!$.support.placeholder) {
       var active = document.activeElement;
       $(':text').focus(function () {
         if ($(this).attr('placeholder') != '' && $(this).val() == $(this).attr('placeholder')) {
          $(this).val('').removeClass('hasPlaceholder');
         }
       }).blur(function () {
         if ($(this).attr('placeholder') != '' && ($(this).val() == '' || $(this).val() == $(this).attr('placeholder'))) {
          $(this).val($(this).attr('placeholder')).addClass('hasPlaceholder');
         }
       });
       $(':text').blur();
       $(active).focus();
       $('form:eq(0)').submit(function () {
         $(':text.hasPlaceholder').val('');
       });
      }
    });
    </script>
    <style type='text/css'>
    .hasPlaceholder {
      color: #777;
    }
    </style>

<script type="text/javascript" src="/js/ui/ui.core.js"></script>
<script type="text/javascript" src="/js/ui/ui.tabs.js"></script>

<script type="text/javascript">
   $(function() {
       $("#tabs").tabs();
   });
</script>

<script language="javascript" type="text/javascript">
	function toggleMin(id){
		var style = document.getElementById(id).style;
		style.display = (style.display=="block") ? "none":"block";
	}
</script>