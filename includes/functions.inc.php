<?php
	function changeMail($mail) {
		$mail = preg_replace("/@/", "[at]", $mail);
		return preg_replace("/\./", "[dot]", $mail);
	}
	function changeDate($date) {
		$date = strtotime($date);
		return date("l, F j, Y @ g:i A", $date);
	}
	function nameAndMail($uname, $website) {
		if(!preg_match("/\.([a-z]{2,4})/", $website) || preg_match("/^ftp:\/\//", $website)) {
			echo $uname;
		} else {
			if(preg_match("/^http:\/\//", $website)) {
				$website = $website;
			} elseif(preg_match("/^https:\/\//", $website)) {
				$website = $website;
			} else {
				$website = "http://" . $website;
			}
			echo "<a href=\"" . $website . "\" title=\"" . $website . "\">" . $uname . "</a>";
		}
	}
	function textFormat($text) {
		$text = htmlspecialchars($text);
		$text = nl2br($text);
		// Encode it for the coding tag
		preg_match("/\[code]((.|\s)*?)\[\/code]/", $text, $matchs, PREG_OFFSET_CAPTURE);
		$code = str_replace("[", "[%", $matchs[0][0]);
		
		//UBBCodes
		$text = preg_replace("/\[b](.*?)\[\/b]/", "<span class=\"bold\">\\1</span>", $text);
		$text = preg_replace("/\[u](.*?)\[\/u]/", "<span class=\"underline\">\\1</span>", $text);
		$text = preg_replace("/\[i](.*?)\[\/i]/", "<span class=\"italic\">\\1</span>", $text);
		$text = preg_replace("/\[center](.*?)\[\/center](<br \/>|)/", "<span class=\"center\">\\1</span>", $text);
		$text = preg_replace("/\[right](.*?)\[\/right](<br \/>|)/", "<span class=\"right\">\\1</span>", $text);
		$text = preg_replace("/\[left](.*?)\[\/left](<br \/>|)/", "<span class=\"left\">\\1</span>", $text);
		$text = preg_replace("/\[url](.*?)\[\/url]/", "<a href=\"\\1\">\\1</a>", $text);
		$text = preg_replace("/\[url=(.*?)](.*?)\[\/url]/", "<a href=\"\\1\">\\2</a>", $text);
		$text = preg_replace("/\[img](.*?)\[\/img]/", "<img src=\"\\1\" alt=\"Image\" />", $text);
		$text = preg_replace("/\[quote](.*?)\[\/quote](<br \/>|)/", "<span class=\"quoteTitle\">Quote:</span><span class=\"quote\">\\1</span>", $text);
		$text = preg_replace("/\[quote=(.*?)](.*?)\[\/quote](<br \/>|)/", "<span class=\"quoteTitle\">Quote: &quot;\\1&quot;</span><span class=\"quote\">\\2</span>", $text);
		$text = preg_replace("/\[list](<br \/>)((.|\s)*?)\[\/list](<br \/>|)/", "</p><ul>\\2</ul><p class=\"post\">", $text);
		$text = preg_replace("/\[olist](<br \/>)((.|\s)*?)\[\/olist](<br \/>|)/", "</p><ol>\\2</ol><p class=\"post\">", $text);
		$text = preg_replace("/\[li](.*?)<br \/>/", "<li>\\1", $text);
		
		// Code Tag
		$code = str_replace("[%", "[", $code);
		$code = preg_replace("/\[\/code](<br \/>|)/", "[/code]", $code);
		preg_match_all("/\[code]((.|\s)*?)\[\/code]/", $code, $match, PREG_SET_ORDER);
		foreach($match as $str) {
			$rawStr = $str[1];
			$str = str_replace("<br />", "", $rawStr);
			$str = html_entity_decode($str);
			$str = highlight_string($str, TRUE);
			$text = preg_replace("/\[code]((.|\s)*?)\[\/code]/", "<span class=\"code\">" . $str . "</span>", $text);
		}
		
		// Smileys
		$smiley_path = "images/smileys/";
		global $mysqli;
		$sql = $mysqli->query("SELECT * FROM `nf_smileys`");
		while ($row = mysqli_fetch_assoc($sql)) {
			$text = str_replace(" " . htmlentities($row["smiley_trigger"]), " <img src=\"" . $smiley_path . $row["smiley_url"] . "\" alt=\"" . $row["smiley_alt"] . "\" title=\"" . $row["smiley_name"] . "\" />", $text);
		}
		return $text;
	}
