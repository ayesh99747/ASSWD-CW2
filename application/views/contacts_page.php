<table class="table" id="contacts-table">
	<thead>
	<tr>
		<th scope="col">user_id</th>
		<th scope="col">first_name</th>
		<th scope="col">last_name</th>
		<th scope="col">country_code</th>
		<th scope="col">contact_number</th>
		<th scope="col">email_address</th>
		<th scope="col">picture_location</th>
	</tr>
	</thead>
	<tbody>


	</tbody>
</table>
<div class="row" id="contacts-area">


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

	var ContactSearchView = Backbone.View.extend({
			model: contactCollection,
			el: $('#contacts-table'),
			initialize: function () {
				contactCollection.fetch({async: false});
				console.log(contactCollection);
				this.render();
			},
			render: function () {
				var self = this;
				contactCollection.each(function (contact) {
					var contactEntry =
						"<tr>  <td>" + contact.get('user_id') + "</td> <td>" + contact.get('first_name') + "</td> <td>" + contact.get('last_name') + "</td> <td>" + contact.get('country_code') + "</td> <td>" + contact.get('contact_number') + "</td> <td>" + contact.get('email_address') + "</td> <td>" + contact.get('picture_location') + "</td> </tr>"
					self.$el.append(contactEntry)
				})

			}
		}
	)
	var contactView = new ContactSearchView();


</script>




