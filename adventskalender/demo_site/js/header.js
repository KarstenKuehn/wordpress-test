     if ('serviceWorker' in navigator) {
        window.addEventListener('load', function() {
          navigator.serviceWorker.register('/sw_min.js').then(function(registration) {
          }, function(err) {
            // registration failed :(
            console.log('ServiceWorker registration failed: ', err);
          });
        });

        navigator.serviceWorker.addEventListener('message', function(aEvent) {
          return aEvent.data;
        });
      }
                        
      if ('serviceWorker' in navigator) {
        var tDeferredPrompt;
        $(document).ready(function() {
          var btnAdd = document.getElementById('install_btn');
          if(navigator.serviceWorker.controller) {
            navigator.serviceWorker.controller.postMessage({'etracker':'getVersion'});
          }


                      btnAdd.addEventListener('click', function (aEvent) {
              aEvent.stopPropagation();
              btnAdd.hidden = true;
            });
            window.addEventListener('beforeinstallprompt', function (aEvent) {
              // Prevent Chrome 67 and earlier from automatically showing the prompt
              aEvent.preventDefault();
              // Stash the event so it can be triggered later.
              tDeferredPrompt = aEvent;
              btnAdd.hidden = false;
              btnAdd.classList.add('show-install-banner');
              $('.install-wrap .icon-close').on('click', function(aEvent) {$(aEvent.target.offsetParent).hide();aEvent.stopPropagation()})
            });

            btnAdd.addEventListener('click', function(aEvent) {
              // hide our user interface that shows our A2HS button
              btnAdd.hidden = true;
              // Show the prompt
              tDeferredPrompt.prompt();
              // Wait for the user to respond to the prompt
              tDeferredPrompt.userChoice
                .then(function (choiceResult) {
                  if (choiceResult.outcome === 'accepted') {
                    console.log('User accepted the A2HS prompt');
                  } else {
                    console.log('User dismissed the A2HS prompt');
                  }
                  tDeferredPrompt = null;
                });
            });
                  });

                $(document).ready(function() {
          if('serviceWorker' in navigator) {
            new de.multamedio.pfe.js.utils.ui.offlineHint.offlineHint(false);
          }
        });
      }
            $(document).ready(function() {
                de.multamedio.pfe.js.utils.ui.keyboardClickable(document);

                dwr.engine.setErrorHandler(function(aErrorMessage, aException){/* Do nothing */});

                if (0 < $('details').length) $('details').details();

                de.multamedio.pfe.js.utils.ui.preventDoubleClick();

                var navLinks = $('.nav.nav-pills.nav-justified');
        if(navLinks) {
          navLinks.on('touchstart', 'a', function () {});
        };

                $('.burger').offcanvas({
          container: '#offcanvas .modal-dialog', /*the container selector of the offcanvas menu*/
          closebutton: '#offcanvas-close', /*the selector for the close button of the offcanvas*/
          position: 'right', /*left or right*/
          animation: 'translation', /*translation or fade*/
          duration: '800',
          initial: 'closed', /*show the offcanvas or not. values: closed, open*/
          shadow: true
        });

        $(document).anchor({
          fixedElementSelector: '#topnavi',
          anchorClass: 'anchorlink'
        });

        $('#outbankiban, #new_iban').focusout(function() {
          this.value = this.value.toLocaleUpperCase();
        });

                
        de.multamedio.pfe.js.utils.ui.addClickEventToAnchorElements();
      });