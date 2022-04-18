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



	function get_pantau()
	{
		$data = $this->session->userdata('userid');
		$query = "SELECT ip.item AS item, to_char(ps.tanggaljam, 'hh:ii:ss') AS jam, ps.status,ps.tingkatstatus
		FROM ps_pantauansistem ps 
		INNER JOIN ps_itempantauan ip ON ps.iditem = ip.iditem 
		WHERE ps.idkaryawan = $data AND to_char(ps.tanggaljam, 'm-d-Y') = to_char(NOW(), 'm-d-Y') AND to_char(ps.tanggaljam, 'hh') = to_char(now(), 'hh') 
		ORDER BY ps.tanggaljam";
		//$query = "SELECT ip.item AS item, DATE_FORMAT(ps.tanggaljam, `%H:%i:%s`) AS jam, ps.status,ps.tingkatstatus FROM ps_pantauansistem ps INNER JOIN ps_itempantauan ip ON ps.iditem = ip.iditem WHERE ps.idkaryawan = $data AND DATE_FORMAT(ps.tanggaljam, `%m-%d-%Y`) = DATE_FORMAT(NOW(), `%m-%d-%Y`) AND DATE_FORMAT(ps.tanggaljam, `%H`) = DATE_FORMAT(now(), `%H`) ORDER BY ps.tanggaljam";
		//$query = "SELECT ip.item AS item , (ps.tanggaljam , '%H:%i:%s' ) AS jam, ps.status,ps.tingkatstatus FROM ps_pantauansistem ps INNER JOIN ps_itempantauan ip ON ps.iditem = ip.iditem WHERE ps.idkaryawan = '$data' AND (ps.tanggaljam, '%m-%d-%Y' ) = (NOW(), '%m-%d-%Y' ) AND (ps.tanggaljam, '%H') = (now(), '%H') ORDER BY ps.tanggaljam";
		//$query = 'SELECT ip.item AS item , (ps.tanggaljam , "%H:%i:%s" ) AS jam, ps.status,ps.tingkatstatus FROM ps_pantauansistem ps INNER JOIN ps_itempantauan ip ON ps.iditem = ip.iditem WHERE ps.idkaryawan = ' . $this->session->userdata("userid") . ' AND (ps.tanggaljam, "%m-%d-%Y" ) = (NOW(), "%m-%d-%Y" ) AND (ps.tanggaljam, "%H") = (now(), "%H") ORDER BY ps.tanggaljam';
		return $this->db->query($query);
	}

	function get_history($temp)
	{
		if ($temp == 1) {
			//$query = 'SELECT ip.item AS item, DATE_FORMAT(ps.tanggaljam, "%H:%i:%s") AS Jam, ps.status,ps.tingkatstatus, ps.keterangan FROM ps_pantauansistem ps INNER JOIN ps_itempantauan ip ON ps.iditem = ip.iditem WHERE ps.idkaryawan = ' . $this->session->userdata("userid") . ' AND DATE_FORMAT(ps.tanggaljam, "%m-%d-%Y") = DATE_FORMAT(NOW(), "%m-%d-%Y") ORDER BY ps.tanggaljam DESC';
			$query = 'SELECT ip.item AS item, (ps.tanggaljam, "%H:%i:%s") AS Jam, ps.status,ps.tingkatstatus, ps.keterangan FROM ps_pantauansistem ps INNER JOIN ps_itempantauan ip ON ps.iditem = ip.iditem WHERE ps.idkaryawan = ' . $this->session->userdata("userid") . ' AND (ps.tanggaljam, "%m-%d-%Y") = (NOW(), "%m-%d-%Y") ORDER BY ps.tanggaljam DESC';
		} else if ($temp == 2) {
			$query = 'SELECT ip.item AS item, (ps.tanggaljam, "%H:%i:%s") AS Jam, ps.status,ps.tingkatstatus,ps.keterangan  FROM ps_pantauansistem ps INNER JOIN ps_itempantauan ip ON ps.iditem = ip.iditem WHERE ps.idkaryawan = ' . $this->session->userdata("userid") . ' AND (date_add(ps.tanggaljam, INTERVAL 1 DAYS), "%m-%d-%Y") = (NOW(), "%m-%d-%Y") ORDER BY ps.tanggaljam DESC';
		} elseif ($temp == 3) {
			$query = 'SELECT ip.Item AS Item, (ps.TanggalJam, "%H:%i:%s") AS Jam, ps.Status,ps.TingkatStatus, ps.Keterangan,ps.TanggalJam FROM ps_pantauansistem ps INNER JOIN ps_itempantauan ip ON ps.IdItem = ip.IdItem WHERE ps.IdKaryawan = ' . $this->session->userdata("userid") . ' AND ps.IdItem =  1  AND (ps.TanggalJam, "%m-%d-%Y") = (NOW(), "%m-%d-%Y") ORDER BY ps.TanggalJam DESC';
		} elseif ($temp == 4) {
			$query = 'SELECT ip.Item AS Item, (ps.TanggalJam, "%H:%i:%s") AS Jam, ps.Status,ps.TingkatStatus, ps.Keterangan,ps.TanggalJam FROM ps_pantauansistem ps INNER JOIN ps_itempantauan ip ON ps.IdItem = ip.IdItem WHERE ps.IdItem =  2  AND (ps.TanggalJam, "%m-%d-%Y") = (NOW(), "%m-%d-%Y") ORDER BY ps.TanggalJam DESC';
		} elseif ($temp == 5) {
			$query = 'SELECT ip.Item AS Item, (ps.TanggalJam, "%H:%i:%s") AS Jam, ps.Status,ps.TingkatStatus, ps.Keterangan,ps.TanggalJam FROM ps_pantauansistem ps INNER JOIN ps_itempantauan ip ON ps.IdItem = ip.IdItem WHERE ps.IdItem =  3  AND (ps.TanggalJam, "%m-%d-%Y") = (NOW(), "%m-%d-%Y") ORDER BY ps.TanggalJam DESC';
		} elseif ($temp == 6) {
			$query = 'SELECT ip.Item AS Item, (ps.TanggalJam, "%H:%i:%s") AS Jam, ps.Status,ps.TingkatStatus, ps.Keterangan,ps.TanggalJam FROM ps_pantauansistem ps INNER JOIN ps_itempantauan ip ON ps.IdItem = ip.IdItem WHERE ps.IdItem =  4  AND (ps.TanggalJam, "%m-%d-%Y") = (NOW(), "%m-%d-%Y") ORDER BY ps.TanggalJam DESC';
		} elseif ($temp == 7) {
			$query = 'SELECT ip.Item AS Item, (ps.TanggalJam, "%H:%i:%s") AS Jam, ps.Status,ps.TingkatStatus, ps.Keterangan,ps.TanggalJam FROM ps_pantauansistem ps INNER JOIN ps_itempantauan ip ON ps.IdItem = ip.IdItem WHERE ps.IdItem =  5  AND (ps.TanggalJam, "%m-%d-%Y") = (NOW(), "%m-%d-%Y") ORDER BY ps.TanggalJam DESC';
		} elseif ($temp == 8) {
			$query = 'SELECT ip.Item AS Item, (ps.TanggalJam, "%H:%i:%s") AS Jam, ps.Status,ps.TingkatStatus, ps.Keterangan,ps.TanggalJam FROM ps_pantauansistem ps INNER JOIN ps_itempantauan ip ON ps.IdItem = ip.IdItem WHERE ps.IdItem =  6  AND (ps.TanggalJam, "%m-%d-%Y") = (NOW(), "%m-%d-%Y") ORDER BY ps.TanggalJam DESC';
		} elseif ($temp == 9) {
			$query = 'SELECT ip.Item AS Item, (ps.TanggalJam, "%H:%i:%s") AS Jam, ps.Status,ps.TingkatStatus, ps.Keterangan FROM ps_pantauansistem ps INNER JOIN ps_itempantauan ip ON ps.IdItem = ip.IdItem WHERE  (ps.TanggalJam, "%m-%d-%Y") = (NOW(), "%m-%d-%Y") ORDER BY ps.TanggalJam DESC';
		} elseif ($temp == 10) {
			$query = 'SELECT ip.Item AS Item, (ps.TanggalJam, "%H:%i:%s") AS Jam, ps.Status,ps.TingkatStatus,ps.Keterangan  FROM ps_pantauansistem ps INNER JOIN ps_itempantauan ip ON ps.IdItem = ip.IdItem WHERE  (date_add(ps.TanggalJam, INTERVAL 1 DAY), "%m-%d-%Y") = (NOW(), "%m-%d-%Y") ORDER BY ps.TanggalJam DESC';
		}

		return $this->db->query($query);
	}

	function get_karyawan($list)
	{
		if ($list == 1) {

			$query = ' SELECT kh.Username AS username, ip.Item AS item, COUNT(*) FROM ps_pantauansistem ps INNER JOIN ps_itempantauan ip ON ps.iditem = ip.iditem JOIN kh_karyawan kh ON ps.idkaryawan = kh.idkaryawan WHERE  ps.iditem =  1  AND (ps.tanggaljam, "%m-%d-%Y") = (NOW(), "%m-%d-%Y") GROUP BY kh.username , Ip.item';
		} elseif ($list == 2) {
			$query = ' SELECT kh.username AS Username, ip.item AS item, COUNT(*) FROM ps_pantauansistem ps INNER JOIN ps_itempantauan ip ON ps.iditem = ip.iditem JOIN kh_karyawan kh ON ps.idkaryawan = kh.idkaryawan WHERE  ps.iditem =  1  AND (ps.tanggaljam, "%m-%d-%Y") = (NOW(), "%m-%d-%Y") GROUP BY kh.username , Ip.item';
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
