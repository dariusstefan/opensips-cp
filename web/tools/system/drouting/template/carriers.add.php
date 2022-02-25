<?php
/*
 * Copyright (C) 2011 OpenSIPS Project
 *
 * This file is part of opensips-cp, a free Web Control Panel Application for 
 * OpenSIPS SIP server.
 *
 * opensips-cp is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation; either version 2 of the License, or
 * (at your option) any later version.
 *
 * opensips-cp is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program; if not, write to the Free Software
 * Foundation, Inc., 59 Temple Place - Suite 330, Boston, MA  02111-1307, USA.
 */
?>

<form action="<?=$page_name?>?action=add_verify" method="post">
<table width="350" cellspacing="2" cellpadding="2" border="0">
 <tr align="center">
  <td colspan="2" class="mainTitle">Add new carrier</td>
 </tr>
<?php
 if (isset($form_error)) {
                          echo('<tr align="center">');
                          echo('<td colspan="2" class="dataRecord"><div class="formError">'.$form_error.'</div></td>');
                          echo('</tr>');
                         }
?>
 <tr>
   <td class="dataRecord"><b>Carrier ID</b></td>
   <td class="dataRecord"><input type="text" name="carrierid" value="<?=$carrierid;?>" maxlength="128" class="dataInput"></td>
 </tr>
 <tr>
  <td class="dataRecord" ><b>Gateway List</b></td>
   <td class="dataRecord">
	<input type="text"   name="gwlist" id="gwlist" value="" maxlength="<?=(isset($config->gwlist_size)?$config->gwlist_size:255)?>" readonly class="dataInput" style="width:423px!important">
	<input type="button" name="clear_gwlist" value="Clear Last" class="inlineButton" style="width:90px" onclick="clearObject('gwlist')">
   </td>
  </tr>
  <tr>
   <td/>
   <td class="dataRecord">
	<?=print_gwlist()?>
	<input type="text"   name="weight" id="weight" value="" maxlength="5" class="dataInput" style="width:40!important;">
	<input type="button" name="add_gwlist" value="Add" class="inlineButton" style="width:90px" onclick="addElementToObject('gwlist','weight')">
   </td>
  </tr>

 <tr>
  <td class="dataRecord">List Sorting</td>
  <td class="dataRecord"><select name="list_sort" id="list_sort" style="width:275px;" class="dataSelect"><?php dr_get_options_of_list_sort(NULL)?></select></td>
 </tr>

 <tr>
  <td class="dataRecord"><b>Use only first</b></td>
    <td class="dataRecord">
        <select id="useonlyfirst" name="useonlyfirst" class="dataSelect" style="width: 275px;">
            <option value="0" <?php if (isset($useonlyfirst)) {if ($useonlyfirst==0) echo "selected";} else echo "selected";?>>0 - No</option>
            <option value="1" <?php if (isset($useonlyfirst)) {if ($useonlyfirst==1) echo "selected";} ?>>1 - Yes</option>
        </select>   
    </td>
  </tr>
<tr>
	<td class="dataRecord">
		<b>DB State</b>
	</td>
	<td class="dataRecord" width="200">
		<select id="state" name="state" class="dataSelect" style="width: 275px;">
			<option value="0" <?php if (isset($state) && $state == 0) echo "selected"; ?>>0 - Active</option>
			<option value="1" <?php if (isset($state) && $state == 1) echo "selected"; ?>>1 - Inactive</option>
		</select>
	</td>
 </tr>
 <tr>
  <td class="dataRecord"><b><?=get_settings_value("gw_attributes")["display_name"]?></b></td>
  <td class="dataRecord"><input type="text" name="attrs" value="<?=(isset($resultset[0]['attrs']) || $resultset[0]['attrs'] == "")?get_settings_value("gw_attributes")["add_prefill_value"]:""?>" maxlength="128" class="dataInput"></td>
 </tr>
 <tr>
  <td class="dataRecord"><b>Description</b></td>
  <td class="dataRecord"><input type="text" name="description" value="<?=$resultset[0]['description']?>" maxlength="128" class="dataInput"></td>
 </tr>
 <tr>
  <td colspan="2">
    <table cellspacing=20>
      <tr>
      <td class="dataRecord" align="right" width="50%">
      <input type="submit" name="edit" value="Add" class="formButton"></td>
      <td class="dataRecord" align="left" width="50%"><?php print_back_input(); ?></td>
      </tr>
    </table>
 </tr>
</table>
</form>
