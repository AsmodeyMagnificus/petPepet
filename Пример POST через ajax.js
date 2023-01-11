//Смена пароля
function clear_repass() {
  document.forms["form_repass"].reset();
}
function save_repass(old_pass, new_pass, new_pass2, logins, ids){
	if (old_pass == false || new_pass == false || new_pass2 == false)
	{
		$("#result_repass").css("background", "rgba(232, 14, 14, 0.4)");
		var ee = document.getElementById("result_repass");
		ee.innerText = "Пустые поля!";
		$('#result_repass').show();
		setTimeout(function() { $('#result_repass').hide(); }, 4000);
		$('#button_1_repass').attr('disabled', true);
		setTimeout(function() { $('#button_1_repass').attr('disabled', false); }, 4000);
	}
	else
	{
		$.ajax({
			type: "POST",
			url: '/jaysewen115_Script/ajaxScript.php',
			data:{action_0: 'save_repass', action_1: strRep(old_pass), action_2: strRep(new_pass), action_3: strRep(new_pass2), action_4: strRep(logins), action_5: strRep(ids)},
			success:function(data) {
				if (data == 'Пароль изменен!')
				{
					$("#result_repass").css("background", "rgba(119, 221, 119, 0.4)");
				}
				else
				{
					$("#result_repass").css("background", "rgba(232, 14, 14, 0.4)");
				}
				//
				$("#result_repass").text(data);
				$('#result_repass').show();
			}
		});
		$('#button_1_repass').attr('disabled', true);
		setTimeout(function() { $('#result_repass').hide(); }, 4000);
		setTimeout(function() { $('#button_1_repass').attr('disabled', false); }, 4000);
	}
}
