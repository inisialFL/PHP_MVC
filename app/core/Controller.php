<?php

//perbedaan Controller di folder core dan Controller di folder controllers
//Controller di folder core merupakan class utama, sedangkan..
//Controller di folder controllers adalah Controller yang akan extends ke Controller di folder core
class Controller {
	public function view($view, $data = []) {
		require_once '../app/views/' . $view . '.php';
	}

	public function model($model) {
		require_once '../app/models/' . $model . '.php';	
		//karena model adalah class jadi harus di instansiasi
		return new $model;
	}
}

