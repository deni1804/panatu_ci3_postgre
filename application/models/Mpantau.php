<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Mpantau extends CI_Model
{

	function __construct()
	{
		parent::__construct();
	}

	function get_item()
	{
		$query = "SELECT * FROM ps_itempantauan WHERE idstatus = 1 ORDER BY sort"; //1 = aktif; 9 = ga aktif
		return $this->db->query($query);
	}

	function get_allitem()
	{
		$query = "SELECT * FROM ps_itempantauan";
		return $this->db->query($query);
	}
	function delete_item($row)
	{
		$this->db->delete('ps_itempantauan', array('iditem' => $row));
	}

	function get_iditem($row)
	{
		return $this->db->get_where('ps_itempantauan', ['iditem' => $row])->row_array();
	}

	function update_item()
	{
		$this->db->WHERE('iditem', $this->input->post('iditem'));
	}

	function get_historykaryawan()
	{
		//return $this->db->get_where('kh_karyawan', ['idkaryawan' => $row])->row_array();]
		$idkaryawan = $this->uri->segment(3);
		$query = "SELECT idkaryawan ,namalengkap 
		FROM public.kh_karyawan   
		where idkaryawan = $idkaryawan
		ORDER BY idkaryawan ASC ";
		return $this->db->query($query);
	}

	function get_historyall()
	{

		$idkaryawan = $this->uri->segment(3);
		$query = "SELECT ip.item AS item, to_char(ps.tanggaljam, 'hh24:mi:ss') AS jam, to_char(ps.tanggaljam, 'dd-mm-yyyy') AS tanggal, ps.status, ps.keterangan 
		FROM ps_pantauansistem ps INNER JOIN ps_itempantauan ip ON ps.iditem = ip.iditem 
		WHERE ps.idkaryawan = $idkaryawan ORDER BY ps.tanggaljam DESC";

		return $this->db->query($query);
	}



	function get_pantau()
	{
		$data = $this->session->userdata('userid');
		$query = "SELECT ip.item AS item, to_char(ps.tanggaljam, 'hh24:mi:ss') AS jam, ps.status,ps.tingkatstatus
		FROM ps_pantauansistem ps 
		INNER JOIN ps_itempantauan ip ON ps.iditem = ip.iditem 
		WHERE ps.idkaryawan = $data AND to_char(ps.tanggaljam, 'mm-dd-yyyy') = to_char(NOW(), 'mm-dd-yyyy') AND to_char(ps.tanggaljam, 'hh') = to_char(now(), 'hh') 
		ORDER BY ps.tanggaljam";
		//$query = "SELECT ip.item AS item, DATE_FORMAT(ps.tanggaljam, `%H:%i:%s`) AS jam, ps.status,ps.tingkatstatus FROM ps_pantauansistem ps INNER JOIN ps_itempantauan ip ON ps.iditem = ip.iditem WHERE ps.idkaryawan = $data AND DATE_FORMAT(ps.tanggaljam, `%m-%d-%Y`) = DATE_FORMAT(NOW(), `%m-%d-%Y`) AND DATE_FORMAT(ps.tanggaljam, `%H`) = DATE_FORMAT(now(), `%H`) ORDER BY ps.tanggaljam";
		//$query = "SELECT ip.item AS item , (ps.tanggaljam , '%H:%i:%s' ) AS jam, ps.status,ps.tingkatstatus FROM ps_pantauansistem ps INNER JOIN ps_itempantauan ip ON ps.iditem = ip.iditem WHERE ps.idkaryawan = '$data' AND (ps.tanggaljam, '%m-%d-%Y' ) = (NOW(), '%m-%d-%Y' ) AND (ps.tanggaljam, '%H') = (now(), '%H') ORDER BY ps.tanggaljam";
		//$query = 'SELECT ip.item AS item , (ps.tanggaljam , "%H:%i:%s" ) AS jam, ps.status,ps.tingkatstatus FROM ps_pantauansistem ps INNER JOIN ps_itempantauan ip ON ps.iditem = ip.iditem WHERE ps.idkaryawan = ' . $this->session->userdata("userid") . ' AND (ps.tanggaljam, "%m-%d-%Y" ) = (NOW(), "%m-%d-%Y" ) AND (ps.tanggaljam, "%H") = (now(), "%H") ORDER BY ps.tanggaljam';
		return $this->db->query($query);
	}

	function get_history($temp)
	{
		if ($temp == 1) {
			//$query = 'SELECT ip.item AS item, DATE_FORMAT(ps.tanggaljam, "%H:%i:%s") AS jam, ps.status, ps.keterangan FROM ps_pantauansistem ps INNER JOIN ps_itempantauan ip ON ps.iditem = ip.iditem WHERE ps.idkaryawan = ' . $this->session->userdata("userid") . ' AND DATE_FORMAT(ps.tanggaljam, "%m-%d-%Y") = DATE_FORMAT(NOW(), "%m-%d-%Y") ORDER BY ps.tanggaljam DESC';
			$query = "SELECT ip.item AS item, to_char(ps.tanggaljam, 'hh24:mi:ss') AS jam, ps.status, ps.keterangan FROM ps_pantauansistem ps INNER JOIN ps_itempantauan ip ON ps.iditem = ip.iditem WHERE ps.idkaryawan = " . $this->session->userdata('userid') . " AND to_char(ps.tanggaljam, 'mm-dd-yyyy') = to_char(NOW(), 'mm-dd-yyyy') ORDER BY ps.tanggaljam DESC";
		} else if ($temp == 2) {
			//$query = 'SELECT ip.item AS item, DATE_FORMAT(ps.tanggaljam, "%H:%i:%s") AS jam, ps.status FROM ps_pantauansistem ps INNER JOIN ps_itempantauan ip ON ps.iditem = ip.iditem WHERE ps.idkaryawan = ' . $this->session->userdata("userid") . ' AND DATE_FORMAT(date_add(ps.tanggaljam, INTERVAL 1 DAY), "%m-%d-%Y") = DATE_FORMAT(NOW(), "%m-%d-%Y") ORDER BY ps.tanggaljam DESC';
			$query = "SELECT ip.item AS item, to_char(ps.tanggaljam, 'hh24:mi:ss') AS jam, ps.status, ps.keterangan FROM ps_pantauansistem ps INNER JOIN ps_itempantauan ip ON ps.iditem = ip.iditem WHERE ps.idkaryawan = " . $this->session->userdata('userid') . "AND (ps.tanggaljam::date = current_date-1)  ORDER BY ps.tanggaljam DESC
			";
		}


		return $this->db->query($query);
	}



	function get_dasboard($temp)
	{

		if ($temp == 3) {
			$query = "SELECT ip.item AS item, to_char(ps.tanggaljam, 'hh24:mi:ss') AS jam, ps.status,ps.tingkatstatus, ps.keterangan,ps.tanggaljam FROM ps_pantauansistem ps INNER JOIN ps_itempantauan ip ON ps.iditem = ip.iditem WHERE  ps.IdItem =  1 AND to_char(ps.tanggaljam, 'mm-dd-yyyy') = to_char(NOW(), 'mm-dd-yyyy') ORDER BY ps.tanggaljam DESC";
		} elseif ($temp == 4) {
			$query = "SELECT ip.item AS item, to_char(ps.tanggaljam, 'hh24:mi:ss') AS jam, ps.status,ps.tingkatstatus, ps.keterangan,ps.tanggaljam FROM ps_pantauansistem ps INNER JOIN ps_itempantauan ip ON ps.iditem = ip.iditem WHERE  ps.IdItem =  2 AND to_char(ps.tanggaljam, 'mm-dd-yyyy') = to_char(NOW(), 'mm-dd-yyyy') ORDER BY ps.tanggaljam DESC";
		} elseif ($temp == 5) {
			$query = "SELECT ip.item AS item, to_char(ps.tanggaljam, 'hh24:mi:ss') AS jam, ps.status,ps.tingkatstatus, ps.keterangan,ps.tanggaljam FROM ps_pantauansistem ps INNER JOIN ps_itempantauan ip ON ps.iditem = ip.iditem WHERE  ps.IdItem =  3 AND to_char(ps.tanggaljam, 'mm-dd-yyyy') = to_char(NOW(), 'mm-dd-yyyy') ORDER BY ps.tanggaljam DESC";
		} elseif ($temp == 6) {
			$query = "SELECT ip.item AS item, to_char(ps.tanggaljam, 'hh24:mi:ss') AS jam, ps.status,ps.tingkatstatus, ps.keterangan,ps.tanggaljam FROM ps_pantauansistem ps INNER JOIN ps_itempantauan ip ON ps.iditem = ip.iditem WHERE  ps.IdItem =  4 AND to_char(ps.tanggaljam, 'mm-dd-yyyy') = to_char(NOW(), 'mm-dd-yyyy') ORDER BY ps.tanggaljam DESC";
		} elseif ($temp == 7) {
			$query = "SELECT ip.item AS item, to_char(ps.tanggaljam, 'hh24:mi:ss') AS jam, ps.status,ps.tingkatstatus, ps.keterangan,ps.tanggaljam FROM ps_pantauansistem ps INNER JOIN ps_itempantauan ip ON ps.iditem = ip.iditem WHERE  ps.IdItem =  5 AND to_char(ps.tanggaljam, 'mm-dd-yyyy') = to_char(NOW(), 'mm-dd-yyyy') ORDER BY ps.tanggaljam DESC";
		} elseif ($temp == 8) {
			$query = "SELECT ip.item AS item, to_char(ps.tanggaljam, 'hh24:mi:ss') AS jam, ps.status,ps.tingkatstatus, ps.keterangan,ps.tanggaljam FROM ps_pantauansistem ps INNER JOIN ps_itempantauan ip ON ps.iditem = ip.iditem WHERE  ps.IdItem =  6 AND to_char(ps.tanggaljam, 'mm-dd-yyyy') = to_char(NOW(), 'mm-dd-yyyy') ORDER BY ps.tanggaljam DESC";
		} elseif ($temp == 9) {
			$query = "SELECT ip.item AS item, to_char(ps.tanggaljam, 'hh24:mi:ss') AS jam, ps.status,ps.tingkatstatus, ps.keterangan FROM ps_pantauansistem ps INNER JOIN ps_itempantauan ip ON ps.iditem = ip.iditem WHERE  to_char(ps.tanggaljam, 'mm-dd-yyyy') = to_char(NOW(), 'mm-dd-yyyy') ORDER BY ps.tanggaljam DESC";
		} elseif ($temp == 10) {
			$query = "SELECT ip.item AS item, to_char(ps.tanggaljam, 'hh24:mi:ss') AS jam, ps.status,ps.tingkatstatus, ps.keterangan FROM ps_pantauansistem ps INNER JOIN ps_itempantauan ip ON ps.iditem = ip.iditem WHERE  (ps.tanggaljam::date = current_date-1)  ORDER BY ps.tanggaljam DESC
			";
		} elseif ($temp == 11) {
			$query = "SELECT ip.item AS item, to_char(ps.tanggaljam, 'hh24:mi:ss') AS jam, ps.status,ps.tingkatstatus, ps.keterangan,ps.tanggaljam FROM ps_pantauansistem ps INNER JOIN ps_itempantauan ip ON ps.iditem = ip.iditem WHERE  ps.IdItem =  403 AND to_char(ps.tanggaljam, 'mm-dd-yyyy') = to_char(NOW(), 'mm-dd-yyyy') ORDER BY ps.tanggaljam DESC";
		}

		return $this->db->query($query);
	}

	function get_karyawan($list)
	{
		if ($list == 1) {
			$query = "SELECT kh.username AS username, ip.item AS item, kh.idkaryawan as idkaryawan, COUNT(*) FROM ps_pantauansistem ps INNER JOIN ps_itempantauan ip ON ps.iditem = ip.iditem JOIN kh_karyawan kh ON ps.idkaryawan = kh.idkaryawan WHERE  ps.iditem =  1  AND to_char(ps.tanggaljam, 'mm-dd-yyyy') = to_char(NOW(), 'mm-dd-yyyy') GROUP BY kh.username , ip.item, kh.idkaryawan";
		} elseif ($list == 2) {
			$query = "SELECT kh.username AS username, ip.item AS item, COUNT(*) FROM ps_pantauansistem ps INNER JOIN ps_itempantauan ip ON ps.iditem = ip.iditem JOIN kh_karyawan kh ON ps.idkaryawan = kh.idkaryawan WHERE  ps.iditem =  1  AND  (ps.tanggaljam::date = current_date-1)  GROUP BY kh.username , ip.item";
		} elseif ($list == 3) {
			$query = "SELECT kh.username AS username, ip.item AS item, kh.idkaryawan as idkaryawan, COUNT(*) FROM ps_pantauansistem ps INNER JOIN ps_itempantauan ip ON ps.iditem = ip.iditem JOIN kh_karyawan kh ON ps.idkaryawan = kh.idkaryawan WHERE  ps.iditem =  1  GROUP BY kh.username , ip.item, kh.idkaryawan";
		}

		return $this->db->query($query);
	}

	function insert($query)
	{
		$this->db->query($query);
	}

	function get_keterangan($id)
	{
		$query = "SELECT keterangan FROM ps_itempantauan WHERE iditem = '$id' ";
		return $this->db->query($query);
		// return $query;
	}
}
