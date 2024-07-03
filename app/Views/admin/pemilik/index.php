<?=$this->extend("admin/layout"); ?>

<?=$this->section("content"); ?>

<?=view('admin/dashboard/subheader'); ?>

<div class="d-flex flex-column-fluid">
	<div class="container-fluid">

		<!--begin::Row-->
		<div class="row">
			<div class="card card-custom gutter-b col-12">
				<div class="card-header flex-wrap border-0 pt-6 pb-0">
					<div class="card-title">
						<h3 class="card-label">Tabel Data <?=$title ?>
						</h3>
					</div>
				</div>
				<div class="card-body">
					<!--begin: Datatable-->
					<div class="row align-items-center">
						<div class="col-12">
							<div class="row align-items-center justify-content-between">
								<div class="col-md-4 my-2 my-md-0">
									<div class="input-icon">
										<input type="text" class="form-control" placeholder="Search..."
											id="kt_datatable_search_query" />
										<span>
											<i class="flaticon2-search-1 text-muted"></i>
										</span>
									</div>
								</div>
								<button onclick="createUser()" type="button" class="btn btn-primary float-end"><i
										class="fa fa-plus me-2"></i><span>Tambah
										Data</span></button>
							</div>
						</div>
					</div>

					<div id="dt-table"></div>

				</div>
				<!-- end:: card body-->

			</div>
			<!-- end:: card -->


		</div>
		<!--end::Row-->

	</div>
	<!--end::Container-->

</div>
<?= view("admin/partials/_script") ?>
<?= view("admin/partials/_utils/crud") ?>
<div id="modal-place">
	<div class="modal fade" id="bry-modal" data-backdrop="static" tabindex="-1" role="dialog"
		aria-labelledby="staticBackdrop" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered" role="document">
			<div class="modal-content" id="isi">

			</div>
		</div>
	</div>
</div>


<!--end::Entry-->

<script>
	const tb_url = '<?=$base?>/table';

	//tampil tabel

	getTable(tb_url);

	// tampil form add

	$("#add-new").click(function (e) {

		Crud.getHtml('<?=$base?>/formAdd', (result) => {
			$('#isi').html(result);
			// tambah data
		});
	});


	// hapus dataPaket

	function hapus(id) {
		del('<?=$base?>/delete', id, () => {
			getTable(tb_url);
		})
	}

	// tampil form edit
	function formEdit(id) {
		Crud.getHtml('<?=$base?>/formEdit/' + id, (result) => {
			$('#isi').html(result);
		});

	}

	function createUser() {
		$('#isi').html(`
      <form id="add-form" action="" method="_post">
	      <div class="modal-body" data-scroll="false" data-height="500">
					<div class="form-group">
						<label>Nama<span class="text-danger">*</span></label>
						<input type="text" value="" name="nama" class="form-control" placeholder="Nama" required="">
					</div>
            
            		<div class="form-group">
						<label>Email<span class="text-danger">*</span></label>
						<input type="email" value="" name="email" class="form-control" placeholder="Email" required="">
					</div>
				
					<div class="form-group">
						<label>No Telepon<span class="text-danger">*</span></label>
						<input type="number" value="" name="no_wa" class="form-control" placeholder="Nomor Telepon" required="">
					</div>

					<div class="form-group input-icon input-icon-right">
						<label>Password<span class="text-danger">*</span></label>
						<input type="password" id="passworde" value="" name="password" class="form-control" placeholder="Masukan Password" required="">
						<span id="toggle">
						<i class="far fa-eye text-muted edit1"></i>
						<i class="far fa-eye-slash text-muted edit2 d-none"></i>
					</span>
						<p class="form-text text-muted">Default Password: <code>user</code></p>
					</div>
	      		</div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-outline-danger btn-hover-light-danger mr-5" data-dismiss="modal">Batal</button>
	        <button type="submit" class="btn btn-primary" id="kt_btn_1">Simpan</button>
	      </div>
    	</form>

			`);
		$('#bry-modal').modal('show');
		$('#add-form').submit(function (e) {
			const btn = KTUtil.getById("kt_btn_1");
			event.preventDefault();
			KTUtil.btnWait(btn);
			const form = new FormData(this);
			Crud.post('<?= base_url() ?>/admin/pemilik/add', form, (result) => {
				KTUtil.btnRelease(btn);
				$('#bry-modal').modal('hide');
				Dialog.toast(result.type, result.message);
				getTable(tb_url);
			});
		});
	};
</script>

<?=$this->endSection(); ?>