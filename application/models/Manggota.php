<?php if ( ! defined ( 'BASEPATH' ) ) exit ('No Direct Script Access Allowed');

	class Manggota extends CI_Model {
		public $kembali = "Kembali";
		function __construct(){
			parent::__construct();
			$this->db->from( "anggota" );
			return $this->db->get();
		}
		
		function lihat_anggota() {
			$this->db->select( '*' );
			$this->db->from( 'anggota' );
			return $this->db->get();
		}

		function kel_motor() {
			$this->db->select('id_anggota,nama_anggota')->from('anggota');

			return $this->db->get();
		}

		function modal_anggota( $id_anggota ){
			$anggota = $this->db->select( "*" )
			->from( "anggota" )
			->where( "id_anggota", $id_anggota )->get();

			if( $anggota->num_rows != 1 ){
				return false;
			}

			return $anggota;
		}
		function ins_anggota($data){
			$this->db->insert( 'anggota', $data );
		}

		function l_update_anggota( $id_anggota ) {
			$query = $this->db->select('*')->from('anggota')->where( 'id_anggota', $id_anggota )->get();

			if( $query->num_rows !== 1 ){
				return false;
			}
			return $query;
		}

		function update( $data, $condition ){
			$this->db->where( 'id_anggota', $condition );
			$this->db->update( 'anggota', $data );
		}

		function delete( $condition ){
			$this->db->where('id_anggota', $condition);
			$this->db->delete('anggota');
		}

		function anggota( $id_anggota ) {
			$anggota = $this->db->select('*')->from('anggota')->where( 'id_anggota', $id_anggota )->get();
			
			return $anggota;
		}

		function jumlah_motor($id_anggota, $tgl_1, $tgl_2) {
			$kembali = "Kembali";
			$jumlah_motor = $this->db->select('*')
			->from('pengembalian')
			->join('detailpinjammotor', 'detailpinjammotor.Id_Peminjamanan = pengembalian.Id_Peminjamanan')
			->join('pembayaran', 'pembayaran.Id_Peminjaman = pengembalian.Id_Peminjamanan')
			->join('motor', 'motor.No_Registrasi = detailpinjammotor.nomer_registrasi')
			->join('anggota', 'anggota.id_anggota = motor.id_anggota')
			->join('peminjaman', 'peminjaman.Id_Peminjamanan = pengembalian.Id_Peminjamanan')
			->where('pengembalian.Tanggal_kembali >=', $tgl_1)
			->where('pengembalian.Tanggal_kembali <=', $tgl_2)
			->where("peminjaman.status", $kembali)
			->where('anggota.id_anggota', $id_anggota)->get();

			return $jumlah_motor;
		}

		function harga_motor($jam, $tipe, $hari){
			$query = $this->db->select("*")
			->from('hargasewamotor')
			->where('tipe_motor', $tipe)
			->where('jam', $jam)
			->where('hari', $hari)
			->limit('1')->get();

			if($query->num_rows != 1){
				return ( false );
			} 
			
			$hrg = $query->result()[0]->harga_sewa;
			return $hrg;
		}

		function profit_investor( $id_anggota ){
			$invest = "Investor";
			$profit = $this->db->select("*")
			->from("motor")
			->join("anggota", "anggota.id_anggota = motor.id_anggota")
			->where('motor.id_anggota', $id_anggota)
			->where("anggota.jenis", $invest);

			return $this->db->get();
		}

		function maintanence($id_anggota, $tgl_1, $tgl_2){
			$maintanence = $this->db->select('*')
			->from('motor')
			->join('anggota', 'anggota.id_anggota = motor.id_anggota')
			->join('maintanence', 'maintanence.no_motor = motor.No_Registrasi')
			->where('maintanence.tanggal >=', $tgl_1)
			->where('maintanence.tanggal <=', $tgl_2)
			->where('anggota.id_anggota', $id_anggota)->get();

			return $maintanence;
		}

		function detail_maintanence($id_anggota, $tgl_1, $tgl_2){
			$maintanence = $this->db->select('*')
			->from('motor')
			->join('anggota', 'anggota.id_anggota = motor.id_anggota')
			->join('maintanence', 'maintanence.no_motor = motor.No_Registrasi')
			->join('detailmaintanence', 'detailmaintanence.id_maintanence = maintanence.id_maintanence')
			->where('detailmaintanence.tanggal >=', $tgl_1)
			->where('detailmaintanence.tanggal <=', $tgl_2)
			->where('anggota.id_anggota', $id_anggota)->get();

			return $maintanence;
		}

		function grand_minus($id_anggota, $grand_total) {
			$this->db->where('id_anggota', $id_anggota);
			$this->db->update('anggota', $grand_total);
		}

		function guide( $id_anggota, $tgl1, $tgl2 ){
			$guide = $this->db->select("Nama_Peminjam,id_anggota,harga_per_orang,Tanggal")
			->from('peminjaman')
			->join('detail_guide', 'detail_guide.id_peminjamanan = peminjaman.Id_Peminjamanan')
			->join('anggota', 'anggota.id_anggota = detail_guide.id_angg')
			->where('peminjaman.Tanggal >=', $tgl1)
			->where('peminjaman.Tanggal <=', $tgl2)
			->where("peminjaman.status", $this->kembali)
			->where('detail_guide.id_angg', $id_anggota)->get();

			return $guide;
		}

		function marketing( $id_anggota, $tgl1, $tgl2 ){
			$marketing = $this->db->select("Nama_Peminjam,id_anggota,harga_marketing,marketing,tgl_pembayaran_satu,Tanggal,jenis_hari")
			->from('peminjaman')
			->join('pembayaran', 'pembayaran.Id_Peminjaman = peminjaman.Id_Peminjamanan')
			->join('anggota', 'anggota.id_anggota = peminjaman.marketing')
			->where('peminjaman.Tanggal >=', $tgl1)
			->where('peminjaman.Tanggal <=', $tgl2)
			->where("peminjaman.status", $this->kembali)
			->where('marketing', $id_anggota)->get();

			return $marketing;
		}

		function boot_mx( $id_anggota, $tgl1, $tgl2) {
			$boot_mx = $this->db->select("*")
			->from("peminjaman")
			->join("detailbootmx", "detailbootmx.id_peminjamanan = peminjaman.Id_Peminjamanan")
			->join("boot_oneal", "boot_oneal.id_boot = detailbootmx.id_boot")
			->join("anggota", "anggota.id_anggota = boot_oneal.id_anggota")
			->where('peminjaman.Tanggal >=', $tgl1)
			->where('peminjaman.Tanggal <=', $tgl2)
			->where("peminjaman.status", $this->kembali)
			->where('anggota.id_anggota', $id_anggota)->get();

			return $boot_mx;
		}
	}
?>