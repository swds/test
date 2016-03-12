$(document).ready(function(){
		
	//Подключение подсказок
	showUsers();
	showCities();
	showQualifications();
		$('[data-toggle="tooltip"]').tooltip(); 			
		var inProgress = false;

		$('#searchName').on('input', function () {
		$this = $(this);
		var min_length = 0;
		var keyword = $this.val();
		$my_data = 'action=searchName&value='+keyword;

		if (keyword.length >= min_length) {
			$.ajax({
				type: 'POST',
				url: 'core/core.php',
				data: $my_data,
				dataType: 'json',
				beforeSend: function() {
					$('#search_list').prepend('<li class="list-group-item" id="loading"><img src="template/images/ajax.gif"> Loading...</li>');
					inProgress = true;
				}
				}).done(function($data){
					$('#search_list li').remove();
					$('#loading').remove();
					if ($data != '') {
						$('#search_list').css("display", "inline");
						$('#search_list a').remove();
						$.each($data, function(index, search) {
								$('#search_list').append('<li class="list-group-item" onclick="showUsers('+search.id+')">'+search.name+'</li>');
						});
						$('#searchName').val(search.name);
					}else{
						$('#search_list a').remove();
						$('#search_list').append('<a href="" class="list-group-item">Пользователь не найден!  =(</a>');
					}
					inProgress = false; 
			});
		} else {
		  $('#search_list').hide();
		  inProgress = false; 
		}
	});
	
	// Применить фильтры.	
	$('#getFilter').click(function(){
		var $users = $('#users');
		var $more = $('#more');
		var cities = new Array();
		var i = 0;
		$('#cities option:selected').each(function( index ) {
			cities[i] = $(this).val();
			i++;
		});
		var qualifications = new Array();
		var i = 0;
		$('#qualifications option:selected').each(function( index ) {
			qualifications[i] = $(this).val();
			i++;
		});
		
		$my_data = 'action=filters&qualifications='+qualifications+'&cities='+cities;
		$.ajax({
			type: 'POST',
			url: 'core/core.php',
			data: $my_data,
			dataType: 'json',
			beforeSend: function() {
                $users.hide();
                $more.hide();
                $users.after('<span id="loading"><img src="template/images/ajax.gif"> Loading...</span>');
				inProgress = true; // Ставим статус обработки True
			}
			}).done(function($data){
				inProgress = false;
				$('#loading').remove();
				alert($data);
				if ($data != ''){
					$users.show();
					alert('Выберите в начале фильтры!!');
				}else{
					
				}
			});
	});	
		/* Подгрузка новых пользователей по клику */
		$('#more').click(function(){
			if (!inProgress) {
				showUsers('getMore');
				
			}
		});
		// Обновить таблицу
		$('#resset').click(function(){
			if (!inProgress) {
				showUsers();
			}
		});

	});

	var startFrom = 10; // Начальнй лимит загрузки пользователей
	var inProgress = false; // Статус обработки Ajax - чтоб не загружать процесс повторными запросами.
	
	/* Подгрузка пользователей в таблицу */
	function showUsers($type){
        var $more = $('#more');
        var $users = $('#users');
        var $search_list = $('#search_list');
        var $users_tr = $('#users tr');
        var $my_data;

		if ($type == 'getMore'){
			$my_data = 'action=showUsers&startFrom='+startFrom;
		}else if($.isNumeric($type)){
			$my_data = 'action=showUsers&userID='+$type;
            $search_list.hide();
            $users_tr.remove();
            $more.remove();
		}else{
            $users_tr.remove();
			$my_data = 'action=showUsers';
		}

		$.ajax({
			type: 'POST',
			url: 'core/core.php',
			data: $my_data,
			dataType: 'json',
			beforeSend: function() {
                $more.css("display", "none");
                $more.after('<span id="loading"><img src="template/images/ajax.gif"> Loading...</span>');
				inProgress = true; // Ставим статус обработки True
			}
			}).done(function($data){
				$('#loading').remove();
				if ($data != '') {
						$.each($data, function(index, user) {
							$users.append('' +
								'<tr>' +
									'<td>'+user.name+'</td>' +
									'<td>'+user.qualification+'</td>' +
									'<td>'+user.city+'</td>' +
								'</tr>');
					});
					$more.show();
					if ($type == 'getMore'){
						startFrom += 10; // Пошле добавления строк в таблицу - добавить лимит +10
						inProgress = false; // Ставим статус обработки False
					}
					
				}else{
					$more.remove();
				}
		});
	}
	
	function showQualifications (){
		var $qualifications = $('#qualifications');
		$my_data = 'action=showQualifications';
		$.ajax({
			type: 'POST',
			url: 'core/core.php',
			data: $my_data,
			dataType: 'json',
			beforeSend: function() {
                $qualifications.hide();
                $qualifications.after('<span id="loading_qualifications"><img src="template/images/ajax.gif"> Loading...</span>');
				inProgress = true; 						// Ставим статус обработки True
			}
			}).done(function($data){
				if ($data != '') {
					$('#loading_qualifications').remove();
					$qualifications.show();
						$.each($data, function(index, qualification) {
                            $qualifications.append('<option value="'+qualification.id+ '">'+qualification.name+'</option>');
					});
					
				}else{
                   $(loading_qualifications).remove();
				}
		});
	}

	function showCities (){
		var $cities = $('#cities');
		$my_data = 'action=showCities';
		$.ajax({
			type: 'POST',
			url: 'core/core.php',
			data: $my_data,
			dataType: 'json',
			beforeSend: function() {
                $cities.hide();
                $cities.after('<span id="loading_cities"><img src="template/images/ajax.gif"> Loading...</span>');
				inProgress = true; 							// Ставим статус обработки True
			}
			}).done(function($data){
				if ($data != '') {
					$('#loading_cities').remove();
					$cities.show();
						$.each($data, function(index, city) {
                            $cities.append('<option value="'+city.id+ '">'+city.name+'</option>');
					});
					
				}else{
                   $('#loading_cities').remove();
				}
		});
	}