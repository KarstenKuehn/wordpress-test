<?php
/* 
  Template Name: Kontakt Template
*/
get_header();
?>
<main id="maincontent">
    <div class="main">
        <?php
        //echo '<h1 tabindex="0">'.get_the_title().'</h1>';
        $html = preg_replace('/(\>)\s*(\<)/m', '$1$2', get_my_content());
        echo $html;
        ?>
    </div>
</main>
<?php
$siteurl = str_replace('"', '',  json_encode(get_option('siteurl')));
?>
<!-- KONTAKT-FORM JS -->
<script>
    var wpforms_settings = {"val_tel":"telefonnummer !!!", "val_required":"Bitte füllen Sie das Pflichtfeld aus.","val_email":"Bitte geben Sie eine gültige E-Mail-Adresse ein.","val_email_suggestion":"Meinten Sie {suggestion}?","val_email_suggestion_title":"Klicken Sie hier, um diesen Vorschlag zu akzeptieren.","val_email_restricted":"Diese E-Mail-Adresse ist nicht zulässig.","val_number":"Bitte geben Sie eine gültige Telefonnummer ein.","val_number_positive":"Bitte geben Sie eine gültige positive Zahl ein.","val_confirm":"Feldwerte stimmen nicht überein.","val_checklimit":"Sie haben die Anzahl der zulässigen Auswahlen überschritten: {#}.","val_limit_characters":"{count} von {limit} maximale Zeichen.","val_limit_words":"{count} von {limit} maximale Wörter.","val_recaptcha_fail_msg":"Google reCAPTCHA-Bestätigung fehlgeschlagen. Bitte versuchen Sie es später erneut.","val_empty_blanks":"Bitte alle Felder ausfüllen.","uuid_cookie":"","locale":"de","wpforms_plugin_url":"$siteurl\/wp-content\/plugins\/wpforms-lite\/","gdpr":"","ajaxurl":"$siteurl\/wp-admin\/admin-ajax.php","mailcheck_enabled":"1","mailcheck_domains":[],"mailcheck_toplevel_domains":["dev"],"is_ssl":"1"}
</script>
<script src='/wp-includes/js/wp-embed.min.js?ver=5.7.2' id='wp-embed-js'></script>
<script src='/wp-includes/js/jquery/jquery.min.js?ver=3.5.1' id='jquery-core-js'></script>
<script src='/wp-includes/js/jquery/jquery-migrate.min.js?ver=3.3.2' id='jquery-migrate-js'></script>
<script src='/wp-content/plugins/wpforms-lite/assets/js/text-limit.min.js?ver=1.6.8.1' id='wpforms-text-limit-js'></script>
<script src='/wp-content/plugins/wpforms-lite/assets/js/jquery.validate.min.js?ver=1.19.0' id='wpforms-validation-js'></script>
<script src='/wp-content/plugins/wpforms-lite/assets/js/mailcheck.min.js?ver=1.1.2' id='wpforms-mailcheck-js'></script>
<script src='/wp-content/plugins/wpforms-lite/assets/js/wpforms.js?ver=1.6.8.1' id='wpforms-js'></script>
<script src='https://www.google.com/recaptcha/api.js?onload=wpformsRecaptchaLoad&#038;render=explicit' id='wpforms-recaptcha-js'></script>
<script id='wpforms-recaptcha-js-after'>
    if (!Element.prototype.matches) {
        Element.prototype.matches = Element.prototype.msMatchesSelector || Element.prototype.webkitMatchesSelector;
    }
    if (!Element.prototype.closest) {
        Element.prototype.closest = function (s) {
            var el = this;
            do {
                if (Element.prototype.matches.call(el, s)) { return el; }
                el = el.parentElement || el.parentNode;
            } while (el !== null && el.nodeType === 1);
            return null;
        };
    }
    var wpformsDispatchEvent = function (el, ev, custom) {
        var e = document.createEvent(custom ? "CustomEvent" : "HTMLEvents");
        custom ? e.initCustomEvent(ev, true, true, false) : e.initEvent(ev, true, true);
        el.dispatchEvent(e);
    };

    var wpformsRecaptchaLoad = function () {
        Array.prototype.forEach.call(document.querySelectorAll(".g-recaptcha"), function (el) {
            try {

                var recaptchaID = grecaptcha.render(el, {
                    callback: function () {
                        wpformsRecaptchaCallback(el);
                    }
                }, true);

                /******************
                 * WCAG - Properties
                 * */
                el.querySelector('#g-recaptcha-response').setAttribute("aria-hidden", "true");
                el.querySelector('#g-recaptcha-response').setAttribute("aria-label", "do not use");
                el.querySelector('#g-recaptcha-response').setAttribute("aria-readonly", "true");

                el.closest("form").querySelector("button[type=submit]").recaptchaID = recaptchaID;

            } catch (error) {}
        });

        wpformsDispatchEvent(document, "wpformsRecaptchaLoaded", true);
    };
    var wpformsRecaptchaCallback = function (el) {

        var wp_form = el.closest("form");
        if (typeof wpforms.formSubmit === "function") {
            wpforms.formSubmit(wp_form);
        } else {
            wp_form.querySelector("button[type=submit]").recaptchaID = false;
            wp_form.submit();
        }
    };

</script>
<script>
    /(trident|msie)/i.test(navigator.userAgent)&&document.getElementById&&window.addEventListener&&window.addEventListener("hashchange",function(){var t,e=location.hash.substring(1);/^[A-z0-9_-]+$/.test(e)&&(t=document.getElementById(e))&&(/^(?:a|select|input|button|textarea)$/i.test(t.tagName)||(t.tabIndex=-1),t.focus())},!1);
</script>
<script type='text/javascript'>
    /* <![CDATA[ */
    /*******************************
     * Kontakt Formular autocomplete
     *******************************/
    var betreff_label = document.querySelector('#wpforms-3127-field_1-container > label');
    if(betreff_label) {
        //betreff_label.setAttribute('aria-label', 'Betreff: Pflichtfeld');
        //betreff_label.setAttribute('tabindex', '0');
    }
    var betreff_input = document.getElementById('wpforms-3127-field_1');
    if(betreff_input) {
        betreff_input.setAttribute('aria-label', 'Betreff: Bitte füllen Sie das Pflichtfeld aus.');
        betreff_input.setAttribute('label', 'Betreff: Bitte füllen Sie das Pflichtfeld aus.');
        betreff_input.setAttribute('data-error-message', 'Betreff: Bitte füllen Sie das Pflichtfeld aus.');
    }

    var prefix_label = document.querySelector('#wpforms-3127-field_2-container > label');
    if(prefix_label) {
        //prefix_label.setAttribute('aria-label', 'Anrede');
        //prefix_label.setAttribute('tabindex', '0');
    }
    var prefix_input = document.getElementById('wpforms-3127-field_2');
    if(prefix_input) {
        prefix_input.setAttribute('autocomplete', 'honorific-prefix');
        prefix_input.setAttribute('aria-label', 'Anrede: Bitte füllen Sie das Feld aus. Es ist kein Pflichtfeld.');
        prefix_input.setAttribute('label', 'Anrede: Bitte füllen Sie das Feld aus. Es ist kein Pflichtfeld.');
    }

    var first_name_label = document.querySelector('#wpforms-3127-field_3-container > label');
    if(first_name_label) {
        // first_name_label.setAttribute('aria-label', 'Vorname');
        // first_name_label.setAttribute('tabindex', '0');
    }
    var first_name_input = document.getElementById('wpforms-3127-field_3');
    if(first_name_input) {
        first_name_input.setAttribute('autocomplete', 'given-name');
        first_name_input.setAttribute('aria-label', 'Vorname: Bitte füllen Sie das Feld aus. Es ist kein Pflichtfeld.');
        first_name_input.setAttribute('label', 'Vorname: Bitte füllen Sie das Feld aus. Es ist kein Pflichtfeld.');
    }

    var last_name_label = document.querySelector('#wpforms-3127-field_4-container > label');
    if(last_name_label) {
        // last_name_label.setAttribute('aria-label', 'Nachname');
        // last_name_label.setAttribute('tabindex', '0');
    }
    var last_name_input = document.getElementById('wpforms-3127-field_4');
    if(last_name_input) {
        last_name_input.setAttribute('autocomplete', 'family-name');
        last_name_input.setAttribute('aria-label', 'Nachname: Bitte füllen Sie das Feld aus. Es ist kein Pflichtfeld.');
        last_name_input.setAttribute('label', 'Nachname: Bitte füllen Sie das Feld aus. Es ist kein Pflichtfeld.');
    }

    var email_label = document.querySelector('#wpforms-3127-field_5-container > label');
    if(email_label) {
        // email_label.setAttribute('aria-label', 'Email: Pflichtfeld');
        // email_label.setAttribute('tabindex', '0');
    }
    var email_input = document.getElementById('wpforms-3127-field_5');
    if(email_input ) {
        email_input.setAttribute('autocomplete', 'email');
        email_input.setAttribute('aria-label', 'E-Mail: Bitte füllen Sie das Pflichtfeld im korrekten Format aus.');
        email_input.setAttribute('label', 'E-Mail: Bitte füllen Sie das Pflichtfeld im korrekten Format aus.');
        email_input.setAttribute('data-error-message', 'E-Mail: Bitte füllen Sie das Pflichtfeld im korrekten Format aus.');
    }

    var tel_label = document.querySelector('#wpforms-3127-field_6-container > label');
    if(tel_label) {
        // tel_label.setAttribute('aria-label', 'Telefonnummer');
        // tel_label.setAttribute('tabindex', '0');
    }
    var tel_input = document.getElementById('wpforms-3127-field_6');
    if(tel_input) {
        tel_input.setAttribute('type', 'tel');
        tel_input.setAttribute('autocomplete', 'tel');
        //placeholder="123-45-678" pattern="[0-9]{3}-[0-9]{2}-[0-9]{3}"
        tel_input.setAttribute('pattern', "[0-9]");
        tel_input.setAttribute('aria-label', 'Telefonnummer: Bitte füllen Sie das Feld aus. Es ist kein Pflichtfeld.');
        tel_input.setAttribute('label', 'Telefonnummer: Bitte füllen Sie das Feld aus. Es ist kein Pflichtfeld.');
    }

    var message_label = document.querySelector('#wpforms-3127-field_8-container > label');
    if(message_label) {
        // message_label.setAttribute('aria-label', 'Ihre Nachricht: Pflichtfeld');
        // message_label.setAttribute('tabindex', '0');
    }
    var message_input = document.getElementById('wpforms-3127-field_8');
    if(message_input) {
        message_input.setAttribute('aria-label', 'Ihre Nachricht: Bitte füllen sie das Pflichtfeld aus.');
        message_input.setAttribute('label', 'Ihre Nachricht: Bitte füllen sie das Pflichtfeld aus.');
        message_input.setAttribute('data-error-message', 'Ihre Nachricht: Bitte füllen sie das Pflichtfeld aus.');
    }

    var paragraphs =  document.getElementsByTagName('p');
    for (let i=0; i<paragraphs.length; i++) {
        paragraphs[i].setAttribute('tabindex', '0');
    }

    // var kontakt_form = document.getElementById('wpforms-form-3127');
    var kontakt_form = document.querySelector('.wpforms-container.kontakt-form .wpforms-form');

    kontakt_form.setAttribute('tabindex', '0');
    kontakt_form.setAttribute('role', 'group');
    kontakt_form.setAttribute('aria-label', 'Kontakt-Formular: Bitte füllen Sie alle benötigten Felder aus.')

    /**/

    const config = {
        attributes: true,
        childList: true,
        characterData: true
    };

    function wpformsErrorHandler(error_messages, targetForm) {

        var wpforms_error_container = document.createElement("div");
        wpforms_error_container.classList.add('form-error-message-container');
        wpforms_error_container.setAttribute('role', 'alert');
        wpforms_error_container.setAttribute('aria-live', 'polite');
        wpforms_error_container.setAttribute('aria-labelledby', 'error_title');
        wpforms_error_container.setAttribute('aria-describedby', 'error_messages');
        wpforms_error_container.setAttribute('tabindex', '0');

        var error_title = document.createElement("h3");
        error_title.setAttribute('id', 'error_title');
        error_title.classList.add('has-medium-font-size')
        error_title.innerText = "Fehler in folgenden Feldern:";

        var error_messages_container = document.createElement("ul");
        error_messages_container.setAttribute('id', 'error_messages');

        error_messages.forEach((error_message, i) => {
            var error_messages_item = document.createElement("li");
            error_messages_item.innerText = error_message;
            error_messages_container.appendChild(error_messages_item);
        }, error_messages);

        wpforms_error_container.appendChild(error_title);
        wpforms_error_container.appendChild(error_messages_container);

        var wpforms_field_container = document.querySelector('.wpforms-container.kontakt-form .wpforms-field-container');
        targetForm.insertBefore(wpforms_error_container, wpforms_field_container);
    }

    function callback(mutations) {

        const error_messages = [];

        mutations.forEach(mutation => {

            if (mutation.attributeName === 'class') {

                let targetElement = mutation.target;

                if(targetElement.classList.contains('wpforms-has-error')) {

                    let wpforms_field_label = targetElement.querySelector('label.wpforms-field-label');
                    let wpforms_error = targetElement.querySelector('label.wpforms-error');
                    let wpforms_field = targetElement.querySelector('.wpforms-field-required');

                    var error_message = wpforms_field_label.textContent;
                    error_message += ': ' + wpforms_error.textContent;

                    if(wpforms_field_label.hasAttribute('aria-label')) {
                        error_message = wpforms_field_label.getAttribute('aria-label');
                    }
                    if(wpforms_field.hasAttribute('data-error-message')) {
                        error_message = wpforms_field.getAttribute('data-error-message');
                    }
                    error_messages.push(error_message);
                }
            }
        });


        if(error_messages.length > 0) {
            wpformsErrorHandler(error_messages, kontakt_form);
            let error_title = document.getElementById('error_title');
            error_title.scrollIntoView(true);
        }

    }

    const observer = new MutationObserver(callback);

    let wpforms_fields = document.querySelectorAll('.wpforms-field-container > .wpforms-field')
    wpforms_fields.forEach((wpforms_field, i) => {
        observer.observe(document.querySelector('#' + wpforms_field.id), config);
    })

    /* ]]> */
</script>
<?php get_footer(); ?>
