<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Metode extends CI_Controller
{
  private $head;
  function __construct()
  {
    parent::__construct();
    $this->load->model('GroupTatibModel');
    $this->load->helper('url');
    $this->load->database();
    $this->head['kelasheader'] = $this->KelasModel->selectAll()->result_array();
  }

  public function ratingPoin()
  {
    $data = $this->sawMethod();

    $this->load->view('layout/aheader', $this->head);
    $this->load->view('metode/rating_poin', $data);
    $this->load->view('layout/afooter');
  }

  private function getRekap($data_rekap)
  {
    $result_rekap = [];
    $get_fuzzy = $this->PelanggaranModel->selectAllFuzzy()->result_array();
    if (is_array($data_rekap) && count($data_rekap) > 0) {
      foreach ($data_rekap as $val_data_rekap) {
        $result_rekap['jumlah_poin'][$val_data_rekap['kelas']][$val_data_rekap['kode_group_tatib']] = $val_data_rekap['jumlah_poin'];
        $result_rekap['jumlah_siswa'][$val_data_rekap['kelas']][$val_data_rekap['kode_group_tatib']] = $val_data_rekap['jumlah_siswa'];

        $result_rekap['rating_poin'][$val_data_rekap['kelas']][$val_data_rekap['kode_group_tatib']] = $this->hitungPoin($get_fuzzy, $val_data_rekap['jumlah_poin']);
      }
    }

    return $result_rekap;
  }

  private function hitungPoin($data_fuzy, $poin)
  {
    $rating = 0;
    foreach ($data_fuzy as $v_fuzy) {
      if ($poin >= $v_fuzy['nilai_min'] && $poin <= $v_fuzy['nilai_maks']) {
        $rating = $v_fuzy['bobot'];
      }
    }
    return $rating;
  }

  public function fuzzy()
  {
    $data = [];
    $data['fuzzy'] = $this->PelanggaranModel->selectAllFuzzy()->result();

    $this->load->view('layout/aheader', $this->head);
    $this->load->view('metode/fuzzy', $data);
    $this->load->view('layout/afooter');
  }

  public function kriteriaGroup()
  {
    $data = [];
    $data['kriteria_group'] = $this->GroupTatibModel->selectAll()->result_array();

    $this->load->view('layout/aheader', $this->head);
    $this->load->view('metode/kriteria_group', $data);
    $this->load->view('layout/afooter');
  }

  private function getRekapSaw($data_rekap)
  {
    $result_rekap = [];
    $saw_total_arr = [];
    $get_fuzzy = $this->PelanggaranModel->selectAllFuzzy()->result_array();
    if (is_array($data_rekap) && count($data_rekap) > 0) {
      foreach ($data_rekap as $val_data_rekap) {
        $bobot_fuzzy = $this->hitungPoin($get_fuzzy, $val_data_rekap['jumlah_poin']);
        $result_rekap['rating_poin'][$val_data_rekap['kelas']][$val_data_rekap['kode_group_tatib']] = $bobot_fuzzy;
        $result_rekap['per_kriteria'][$val_data_rekap['kode_group_tatib']][] = $bobot_fuzzy;
        $val_data_rekap['bobot_fuzzy'] = $bobot_fuzzy;
        $result_rekap['data_rekap'][$val_data_rekap['kelas']][$val_data_rekap['kode_group_tatib']] = $val_data_rekap;
      }
      if (is_array($result_rekap['per_kriteria']) && count($result_rekap['per_kriteria']) > 0) {
        foreach ($result_rekap['per_kriteria'] as $k_kriteria => $v_kriteria) {
          $result_rekap['maks_kriteria'][$k_kriteria] = max($v_kriteria);
          $result_rekap['min_kriteria'][$k_kriteria] = min($v_kriteria);
        }
      }
      if (is_array($result_rekap['data_rekap']) && count($result_rekap['data_rekap']) > 0) {
        foreach ($result_rekap['data_rekap'] as $k_kelasrekap => $arr_group) {
          foreach ($arr_group as $k_grouprekap => $v_grouprekap) {
            $nilai = 0;
            if ($v_grouprekap['kriteria_bobot'] == 'b') {
              if (isset($result_rekap['maks_kriteria'][$k_grouprekap])) {
                $nilai = $v_grouprekap['bobot_fuzzy'] / $result_rekap['maks_kriteria'][$k_grouprekap];
              }
            } else {
              if (isset($result_rekap['min_kriteria'][$k_grouprekap])) {
                $nilai = $result_rekap['min_kriteria'][$k_grouprekap] / $v_grouprekap['bobot_fuzzy'];
              }
            }
            $result_rekap['saw'][$k_kelasrekap][$k_grouprekap] = $nilai;
            $saw_total_arr[$k_kelasrekap][] = $nilai * $v_grouprekap['bobot'];
          }
        }
        if (is_array($saw_total_arr) && count($saw_total_arr) > 0) {
          $saw_ranking_sum = [];
          foreach ($saw_total_arr as $k_kelastotal => $v_nilai) {
            $result_rekap['saw_total'][$k_kelastotal] = array_sum($v_nilai);
            $saw_ranking_sum[] = array_sum($v_nilai);
          }
          foreach ($result_rekap['saw_total'] as $k_sawtotal => $v_sawtotal) {
            $rankAvg = 0;
            if (is_array($saw_ranking_sum)) {
              $rankAvg = $this->rank_avg($v_sawtotal, $saw_ranking_sum);
            }
            $result_rekap['saw_ranking'][$k_sawtotal] = $rankAvg;
          }
        }
      }
    }

    return $result_rekap;
  }

  public function saw()
  {
    $data = $this->sawMethod();

    $total = array_column($data['kelas'], 'total'); // UNTUK RANKING
    array_multisort($total, SORT_DESC, $data['kelas']);

    $data['saw'] = true;

    $this->load->view('layout/aheader', $this->head);
    $this->load->view('metode/rating_poin', $data);
    $this->load->view('layout/afooter');
  }

  private function sawMethod()
  {
    $this->load->model('KelasModel');
    $this->load->model('PelanggaranModel');
    $data['semuaKelas'] = $this->KelasModel->selectAll()->result();
    $kategori_pelanggaran = $this->GroupTatibModel->selectKriteriaAll()->result();
    $data['kategori_pelanggaran'] = $kategori_pelanggaran;

    $result = array();
    $totalArray = array();

    $fuzzy = $this->PelanggaranModel->selectAllFuzzy()->result();

    $poinSementara = array();
    foreach ($data['semuaKelas'] as $kelas) { // Looping kelas untuk mendapatkan id kelas

      $tempKelas = $this->PelanggaranModel->selectPoinKelas($kelas->id);
      $total = 0;
      foreach ($tempKelas as $key => $value) {
        foreach ($value as $keyResult => $valueResult) {
          foreach ($fuzzy as $val_fuzzy) {
            if ($valueResult < 3) {
              $tempKelas[$key][$keyResult] = 0;

              if (empty($poinSementara['max_' . $keyResult])) {
                $poinSementara['max_' . $keyResult] = 0;
              }

              break;
            } else if ($valueResult >= $val_fuzzy->nilai_min && $valueResult <= $val_fuzzy->nilai_maks) {
              $tempKelas[$key][$keyResult] = $val_fuzzy->bobot;

              if (empty($poinSementara['max_' . $keyResult]) || $poinSementara['max_' . $keyResult] < $val_fuzzy->bobot) {
                $poinSementara['max_' . $keyResult] = $val_fuzzy->bobot;
              }

              break;
            } else if ($valueResult > 102) {

              $tempKelas[$key][$keyResult] = 11;
              $poinSementara['max_' . $keyResult] = 11;

              break;
            } else {
              continue;
            }
          }
          $total += $tempKelas[$key][$keyResult];
        }
      }
      $tempKelas['total'] = $total;

      array_push($totalArray, $total);

      $result[$kelas->nama] = $tempKelas;
    }

    $totalSementara = 0;
    foreach ($result as $keyKelas => $val) {
      $index = 0;
      foreach ($val as $key => $value) {
        if (is_array($value)) {
          foreach ($value as $keyHasil => $valueHasil) {
            if ($poinSementara['max_' . $keyHasil] != 0) {
              $result[$keyKelas][$key][$keyHasil] = round($valueHasil / $poinSementara['max_' . $keyHasil], 2);
              $total += round($valueHasil / $poinSementara['max_' . $keyHasil], 2);
            } else {
              $result[$keyKelas][$key][$keyHasil] = 0;
            }
            $totalSementara += $valueHasil / ($poinSementara['max_' . $keyHasil] ?: 1) * $kategori_pelanggaran[$index]->bobot;
          }
        }
        $index++;
      }
      $result[$keyKelas]['total'] = round($totalSementara, 2);
      $totalSementara = 0;
    }

    $data['kelas'] = $result;

    return $data;
  }



  private function rank_avg($value, $array, $order = 0)
  {
    // sort
    if ($order) sort($array);
    else rsort($array);
    // add item for counting from 1 but 0
    array_unshift($array, $value + 1);
    // select all indexes vith the value
    $keys = array_keys($array, $value);
    if (count($keys) == 0) return NULL;
    // calculate the rank
    return array_sum($keys) / count($keys);
  }
}
