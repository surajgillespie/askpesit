<?=$this->element('admin_header',
	array("selected" => "Blacklist")); 
?>

<h3>Banned words:</h3>
<table>
	<tr>
<?php 
foreach($list as $key => $value) {
?>
		<td>
			"<?=$list[$key];?>"&nbsp;&nbsp;<a href="/askpesit/admin/blacklist/remove/<?=$list[$key];?>">remove</a>
		</td>
<? if($key > 0 && (($key < 6 && ($key % 4 == 0)) || ($key > 6 && (($key - 4) % 5 == 0)))) { ?>
	</tr>
	<tr>
<? } ?>
<? } ?>
</table>
<br/>
Or, <a href="/askpesit/admin/blacklist/add">add</a> a word to the terrible list.
