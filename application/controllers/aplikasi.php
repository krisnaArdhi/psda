<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Aplikasi extends CI_Controller {
	function __construct(){
 parent::__construct();
  $this->load->library('leaflet');
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
		$data['wilayah']  = $this->m_air->wilayah();
		$this->load->view('aplikasi/index');
	}
	public function data_petugas()
	{
		$data['petugas'] = $this->m_air->petugas();
		$data['wilayah']  = $this->m_air->wilayah();
		$this->load->view('aplikasi/data_petugas',$data);
	}
	public function data_bendung()
		{
			$data['bendung'] = $this->m_air->bendung();

			$data['wilayah']  = $this->m_air->wilayah();


			$this->load->view('aplikasi/data_bendung',$data);
		}

		public function detail_bendung()
			{
				$id=$this->uri->segment(3);
				$data['bendung'] = $this->m_air->detail_bendung($id);
				foreach($data['bendung'] as $item)
				{
				$a = $item['longitude'];
				$b = $item['latitude'];
				}
				$arr = array($a,$b);
				$config = array(
				 'center'         => implode(",",$arr), // Center of the map
				 'zoom'           => 12, // Map zoom
				 );

				$this->leaflet->initialize($config);

				$marker = array(
				 'latlng' 		=>implode(",",$arr), // Marker Location
				 'popupContent' 	=> 'Hi, iam a popup!!', // Popup Content
				 );
				 $this->leaflet->add_marker($marker);
				 $data['map'] =  $this->leaflet->create_map();


				$this->load->view('aplikasi/peta_bendung',$data);
			}

		public function lapor()
			{
				$data['bendung'] = $this->m_air->bendung();

				$data['wilayah']  = $this->m_air->wilayah();
				$this->load->view('aplikasi/lapor',$data);
			}



}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
