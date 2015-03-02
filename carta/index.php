<?php get_header(); ?>
<?php
	if(get_field('bars')) {
		foreach(get_field('bars') as $bar) {
			switch($bar['acf_fc_layout']) {
				case "type1":
					barType1($bar);
					break;
				case "type2":
					barType2($bar);
					break;
				case "type3":
					barType3($bar);
					break;
				case "type4":
					barType4($bar);
					break;
				case "type5":
					barType5($bar);
					break;
			}
		}
	}
?>
<?php get_footer(); ?>
