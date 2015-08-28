<?php include("crumbs.ctp"); ?>

<?php
	$relatedContentElements = array	(array ('related_pages', array("pages"=>array(	array("Title"=>"Service Charges","url"=>"/services/service_charges"),
											array("Title"=>"Library Services","url"=>"/services/special"),
											array("Title"=>"Membership","url"=>"/services/membership")
					))));
	$this->set('relatedContentElements', $relatedContentElements);
?>

<div id="page_header">
	<div class="opening"></div>
	<div class="details">
		<h1>How Much Money Do You Save Using The Library?</h1>
	</div>
	<div class="closing"></div>
</div>

<div id="page_content">
	<div class="details">

	<div class="entry">
      		<span style="display: none !important;"><h2>What is your library worth to you? </h2></span>
      		<p> How much would it cost if you had to pay for your library services directly?</p>
	     	<ul>
			<li> Enter in the left hand column the number of times <strong>per month</strong> you or your family use each service. (e.g. how many books borrowed and how many programs attended in a month).</li>
			<li>Estimated retail value of each service (if purchased) will be calculated on the right.</li>
			<li> Total value of your library use is shown at the bottom of the worksheet. </li>

	      	</ul>

      		<form action=" " method="post" name="calculator" id="calculator">
        		<table cellspacing="0" id="tbstriped" summary="A javascript driven calculator to determine estimated retail value for a variety of library services">
         		<caption>

            		</caption>
         		 <tbody>

		    <tr>
		      <th scope="col">Library Services</th> 
		      <th scope="col">Input Your Use</th>		     
		      <th scope="col" align="right">Value of Services</th>
		    </tr>
			<tr><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td></tr>
		    <tr>
		      <td><label for="books">Books Borrowed</label></td>
		      <td align="center"><input type="text" name="books" id="books" size="5" onchange="doCalculator()" tabindex="1" /></td> 
		      <td align="right"><label for="booksResult">$</label>
			<input type="text" id="booksResult" size="5" value="0.00" /></td>
		    </tr>

		    <tr>
		      <td><label for="magazines">Magazines Borrowed</label></td>
		      <td align="center"><input type="text" name="magazines" id="magazines" size="5" onchange="doCalculator()" tabindex="4" /></td>		      
		      <td align="right"><label for="magazinesResult">$</label>
			<input type="text" id="magazinesResult" size="5" value="0.00" /></td>
		    </tr>
		    <tr>
		       <td><label for="movies">Movies Borrowed</label></td>
		       <td align="center"><input type="text" name="movies" id="movies" size="5" onchange="doCalculator()" tabindex="5" /></td>		     
		      <td align="right"><label for="moviesResult">$</label>
			<input type="text" id="moviesResult" size="5" value="0.00" /></td>
		    </tr>
		    <tr>
		       <td><label for="audiobooks">Audiobooks Borrowed</label></td>
		       <td align="center"><input type="text" name="audiobooks" id="audiobooks" size="5" onchange="doCalculator()" tabindex="6" /></td>		     
		      <td align="right"><label for="audiobooksResult">$</label>
			<input type="text" id="audiobooksResult" size="5" value="0.00" /></td>
		    </tr>
		    <tr>
		      <td><label for="cd">Music CDs</label></td>
		      <td align="center"><input type="text" name="cd" id="cd" size="5" onchange="doCalculator()" tabindex="6" /></td>		      
		      <td align="right"><label for="cdResult">$</label>
			<input type="text" id="cdResult" size="5" value="0.00" /></td>
		    </tr>
		    <tr>
		        <td><label for="magazineuse">Magazine/Newspaper Use in Library</label></td>
		        <td align="center"><input type="text" name="magazineuse" id="magazineuse" size="5" onchange="doCalculator()" tabindex="8" /></td>		    
		      <td align="right"><label for="magazineuseResult">$</label>
			<input type="text" id="magazineuseResult" size="5" value="0.00" /></td>
		    </tr>
		    <tr>
		      <td><label for="ill">Interlibrary Loan</label></td>
		      <td align="center"><input type="text" name="ill" id="ill" size="5" onchange="doCalculator()" tabindex="9" /></td>		      
		      <td align="right"><label for="illResult">$</label>
			<input type="text" id="illResult" size="5" value="0.00" /></td>
		    </tr>

		    <tr>
		      <td><label for="adultprogram">Adult Programs Attended</label></td>
		      <td align="center"><input type="text" name="adultprogram" id="adultprogram" size="5" onchange="doCalculator()" tabindex="12" /></td>
		      
		      <td align="right"><label for="adultprogramResult">$</label>
			<input type="text" id="adultprogramResult" size="5" value="0.00" /></td>
		    </tr>
		    <tr>
		      <td><label for="childrensprogram">Children's Programs Attended</label></td>
		      <td align="center"><input type="text" name="childrensprogram" id="childrensprogram" size="5" onchange="doCalculator()" tabindex="13" /></td>		      
		      <td align="right"><label for="childrensprogramResult">$</label>
			<input type="text" id="childrensprogramResult" size="5" value="0.00" /></td>
		    </tr>
		    <tr>
		     <td><label for="computerhours">Hours of Computer Use </label>
			(i.e. Internet, MS Word, etc.)</td>
			<td align="center"><input type="text" name="computerhours" id="computerhours" size="5" onchange="doCalculator()" tabindex="14" /></td>
		      <td align="right"><label for="computerhoursResult">$</label>
			<input type="text" id="computerhoursResult" size="5" value="0.00" /></td>
		    </tr>

		    <tr>
		      <td><label for="reference">Information Question Asked</label></td> 
		      <td align="center"><input type="text" name="reference" id="reference" size="5" onchange="doCalculator()" tabindex="17" /></td>
		     
		      <td align="right"><label for="referenceResult">$</label>
			<input type="text" id="referenceResult" size="5" value="0.00" /></td>
		    </tr>
		    <tr>
		      <td colspan="3"><hr />              </td>
		    </tr>
		    <tr>
		      <td colspan="2" align="left">
			  <span class="button"><input type="reset" value="Clear Form" /></span>
		      </td>
		      <td align="right"><label for="totalResult">Total: $</label>
			<input type="text" name="totalResult" id="totalResult" size="5" value="0.00" /></td>
		    </tr>
		  </tbody>
		</table>
	      </form>
	    </div>
	    <div class="entry">
		    <p><em>This online calculator has been adapted from the original spreadsheet provided by the <a href="http://www.masslib.org" rel="external">Massachusetts Library Association</a> and then adapted for the web by <A href="http://www.chelmsfordlibrary.org/library_info/calculator.html" rel="external">Chelmsford Public Library</A>. <A href="http://www.maine.gov/msl/index.shtml" rel="external">Maine State Library</A> added extra accessibility coding and reformatting for ease of reading online.</em></p>
	    </div>
	   </div>
	  <div class="closing"></div>
	 </div>

<script type="text/javascript">
function doCalculator(){
	var booksValue = document.calculator.books.value * 27.00;
	document.getElementById("booksResult").value = booksValue.toFixed(2);

	var magazinesValue = document.calculator.magazines.value * 5.00;
	document.getElementById("magazinesResult").value = magazinesValue.toFixed(2);

	var moviesValue = document.calculator.movies.value * 33.00;
	document.getElementById("moviesResult").value = moviesValue.toFixed(2);

	var audiobooksValue = document.calculator.audiobooks.value * 45.00;
	document.getElementById("audiobooksResult").value = audiobooksValue.toFixed(2);

	var cdValue = document.calculator.cd.value * 30.00;
	document.getElementById("cdResult").value = cdValue.toFixed(2);

	var magazineuseValue = document.calculator.magazineuse.value * 5.00;
	document.getElementById("magazineuseResult").value = magazineuseValue.toFixed(2);

	var illValue = document.calculator.ill.value * 25.00;
	document.getElementById("illResult").value = illValue.toFixed(2);


	var adultprogramValue = document.calculator.adultprogram.value * 18.00;
	document.getElementById("adultprogramResult").value = adultprogramValue.toFixed(2);

	var childrensprogramValue = document.calculator.childrensprogram.value * 12.00;
	document.getElementById("childrensprogramResult").value = childrensprogramValue.toFixed(2);

	var computerhoursValue = document.calculator.computerhours.value * 3.00;
	document.getElementById("computerhoursResult").value = computerhoursValue.toFixed(2);

	//var newsarticlesValue = document.calculator.newsarticles.value * 1.00;
	//document.getElementById("newsarticlesResult").value = newsarticlesValue.toFixed(2);

	//var databasesValue = document.calculator.databases.value * 20.00;
	//document.getElementById("databasesResult").value = databasesValue.toFixed(2);

	var referenceValue = document.calculator.reference.value * 10.00;
	document.getElementById("referenceResult").value = referenceValue.toFixed(2);

	var totalValue = (document.calculator.booksResult.value*1)+(document.calculator.magazinesResult.value*1)+(document.calculator.moviesResult.value*1)+(document.calculator.audiobooksResult.value*1)+(document.calculator.cdResult.value*1)+(document.calculator.magazineuseResult.value*1)+(document.calculator.illResult.value*1)+(document.calculator.adultprogramResult.value*1)+(document.calculator.childrensprogramResult.value*1)+(document.calculator.computerhoursResult.value*1)+(document.calculator.referenceResult.value*1);
	document.getElementById("totalResult").value = totalValue.toFixed(2);
}
</script>
<noscript>
<p>If JavaScript is not supported, use the Excel spreadsheet below to calculate your library's value. </p>
</noscript>

<!-- End of Middle Column -->