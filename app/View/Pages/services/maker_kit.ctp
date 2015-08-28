<?php include("crumbs.php"); ?>

<?php
	$relatedContentElements = array	(array ('related_pages', array("pages"=>array(array("Title"=>"3D Printing Terms of Use","url"=>"/files/services/3DPrintingTermsofUse.pdf","target"=>"_blank"),array("Title"=>"Library Services","url"=>"/library_services"),array("Title"=>"Libraries and Hours","url"=>"/libraries"),array("Title"=>"Borrowing Materials","url"=>"/services/borrowing"),array("Title"=>"Downloads & Digital","url"=>"/materials/downloads_digital")))));
	
	$relatedContentElements[] = array ('image', array("image"=>array("source"=>"/img/makerkit_sidebar.jpg","width"=>"200", "height"=>"257", "title"=>"Maker Kits", "link"=>"/services/maker_kit", "target"=>"self")));
	
	$this->controller->set('relatedContentElements', $relatedContentElements);
?>


<div id="page_header">
	<div class="opening"></div>
	<div class="details">
		<h1>Maker Kits</h1>
	</div>
	<div class="closing"></div>
</div>

<div id="page_content">
	<div class="opening"></div>
	<div class="details">

		<div class="entry">

			<p>
				Maker Kits have landed at VPL!  Explore our 9 themed <a href="#kit_content">Maker Kits</a> including 3D printing, photography, video, circuitry, music, robotics, K'NEX, coding, and creative design.  These Maker Kits are sure to spark curiosity and encourage creativity. 
			</p>
			<p> Maker Kits will be available to explore at all <a href="/libraries">VPL locations</a> on Maker Days along with <a href="/programs/index/category/37/">programs</a> throughout the week as scheduled.</p>
			<p>Need more Maker? To use a Maker Kit for in-library use outside of the scheduled program time, please contact the Service Desk or make a <a href="/maker_reservation">reservation online</a>.</p>
			

		</div>

		<div class="entry">
			<h2>Maker Kits Rotation Schedule</h2>
			<p>Maker Kits are scheduled to rotate between <a href="/libraries">VPL branches</a> quarterly so everyone can explore the Maker Kits. <a href="/programs/index/category/37/">Join a program</a> to take part in the Maker movement.</p>
						
			<h3>March 2015 to May 2015</h3>
			<p><a href="http://www.vaughanpl.info/programs/index/category/37/2015-03-01">List of programs</a></p>
			<ul>		
			<li>Ansley Grove - Creative Design</li>
			<li>Bathurst Clark - Coding</li>
			<li>Dufferin Clark - Robotics</li>
			<li>Kleinburg - K'NEX</li>
			<li>Maple - 3D Printing</li>
			<li>Pierre Berton - Movie Magic</li>
			<li>Pleasant Ridge - Music and K'NEX</li>
			<li>Woodbridge - Circuitry</li>
			</ul>	
			
			<h3>June 2015 to August 2015</h3>			
			<ul>		
			<li>Ansley Grove - Movie Magic</li>
			<li>Bathurst Clark - 3D Printing</li>
			<li>Dufferin Clark - Circuitry</li>
			<li>Kleinburg - K'NEX</li>
			<li>Maple - Coding</li>
			<li>Pierre Berton - Robotics</li>
			<li>Pleasant Ridge - Creative Design and K'NEX</li>
			<li>Woodbridge - Music </li>
			</ul>				

		</div>
		<div class="entry">
			<h2><a name="kit_content">Maker Kit Contents</a></h3>
			<h3><a href="javascript:toggleMin('3D')" title="Click it to extend or hide">3D Maker Kit</a></h3>
			<div id="3D" class="entry" style="display: none">

				<table class="makerkit_table">
				<tr>
				<td width="500" valign="top"><b>3D MakerBot Replicator 5<sup>th</sup> Generation</b><br/>3D printing is no longer just a figment of your imagination. With the MakerBot Replicator and modeling software/apps you can design and print your own 3D object.</td><td><img src="/img/events/maker_kits/mk_3D_makerbot.jpg" alt="3D MakerBot Replicator" /></td>
				</tr>
				<tr>
				<td width="500" valign="top"><b>Modeling Clay</b><br/>Plastalina is an easy-to-use, non-drying clay that never hardens. It stays soft and pliable, so it can be used over and over. This nontoxic clay is a favourite of sculptors, model makers, clay animators and artists of all ages.</td><td><img src="/img/events/maker_kits/mk_3D_clay.jpg" alt="Modeling Clay" /></td>
				</tr>
				<tr>
				<td width="500" valign="top"><b>Assorted Filament</b><br/>MakerBot PLA Filament is a nontoxic resin made of sugar derived from field corn and has a semisweet smell (like waffles) when heated. If you're new to 3D printing, MakerBot PLA Filament is a good material to start with because it's easy to use and performs well on most prints.</td><td><img src="/img/events/maker_kits/mk_3D_filament.jpg" alt="Assorted Filament" /></td>
				</tr>
				<tr>
				<td width="500" valign="top"><b>MakeDo Kits</b><br/>Makedo<sup>TM</sup> engages people in creative cardboard making that gives way to imaginative, open-ended play. Makedo<sup>TM</sup> tools are purposely designed for fast, simple and sturdy cardboard construction.</td><td><img src="/img/events/maker_kits/mk_3D_makedo.jpg" alt="MakeDo Kits" /></td>
				</tr>				
				</table>

			</div>


			<h3><a href="javascript:toggleMin('robotics')" title="Click it to extend or hide">Robotics Maker Kit</a></h3>
			<div id="robotics" class="entry" style="display: none">
				<table class="makerkit_table">
				<tr>
				<td width="500" valign="top"><b>LEGO Mindstorm Kits</b><br/>Explore the magic of making your robot do exactly what you want it to do! The LEGO MINDSTORMS programming software contains fun missions and the easy to use, icon-based programming interface. </td><td><img src="/img/events/maker_kits/mk_lego_mindstorm.jpg" alt="LEGO Mindstorm Kits" /></td>
				</tr>
				<tr>
				<td width="500" valign="top"><b>LEGO WeDo Kits</b><br/>LEGO Education WeDo is a simple-to-use tool that enables for children to learn, construct and then bring their models to life using intuitive drag-and-drop software.</td><td><img src="/img/events/maker_kits/mk_lego_wedo.jpg" alt="LEGO WeDo Kits" /></td>
				</tr>
				</table>
				
			</div>

			<h3><a href="javascript:toggleMin('circuitry')" title="Click it to extend or hide">Circuitry Maker Kit</a></h3>
			<div id="circuitry" class="entry" style="display: none">

				<table class="makerkit_table">
				<tr>
				<td width="500" valign="top"><b>Squishy Circuits</b><br/>Squishy Circuits allow kids of all ages to create circuits and explore electronics using play dough.</td><td><img src="/img/events/maker_kits/mk_circ_squishy.jpg" alt="Squishy Circuits" /></td>				
				</tr>
				<tr>
				<td width="500" valign="top"><b>Snap Circuits</b><br/>Learning electronics is easy and fun! Just follow the colorful pictures in your manual and build exciting projects such as AM radios, burglar alarms, doorbells and much more! You can even play electronic games with your friends. All parts are mounted on plastic modules and snap together with ease. </td><td><img src="/img/events/maker_kits/mk_circ_snap.jpg" alt="Snap Circuits" /></td>
				</tr>
				<tr>
				<td width="500" valign="top"><b>Makey Makey</b><br/>Turn everyday objects into touchpads and combine them with the Internet. It's a simple Invention Kit for Beginners and Experts doing art, engineering, and everything in between.</td><td><img src="/img/events/maker_kits/mk_circ_makey.jpg" alt="Makey Makey" /></td>
				</tr>
				<tr>
				<td width="500" valign="top"><b>Assorted LEDs</b><br/>You can never get too many LEDs. Don't worry, we've got you covered with red, yellow, blue and green.</td><td><img src="/img/events/maker_kits/mk_circ_leds.jpg" alt="Assorted LEDs" /></td>
				</tr>
				<tr>
				<td width="500" valign="top"><b>Conductive Thread</b><br/>You can use this conductive thread as a creative way to connect various electronics onto clothing projects.</td><td><img src="/img/events/maker_kits/mk_circ_thread.jpg" alt="Conductive Thread" /></td>
				<tr>
				<td width="500" valign="top"><b>Sew Electric</b><br/>If you're interested in interactive toys, smart accessories, or light-up fashions, this book is for you! Sew Electric is a set of LilyPad Arduino tutorials that brings together craft, electronics, and programming. </td><td><img src="/img/events/maker_kits/mk_circ_sew.jpg" alt="Sew Electric" /></td>
				</tr>						
				</table>
		
			</div>

			<h3><a href="javascript:toggleMin('music')" title="Click it to extend or hide">Music Maker Kit</a></h3>
			<div id="music" class="entry" style="display: none">

				<table class="makerkit_table">
				<tr>
				<td width="500" valign="top"><b>Zoom H2n Handy Recorder</b><br/>This portable device allows you to record audio anywhere you go. From musical performance, songwriting, to rehearsal, the H2n provides great recording quality.</td><td><img src="/img/events/maker_kits/mk_music_recorder.jpg" alt="Zoom H2n Handy Recorder" /></td>
				</tr>
				<tr>
				<td width="500" valign="top"><b>Zoom APH2n Accessory Pack for Recorder</b><br/>The pack includes seven additional tools for use with the H2n recorder including a remote control to start, stop, and pause recordings, a windscreen that reduces wind and breath noise, a mic clip adapter, and a tabletop tripod.</td><td><img src="/img/events/maker_kits/mk_music_aph2n.jpg" alt="Zoom APH2n Accessory Pack for Recorder" /></td>
				</tr>				
				<tr>
				<td width="500" valign="top"><b>Meinl Percussion Egg Shaker Sets</b><br/>A set of four Shaker Eggs with four levels of volume (White: Soft Sound, Grey: Medium Sound, Red: Loud Sound, Black: Extra Loud Sound).</td>	<td><img src="/img/events/maker_kits/mk_music_eggshaker.jpg" alt="Meinl Percussion Egg Shaker Sets" /></td>
				</tr>
				<tr>
				<td width="500" valign="top"><b>Casio Mini Keyboard</b><br/>The 44 key mini keyboard offers children the essentials for playing those first tunes. 100 tones, 50 rhythms and 10 integrated songs provide variety.</td><td><img src="/img/events/maker_kits/mk_music_keyboard.jpg" alt="Casio Mini Keyboard" /></td>
				</tr>
				<tr>
				<td width="500" valign="top"><b>Korg Kaossoilator 2</b><br/>Use the Kaossilator to create DJ-like mixes.  Use the internal mic to record guitar, vocals, or author audio sources to create a looper effect.</td><td><img src="/img/events/maker_kits/mk_music_kaos.jpg" alt="Korg Kaossoilator 2" /></td>
				</tr>	
				<tr>
				<td width="500" valign="top"><b>Makala Dolphin Soprano Ukelele</b><br/>One of the best entry level ukes.  The Makala has a great sound and look.</td><td><img src="/img/events/maker_kits/mk_music_ukelele.jpg" alt="Makala Dolphin Soprano Ukelele" /></td>
				</tr>
				<tr>
				<td width="500" valign="top"><b>Snark All Instrument Clip-On Tuner</b><br/>This tuner connects solidly to your instrument or music stand for precise tuning along with other features.</td><td><img src="/img/events/maker_kits/mk_music_tuner.jpg" alt="Snark All Instrument Clip-On Tuner" /></td>
				</tr>
				<tr>
				<td width="500" valign="top"><b>Otamatone</b><br/>This is an electronic musical instrument whose body is shaped like an eighth note, with sound emerging from a "mouth" on the notehead. It requires two hands to play.</td><td><img src="/img/events/maker_kits/mk_music_otamatone.jpg" alt="Otamatone" /></td>
				</tr>	
				<tr>
				<td width="500" valign="top"><b>Korg Monotribe</b><br/>In addition to analog synthesis, monotribe brings together intuitive ease of use and a three-part discrete analog rhythm section, plus the proven appeal of Electribe-style sequencing.  Within seconds of fooling around on the Monotribe you'll have a full song idea ready to go.</td><td><img src="/img/events/maker_kits/mk_music_monotribe.jpg" alt="Korg Monotribe" /></td>
				</tr>	
				<tr>
				<td width="500" valign="top"><b>iSound GoSonic Portable Speaker</b><br/>This speaker delivers crystal clear sound from your audio device in a small rechargeable battery powered speaker. </td>	<td><img src="/img/events/maker_kits/mk_music_speaker.jpg" alt="iSound GoSonic Portable Speaker" /></td>
				</tr>					
				</table>		
			</div>	     

			<h3><a href="javascript:toggleMin('creative')" title="Click it to extend or hide">Creative Design Maker Kit</a></h3>
			<div id="creative" class="entry" style="display: none">
				<table class="makerkit_table">
				<tr>
				<td width="500" valign="top"><b>Roland STIKA Desktop Cutter</b><br/>Making professional-looking graphics is a snap with the STIKA. Simply design and cut your graphics, peel away the excess vinyl, and apply. It's that easy.</td><td><img src="/img/events/maker_kits/mk_design_cutter.jpg" alt="Roland STIKA Desktop Cutter" /></td>
				</tr>	
				<tr>
				<td colspan=2><b>Assorted colors of adhesive vinyl</b><br/><img src="/img/events/maker_kits/mk_design_vinyl.jpg" alt="Assorted colors of adhesive vinyl" />
				</td>
				</tr>	
				</table>

				
			</div>	        			

			<h3><a href="javascript:toggleMin('movie')" title="Click it to extend or hide">Movie Magic Maker Kit</a></h3>
			<div id="movie" class="entry" style="display: none">
				<table class="makerkit_table">
				<tr>
				<td width="500" valign="top"><b>iStabilizer dolly and attachments</b><br/>Sophisticated-looking camera moves used to only be available to the pros. But now you can take smooth tracking shots on any flat surface, giving your video a look and feel that's fit for the big screen.</td><td><img src="/img/events/maker_kits/mk_movie_dolly.jpg" alt="iStabilizer dolly and attachments" /></td>
				</tr>	
				<tr>
				<td width="500" valign="top"><b>Gorillapod Hybrid tripod</b><br/>A lightweight, flexible tripod that will help you get the shot you want in any environment.</td>				
				<td><img src="/img/events/maker_kits/mk_movie_tripod.jpg" alt="Gorillapod Hybrid tripod" /></td>
				</tr>
				<tr>
				<td width="500" valign="top"><b>Canon Powershot SX50 HS Camera</b><br/>Features a 50x Optical Zoom lens in a compact digital camera, which goes all the way from a wide-angle 24mm to 1200mm (35mm equivalent) to capture any shot you choose. Record videos in lifelike 1080p Full HD video with stereo sound.</td><td><img src="/img/events/maker_kits/mk_movie_canon.jpg" alt="Canon Powershot SX50 HS Camera" /></td>
				</tr>	
				<tr>
				<td width="500" valign="top"><b>All-in-one Memory Card Reader</b><br/>All-in-one memory card reader</td><td><img src="/img/events/maker_kits/mk_movie_cardreader.jpg" alt="All-in-one Memory Card Reader" />
				</td>
				</tr>	
				<tr>
				<td width="500" valign="top"><b>3-1 Olloclip Photo Lens</b><br/>Get creative and take macro, fisheye, or wide-angle shots with this photo lens.</td><td valign="top"><img src="/img/events/maker_kits/mk_movie_lens.jpg" alt="3-1 Olloclip Photo Lens" /></td>
				</tr>	
				<tr>
				<td width="500" valign="top"><b>iOgrapher Mobile Media Case</b><br/>An all-purpose filmmaking case for the full size iPad. Made from high grade polycarbonate, the iOgrapher is extremely tough and durable.	</td>			
				<td><img src="/img/events/maker_kits/mk_movie_case.jpg" alt="iOgrapher Mobile Media Case" /></td>
				</tr>	
				<tr>
				<td width="500" valign="top"><b>Zgrip iPhone Jr.</b><br/>A lightweight handgrip system for shooting professional stable video with your iPhone.</td>				
				<td><img src="/img/events/maker_kits/mk_movie_zgrip.jpg" alt="Zgrip iPhone Jr." /></td>
				</tr>
				<tr>
				<td width="500" valign="top"><b>Sony HDR CX240 Handycam</b><br/>Capture amazing footage in low light, get close to the action with a 27x zoom, wide-angle Carl Zeiss<sup>&reg;</sup> lens and say goodbye to shake with SteadyShot<sip>TM</sup> image stabilization. It's the perfect starter camera.</td><td><img src="/img/events/maker_kits/mk_movie_sony.jpg" alt="Sony HDR CX240 Handycam" /></td>
				<tr>
				<td width="500" valign="top"><b>Green Screen Kit</b><br/>Complete Chroma key green screen kit with lighting and backdrop support system.</td>				
				<td><img src="/img/events/maker_kits/mk_movie_screen.jpg" alt="Green Screen Kit" />
				</tr>	
							
				</table>					
			</div>	  
			
			<h3><a href="javascript:toggleMin('coding')" title="Click it to extend or hide">Coding Kit</a></h3>
			<div id="coding" class="entry" style="display: none">

				<table class="makerkit_table">
				<tr>
				<td width="500" valign="top"><b>Scratch</b><br/>Scratch is a programming language where children can program and share interactive media such as stories, games, and animation. As children create with Scratch, they learn to think creatively, work collaboratively, and reason systematically. While Scratch is primarily designed for 8 to 16 year olds, it is also used by people of all ages, including younger children with their parents.</td><td valign="top"><img src="/img/events/maker_kits/mk_coding_scratch.jpg" alt="Scratch" /></td>
				</tr>
				<tr>				
				<td valign="top"><b>Erase All Kittens</b><br/>E.A.K. (Erase All Kittens) is an online platform game that teaches kids to code and create on the web. It does this in a unique way - by encouraging them to hack into levels, written in HTML and CSS (the languages of websites) - in order to complete the game.</td><td valign="top"><img src="/img/events/maker_kits/mk_coding_eak.jpg" alt="Erase All Kittens" />
				</td>
				</tr>
				<tr>
				<td valign="top"><b>Mozilla Webmaker Apps</b><br/>Webmaker tools make it easy to create things on the web. Make your own web pages, interactive videos, remixes, mobile apps and more - learning web mechanics, code and other valuable skills as you go.</td><td valign="top"><img src="/img/events/maker_kits/mk_coding_webmaker.jpg" alt="Mozilla Webmaker Apps" /></td>				
				</tr>				
				</table>

			</div>

			<h3><a href="javascript:toggleMin('knex')" title="Click it to extend or hide">K'NEX Kit</a></h3>
			<div id="knex" class="entry" style="display: none">

				<table class="makerkit_table">
				<tr>
				<td width="500" valign="top"><b>K'NEX Education: Kid K'Nex Classroom Collection</b><br/>KID K'NEX Rods, Connectors, and KID K'NEX Blocks can be used by children with varying manipulative skills. Builds 23 models from 1:1 correspondence cards. Big, soft, chunky KID K'NEX pieces stimulate children's creativity and imagination.</td><td valign="top"><img src="/img/events/maker_kits/mk_knex_classroom.jpg" alt="K'Nex Classroom" /></td>
				</tr>
				<tr>
				<td width="500" valign="top"><b>Kid K'NEX Transportation, Education Series</b><br/>29 Kid K'NEX pieces, including 36 wheels, 10 of which are 'super sized' and 6 are truck wheels. Six two-sided, full color, building cards. Build all 9 models simultaneously from building cards.</td><td valign="top"><img src="/img/events/maker_kits/mk_knex_transportation.jpg" alt="K'Nex Transportation" /></a><br/><a href="http://www.knex.com/shop/16795/kid-transportation/" rel="external" title="K'Nex Transportation">
				</td>
				</tr>
				<tr>
				<td width="500" valign="top"><b>K'NEX Education Group Set</b><br/>Big, soft, chunky pieces can be used by children with varying manipulative skills. Build 8 models from 1:1 correspondence cards or create your own creatures using the 131 parts, including 10 eyes and 2 ears/wings.</td><td valign="top"><img src="/img/events/maker_kits/mk_knex_group.jpg" alt="K'Nex Education Group Set" /></td>				
				</tr>				
				</table>

			</div>			
		</div>

		&nbsp;

	</div>
	<div class="closing"></div>
</div>