<?php
session_start();
$logins = strval($_SESSION['user_login']);
$ids = strval($_SESSION['user_id']);
$prav = strval($_SESSION['user_prav']);
$group = $_SESSION['group_sotr'];
$link = mysqli_connect("localhost", "***", "***");
		if (strval($_POST['action_0']) == 'save_repass')
		{
			#Выбираем базу
			$sql = 'USE priem_schema';
			$result = mysqli_query($link, $sql);
			if ($result == false) 
			{
				echo "<br>Произошла ошибка при выполнении запроса";
				echo "<br> " . mysqli_error($link);
				return;
				exit;
			}
			$sql = "SELECT * FROM p_sotr WHERE idp_sotr = " .trim(strval($_POST['action_5'])); //idp_sotr = '" .strval($_POST['action_5']). "' AND
			$result_1 = mysqli_query($link, $sql);
			if (!$result_1)
			{
				echo "Нет совпадений логина и id!";
				return;
				exit;
			}
			else
			{
				$row = mysqli_fetch_assoc($result_1);
				if (trim(strval($row['passp_sotr'])) == trim(strval($_POST['action_1'])))
				{
					if (trim(strval($_POST['action_2'])) == trim(strval($_POST['action_3'])))
					{
						$sql = "UPDATE p_sotr SET passp_sotr = '".trim(strval($_POST['action_2']))."' WHERE idp_sotr = ".trim(strval($_POST['action_5']));
						$result_1 = mysqli_query($link, $sql);
						echo 'Пароль изменен!';
						return;
					}
					else
					{
						echo "Пароли не совпадают!";
						return;
					}

				}
				else
				{
					echo "Неверный пароль!";
					return;
				}
			}
		}
		if ($_POST['action_0'] == 'delete_priem_2')
		{
			#Выбираем базу
			$sql = 'USE priem_schema';
			$result = mysqli_query($link, $sql);
			if ($result == false) 
			{
				echo "<br>Произошла ошибка при выполнении запроса";
				echo "<br> " . mysqli_error($link);
				return;
				exit;
			}
			if ($prav == '3' and trim($_POST['action_2']) != trim($logins))
			{
				
				echo "Недостаточно прав!";
				return;
				exit;
			}
			else
			{
				$sql = "DELETE FROM p_registr WHERE id = '".$_POST['action_1']."'";
				$result_1 = mysqli_query($link, $sql);
				if (!$result_1)
				{
					echo "Ошибка удаления!";
				}
				else
				{
					echo "Запись удалена!";
				}
				
				$sql = "INSERT INTO delete_registr (delete_registr_date, delete_registr_login, delete_registr_str) values
			('".date("Y-m-d H:i:s")."', '".$logins."', 'Удаление из 2-й формы табличного элемента. id удаленной записи - ".$_POST['action_1']."')";
				$result_1 = mysqli_query($link, $sql);
			}
		}

?>