<?php
/*
	Template name: Contact
*/
?>
<?php get_header(); ?>
<div id="contact">

	<div id="contacts">

		<div class="container">
			<h2>Personale</h2>
<?php
	$staffgroups = array(
		'consultants' => array(
			'title' => 'Konsulenter',
			'contacts' => array()
		),
		'financing' => array(
			'title' => 'Finansiering',
			'subtitle' => 'Bil & Campingvogne',
			'contacts' => array()
		),
		'leasing' => array(
			'title' => 'Leasing',
			'contacts' => array()
		),
		'administration' => array(
			'title' => 'Administration',
			'contacts' => array()
		),
		'management' => array(
			'title' => 'Ledelse',
			'contacts' => array()
		)
	);

	foreach(get_field('staff') as $contact) {
		switch($contact['staffgroup']) {
			case "management":
				array_push($staffgroups['management']['contacts'], $contact);
				break;
			case "administration":
				array_push($staffgroups['administration']['contacts'], $contact);
				break;
			case "consultants":
				array_push($staffgroups['consultants']['contacts'], $contact);
				break;
			case "leasing":
				array_push($staffgroups['leasing']['contacts'], $contact);
				break;
			case "financing":
				array_push($staffgroups['financing']['contacts'], $contact);
				break;
		}
	}

	foreach($staffgroups as $staffgroup) {
		asort($staffgroup['contacts']);
		echo '<div class="staffgroup">';
			echo '<div class="headline">';
				echo '<h3>'.$staffgroup['title'];
				if($staffgroup['subtitle'] !== "") {
					echo '<span>'.$staffgroup['subtitle'].'</span>';
				}
				echo '</h3>';
			echo '</div>';
			echo '<div class="contacts">';
				$count = 1;
				foreach($staffgroup['contacts'] as $contact) {
					if($count % 2 == 0) { $zebra = "even"; } else { $zebra = "uneven"; }
					echo '<div class="contact '.$zebra.'">';
						echo '<div class="contact-image">';
							echo '<img src="'.$contact['image'][sizes][medium].'">';
						echo '</div>';
						echo '<div class="contact-data">';
							echo '<p>'.$contact['name'].'</p>';
							echo '<p><span class="contact-title">'.$contact['title'].'</span></p><br>';
							if($contact['mobile'] !== "") {
								echo '<p><strong>M:</strong> '.$contact['mobile'].'</p>';
							}
							echo '<p><strong>E:</strong> <a href="mailto:'.$contact['email'].'">'.$contact['email'].'<span><img src="'.get_template_directory_uri().'/img/paperplane.png" alt="paperplane"></span></a></p>';
						echo '</div>';
					echo '</div>';
					$count++;
				}
			echo '</div>';
		echo '</div>';
	}
?>
		</div><!-- /container -->
	</div><!-- /contacts -->
	<div id="contact-map"></div>
</div><!-- /contact -->
<?php get_footer(); ?>
