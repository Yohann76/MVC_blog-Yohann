<?php $this->title = "Membre"; ?>
<h1> Bienvenu sur votre page membre !<br/>
    <?= $this->session->show('userFirst_name'); ?>
    <?= $this->session->show('userLast_name'); ?> <br/> <br/></h1>

   <p> Vous êtes desormais membre ! Vous pouvez commenter différents articles du blog. <br/>
       Tout commentaires sera soumis a une validation.<br/></p>
        <br/>
        <br/>
        <div id="members-page">
            <h4> <span>Utilisation du site : </span> </h4>   <br/>

            <ol>
                <li>Votre vocabulaire sur ce site doit être approprié.</li>
                <li>Veuillez respecter les autres membres de la communauté. </li>
                <li>Vos commentaires serons soumis à une validation par un administrateur.</li>
                <li>Pour demander le rang d'administrateur, veuillez contacter un administrateur via le formulaire de contact du site.</li>
                <li>Le site se reserve le droit de vous expulsez si non respect des conditions de l'ensemble du site.</li>
            </ol>
            <br/>
            <h4> <span>Vous étes essentiel ! </span> </h4>   <br/>
            <ol>
                <li>Nous vous remercions de faire vivre notre site !</li>
                <li>Votre bienveillance vis a vis des autres membres est éssentiel.  </li>
                <li>Si vous avez une remarque veuillez contacter l'administrateur via la page "contact".</li>
            </ol>
        </div>



