<?php $this->load->view('Template/emails/partials/common_header'); ?>
<p>Welcome to the <b>Kilimani Project Foundation!</b> We are delighted that you have joined us in making Kilimani ​"​A ​C​ommunity of ​C​hoice​"​.</p>

<p>Your corporate membership has been confirmed for one calendar year from today.  Attached in PDF below is your individual membership card, which you may print and keep with you.</p>  

<p>As we continue to grow our network of corporate members, we will introduce special discounts and offers when visiting local businesses.  Your membership card with a photo ID will allow you to benefit from these offers.  If your business would like to participate in this program, please contact us directly and we will get you enrolled.</p>

<p>Also as a member of KPF, you will be added to our database and will receive our monthly newsletter which will familiarize you with the activities happening within the foundation. In addition, you will be added to our members-only WhatsApp group.  Several public officials are also members of this group, so feel free to use this platform to respectfully express issues concerning environment, infrastructure, security and social issues in Kilimani. We ​will share the group rules with you over WhatsApp.</p>
 
<p>Please bookmark our website <a href = "http://www.kilimani.co.ke">www.kilimani.co.ke</a> where you will find more information about our history, programs and activities. Also join us on Facebook and Twitter to get more real-time information on events and activities happening in the community.</p>

<p>We look forward to getting to know more about your business and engaging in community building together.</p>
<?php
	$data['contacts'] = true;
?>
<?php $this->load->view('Template/emails/partials/common_footer', $data); ?>