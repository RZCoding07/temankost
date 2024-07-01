<div  class="table datatable-bordered datatable-head-custom datatable-hover" id="kt_datatable" >
<table style="display: none;">
<thead >
  <tr>
    <th class="text-center">No</th>
    
    <th>Nama Pengguna</th>
    <th>Email</th>
    <th>Telepon</th>
    <th>Action</th>
  </tr>
</thead>
<tbody id="tb-data">
<?php $no=1; foreach ($Pengguna as $row): ?>
<tr>
	<td class="text-center"><?=$no++ ?></td>
	
	<td><?=$row['nama'] ?></td>
	<td><?=$row['email'] ?></td>
	<td><?=$row['telepon'] ?></td>
	<td nowrap="nowrap">
	<a class="btn btn-sm btn-icon btn-light-success mr-2" href="#" onclick="apah(<?=$row['id'] ?>)">
			<i class="fas fa-pen"></i>
	</a>
	<a class="btn btn-sm btn-icon btn-light-danger" href="#" onclick="hapus(<?=$row['id'] ?>)">
			<i class="flaticon2-rubbish-bin-delete-button"></i>
	</a>
	</td>
</tr>
<?php endforeach ?>
 </tbody>
</table>
</div>