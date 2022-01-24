<h1>Add New Contact Page</h1>
<div class="row" id="contacts-add-form">
	<?php $attributes = array('id' => 'addContactForm', 'class' => 'row g-3') ?>

	<?php if ($this->session->flashdata('additionErrors') !== null): ?>
		<div class="alert alert-danger print-error-msg">
			<?php echo $this->session->flashdata('additionErrors'); ?>
			<?php unset($_SESSION['additionErrors']); ?>
		</div>
	<?php endif; ?>

	<?php if ($this->session->flashdata('additionFailMessage') !== null): ?>
		<div class="alert alert-danger print-error-msg">
			<?php echo $this->session->flashdata('additionFailMessage'); ?>
			<?php unset($_SESSION['additionFailMessage']); ?>
		</div>
	<?php endif; ?>

	<?php echo form_open_multipart('Contact/addNewContactVerification',$attributes); ?>

	<!-- Firstname Input -->
	<div class="form-group">
		<?php

		echo form_label('First Name');
		$data = array(
			'class' => 'form-control',
			'name' => 'firstName',
			'id' => 'firstName',
			'placeholder' => 'Enter First name',
			'value' => set_value('firstname')
		);
		echo form_input($data);
		?>
	</div>

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
	<!-- Country COde Input -->
	<div class="form-group">
		<?php

		echo form_label('Country Code');
		$data = array(
			'class' => 'form-control',
			'name' => 'countryCode',
			'id' => 'countryCode',
			'placeholder' => 'Country Code',
			'value' => set_value('countryCode')
		);
		echo form_input($data);
		?>
	</div>

	<!-- Contact Number Input -->
	<div class="form-group">
		<?php

		echo form_label('Contact Number');
		$data = array(
			'class' => 'form-control',
			'name' => 'contactNumber',
			'placeholder' => 'Enter Contact Number',
			'value' => set_value('contact_number')
		);
		echo form_input($data);
		?>
	</div>

	<!-- Email Input -->
	<div class="form-group">
		<?php

		echo form_label('Email Address');
		$data = array(
			'class' => 'form-control',
			'name' => 'email_address',
			'placeholder' => 'Enter Email Address',
			'value' => set_value('email_address')
		);
		echo form_input($data);
		?>
	</div>

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

	<div class="form-group">
		<?php
		$data = array(
			'class' => 'btn btn-primary',
			'id' => 'addNewContactButton',
			'name' => 'submit',
			'value' => 'Add Contact',
		);
		echo form_submit($data);
		?>
	</div>

	<?php echo form_close(); ?>
</div>
<hr>





