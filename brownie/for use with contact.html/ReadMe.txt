

To use the contact form in the contact.html do the following:

1) move the contact-form.js into the "js" folder

2) rename the "contact.txt" to "contact.php" and place it in the root folder (the same place where all of the html files are)

3) open the contact.html file in an editor and in the <head></head> find and replace:

   <script src="js/setup.js"></script>

   With:

   <script src="js/setup.js"></script>
   <script src="js/contact-form.js"></script>

4) change the forms "send" link, find and replace:

   <p class="submit"> <a href="javascript:void(0);" class="button white">Send</a> </p>

   with

   <p class="submit"> <a href="javascript:void(0);" class="button white" onClick="$('.contact_form').submit();">Send</a> </p>


Once you have completed these steps open the contact.php and make the following modifications:

   $your_email = 'name@domain.com'; // Add Your email address

   $subject = 'Email from your contact form'; // Email subject
		

Change name@domain.com with your email address on which you want to receive emails and change the subject if needed.

The form is complete and visitors can contact you now through your site and all inquiries will be forwarded to the above mentioned email address.