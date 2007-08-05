<?php
/*

 Copyright (c) 2001 - 2007 Ampache.org
 All rights reserved.

 This program is free software; you can redistribute it and/or
 modify it under the terms of the GNU General Public License v2
 as published by the Free Software Foundation. 

 This program is distributed in the hope that it will be useful,
 but WITHOUT ANY WARRANTY; without even the implied warranty of
 MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 GNU General Public License for more details.

 You should have received a copy of the GNU General Public License
 along with this program; if not, write to the Free Software
 Foundation, Inc., 59 Temple Place - Suite 330, Boston, MA  02111-1307, USA.

*/

$web_path = Config::get('web_path');
$ajax_url = Config::get('ajax_url'); 

// Title for this album
$title		= scrub_out($album->name) . ' (' . $album->year . ') -- ' . $album->f_artist; 
?>
<?php show_box_top($title); ?>
<div style="float:left;display:table-cell;width:140px;">
	<?php 
        if ($album_name != _('Unknown (Orphaned)')) {
		$aa_url = $web_path . "/image.php?id=" . $album->id . "&amp;type=popup&amp;sid=" . session_id();
		echo "<a target=\"_blank\" href=\"$aa_url\" onclick=\"popup_art('$aa_url'); return false;\">";
		echo "<img border=\"0\" src=\"" . $web_path . "/image.php?id=" . $album->id . "&amp;thumb=2&amp;sid=" . session_id() . "\" alt=\"Album Art\" height=\"128\" />";
		echo "</a>\n";
        }
	?>
	</div>
	<div style="display:table-cell;vertical-align:top;">
		<div style="float:left; display:inline;" id="rating_<?php echo $album->id; ?>_album">
			<?php Rating::show($album->id,'album'); ?>
		</div>
	</div>
	<strong><?php echo _('Actions'); ?>:</strong><br />
	<div style="padding-left:5px;">
	<span class="text-action"><?php echo Ajax::text('?action=basket&type=album&id=' . $album->id,_('Play Album'),'play_full_' . $album->id); ?></span>
	<span class="text-action"><?php echo Ajax::text('?action=basket&type=album_random&id=' . $album->id,_('Play Random from Album'),'play_random_' . $album->id); ?></span> 
	<?php if ($GLOBALS['user']->has_access('75')) { ?>
	<a href="<?php echo $web_path; ?>/albums.php?action=clear_art&amp;album_id=<?php echo $album->id; ?>"><?php echo _('Reset Album Art'); ?></a><br />
	<?php } ?>
	<a href="<?php echo $web_path; ?>/albums.php?action=find_art&amp;album_id=<?php echo $album->id; ?>"><?php echo _('Find Album Art'); ?></a><br />
	<?php  if (($GLOBALS['user']->has_access('75')) || (!Config::get('use_auth'))) { ?>
	<a href="<?php echo $web_path; ?>/albums.php?action=update_from_tags&amp;album_id=<?php echo $album->id; ?>"><?php echo _('Update from tags'); ?></a><br />
	<?php  } ?>
	<?php if (Access::check_function('batch_download')) { ?>
	<a href="<?php echo $web_path; ?>/batch.php?action=alb&amp;id=<?php echo $album->id; ?>"><?php echo _('Download'); ?></a><br />
	<?php } ?>
	</div>

<?php show_box_bottom(); ?>
<?php 
	show_box_top($album->name . ' ' . _('Songs')); 
	$object_ids = $album->get_songs(); 
	require Config::get('prefix') . '/templates/show_songs.inc.php'; 
	show_box_bottom(); 
?>