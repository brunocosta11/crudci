<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function index()
	{
		permission();
		$this->load->model("games_model");
		$data ["games"] = $this->games_model->index();
		$data ["title"] = "Dashboard - Codeigniter";

		$this->load->view('templates/header', $data);
		$this->load->view('templates/nav-top', $data);
		$this->load->view('pages/dashboard', $data);
		$this->load->view('templates/footer', $data);
		$this->load->view('templates/js', $data);
	}

	public function pesquisar()
	{
		permission();

		$this->load->model("busca_model");
		$data ["title"] = "Resultado da pesquisa por *". $_POST["busca"] . "*";
		$data ["result"] = $this->busca_model->buscar($_POST);



		$this->load->view('templates/header', $data);
		$this->load->view('templates/nav-top', $data);
		$this->load->view('pages/resultado', $data);
		$this->load->view('templates/footer', $data);
		$this->load->view('templates/js', $data);
	}
	
}
