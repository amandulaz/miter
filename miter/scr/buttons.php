<table class="html_table">
	<tr>
		<td class="html_td" align="center">
			
			<input type="button" value="b" title="b"      onclick="addTag(this)" class="tenon_format_button" />
			<input type="button" value="i" title="i"      onclick="addTag(this)" class="tenon_format_button" />
			<input type="button" value="u" title="u"      onclick="addTag(this)" class="tenon_format_button" />
			<input type="button" value="s" title="s"      onclick="addTag(this)" class="tenon_format_button" />
			
			<input type="button" value="_blank"           onclick="inserttag('tenon', '<a href=\'\' target=\'_blank\'>');"  class="tenon_format_button" />
			<input type="button" value="?t="              onclick="inserttag('tenon', '<a href=\'?t=\'>');"                 class="tenon_format_button" />
			<input type="button" value="/a"               onclick="inserttag('tenon', '</a>');"                             class="tenon_format_button" />
			<input type="button" value="/div"             onclick="inserttag('tenon', '</div>');"                           class="tenon_format_button" />
			<input type="button" value="hr"               onclick="inserttag('tenon', '<hr>');"                             class="tenon_format_button" />
			<input type="button" value="&amp;lt;"         onclick="inserttag('tenon', '&amp;lt;');"                         class="tenon_format_button" />
			
			<input type="button" value="img"              onclick="inserttag('tenon', '<img src=\'\'>');"                   class="tenon_format_button" />
			<input type="button" value="center"           onclick="inserttag('tenon', '<div align=\'center\'>');"           class="tenon_format_button" />
			<input type="button" value="youtube"          onclick="inserttag('tenon', '<div class=\'youtube\'><iframe class=\'youtube_iframe\' src=\'https://www.youtube.com/embed/\' frameborder=\'0\' allow=\'accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture\' allowfullscreen></iframe></div>');" class="tenon_format_button" />
			<input type="button" value="mp4"              onclick="inserttag('tenon', '<div class=\'video\'><video class=\'video_iframe\' controls><source src=\'\' type=\'video/mp4\'></video></div>');" class="tenon_format_button" />
			<input type="button" value="webm"             onclick="inserttag('tenon', '<div class=\'video\'><video class=\'video_iframe\' controls><source src=\'\' type=\'video/webm\'></video></div>');" class="tenon_format_button" />
			
			<input type="button" value="pre" title="pre"  onclick="addTag(this)" class="tenon_format_button" />
			<input type="button" value="table"            onclick="inserttag('tenon', '<table cellpadding=\'0\' cellspacing=\'0\' width=\'100%\'><tr><td width=\'\'>');" class="tenon_format_button" />
			<input type="button" value="/td"              onclick="inserttag('tenon', '</td><td width=\'\'>');"             class="tenon_format_button" />
			<input type="button" value="/table"           onclick="inserttag('tenon', '</td></tr></table>');"               class="tenon_format_button" />
			
			<input type="button" value="small"            onclick="inserttag('tenon', '<span class=\'small\'>');"           class="tenon_format_button" />
			<input type="button" value="/span"            onclick="inserttag('tenon', '</span>');"                          class="tenon_format_button" />
			<input type="button" value="sup" title="sup"  onclick="addTag(this)" class="tenon_format_button" />
			<input type="button" value="sub" title="sub"  onclick="addTag(this)" class="tenon_format_button" />
			
		</td>
	</tr>
</table>

<script src="scr/tenon_buttons.js"></script>