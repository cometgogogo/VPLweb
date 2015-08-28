<?php
$html->addCrumb("Home" , "/");
$html->addCrumb("Books & Resources" , "/materials");
$html->addCrumb("Newcomers" , "/materials/newcomer");
?>

<?php
$relatedContentElements = array	(array ('related_pages', array("pages"=>array(array("Title"=>"Books for ESL Book Clubs","url"=>"/books_for_book_clubs/index/esl"), array("Title"=>"Borrowing Materials","url"=>"/services/borrowing"), array("Title"=>"Library Services","url"=>"/services/special"),array("Title"=>"Email Librarian","url"=>"/email_librarian")))));

$this->set('relatedContentElements', $relatedContentElements);
?>

<div id="page_header">
	<div class="opening"></div>
	<div class="details">
		<h1>Welcome to Vaughan Public Libraries</h1>
	</div>
	<div class="closing"></div>
</div>

<div id="page_content">
	<div class="opening"></div>
	<div class="details">

		<div class="entry">

			<P>
			<table>
			<tr><td><img src="/img/brochures/welcome.gif" alt="Welcome to VPL" title="Welcome to VPL"></td>
			<td>
			<table>
				  <tr>
				    <td><a href="/files/brochures/english.pdf" rel="external"><img src="/img/brochures/english.gif" alt="English"></a></td>
				    <td><a href="/files/brochures/fre.pdf" rel="external"><img src="/img/brochures/fre.gif" alt="French"></a></td>
				  </tr>

				  <tr>
				    <td><a href="/files/brochures/chi.pdf" rel="external"><img src="/img/brochures/chi.gif" alt="Chinese"></a></td>
				    <td><a href="/files/brochures/ita.pdf" rel="external"><img src="/img/brochures/ita.gif" alt="Italian"></a></td>
				  </tr>

				  <tr>
				    <td><a href="/files/brochures/heb.pdf" rel="external"><img src="/img/brochures/heb.gif" alt="Hebrew"></a></td>
				    <td><a href="/files/brochures/hin.pdf" rel="external"><img src="/img/brochures/hin.gif" alt="Hindi"></a></td>
				  </tr>

				  <tr>
				    <td colspan='2'><a href="/files/brochures/rus.pdf" rel="external"><img src="/img/brochures/rus.gif" alt="Russian"></a></td>

				  </tr>
			</table>
			</td></tr>
			</table>
			</P>

			<br/>
		</div>

		<?php echo $this->renderElement('adobe_download'); ?>

		</div>

		&nbsp;
	</div>
	<div class="closing"></div>
</div>