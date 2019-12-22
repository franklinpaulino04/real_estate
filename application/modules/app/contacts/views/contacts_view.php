<!--Contact page contact form area start-->
<section class="contact-form-main area-pading">
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="main-form text-center">
                    <div class="contact-area-title">
                        <h2 class="text-uppercase">Deja un mensaje</h2>
                        <p>Póngase en contacto con nuestros amables expertos</p>
                    </div>
					<div class="response"></div>
					<br><br>
                    <form id="form" action="<?php echo base_url()?>contacts/sent_mail" method="POST">
                        <input type="text" name="name_contacts" placeholder="Nombre">
                        <input type="email" name="email" placeholder="Correo">
                        <textarea name="message"  cols="30" rows="4" placeholder="Mensaje"></textarea>
                        <div class="submit-button"><input type="submit" value="Enviar" id="submit"></div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- / Contact page contact form area start-->
