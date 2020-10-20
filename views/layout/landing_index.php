<?php
require_once('config/config.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <!-- Popper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <!-- Google Font Amiko -->
    <link href="https://fonts.googleapis.com/css2?family=Amiko:wght@400;600;700&display=swap" rel="stylesheet">
    <title>Healthy&Balance</title>
    <link rel="shortcut icon" href="asset/images/logo_header.svg" />

    <!-- CSS LINK EXTERNAL FILE-->
    <link rel="stylesheet" type="text/css" href="asset/styles/index.css">

    <head>

    <body>
        <!-- LANDING MENU PAGE -->
        <div class="sticky-top bg-white container-fluid d-flex flex-row justify-content-around align-items-center px-4">
            <div class="pt-5 pb-2">
                <svg width="200" height="21" viewBox="0 0 287 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M17.516 0.511999V20H13.82V11.432H4.58V20H0.884V0.511999H4.58V8.156H13.82V0.511999H17.516ZM26.9745 3.76V8.632H35.3745V11.684H26.9745V16.752H35.9905V20H23.2785V0.511999H35.9905V3.76H26.9745ZM52.7527 15.576H44.4367L42.8127 20H39.1167L46.5087 0.511999H50.8207L58.2127 20H54.3767L52.7527 15.576ZM51.6047 12.44L48.6087 4.152L45.5847 12.44H51.6047ZM61.9153 0.511999H65.6113V16.752H73.8152V20H61.9153V0.511999ZM80.7175 3.9H75.1735V0.511999H89.9575V3.9H84.4135V20H80.7175V3.9ZM111.032 0.511999V20H107.336V11.432H98.0956V20H94.3996V0.511999H98.0956V8.156H107.336V0.511999H111.032ZM132.082 0.511999L124.998 13.28V20H121.302V13.28L114.218 0.511999H118.166L123.178 9.976L128.274 0.511999H132.082ZM146.759 20L145.135 18.348C143.511 19.6733 141.691 20.336 139.675 20.336C138.405 20.336 137.257 20.0933 136.231 19.608C135.223 19.104 134.429 18.4227 133.851 17.564C133.291 16.6867 133.011 15.688 133.011 14.568C133.011 12.4027 134.168 10.5173 136.483 8.912C135.923 7.792 135.643 6.66267 135.643 5.524C135.643 3.88133 136.203 2.584 137.323 1.632C138.461 0.661333 139.945 0.176 141.775 0.176C142.708 0.176 143.529 0.316 144.239 0.595999C144.967 0.857333 145.704 1.27733 146.451 1.856V5.244C145.797 4.628 145.097 4.16133 144.351 3.844C143.604 3.52667 142.848 3.368 142.083 3.368C141.243 3.368 140.589 3.564 140.123 3.956C139.656 4.348 139.423 4.908 139.423 5.636C139.423 6.38267 139.665 7.16667 140.151 7.988C140.636 8.80933 141.364 9.71467 142.335 10.704L145.303 13.728C145.919 12.888 146.609 11.7493 147.375 10.312H147.487L149.643 12.272C148.952 13.672 148.224 14.876 147.459 15.884L151.491 20H146.759ZM139.871 17.284C140.953 17.284 141.989 16.9107 142.979 16.164L138.303 11.432L138.219 11.348C137.323 12.2067 136.875 13.2053 136.875 14.344C136.875 15.2773 137.145 16.0053 137.687 16.528C138.228 17.032 138.956 17.284 139.871 17.284ZM166.012 9.864C167.02 10.2933 167.786 10.9 168.308 11.684C168.831 12.468 169.092 13.42 169.092 14.54C169.092 16.3133 168.448 17.6667 167.16 18.6C165.872 19.5333 164.006 20 161.56 20H154.364V0.511999H161.896C164.006 0.511999 165.63 0.959999 166.768 1.856C167.907 2.73333 168.476 3.99333 168.476 5.636C168.476 7.596 167.655 9.00533 166.012 9.864ZM158.06 3.76V8.408H161.56C162.568 8.408 163.324 8.20267 163.828 7.792C164.332 7.38133 164.584 6.784 164.584 6C164.584 5.14133 164.36 4.55333 163.912 4.236C163.483 3.91867 162.708 3.76 161.588 3.76H158.06ZM161.56 16.724C162.886 16.724 163.819 16.5373 164.36 16.164C164.92 15.772 165.2 15.1093 165.2 14.176C165.2 13.2987 164.902 12.6547 164.304 12.244C163.726 11.8333 162.82 11.628 161.588 11.628H158.06V16.724H161.56ZM185.534 15.576H177.218L175.594 20H171.898L179.29 0.511999H183.602L190.994 20H187.158L185.534 15.576ZM184.386 12.44L181.39 4.152L178.366 12.44H184.386ZM194.697 0.511999H198.393V16.752H206.596V20H194.697V0.511999ZM222.503 15.576H214.187L212.563 20H208.867L216.259 0.511999H220.571L227.963 20H224.127L222.503 15.576ZM221.355 12.44L218.359 4.152L215.335 12.44H221.355ZM248.297 0.511999V20H244.601L235.361 7.12V20H231.665V0.511999H235.361L244.601 13.364V0.511999H248.297ZM263.664 20.336C261.517 20.336 259.669 19.9253 258.12 19.104C256.589 18.2827 255.413 17.116 254.592 15.604C253.789 14.0733 253.388 12.2907 253.388 10.256C253.388 8.22133 253.798 6.448 254.62 4.936C255.441 3.40533 256.636 2.22933 258.204 1.408C259.772 0.586666 261.648 0.176 263.832 0.176C264.746 0.176 265.642 0.269333 266.52 0.456C267.416 0.624 268.218 0.885333 268.928 1.24V4.656H268.816C268.106 4.24533 267.332 3.93733 266.492 3.732C265.67 3.52667 264.886 3.424 264.14 3.424C262.012 3.424 260.332 4.012 259.1 5.188C257.886 6.364 257.28 8.05333 257.28 10.256C257.28 12.44 257.877 14.12 259.072 15.296C260.266 16.472 261.9 17.06 263.972 17.06C264.774 17.06 265.586 16.9387 266.408 16.696C267.248 16.4347 268.05 16.0707 268.816 15.604H268.928V19.048C267.434 19.9067 265.68 20.336 263.664 20.336ZM277.908 3.76V8.632H286.308V11.684H277.908V16.752H286.924V20H274.212V0.511999H286.924V3.76H277.908Z" fill="#E85275" />
                </svg>
            </div>
            <div class="menu-active d-flex h-100 pt-5 pb-2 px-5">
                <span class='blue-color w-600 menu-text'>HOME</span>
            </div>
            <div class="d-flex h-100 pt-5 pb-2 px-5">
                <span class='blue-color w-600 menu-text'>GALLERY</span>
            </div>
            <div class="d-flex h-100 pt-5 pb-2 px-5">
                <span class='blue-color w-600 menu-text'>CONTACT</span>
            </div>
            <div class="d-flex h-100 pt-5 pb-2 px-5">
                <span class='blue-color w-600 menu-text'>BLOGS</span>
            </div>
            <div class="d-flex mt-3 py-2 px-5 mx-2 btn-login">
                <span class='blue-color text-center w-600 menu-text'>LOG IN</span>
            </div>
        </div>

        <!-- CONTENT PAGE -->
        <div class="container-fluid d-flex flex-column align-items-center mt-5 px-5 w-100">
            <div class="d-flex flex-row align-items-center justify-content-between w-100">
                <div class="d-flex flex-column align-items-center justify-content-start">
                    <div class="d-flex flex-column justify-content-start align-items-start text-left">
                        <h1 class='w-700 header-text'>HARD TO LOSE WEIGHT?</h1>
                        <span class='blue-color w-400'>Our service help you to lose weight in just 30mins.</span>
                    </div>
                    <button class="btn btn-login pink-bg text-white py-3 my-4 w-700 px-5">
                        REGISTER NOW
                    </button>
                </div>
                <div class='py-2 mr-5 pr-5'>
                    <?php echo file_get_contents('asset/images/landing/girl_running.svg'); ?>
                </div>
            </div>
        </div>
        <div class="container-fluid d-flex flex-row justify-content-around align-items-center bluesky-bg py-5 w-100">
            <div class='d-flex flex-column align-items-center px-5 py-5'>
                <img src="asset/images/icons/clock.png" style="width: 134px; height: 122px" alt="">
                <span class='text-center w-700 text-white py-3'>Lorem ipsum</span>
                <span class='w-400 text-white text-justify'>
                    Lorem ipsum dolor sit, amet consectetur adipisicing elit. Enim
                    , quis aspernatur officia, quas eaque, laboriosam ex necessitatibus
                    tenetur dolor magni ab repellendus
                </span>
            </div>
            <div class='d-flex flex-column align-items-center px-5 py-5'>
                <img src="asset/images/icons/clock.png" style="width: 134px; height: 122px" alt="">
                <span class='text-center w-700 text-white py-3'>Lorem ipsum</span>
                <span class='w-400 text-white text-justify'>
                    Lorem ipsum dolor sit, amet consectetur adipisicing elit. Enim
                    , quis aspernatur officia, quas eaque, laboriosam ex necessitatibus
                    tenetur dolor magni ab repellendus
                </span>
            </div>
            <div class='d-flex flex-column align-items-center px-5 py-5'>
                <img src="asset/images/icons/clock.png" style="width: 134px; height: 122px" alt="">
                <span class='text-center w-700 text-white py-3'>Lorem ipsum</span>
                <span class='w-400 text-white text-justify'>
                    Lorem ipsum dolor sit, amet consectetur adipisicing elit. Enim
                    , quis aspernatur officia, quas eaque, laboriosam ex necessitatibus
                    tenetur dolor magni ab repellendus
                </span>
            </div>
        </div>
        <div class="container-fluid d-flex flex-row justify-content-around align-items-center py-5 px-5 w-100">
            <div class='py-2 mr-5 pr-5'>
                <img src="asset/images/landing/athletes.png" style="width:600px; height:300px" alt="">
            </div>
            <div class="d-flex flex-row align-items-center justify-content-between w-100">
                <div class="d-flex flex-column align-items-center justify-content-start">
                    <div class="d-flex flex-column justify-content-start align-items-start text-left">
                        <h1 class='w-700 header-text'>WORK WITH PROFESSIONAL TRAINER</h1>
                        <span class='blue-color w-400 text-justify'>
                            Lorem ipsum dolor sit, amet consectetur adipisicing elit. Enim
                            , quis aspernatur officia, quas eaque, laboriosam ex necessitatibus
                            tenetur dolor magni ab repellendus Lorem ipsum
                            Lorem ipsum dolor sit, amet consectetur adipisicing elit. Enim
                            , quis aspernatur officia, quas eaque, laboriosam ex necessitatibus
                            tenetur dolor magni ab repellendus Lorem ipsum
                        </span>
                    </div>
                    <button class="btn btn-login pink-bg text-white py-3 my-4 w-700 px-5">
                        REGISTER NOW
                    </button>
                </div>
            </div>
        </div>

        <div class="bluesky-bg d-flex flex-row justify-content-center align-items-center w-100">
            <div class="d-flex flex-column align-items-center justify-content-center">
                <div class="py-2">
                    <?php 
                        echo file_get_contents('asset/images/landing/gi.svg');
                    ?>
                </div>
                <div class="d-flex bg-white flex-column align-items-center justify-content-center">
                    <span>
                        Lorem ipsum dolor sit amet consectetur adipisicing elit.
                        Molestiae, sequi? Assumenda dignissimos atque non aperiam commodi cumque neque eius
                        voluptatibus suscipit. Aperiam pariatur rem in cumque facere libero eligendi adipisci.
                    </span>
                    <span>See more</span>
                </div>
            </div>
            <div class="d-flex flex-column align-items-center justify-content-center">
                <img src="asset/images/landing/1.png" style="width:200px; height:200px" alt="">
                <div class="d-flex bg-white flex-column align-items-center justify-content-center">
                    <span>
                        Lorem ipsum dolor sit amet consectetur adipisicing elit.
                        Molestiae, sequi? Assumenda dignissimos atque non aperiam commodi cumque neque eius
                        voluptatibus suscipit. Aperiam pariatur rem in cumque facere libero eligendi adipisci.
                    </span>
                    <span>See more</span>
                </div>
            </div>
        </div>

        <!-- FOOTER -->
        <div class="d-flex flex-column w-100">
            <div class="d-flex row align-items-center justify-content-around lightgrayblue-bg py-5">
                <div class="d-flex flex-column">
                    <span class='blue-color w-400'>healthy&balance@gmail.com</span>
                    <span class='blue-color w-400'>Phone number: xxxx xxx xxx </span>
                    <span class='blue-color w-400'>Facebook fanpage: Healthy&Blance</span>
                    <span class='blue-color w-400'>FIND A STORE</span>
                </div>
                <div class="d-flex flex-column">
                    <span class='blue-color w-400'>CONTACT US</span>
                    <span class='blue-color w-400'>FAQ</span>
                    <span class='blue-color w-400'>RETURNS</span>
                    <span class='blue-color w-400'>QUESTION</span>
                </div>
                <div class="d-flex flex-column">
                    <span class='blue-color w-400'>PARTNER</span>
                    <span class='blue-color w-400'>POLICY</span>
                    <span class='blue-color w-400'>SPONSOR</span>
                    <span class='blue-color w-400'>ADS</span>
                </div>
            </div>
            <div class="py-3 px-4 w-100 bluesky-bg d-flex flex-row justify-content-between">
                <span class="text-white">@healthy&balance</span>
                <span class="text-white">CNPM_2020</span>
            </div>
        </div>
    </body>