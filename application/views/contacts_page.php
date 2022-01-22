<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<!--<link href="\cw2\assets\css\bootstrap.min.css" rel="stylesheet">
	<link href="\cw2\assets\css\bootstrap-grid.min.css" rel="stylesheet">
	<link href="\cw2\assets\css\bootstrap-reboot.min.css" rel="stylesheet">


	<script src="\cw2\assets\js\bootstrap.bundle.min.js"></script>
	<script src="\cw2\assets\js\bootstrap.min.js"></script>-->
	<!--	<script src="\cw2\assets\js\jquery.min.js"></script>
		<script src="\cw2\assets\js\underscore-min.js"></script>
		<script src="\cw2\assets\js\backbone-min.js"></script>-->


</head>
<body>

<div class="container">

	<table class="table" id="searchForm">
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
	<!--	CSS files -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
		  integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
			integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
			crossorigin="anonymous"></script>
	<!--	Backbone and Underscore files -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/underscore.js/1.8.3/underscore-min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/backbone.js/1.2.3/backbone-min.js"></script>
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
				el: $('#searchForm'),
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
</div>

</body>
</html>

