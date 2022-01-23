<div class="row" id="contacts-add-form">

	<form>
		<div class="row g-3 align-items-center">
			<div class="form-group">
				<label for="firstName" class="form-label">First Name</label>
				<input type="text" class="form-control" id="firstName" aria-describedby="firstNameHelp">
				<div id="firstNameHelp" class="form-text">Please Enter the first name.</div>
			</div>

			<div class="form-group">
				<label for="lastName" class="form-label">Last Name</label>
				<input type="text" class="form-control" id="lastName" aria-describedby="lastNameHelp">
				<div id="lastNameHelp" class="form-text">Please Enter the last name.</div>
			</div>

			<div class="form-group">
				<label for="countryCode" class="form-label">Country Code</label>
				<input type="number" class="form-control" id="countryCode" aria-describedby="countryCodeHelp">
				<div id="countryCodeHelp" class="form-text">Please Enter the country code.</div>
			</div>

			<div class="form-group">
				<label for="contactNumber" class="form-label">Contact Number</label>
				<input type="tel" class="form-control" id="contactNumber" aria-describedby="contactNumberHelp">
				<div id="contactNumberHelp" class="form-text">Please Enter the contact number.</div>
			</div>

			<div class="form-group">
				<label for="emailAddress" class="form-label">Email Address</label>
				<input type="email" class="form-control" id="emailAddress" aria-describedby="emailAddressHelp">
				<div id="emailAddressHelp" class="form-text">Please Enter the email address.</div>
			</div>

			<div class="form-group">
				<label for="imageUpload" class="form-label">Image</label>
				<input type="file" class="form-control" id="imageUpload" aria-describedby="imageUploadHelp">
				<div id="imageUploadHelp" class="form-text">Please upload the image.</div>
			</div>

			<div class="form-group">
				<button type="submit" class="btn btn-primary" id="addNewContactButton">Add Contact</button>
			</div>
		</div>
	</form>
</div>
<hr>
<div class="row" id="contacts-area">

	<table class="table" id="contacts-table">
		<thead>
		<tr>
			<th scope="col"></th>
			<th scope="col">First Name</th>
			<th scope="col">Last Name</th>
			<th scope="col">Country Code</th>
			<th scope="col">Contact Number</th>
			<th scope="col">Email Address</th>
		</tr>
		</thead>
		<tbody>


		</tbody>
	</table>

</div>

<script language="JavaScript">
	var Contact = Backbone.Model.extend({
		urlRoot: "<?php echo base_url()?>api/Contacts/contacts/id/",
		idAttribute: 'id',
		defaults: {
			user_id: 1,
			first_name: null,
			last_name: null,
			country_code: null,
			contact_number: null,
			email_address: null,
			picture_location: null
		}
	})

	var Contacts = Backbone.Collection.extend({
		model: Contact,
		url: "<?php echo base_url()?>api/Contacts/contacts/"
	})

	var contactCollection = new Contacts();

	var ContactsView = Backbone.View.extend({
			model: contactCollection,
			el: $('#contacts-table'),
			initialize: function () {
				contactCollection.fetch({async: false});
				//console.log(contactCollection);
				this.render();
				this.model.on('add', this.render, this);
			},
			render: function () {
				var self = this;
				contactCollection.each(function (contact) {
					// TODO: Try and change the way picture location is stored.
					var contactEntry =
						"<tr>  " +
						"<td> <img src='" + contact.get('picture_location') + "' width='200' height='200' class='img-thumbnail'></td> " +
						"<td>" + contact.get('first_name') + "</td> " +
						"<td>" + contact.get('last_name') + "</td> " +
						"<td>" + contact.get('country_code') + "</td> " +
						"<td>" + contact.get('contact_number') + "</td> " +
						"<td>" + contact.get('email_address') + "</td> " +
						"<td><button type='button' class='btn btn-primary'>Edit</button></td> " +
						"<td><button type='button' class='btn btn-primary'>Delete</button></td> " +
						"</tr>"
					self.$el.append(contactEntry)
				})

			}
		}
	)
	var contactView = new ContactsView();

	var ContactSearchView = Backbone.View.extend({
			el: $('#contacts-add-form'),
			initialize: function () {

			},
			render: function () {
				return this;
			},
			events: {
				"click #addNewContactButton": 'addContact'
			},
			addContact: function () {
				console.log("Adding new Contact.");
				var firstName = $('#firstName').val();
				var lastName = $('#lastName').val();
				var countryCode = $('#countryCode').val();
				var contactNumber = $('#contactNumber').val();
				var emailAddress = $('#emailAddress').val();
				var imageUpload = $('#imageUpload').val();
				//var tags = $('#lastName').val();
				if (firstName != null) {
					var contact = new Contact({
						first_name: firstName,
						last_name: lastName,
						country_code: countryCode,
						contact_number: contactNumber,
						email_address: emailAddress,
						picture_location: imageUpload
					});
					contact.save();
					contactCollection.add(contact);
					console.log(contact + contact.get('first_name'));
				} else {
					alert("Not found!" + firstName + " " + lastName)
				}
			}
		}
	)
	var contactView = new ContactSearchView();


</script>




