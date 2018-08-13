
  <?php if(!defined('BASEPATH')) exit('Keluar dari sistem');
  class M_air extends CI_Model
  {
   public function __construct()
   {
    parent::__construct();
   }

   public function simpan_laporan($data)
   	{
      		$hasil=$this->db->insert('laporan', $data);

   		return $hasil;
   	}
    function petugas()
      {
        $this->db->join('wilayah','petugas_lapangan.id_wilayah=wilayah.id_wilayah');

        $query = $this->db->get('petugas_lapangan');
            return $query->result();
      }
      function bendung()
        {
          $this->db->join('wilayah','bendung.id_wilayah=wilayah.id_wilayah');

          $query = $this->db->get('bendung');
              return $query->result();
        }
        function detail_bendung($id)
          {
            $this->db->join('wilayah','bendung.id_wilayah=wilayah.id_wilayah');
            $this->db->where('id_bendung',$id);
            $query = $this->db->get('bendung');
                return $query->result_array();
          }
    function wilayah()
      {
        $query = $this->db->get('wilayah');
            return $query->result();
      }
  }
  ?>
