<div class="modal-header">
	<h5 class="modal-title" id="exampleModalLabel">Tambah Data <?= $title ?></h5>
	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
		<i aria-hidden="true" class="ki ki-close"></i>
	</button>
</div>
<form id="add-form" action="" method="_post">
	<div class="modal-body" style="height: 500px; overflow: auto;">
		<div class="form-group">
			<label>Nama Kost <span class="text-danger">*</span></label>
			<input type="text" name="nama" class="form-control" placeholder="Masukan Nama Kost" required="" />
		</div>
		<div class="form-group">
			<label>Kategori <span class="text-danger">*</span></label>
			<select name="jenis" class="form-control" required="">
				<option selected disabled>Pilih Kategori</option>
				<?php foreach ($jenis as $key) : ?>
					<option value="<?= $key['jenis'] ?>"><?= $key['jenis'] ?></option>
				<?php endforeach; ?>
			</select>
		</div>
		<div class="form-group">
			<label>Nama Jumlah Kamar <span class="text-danger">*</span></label>
			<input type="text" name="jumlah_kamar" class="form-control" placeholder="Masukan Jumlah Kamar" required="" />
		</div>
		<div class="form-group">
			<label>Kamar Terisi <span class="text-danger">*</span></label>
			<input type="text" name="terisi" class="form-control" placeholder="Masukan Kamar Terisi" required="" />
		</div>
		<div class="form-group">
			<label>harga <span class="text-danger">*</span></label>
			<input type="number" name="harga" class="form-control" placeholder="Masukan Harga" required="" />
		</div>
		<div class="form-group">

		</div>
	
		<div class="form-group">
			<label>Pilih Fasilitas:</label>
			<div>
				<input type="checkbox" id="checkbox1" class="fasilitas-checkbox" value="Kasur"> <label for="checkbox1">Kasur</label>
			</div>
			<div>
				<input type="checkbox" id="checkbox2" class="fasilitas-checkbox" value="Bantal"> <label for="checkbox2">Bantal</label>
			</div>
			<div>
				<input type="checkbox" id="checkbox3" class="fasilitas-checkbox" value="Cermin"> <label for="checkbox3">Cermin</label>
			</div>
			<div>
				<input type="checkbox" id="checkbox4" class="fasilitas-checkbox" value="TV"> <label for="checkbox4">TV</label>
			</div>
			<div>
				<input type="checkbox" id="checkbox5" class="fasilitas-checkbox" value="AC"> <label for="checkbox5">AC</label>
			</div>
			<div>
				<input type="checkbox" id="checkbox6" class="fasilitas-checkbox" value="Lemari Baju"> <label for="checkbox6">Lemari Baju</label>
			</div>
			<div>
				<input type="checkbox" id="checkbox7" class="fasilitas-checkbox" value="Meja Belajar"> <label for="checkbox7">Meja Belajar</label>
			</div>
			<div>
				<input type="checkbox" id="checkbox8" class="fasilitas-checkbox" value="Kursi"> <label for="checkbox8">Kursi</label>
			<div>
				<input type="checkbox" id="checkbox9" class="fasilitas-checkbox" value="Kamar Mandi Dalam"> <label for="checkbox9">Kamar Mandi Dalam</label>
			</div>
			<div>
				<input type="checkbox" id="checkbox10" class="fasilitas-checkbox" value="Ember & Gayung"> <label for="checkbox10">Ember & Gayung</label>
			</div>
			<div>
				<input type="checkbox" id="checkbox11" class="fasilitas-checkbox" value="Dapur"> <label for="checkbox11">Dapur</label>
			</div>
			<div>
				<input type="checkbox" id="checkbox12" class="fasilitas-checkbox" value="Jendela"> <label for="checkbox12">Jendela</label>
			</div>
			<div>
				 <input type="checkbox" id="checkbox13" class="fasilitas-checkbox" value="Wi-Fi"> <label for="checkbox13">Wi-Fi</label>
			</div>
			<div>
				<input type="checkbox" id="checkbox14" class="fasilitas-checkbox" value="Parkiran"> <label for="checkbox14">Parkiran</label>
			</div>
			<div>
				<input type="checkbox" id="checkbox15" class="fasilitas-checkbox" value="Termasuk Listrik"> <label for="checkbox15">Termasuk Listrik</label>
			</div>
		</div>
			<div class="form-group">
				<div class="form-group">
					<label><span class="text-danger"></span></label>
					<textarea name="fasilitas" rows="5" class="form-control" readonly placeholder="Fasilitas Kamar" id="fasilitas-textarea"></textarea>
				</div>
			</div>

			<div class="form-group">
			<label>Pilih Peraturan:</label>
			<div>
				<input type="checkbox" id="checkbox16" class="peraturan-checkbox" value="Tamu menginap dikenakan biaya"> <label for="checkbox16">Tamu menginap dikenakan biaya</label>
			</div>
			<div>
				<input type="checkbox" id="checkbox17" class="peraturan-checkbox" value="Maks penghuni 1 orang/kamar"> <label for="checkbox17">Maks penghuni 1 orang/kamar</label>
			</div>
			<div>
				<input type="checkbox" id="checkbox18" class="peraturan-checkbox" value="Maks penghuni 2 orang/kamar"> <label for="checkbox18">Maks penghuni 2 orang/kamar</label>
			</div>
			<div>
				<input type="checkbox" id="checkbox19" class="peraturan-checkbox" value="Tidak untuk Pasutri"> <label for="checkbox19">Tidak untuk Pasutri</label>
			</div>
			<div>
				<input type="checkbox" id="checkbox20" class="peraturan-checkbox" value="Pasutri wajib menunjukan surat nikah"> <label for="checkbox20">Pasutri wajib menunjukan surat nikah</label>
			</div>
			<div>
				<input type="checkbox" id="checkbox21" class="peraturan-checkbox" value="Tidak boleh membawa anak"> <label for="checkbox21">Tidak boleh membawa anak</label>
			</div>
			<div>
				<input type="checkbox" id="checkbox22" class="peraturan-checkbox" value="Tambah biaya untuk alat elektronik"> <label for="checkbox22">Tambah biaya untuk alat elektronik</label>
			</div>
			<div>
				<input type="checkbox" id="checkbox23" class="peraturan-checkbox" value="Dilarang merokok di kamar"> <label for="checkbox23">Dilarang merokok di kamar</label>
			</div>
			<div>
				<input type="checkbox" id="checkbox24" class="peraturan-checkbox" value="Lawan jenis dilarang ke kamar"> <label for="checkbox24">Lawan jenis dilarang ke kamar</label>
			</div>
			<div class="form-group">
				<label><span class="text-danger"></span></label>
				<textarea name="peraturan" rows="5" class="form-control" readonly placeholder="Peraturan Indekos" id="peraturan-textarea"></textarea>
			</div>
		<div class="form-group">
			<label>Alamat <span class="text-danger">*</span></label>
			<textarea name="alamat" rows="5" class="form-control" placeholder="Masukan Alamat"></textarea>
		</div>
		<div class="form-group">
			<label>Koordinat <span class="text-danger">*</span></label>
			<input type="text" name="kordinat" class="form-control" placeholder="Masukan Koordinat" required="" />
		</div>
	</div>
	<div class="modal-footer">
		<button type="button" class="btn btn-text-danger btn-hover-light-danger mr-5" data-dismiss="modal">Batal</button>
		<button type="submit" class="btn btn-primary" id="kt_btn_1">Simpan</button>
	</div>
</form>

<script>
	$(document).ready(function() {
		$('.fasilitas-checkbox').on('change', function() {
			updateFasilitasTextarea();
		});

		function updateFasilitasTextarea() {
			var nomor = 1;
			var selectedFasilitas = [];
			$('.fasilitas-checkbox:checked').each(function() {
				selectedFasilitas.push(nomor++ + '. ' + $(this).val());
			});
			$('.fasilitas-checkbox:checked').each(function() {
			});
			$('#fasilitas-textarea').val(selectedFasilitas.join('\n'));
		}
	});
</script>
<script>
	$(document).ready(function() {
		$('.peraturan-checkbox').on('change', function() {
			updatePeraturanTextarea();
		});

		function updatePeraturanTextarea() {
			var nomor = 1;
			var selectedPeraturan = [];
			$('.peraturan-checkbox:checked').each(function() {
				selectedPeraturan.push(nomor++ + '. ' + $(this).val());
			});
			$('#peraturan-textarea').val(selectedPeraturan.join('\n'));
		}
	});
</script>
<script>
	$('#toggle').click(function(event) {
		if ($('#password').attr('type') == 'password') {
			$('#password').attr('type', 'text');
		} else {
			$('#password').attr('type', 'password');
		}
		$('.fa-eye , .fa-eye-slash').toggleClass('d-none');
	});

	$('#isi #add-form').submit(function(event) {
		const btn = KTUtil.getById("kt_btn_1");
		event.preventDefault();
		KTUtil.btnWait(btn);

		Crud.post('<?= $base ?>/save', new FormData(this), (result) => {
			Dialog.toast(result.type, result.message);
			KTUtil.btnRelease(btn);
			getTable(tb_url);
		})
	});
</script>