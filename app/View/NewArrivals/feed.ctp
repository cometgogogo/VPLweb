<rss version="2.0" xmlns:atom="http://www.w3.org/2005/Atom">
	<channel>
		<atom:link href="http://www.vaughanpl.info/new_arrivals/feed/<?php echo $list['NewArrival']['ListID']; ?>" rel="alternate" type="application/rss+xml" title="VPL New Arrivals Feeds" />
		<title>VPL New Arrivals Feeds - <?php echo $list['NewArrival']['ListName']; ?></title>
		<link>http://www.vaughanpl.info/new_arrivals/view/<?php echo $list['NewArrival']['ListID']; ?></link>
		<description>Check out newly arrived titles at Vaughan Public Libraries!</description>
		<language>en</language>
		<webMaster>vplwebmaster@vaughan.ca</webMaster>
		<image>
		<title>VPL New Arrivals - <?php echo $list['NewArrival']['ListName']; ?></title>
		<url>http://www.vaughanpl.info/img/icon-vpl.gif</url>
		<link>http://www.vaughanpl.info/new_arrivals/view/<?php echo $list['NewArrival']['ListID']; ?></link>
		<width>35</width>
		</image>
	<?php foreach ($list['NewArrivalRecord'] as $record): ?>
	<item>
		<title><![CDATA[<?php echo addslashes($record["Title"]); ?>]]></title>
		<link>http://www.vaughanpl.info/new_arrivals/record/<?php echo $record['BibID']; ?></link>
		<guid>http://www.vaughanpl.info/new_arrivals/record/<?php echo $record['BibID']; ?></guid>
		<description><![CDATA[<?php echo addslashes($record["Details"]); ?>]]></description>
	</item>
	<?php endforeach; ?>
	</channel>
</rss>