</main>

        <footer class="footer">
            <div class="container">
                 <div class="row">
                    <div class="col-md-6">
                        <!--<img src="" class="navbar__logo">-->
                        logo
                    </div>
                    <div class="col-md-3">
                        <h5 class="header">Skontaktuj się z nami</h5>
                        <p class="">email:</p>
                        <p class="">asdas@adas.it</p>
                        <p class="">email:</p>
                        <p class="">asdas@adas.it</p>
                    </div>
                    <div class="col-md-3">
                        <a href="/kontakt" class="footer__link">Kontakt</a>
                    </div>
                </div>
            </div>
        </footer>

<!--<div class="cookies">
    <p class="cookies__text">Strona korzysta z plików cookie. Warunki przechowywania oraz dostępu plików cookie możesz samodzielnie określić w swojej przeglądarce.</p>
    <div class="button cookies__close">Nie pokazuj</div>
</div>-->

<script defer>
    let navOpened = false;
    let initHeight = 432;

    function slideToggle() {

        let navMobile = document.getElementById('header__nav-mobile');

        if (navOpened) {
            navOpened = false;
            navMobile.style.height = '0';
            document.getElementById('header__toggle').classList.remove('header__toggle--open');
        } else {
            navOpened = true;
            navMobile.style.height = initHeight + 'px';
            document.getElementById('header__toggle').classList.add('header__toggle--open');
        }
    }


/*
    // ---------- cookies banner ---------- //
    const cookieName = 'grzybowski';
    const cookieValue = 'dismissed';

    document.querySelector('.cookies__close').addEventListener('click', closeCookieBanner);

    isCookieBannerClosed();

    function closeCookieBanner() {
        const date = new Date();
        // Cookie is valid 104 days
        date.setTime(date.getTime() + (9000000000));
        document.cookie = `${cookieName}=${cookieValue};expires=${date.toUTCString()};path=/`;
        document.querySelector('.cookies').classList.remove("cookies--show");
    }

    function isCookieBannerClosed() {
        const cookies = decodeURIComponent(document.cookie).split(';');

        for (let cookie of cookies) {
            cookie = cookie.trim();
            if (cookie === `${cookieName}=${cookieValue}`) {
                document.querySelector('.cookies').classList.remove("cookies--show");
                return true;
            }
        }

        document.querySelector('.cookies').classList.add("cookies--show");
    }
    // ---------- /cookies banner ---------- //*/
</script>

<?php wp_footer(); ?>
</body>
</html>
