<?php

return [
	
	/*
	|--------------------------------------------------------------------------
	| Emails Language Lines
	|--------------------------------------------------------------------------
	|
	| The following language lines are used by the Mail notifications.
	|
	*/
	
	// built-in template
	'Whoops!' => 'Hoppla!',
	'Hello!' => 'Hallo!',
	'Regards' => 'Grüße',
	"If you’re having trouble clicking the \":actionText\" button, copy and paste the URL below\ninto your web browser: [:actionURL](:actionURL)" => "Wenn Sie Probleme beim Klicken auf die Schaltfläche  \":actionText\" haben, kopieren Sie die folgende URL und fügen Sie sie\nin Ihren Webbrowser ein: [:actionURL](:actionURL)",
	'All rights reserved.' => 'Alle Rechte vorbehalten.',
	
	
	// custom mail_footer (unused)
	'mail_footer_content'            => 'Verkaufen und kaufen Sie in Ihrer Nähe. Einfach, schnell und effizient.',
	
	
	// email_verification
	'email_verification_title'       => 'Bitte bestätigen sie ihre E-Mail Adresse.',
	'email_verification_action'      => 'Email Adresse bestätigen',
	'email_verification_content_1'   => 'Hallo :userName !',
	'email_verification_content_2'   => 'Klicken Sie auf die Schaltfläche unten, um Ihre E-Mail-Adresse zu bestätigen.',
	'email_verification_content_3'   => 'Sie erhalten diese E-Mail, weil Sie kürzlich ein neues: appName-Konto erstellt oder eine neue E-Mail-Adresse hinzugefügt haben. Wenn Sie es nicht waren, ignorieren Sie bitte diese E-Mail.',
	
	
	// post_activated (new)
	'post_activated_title'             => 'Your ad has been activated',
	'post_activated_content_1'         => 'Hello,',
	'post_activated_content_2'         => 'Your ad <a href=":postUrl">:title</a> has been activated.',
	'post_activated_content_3'         => 'It will soon be examined by one of our administrators for its publication on line.',
	'post_activated_content_4'         => 'You\'re receiving this email because you recently created a new ad on :appName. If this wasn\'t you, please ignore this email.',
	
	
	// post_reviewed (new)
	'post_reviewed_title'              => 'Your ad is now online',
	'post_reviewed_content_1'          => 'Hello,',
	'post_reviewed_content_2'          => 'Your ad <a href=":postUrl">:title</a> is now online.',
	'post_reviewed_content_3'          => 'You\'re receiving this email because you recently created a new ad on :appName. If this wasn\'t you, please ignore this email.',
	
	
	// post_republished (new)
	'post_republished_title'              => 'Your ad has been re-published',
	'post_republished_content_1'          => 'Hello,',
	'post_republished_content_2'          => 'Your ad <a href=":postUrl">:title</a> has been re-published successfully.',
	'post_republished_content_3'          => 'You\'re receiving this email because you recently created a new ad on :appName. If this wasn\'t you, please ignore this email.',
	
	
	// post_deleted
	'post_deleted_title'               => 'Your ad has been deleted',
	'post_deleted_content_1'           => 'Hello,',
	'post_deleted_content_2'           => 'Your ad ":title" has been deleted from <a href=":appUrl">:appName</a> at :now.',
	'post_deleted_content_3'           => 'Thank you for your trust and see you soon.',
	'post_deleted_content_4'           => 'PS: This is an automated email, please don\'t reply.',
	
	
	// post_seller_contacted
	'post_seller_contacted_title'      => 'Your ad ":title" on :appName',
	'post_seller_contacted_content_1'  => '<strong>Contact Information:</strong>
<br>Name: :name
<br>Email address: :email
<br>Phone number: :phone',
	'post_seller_contacted_content_2'  => 'This email was sent to you about the ad ":title" you filed on :appName : <a href=":postUrl">:postUrl</a>',
	'post_seller_contacted_content_3'  => 'NOTE: The person who contacted you do not know your email as you will not reply.',
	'post_seller_contacted_content_4'  => 'Remember to always check the details of your contact person (name, address, ...) to ensure you have a contact in case of dispute. In general, choose the delivery of the item in hand.',
	'post_seller_contacted_content_5'  => 'Beware of enticing offers! Be careful with requests from abroad when you only have a contact email. The bank transfer by Western Union or MoneyGram proposed may well be artificial.',
	'post_seller_contacted_content_6'  => 'Thank you for your trust and see you soon.',
	'post_seller_contacted_content_7'  => 'PS: This is an automated email, please don\'t reply.',
	
	
	// user_deleted
	'user_deleted_title'             => 'Your account has been deleted on :appName',
	'user_deleted_content_1'         => 'Hello,',
	'user_deleted_content_2'         => 'Your account has been deleted from <a href=":appUrl">:appName</a> at :now.',
	'user_deleted_content_3'         => 'Thank you for your trust and see you soon.',
	'user_deleted_content_4'         => 'PS: This is an automated email, please don\'t reply.',
	
	
	// user_activated (new)
	'user_activated_title'           => 'Welcome to :appName !',
	'user_activated_content_1'       => 'Welcome to :appName :userName !',
	'user_activated_content_2'       => 'Your account has been activated.',
	'user_activated_content_3'       => '<strong>Note : :appName team recommends that you:</strong>
<br><br>1 - Always beware of advertisers refusing to make you see the good offered for sale or rental,
<br>2 - Never send money by Western Union or other international mandate.
<br><br>If you have any doubt about the seriousness of an advertiser, please contact us immediately. We can then neutralize as quickly as possible and prevent someone less informed do become the victim.',
	'user_activated_content_4'       => 'You\'re receiving this email because you recently created a new :appName account. If this wasn\'t you, please ignore this email.',
	
	
	// reset_password
	'reset_password_title'           => 'Setze dein Passwort zurück',
	'reset_password_action'          => 'Passwort zurücksetzen',
	'reset_password_content_1'       => 'Haben Sie Ihr Passwort vergessen?',
	'reset_password_content_2'       => 'Lass uns dir einen neuen besorgen.',
	'reset_password_content_3'       => 'Wenn Sie kein Zurücksetzen des Kennworts angefordert haben, sind keine weiteren Maßnahmen erforderlich.',
	
	
	// contact_form
	'contact_form_title'             => 'Neue Nachricht von :appName',
	
	
	// post_report_sent
	'post_report_sent_title'           => 'New abuse report',
	'Post URL'                         => 'Post URL',
	
	
	// post_archived
	'post_archived_title'              => 'Your ad has been archived',
	'post_archived_content_1'          => 'Hello,',
	'post_archived_content_2'          => 'Your ad ":title" has been archived from :appName at :now.',
	'post_archived_content_3'          => 'You can repost it by clicking here : <a href=":repostUrl">:repostUrl</a>',
	'post_archived_content_4'          => 'If you do nothing your ad will be permanently deleted on :dateDel.',
	'post_archived_content_5'          => 'Thank you for your trust and see you soon.',
	'post_archived_content_6'          => 'PS: This is an automated email, please don\'t reply.',
	
	
	// post_will_be_deleted
	'post_will_be_deleted_title'       => 'Your ad will be deleted in :days days',
	'post_will_be_deleted_content_1'   => 'Hello,',
	'post_will_be_deleted_content_2'   => 'Your ad ":title" will be deleted in :days days from :appName.',
	'post_will_be_deleted_content_3'   => 'You can repost it by clicking here : <a href=":repostUrl">:repostUrl</a>',
	'post_will_be_deleted_content_4'   => 'If you do nothing your ad will be permanently deleted on :dateDel.',
	'post_will_be_deleted_content_5'   => 'Thank you for your trust and see you soon.',
	'post_will_be_deleted_content_6'   => 'PS: This is an automated email, please don\'t reply.',
	
	
	// post_notification
	'post_notification_title'          => 'New ad has been posted',
	'post_notification_content_1'      => 'Hello Admin,',
	'post_notification_content_2'      => 'The user :advertiserName has just posted a new ad.',
	'post_notification_content_3'      => 'The ad title: <a href=":postUrl">:title</a><br>Posted on: :now at :time',
	
	
	// user_notification
	'user_notification_title'        => 'New User Registration',
	'user_notification_content_1'    => 'Hello Admin,',
	'user_notification_content_2'    => ':name has just registered.',
	'user_notification_content_3'    => 'Registered on: :now at :time<br>Email: <a href="mailto::email">:email</a>',
	
	
	// payment_sent
	'payment_sent_title'             => 'Thanks for your payment!',
	'payment_sent_content_1'         => 'Hello,',
	'payment_sent_content_2'         => 'We have received your payment for the ad "<a href=":postUrl">:title</a>".',
	'payment_sent_content_3'         => 'Thank you!',
	
	
	// payment_notification
	'payment_notification_title'     => 'New payment has been sent',
	'payment_notification_content_1' => 'Hello Admin,',
	'payment_notification_content_2' => 'The user :advertiserName has just paid a package for her ad "<a href=":postUrl">:title</a>".',
	'payment_notification_content_3' => 'THE PAYMENT DETAILS
<br><strong>Reason of the payment:</strong> Ad #:adId - :packageName
<br><strong>Amount:</strong> :amount :currency
<br><strong>Payment Method:</strong> :paymentMethodName',
	
	// payment_approved (new)
	'payment_approved_title'     => 'Your payment has been approved!',
	'payment_approved_content_1' => 'Hello,',
	'payment_approved_content_2' => 'Your payment for the ad "<a href=":postUrl">:title</a>" has been approved.',
	'payment_approved_content_3' => 'Thank you!',
	'payment_approved_content_4' => 'THE PAYMENT DETAILS
<br><strong>Reason of the payment:</strong> Ad #:adId - :packageName
<br><strong>Amount:</strong> :amount :currency
<br><strong>Payment Method:</strong> :paymentMethodName',
	
	
	// reply_form
	'reply_form_title'               => ':subject',
	'reply_form_content_1'           => 'Hello,',
	'reply_form_content_2'           => '<strong>You have received a response from: :senderName. See the message below:</strong>',
	
	
	// generated_password
	'generated_password_title'            => 'Your password',
	'generated_password_content_1'        => 'Hello :userName!',
	'generated_password_content_2'        => 'You account has been created.',
	'generated_password_verify_content_3' => 'Click the button below to verify your email address.',
	'generated_password_verify_action'    => 'Verify email address',
	'generated_password_content_4'        => 'Your password is: <strong>:randomPassword</strong>',
	'generated_password_login_action'     => 'Login Now!',
	'generated_password_content_6'        => 'You\'re receiving this email because you recently created a new :appName account or added a new email address. If this wasn\'t you, please ignore this email.',

    //order mail
    'order_mail' => array(
        'my_orders' => 'Meine Bestellungen',
        'cart' => 'Warenkorb',
        'discount' => 'Rabatte',

        'success_buy' => 'Bestellung wurde bezahlt',
        'order_text_1' => 'Die Zahlung Ihrer Bestellung war erfolgreich. Bitte überprüfen Sie die Lieferadresse - Sie können sie in Ihrem <a href=":url" style="color: #ff7676 !important; text-decoration: none;">Konto korrigieren</a>, bis sie bestätigt wird. Wir senden Ihnen einen separaten Brief, um die Bestellung zu senden. Vielen Dank, dass Sie sich für '.config('app.name').' entschieden haben!',

        'address' => 'Versandadresse',
        'payment_details' => 'Details der Zahlung',
        'cost_of_goods' => 'Kosten der Ware:',
        'cost_of_delivery' => 'Lieferkosten:',
        'total' => 'Gesamt:',

        'products' => 'Produkte',

        'order_number' => 'Bestellnummer:',
        'color' => 'Farbe:',
        'size' => 'Größe:',
        'quantity' => 'Menge:',
        'price' => 'Preis:',
        'delivery' => 'Lieferung:',

        'similar' => 'Du magst vielleicht',

        'login_into' => 'Melden Sie sich bei Ihrem <a href=":url" style="color: #ff7676 !important; text-decoration: none;"> Konto </a> an:',
        'check_order_status' => 'Bestellstatus überprüfen',
        'track_delivery' => 'Lieferung verfolgen',
        'use_warranty' => 'Garantie verwenden',
        'account' => 'Konto',

        'text_footer_1' => 'Sie haben diese E-Mail erhalten, weil Sie die <a href="'.config('app.url').'" style="color: #ff7676 !important; text-decoration: none;"> '.config ( 'app.url'). '</a> Newsletter. Bitte antworten Sie nicht darauf. Der Brief wurde von einer Adresse gesendet, die keine eingehenden Nachrichten akzeptiert. Wenn Sie Fragen oder Anregungen haben, schreiben Sie an das Support-Team unter <a href="mailto:'.config('settings.app.email').'"> '.config (' settings.app.email '). '</a>.',
        'text_footer_2' => 'Durch den Kauf bei '.config (' app.name ').' Stimmen Sie den <a href=":url" style="color: #ff7676 !important; text-decoration: none;"> Nutzungsbedingungen zu</a>',

        'unsb' => 'Abmelden',
        'supp_serv' => 'Support-Service',
        'privacy_agree' => 'Datenschutzvereinbarung',
        'unsb_text' => 'Es ist unmöglich, Briefe über den Abschluss der Bestellung und die Rückgabe von Geld abzubestellen. Wir sind verpflichtet, sie zu senden, um Sie auf dem Laufenden zu halten. Sie können sich jedoch von Benachrichtigungen zum Bestellstatus abmelden.',

        'copyright' => '© '.date('Y').' '.config('app.name').'. Alle Rechte vorbehalten.',
    ),
];
