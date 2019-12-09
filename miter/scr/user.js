function validate_user() {
    var userinput = document.forms["miter_user_form"]["miter_user"].value;
    if (userinput == "") {
        return false;
	}
}

function validate_title() {
    var colorinput = document.forms["miter_title_form"]["user_title"].value;
    if (colorinput == "") {
        return false;
	}
}

function validate_color() {
    var colorinput = document.forms["miter_color_form"]["miter_color"].value;
    if (colorinput == "") {
        return false;
	}
}

function validate_header() {
    var colorinput = document.forms["miter_header_form"]["user_header"].value;
    if (colorinput == "") {
        return false;
	}
}

function validate_border() {
    var colorinput = document.forms["miter_border_form"]["user_border"].value;
    if (colorinput == "") {
        return false;
	}
}

function confirm_delete() {
	return confirm('Delete Miter?');
}