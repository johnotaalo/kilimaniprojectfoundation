<?php $this->load->view('Template/emails/partials/common_header'); ?>
<p>Welcome to the <b>Kilimani Project Foundation!</b> We are delighted that you have joined us in making Kilimani a community of choice.</p>

<p>Your membership has been confirmed for the one calendar year from the date of this letter.  Attached in PDF below is your membership card, which you should print and keep with you.</p>

<p>As we continue to grow our network of corporate members, we will introduce special discounts and offers when visiting local businesses.  Your membership card with a photo ID will allow you to benefit from these offers.</p>

<p>Also as a member of KPF, you will be added to our listserv and will receive our monthly newsletter which will familiarize you with the activities happening within the foundation. In addition, you will be added to our members-only WhatsApp group.  Several public officials are also members of this group, so feel free to use this platform to respectfully express issues concerning environment, infrastructure, security and social issues in Kilimani.  We have a strict rule against forwards and jokes, which will be shared with you over WhatsApp.</p>
 
<p>Please bookmark our website <a href="http:://www.kilimani.co.ke">www.kilimani.co.ke</a> where you will find more information about our history, programs and activities. Also join us on Facebook and Twitter to get more real-time information on events and activities happening in the community.</p>

<?php
	$data['contacts'] = true;
?>
<?php $this->load->view('Template/emails/partials/common_footer', $data); ?>