<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('frases_model', 'model_frases');
		$this->frases = $this->model_frases->listar_frases();
	}

	public function index(): void
	{
		$dados['frases'] = $this->frases;
		$dados['titulo'] = 'Home';

		$this->load->view('home/template/html-header', $dados);
		$this->load->view('home/home');
		$this->load->view('home/modal/editar');
		$this->load->view('home/modal/excluir');
		$this->load->view('home/template/html-footer');
		$this->load->view('home/modal/scripts');
	}

	public function alterar()
	{
		$id = $this->input->post('id');

		$dados = array(
			'autor' => $this->input->post('autor'),
			'texto' => $this->input->post('texto'),
			'tags' => $this->input->post('tags')
		);

		$this->model_frases->alterar($id, $dados);
	}

	public function excluir()
	{
		$id = $this->input->post('id');

		$this->model_frases->excluir($id);
	}

	public function buscar()
	{
		$html = new simple_html_dom();
		$ch = curl_init("https://quotes.toscrape.com/");

		curl_setopt($ch, CURLOPT_HEADER, 0);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

		$html->load(curl_exec($ch));

		curl_close($ch);

		$dados = array();

		$dados = $this->pegar_dados($dados, $html->find('div[class="quote"]'));

		while ($html->find('li[class="next"] a')) {
			foreach ($html->find('li[class="next"] a') as $element) {
				$ch = curl_init("https://quotes.toscrape.com/$element->href");

				curl_setopt($ch, CURLOPT_HEADER, 0);
				curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

				$html->load(curl_exec($ch));

				curl_close($ch);
				$dados = $this->pegar_dados($dados, $html->find('div[class="quote"]'));
			}
		}

		$this->model_frases->inserir($dados);
	}

	private function pegar_dados($dados, $busca)
	{
		foreach ($busca as $element) {
			$autor = $element->find('small[class="author"]', 0)->plaintext;
			$texto = $element->find('span[class="text"]', 0)->plaintext;
			$tags = trim(preg_replace('/\s+/', ' ', ($element->find('div[class="tags"]', 0)->plaintext)));

			$dados[] = [
				'autor' => $autor,
				'texto' => $texto,
				'tags' => $tags
			];
		}
		return $dados;
	}
}
