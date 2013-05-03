<?=$this->element('admin_header',
	array("selected" => "Users")); 
?>
<?
    if(!isset($loop_fuel)) {
        $loop_fuel = -1;
    }
    $i = $loop_fuel;
?>

<table>
<tr>
<?
foreach($users as $key => $value) {
    $key = $i + 1;
    if(!isset($users[$key])) {
        break;
    }
?>
    <td><a href="/users/<?=$users[$key]['User']['public_key'];?>/<?=$users[$key]['User']['username'];?>"><?=$users[$key]['User']['username'];?></a> 
	<?if(empty($users[$key]['User']['permission'])) {?><a class="promote" href="/admin/promote/<?=$users[$key]['User']['public_key'];?>">promote</a><? } else { ?>
		<a class="demote" href="/admin/demote/<?=$users[$key]['User']['public_key'];?>">demote</a>
	<? } ?>
	</td>
<?  $i++;
    if($i < 5 && $i > 0) {
        if($i % 4 == 0) {
?>
</tr>
<tr>
<?      } ?>
<?  }elseif($i > 5) {
        if(($i - 4) % 5 == 0) {
?>
</tr>
<tr>
<?      } ?>
<?  }
    if($i - $loop_fuel == 100) {
        break;
    }  ?>
<?
}
?>
</tr>
</table>

<?
    if((($end_page - $current) > 3) && $current > 3) { ?>
    <span style="float: left;"><a href="/admin/users/1"><u>1</u>&nbsp;</a></span>
    <span style="float: left;"><a href="/admin/users/<?=$current-2;?>"><u><?=$current-2;?></u>&nbsp;</a></span>
    <span style="float: left;"><a href="/admin/users/<?=$current-1;?>"><u><?=$current-1;?></u>&nbsp;</a></span>
    <span style="float: left;"><?=$current;?>&nbsp;</span>
    <span style="float: left;"><a href="/admin/users/<?=$current+1;?>"><u><?=$current+1;?></u>&nbsp;</a></span>
    <span style="float: left;"><a href="/admin/users/<?=$current+2;?>"><u><?=$current+2;?></u>&nbsp;</a></span>
    <span style="float: left;"><a href="/admin/users/<?=$end_page;?>"><u><?=$end_page;?></u></a></span>
<? }elseif($current < $end_page) { ?>
    <span style="float: left;">page <?=$current;?> of <a href="/admin/users/<?=$end_page;?>"><?=$end_page;?></a></span>
<? }else { ?>
    <span style="float: left;">page <?=$current;?> of <?=$end_page;?></span>
<? }
if(isset($next)) { ?>
    <span style="float: right;"><a href="/admin/users/<?=$next;?>">&nbsp;&nbsp;Next >></a></span>
<?
}
if(isset($previous)) { ?>
    <span style="float: right;"><a href="/admin/users/<?=$previous;?>"><< Previous&nbsp;&nbsp;</a></span>
<? } ?>