<div  class="table datatable-bordered datatable-head-custom datatable-hover" id="kt_datatable" >
<table style="display: none;">
<thead >
  <tr>
    <th class="text-center">No</th>
    <th>Nama Kost</th>
    <th>Pemilik</th>
    <th>Jumlah Kamar</th>
    <th>Terisi</th>
    <th>Fasilitas</th>
	<th>Peraturan</th>
    <th>Harga</th>
    <th>Jenis</th>
    <th>Alamat</th>
	<th>Koordinat</th>
    <?php if ($pemilik || session()->get('role')  === 'Admin') :?>
			<th>Action</th>			
		<?php endif;?>
  </tr>
</thead>
<tbody id="tb-data">
<?php $no=1; foreach ($Kost as $row): ?>
<tr>
<!-- oncontextmenu="coba(event,<?=$row['id'] ?>)" -->
	<td class="text-center"><?=$no++ ?></td>
	<td><?=$row['nama'] ?></td>
	<td><?=$row['nmpemilik'] ?></td>
	<td><?=$row['jumlah_kamar'] ?></td>
	<td><?=$row['terisi'] ?></td>
	<td><?=$row['fasilitas'] ?></td>
	<td><?=$row['peraturan'] ?></td>
	<td><?=$row['harga'] ?></td>
	<td><?=$row['jenis'] ?></td>
	<td><?=$row['alamat'] ?></td>
	<td><?=$row['kordinat'] ?></td>
  <?php if ($pemilik || session()->get('role')  === 'Admin') :?>
		<td nowrap="nowrap">
		<div class="d-flex w-100">

		<?php if (session()->get('role')  !== 'Admin') :?>
		
		<a class="btn btn-sm btn-icon btn-light-primary mr-2" title="Upload Foto" href="#" onclick="addImg(<?=$row['id'] ?>)">
			<i class="flaticon2-image-file"></i>
		</a>
		<a class="btn btn-sm btn-icon btn-light-success mr-2" title="edit" href="#" onclick="formEdit(<?=$row['id'] ?>)">
			<i class="fas fa-pen"></i>
		</a>
		<?php endif; ?>
		<a class="btn btn-sm btn-icon btn-light-danger" href="#" title="hapus" onclick="hapus(<?=$row['id'] ?>)">
			<i class="flaticon2-rubbish-bin-delete-button"></i>
		</a>
		</div>
		
	</td>
	<?php endif;?>

</tr>
<?php endforeach ?>
 </tbody>
</table>
</div>