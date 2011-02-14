<?php
	include("includes/config.php");
	include("includes/connect.php");
	include("includes/functions.inc.php");
	include("lang/en.php");
	
	if($_POST) {
		$datetime = date("Y-m-d H:i:s");
		$name = $mysqli->real_escape_string($_POST["name"]);
		$email = $mysqli->real_escape_string($_POST["email"]);
		$website = $mysqli->real_escape_string($_POST["website"]);
		$rawTxt = $_POST["text"];
		$text = $mysqli->real_escape_string($rawTxt);		if($name && $text) {			$sql = "INSERT INTO `nf_posts`";
			$sql .= "(`post_id`, `post_datetime`, `post_username`, `post_email`, `post_website`, `post_msg`)";
			$sql .= "VALUES";
			$sql .= "('', '$datetime', '$name', '$email', '$website', '$text')";
			$sql .= "; ";
			
			$inserted = $mysqli->query($sql) or die(mysql_error());
			
			if($inserted) {
				$msg = $lang["msgadd"];
				unset($name);
				unset($email);
				unset($website);
				unset($rawTxt);
			} else {
				exit;
				$error = $lang["error"];
			}		} else {
			$error = $lang["probadd"];
		}	}
	header('Content-Type: text/html; charset=UTF-8');
	echo "<" . '?xml version="1.0" encoding="UTF-8" ?' . ">\r";
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
	<title><?php echo $config["forum_name"] ?></title>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
    <link rel="stylesheet" href="style.css" />
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>
    <link rel="alternate" title="Latests posts" type="application/rss+xml" href="rss.php" />
</head>
<body>
	<div id="container">
		<div id="header">
			<h1><?php echo $config["forum_name"] ?></h1>
		</div>
		<div id="menu">
			<a href="#">Link 1</a> <a href="#">Link 2</a> <a href="#">Link 3</a>
		</div>
		<div id="mainpage">
        	<?php
				$sql = $mysqli->query("SELECT * FROM `nf_posts` ORDER BY `post_datetime` DESC");
				while ($row = mysqli_fetch_assoc($sql)) {
			?>
                <h3><?php echo $lang["by"]?> <?php echo nameAndMail($row["post_username"], $row["post_website"]); if(!empty($row["post_email"])) {?> :: <?php echo changeMail($row["post_email"]);}?></h3>
                <p class="date"><?php echo changeDate($row["post_datetime"]) ?></p>
                <div class="postbg"><p class="post"><?php echo textFormat($row["post_msg"])?></p></div>
                <br/><!-- <p class="extraInfo">Een beetje extra info</p>-->
			<?php
				}
			?>
			<hr />
			<h3><?php echo $lang["newmsg"]?></h3>
			<?php if(isset($error)){?><span class="error"><?php echo $error?></span><?php }?>
			<?php if(isset($msg)){?><span class="added"><?php echo $msg?></span><?php }?>
			<div id="fastPost">
				<p id="smileyss">
				<?php
					$smiley_path = "images/smileys/";					$sql = $mysqli->query("SELECT * FROM `nf_smileys`");
					while ($row = mysqli_fetch_assoc($sql)) {
				?>
					<img class="smiley" id="<?php echo $row["smiley_trigger"]?>" src="<?php echo $smiley_path . $row["smiley_url"]?>" alt="<?php echo $row["smiley_alt"]?>" title="<?php echo $row["smiley_name"]?>" />
				<?php
					}				?>
				</p>
				<p id="info">
					<?php echo $lang["username"]?>:<br />
					<?php echo $lang["email"]?>:<br />
					<?php echo $lang["website"]?>:<br />
				</p>
				<form action="index.php" method="post">
					<input type="text" name="name" class="longInput" <?php if(isset($name)){?>value="<?php echo $name?>"<?php }?> /><br />
					<input type="text" name="email" class="longInput" <?php if(isset($email)){?>value="<?php echo $email?>"<?php }?> /><br />
					<input type="text" name="website" class="longInput" <?php if(isset($website)){?>value="<?php echo $website?>"<?php }?> /><br />
					<textarea name="text" id="textArea"><?php if(isset($rawTxt)){echo $rawTxt;}?></textarea>
					<p id="sendButton">
						<input type="submit" value="<?php echo $lang["send"]?>" id="sendButton">
					</p>					
				</form>
			</div>
		</div>
		<div id="footer">
			<p>
				&copy; <a href="http://www.juje007.be">Juje007</a> - 2010
			</p>
		</div>
	</div>
	<script type="text/javascript">
		/*Script for the smiley inserter*/
		$(function(){
			$(".smiley").click(function(){
				console.log($(this).attr('id'));
				$("#textArea").val($("#textArea").val() + $(this).attr('id'));
			});
		});
	</script>
</body>
</html>
<?php	$mysqli->close();?>