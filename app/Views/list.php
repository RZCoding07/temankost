<table width="600" border="1" cellspacing="5" cellpadding="5">
	<tr style="background:#CCC">
		<th>Sr No</th>
		<th>First_name</th>
		<th>Last_name</th>
		<th>Email Id</th>
		<th>Update</th>
	</tr>
	<?php $i=1; foreach($result as $row) { 
		echo "<tr>"; 
		echo "<td>".$i. "</td>"; 
		echo "<td>".$row->first_name."</td>";
		echo "<td>".$row->last_name."</td>"; 
		echo "<td>".$row->email."</td>"; 
		echo "<td><a href='edit/".$row->id."'>Edit</a></td>";
		echo "</tr>"; $i++; } ?>
</table>