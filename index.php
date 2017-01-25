<?php
    /*
     *  Respondint Solutions LLC
     *  Copyright (C) 2015 Isaiah Marc Sanchez <isaiah.marc.sanchez@gmail.com> - All Rights Reserved.
     *
     *  This file is proprietary and confidential.
     *
     *  This file is property of Isaiah Marc Sanchez and is not meant to be distributed or duplicated, privately or publicly. 
     *  Unauthorized distributing, duplicating, or using of this file, via any medium, is strictly prohibited and is 
     *  in violation of Article 1, Section 1, Clause 8 of the United States Constitution and will be pursued.
     *
     *  If you have authorized access to this code, please note it may contain private, important, and sensitive information
     *  that can never be shared or copied under any circumstances.
     *
     *  This code is not licensed with the GNU Affero General Public License <http://www.gnu.org/licenses/agpl-3.0.html> 
     *  or the MIT License <http://opensource.org/licenses/MIT>.
     *
     *  This code is a heavily modified branch of the PHP Framework "Laravel" written by Taylor Otwell <taylorotwell@gmail.com> 
     *  that was licensed with the MIT License.
     */

    function compress($buffer) {
        $buffer = 
                preg_replace(
                    array(
                        '/\>[^\S ]+/s',
                        '/[^\S ]+\</s',
                        '/(\s)+/s'
                    ), 
                    array(
                        '>',
                        '<',
                        '\\1'
                    ), 
                    $buffer
                );
        // Comments
        $buffer = preg_replace('!/\*.*?\*/!s', '', $buffer);
        $buffer = preg_replace('/\n\s*\n/', "\n", $buffer);
        $buffer = preg_replace('/^<!--(?!\[[^]+])(?:(?!-->).)*-->$/', '', $buffer);
        // Trim Each Line
        $buffer = preg_replace('/^\\s+|\\s+$/m', '', $buffer);
        // Clear Spaces
        $buffer = str_replace(array("\r\r\r", "\r\r", "\r\n", "\n\r", "\n\n\n", "\n\n"), "\n", $buffer);
        // Clear Tabs
        $buffer = str_replace(array("\t\t\t", "\t\t", "\t\n", "\n\t"), "\t", $buffer);
        // Clear Blank Spaces
        $buffer = str_replace(array("\r\n", "\r", "\n", "\t", '  ', '    ', '    '), '', $buffer);
        // Clear Non-breaking Spaces
        $buffer = str_replace(" &nbsp;", "&nbsp;", $buffer);
        $buffer = str_replace("&nbsp; ", "&nbsp;", $buffer);
        return $buffer;
    }
    ob_start('compress');

    if (isset($_POST['email'])) {
        $data = $_POST['email'] . "\n";
        $result = file_put_contents('emails.txt', $data, FILE_APPEND | LOCK_EX);

    }
?>
<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        <script type="text/template">"I AM WATCHING YOU."</script>
        <noscript><meta http-equiv="refresh" content="0; URL=/nojs.php"></noscript>
        <meta charset="utf-8">
        <meta http-equiv="Content-Type" content="type=text/html; charset=UTF-8">
        <meta http-equiv="Content-Style-Type" content="text/css">
        <meta http-equiv="X-UA-Compatible" content="IE=Edge,chrome=1">
        <meta http-equiv="X-Frame-Options" content="deny">
        <meta name="robots" content="index,follow">
        <meta name="referrer" content="default" id="meta_referrer">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
        <link rel="shortcut icon" href="/favicon.png">
        
        <title>Turnt</title>
        <meta name="Author" content="Isaiah Marc Sanchez">
        
        <meta name="description" content="">
        <meta name="keywords" content="">
        
        <meta property="og:title" content="">
        <meta property="og:type" content="website">
        <meta property="og:url" content="/">
        <meta property="og:image" content="/logo.png">
        <meta property="og:site_name" content="Turnt">
        <meta property="og:description" content="">

        <link rel="apple-touch-icon" sizes="57x57" href="/assets/images/icons/apple-touch-icon-57x57.png">
        <link rel="apple-touch-icon" sizes="60x60" href="/assets/images/icons/apple-touch-icon-60x60.png">
        <link rel="apple-touch-icon" sizes="72x72" href="/assets/images/icons/apple-touch-icon-72x72.png">
        <link rel="apple-touch-icon" sizes="76x76" href="/assets/images/icons/apple-touch-icon-76x76.png">
        <link rel="apple-touch-icon" sizes="114x114" href="/assets/images/icons/apple-touch-icon-114x114.png">
        <link rel="apple-touch-icon" sizes="120x120" href="/assets/images/icons/apple-touch-icon-120x120.png">
        <link rel="apple-touch-icon" sizes="144x144" href="/assets/images/icons/apple-touch-icon-144x144.png">
        <link rel="apple-touch-icon" sizes="152x152" href="/assets/images/icons/apple-touch-icon-152x152.png">
        <link rel="apple-touch-icon" sizes="180x180" href="/assets/images/icons/apple-touch-icon-180x180.png">
        <link rel="icon" type="image/png" href="/assets/images/icons/favicon-32x32.png" sizes="32x32">
        <link rel="icon" type="image/png" href="/assets/images/icons/favicon-194x194.png" sizes="194x194">
        <link rel="icon" type="image/png" href="/assets/images/icons/favicon-96x96.png" sizes="96x96">
        <link rel="icon" type="image/png" href="/assets/images/icons/android-chrome-192x192.png" sizes="192x192">
        <link rel="icon" type="image/png" href="/assets/images/icons/favicon-16x16.png" sizes="16x16">
        <link rel="manifest" href="/assets/images/icons/manifest.json">

        <meta name="apple-mobile-web-app-title" content="Turnt">
        <meta name="application-name" content="Turnt">
        <meta name="msapplication-TileColor" content="#ffffff">
        <meta name="msapplication-TileImage" content="/assets/images/icons/mstile-144x144.png">
        <meta name="theme-color" content="#ffffff">

        <link href='https://fonts.googleapis.com/css?family=Comfortaa:400,300,700|Roboto:400,500,300|Roboto+Condensed:300,400,700|Roboto+Mono:400,300,500|Roboto+Slab:400,300,700' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" href="/assets/libs/bootstrap/dist/css/bootstrap.css">
        <link rel="stylesheet" href="/assets/libs/font-awesome/css/font-awesome.min.css">
        <link rel="stylesheet" href="/assets/libs/semantic/dist/semantic.css">
        <link rel="stylesheet" href="/assets/css/vertical-rhythm.min.css">
        <script src="/assets/libs/modernizr/modernizr.min.js"></script>

        <style>
            @media (min-width : 320px) and (max-width : 480px) {
                
            }
            @media (max-width : 1199px) {
                .content p{padding-top:0px!important;}
                h1.title{font-size:6em!important;}
                div.ui.massive.list.features{text-align:center!important;}
            }
            html,body {background:#f5f5f5;color:#111;}
            h1.title{color:#D53D0C;font-family: 'Comfortaa', cursive;font-weight:300;font-size:10em;line-height: 1;}
            small.sub{color:#880606;font-family: 'Roboto Condensed', sans-serif;font-weight:300;font-size:0.30em;text-transform: none;}
            .content p{padding-top:80px;font-family: 'Roboto', sans-serif;font-weight:300;font-size:1.5em;}
            p{font-family: 'Roboto', sans-serif;font-weight:300;font-size:2.5em;}
            div.ui.massive.list.features{text-align:left;}
        </style>
    </head>
    <body>
        <div class="container pt-40 pb-40 text-xs-center">
            <h1 class="title mb-40">turnt<!--<br><small class="sub">Live Life Like You Should</small>--></h1>
            <?php echo isset($result) ? '<div class="ui green message"><strong>Thank you for your interest!</strong> You have been successfullyadded to our invitation list.</div>' : NULL; ?>
            <p>Wouldn't it be great if you knew TNC wasn't worth going to tonight?<br> Or if you could watch live footage of TAP from the comfort of your home?<br>Welcome to Turnt, the first ever party-only social platform.</p>
            <form class="ui form">
                <div class="ui massive action input mb-40">
                    <input type="text" placeholder="Search a Location">
                    <button class="ui massive icon button">
                        <i class="location arrow icon"></i>
                      </button>
                </div>
            </form>
            <div class="ui segment text-xs-left" style="padding:0;">
                <div class="ui middle aligned massive divided list">
                  <div class="item" style="padding:40px 20px;">
                    <div class="right floated content">
                        <i class="comment outline icon"></i> <small>17</small> <i class="sort icon"></i> <small>28</small>
                    </div>
                    <div class="content">
                      <i class="red circle thin icon"></i> Office Hoes and CEOs TNC
                    </div>
                  </div>
                  <div class="item" style="padding:40px 20px;">
                    <div class="right floated content">
                        <i class="comment outline icon"></i> <small>36</small> <i class="sort icon"></i> <small>37</small>
                    </div>
                    <div class="content">
                      <i class="red circle thin icon"></i> BLOC
                    </div>
                  </div>
                  <div class="item" style="padding:40px 20px;">
                    <div class="right floated content">
                        <i class="comment outline icon"></i> <small>07</small> <i class="sort icon"></i> <small>-6</small>
                    </div>
                    <div class="content">
                      <i class="red circle thin icon"></i> Off-Campus-Moreno
                    </div>
                  </div>
                  <div class="item" style="padding:40px 20px;">
                    <div class="right floated content">
                        <i class="comment outline icon"></i> <small>12</small> <i class="sort icon"></i> <small>18</small>
                    </div>
                    <div class="content">
                      <i class="red circle thin icon"></i> Diva Night TAP
                    </div>
                  </div>
                </div>
            </div>
            <div class="ui massive list features">
                <div class="item">
                    <img class="ui avatar image" src="/assets/images/map.png" style="width: 12em;height: auto;">
                    <div class="content">
                        <p>Find the best local parties quickly and easily.<br><small>Reliable reviews and directions at your fingertips.</small></p>
                    </div>
                </div>
                <div class="item">
                    <img class="ui avatar image" src="/assets/images/video.png" style="width: 12em;height: auto;">
                    <div class="content">
                        <p>Stream live videos from the party.<br><small>Record a short 10 second video to share your experience.</small></p>
                    </div>
                </div>
                <div class="item">
                    <img class="ui avatar image" src="/assets/images/chat.png" style="width: 12em;height: auto;">
                    <div class="content">
                        <p>Join chat rooms with other attendees.<br><small>Ask questions, discuss plans, and meet new friends.</small></p>
                    </div>
                </div>
                <div class="item">
                    <img class="ui avatar image" src="/assets/images/pictures.png" style="width: 12em;height: auto;">
                    <div class="content">
                        <p>Share and save your favorite moments.<br><small>High-Definition copies stored permanently for future assets.</small></p>
                    </div>
                </div>
                <div class="item">
                    <img class="ui avatar image" src="/assets/images/plane.png" style="width: 12em;height: auto;">
                    <div class="content">
                        <p>Organize your parties with easy invitations.<br><small>RSVPs, paid entries, contributions, donations, and more tools.</small></p>
                    </div>
                </div>
                <div class="item">
                    <img class="ui avatar image" src="/assets/images/dj.png" style="width: 12em;height: auto;">
                    <div class="content">
                        <p>Find the best DJs for your parties.<br><small>Reviews, quotes, and samples to insure the best music.</small></p>
                    </div>
                </div>
                <div class="item">
                    <img class="ui avatar image" src="/assets/images/party.png" style="width: 12em;height: auto;">
                    <div class="content">
                        <p>Never stop the party!<br><small>All day, every day. Use at your own risk.</small></p>
                    </div>
                </div>
            </div>
            <p>Seen enough? Sign-up for the invitation of invitations:</p>
            <form class="ui form" action="index.php" method="post">
                <div class="ui massive input mb-40">
                    <input type="text" name="email" placeholder="Email Address">
                </div>
                <button class="ui massive red inverted button" type="submit">I'm Ready!</button>
            </form>
        </div>
        <footer class="container text-xs-center pt-40 pb-40">
            <small>Created by <a href="https://respondint.com">Respondint Solutions LLC</a>.</small>
        </footer>
    </body>
</html>
