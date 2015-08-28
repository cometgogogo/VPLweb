<rss version='2.0' xmlns:media='http://search.yahoo.com/mrss/'>
<channel>
<title><![CDATA[Ansley Grove New Arrivals]]></title> 
<link>http://www.vaughanpl.info/new_arrivals</link>
<copyright>Copyright(C) 2014 Remote Media</copyright>
<language>en-gb</language>
<description><![CDATA[New books, DVDs]]></description>
<ttl>10</ttl>
<lastBuildDate>Sat, 6 Sep 2014 13:43:26 GMT</lastBuildDate>

<?php 
$index = rand(0, count($list['NewArrivalRecord'])-1);
$record = $list['NewArrivalRecord'][$index];

?>
<item>
	<title><![CDATA[<?php echo addslashes($record["Title"]); ?>]]></title>
	<link>http://www.vaughanpl.info/new_arrivals/record/<?php echo $record['BibID']; ?></link>
	<guid>http://www.vaughanpl.info/new_arrivals/record/<?php echo $record['BibID']; ?></guid>	
	<isactive>1</isactive>
	<enclosure type='image/jpeg' url='http://lib.syndetics.com/index.aspx?isbn=<?php echo $record['ISBN']; ?>/MC.GIF' />
	<media:content type='image/jpeg' url='http://lib.syndetics.com/index.aspx?isbn=<?php echo $record['ISBN']; ?>/MC.GIF' />
	<description><![CDATA[<?php echo addslashes($record["Details"]); ?>]]></description>
</item>

</channel>
</rss>