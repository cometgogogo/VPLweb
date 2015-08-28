var xmlDoc;
function importXML(file) {


	if (document.implementation && document.implementation.createDocument)
	{
		xmlDoc = document.implementation.createDocument("", "", null);

		xmlDoc.onload = createTableRow;
	}
	else if (window.ActiveXObject)
	{
		xmlDoc = new ActiveXObject("Microsoft.XMLDOM");
		xmlDoc.onreadystatechange = function () {
			if (xmlDoc.readyState == 4) createTableRow()
		};
	}
	else
	{
		alert("Your browser can\'t handle this script");
		return;
	}

	xmlDoc.load(file);
}

function createTableRow() {
	var list = xmlDoc.getElementsByTagName("AREA");


	//give the user a different message based upon the day of the year
	//siteareas.xml stores all the info

	today = new Date();
	//today = new Date(2007, 5, 5);  // it is june 5, for testing
	first_day = new Date(today.getFullYear(), 0, 1);
	diff = today - first_day; // unit is milliseconds
	days_passed = Math.floor(diff/1000/60/60/24);

	var index = 0;
	// the number of areas that will be featured list.length
	if (days_passed % list.length == 0) {
		index = 0;
	} else {
		index = days_passed % list.length;
	}
	
	var campaignContainer = document.getElementById("campaignContainer");

	var campaignDiv = document.createElement('div');
	campaignDiv.setAttribute('class', 'campaign');
	campaignContainer.appendChild(campaignDiv);

	var contentDiv = document.createElement('div');
	contentDiv.setAttribute('class', 'content');
	campaignDiv.appendChild(contentDiv);
	
	var subtitleDiv = document.createElement('div');
	subtitleDiv.setAttribute('class', 'subtitle');
	subtitleDiv.appendChild(document.createTextNode("Site Area of the Day"));
	contentDiv.appendChild(subtitleDiv);
	
	var h2 = document.createElement('h2');
	contentDiv.appendChild(h2);
	
	var titleAnchor = document.createElement('a');
	titleAnchor.setAttribute('href', list[index].getElementsByTagName("URL")[0].firstChild.nodeValue);
	titleAnchor.appendChild(document.createTextNode(list[index].getElementsByTagName("NAME")[0].firstChild.nodeValue));
	h2.appendChild(titleAnchor);

	var image = document.createElement('img');
	image.src = list[index].getElementsByTagName("LOGO")[0].firstChild.nodeValue;
	contentDiv.appendChild(image);

	var descriptionDiv = document.createElement('div');
	descriptionDiv.setAttribute('class', 'description');
	descriptionDiv.appendChild(document.createTextNode("Check out a different area of the Vaughan Public Libraries website today!"));
	contentDiv.appendChild(descriptionDiv);

	var endDiv = document.createElement('div');
	endDiv.setAttribute('class', 'section_end');
	contentDiv.appendChild(endDiv);

	return;





}

importXML("siteareas.xml");
	
	
	
	