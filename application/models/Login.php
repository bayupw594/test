<?php if ( ! defined( 'BASEPATH' ) ) exit( "No Direct Script Access Allowed !" );
	class Login extends CI_Model {
        
        function __construct() {
                parent::__construct();
        }

        function log_in( $username , $password) {
			$this->db->select( '*' );
			$this->db->from( 'login' );
			$this->db->where( 'username' , $username );
			$this->db->where( 'password' , MD5($password) );
			$this->db->limit( 1 );

			$query = $this->db->get();

			if ( $query->num_rows() == 1 ){
				return $query->result();
			}  else {
				return false;
			}
		}

		function ambil_user($username) {
	        $query = $this->db->get_where($this->tbl, array('username' => $username));
	        $query = $query->result_array();
	        if($query){
	            return $query[0];
	        }
        }

        function ganti_pass($data, $condition) {
        	$this->db->where($condition);
        	$this->db->update("login", $data);
        }

        function user($data) {
        	$r = $this->db->select('username')->from('login')->where('username', $data)
        		->get();

        	if ( $r->num_rows() !== 1 ) {
        		return ( false );
        	}

        	$username = $r->result()[0]->username;

        	$r->free_result();

        	return ( $username );
        }

        function tambah_user($data) {
        	$this->db->insert('login',$data);
        }

        function lihat_user(){
        	$query = $this->db->select('*')
        	->from('login')->get();

        	return $query;
        }

        function hapus_user( $username ){
        	$this->db->where('username', $username);
        	$this->db->delete('login');
        }
	}

?>
