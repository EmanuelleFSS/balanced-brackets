<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>

        <meta name="charset" content="UTF-8"/>
        <meta name="viewport" content="width=device-width"/>
        <meta name="author" content="Emanuelle Siqueira"/>

        <!-- Favicon. -->
        <!-- Favicon. -->
        <link rel="shortcut icon" href="img/favicon.ico"/>
        <link rel="icon" type="image/png" sizes="32x32" href="img/favicon-32x32.png"/>
        <link rel="icon" type="image/png" sizes="16x16" href="img/favicon-16x16.png"/>

        <!-- Load fonts. -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Playfair+Display&display=swap">

        <!-- Load styles. -->
        <link rel="stylesheet" href="css/style.css" type="text/css"/>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>

        <title>Balanced Brackets</title>
    </head>

    <body>
        <div class="container">
            <img src="img/parenteses.svg" alt="parenteses image" style="width: 30vw;">

            <div class="input-box">
                <h1>Balanced Brackets</h1>

                <label>Insert a string of brackets:</label>
                <input id="string" type="text"/>

                <button id="balance-button"><strong>Balance</strong></button>

                <h3 id="response" class="animate__animated"></h3>
            </div>
        </div>

        <script>
            Element.prototype.listen = Element.prototype.addEventListener;

            window.addEventListener('DOMContentLoaded', () => {
                document.getElementById('balance-button').listen('click', () => {
                    let xhr = new XMLHttpRequest();
                    let response;

                    xhr.onreadystatechange = function () {
                        if (xhr.readyState == 4 && xhr.status == 200) {
                            response = xhr.response;

                            document.getElementById('response').classList.add('animate__fadeInUp');
                            document.getElementById('response').innerHTML = response;
                        }
                    }

                    xhr.open('GET', 'balanced-brackets.php?string='+document.getElementById('string').value);

                    xhr.send();
                });

                document.getElementById('response').listen('animationend', () => {
                    document.getElementById('response').classList.remove('animate__fadeInUp');
                });
            });
        </script>
    </body>
</html>
