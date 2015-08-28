var menus_width = new Array();
var menus_status = new Array();


var menuOn = new Array();
var menuWidth = new Array();



var t;

function showMenu(menu_id) {
	//document.getElementById("site_services").innerHTML = document.getElementById("site_services").innerHTML + "show " + menu_id + "<br>";
	menuOn[menu_id] = true;
	if (menuWidth[menu_id] && menuWidth[menu_id]>0) {
		turnMenuOn(menu_id);
	} else {
		t = setTimeout("turnMenuOn('"+menu_id+"')",400);
	}
}

function hideMenu(menu_id) {
	menuOn[menu_id] = false;
	
	if (menuWidth[menu_id] && menuWidth[menu_id]<160) {
		turnMenuOff(menu_id);
	} else {
		t = setTimeout("turnMenuOff('"+menu_id+"')",400);
	}
}

function turnMenuOn(menu_id) {
	if (menuOn[menu_id]) {
		t = setTimeout("slideIn('"+menu_id+"')",10);
	}
}

function turnMenuOff(menu_id) {
	if (!menuOn[menu_id]) {
		t = setTimeout("slideOut('"+menu_id+"')",10);
	}
}

function slideIn(menu_id) {
	if (menuOn[menu_id]) {
		if (menuWidth[menu_id]) {
			menuWidth[menu_id] = Math.min(menuWidth[menu_id]+30, 160);
		} else {
			menuWidth[menu_id] = 10;
		}
//document.getElementById("site_services").innerHTML = document.getElementById("site_services").innerHTML + "in " + menuWidth[menu_id] + "<br>";
		var menu_element = document.getElementById('menu_' + menu_id);
		menu_element.style.margin = "0px 0px 0px " + (menuWidth[menu_id]-160) + "px";

			menu_element.style.filter = "alpha(opacity=" + (menuWidth[menu_id] * 100 / 160) + ")";
			menu_element.style.opacity = (menuWidth[menu_id] / 160);
			menu_element.style.MozOpacity =  (menuWidth[menu_id] / 160);

		//menu_element.style.filter = "alpha(opacity=100)"
		//menu_element.style.opacity = "1";
		//menu_element.style.MozOpacity = "1";
		menu_element.style.display = "block";

		if (menuWidth[menu_id] < 160) {
			t = setTimeout("slideIn('"+menu_id+"')",10);
		} else {
			document.getElementById("menu_option_" + menu_id).style.background = "#3784c3"
			document.getElementById("menu_option_" + menu_id).style.fontWeight = "bold"
		}
	}
}



function slideOut(menu_id) {
	if (!menuOn[menu_id]) {
		if (menuWidth[menu_id]) {
			menuWidth[menu_id] -= 5;
			var menu_element = document.getElementById('menu_' + menu_id);
			//menu_element.style.margin = "0px 0px 0px " + (menuWidth[menu_id]-160) + "px";

			menu_element.style.filter = "alpha(opacity=" + (menuWidth[menu_id] * 100 / 160) + ")";
			menu_element.style.opacity = (menuWidth[menu_id] / 160);
			menu_element.style.MozOpacity =  (menuWidth[menu_id] / 160);
			if (menuWidth[menu_id] < 1) {
				menu_element.style.display = "none";
				document.getElementById("menu_option_" + menu_id).style.background = ""
				if (document.getElementById("menu_option_" + menu_id).className != "site_menu_main_item") document.getElementById("menu_option_" + menu_id).style.fontWeight = "normal"
			
			} else {
				t = setTimeout("slideOut('"+menu_id+"')",10);
			}
		}

	}
}







/*

function slideIn(menu_id) {
	var menu_element = document.getElementById(menu_id);
	menus_width[menu_id] +=20;
	menu_element.style.width = menus_width[menu_id] + "px";
	if (menus_width[menu_id]<200) {
		t = setTimeout("slideIn('"+menu_id+"')",1);
	} else {
		menus_status[menu_id] = "open";
	}
}


function slideOut(menu_id) {
	if (menus_status[menu_id] == "closing") {
		var menu_element = document.getElementById(menu_id);
		menus_width[menu_id] -=20;
		menu_element.style.width = menus_width[menu_id] + "px";
		if (menus_width[menu_id]>0) {
			t = setTimeout("slideOut('"+menu_id+"')",1) 
		} else {
			menus_status[menu_id] = "closed";
			menu_element.style.display = "none";
		}
	}
}
*/


