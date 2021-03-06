<?php

return [
    'Reviews' => 'Avis',
    'Review' => 'Avis',
    'Reviews system' => 'Système d\'avis',
    'Ratings' => 'Notes',
    'Rating' => 'Note',
    'count_reviews' => '{0} avis|{1} avis|[2,*] avis',
    'count_stars' => '{0} étoile|{1} étoile|[2,*] étoiles',
    'count_ratings' => '{0} note|{1} note|[2,*] notes',
    'There were errors while submitting this review' => 'Il y a eu des erreurs lors de l\'envoi de ce commentaire',
    'Your review has been posted!' => 'Votre commentaire a bien été posté !',
    'Your review has been removed!' => 'Votre commentaire a bien été supprimé !',
    'Enter your review here...' => 'Entrer un commentaire ici...',
    'Leave a Review' => 'Laissez un commentaire',
    'Anonymous' => 'Anonyme',
    'Delete' => 'Supprimer',
    'Ad' => 'Annonce',
    'Comments' => 'Commentaires',
    'Comment' => 'Commentaire',
    'Approved' => 'Approuvé',
    'Spam' => 'Spam',
    'User' => 'Utilisateur',
    'Note' => 'Note',
    'You must be logged in to post a review.' => 'Vous devez être identifié avant de poster une note.',
    'validation' => [
        'comment' => [
            'required' => 'Vous devez entrer un commenatire.',
            'min' => 'Le commentaire doit contenir au moins :min caractères.',
            'max' => 'Le commentaire ne doit pas dépasser les :max caractères.',
        ],
        'rating' => [
            'required' => 'Vous devez utiliser les étoiles pour donner une note.',
            'integer'  => 'La note doit être un nombre entier.',
            'between' => 'La note doit être comprise entre :min et :max.',
        ],
    ],
	'guests_comments_label' => 'Allow Guests to post Reviews',
	'guests_comments_hint' => 'Allow guest users to post Ratings and Comments',
	'Manage' => 'Manage',
];