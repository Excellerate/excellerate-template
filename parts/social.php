<?php if ($facebook = $this->params->get('facebook', false)) : ?>
    <a href="<?= $facebook; ?>" class="socialLink"><i class="big square facebook icon"></i></a>
<?php endif; ?>

<?php if ($twitter = $this->params->get('twitter', false)) : ?>
    <a href="<?= $twitter; ?>" class="socialLink"><i class="big twitter icon"></i></a>
<?php endif; ?>

<?php if ($linkedin = $this->params->get('linkedin', false)) : ?>
    <a href="<?= $linkedin; ?>" class="socialLink"><i class="big linkedin icon"></i></a>
<?php endif; ?>

<?php if ($pinterest = $this->params->get('pinterest', false)) : ?>
    <a href="<?= $pinterest; ?>" class="socialLink"><i class="big pinterest icon"></i></a>
<?php endif; ?>

<?php if ($googlePlus = $this->params->get('googlePlus', false)) : ?>
    <a href="<?= $googlePlus; ?>" class="socialLink"><i class="big google plus icon"></i></a>
<?php endif; ?>

<?php if ($whatsApp = $this->params->get('whatsApp', '123')) : ?>
    <a href="tel:<?= preg_replace('/\D/', '', $whatsApp); ?>" title="Call <?= $whatsApp; ?>" class="socialLink"><i class="big whatsapp icon"></i></a>
<?php endif; ?>