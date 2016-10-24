
<header>
    <section class="header">
        <article class="logo">
            <img src="imgs/logo2.png" alt="logo" />
        </article>
        <div class="menus">
            <article>
                <nav class="second-nav">
                  <div class="">
                    <?php
                    if ($auth->estaLogueado()){
                      include_once 'headerLogueado.php'	;
                    }else {
                      include_once'headerLogin.php';
                    }
                    ?>
                  </div>
                </nav>
            </article>

            <span class="ion-navicon-round" style="color: 000"></span>
            <nav class="main-nav">
                <img src="" alt="" />

                <ul class="nav-resp">
                    <li><a href="index.php">Home</a></li>
                    <li><a href="registro2.php">Registrarse</a></li>
                    <li><a href="#">Store</a></li>
                    <li><a href="#">Contacts</a></li>
                    <li>
                        <input type="text" name="name" value="">
                        <button type="button" name="button" class="sbutton">Search</button>
                    </li>
                </ul>
            </nav>
        </div>
        </article>
    </section>

</header>
