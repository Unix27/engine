<!doctype html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="9QYJYxRs1q2GxuxdwmEYUFTqCjuOjaZuXYfGoruh">
    <link rel="manifest" href="/manifest.json">
    <link rel="icon" href="invites/iphone-fra/img/2112.png" sizes="32x32" type="image/png">
    <link rel="icon" href="invites/iphone-fra/img/2367.png" sizes="16x16" type="image/png">
    <link rel="icon" href="invites/iphone-fra/img/192x192-3935.png" sizes="192x192" type="image/png">
    <meta name="theme-color" content="#fa3cfe">

    <title>Conso Avenue : IPh12</title>

    <script src="invites/iphone-fra/js/app.js?id=39f64306de00bb0edfbd"></script>
    <script src="invites/iphone-fra/locales/bootstrap-datepicker.fr.min.js"></script>

    <link href="invites/iphone-fra/css/app.css?id=f164ca7e5c7faf72f314" rel="stylesheet">
    <link href="invites/iphone-fra/css/themes/bigbtn.css?id=7e96d160ef17d9949338" rel="stylesheet">

    <style type="text/css">
        .arrowColor {
            background-color: #fa3cfe;
            fill: #fa3cfe;
        }

        #signup .signup-right button[type="submit"] {
            background: #fa3cfe;
        }
    </style>
</head>
<body>

<div class="container">

    <div id="signup" class="one-step-signup-form">
        <header class="snapchat-row">
            <div class="title-brand">
                <img src="invites/iphone-fra/img/2112.png"/>
                Conso Avenue
            </div>
            <div class="title-1">

            </div>
            <div class="title-2">
                un iPhone 12
            </div>
        </header>
        <div class="row signup-container">
            <div class="signup-left">
                <img class="img-fluid img-landing" src="invites/iphone-fra/img/580x690-4246.jpg"/>
                <img class="img-fluid img-header-mobile" src="invites/iphone-fra/img/750x350-4248.jpg"/>
            </div>
            <div class="signup-right">
                <div class="signup-title snapchat-col-sm-12">
                    <div class="signup-header arrowColor">
                        Remplissez vos coordonnées ci-dessous en cas de gain:
                    </div>
                    <div class="signup-arrow">
                        <svg version="1.1" id="Calque_1" xmlns="http://www.w3.org/2000/svg" x="0px" y="0px"
                             viewBox="0 0 401 65" style="enable-background:new 0 0 401 65;" xml:space="preserve">
                                <polygon class="arrowColor" points="0,0 0,0.1 200.5,55.1 401,0.1 401,0 "/>
                            <polygon class="arrowColor" points="69.2,22.5 200.5,65 331.8,22.5 200.5,58.1 "/>
                            </svg>
                    </div>
                    <div class="signup-title-txt">À qui devons nous l&#039;envoyer ?</div>
                    <div class="signup-title-icon"></div>
                </div>

                <form method="post" id="signupForm" action="{{ lurl(trans('routes.register')) }}">
                    @csrf
                    <input type="hidden" name="invite" value="iphone">
                    <div class="form-row">
                        <div class="col input-container form-row">
                            <div class="form-group col-sm-12">
                                <input
                                    type="email"
                                    placeholder="Email"
                                    title="Votre adresse email"
                                    class="form-control"
                                    name="email"
                                    required="required"
                                    aria-required="true"
                                    autocomplete="nope"
                                    value=""
                                />

                            </div>
                            <div class="form-group col-sm-12">
                                <input
                                    type="password"
                                    placeholder="Mot de passe"
                                    title="Mot de passe"
                                    class="form-control"
                                    name="password"
                                    required="required"
                                    aria-required="true"
                                    autocomplete="nope"
                                    value=""
                                />

                            </div>

                            <div class="modal modal-sponsors" tabindex="-1" role="dialog" data-backdrop="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <div>
                                                Nous vous informons que vous pourrez être contacté(e) par voie
                                                électronique, téléphone ou SMS par les partenaires suivants. Pour ne pas
                                                être contacté(e), veuillez cliquer sur &quot;Désinscription&quot;
                                                <br/><br/>Nous vous signalons l'existence de la liste d'opposition au
                                                démarchage téléphonique <a href="https://conso.bloctel.fr/"
                                                                           target="_blank">"Bloctel" sur laquelle vous
                                                    pouvez vous inscrire ici</a>
                                            </div>
                                        </div>
                                        <div class="modal-body">
                                            <div class="row justify-content-center align-items-center">
                                                <div class="col-auto text-center"><i
                                                        class="fas fa-spinner fa-spin fa-2x"></i></div>
                                                <div class="col-auto text-center"><p class="h5">Chargement...</p></div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">
                                                Fermer
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group-checkbox form-group snapchat-col-sm-12">
                                <label>
                                    <input
                                        type="checkbox"
                                        name="rule"
                                        value="1"
                                        checked
                                    />

                                    <small>J'accepte le <a href="#" data-modal="rule">règlement</a> de
                                        l'opération</small>
                                </label>
                            </div>

                            <input type="hidden" name="email_confirmation" value=""/>
                        </div>
                        <div class="col-sm-12">
                            <button type="submit" class="btn btn-primary" id="signup-continue">
                                Je valide

                            </button>
                        </div>

                        <div class="submit_mention">

                        </div>
                        <div class="form-group-checkbox form-group snapchat-col-sm-12">
                            <input
                                type="hidden"
                                name="optin_partner"
                                value="1"
                            />

                            <p class="xs">

                                <small style="font-size: 60%;">
                                    * Vous pouvez utiliser Storefy gratuitement pendant la période d'essai. Si vous n'annulez pas pendant cette période, votre adhésion au tarif Storefy sera automatiquement prolongée à 8,33 € / mois (12 mois - total 99,96 €).
                                </small>
                            </p>

                        </div>
                        <input id="leadid_token" name="universal_leadid" type="hidden" value=""/></div>
                </form>
            </div>
        </div>

        <div id="sponsors">
            <div class="row align-items-center sponsors"></div>
        </div>
    </div>


    <footer>
        <p>
            Jeu gratuit sans obligation d'achat
            - <a href="/terms" target="_blank" data-modal="rule">Règlement</a>
            - <a href="/privacy" target="_blank" data-modal="legal">Mentions légales </a>
            - Gagnant déterminé par tirage au sort
        </p>
        <p>Vos réponses complèteront votre profil afin de vous proposer des offres personnalisées. De plus, si vous
            l’autorisez, les données collectées peuvent être transmises aux partenaires de Tagadamedia.</p>
        <p> </p>
        <p> </p>
        <p> </p>
        <p> </p>
        <p> </p>
        <p><br/>
            Adhésion au Joonlo Club, frais
            <p>- Les achats et les informations sur les sources de prix alternatives dans la boutique en ligne ne sont possibles qu'avec une adhésion valide au Joonlo Club. L'adhésion au Joonlo Club est payante, à l'exception des adhésions honorifiques gratuites.</p>
        <p>- L'adhésion au Joonlo Club n'est ouverte qu'aux personnes physiques de plus de 18 ans qui agissent en tant que consommateurs. L'adhésion ne peut être que pour le privé, c'est-à-dire H. utilisé à des fins non commerciales. L'utilisation de l'adhésion à des fins commerciales ou pour revendre les produits achetés dans la boutique en ligne n'est pas autorisée.</p>
        <p>- Pour devenir membre, le client propose également au prestataire de services de conclure un contrat d'adhésion lors de sa première commande dans la boutique en ligne en remplissant et en soumettant le bon de commande sur lequel le client est informé du motif de l'adhésion payante au Joonlo Club. dans le Joonlo Club. Les étapes de commande suivantes doivent être effectuées:</p>
            <p>a. Entrez le nom et l'adresse du client</p>
        <p>b. Saisie des informations de paiement</p>
        <p>c. Examen des données client, possibilité de correction par le client ré. Cliquez sur le bouton "Acheter"</p>
        <p>Si le service accepte l'offre de contrat du client, celui-ci déclare son acceptation ferme de l'offre du client dans un délai de 5 jours à compter de la réception de la commande au moyen d'une déclaration expresse par courrier électronique. L'envoi de la marchandise commandée ou d'une facture au client équivaut à une déclaration d'acceptation expresse. Si le client choisit un mode de paiement mis à disposition par l'opérateur, dans lequel le processus de paiement est déclenché pendant ou immédiatement après la commande (voir section 7.2), le contrat, en dérogation aux dispositions ci-dessus, prend effet avec la confirmation de l'instruction de paiement par le client.</p>
        <p>- Si l'opérateur accorde au client une période de test gratuite, la cotisation est due pour la première fois après l'expiration de la période de test. Si aucune période d'essai n'est accordée, la cotisation est due pour le paiement à la conclusion du contrat. Dans ce qui suit, la cotisation à payer pour une période d'adhésion spécifique doit être payée au début de la période concernée. Les frais d'adhésion sont payables dans les dix jours suivant la date d'échéance.</p>
        <p>- L'adhésion ne peut être utilisée qu'après paiement de la cotisation.</p>
        <p>- Le service peut offrir des adhésions honorifiques gratuites à des institutions caritatives et des bénévoles. Les bénévoles ou organisations appropriés peuvent demander à devenir membre honoraire gratuit en utilisant le formulaire approprié. La serveuse se réserve le droit de rejeter les candidatures sans donner de raisons.</p>
        <p>- L'adhésion ne peut être transférée à un tiers ni cédée à un tiers sans le consentement de l'opérateur.</p>

    </footer>
</div>


<div class="modal" id="modal-legaldata" tabindex="-1" role="dialog" data-backdrop="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-body"></div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
            </div>
        </div>
    </div>
</div>
</body>
</html>
