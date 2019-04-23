<h1> Bienvenu sur votre page membre !<br/>
    <?= $this->session->show('userFirst_name'); ?>
    <?= $this->session->show('userLast_name'); ?> <br/> <br/></h1>

   <p> Vous étes desormais membre ! Vous pouvez donc commentez différents articles du blog. <br/>
       Tout commentaires sera soumis a une validation.

   </p>