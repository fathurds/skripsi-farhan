select `kelas`.`id` AS `id`,`jadwal`.`hari` AS `hari`,`jadwal`.`jam` AS `jam`,`guru`.`nama` AS `nama`,`guru`.`kontak` AS `kontak`,`mapel`.`nama` AS `matapelajaran`,`mapel`.`kkm1` AS `kkm1`,`mapel`.`kkm2` AS `kkm2` from (((`db_elearning`.`tb_kelas` `kelas` join `db_elearning`.`tb_jadwal` `jadwal`) join `db_elearning`.`tb_guru` `guru`) join `db_elearning`.`tb_mapel` `mapel` on(((`mapel`.`id` = `guru`.`id_mapel`) and (`jadwal`.`id_guru` = `guru`.`id`) and (`jadwal`.`id_kelas` = `kelas`.`id`))))

CREATE OR REPLACE VIEW viewMateri as SELECT
tb_kelas.id,tb_materi.nama,tb_materi.deksripsi,tb_materi.link,tb_guru.id as idg,tb_guru.nama,tb_mapel.nama as matapelajaran
FROM
tb_materi
JOIN
tb_kelas
JOIN
tb_guru
join
tb_mapel
ON
tb_mapel.id = tb_guru.id_mapel
AND
tb_materi.id_kelas = tb_kelas.id
AND
tb_materi.id_guru = tb_guru.id


CREATE OR REPLACE VIEW viewTugas as SELECT
tb_kelas.id,tb_tugas.id as idt,tb_tugas.judul,tb_tugas.link,tb_tugas.deskripsi,tb_guru.id as idg,tb_guru.nama,tb_mapel.nama as mapel FROM
tb_tugas
JOIN
tb_kelas
JOIN
tb_guru
join
tb_mapel
ON
tb_mapel.id = tb_guru.id_mapel
AND
tb_tugas.id_kelas = tb_kelas.id
AND
tb_tugas.id_guru = tb_guru.id

CREATE OR REPLACE VIEW viewjadwalajar as SELECT
tb_guru.id,tb_jadwal.id as idj,tb_jadwal.hari,tb_jadwal.jam,tb_kelas.id as idk,tb_kelas.nama as namakelas,tb_kelas.tingkat,tb_guru.nama,tb_mapel.nama as mapel, tb_mapel.kkm1,tb_mapel.kkm2 FROM
tb_kelas
JOIN
tb_jadwal
JOIN
tb_guru
join
tb_mapel
ON
tb_mapel.id = tb_guru.id_mapel
AND
tb_jadwal.id_kelas = tb_kelas.id
AND
tb_jadwal.id_guru = tb_guru.id

CREATE OR REPLACE VIEW viewNilai as SELECT
tb_nilai.*, tb_siswa.nama as namasiswa, tb_siswa.id as ids, tb_guru.nama as namaguru, tb_guru.nip, tb_mapel.nama as mapel, tb_kelas.nama as namakelas, tb_kelas.id as idk,tb_hnilai.namaheader ,tb_hnilai.kategori, tb_mapel.kkm1,tb_mapel.kkm2,tb_siswa.email,tb_mapel.mess1,tb_mapel.mess2,tb_mapel.mess3
FROM
tb_kelas
JOIN
tb_siswa
JOIN
tb_guru
join
tb_mapel
join
tb_nilai
join
tb_hnilai
ON
tb_mapel.id = tb_guru.id_mapel
AND
tb_kelas.id = tb_siswa.id_kelas
AND
tb_nilai.id_guru = tb_guru.id
AND
tb_nilai.id_siswa	= tb_siswa.id
AND
tb_hnilai.id = tb_nilai.id_hnilai
and
tb_nilai.id_guru = tb_guru.id
and
tb_hnilai.id_kelas = tb_kelas.id


