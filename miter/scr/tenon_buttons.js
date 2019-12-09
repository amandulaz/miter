var tagtype = 'bbcode';
var id_txtfield = 'tenon';

function cursorPosition(star, en, zon){
	
	var textarea = document.getElementById(zon);
	textarea.focus();
	
	var selection_range = document.selection.createRange().duplicate();
	
	if (selection_range.parentElement() == textarea) {
		
		var before_range = document.body.createTextRange();
		before_range.moveToElementText(textarea);
		before_range.setEndPoint("EndToStart", selection_range);
		
		var after_range = document.body.createTextRange();
		after_range.moveToElementText(textarea);
		after_range.setEndPoint("StartToEnd", selection_range);
		
		var before_finished = false, selection_finished = false, after_finished = false;
		var before_text, untrimmed_before_text, selection_text, untrimmed_selection_text, after_text, untrimmed_after_text;
		
		before_text = untrimmed_before_text = before_range.text;
		selection_text = untrimmed_selection_text = selection_range.text;
		after_text = untrimmed_after_text = after_range.text;
		
		do {
			if (!before_finished) {
				if (before_range.compareEndPoints("StartToEnd", before_range) == 0) {
					before_finished = true;
					} else {
					before_range.moveEnd("character", -1)
					if (before_range.text == before_text) {
						untrimmed_before_text += "\r\n";
						} else {
						before_finished = true;
					}
				}
			}
			if (!selection_finished) {
				if (selection_range.compareEndPoints("StartToEnd", selection_range) == 0) {
					selection_finished = true;
					} else {
					selection_range.moveEnd("character", -1)
					if (selection_range.text == selection_text) {
						untrimmed_selection_text += "\r\n";
						} else {
						selection_finished = true;
					}
				}
			}
			if (!after_finished) {
				if (after_range.compareEndPoints("StartToEnd", after_range) == 0) {
					after_finished = true;
					} else {
					after_range.moveEnd("character", -1)
					if (after_range.text == after_text) {
						untrimmed_after_text += "\r\n";
						} else {
						after_finished = true;
					}
				}
			}
			
		} while ((!before_finished || !selection_finished || !after_finished));
		
		var re = new Array();
		re['startPos'] = untrimmed_before_text.length;
		re['endPos'] = re['startPos'] + untrimmed_selection_text.length;
		re['final_text'] = untrimmed_before_text +star+ untrimmed_selection_text +en+ untrimmed_after_text;
		
		return re;
	}
}

function set_xpos(zona, Xpos) {
	var txtarea = document.getElementById(zona);
	if(txtarea != null) {
		if(txtarea.createTextRange) {
			var range = txtarea.createTextRange();
			range.move('character', Xpos);
			range.select();
		}
		else {
			if(txtarea.selectionStart) {
				txtarea.focus();
				txtarea.setSelectionRange(Xpos, Xpos);
			}
			else {
				txtarea.focus();
			}
		}
	}
}

function addTag(btn, type) {
	var tgop = (tagtype == 'html') ? '[' : '<';
	var tgen = (tagtype == 'html') ? ']' : '>';
	
	var start = tgop+btn.title+tgen;
	var end = tgop+'/'+btn.title+tgen;
	
	var txtarea = document.getElementById(id_txtfield);
	if (txtarea.selectionStart || txtarea.selectionStart==0) { 
		var rezult = new Array();
		rezult['startPos'] = txtarea.selectionStart;
		rezult['endPos'] = txtarea.selectionEnd;
		rezult['final_text'] = txtarea.value.substring(0, rezult['startPos']) + start + txtarea.value.substring(rezult['startPos'], rezult['endPos']) + end + txtarea.value.substring(rezult['endPos'], txtarea.value.length);
	}
	else if (document.selection) {
		var rezult = cursorPosition(start, end, id_txtfield);
	}
	
	txtarea.value = rezult['final_text'];
	var Xpos = rezult['endPos']+start.length;
	set_xpos(id_txtfield, Xpos);
}

function addSym(btn, type) {
	var tgop = (tagtype == 'html') ? '<' : '[';
	var tgen = (tagtype == 'html') ? '>' : ']';
	
	var start = btn.title;
	var end = '';
	
	var txtarea = document.getElementById(id_txtfield);
	if (txtarea.selectionStart || txtarea.selectionStart==0) { 
		var rezult = new Array();
		rezult['startPos'] = txtarea.selectionStart;
		rezult['endPos'] = txtarea.selectionEnd;
		rezult['final_text'] = txtarea.value.substring(0, rezult['startPos']) + start + txtarea.value.substring(rezult['startPos'], rezult['endPos']) + end + txtarea.value.substring(rezult['endPos'], txtarea.value.length);
	}
	else if (document.selection) {
		var rezult = cursorPosition(start, end, id_txtfield);
	}
	
	txtarea.value = rezult['final_text'];
	var Xpos = rezult['endPos']+start.length;
	set_xpos(id_txtfield, Xpos);
}