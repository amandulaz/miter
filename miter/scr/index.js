var count = "250";
function limiter(){
	var tex = document.miterform.miter.value;
	var len = tex.length;
	if(len > count){
		tex = tex.substring(0,count);
		document.miterform.miter.value = tex;
		return false;
	}
	document.miterform.submit.value = count-len;
}

function confirm_delete() {
	return confirm('Delete?');
}

function validate() {
    var miterbox = document.forms["miterform"]["miter"].value;
    if (miterbox == "") {
        return false;
	}
}