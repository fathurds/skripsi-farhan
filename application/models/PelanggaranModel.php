<?php
defined('BASEPATH') or exit('No direct script access allowed');

class PelanggaranModel extends CI_Model
{

	public $tableName;

	public function __construct()
	{
		parent::__construct();
		$this->tableName = "tb_pelanggaran";
	}

	public function selectAll($from = 0, $offset = 0)
	{
		$this->db->select('*');
		$this->db->from($this->tableName);
		$this->db->limit($from, $offset);

		return $this->db->get();
	}

	function getRekomendasi($poin)
	{
		$q = "SELECT * FROM tb_sanksi WHERE '$poin' >= poin_min && '$poin' <= poin_maks LIMIT 1";
		return $this->db->query($q);
	}

	public function selectAllSiswaMelanggar($search = null)
	{
		$where = "";
		if(isset($search)){
			$where = "WHERE tb_siswa.nama LIKE '%$search%' OR tb_pelanggaran.nis LIKE '%$search%'";
		}
		$queAll = "
				SELECT
					tb_pelanggaran.id_pelanggaran,
					tb_pelanggaran.nis,
					tb_siswa.nama,
					tb_pelanggaran.kode_tatib,
					tb_pelanggaran.alasan,
					tb_pelanggaran.created_date,
					tb_tatib.poin,
					tb_kelas.nama AS nama_kelas,
					tb_kelas.tingkat
				FROM tb_pelanggaran
				LEFT JOIN tb_siswa ON tb_pelanggaran.nis = tb_siswa.nis
				LEFT JOIN tb_tatib ON tb_pelanggaran.kode_tatib = tb_tatib.kode
				LEFT JOIN tb_kelas ON tb_siswa.id_kelas = tb_kelas.id
				$where
				ORDER BY created_date DESC, id_pelanggaran DESC
			";
		// $queAll = "
		// 		SELECT
		// 			tb_pelanggaran.nis,
		// 			tb_siswa.nama,
		// 			CONCAT(tb_pelanggaran.nis,' - ',tb_siswa.nama) AS nama_siswa,
		// 			tb_pelanggaran.kode_tatib,
		// 			tb_pelanggaran.alasan,
		// 			tb_pelanggaran.created_date,
		// 			tb_tatib.poin,
		// 			tb_tatib.nama AS nama_pelanggaran
		// 		FROM tb_pelanggaran
		// 		LEFT JOIN tb_siswa ON tb_pelanggaran.nis = tb_siswa.nis
		// 		LEFT JOIN tb_tatib ON tb_pelanggaran.kode_tatib = tb_tatib.kode
		// 		ORDER BY created_date DESC
		// 	";

		return $this->db->query($queAll);
	}

	public function selectPelanggaranByNis($nis)
	{
		$queAll = "
				SELECT
					tb_pelanggaran.nis,
					tb_siswa.nama,
					CONCAT(tb_pelanggaran.nis,'-',tb_siswa.nama) AS nama_siswa,
					tb_pelanggaran.kode_tatib,
					tb_pelanggaran.alasan,
					tb_pelanggaran.created_date,
					tb_tatib.poin,
					tb_tatib.nama AS nama_pelanggaran
				FROM tb_pelanggaran
				LEFT JOIN tb_siswa ON tb_pelanggaran.nis = tb_siswa.nis
				LEFT JOIN tb_tatib ON tb_pelanggaran.kode_tatib = tb_tatib.kode
				WHERE tb_pelanggaran.nis = '" . $nis . "'
			";

		return $this->db->query($queAll);
	}

	public function selectPelanggaranGroupKelas()
	{
		$queAll = "
			SELECT
				tb_kelas.nama AS kelas,
				tb_kelas.tingkat,
				tb_tatib.id_group_tatib,
				tb_group_tatib.kode_group_tatib,
				tb_group_tatib.nama_kriteria,
				tb_group_tatib.kriteria_bobot,
				tb_group_tatib.bobot,
				SUM(tb_tatib.poin) AS jumlah_poin,
				COUNT(tb_pelanggaran.nis) AS jumlah_siswa
			FROM tb_pelanggaran
			LEFT JOIN tb_siswa ON tb_pelanggaran.nis = tb_siswa.nis
			LEFT JOIN tb_tatib ON tb_pelanggaran.kode_tatib = tb_tatib.kode
			LEFT JOIN tb_kelas ON tb_siswa.id_kelas = tb_kelas.id
			LEFT JOIN tb_group_tatib ON tb_tatib.id_group_tatib = tb_group_tatib.id_group_tatib
			GROUP BY tb_kelas.id,tb_tatib.id_group_tatib
		";

		return $this->db->query($queAll);
	}

	public function selectAllFuzzy()
	{
		$queAll = "
			SELECT
				*
			FROM tb_fuzy
		";

		return $this->db->query($queAll);
	}

	// public function selectPoinKelas($id, $siswa = "")
	// {
	// 	$kriteria = $this->GroupTatibModel->selectKriteriaAll()->result();
	// 	$countKriteria = "";
	// 	$total = "";

	// 	$numItems = count($kriteria);
	// 	$i = 0;
	// 	$poinKelas = "";
	// 	foreach ($kriteria as $pelanggaran) { // memasukan C1-C12
	// 		if ($siswa != "siswa") {
	// 			$poinKelas = "* " . $pelanggaran->bobot;
	// 		}
	// 		$countKriteria .= ", COUNT(DISTINCT IF(id_kelas = " . $id . ",
	// 						IF(kriteria = '" . $pelanggaran->kriteria . "',
	// 							id_pelanggaran, NULL),
	// 						NULL)) " . $poinKelas . " as " . $pelanggaran->kriteria . "";

	// 		$total .= "COUNT(DISTINCT IF(id_kelas = " . $id . ",
	// 					IF(kriteria = '" . $pelanggaran->kriteria . "',
	// 						id_pelanggaran, NULL),
	// 					NULL)) " . $poinKelas;

	// 		if (++$i != $numItems) {
	// 			$total .= "+";
	// 		}
	// 	}

	// 	$query = "SELECT
	// 				a.tingkat, a.nama
	// 				" . $countKriteria . ", " . $total . " as total
	// 			from tb_pelanggaran join tb_kelas a WHERE a.id = " . $id . "";

	// 	return $this->db->query($query);
	// }

	public function selectPoinKelas($id, $siswa = null)
	{
		$kriteria = $this->GroupTatibModel->selectAll()->result();

		$perhitungan = $siswa ? "count" : "sum";
		$result = array();
		foreach ($kriteria as $val) {
			$query = "SELECT $perhitungan(t.poin) as $val->kriteria from tb_pelanggaran p
					LEFT JOIN tb_tatib t ON kode_tatib = kode
					WHERE id_kelas = $id AND kriteria = '$val->kriteria'";

			$data = $this->db->query($query)->row_array();
			array_push($result, $data);
		}

		return $result;
	}

	public function selectPelanggaranById($id){
		$this->db->select('*');
		$this->db->from('tb_pelanggaran p');
		$this->db->join('tb_siswa s', 'p.nis = s.nis', 'LEFT');
		$this->db->where('id_pelanggaran', $id);
		return $this->db->get();
	}

	public function delete($id) {
		$this->db->where('id_pelanggaran', $id);
		$this->db->delete($this->tableName);
	}

	public function update($id, $data){
		$this->db->where('id_pelanggaran', $id);
		$this->db->update('tb_pelanggaran', $data);
	}
}
