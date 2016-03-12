<?php
/*
 * Система показа студентов.
 * ver 0.1
 * designed by: swds.dll (Христодоров Ю.И.)
 * contacts: http://vk.com/aaee_baby
 */

    require_once ('core/core.php');

?>

<!DOCTYPE HTML>
<html>
<head>
    <meta charset = "utf-8" />
    <title><?php echo Config::$core_cfg['title'] ?></title>
    <link rel="stylesheet" href="template/css/bootstrap.min.css" >
    <link rel="stylesheet" href="template/css/style.css" >
    <script type="text/javascript" src="template/js/jquery.js"></script>
    <script type="text/javascript" src="template/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="template/js/scripts.js"></script>
</head>
    <body>
        <div class="container">
            <h1><?php echo Config::$core_cfg['title'] ?></h1>

            <div class="col-lg-6">
				<div class="input-group">
				<span class="input-group-addon">Поиск по ФИО:</span>
				<input type="text" id="searchName" class="form-control" style="height: 50px; font-size: 16px;" placeholder="Введите ФИО..."/>
                </div>
                    <ul id="search_list" class="list-group" style="width:100%; padding-left: 125px;" ></ul>

			</div>
            <div style="padding-top: 200px;">
			    <div style="float:right; padding: 10px;" >
                    <a class="btn btn-primary btn-sm" id="resset" data-toggle="tooltip" data-placement="bottom" title="Обновить таблицу"><i class="glyphicon glyphicon-refresh"></i></a>
                </div>
                <div class="col-lg-5" >
					<div class="col-lg-6" style="padding-right: 30px;">
					<h4>Города</h4>
						<div class="form-group">
							<select class="form-control" id="cities" name="cities[]" multiple>
						
							</select>
						</div>
					</div>
					<div class="col-lg-6" style="padding-left: 30px;">
					<h4>Образование</h4>
						<div class="form-group">
							<select class="form-control" id="qualifications" name="qualifications[]"  multiple>
						
							</select>
						</div>
					</div>
					<button class="btn btn-primary btn-sm" id="getFilter">Применить фильтер</button>
                </div>
                <div class="col-lg-7">
                    <table class="table table-striped">
                        <thead>
                            <th>ФИО</th>
                            <th>Образование</th>
                            <th>Город</th>
                        </thead>
                        <tbody id="users">

                        </tbody>
                    </table>
                    <button class="btn btn-primary btn-sm" id="more">Показать еще</button>
                </div>
            </div>
    </body>
</html>