<h1>View Contacts Page</h1>
<div class="row" id="contacts-area">
	<div class="row" id="contacts-search-form">


		<?php $attributes = array('id' => 'searchByTagForm', 'class' => 'row g-3') ?>
		<?php echo form_open('Contact/searchByLastName', $attributes); ?>

		<!-- Lastname Input -->
		<div class="form-group">
			<?php

			echo form_label('Last Name');
			$data = array(
					'class' => 'form-control',
					'name' => 'lastName',
					'id' => 'lastName',
					'placeholder' => 'Enter Last Name',
					'value' => set_value('lastname')
			);
			echo form_input($data);
			?>
		</div>

		<!-- Submit Button-->
		<div class="form-group">
			<?php
			$data = array(
					'class' => 'btn btn-primary',
					'name' => 'submit',
					'value' => 'Search by Surname',

			);
			echo form_submit($data);
			?>
		</div>


		<?php echo form_close(); ?>

		<?php $attributes = array('id' => 'searchByTagForm', 'class' => 'row g-3') ?>
		<?php echo form_open('Contact/searchByTag', $attributes); ?>

		<!-- Tag Selection -->
		<div class="form-group">
			<?php
			echo form_label('Tag');
			$options = array(
					'friend' => 'Friend',
					'family' => 'Family',
					'school' => 'School',
					'work' => 'Work',
			);
			echo form_dropdown('tag', $options, 'friend');

			?>

		</div>
		<!-- Submit Button-->
		<div class="form-group">
			<?php
			$data = array(
					'class' => 'btn btn-primary',
					'name' => 'submit',
					'value' => 'Search By Tag',

			);
			echo form_submit($data);
			?>
		</div>


		<?php echo form_close(); ?>
	</div>
	<br/><br/>
	<hr>


	<table class="table" id="contacts-table">
		<thead>
		<tr>
			<th scope="col">First Name</th>
			<th scope="col">Last Name</th>
			<th scope="col">Country Code</th>
			<th scope="col">Contact Number</th>
			<th scope="col">Email Address</th>
			<th scope="col">Tags</th>
		</tr>
		</thead>


		<?php if (!empty($contact_details)): ?>
			<tbody>
			<?php foreach ($contact_details as $contact_detail): ?>
				<tr>
					<td> <?php echo $contact_detail['first_name']; ?> </td>
					<td> <?php echo $contact_detail['last_name']; ?> </td>
					<td> <?php echo $contact_detail['country_code']; ?> </td>
					<td> <?php echo $contact_detail['contact_number']; ?> </td>
					<td> <?php echo $contact_detail['email_address']; ?> </td>
					<td> <?php echo $contact_detail['tag']; ?> </td>

					<td><a type='button' class='btn btn-primary'
						   href='<?php echo base_url() ?>index.php/Contact/editExistingContactForm/<?php echo $contact_detail['contact_id']; ?>'>Edit</a>
					</td>
					<td><a type='button' class='btn btn-primary'
						   href='<?php echo base_url() ?>index.php/Contact/deleteExistingContact/<?php echo $contact_detail['contact_id']; ?>'>Delete</a>
					</td>

					<td> <?php ?> </td>

				</tr>

			<?php endforeach; ?>
			</tbody>
		<?php else: ?>
			<div class="row">
				<div class="d-flex justify-content-center">
					<h2>No contacts were found!</h2>
				</div>
			</div>
		<?php endif; ?>


	</table>

</div>




