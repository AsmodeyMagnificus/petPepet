<?php
session_start();
$logins = strval($_SESSION['user_login']);
$ids = strval($_SESSION['user_id']);
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="Cache-Control" content="private">
	<link rel="stylesheet" href="/css/styl_priem.css?rnd=<?= rand(0, 999) ?>" />
	<script src="/jaysewen115_Script/jquery.js"></script>
	<script src="/jaysewen115_Script/jscript.js"></script>
</head>
<body >
<div id="body_repass">
</div>
<div>
		<form id="form_repass">
			<h2>СМЕНА ПАРОЛЯ</h2>
			<label>Старый пароль:</label><br/>
			<input id="old_repass" autocomplete="off" type="password"><br/>
			<label>Новый пароль:</label><br/>
			<input id="new_repass" autocomplete="off" type="password"><br/>
			<label>Новый пароль повторно:</label><br/>
			<input id="new_repass_2" autocomplete="off" type="password"><br/>
		</form>
		
		<button id="button_1_repass" onclick="save_repass(old_repass.value, new_repass.value, new_repass_2.value, ' <?php echo $logins; ?> ', ' <?php echo $ids; ?> ')"><img src="/image110131/ok.png" width="20px" style="vertical-align: middle;"></img>Сохранить</button>
		<button id="button_2_repass" onclick="clear_repass()"><img src="/image110131/close.png" width="20px" style="vertical-align: middle"></img>Очистить</button><br/>
		<div id="result_repass"></div><br/><br/><br/>


</div>

</body>
</html>