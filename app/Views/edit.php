<html>
<head>
<title>Update user details</title>
</head>
 
<body>
 <?php
  if($result) {
  ?>
	<form method="post" action="<?php echo base_url('user/update'); ?>">
		<table width="600" border="1" cellspacing="5" cellpadding="5">
  <tr>
    <td width="230">Enter Your Name </td>
    <td width="329">
	<input type="hidden" name="txtId" value="<?php echo $result->id; ?>"/>
<input type="text" name="txtFirstName" value="<?php echo $result->first_name; ?>"/></td>
  </tr>
  <tr>
    <td>Enter Your Email </td>
    <td><input type="text" name="txtLastName" value="<?php echo $result->last_name; ?>"/></td>
  </tr>
  <tr>
    <td>Enter Your Mobile </td>
    <td><input type="text" name="txtEmail" value="<?php echo $result->email; ?>"/></td>
  </tr>
  <tr>
    <td colspan="2" align="center">
	<input type="submit" name="update" value="Update"/></td>
  </tr>
</table>
	</form>
	<?php } ?>
</body>
</html>