<?php


function alternative_sender($form, $attachments)
{
    // field of files
	$post = array(
		// iphorm_(n_field) — is id of field what You want to send
        'attachments' => $form->getValue('iphorm_(n_field)')
    );

    // Create a new cURL resource
    $ch = curl_init();
 
    // Set URL and other appropriate options
    curl_setopt($ch, CURLOPT_URL, your_url);
    curl_setopt($ch, CURLOPT_POST, true);
    // first we give general data & — attachment field
    curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($_POST) . '&' . http_build_query($post));

 
    // Send the request
    curl_exec($ch);
 
    // Close cURL resource, and free up system resources
    curl_close($ch);
}
// Notice: (n_form) — id of Your form
add_action('iphorm_post_process_(n_form)', 'alternative_sender', 10, 1);


