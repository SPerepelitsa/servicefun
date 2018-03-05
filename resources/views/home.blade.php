@extends('main')

@section('title', 'Главная')

@section('content')
    <div class="container">
        <div class="row">
            <div class="slider">
                <div class="img-responsive">
                    <ul class="bxslider">
                        <li><img src="img/011.jpg" alt=""/></li>
                        <li><img src="img/02.jpg" alt=""/></li>
                        <li><img src="img/01.jpg" alt=""/></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <div class="text-center">
                    <h2>Наши инструменты</h2>
                    <p>В нашей работе мы используем толькомсамый лучший, и продвинутый инструмент, для выполнения
                        быстрого и качественного ремонта с высокой эффективностью. </p>
                </div>
                <hr>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="box">
                <div class="col-md-4">
                    <div class="wow bounceIn" data-wow-offset="0" data-wow-delay="0.4s">
                        <h4>Молоток</h4>
                        <div class="icon">
                            <i class="fa fa-gavel fa-3x"></i>
                        </div>
                        <p>Молото́к — небольшой ударный инструмент, применяемый для забивания гвоздей, разбивания
                            предметов и других работ. Очень эффективен в ремонте.</p>
                        <div class="ficon">
                            <a href="https://ru.wikipedia.org/wiki/%D0%9C%D0%BE%D0%BB%D0%BE%D1%82%D0%BE%D0%BA" class="btn btn-default" role="button">Подробней</a>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="wow bounceIn" data-wow-offset="0" data-wow-delay="1.0s">
                        <h4>Паяльник</h4>
                        <div class="icon">
                            <i class="fa fa-fire fa-3x"></i>
                        </div>
                        <p>Пая́льник — ручной инструмент, применяемый при лужении и пайке для нагрева деталей, флюса,
                            расплавления припоя и внесения его в место контакта спаиваемых деталей.</p>
                        <div class="ficon">
                            <a href="https://ru.wikipedia.org/wiki/%D0%9F%D0%B0%D1%8F%D0%BB%D1%8C%D0%BD%D0%B8%D0%BA" class="btn btn-default" role="button">Подробней</a>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="wow bounceIn" data-wow-offset="0" data-wow-delay="1.6s">
                        <h4>Изолента</h4>
                        <div class="icon">
                            <i class="fa fa-dot-circle-o fa-3x"></i>
                        </div>
                        <p>Электроизоляционная лента (изолента) — расходный материал, предназначенный для обмотки
                            проводов и кабелей с целью их электроизоляции.</p>
                        <div class="ficon">
                            <a href="https://ru.wikipedia.org/wiki/%D0%AD%D0%BB%D0%B5%D0%BA%D1%82%D1%80%D0%BE%D0%B8%D0%B7%D0%BE%D0%BB%D1%8F%D1%86%D0%B8%D0%BE%D0%BD%D0%BD%D0%B0%D1%8F_%D0%BB%D0%B5%D0%BD%D1%82%D0%B0" class="btn btn-default" role="button">Подробней</a>
                        </div>
                    </div>

                </div>

            </div>
        </div>
        <hr>
    </div>


    <div class="container">
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <div class="text-center">
                    <h2>Наши будни</h2>
                    <p>Чего только не увидишь, каких людей только не встретишь у нас в сервисе. Вот поэтому наша работа
                        и является столь интересной.
                    </p>
                </div>
                <hr>
            </div>
        </div>
    </div>

    <div class="content">
        <div class="grid">
            <figure class="effect-zoe">
                <img src="img/gallery/1г.jpg" alt="img25"/>
                <figcaption>
                    <h2>Подогрев <span>Воды</span></h2>
                    <p class="icon-links">
                        <a href="#"><span class="icon-heart"></span></a>
                        <a href="#"><span class="icon-eye"></span></a>
                        <a href="#"><span class="icon-paper-clip"></span></a>
                    </p>
                    <p class="description">Так мы греем воду.</p>
                </figcaption>
            </figure>
            <figure class="effect-zoe">
                <img src="img/gallery/2г.jpg" alt="img26"/>
                <figcaption>
                    <h2>Ромин<span>Трон</span></h2>
                    <p class="icon-links">
                        <a href="#"><span class="icon-heart"></span></a>
                        <a href="#"><span class="icon-eye"></span></a>
                        <a href="#"><span class="icon-paper-clip"></span></a>
                    </p>
                    <p class="description">Zoe never had the patience of her sisters. She deliberately punched the bear
                        in his face.</p>
                </figcaption>
            </figure>
        </div>
    </div>

    <div class="content">
        <div class="grid">
            <figure class="effect-zoe">
                <img src="img/gallery/4г.jpg" alt="img27"/>
                <figcaption>
                    <h2>Включай <span>Быстрее</span></h2>
                    <p class="icon-links">
                        <a href="#"><span class="icon-heart"></span></a>
                        <a href="#"><span class="icon-eye"></span></a>
                        <a href="#"><span class="icon-paper-clip"></span></a>
                    </p>
                    <p class="description">Zoe never had the patience of her sisters. She deliberately punched the bear
                        in his face.</p>
                </figcaption>
            </figure>

            <figure class="effect-zoe">
                <img src="img/gallery/3г.jpg" alt="img30"/>
                <figcaption>
                    <h2>Лечим <span>Больного</span></h2>
                    <p class="icon-links">
                        <a href="#"><span class="icon-heart"></span></a>
                        <a href="#"><span class="icon-eye"></span></a>
                        <a href="#"><span class="icon-paper-clip"></span></a>
                    </p>
                    <p class="description">Zoe never had the patience of her sisters. She deliberately punched the bear
                        in his face.</p>
                </figcaption>
            </figure>
        </div>
    </div>


    <div class="container">
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <div class="text-center">
                    <br>
                    <hr>
                    <br>
                    <h2>Наша команда</h2>
                    <p>В нашем в отделе всего два человека, но будьте уверены, нам совсем не скучно. По мотивам
                        наших будней можно смело снимать уркаинскую версию "Разрушителей мифов".</p>
                </div>
                <hr>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="box">
                <div class="col-md-4 col-md-offset-2">
                    <div class="wow bounceIn" data-wow-offset="0" data-wow-delay="0.4s">
                        <div class="img-team">
                            <img src="img/gallery/роман.jpg" width="200" height="200" alt="" style="border-radius: 100px;">
                        </div>
                        <br>
                        <h4>Роман Григорович</h4>
                        <p>Если нет никаких проблем, будь уверен: инженер обязательно создаст их сам. Обычные люди
                            придерживаются такой точки зрения: «Если вещь работает, ее не нужно ремонтировать». Инженеры
                            же думают так: «Если вещь работает, ее работа может быть улучшена».</p>
                        <div class="ficon">
                            <a href="#" class="btn btn-default" role="button">Профиль</a>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="wow bounceIn" data-wow-offset="0" data-wow-delay="1.0s">
                        <div class="img-team">
                            <img src="img/gallery/сергей.jpg" width="200" height="200" alt="" style="border-radius: 100px;">
                        </div>
                        <br>
                        <h4>Перепелица Сергей</h4>
                        <p>Если нет никаких проблем, будь уверен: инженер обязательно создаст их сам. Обычные люди
                            придерживаются такой точки зрения: «Если вещь работает, ее не нужно ремонтировать». Инженеры
                            же думают так: «Если вещь работает, ее работа может быть улучшена».</p>
                        <div class="ficon">
                            <a href="#" class="btn btn-default" role="button">Профиль</a>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <hr>
    </div>
    <br>




@endsection


