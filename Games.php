<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Games extends CI_Controller {

	public function index()
	{
		permission();
		$this->load->model("games_model");
		$data ["games"] = $this->games_model->index();
		$data ["title"] = "Games - Codeigniter";

		$this->load->view('templates/header', $data);
		$this->load->view('templates/nav-top', $data);
	    $this->load->view('pages/games', $data);
		$this->load->view('templates/footer', $data);
		$this->load->view('templates/js', $data);
	}
	public function new()
	{
		permission();
		$data ["title"] = "Games - Codeigniter";

		$this->load->view('templates/header', $data);
		$this->load->view('templates/nav-top', $data);
	    $this->load->view('pages/form-games', $data);
		$this->load->view('templates/footer', $data);
		$this->load->view('templates/js', $data);
	}

	public function store()
	{
		permission();
		$game = $_POST;
		
		$this->load->model("games_model");
		$this->games_model->store($game);
		redirect("dashboard");
	
	}

	public function edit($id)
	{  
		permission();
		 $this->load->model("games_model");
		$data ["game"] = $this->games_model->show($id);
		$data ["title"] = "Edit Game - Codeigniter";

		$this->load->view('templates/header', $data);
		$this->load->view('templates/nav-top', $data);
	    $this->load->view('pages/form-games', $data);
		$this->load->view('templates/footer', $data);
		$this->load->view('templates/js', $data);


	}

	public function update($id)
	{
		permission();
		$this->load->model("games_model");
		$game = $_POST;
		$this->games_model->update($id, $game);
		redirect("games");
	}

	public function delete($id)
	{
		permission();
		$this->load->model("games_model");
		$this->games_model->destroy($id);
		redirect("games");
	}

	public function mygames()
	{
		$dados["games"]  = $this->games_model->mygames_index();
		$dados["title"] = "My Games - CodeIgniter";

		$this->load->view('templates/header', $dados);
		$this->load->view('templates/nav-top', $dados);
		$this->load->view('pages/my-games', $dados);
		$this->load->view('templates/footer', $dados);
		$this->load->view('templates/js', $dados);
	}


}