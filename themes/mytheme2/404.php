<?php get_header(); ?>

<main id="main" role="main" id="post-<?php the_ID(); ?>">
    <div class="page-error">
        <h1 class="has-text-align-center has-primary-light-color"><span>404</span></h1>
        <a class="link has-medium-font-size has-dark-color" href="/">
            <svg width="13" height="7" viewBox="0 0 13 7" fill="none" xmlns="http://www.w3.org/2000/svg" class="unsending__element">
                <path d="M0.99938 1.10187L5.9994 6L11.0291 1" stroke="black" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
            </svg>
            Aller sur la page d'accueil
        </a>
    </div>
</main>

<?php get_footer(); ?>