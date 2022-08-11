<?php

/**
 * Simple hello world example
 *
 * @return void
 */
function hello_world() {
    echo "<span>Hello Wordl!</span>";
}
add_shortcode('hello_world', 'hello_world');


/**
 * Turns the page upside down
 *
 * @return void
 */
function upside_down() {
    // Remove admin bar (problems with upside down admin bar)
    add_filter('show_admin_bar', 'is_blog_admin');
    ?>
    <style>
        body{
            -moz-transform: rotate(180deg);
            -webkit-transform: rotate(180deg);
            -o-transform: rotate(180deg);
        }
    </style>

    <script type="text/javascript">
        window.onload = scrollDownToTheTop;
        function scrollDownToTheTop() {
            window.scrollTo(0, document.body.scrollHeight);
        }
    </script>

    <?php
}
add_shortcode('upside_down', 'upside_down');


/**
 * Add a bouncing wordpress logo to your website
 * Like old DVD screensavers
 *
 * @param $params array : if $params['image'] is received, this URL will be used as logo
 * @return void
 */
function bouncy_logo($params) {

    $image = plugin_dir_url( __DIR__ ) . 'img\wp_logo.png';
    if(isset($params['image'])) {
        $image = $params['image'];
    }

    ?>
    <style>
        img.bouncy-img, div.bouncy-div {
            width: 100px;
            height: 100px;
        }

        .bouncy-div {
            -webkit-animation: bouncy-div 13s linear infinite alternate;
            animation: bouncy-div 13s linear infinite alternate;
        }

        .bouncy-img {
            -webkit-animation: bouncy-img 7s linear infinite alternate;
            animation: bouncy-img 7s linear infinite alternate;
        }

        @-webkit-keyframes bouncy-div {
            100% {
                transform: translateX(calc(100vw - 100px));
            }
        }

        @keyframes bouncy-div {
            100% {
                transform: translateX(calc(100vw - 100px));
            }
        }
        @-webkit-keyframes bouncy-img {
            100% {
                transform: translateY(calc(100vh - 100px));
            }
        }
        @keyframes bouncy-img {
            100% {
                transform: translateY(calc(100vh - 100px));
            }
        }
    </style>


    <div class="bouncy-div">
        <img class="bouncy-img" src="<?php echo $image; ?>" alt="wordpress" />
    </div>

    <?php
}
add_shortcode('bouncy_logo', 'bouncy_logo');


/**
 * Echoes a random joke
 *
 * @return void
 */
function random_joke($params)
{
    $type = 'Any';
    $permitted_types = ['Programming', 'Misc', 'Dark', 'Pun', 'Spooky', 'Christmas'];

    if(isset($params['type']) and in_array($params['type'], $permitted_types)) {
        $type = $params['type'];
    }

    $url = "https://v2.jokeapi.dev/joke/$type";
    $response = wp_safe_remote_get( $url );

    $status = wp_remote_retrieve_response_code($response);
    if($status == 200) {
        $body = json_decode(wp_remote_retrieve_body( $response ));
        if($body->type == 'single'){
            echo "<div class='random_joke_shortcode'><p>{$body->joke}</p></div>";
        } else {
            echo "<div class='random_joke_shortcode'><p>{$body->setup}</p><p>{$body->delivery}</p></div>";
        }
    } else {
        echo "There was an error getting a joke, and that's no joke.";
    }

}
add_shortcode('random_joke', 'random_joke');