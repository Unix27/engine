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
                        Remplissez vos coordonn??es ci-dessous en cas de gain:
                    </div>
                    <div class="signup-arrow">
                        <svg version="1.1" id="Calque_1" xmlns="http://www.w3.org/2000/svg" x="0px" y="0px"
                             viewBox="0 0 401 65" style="enable-background:new 0 0 401 65;" xml:space="preserve">
                                <polygon class="arrowColor" points="0,0 0,0.1 200.5,55.1 401,0.1 401,0 "/>
                            <polygon class="arrowColor" points="69.2,22.5 200.5,65 331.8,22.5 200.5,58.1 "/>
                            </svg>
                    </div>
                    <div class="signup-title-txt">?? qui devons nous l&#039;envoyer ?</div>
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
                                                Nous vous informons que vous pourrez ??tre contact??(e) par voie
                                                ??lectronique, t??l??phone ou SMS par les partenaires suivants. Pour ne pas
                                                ??tre contact??(e), veuillez cliquer sur &quot;D??sinscription&quot;
                                                <br/><br/>Nous vous signalons l'existence de la liste d'opposition au
                                                d??marchage t??l??phonique <a href="https://conso.bloctel.fr/"
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

                                    <small>J'accepte le <a href="#" data-modal="rule">r??glement</a> de
                                        l'op??ration</small>
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
                                    * Vous pouvez utiliser Storefy gratuitement pendant la p??riode d'essai. Si vous n'annulez pas pendant cette p??riode, votre adh??sion au tarif Storefy sera automatiquement prolong??e ?? 8,33 ??? / mois (12 mois - total 99,96 ???).
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
            - <a href="/terms" target="_blank" data-modal="rule">R??glement</a>
            - <a href="/privacy" target="_blank" data-modal="legal">Mentions l??gales </a>
            - Gagnant d??termin?? par tirage au sort
        </p>
        <p>Vos r??ponses compl??teront votre profil afin de vous proposer des offres personnalis??es. De plus, si vous
            l???autorisez, les donn??es collect??es peuvent ??tre transmises aux partenaires de Tagadamedia.</p>
        <p>??</p>
        <p>??</p>
        <p>??</p>
        <p>??</p>
        <p>??</p>
        <p><br/>
            Adh??sion au Joonlo Club, frais
            <p>- Les achats et les informations sur les sources de prix alternatives dans la boutique en ligne ne sont possibles qu'avec une adh??sion valide au Joonlo Club. L'adh??sion au Joonlo Club est payante, ?? l'exception des adh??sions honorifiques gratuites.</p>
        <p>- L'adh??sion au Joonlo Club n'est ouverte qu'aux personnes physiques de plus de 18 ans qui agissent en tant que consommateurs. L'adh??sion ne peut ??tre que pour le priv??, c'est-??-dire H. utilis?? ?? des fins non commerciales. L'utilisation de l'adh??sion ?? des fins commerciales ou pour revendre les produits achet??s dans la boutique en ligne n'est pas autoris??e.</p>
        <p>- Pour devenir membre, le client propose ??galement au prestataire de services de conclure un contrat d'adh??sion lors de sa premi??re commande dans la boutique en ligne en remplissant et en soumettant le bon de commande sur lequel le client est inform?? du motif de l'adh??sion payante au Joonlo Club. dans le Joonlo Club. Les ??tapes de commande suivantes doivent ??tre effectu??es:</p>
            <p>a. Entrez le nom et l'adresse du client</p>
        <p>b. Saisie des informations de paiement</p>
        <p>c. Examen des donn??es client, possibilit?? de correction par le client r??. Cliquez sur le bouton "Acheter"</p>
        <p>Si le service accepte l'offre de contrat du client, celui-ci d??clare son acceptation ferme de l'offre du client dans un d??lai de 5 jours ?? compter de la r??ception de la commande au moyen d'une d??claration expresse par courrier ??lectronique. L'envoi de la marchandise command??e ou d'une facture au client ??quivaut ?? une d??claration d'acceptation expresse. Si le client choisit un mode de paiement mis ?? disposition par l'op??rateur, dans lequel le processus de paiement est d??clench?? pendant ou imm??diatement apr??s la commande (voir section 7.2), le contrat, en d??rogation aux dispositions ci-dessus, prend effet avec la confirmation de l'instruction de paiement par le client.</p>
        <p>- Si l'op??rateur accorde au client une p??riode de test gratuite, la cotisation est due pour la premi??re fois apr??s l'expiration de la p??riode de test. Si aucune p??riode d'essai n'est accord??e, la cotisation est due pour le paiement ?? la conclusion du contrat. Dans ce qui suit, la cotisation ?? payer pour une p??riode d'adh??sion sp??cifique doit ??tre pay??e au d??but de la p??riode concern??e. Les frais d'adh??sion sont payables dans les dix jours suivant la date d'??ch??ance.</p>
        <p>- L'adh??sion ne peut ??tre utilis??e qu'apr??s paiement de la cotisation.</p>
        <p>- Le service peut offrir des adh??sions honorifiques gratuites ?? des institutions caritatives et des b??n??voles. Les b??n??voles ou organisations appropri??s peuvent demander ?? devenir membre honoraire gratuit en utilisant le formulaire appropri??. La serveuse se r??serve le droit de rejeter les candidatures sans donner de raisons.</p>
        <p>- L'adh??sion ne peut ??tre transf??r??e ?? un tiers ni c??d??e ?? un tiers sans le consentement de l'op??rateur.</p>

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
