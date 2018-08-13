<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends CI_Controller {
	function __construct(){
 parent::__construct();
 $this->load->model('m_air');
 }
	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$data['kel_tani'] = $this->m_air->petugas();
		$data['bendung'] = $this->m_air->bendung();
		$data['wilayah']  = $this->m_air->wilayah();
		$this->load->view('index',$data);
	}
	function simpan_laporan()
 {
	if (isset($_POST['mysubmit']))
		{
	$data = array(
	'nama'     => $this->input->post('nama'),
	'no_hp'     => $this->input->post('no_hp'),
	'pesan'   => $this->input->post('laporan')
	);
	 $hasil=$this->m_air->simpan_laporan($data);
	 if ($hasil){

			 redirect('welcome/selamat');

	 }else{
		echo "Simpan data gagal";
	 }
	 echo "<br/>";
	 echo anchor('welcome', 'Kembali');
	}
	else{
		$this->load->view('tambahpetugas');
	}
	}

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
