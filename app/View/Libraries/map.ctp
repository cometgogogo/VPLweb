<?php $this->Html->addCrumb("Home" , "/"); ?>
<?php $this->Html->addCrumb("About Vaughan Public Libraries" , "/about"); ?>
<?php $this->Html->addCrumb("Locations and Hours" , "/libraries"); ?>
<?php 
$this->pageTitle = "Vaughan Public Libraries Map";
?>

<script src="http://maps.google.com/maps?file=api&amp;v=2&amp;key=ABQIAAAAiMRy-eDD5dQIRMm666-j6hQ1M6fE_u6zZny_pE_LENp4qbtZjRT7sfYUgxUO6l6tgT6hbzEvmk_yjg" type="text/javascript"></script>

<script type="text/javascript">
//<![CDATA[
function onLoad() {

	// geolocations
	// AN: 43.800269,-79.563782
	// BCRL: 43.802999,-79.451520
	// DC: 43.798306,-79.467937
	// KL: 43.839750,-79.624409
	// MA: 43.859638,-79.513660
	// PBRL: 43.817766,-79.596784
	// WO: 43.784676,-79.593683
	// PL: 43.8329268,-79.474438,17z

	//maps.google.com/maps/geo?q=hwy+400+and+rutherford+road,+vaughan,+on,+ca&key=ABQIAAAAiMRy-eDD5dQIRMm666-j6hQ1M6fE_u6zZny_pE_LENp4qbtZjRT7sfYUgxUO6l6tgT6hbzEvmk_yjg&output=csv

	if (GBrowserIsCompatible()) {

		var baseIcon = new GIcon();
		baseIcon.shadow = "http://www.google.com/mapfiles/shadow50.png";
		baseIcon.iconSize = new GSize(25, 20);
		baseIcon.shadowSize = new GSize(37, 34);
		baseIcon.iconAnchor = new GPoint(9, 34);
		baseIcon.infoWindowAnchor = new GPoint(9, 2);
		baseIcon.infoShadowAnchor = new GPoint(18, 25);

		function createMarker(point,html) {

			var icon = new GIcon(baseIcon);
			icon.image = "/img/icon-vpl.gif";

			var marker = new GMarker(point, icon);
			GEvent.addListener(marker, "click", function() {
			  marker.openInfoWindowHtml(html);
			});
			return marker;
		}

		// Display the map, with some controls and set the initial location
		var map = new GMap2(document.getElementById("map"));
		map.addControl(new GLargeMapControl());
		map.addControl(new GMapTypeControl());
		map.setCenter(new GLatLng(43.817890,-79.540210),12);

		// Set up three markers with info windows

		var point = new GLatLng(43.795309,-79.562807);
		var marker = createMarker(point,'<div style="width:200px; font-size:7pt"><a href="/libraries/view/1">Ansley Grove Library</a><br/>350 Ansley Grove Road<br/>Woodbridge, Ontario L4L 5C9<br/>Telephone: (905) 653-READ (7323)</div>')
		map.addOverlay(marker);

		var point = new GLatLng(43.802999,-79.451520);
		var marker = createMarker(point,'<div style="width:200px; font-size:7pt"><a href="/libraries/view/2">Bathurst Clark Resource Library</a><br/>900 Clark Avenue West<br/>Thornhill, Ontario L4J 8C1<br/>Telephone: (905) 653-READ (7323)</div>')
		map.addOverlay(marker);

		var point = new GLatLng(43.798306,-79.467937);
		var marker = createMarker(point,'<div style="width:200px; font-size:7pt"><a href="/libraries/view/3">Dufferin Clark Library</a><br/>1441 Clark Avenue West<br/>Thornhill, Ontario L4J 7R4<br/>Telephone: (905) 653-READ (7323)</div>')
		map.addOverlay(marker);

		var point = new GLatLng(43.839750,-79.624409);
		var marker = createMarker(point,'<div style="width:200px; font-size:7pt"><a href="/libraries/view/5">Kleinburg Library</a><br/>10341 Islington Avenue<br/>Kleinburg, Ontario L0J 1C0<br/>Telephone: (905) 653-READ (7323)</div>')
		map.addOverlay(marker);

		var point = new GLatLng(43.859638,-79.513660);
		var marker = createMarker(point,'<div style="width:200px; font-size:7pt"><a href="/libraries/view/6">Maple Library</a><br/>10190 Keele Street<br/>Maple, Ontario L6A 1G3<br/>Telephone: (905) 653-READ (7323)</div>')
		map.addOverlay(marker);

var point = new GLatLng(43.83264,-79.47456);
		var marker = createMarker(point,'<div style="width:200px; font-size:7pt"><a href="/libraries/view/10">Pleasant Ridge Library</a><br/>300 Pleasant Ridge Library<br/>Thornhill, Ontario L4J 9B3<br/>Telephone: (905) 653-READ (7323)</div>')
		map.addOverlay(marker);

		
		var point = new GLatLng(43.817766,-79.596784);
		var marker = createMarker(point,'<div style="width:200px; font-size:7pt"><a href="/libraries/view/7">Pierre Berton Resource Library</a><br/>4921 Rutherford Road<br/>Woodbridge, Ontario L4L 1A6<br/>Telephone: (905) 653-READ (7323)</div>')
		map.addOverlay(marker);

		var point = new GLatLng(43.784676,-79.593683);
		var marker = createMarker(point,'<div style="width:200px; font-size:7pt"><a href="/libraries/view/8">Woodbridge Library</a><br/>150 Woodbridge Avenue<br/>Woodbridge, Ontario L4L 2S7<br/>Telephone: (905) 653-READ (7323)</div>')
		map.addOverlay(marker);
	}

	// display a warning if the browser was not compatible
	else {
	  	alert("Sorry, the Google Maps API is not compatible with this browser");
	}

	// This Javascript is based on code provided by the
	// Blackpool Community Church Javascript Team
	// http://www.commchurch.freeserve.co.uk/
	// http://www.econym.demon.co.uk/googlemaps/
}
//]]>
</script>


<div id="page_header">
	<div class="opening"></div>
	<div class="details">
		<h1>Map of Vaughan Public Libraries</h1>
	</div>
	<div class="closing"></div>
</div>



<div id="page_content">
	<div class="opening"><h2><span style="display: none !important;">VPL Map</span></h2></div>
	<div class="details">
    		<div id="map" style="width: 600px; height: 450px"></div>

		<noscript>JavaScript must be enabled in order for you to use Google Maps.
	      	However, it seems JavaScript is either disabled or not supported by your browser.
	      	To view Google Maps, enable JavaScript by changing your browser options, and then
	      	try again.
		</noscript>
		
		<div class="entry">
		
			<?php echo $this->Html->image("/icon-pdf.gif", array("alt"=>"PDF"));?>
			<?php echo $this->Html->link("Downloadable Map with Branch Locations and Hours", "/files/map.pdf",array("rel"=>"external")); ?> (1.39 MB)<br />
			<div class="section_end">&nbsp;</div>
			

			<?php echo $this->renderElement('adobe_download'); ?>
		</div>
		&nbsp;

	</div>
	<div class="closing"></div>




</div>



