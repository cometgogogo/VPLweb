<?php
$r = rand(0,20);

if ($r <= 3) {
	if ($r == 0) {
		$flash = "kidzone";
	} elseif ($r == 1) {
		$flash = "teenvortex";
	} elseif ($r == 2) {
		$flash = "books";
	} elseif ($r == 3){
		$flash = "multilingual";
	}
	?>
		<table>
			<tr>
				<td>

				<object type="application/x-shockwave-flash" data="/flash/<?php echo $flash; ?>.swf" width="100%" height="90" id="books">
				<param name="movie" value="/flash/<?php echo $flash; ?>.swf" />
				<param name="quality" value="high" />
				<param name="LOOP" value="false" />
				<param name="bgcolor" value="#ffffff" />
				</object>

				</td>
			</tr>
		</table>
	<?php

} elseif ($r == 4) {
	?>
		<div id="banner">
			<img src="/img/libraries/an-internet-big_banner.jpg" alt="Internet stations at Ansley Grove Library" /><p>Internet stations at Ansley Grove Library.</p>
		</div>
	<?php

} elseif ($r == 5) {
	?>
		<div id="banner">
			<img src="/img/libraries/bc-author-big_banner.jpg" alt="Author Visit at Bathurst Clark Resource Library" /><p>Author Visit at Bathurst Clark Resource Library.</p>
		</div>
	<?php

} elseif ($r == 6) {
	?>
		<div id="banner">
			<img src="/img/libraries/dc-magazines-big_banner.gif" alt="The latest magzines at Dufferin Clark Library" /><p>The latest magzines at Dufferin Clark Library.</p>
		<!--	<img src="/img/libraries/dc-captivating-big_banner.jpg" alt="" /><p>Dufferin Clark Library: Captivating programs for all ages</p> -->
		</div>
	<?php

} elseif ($r == 7) {
	?>
		<div id="banner">
			<img src="/img/events/makeover2011_1_banner.jpg" alt="VPL staff in 20-Minute Makeover" /><p>VPL staff participating in 20-Minute Makeover in support of Earth Day.</p>
		<!--	<img src="/img/libraries/dc-captivating-big_banner.jpg" alt="" /><p>Dufferin Clark Library: Captivating programs for all ages</p> -->
		</div>
	<?php

} elseif ($r == 8) {
	?>
		<div id="banner">
			<img src="/img/libraries/ma-newmoon-big_banner.jpg" alt="" /><p>Celebrating New Moon movie release at Maple Library.</p>
		</div>
	<?php

} elseif ($r == 9) {
	?>
		<div id="banner">
			<img src="/img/libraries/wo-study-big_banner.gif" alt="" /><p>Bright, comfortable study area at Woodbridge Library.</p>
		</div>
	<?php
} elseif ($r == 10) {
	?>
		<div id="banner">
			<img src="/img/libraries/harvest-big_banner.jpg" alt="" /><p>Early Harvest Award Night at the City Playhouse.</p>
		</div>
	<?php
} elseif ($r == 11) {
	?>
		<div id="banner">
			 <img src="/img/events/makeover2011_2_banner.jpg" alt="VPL staff in support of Earth Day" /><p>VPL staff participating in 20-Minute Makeover in support of Earth Day.</p>
		</div>
	<?php
} elseif ($r == 12) {
	?>
		<div id="banner">
			<img src="/img/libraries/pb-murder-mystery-big_banner.jpg" alt="" /><p>Awesome, spine-tingling Murder Mystery Night at Pierre Berton Resource Library.</p>
		</div>
	<?php
} elseif ($r == 13) {
	?>
		<div id="banner">
			<img src="/img/libraries/bc-twilight-big_banner.jpg" alt="" /><p>An after-hours Twilight party at Bathurst Clark Resource Library.</p>
		</div>
	<?php
} elseif ($r == 14) {
	?>
		<div id="banner">
			<img src="/img/libraries/bc-slavic-big_banner.jpg" alt="" /><p>The Day of Slavic Written Language and Culture program at Bathurst Clark Resource Library.</p>
		</div>
	<?php
} elseif ($r == 15) {
	?>
		<div id="banner">
			<img src="/img/libraries/dc-asian-heritage-big_banner.jpg" alt="" /><p>Celebration of Asian Heritage Month at Dufferin Clark Library.</p>
		</div>
	<?php
} elseif ($r == 16) {
	?>
		<div id="banner">
			<img src="/img/libraries/dc-black-history-big_banner.jpg" alt="" /><p>Celebration of Black History Month at Dufferin Clark Library.</p>
		</div>
	<?php
}  elseif ($r == 17) {
	?>
		<div id="banner">
			<img src="/img/libraries/vpl-santafest-big_banner.jpg" alt="" /><p>VPL in the Vaughan Santafest Parade.</p>
		</div>
	<?php
} elseif ($r == 18) {
	?>
		<div id="banner">
			<img src="/img/libraries/kl-olympic-big_banner.jpg" alt="" /><p>Cheering on the Olympic Flame at Kleinburg Library.</p>
		</div>
	<?php
} elseif ($r == 19) {
	?>
		<div id="banner">
			<img src="/img/libraries/wo-beyond-big_banner.jpg" alt="" /><p>Beyond the Basics program at Woodbridge Library.</p>
		</div>
	<?php
} elseif ($r == 20) {
	?>
		<div id="banner">
			<img src="/img/libraries/wo-senior-big_banner.jpg" alt="" /><p>Popular Senior Social program at Woodbridge Library.</p>
		</div>
	<?php
} 
?>